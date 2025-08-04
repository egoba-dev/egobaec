<?php

namespace Plugin\Rental\Repository;

use Doctrine\Persistence\ManagerRegistry;
use Eccube\Repository\AbstractRepository;
use Eccube\Entity\Customer;
use Eccube\Entity\ProductClass;
use Plugin\Rental\Entity\RentalOrder;

/**
 * RentalOrderRepository
 *
 * レンタル注文情報を管理するリポジトリクラス
 */
class RentalOrderRepository extends AbstractRepository
{
    /**
     * コンストラクタ
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RentalOrder::class);
    }

    /**
     * アクティブなレンタル（予約中またはレンタル中）の一覧を取得
     *
     * @return RentalOrder[]
     */
    public function getActiveRentals()
    {
        $qb = $this->createQueryBuilder('ro');
        $qb->where('ro.rental_status_id IN (:statuses)')
           ->setParameter('statuses', [1, 2]) // 1:予約中、2:レンタル中
           ->orderBy('ro.rental_end_date', 'ASC');
           
        return $qb->getQuery()->getResult();
    }

    /**
     * 返却済みのレンタル履歴を取得
     *
     * @param int $limit 取得件数
     * @return RentalOrder[]
     */
    public function getRentalHistory($limit = null)
    {
        $qb = $this->createQueryBuilder('ro');
        $qb->where('ro.rental_status_id = :status')
           ->setParameter('status', 3) // 3:返却済み
           ->orderBy('ro.return_date', 'DESC');
           
        if ($limit !== null) {
            $qb->setMaxResults($limit);
        }
           
        return $qb->getQuery()->getResult();
    }

    
        /**
         * 特定の顧客のレンタル注文を取得
         *
         * @param Customer $Customer
         * @return RentalOrder[]
         */
        public function findByCustomer(Customer $Customer)
        {
            return $this->createQueryBuilder('ro')
                ->where('ro.Customer = :customer')
                ->setParameter('customer', $Customer)
                ->orderBy('ro.create_date', 'DESC')
                ->getQuery()
                ->getResult();
        }
    /**
     * 商品が現在レンタル中かどうかチェック
     *
     * @param ProductClass $ProductClass
     * @return bool
     */
    public function isProductRented(ProductClass $ProductClass)
    {
        $qb = $this->createQueryBuilder('ro');
        $qb->select('COUNT(ro.id)')
           ->where('ro.ProductClass = :ProductClass')
           ->andWhere('ro.rental_status_id IN (:statuses)')
           ->setParameter('ProductClass', $ProductClass)
           ->setParameter('statuses', [1, 2]); // 1:予約中, 2:レンタル中
           
        $count = $qb->getQuery()->getSingleScalarResult();
        
        return $count > 0;
    }

    /**
     * 返却期限を過ぎたレンタル注文を取得
     *
     * @return RentalOrder[]
     */
    public function getOverdueRentals()
    {
        $today = new \DateTime();
        
        $qb = $this->createQueryBuilder('ro');
        $qb->where('ro.rental_status_id = :status')
           ->andWhere('ro.rental_end_date < :today')
           ->setParameter('status', 2) // 2:レンタル中
           ->setParameter('today', $today)
           ->orderBy('ro.rental_end_date', 'ASC');
           
        return $qb->getQuery()->getResult();
    }
}
