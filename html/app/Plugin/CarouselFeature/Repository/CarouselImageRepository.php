<?php

namespace Plugin\CarouselFeature\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Plugin\CarouselFeature\Entity\CarouselImage;

/**
 * カルーセル画像リポジトリ
 */
class CarouselImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarouselImage::class);
    }

    /**
     * 特定記事の画像を取得（並び順考慮）
     */
    public function findByCarouselFeature($carouselFeatureId)
    {
        return $this->createQueryBuilder('ci')
            ->join('ci.CarouselFeature', 'cf')
            ->where('cf.id = :carousel_feature_id')
            ->setParameter('carousel_feature_id', $carouselFeatureId)
            ->orderBy('ci.sort_no', 'ASC')
            ->addOrderBy('ci.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * 特定記事の画像数を取得
     */
    public function getCountByCarouselFeature($carouselFeatureId)
    {
        return $this->createQueryBuilder('ci')
            ->select('COUNT(ci.id)')
            ->join('ci.CarouselFeature', 'cf')
            ->where('cf.id = :carousel_feature_id')
            ->setParameter('carousel_feature_id', $carouselFeatureId)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * 特定記事の並び順の最大値を取得
     */
    public function getMaxSortNoByCarouselFeature($carouselFeatureId)
    {
        $result = $this->createQueryBuilder('ci')
            ->select('MAX(ci.sort_no) as max_sort')
            ->join('ci.CarouselFeature', 'cf')
            ->where('cf.id = :carousel_feature_id')
            ->setParameter('carousel_feature_id', $carouselFeatureId)
            ->getQuery()
            ->getSingleScalarResult();

        return $result ? (int)$result : 0;
    }

    /**
     * 次の並び順を取得
     */
    public function getNextSortNo($carouselFeatureId)
    {
        return $this->getMaxSortNoByCarouselFeature($carouselFeatureId) + 1;
    }

    /**
     * 画像を保存
     */
    public function save(CarouselImage $carouselImage, bool $flush = true)
    {
        $this->getEntityManager()->persist($carouselImage);
        
        if ($flush) {
            $this->getEntityManager()->flush();
        }
        
        return $carouselImage;
    }

    /**
     * 画像を削除
     */
    public function remove(CarouselImage $carouselImage, bool $flush = true)
    {
        $this->getEntityManager()->remove($carouselImage);
        
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * 特定記事の全画像を削除
     */
    public function removeByCarouselFeature($carouselFeatureId, bool $flush = true)
    {
        $images = $this->findByCarouselFeature($carouselFeatureId);
        
        foreach ($images as $image) {
            $this->getEntityManager()->remove($image);
        }
        
        if ($flush) {
            $this->getEntityManager()->flush();
        }
        
        return count($images);
    }

    /**
     * ファイル名で画像を検索
     */
    public function findByFileName($fileName)
    {
        return $this->createQueryBuilder('ci')
            ->where('ci.file_name = :file_name')
            ->setParameter('file_name', $fileName)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * WebPファイル名で画像を検索
     */
    public function findByWebpFileName($webpFileName)
    {
        return $this->createQueryBuilder('ci')
            ->where('ci.webp_file_name = :webp_file_name')
            ->setParameter('webp_file_name', $webpFileName)
            ->getQuery()
            ->getResult();
    }

    /**
     * 使用されていない画像ファイルを特定
     */
    public function findOrphanedImages(array $existingFiles)
    {
        if (empty($existingFiles)) {
            return [];
        }

        return $this->createQueryBuilder('ci')
            ->where('ci.file_name NOT IN (:files)')
            ->setParameter('files', $existingFiles)
            ->getQuery()
            ->getResult();
    }

    /**
     * 画像の統計情報を取得
     */
    public function getImageStats()
    {
        $totalCount = $this->createQueryBuilder('ci')
            ->select('COUNT(ci.id)')
            ->getQuery()
            ->getSingleScalarResult();

        $totalSize = $this->createQueryBuilder('ci')
            ->select('SUM(ci.file_size)')
            ->getQuery()
            ->getSingleScalarResult();

        $webpCount = $this->createQueryBuilder('ci')
            ->select('COUNT(ci.id)')
            ->where('ci.webp_file_name IS NOT NULL')
            ->getQuery()
            ->getSingleScalarResult();

        return [
            'total_count' => (int)$totalCount,
            'total_size' => (int)$totalSize,
            'webp_count' => (int)$webpCount,
            'webp_ratio' => $totalCount > 0 ? round(($webpCount / $totalCount) * 100, 1) : 0
        ];
    }
}