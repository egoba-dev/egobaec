<?php

namespace Plugin\CarouselFeature\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Plugin\CarouselFeature\Entity\CarouselFeature;

/**
 * カルーセル特集リポジトリ
 */
class CarouselFeatureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarouselFeature::class);
    }

    /**
     * 公開中の記事を取得（並び順考慮）
     */
    public function findPublishedArticles($limit = null)
    {
        $qb = $this->createQueryBuilder('cf')
            ->where('cf.status = :status')
            ->setParameter('status', CarouselFeature::STATUS_PUBLISHED)
            ->orderBy('cf.sort_no', 'ASC')
            ->addOrderBy('cf.id', 'DESC');

        if ($limit) {
            $qb->setMaxResults($limit);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * 管理画面用：全記事を取得（並び順考慮）
     */
    public function findAllArticlesForAdmin()
    {
        return $this->createQueryBuilder('cf')
            ->orderBy('cf.sort_no', 'ASC')
            ->addOrderBy('cf.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * ステータス別記事数を取得
     */
    public function getCountByStatus()
    {
        $result = $this->createQueryBuilder('cf')
            ->select('cf.status, COUNT(cf.id) as count')
            ->groupBy('cf.status')
            ->getQuery()
            ->getResult();

        $counts = [
            CarouselFeature::STATUS_DRAFT => 0,
            CarouselFeature::STATUS_PUBLISHED => 0,
        ];

        foreach ($result as $row) {
            $counts[$row['status']] = (int)$row['count'];
        }

        return $counts;
    }

    /**
     * 並び順の最大値を取得
     */
    public function getMaxSortNo()
    {
        $result = $this->createQueryBuilder('cf')
            ->select('MAX(cf.sort_no) as max_sort')
            ->getQuery()
            ->getSingleScalarResult();

        return $result ? (int)$result : 0;
    }

    /**
     * 次の並び順を取得
     */
    public function getNextSortNo()
    {
        return $this->getMaxSortNo() + 1;
    }

    /**
     * 記事を保存
     */
    public function save(CarouselFeature $carouselFeature, bool $flush = true)
    {
        $this->getEntityManager()->persist($carouselFeature);
        
        if ($flush) {
            $this->getEntityManager()->flush();
        }
        
        return $carouselFeature;
    }

    /**
     * 記事を削除
     */
    public function remove(CarouselFeature $carouselFeature, bool $flush = true)
    {
        $this->getEntityManager()->remove($carouselFeature);
        
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * 特定商品に紐づく記事を取得
     */
    public function findByProduct($productId)
    {
        return $this->createQueryBuilder('cf')
            ->where('cf.product_id = :product_id')
            ->setParameter('product_id', $productId)
            ->orderBy('cf.sort_no', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * 検索
     */
    public function search($keyword = null, $status = null, $linkType = null)
    {
        $qb = $this->createQueryBuilder('cf');

        if ($keyword) {
            $qb->andWhere('cf.title LIKE :keyword OR cf.content LIKE :keyword')
               ->setParameter('keyword', '%' . $keyword . '%');
        }

        if ($status) {
            $qb->andWhere('cf.status = :status')
               ->setParameter('status', $status);
        }

        if ($linkType) {
            $qb->andWhere('cf.link_type = :link_type')
               ->setParameter('link_type', $linkType);
        }

        return $qb->orderBy('cf.sort_no', 'ASC')
                  ->addOrderBy('cf.id', 'DESC')
                  ->getQuery()
                  ->getResult();
    }
}