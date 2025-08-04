<?php

namespace Plugin\MakerProductBlock\Service;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Repository\ProductRepository;
use Eccube\Entity\Product;

/**
 * メーカープラグインとの連携サービス
 */
class MakerService
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;
    
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * MakerService constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param ProductRepository $productRepository
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        ProductRepository $productRepository
    ) {
        $this->entityManager = $entityManager;
        $this->productRepository = $productRepository;
    }
    
    /**
     * 利用可能なメーカー一覧を取得
     *
     * @return array
     */
    public function getAvailableMakers()
    {
        try {
            // 複数のエンティティ名を試行
            $possibleEntities = [
                'Plugin\Maker42\Entity\Maker',
                'Plugin\Maker\Entity\Maker',
                'Eccube\Entity\Maker'
            ];
            
            foreach ($possibleEntities as $entityName) {
                try {
                    return $this->entityManager->getRepository($entityName)
                        ->findBy([], ['sort_no' => 'ASC']);
                } catch (\Exception $e) {
                    continue;
                }
            }
            
            return [];
        } catch (\Exception $e) {
            error_log('Error in getAvailableMakers: ' . $e->getMessage());
            return [];
        }
    }
    
    /**
     * メーカーIDから商品一覧を取得
     *
     * @param int $makerId
     * @param int $limit
     * @param string $sortType
     * @return array
     */
    public function getProductsByMakerId($makerId, $limit = 5, $sortType = 'new')
    {
        try {
            // まず、メーカーが存在するかチェック
            $maker = $this->getMakerById($makerId);
            if (!$maker) {
                error_log('Maker not found: ' . $makerId);
                return [];
            }

            $qb = $this->productRepository->createQueryBuilder('p')
                ->where('p.Status = :status')
                ->setParameter('status', 1); // 公開状態のみ
            
            // 複数の関連付け方法を試行
            $makerFilterApplied = false;
            
            // 方法1: 直接的なMakerプロパティがある場合
            try {
                $qb->andWhere('p.Maker = :makerId')
                   ->setParameter('makerId', $makerId);
                $makerFilterApplied = true;
                error_log('Using direct Maker property');
            } catch (\Exception $e) {
                // 方法2: maker_idフィールドがある場合
                try {
                    $connection = $this->entityManager->getConnection();
                    $columns = $connection->getSchemaManager()->listTableColumns('dtb_product');
                    
                    if (isset($columns['maker_id'])) {
                        $qb->andWhere('p.maker_id = :makerId')
                           ->setParameter('makerId', $makerId);
                        $makerFilterApplied = true;
                        error_log('Using maker_id field');
                    }
                } catch (\Exception $e2) {
                    // 方法3: JOINテーブルを使用する場合
                    try {
                        $tables = $connection->getSchemaManager()->listTableNames();
                        $joinTable = null;
                        
                        foreach ($tables as $table) {
                            if (strpos($table, 'maker') !== false && strpos($table, 'product') !== false) {
                                $joinTable = $table;
                                break;
                            }
                        }
                        
                        if ($joinTable) {
                            $qb->innerJoin($joinTable, 'pm', 'WITH', 'pm.product_id = p.id')
                               ->andWhere('pm.maker_id = :makerId')
                               ->setParameter('makerId', $makerId);
                            $makerFilterApplied = true;
                            error_log('Using join table: ' . $joinTable);
                        }
                    } catch (\Exception $e3) {
                        error_log('All maker filter methods failed');
                    }
                }
            }
            
            // メーカーフィルターが適用できない場合は空の配列を返す
            if (!$makerFilterApplied) {
                error_log('No maker filter could be applied');
                return [];
            }
            
            // ソート条件
            switch ($sortType) {
                case 'price':
                    $qb->orderBy('p.price02', 'ASC');
                    break;
                case 'price_desc':
                    $qb->orderBy('p.price02', 'DESC');
                    break;
                case 'stock':
                    $qb->leftJoin('p.ProductClasses', 'pc')
                       ->leftJoin('pc.ProductStock', 'ps')
                       ->orderBy('ps.stock', 'DESC')
                       ->addOrderBy('p.create_date', 'DESC');
                    break;
                case 'name':
                    $qb->orderBy('p.name', 'ASC');
                    break;
                case 'old':
                    $qb->orderBy('p.create_date', 'ASC');
                    break;
                case 'new':
                default:
                    $qb->orderBy('p.create_date', 'DESC');
                    break;
            }
            
            $products = $qb->setMaxResults($limit)
                ->getQuery()
                ->getResult();
            
            // デバッグ用：取得した商品数をログに出力
            error_log('Retrieved products for maker ' . $makerId . ': ' . count($products));
            if (!empty($products)) {
                error_log('First product: ' . $products[0]->getName());
            }
            
            return $products;
            
        } catch (\Exception $e) {
            // エラーログを出力
            error_log('Error in getProductsByMakerId: ' . $e->getMessage());
            return [];
        }
    }
    
    /**
     * メーカー情報を取得
     *
     * @param int $makerId
     * @return mixed|null
     */
    public function getMakerById($makerId)
    {
        try {
            $possibleEntities = [
                'Plugin\Maker42\Entity\Maker',
                'Plugin\Maker\Entity\Maker',
                'Eccube\Entity\Maker'
            ];
            
            foreach ($possibleEntities as $entityName) {
                try {
                    return $this->entityManager->getRepository($entityName)
                        ->find($makerId);
                } catch (\Exception $e) {
                    continue;
                }
            }
            
            return null;
        } catch (\Exception $e) {
            error_log('Error in getMakerById: ' . $e->getMessage());
            return null;
        }
    }
    
    /**
     * メーカーIDからメーカー名を取得
     *
     * @param int $makerId
     * @return string
     */
    public function getMakerNameById($makerId)
    {
        try {
            $maker = $this->getMakerById($makerId);
            return $maker ? $maker->getName() : '未設定';
        } catch (\Exception $e) {
            return '未設定';
        }
    }
    
    /**
     * データベースの構造をデバッグ出力
     */
    public function debugDatabaseStructure()
    {
        try {
            $connection = $this->entityManager->getConnection();
            
            // テーブル一覧取得
            $schemaManager = $connection->createSchemaManager();
            $tables = $schemaManager->listTableNames();
            $makerTables = array_filter($tables, function($table) {
                return strpos($table, 'maker') !== false;
            });
            
            error_log('Maker related tables: ' . implode(', ', $makerTables));
            
            // 商品テーブルのカラム情報
            if (in_array('dtb_product', $tables)) {
                $productColumns = $schemaManager->listTableColumns('dtb_product');
                $columnNames = array_keys($productColumns);
                error_log('Product table columns: ' . implode(', ', $columnNames));
            }
            
        } catch (\Exception $e) {
            error_log('Error in debugDatabaseStructure: ' . $e->getMessage());
        }
    }
}