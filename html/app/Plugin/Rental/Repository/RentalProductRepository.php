<?php
namespace Plugin\Rental\Repository;

use Doctrine\Persistence\ManagerRegistry;
use Eccube\Repository\AbstractRepository;
use Eccube\Entity\Product;
use Plugin\Rental\Entity\RentalProduct;

/**
 * RentalProductRepository
 *
 * レンタル商品設定を管理するリポジトリクラス
 */
class RentalProductRepository extends AbstractRepository
{
    /**
     * コンストラクタ
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RentalProduct::class);
    }

  /**
 * 商品IDからレンタル商品を取得
 *
 * @param Product $Product
 * @return RentalProduct|null
 */
public function findByProduct(Product $Product)
{
    // エンティティの正しいフィールド名を確認し、それに基づいて修正
    // 例: 'rp.Product = :Product' または 'rp.productId = :product_id'
    $qb = $this->createQueryBuilder('rp');
    
    // 以下の行を RentalProduct エンティティの実際のフィールド名に基づいて修正してください
    $RentalProduct = $qb->where('rp.Product = :Product')
        ->setParameter('Product', $Product)
        ->getQuery()
        ->getOneOrNullResult();
        
    return $RentalProduct;
} 
     /**
     * レンタル可能な商品設定の一覧を取得
     *
     * @return RentalProduct[]
     */
    public function getRentalProducts()
    {
        return $this->findBy(['rental_flg' => true]);
    }

    /**
     * 特定の商品IDに対するレンタル設定が存在するかチェック
     *
     * @param int $productId
     * @return bool
     */
    public function existsRentalProduct($productId)
    {
        $count = $this->createQueryBuilder('rp')
            ->select('COUNT(rp.id)')
            ->where('rp.id = :productId')
            ->setParameter('productId', $productId)
            ->getQuery()
            ->getSingleScalarResult();
            
        return $count > 0;
    }

    /**
     * レンタル商品設定を保存
     *
     * @param RentalProduct $entity
     * @param bool $flush
     * @return void
     */
    public function save($entity, $flush = true)
    {
        $this->getEntityManager()->persist($entity);
        
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
