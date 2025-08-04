<?php

namespace Plugin\CarouselFeature\Service;

use Doctrine\ORM\EntityManagerInterface;
use Plugin\CarouselFeature\Entity\CarouselFeature;
use Plugin\CarouselFeature\Repository\CarouselFeatureRepository;

/**
 * カルーセル記事管理サービス
 */
class CarouselService
{
    private $entityManager;
    private $carouselRepository;
    private $imageService;

    public function __construct(EntityManagerInterface $entityManager, ImageService $imageService = null)
    {
        error_log('CarouselService: Constructor called');
        $this->entityManager = $entityManager;
        $this->carouselRepository = $entityManager->getRepository(CarouselFeature::class);
        $this->imageService = $imageService;
        error_log('CarouselService: Constructor completed, ImageService available: ' . ($imageService ? 'YES' : 'NO'));
    }

    /**
     * 管理画面用記事一覧取得
     */
    public function getCarouselsForAdmin(array $searchParams = [])
    {
        $keyword = $searchParams['keyword'] ?? null;
        $status = $searchParams['status'] ?? null;
        $linkType = $searchParams['link_type'] ?? null;

        return $this->carouselRepository->search($keyword, $status, $linkType);
    }

    /**
     * 公開中の記事取得
     */
    public function getPublishedCarousels($limit = null)
    {
        return $this->carouselRepository->findPublishedArticles($limit);
    }

    /**
     * 統計情報取得
     */
    public function getStatistics()
    {
        $statusCounts = $this->carouselRepository->getCountByStatus();
        
        return [
            'total' => array_sum($statusCounts),
            'published' => $statusCounts[CarouselFeature::STATUS_PUBLISHED] ?? 0,
            'draft' => $statusCounts[CarouselFeature::STATUS_DRAFT] ?? 0,
            'inactive' => $statusCounts[CarouselFeature::STATUS_INACTIVE] ?? 0,
        ];
    }

    /**
     * ソート順更新
     */
    public function updateSortOrder(array $sortData)
    {
        foreach ($sortData as $data) {
            if (isset($data['id']) && isset($data['sort_no'])) {
                $carousel = $this->carouselRepository->find($data['id']);
                if ($carousel) {
                    $carousel->setSortNo((int)$data['sort_no']);
                    $this->entityManager->persist($carousel);
                }
            }
        }

        $this->entityManager->flush();
    }

    /**
     * 複数記事のステータス更新
     */
    public function updateMultipleStatus(array $ids, $status)
    {
        $updatedCount = 0;

        foreach ($ids as $id) {
            $carousel = $this->carouselRepository->find($id);
            if ($carousel) {
                $carousel->setStatus($status);
                $this->entityManager->persist($carousel);
                $updatedCount++;
            }
        }

        $this->entityManager->flush();
        
        return $updatedCount;
    }

    /**
     * 記事削除
     */
    public function deleteCarousel(CarouselFeature $carousel)
    {
        // 関連画像を削除（ファイルも含む）
        foreach ($carousel->getCarouselImages() as $image) {
            if ($this->imageService) {
                $this->imageService->deleteImageFile($image);
            }
            $this->entityManager->remove($image);
        }

        $this->entityManager->remove($carousel);
        $this->entityManager->flush();
    }

    /**
     * 記事作成
     */
    public function createCarousel(array $data, array $uploadedFiles = [])
    {
        error_log('CarouselService: ===== createCarousel START =====');
        error_log('CarouselService: Data: ' . json_encode($data));
        error_log('CarouselService: Files count: ' . count($uploadedFiles));
        
        $carousel = new CarouselFeature();
        
        // 基本データ設定
        $carousel->setTitle($data['title']);
        $carousel->setContent($data['content'] ?? '');
        $carousel->setStatus($data['status']);
        $carousel->setLinkType($data['link_type']);
        $carousel->setLinkUrl($data['link_url'] ?? '');
        $carousel->setLinkText($data['link_text'] ?? '');
        
        // 商品設定
        if (!empty($data['product_id'])) {
            $productRepository = $this->entityManager->getRepository('Eccube\\Entity\\Product');
            $product = $productRepository->find($data['product_id']);
            if ($product) {
                $carousel->setProduct($product);
            }
        }

        // ソート番号設定
        $nextSortNo = $this->carouselRepository->getNextSortNo();
        $carousel->setSortNo($nextSortNo);

        error_log('CarouselService: About to persist CarouselFeature');
        
        // 保存
        $this->entityManager->persist($carousel);
        $this->entityManager->flush();
        
        error_log('CarouselService: CarouselFeature saved with ID: ' . $carousel->getId());

        // 画像処理（ImageServiceを使用）
        if (!empty($uploadedFiles) && $this->imageService) {
            error_log('CarouselService: Starting image processing with ImageService');
            $imageCount = $this->processImageUploadsWithImageService($carousel, $uploadedFiles);
            error_log('CarouselService: Image processing completed. Saved images: ' . $imageCount);
        } else {
            error_log('CarouselService: No images to process. Files: ' . count($uploadedFiles) . ', ImageService: ' . ($this->imageService ? 'available' : 'NOT available'));
        }
        
        error_log('CarouselService: ===== createCarousel END =====');

        return $carousel;
    }

    /**
     * 記事更新
     */
    public function updateCarousel(CarouselFeature $carousel, array $data, array $uploadedFiles = [])
    {
        // 基本データ更新
        $carousel->setTitle($data['title']);
        $carousel->setContent($data['content'] ?? '');
        $carousel->setStatus($data['status']);
        $carousel->setLinkType($data['link_type']);
        $carousel->setLinkUrl($data['link_url'] ?? '');
        $carousel->setLinkText($data['link_text'] ?? '');
        
        // 商品設定
        if (!empty($data['product_id'])) {
            $productRepository = $this->entityManager->getRepository('Eccube\\Entity\\Product');
            $product = $productRepository->find($data['product_id']);
            $carousel->setProduct($product);
        } else {
            $carousel->setProduct(null);
        }

        // 保存
        $this->entityManager->persist($carousel);
        $this->entityManager->flush();

        // 画像処理（新しい画像がある場合のみ）
        if (!empty($uploadedFiles) && $this->imageService) {
            try {
                $uploadedCount = $this->processImageUploadsWithImageService($carousel, $uploadedFiles);
                error_log('CarouselService: Successfully uploaded ' . $uploadedCount . ' new images');
            } catch (\Exception $e) {
                error_log('CarouselService: Image upload error in update: ' . $e->getMessage());
                throw new \Exception('記事は更新されましたが、画像のアップロードでエラーが発生しました: ' . $e->getMessage());
            }
        }

        return $carousel;
    }

    /**
     * ImageServiceを使った画像アップロード処理
     */
    private function processImageUploadsWithImageService(CarouselFeature $carousel, array $uploadedFiles)
    {
        error_log('CarouselService: processImageUploadsWithImageService called with ' . count($uploadedFiles) . ' files');
        
        $imageRepository = $this->entityManager->getRepository(\Plugin\CarouselFeature\Entity\CarouselImage::class);
        $sortNo = $imageRepository->getNextSortNo($carousel->getId());
        $successCount = 0;
        
        foreach ($uploadedFiles as $uploadedFile) {
            if ($uploadedFile && $uploadedFile->isValid()) {
                error_log('CarouselService: Processing file: ' . $uploadedFile->getClientOriginalName());
                
                try {
                    // CarouselImageエンティティ作成
                    $carouselImage = new \Plugin\CarouselFeature\Entity\CarouselImage();
                    $carouselImage->setCarouselFeature($carousel);
                    $carouselImage->setSortNo($sortNo++);
                    
                    error_log('CarouselService: Created CarouselImage entity, carousel ID: ' . $carousel->getId());
                    
                    // ImageServiceを使って画像をアップロード
                    $this->imageService->uploadImage($uploadedFile, $carouselImage);
                    
                    error_log('CarouselService: ImageService upload completed, fileName: ' . $carouselImage->getFileName());
                    
                    // エンティティを永続化
                    $this->entityManager->persist($carouselImage);
                    error_log('CarouselService: CarouselImage entity persisted');
                    
                    // 即座にflushして保存
                    $this->entityManager->flush();
                    error_log('CarouselService: EntityManager flush completed for image ID: ' . $carouselImage->getId());
                    
                    $successCount++;
                    
                    error_log('CarouselService: Successfully processed and saved: ' . $carouselImage->getFileName());
                    
                } catch (\Exception $e) {
                    error_log('CarouselService: Image upload error: ' . $e->getMessage());
                    error_log('CarouselService: Error trace: ' . $e->getTraceAsString());
                    // エラーが発生しても他の画像の処理は続行
                    continue;
                }
            } else {
                $errorCode = $uploadedFile ? $uploadedFile->getError() : 'null file';
                error_log('CarouselService: Invalid file, error code: ' . $errorCode);
            }
        }
        
        error_log('CarouselService: Final success count: ' . $successCount);
        
        return $successCount;
    }

    /**
     * 画像削除
     */
    public function deleteImage($image)
    {
        if ($this->imageService) {
            $this->imageService->deleteImageFile($image);
        }
        $this->entityManager->remove($image);
        $this->entityManager->flush();
    }

    /**
     * 画像順序更新
     */
    public function updateImageOrder(CarouselFeature $carousel, array $imageOrder)
    {
        foreach ($imageOrder as $index => $imageId) {
            $image = $this->entityManager->getRepository('Plugin\\CarouselFeature\\Entity\\CarouselImage')->find($imageId);
            if ($image && $image->getCarouselFeature()->getId() === $carousel->getId()) {
                $image->setSortNo($index + 1);
                $this->entityManager->persist($image);
            }
        }
        
        $this->entityManager->flush();
    }

    /**
     * 記事複製
     */
    public function duplicateCarousel(CarouselFeature $original)
    {
        $duplicate = new CarouselFeature();
        $duplicate->setTitle($original->getTitle() . ' (コピー)');
        $duplicate->setContent($original->getContent());
        $duplicate->setStatus(CarouselFeature::STATUS_DRAFT);
        $duplicate->setLinkType($original->getLinkType());
        $duplicate->setLinkUrl($original->getLinkUrl());
        $duplicate->setLinkText($original->getLinkText());
        $duplicate->setProduct($original->getProduct());
        
        // ソート番号設定
        $nextSortNo = $this->carouselRepository->getNextSortNo();
        $duplicate->setSortNo($nextSortNo);

        $this->entityManager->persist($duplicate);
        $this->entityManager->flush();

        return $duplicate;
    }

    /**
     * 公開中の記事取得（getPublishedFeaturesのエイリアス）
     */
    public function getPublishedFeatures($limit = null)
    {
        return $this->getPublishedCarousels($limit);
    }
}