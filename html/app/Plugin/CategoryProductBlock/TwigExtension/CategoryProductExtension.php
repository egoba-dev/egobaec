<?php

namespace Plugin\CategoryProductBlock\TwigExtension;

use Eccube\Entity\Category;
use Eccube\Entity\Product;
use Eccube\Repository\CategoryRepository;
use Eccube\Repository\ProductRepository;
use Plugin\CategoryProductBlock\Repository\ConfigRepository;
use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Doctrine\ORM\EntityManagerInterface;

class CategoryProductExtension extends AbstractExtension
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var ConfigRepository
     */
    protected $configRepository;

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var RequestStack
     */
    protected $requestStack;

    public function __construct(
        EntityManagerInterface $entityManager,
        ConfigRepository $configRepository,
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository,
        RequestStack $requestStack
    ) {
        $this->entityManager = $entityManager;
        $this->configRepository = $configRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->requestStack = $requestStack;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('category_product_data', [$this, 'getCategoryProductData']),
            new TwigFunction('category_product_config', [$this, 'getConfig']),
        ];
    }

    public function getCategoryProductData(): array
    {
        try {
            // 設定を取得
            $config = $this->configRepository->get();
            if (!$config) {
                $config = $this->createDefaultConfig();
            }
            
            // カテゴリーを取得
            $categories = $this->getActiveCategories();
            
            // 各カテゴリーの商品を取得
            $productData = [];
            $allProducts = []; // すべてカテゴリ用
            $allProductIds = []; // 重複チェック用（すべてカテゴリ用のみ）
            
            foreach ($categories as $category) {
                $categoryId = $category['id'];
                $categoryProducts = $this->getProductsByCategory($categoryId, $config->getDisplayCount());
                
                // 各カテゴリーには全商品を格納
                $productData[$categoryId] = $categoryProducts;
                
                // すべてカテゴリ用に重複排除して追加
                foreach ($categoryProducts as $product) {
                    if (!in_array($product['id'], $allProductIds)) {
                        $allProducts[] = $product;
                        $allProductIds[] = $product['id'];
                    }
                }
            }
            
            // すべてカテゴリ用のデータを追加（キー0で）
            $productData[0] = $allProducts;
            
            $result = [
                'categories' => $categories,
                'products' => $productData,
                'config' => [
                    'display_count' => $config->getDisplayCount(),
                    'columns_count' => method_exists($config, 'getColumnsCount') ? $config->getColumnsCount() : 5,
                    'rows_count' => method_exists($config, 'getRowsCount') ? $config->getRowsCount() : 2,
                ],
                'debug' => [
                    'category_count' => count($categories),
                    'product_count' => array_sum(array_map('count', $productData)),
                    'all_products_count' => count($allProducts),
                    'timestamp' => date('Y-m-d H:i:s'),
                ]
            ];
            
            return $result;
            
        } catch (\Exception $e) {
            error_log('[CategoryProductBlock][TwigExtension] Error: ' . $e->getMessage());
            error_log('[CategoryProductBlock][TwigExtension] Stack trace: ' . $e->getTraceAsString());
            
            return [
                'categories' => [],
                'products' => [],
                'config' => [
                    'display_count' => 10,
                    'columns_count' => 5,
                    'rows_count' => 2,
                ],
                'error' => $e->getMessage(),
                'debug' => [
                    'error_occurred' => true,
                    'timestamp' => date('Y-m-d H:i:s'),
                ],
            ];
        }
    }

    public function getCategoryProducts(int $categoryId): array
    {
        try {
            error_log('[CategoryProductBlock][TwigExtension] getCategoryProducts start for category: ' . $categoryId);
            
            $config = $this->configRepository->get();
            $products = $this->getProductsByCategory($categoryId, $config->getDisplayCount());
            
            error_log('[CategoryProductBlock][TwigExtension] Products found: ' . count($products));
            
            return $products;
        } catch (\Exception $e) {
            error_log('[CategoryProductBlock][TwigExtension] getCategoryProducts error: ' . $e->getMessage());
            return [];
        }
    }

    private function getActiveCategories(): array
    {
        try {
            $categoryRepository = $this->entityManager->getRepository(Category::class);
            $allCategories = $categoryRepository->findAll();
            
            $categories = [];
            foreach ($allCategories as $category) {
                if ($category && $category->getId() && $category->getName()) {
                    $categories[] = [
                        'id' => $category->getId(),
                        'name' => $category->getName(),
                    ];
                }
            }
            
            return array_slice($categories, 0, 10); // 最大10カテゴリー
            
        } catch (\Exception $e) {
            error_log('[CategoryProductBlock] Error getting categories: ' . $e->getMessage());
            return [];
        }
    }

    private function getProductsByCategory(int $categoryId, int $limit = 10): array
    {
        try {
            $config = $this->configRepository->get();
            $displayCount = $limit ?? ($config ? $config->getDisplayCount() : 10);
            
            $queryBuilder = $this->entityManager->createQueryBuilder()
                ->select('p')
                ->from(Product::class, 'p')
                ->where('p.Status = :status')
                ->setParameter('status', 1)
                ->orderBy('p.update_date', 'DESC')
                ->setMaxResults($displayCount);
            
            if ($categoryId) {
                $queryBuilder
                    ->innerJoin('p.ProductCategories', 'pc')
                    ->innerJoin('pc.Category', 'c')
                    ->andWhere('c.id = :category_id')
                    ->setParameter('category_id', $categoryId);
            }
            
            $products = $queryBuilder->getQuery()->getResult();
            
            // 商品エンティティを配列形式に変換
            $productData = [];
            foreach ($products as $product) {
                try {
                    $productImages = $product->getProductImage();
                    $mainImage = null;
                    if ($productImages && count($productImages) > 0) {
                        $mainImage = $productImages[0]->getFileName();
                    }
                    
                    $price = $this->getProductPrice($product);
                    
                    // デバッグ情報をログに出力
                    if ($mainImage) {
                        $dockerPath = $this->getProjectRoot() . '/html/upload/save_image/' . $mainImage;
                        $fileExists = file_exists($dockerPath);
                        
                        error_log('[CategoryProductBlock] Image: ' . $mainImage);
                        error_log('[CategoryProductBlock] Docker Path: ' . $dockerPath);
                        error_log('[CategoryProductBlock] File Exists: ' . ($fileExists ? 'YES' : 'NO'));
                        error_log('[CategoryProductBlock] Generated Image URL: ' . $this->generateImageUrl($mainImage));
                    }
                    
                    $productData[] = [
                        'id' => $product->getId(),
                        'name' => $product->getName() ?: '商品名なし',
                        'price' => $price,
                        'image' => $mainImage,
                        'image_path' => $this->generateImageUrl($mainImage), // これが重要
                        'description' => method_exists($product, 'getDescriptionDetail') ? ($product->getDescriptionDetail() ?: '') : '',
                        // デバッグ情報（本番では削除推奨）
                        'debug_image_exists' => $mainImage ? file_exists($this->getProjectRoot() . '/html/upload/save_image/' . $mainImage) : false,
                        'debug_full_path' => $mainImage ? $this->getProjectRoot() . '/html/upload/save_image/' . $mainImage : null,
                        'debug_generated_url' => $this->generateImageUrl($mainImage),
                    ];
                    
                } catch (\Exception $productError) {
                    error_log('[CategoryProductBlock] Product processing error: ' . $productError->getMessage());
                    continue;
                }
            }
            
            return $productData;
            
        } catch (\Exception $e) {
            error_log('[CategoryProductBlock][TwigExtension] getProductsByCategory error: ' . $e->getMessage());
            return [];
        }
    }

    private function createDefaultConfig()
    {
        // デフォルト設定オブジェクトを作成
        return new class {
            public function getDisplayCount() { return 10; }
            public function getColumnsCount() { return 5; }
            public function getRowsCount() { return 2; }
        };
    }

    private function getProductPrice($product): int
    {
        $price = 0;
        
        try {
            // 商品クラスを考慮した価格取得
            $productClasses = $product->getProductClasses();
            if ($productClasses && count($productClasses) > 0) {
                // 最初の有効な商品クラスの価格を使用
                foreach ($productClasses as $productClass) {
                    if ($productClass && method_exists($productClass, 'getPrice02')) {
                        $classPrice = $productClass->getPrice02();
                        if ($classPrice && $classPrice > 0) {
                            $price = $classPrice;
                            break;
                        }
                    }
                }
            }
            
            // フォールバック: 商品本体の価格
            if ($price <= 0) {
                $priceMethods = ['getPrice02', 'getPrice01'];
                foreach ($priceMethods as $method) {
                    if (method_exists($product, $method)) {
                        $tempPrice = $product->$method();
                        if ($tempPrice && $tempPrice > 0) {
                            $price = $tempPrice;
                            break;
                        }
                    }
                }
            }
            
        } catch (\Exception $e) {
            error_log('[CategoryProductBlock] Price calculation error: ' . $e->getMessage());
            $price = 0;
        }
        
        return $price;
    }

    /**
     * 画像URLを生成
     */
    private function generateImageUrl(?string $filename): ?string
    {
        if (!$filename) {
            return '/category-product/no-image'; // デフォルト画像のURL
        }
        
        // プラグインの画像配信コントローラーを使用
        return '/category-product/image/' . $filename;
    }
    
    /**
     * プロジェクトルートパスを取得
     */
    private function getProjectRoot(): string
    {
        // Dockerコンテナ内でのパス
        return '/var/www/html';
    }

    private function debugProductMethods($product): void
    {
        error_log('[CategoryProductBlock] Available methods for Product entity:');
        $methods = get_class_methods($product);
        $priceMethods = array_filter($methods, function($method) {
            return strpos(strtolower($method), 'price') !== false;
        });
        error_log('[CategoryProductBlock] Price-related methods: ' . implode(', ', $priceMethods));
    }
}