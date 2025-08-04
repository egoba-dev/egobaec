<?php

namespace Plugin\CarouselFeature\Controller\Admin;

use Eccube\Controller\AbstractController;
use Plugin\CarouselFeature\Entity\CarouselFeature;
use Plugin\CarouselFeature\Form\Type\CarouselFeatureType;
use Plugin\CarouselFeature\Service\CarouselService;
use Plugin\CarouselFeature\Service\ImageService;
use Plugin\CarouselFeature\Repository\CarouselImageRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/%eccube_admin_route%/carousel_feature")
 */
class CarouselController extends AbstractController
{
    private $carouselService;
    private $imageService;
    private $carouselImageRepository;

    public function __construct(
        CarouselService $carouselService,
        CarouselImageRepository $carouselImageRepository,
        ImageService $imageService = null
    ) {
        $this->carouselService = $carouselService;
        $this->carouselImageRepository = $carouselImageRepository;
        $this->imageService = $imageService;
    }

    /**
     * 記事作成
     * 
     * @Route("/create", name="admin_carousel_feature_create", methods={"GET", "POST"})
     * @Template("@CarouselFeature/admin/carousel_create.twig")
     */
    public function create(Request $request)
    {
        error_log('CarouselController: CREATE method started');
        
        $carousel = new CarouselFeature();
        $form = $this->createForm(CarouselFeatureType::class, $carousel);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            error_log('CarouselController: Form submitted and valid');
            
            // デバッグ：アップロード環境確認
            $projectDir = $this->getParameter('kernel.project_dir');
            $uploadDir = $projectDir . '/upload/save_image/carousel_feature';
            
            if (!is_dir($uploadDir)) {
                error_log('CarouselController: Creating upload directory: ' . $uploadDir);
                mkdir($uploadDir, 0755, true);
            }
            
            if (!is_writable($uploadDir)) {
                error_log('CarouselController: Upload directory not writable: ' . $uploadDir);
                $this->addError('アップロードディレクトリに書き込み権限がありません: ' . $uploadDir, 'admin');
                return ['form' => $form->createView(), 'carousel' => $carousel];
            }
            
            try {
                // フォームデータを配列に変換
                $data = [
                    'title' => $form->get('title')->getData(),
                    'content' => $form->get('content')->getData(),
                    'status' => $form->get('status')->getData(),
                    'link_type' => $form->get('link_type')->getData(),
                    'link_url' => $form->get('link_url')->getData(),
                    'link_text' => $form->get('link_text')->getData(),
                    'product_id' => $form->get('Product')->getData() ? $form->get('Product')->getData()->getId() : null
                ];

                // 画像ファイルを取得
                $uploadedFiles = [];
                if ($form->has('images') && $form->get('images')->getData()) {
                    $uploadedFiles = $form->get('images')->getData();
                    error_log('CarouselController: Raw uploaded files data: ' . print_r($uploadedFiles, true));
                    
                    // 単一ファイルの場合は配列に変換
                    if (!is_array($uploadedFiles)) {
                        $uploadedFiles = [$uploadedFiles];
                    }
                    error_log('CarouselController: Processed uploaded files count: ' . count($uploadedFiles));
                    
                    // アップロードファイルの詳細をログ出力
                    foreach ($uploadedFiles as $index => $file) {
                        if ($file) {
                            error_log("CarouselController: File {$index} - Name: " . $file->getClientOriginalName() . ", Size: " . $file->getSize() . ", Valid: " . ($file->isValid() ? 'YES' : 'NO'));
                        }
                    }
                } else {
                    error_log('CarouselController: No images found in form data');
                }

                // 記事作成
                error_log('CarouselController: Calling createCarousel with ' . count($uploadedFiles) . ' files');
                $carousel = $this->carouselService->createCarousel($data, $uploadedFiles);
                error_log('CarouselController: createCarousel completed, carousel ID: ' . $carousel->getId());

                $this->addSuccess('記事を作成しました。', 'admin');

                return $this->redirectToRoute('admin_carousel_feature_edit', [
                    'id' => $carousel->getId()
                ]);

            } catch (\Exception $e) {
                error_log('CarouselController: Create error: ' . $e->getMessage());
                error_log('CarouselController: Create error trace: ' . $e->getTraceAsString());
                $this->addError('記事の作成に失敗しました: ' . $e->getMessage(), 'admin');
            }
        } else if ($form->isSubmitted()) {
            error_log('CarouselController: Form validation errors: ' . $form->getErrors(true));
        }

        return [
            'form' => $form->createView(),
            'carousel' => $carousel
        ];
    }

    /**
     * 記事編集
     * 
     * @Route("/{id}/edit", name="admin_carousel_feature_edit", methods={"GET", "POST"}, requirements={"id" = "\d+"})
     * @Template("@CarouselFeature/admin/carousel_edit.twig")
     */
    public function edit(Request $request, CarouselFeature $carousel)
    {
        $form = $this->createForm(CarouselFeatureType::class, $carousel);
        
        // 関連画像を取得
        $carouselImages = $this->carouselImageRepository->findByCarouselFeature($carousel->getId());
        
        // 画像パスの修正処理を追加
        foreach ($carouselImages as $carouselImage) {
            $this->fixImagePath($carouselImage);
        }
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                // フォームデータを配列に変換
                $data = [
                    'title' => $form->get('title')->getData(),
                    'content' => $form->get('content')->getData(),
                    'status' => $form->get('status')->getData(),
                    'link_type' => $form->get('link_type')->getData(),
                    'link_url' => $form->get('link_url')->getData(),
                    'link_text' => $form->get('link_text')->getData(),
                    'product_id' => $form->get('Product')->getData() ? $form->get('Product')->getData()->getId() : null
                ];

                // 画像ファイルを取得
                $uploadedFiles = [];
                if ($form->has('images') && $form->get('images')->getData()) {
                    $uploadedFiles = $form->get('images')->getData();
                    // 単一ファイルの場合は配列に変換
                    if (!is_array($uploadedFiles)) {
                        $uploadedFiles = [$uploadedFiles];
                    }
                }

                // 記事更新
                $this->carouselService->updateCarousel($carousel, $data, $uploadedFiles);

                $this->addSuccess('記事を更新しました。', 'admin');

                return $this->redirectToRoute('admin_carousel_feature_edit', [
                    'id' => $carousel->getId()
                ]);

            } catch (\Exception $e) {
                $this->addError('記事の更新に失敗しました: ' . $e->getMessage(), 'admin');
            }
        }

        return [
            'form' => $form->createView(),
            'carousel' => $carousel,
            'carouselImages' => $carouselImages
        ];
    }

    /**
     * 画像パス修正ヘルパーメソッド
     */
    private function fixImagePath($carouselImage)
    {
        $fileName = $carouselImage->getFileName();
        
        if (!$fileName) {
            return;
        }
        
        // ファイル名にディレクトリが含まれていない場合
        if (strpos($fileName, '/') === false) {
            // 実際のファイルが存在するかチェック
            $projectDir = $this->getParameter('kernel.project_dir');
            $fullPath = $projectDir . '/upload/save_image/carousel_feature/' . $fileName;
            
            if (file_exists($fullPath)) {
                // ディレクトリを含むパスに更新
                $carouselImage->setFileName('carousel_feature/' . $fileName);
                $this->entityManager->persist($carouselImage);
            }
        }
    }

    /**
     * 記事削除
     * 
     * @Route("/{id}/delete", name="admin_carousel_feature_delete", methods={"DELETE", "POST"}, requirements={"id" = "\d+"})
     */
    public function delete(Request $request, CarouselFeature $carousel)
    {
        try {
            $this->carouselService->deleteCarousel($carousel);
            
            if ($request->isXmlHttpRequest()) {
                return new JsonResponse(['success' => true, 'message' => '記事を削除しました。']);
            }
            
            $this->addSuccess('記事を削除しました。', 'admin');
            return $this->redirectToRoute('admin_carousel_feature_list');

        } catch (\Exception $e) {
            error_log('Delete error: ' . $e->getMessage());
            
            if ($request->isXmlHttpRequest()) {
                return new JsonResponse(['success' => false, 'message' => '記事の削除に失敗しました: ' . $e->getMessage()]);
            }
            
            $this->addError('記事の削除に失敗しました: ' . $e->getMessage(), 'admin');
        }

        return $this->redirectToRoute('admin_carousel_feature_list');
    }

    /**
     * 画像削除（Ajax）
     * 
     * @Route("/image/{id}/delete", name="admin_carousel_feature_image_delete", methods={"DELETE"}, requirements={"id" = "\d+"})
     */
    public function deleteImage(Request $request, $id)
    {
        try {
            $image = $this->carouselImageRepository->find($id);

            if (!$image) {
                return new JsonResponse(['success' => false, 'message' => '画像が見つかりません。']);
            }

            $this->carouselService->deleteImage($image);

            return new JsonResponse(['success' => true, 'message' => '画像を削除しました。']);

        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'message' => '画像の削除に失敗しました: ' . $e->getMessage()]);
        }
    }

    /**
     * 画像順序変更（Ajax）
     * 
     * @Route("/{id}/images/reorder", name="admin_carousel_feature_image_reorder", methods={"POST"}, requirements={"id" = "\d+"})
     */
    public function reorderImages(Request $request, CarouselFeature $carousel)
    {
        try {
            $imageOrder = $request->request->get('image_order', []);
            $this->carouselService->updateImageOrder($carousel, $imageOrder);

            return new JsonResponse(['success' => true, 'message' => '画像の順序を更新しました。']);

        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'message' => '画像順序の更新に失敗しました: ' . $e->getMessage()]);
        }
    }

    /**
     * 記事複製
     * 
     * @Route("/{id}/duplicate", name="admin_carousel_feature_duplicate", methods={"POST"}, requirements={"id" = "\d+"})
     */
    public function duplicate(Request $request, CarouselFeature $carousel)
    {
        try {
            $duplicated = $this->carouselService->duplicateCarousel($carousel);
            $this->addSuccess('記事を複製しました。', 'admin');

            return $this->redirectToRoute('admin_carousel_feature_edit', [
                'id' => $duplicated->getId()
            ]);

        } catch (\Exception $e) {
            $this->addError('記事の複製に失敗しました: ' . $e->getMessage(), 'admin');
        }

        return $this->redirectToRoute('admin_carousel_feature_list');
    }

    /**
     * プレビュー表示
     * 
     * @Route("/{id}/preview", name="admin_carousel_feature_preview", methods={"GET"}, requirements={"id" = "\d+"})
     * @Template("@CarouselFeature/admin/carousel_preview.twig")
     */
    public function preview(CarouselFeature $carousel)
    {
        return [
            'carousel' => $carousel
        ];
    }

    /**
     * 画像アップロード（Ajax）
     * 
     * @Route("/upload", name="admin_carousel_feature_upload", methods={"POST"})
     */
    public function upload(Request $request)
    {
        try {
            $uploadedFile = $request->files->get('file');
            
            if (!$uploadedFile) {
                return new JsonResponse(['success' => false, 'message' => 'ファイルが選択されていません。']);
            }

            // 一時的な画像エンティティを作成
            $carouselImage = new \Plugin\CarouselFeature\Entity\CarouselImage();
            
            // 画像アップロード処理
            if ($this->imageService) {
                $this->imageService->uploadImage($uploadedFile, $carouselImage);

                return new JsonResponse([
                    'success' => true,
                    'filename' => $carouselImage->getFileName(),
                    'original_name' => $carouselImage->getOriginalName(),
                    'url' => asset($carouselImage->getImagePath(), 'save_image'),
                    'webp_url' => $carouselImage->getWebpFileName() ? asset($carouselImage->getWebpPath(), 'save_image') : null,
                    'width' => $carouselImage->getWidth(),
                    'height' => $carouselImage->getHeight(),
                    'file_size' => $carouselImage->getFileSize()
                ]);
            } else {
                return new JsonResponse(['success' => false, 'message' => '画像サービスが利用できません。']);
            }

        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * 画像パス修正用（デバッグ）
     * 
     * @Route("/fix-image-paths", name="admin_carousel_feature_fix_paths", methods={"GET", "POST"})
     */
    public function fixImagePaths(Request $request)
    {
        $repository = $this->entityManager->getRepository(\Plugin\CarouselFeature\Entity\CarouselImage::class);
        $images = $repository->findAll();
        
        $results = [
            'total_images' => count($images),
            'fixed_count' => 0,
            'details' => []
        ];
        
        if ($request->isMethod('POST')) {
            // 実際にパスを修正
            foreach ($images as $image) {
                $currentPath = $image->getFileName();
                $details = [
                    'id' => $image->getId(),
                    'current_path' => $currentPath,
                    'full_path' => $image->getFullPath(),
                    'file_exists' => file_exists($image->getFullPath()),
                    'action' => 'no_change'
                ];
                
                // パスの修正が必要かチェック
                if ($currentPath && strpos($currentPath, '/') === false) {
                    // ファイル名のみの場合、正しいディレクトリで検索
                    $projectDir = $this->getParameter('kernel.project_dir');
                    $correctPath = $projectDir . '/upload/save_image/carousel_feature/' . $currentPath;
                    
                    if (file_exists($correctPath)) {
                        $image->setFileName('carousel_feature/' . $currentPath);
                        $this->entityManager->persist($image);
                        $details['action'] = 'fixed_to_correct_path';
                        $details['new_path'] = 'carousel_feature/' . $currentPath;
                        $results['fixed_count']++;
                    } else {
                        $details['action'] = 'file_not_found';
                    }
                } else if ($currentPath && !file_exists($image->getFullPath())) {
                    // パスがあるが実際のファイルが存在しない場合
                    $fileName = basename($currentPath);
                    $projectDir = $this->getParameter('kernel.project_dir');
                    $correctPath = $projectDir . '/upload/save_image/carousel_feature/' . $fileName;
                    
                    if (file_exists($correctPath)) {
                        $image->setFileName('carousel_feature/' . $fileName);
                        $this->entityManager->persist($image);
                        $details['action'] = 'path_corrected';
                        $details['new_path'] = 'carousel_feature/' . $fileName;
                        $results['fixed_count']++;
                    } else {
                        $details['action'] = 'file_not_found_anywhere';
                    }
                } else {
                    $details['action'] = 'already_correct';
                }
                
                $results['details'][] = $details;
            }
            
            if ($results['fixed_count'] > 0) {
                $this->entityManager->flush();
            }
        } else {
            // 現状確認のみ
            foreach ($images as $image) {
                $results['details'][] = [
                    'id' => $image->getId(),
                    'current_path' => $image->getFileName(),
                    'full_path' => $image->getFullPath(),
                    'file_exists' => file_exists($image->getFullPath()),
                    'original_name' => $image->getOriginalName()
                ];
            }
        }
        
        return new JsonResponse($results);
    }

    // 以下、デバッグ用メソッドを統合（重複を避けるため）
    
    /**
     * デバッグ用：アップロード環境確認
     * 
     * @Route("/debug-upload", name="admin_carousel_feature_debug_upload", methods={"GET"})
     */
    public function debugUpload()
    {
        try {
            $projectDir = $this->getParameter('kernel.project_dir');
            
            $results = [
                'project_dir' => $projectDir,
                'paths' => $this->debugPaths($projectDir),
                'directory_creation' => $this->createUploadDirectories($projectDir),
                'write_permissions' => $this->testWritePermissions($projectDir),
                'existing_images' => $this->listExistingImages($projectDir),
                'server_info' => [
                    'php_user' => get_current_user(),
                    'server_software' => $_SERVER['SERVER_SOFTWARE'] ?? 'unknown',
                    'document_root' => $_SERVER['DOCUMENT_ROOT'] ?? 'unknown'
                ]
            ];
            
            return new JsonResponse($results);
            
        } catch (\Exception $e) {
            return new JsonResponse([
                'error' => true,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }

    private function debugPaths($projectDir)
    {
        $paths = [
            'project_dir' => $projectDir,
            'upload_dir' => $projectDir . '/upload',
            'save_image_dir' => $projectDir . '/upload/save_image',
            'carousel_dir' => $projectDir . '/upload/save_image/carousel_feature',
        ];
        
        $results = [];
        foreach ($paths as $name => $path) {
            $results[$name] = [
                'path' => $path,
                'exists' => file_exists($path),
                'is_dir' => is_dir($path),
                'writable' => file_exists($path) ? is_writable($path) : false,
                'permissions' => file_exists($path) ? substr(sprintf('%o', fileperms($path)), -4) : 'N/A'
            ];
        }
        
        return $results;
    }

    private function createUploadDirectories($projectDir)
    {
        $targetDir = $projectDir . '/upload/save_image/carousel_feature';
        
        try {
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
                return "ディレクトリを作成しました: {$targetDir}";
            } else {
                return "ディレクトリは既に存在します: {$targetDir}";
            }
        } catch (\Exception $e) {
            return "ディレクトリ作成エラー: " . $e->getMessage();
        }
    }

    private function testWritePermissions($projectDir)
    {
        $targetDir = $projectDir . '/upload/save_image/carousel_feature';
        
        if (!is_dir($targetDir)) {
            return "ディレクトリが存在しません";
        }
        
        $testFile = $targetDir . '/test_write_' . date('YmdHis') . '.txt';
        
        try {
            $result = file_put_contents($testFile, 'test');
            if ($result !== false) {
                unlink($testFile);
                return "書き込み権限OK";
            } else {
                return "書き込み権限NG";
            }
        } catch (\Exception $e) {
            return "書き込みテストエラー: " . $e->getMessage();
        }
    }

    private function listExistingImages($projectDir)
    {
        $results = [];
        
        $dirs = [
            'correct_new' => $projectDir . '/upload/save_image/carousel_feature',
        ];
        
        foreach ($dirs as $type => $dir) {
            $results[$type] = [
                'dir' => $dir,
                'exists' => is_dir($dir),
                'files' => []
            ];
            
            if (is_dir($dir)) {
                $files = glob($dir . '/*');
                foreach ($files as $file) {
                    if (is_file($file)) {
                        $results[$type]['files'][] = [
                            'name' => basename($file),
                            'size' => filesize($file),
                            'modified' => date('Y-m-d H:i:s', filemtime($file))
                        ];
                    }
                }
            }
        }
        
        return $results;
    }
}