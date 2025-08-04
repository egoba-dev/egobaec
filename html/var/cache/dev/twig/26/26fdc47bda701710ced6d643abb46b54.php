<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* Block/category_product_block.twig */
class __TwigTemplate_265e7bcffc4ca149ee12186014e4135e extends \Eccube\Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/category_product_block.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/category_product_block.twig"));

        // line 2
        $context["block_data"] = $this->extensions['Plugin\CategoryProductBlock\TwigExtension\CategoryProductExtension']->getCategoryProductData();
        // line 3
        $context["config"] = twig_get_attribute($this->env, $this->source, (isset($context["block_data"]) || array_key_exists("block_data", $context) ? $context["block_data"] : (function () { throw new RuntimeError('Variable "block_data" does not exist.', 3, $this->source); })()), "config", [], "any", false, false, false, 3);
        // line 4
        $context["categories"] = twig_get_attribute($this->env, $this->source, (isset($context["block_data"]) || array_key_exists("block_data", $context) ? $context["block_data"] : (function () { throw new RuntimeError('Variable "block_data" does not exist.', 4, $this->source); })()), "categories", [], "any", false, false, false, 4);
        // line 5
        $context["products"] = twig_get_attribute($this->env, $this->source, (isset($context["block_data"]) || array_key_exists("block_data", $context) ? $context["block_data"] : (function () { throw new RuntimeError('Variable "block_data" does not exist.', 5, $this->source); })()), "products", [], "any", false, false, false, 5);
        // line 6
        echo "
<div class=\"category-product-block\" id=\"categoryProductBlock\">
    <style>
        /* 既存のCSS + カルーセル用CSS */
        .category-product-block {
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .category-carousel-container {
            position: relative;
            margin-bottom: 20px;
            padding: 0 50px; /* 左右にボタン用のスペースを確保 */
        }
        
        .category-carousel {
            overflow: hidden;
            position: relative;
            width: 100%; /* 親コンテナの幅いっぱい */
        }
        
        .category-tags {
            display: flex;
            gap: 10px;
            transition: transform 0.3s ease;
            flex-wrap: nowrap;
            justify-content: flex-start;
            width: max-content; /* コンテンツに合わせた幅 */
        }
        
        .category-tag {
            background: #f8f9fa;
            border: 2px solid #dee2e6;
            border-radius: 25px;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            color: #495057;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            flex-shrink: 0;
            min-width: fit-content; /* 最小幅をコンテンツに合わせる */
        }
        
        .category-tag:hover,
        .category-tag.active {
            background: #007bff;
            border-color: #007bff;
            color: white;
            text-decoration: none;
        }
        
        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid #dee2e6;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex; /* 常に flex として表示 */
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: all 0.3s ease;
            font-size: 18px;
            color: #495057;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            opacity: 0; /* 初期状態は透明 */
            visibility: hidden; /* 初期状態は非表示 */
        }
        
        .carousel-btn:hover:not(.disabled) {
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            transform: translateY(-50%) scale(1.05);
        }
        
        .carousel-btn.show {
            opacity: 1;
            visibility: visible;
        }
        
        .carousel-btn.disabled {
            opacity: 0.3;
            cursor: not-allowed;
            pointer-events: none;
        }
        
        .carousel-btn-prev {
            left: 10px; /* コンテナの左端から10px */
        }
        
        .carousel-btn-next {
            right: 10px; /* コンテナの右端から10px */
        }
        
        /* カルーセルが不要な場合のスタイル */
        .category-carousel-container.no-carousel {
            padding: 0; /* パディングを削除 */
        }
        
        .category-carousel-container.no-carousel .category-tags {
            justify-content: center; /* 中央寄せ */
            flex-wrap: wrap; /* 折り返し許可 */
        }
        
        .category-carousel-container.no-carousel .carousel-btn {
            display: none !important; /* カルーセル不要時は完全に非表示 */
        }
        
        .products-grid {
            display: grid;
            grid-template-columns: repeat(";
        // line 123
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "columns_count", [], "any", true, true, false, 123)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "columns_count", [], "any", false, false, false, 123), 5)) : (5)), "html", null, true);
        echo ", 1fr);
            gap: 20px;
            margin-bottom: 20px;
            min-height: 280px; /* 商品カード1行分の高さ + 少しの余白 (200px画像 + 60px情報部分 + 20px余白) */
        }
        
        /* 残りのCSS（商品カード等）は変更なし */
        .product-card {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
            background: white;
            cursor: pointer;
        }
        
        .product-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transform: translateY(-2px);
        }
        
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: #f8f9fa;
        }
        
        .product-info {
            padding: 15px;
        }
        
        .product-name {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
            color: #333;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .product-price {
            font-size: 16px;
            font-weight: bold;
            color: #e74c3c;
        }
        
        .product-list-button {
            text-align: center;
            margin-top: 20px;
        }
        
        .btn-product-list {
            background: #28a745;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .btn-product-list:hover {
            background: #218838;
            color: white;
            text-decoration: none;
            transform: translateY(-1px);
        }
        
        .loading {
            text-align: center;
            padding: 40px;
            color: #6c757d;
        }
        
        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .no-products-message {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
            font-size: 16px;
            background: #f8f9fa;
            border-radius: 8px;
            border: 2px dashed #dee2e6;
            margin: 20px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 200px;
        }
        
        .debug-info {
            background: #d1ecf1;
            color: #0c5460;
            padding: 10px;
            border-radius: 5px;
            font-size: 12px;
            margin-top: 20px;
        }
        
        @media (max-width: 768px) {
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
                min-height: 280px; /* モバイルでも同じ最小高さ */
            }
            
            .carousel-btn {
                width: 35px;
                height: 35px;
                font-size: 16px;
            }
            
            .no-products-message {
                padding: 40px 15px;
                min-height: 180px;
            }
        }
        
        @media (max-width: 480px) {
            .products-grid {
                grid-template-columns: 1fr;
                min-height: 280px; /* シングルカラムでも同じ */
            }
            
            .no-products-message {
                padding: 30px 10px;
                min-height: 160px;
                font-size: 14px;
            }
        }
    </style>

    ";
        // line 268
        if (twig_get_attribute($this->env, $this->source, ($context["block_data"] ?? null), "error", [], "any", true, true, false, 268)) {
            // line 269
            echo "        <div class=\"error-message\">
            <strong>エラーが発生しました:</strong> ";
            // line 270
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["block_data"]) || array_key_exists("block_data", $context) ? $context["block_data"] : (function () { throw new RuntimeError('Variable "block_data" does not exist.', 270, $this->source); })()), "error", [], "any", false, false, false, 270), "html", null, true);
            echo "
        </div>
    ";
        }
        // line 273
        echo "    
    ";
        // line 275
        echo "    ";
        if ((twig_length_filter($this->env, (isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 275, $this->source); })())) > 0)) {
            // line 276
            echo "        <div class=\"category-carousel-container\" id=\"categoryCarouselContainer\">
            <div class=\"category-carousel\">
                <div class=\"category-tags\" id=\"categoryTags\">
                    <a href=\"#\" class=\"category-tag active\" data-category-id=\"0\">すべて</a>
                    ";
            // line 280
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 280, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 281
                echo "                        <a href=\"#\" class=\"category-tag\" data-category-id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 281), "html", null, true);
                echo "\">
                            ";
                // line 282
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 282), "html", null, true);
                echo "
                        </a>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 285
            echo "                </div>
            </div>
            
            ";
            // line 289
            echo "            <button class=\"carousel-btn carousel-btn-prev\" id=\"carouselPrev\">
                <span>&#8249;</span>
            </button>
            <button class=\"carousel-btn carousel-btn-next\" id=\"carouselNext\">
                <span>&#8250;</span>
            </button>
        </div>
    ";
        }
        // line 297
        echo "    
    <div class=\"products-container\">
        <div class=\"loading\" id=\"productsLoading\" style=\"display: none;\">
            <i class=\"fa fa-spinner fa-spin\"></i> 読み込み中...
        </div>
        
        <div class=\"products-grid\" id=\"productsGrid\">
            ";
        // line 305
        echo "            ";
        $context["all_products"] = ((twig_get_attribute($this->env, $this->source, ($context["products"] ?? null), 0, [], "array", true, true, false, 305)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["products"] ?? null), 0, [], "array", false, false, false, 305), [])) : ([]));
        // line 306
        echo "            
            ";
        // line 307
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["all_products"]) || array_key_exists("all_products", $context) ? $context["all_products"] : (function () { throw new RuntimeError('Variable "all_products" does not exist.', 307, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 308
            echo "                <div class=\"product-card\" onclick=\"location.href='/products/detail/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "id", [], "any", false, false, false, 308), "html", null, true);
            echo "'\">
                    ";
            // line 309
            if (twig_get_attribute($this->env, $this->source, $context["product"], "image_path", [], "any", false, false, false, 309)) {
                // line 310
                echo "                        <img src=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "image_path", [], "any", false, false, false, 310), "html", null, true);
                echo "\" 
                            alt=\"";
                // line 311
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 311), "html", null, true);
                echo "\" class=\"product-image\">
                    ";
            } else {
                // line 313
                echo "                        <img src=\"/category-product/no-image\" alt=\"画像なし\" class=\"product-image\">
                    ";
            }
            // line 315
            echo "                    
                    <div class=\"product-info\">
                        <div class=\"product-name\">";
            // line 317
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 317), "html", null, true);
            echo "</div>
                        <div class=\"product-price\">¥";
            // line 318
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 318)), "html", null, true);
            echo "</div>
                    </div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 322
        echo "        </div>
    </div>

    ";
        // line 326
        echo "    <div class=\"product-list-button\">
        <a href=\"";
        // line 327
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_list");
        echo "\" class=\"btn-product-list\" id=\"productListButton\">
            商品一覧を見る
        </a>
    </div>

    ";
        // line 341
        echo "
    ";
        // line 343
        echo "    <script type=\"application/json\" id=\"productData\">
        ";
        // line 344
        echo json_encode((isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 344, $this->source); })()));
        echo "
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, initializing category product block...');
            
            // 重複実行防止
            if (window.categoryProductBlockInitialized) {
                console.log('Already initialized, skipping...');
                return;
            }
            
            const categoryTags = document.querySelectorAll('.category-tag');
            const categoryTagsContainer = document.getElementById('categoryTags');
            const carouselContainer = document.getElementById('categoryCarouselContainer');
            const productsGrid = document.getElementById('productsGrid');
            const productsLoading = document.getElementById('productsLoading');
            const productListButton = document.getElementById('productListButton');
            const carouselPrev = document.getElementById('carouselPrev');
            const carouselNext = document.getElementById('carouselNext');
            
            console.log('Elements found:', {
                categoryTags: categoryTags.length,
                categoryTagsContainer: !!categoryTagsContainer,
                carouselContainer: !!carouselContainer,
                carouselPrev: !!carouselPrev,
                carouselNext: !!carouselNext
            });
            
            // 必要な要素の確認
            if (!categoryTagsContainer || !carouselContainer || !carouselPrev || !carouselNext || categoryTags.length === 0) {
                console.warn('Required carousel elements not found or no categories');
                return;
            }
            
            // カルーセル設定
            let currentOffset = 0;
            let needsCarousel = false;
            
            // 商品データを取得
            let productData = {};
            try {
                const dataScript = document.getElementById('productData');
                if (dataScript) {
                    productData = JSON.parse(dataScript.textContent);
                    console.log('Product data loaded:', Object.keys(productData));
                }
            } catch (e) {
                console.error('Failed to parse product data:', e);
            }

            // カルーセル初期化関数
            function initCarousel() {
                console.log('Starting carousel initialization...');
                
                // レイアウトが完了するまで待つ
                requestAnimationFrame(function() {
                    requestAnimationFrame(function() {
                        console.log('Layout should be ready, calculating dimensions...');
                        
                        // 強制的にレイアウトを確定
                        carouselContainer.offsetHeight;
                        categoryTagsContainer.offsetWidth;
                        
                        // 寸法計算
                        const carousel = document.querySelector('.category-carousel');
                        const carouselRect = carousel.getBoundingClientRect();
                        const containerWidth = carouselRect.width;
                        
                        console.log('Container width:', containerWidth);
                        
                        if (containerWidth <= 0) {
                            console.warn('Container width is 0, retrying...');
                            setTimeout(initCarousel, 100);
                            return;
                        }
                        
                        // タグの総幅を計算
                        let totalTagsWidth = 0;
                        let maxTagWidth = 0;
                        
                        console.log('Calculating tag dimensions...');
                        categoryTags.forEach(function(tag, index) {
                            const tagRect = tag.getBoundingClientRect();
                            const tagWidth = tagRect.width;
                            totalTagsWidth += tagWidth + 10; // gap分も追加
                            maxTagWidth = Math.max(maxTagWidth, tagWidth);
                            
                            console.log(`Tag \${index} (\${tag.textContent}): width=\${tagWidth}`);
                        });
                        totalTagsWidth -= 10; // 最後のgapは除く
                        
                        // 平均的なタグ幅を計算（gap込み）
                        const averageTagWidth = maxTagWidth + 10;
                        
                        console.log('Tag width calculation:', {
                            totalTagsWidth: totalTagsWidth,
                            containerWidth: containerWidth,
                            averageTagWidth: averageTagWidth,
                            maxTagWidth: maxTagWidth,
                            tagCount: categoryTags.length
                        });
                        
                        // カルーセルが必要かどうかを判定（少し余裕を持って）
                        needsCarousel = totalTagsWidth > (containerWidth - 20);
                        
                        console.log('Needs carousel:', needsCarousel);
                        
                        if (needsCarousel) {
                            // カルーセル有効
                            carouselContainer.classList.remove('no-carousel');
                            carouselPrev.classList.add('show');
                            carouselNext.classList.add('show');
                            
                            // 初期状態では両ボタンを有効にする（後でupdateCarouselで正しく設定される）
                            carouselPrev.classList.remove('disabled');
                            carouselNext.classList.remove('disabled');
                            
                            // カルーセル計算用のタグ幅を保存
                            window.carouselTagWidth = averageTagWidth;
                            
                            console.log('Carousel enabled, buttons should be visible and clickable');
                            console.log('Stored tag width for carousel:', window.carouselTagWidth);
                        } else {
                            // カルーセル無効
                            carouselContainer.classList.add('no-carousel');
                            carouselPrev.classList.remove('show');
                            carouselNext.classList.remove('show');
                            currentOffset = 0;
                            categoryTagsContainer.style.transform = 'translateX(0)';
                            console.log('Carousel disabled');
                        }
                        
                        updateCarousel();
                        
                        // 初期化完了フラグ
                        window.categoryProductBlockInitialized = true;
                        console.log('Carousel initialization complete');
                        
                        // デバッグ: ボタンの最終状態を確認
                        setTimeout(function() {
                            console.log('Final button state check:', {
                                prevVisible: window.getComputedStyle(carouselPrev).visibility,
                                prevOpacity: window.getComputedStyle(carouselPrev).opacity,
                                prevDisplay: window.getComputedStyle(carouselPrev).display,
                                nextVisible: window.getComputedStyle(carouselNext).visibility,
                                nextOpacity: window.getComputedStyle(carouselNext).opacity,
                                nextDisplay: window.getComputedStyle(carouselNext).display,
                                needsCarousel: needsCarousel,
                                currentOffset: currentOffset
                            });
                            
                            // 手動でボタンをテスト
                            console.log('Testing button functionality...');
                            console.log('Prev button element:', carouselPrev);
                            console.log('Next button element:', carouselNext);
                            
                            // ボタンに直接クリックイベントをテスト
                            if (carouselPrev) {
                                console.log('Prev button can be clicked:', !carouselPrev.disabled);
                            }
                            if (carouselNext) {
                                console.log('Next button can be clicked:', !carouselNext.disabled);
                            }
                        }, 100);
                    });
                });
            }

            function updateCarousel() {
                if (!needsCarousel) {
                    return;
                }
                
                // 保存されたタグ幅を使用、または再計算
                let tagWidth = window.carouselTagWidth;
                if (!tagWidth && categoryTags.length > 0) {
                    const firstTag = categoryTags[0];
                    const tagRect = firstTag.getBoundingClientRect();
                    tagWidth = tagRect.width + 10; // gap込み
                    window.carouselTagWidth = tagWidth;
                }
                
                const carousel = document.querySelector('.category-carousel');
                const containerWidth = carousel.getBoundingClientRect().width;
                
                // 表示可能なタグ数（より保守的に計算）
                const visibleTags = Math.floor((containerWidth - 40) / tagWidth); // パディング分を考慮
                const maxOffset = Math.max(0, categoryTags.length - visibleTags);
                
                console.log('UpdateCarousel calculation:', {
                    tagWidth: tagWidth,
                    containerWidth: containerWidth,
                    totalTags: categoryTags.length,
                    visibleTags: visibleTags,
                    maxOffset: maxOffset,
                    currentOffset: currentOffset
                });
                
                // オフセット調整
                currentOffset = Math.max(0, Math.min(currentOffset, maxOffset));
                
                const translateX = -currentOffset * tagWidth;
                categoryTagsContainer.style.transform = `translateX(\${translateX}px)`;
                
                console.log('Carousel update:', {
                    currentOffset: currentOffset,
                    maxOffset: maxOffset,
                    visibleTags: visibleTags,
                    translateX: translateX
                });
                
                // ボタン状態更新
                updateButtonStates(maxOffset);
            }
            
            function updateButtonStates(maxOffset) {
                if (!carouselPrev || !carouselNext) return;
                
                console.log('Updating button states:', {
                    currentOffset: currentOffset,
                    maxOffset: maxOffset
                });
                
                // 前へボタン
                if (currentOffset <= 0) {
                    carouselPrev.classList.add('disabled');
                    console.log('Prev button disabled');
                } else {
                    carouselPrev.classList.remove('disabled');
                    console.log('Prev button enabled');
                }
                
                // 次へボタン
                if (currentOffset >= maxOffset) {
                    carouselNext.classList.add('disabled');
                    console.log('Next button disabled');
                } else {
                    carouselNext.classList.remove('disabled');
                    console.log('Next button enabled');
                }
            }

            // イベントリスナー設定
            function setupEventListeners() {
                console.log('Setting up event listeners...');
                
                // カテゴリータグのクリック
                categoryTags.forEach(function(tag) {
                    tag.addEventListener('click', function(e) {
                        e.preventDefault();
                        
                        const categoryId = parseInt(this.dataset.categoryId);
                        
                        // アクティブ状態の更新
                        categoryTags.forEach(t => t.classList.remove('active'));
                        this.classList.add('active');
                        
                        // 商品一覧ボタンのリンク更新
                        if (productListButton) {
                            if (categoryId > 0) {
                                productListButton.href = '";
        // line 606
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_list");
        echo "?category_id=' + categoryId;
                            } else {
                                productListButton.href = '";
        // line 608
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_list");
        echo "';
                            }
                        }
                        
                        // 商品表示の切り替え
                        updateProductsGrid(categoryId);
                    });
                });

                // カルーセルボタンのデバッグ情報
                console.log('Carousel buttons:', {
                    prev: carouselPrev,
                    next: carouselNext,
                    prevClassList: carouselPrev ? carouselPrev.classList.toString() : 'null',
                    nextClassList: carouselNext ? carouselNext.classList.toString() : 'null'
                });

                // カルーセルボタンのクリック（より確実な設定）
                if (carouselPrev) {
                    console.log('Adding event listener to prev button');
                    carouselPrev.addEventListener('click', function(e) {
                        console.log('=== PREV BUTTON CLICKED ===');
                        e.preventDefault();
                        e.stopPropagation();
                        
                        console.log('Button state:', {
                            disabled: this.classList.contains('disabled'),
                            currentOffset: currentOffset,
                            needsCarousel: needsCarousel
                        });
                        
                        if (!this.classList.contains('disabled') && currentOffset > 0 && needsCarousel) {
                            console.log('Moving prev from offset:', currentOffset);
                            currentOffset = Math.max(0, currentOffset - 1);
                            console.log('New offset:', currentOffset);
                            updateCarousel();
                        } else {
                            console.log('Prev button click ignored:', {
                                disabled: this.classList.contains('disabled'),
                                atStart: currentOffset <= 0,
                                needsCarousel: needsCarousel
                            });
                        }
                    });
                    
                    // ホバーテスト
                    carouselPrev.addEventListener('mouseenter', function() {
                        console.log('Prev button hover enter');
                    });
                    carouselPrev.addEventListener('mouseleave', function() {
                        console.log('Prev button hover leave');
                    });
                } else {
                    console.error('Prev button not found!');
                }

                if (carouselNext) {
                    console.log('Adding event listener to next button');
                    carouselNext.addEventListener('click', function(e) {
                        console.log('=== NEXT BUTTON CLICKED ===');
                        e.preventDefault();
                        e.stopPropagation();
                        
                        console.log('Button state:', {
                            disabled: this.classList.contains('disabled'),
                            currentOffset: currentOffset,
                            needsCarousel: needsCarousel
                        });
                        
                        if (!this.classList.contains('disabled') && needsCarousel) {
                            // より確実な計算
                            const carousel = document.querySelector('.category-carousel');
                            if (!carousel) {
                                console.error('Carousel container not found');
                                return;
                            }
                            
                            const containerWidth = carousel.getBoundingClientRect().width;
                            console.log('Container width:', containerWidth);
                            
                            if (categoryTags.length === 0) {
                                console.error('No category tags found');
                                return;
                            }
                            
                            // 保存されたタグ幅を使用
                            let tagWidth = window.carouselTagWidth;
                            if (!tagWidth) {
                                const firstTag = categoryTags[0];
                                const tagRect = firstTag.getBoundingClientRect();
                                tagWidth = tagRect.width + 10; // gap込み
                            }
                            
                            console.log('Tag width:', tagWidth);
                            
                            const visibleTags = Math.floor((containerWidth - 40) / tagWidth); // パディング考慮
                            const maxOffset = Math.max(0, categoryTags.length - visibleTags);
                            
                            console.log('Calculation:', {
                                totalTags: categoryTags.length,
                                visibleTags: visibleTags,
                                maxOffset: maxOffset,
                                currentOffset: currentOffset
                            });
                            
                            if (currentOffset < maxOffset) {
                                console.log('Moving next from offset:', currentOffset);
                                currentOffset = Math.min(maxOffset, currentOffset + 1);
                                console.log('New offset:', currentOffset);
                                updateCarousel();
                            } else {
                                console.log('Next button click ignored - at end:', {
                                    currentOffset: currentOffset,
                                    maxOffset: maxOffset
                                });
                            }
                        } else {
                            console.log('Next button click ignored:', {
                                disabled: this.classList.contains('disabled'),
                                needsCarousel: needsCarousel
                            });
                        }
                    });
                    
                    // ホバーテスト
                    carouselNext.addEventListener('mouseenter', function() {
                        console.log('Next button hover enter');
                    });
                    carouselNext.addEventListener('mouseleave', function() {
                        console.log('Next button hover leave');
                    });
                } else {
                    console.error('Next button not found!');
                }
            }

            function updateProductsGrid(categoryId) {
                const products = productData[categoryId] || [];
                
                console.log('Updating grid for category:', categoryId, 'Products:', products.length);
                
                if (products.length === 0) {
                    productsGrid.innerHTML = '<div class=\"no-products-message\">このカテゴリーには商品がありません</div>';
                    return;
                }
                
                let html = '';
                products.forEach(function(product) {
                    const imageSrc = product.image_path || '/category-product/no-image';
                    const imageHtml = `<img src=\"\${imageSrc}\" alt=\"\${escapeHtml(product.name)}\" class=\"product-image\" onerror=\"this.src='/category-product/no-image'; this.onerror=null;\">`;
                    
                    html += `
                        <div class=\"product-card\" onclick=\"location.href='/products/detail/\${product.id}'\">
                            \${imageHtml}
                            <div class=\"product-info\">
                                <div class=\"product-name\">\${escapeHtml(product.name)}</div>
                                <div class=\"product-price\">¥\${product.price.toLocaleString()}</div>
                            </div>
                        </div>
                    `;
                });
                
                productsGrid.innerHTML = html;
            }
            
            function escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }

            // 初期化実行
            setupEventListeners();
            
            // 少し遅延を持たせて初期化
            setTimeout(function() {
                console.log('Starting delayed initialization...');
                initCarousel();
            }, 50);

            // リサイズ時の再計算
            let resizeTimeout;
            window.addEventListener('resize', function() {
                if (!window.categoryProductBlockInitialized) return;
                
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(function() {
                    console.log('Resize detected, reinitializing...');
                    window.categoryProductBlockInitialized = false;
                    currentOffset = 0;
                    initCarousel();
                }, 200);
            });
        });
    </script>
</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "Block/category_product_block.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  724 => 608,  719 => 606,  454 => 344,  451 => 343,  448 => 341,  440 => 327,  437 => 326,  432 => 322,  422 => 318,  418 => 317,  414 => 315,  410 => 313,  405 => 311,  400 => 310,  398 => 309,  393 => 308,  389 => 307,  386 => 306,  383 => 305,  374 => 297,  364 => 289,  359 => 285,  350 => 282,  345 => 281,  341 => 280,  335 => 276,  332 => 275,  329 => 273,  323 => 270,  320 => 269,  318 => 268,  170 => 123,  51 => 6,  49 => 5,  47 => 4,  45 => 3,  43 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# カテゴリー商品ブロック #}
{% set block_data = category_product_data() %}
{% set config = block_data.config %}
{% set categories = block_data.categories %}
{% set products = block_data.products %}

<div class=\"category-product-block\" id=\"categoryProductBlock\">
    <style>
        /* 既存のCSS + カルーセル用CSS */
        .category-product-block {
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .category-carousel-container {
            position: relative;
            margin-bottom: 20px;
            padding: 0 50px; /* 左右にボタン用のスペースを確保 */
        }
        
        .category-carousel {
            overflow: hidden;
            position: relative;
            width: 100%; /* 親コンテナの幅いっぱい */
        }
        
        .category-tags {
            display: flex;
            gap: 10px;
            transition: transform 0.3s ease;
            flex-wrap: nowrap;
            justify-content: flex-start;
            width: max-content; /* コンテンツに合わせた幅 */
        }
        
        .category-tag {
            background: #f8f9fa;
            border: 2px solid #dee2e6;
            border-radius: 25px;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            color: #495057;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            flex-shrink: 0;
            min-width: fit-content; /* 最小幅をコンテンツに合わせる */
        }
        
        .category-tag:hover,
        .category-tag.active {
            background: #007bff;
            border-color: #007bff;
            color: white;
            text-decoration: none;
        }
        
        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid #dee2e6;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex; /* 常に flex として表示 */
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: all 0.3s ease;
            font-size: 18px;
            color: #495057;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            opacity: 0; /* 初期状態は透明 */
            visibility: hidden; /* 初期状態は非表示 */
        }
        
        .carousel-btn:hover:not(.disabled) {
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            transform: translateY(-50%) scale(1.05);
        }
        
        .carousel-btn.show {
            opacity: 1;
            visibility: visible;
        }
        
        .carousel-btn.disabled {
            opacity: 0.3;
            cursor: not-allowed;
            pointer-events: none;
        }
        
        .carousel-btn-prev {
            left: 10px; /* コンテナの左端から10px */
        }
        
        .carousel-btn-next {
            right: 10px; /* コンテナの右端から10px */
        }
        
        /* カルーセルが不要な場合のスタイル */
        .category-carousel-container.no-carousel {
            padding: 0; /* パディングを削除 */
        }
        
        .category-carousel-container.no-carousel .category-tags {
            justify-content: center; /* 中央寄せ */
            flex-wrap: wrap; /* 折り返し許可 */
        }
        
        .category-carousel-container.no-carousel .carousel-btn {
            display: none !important; /* カルーセル不要時は完全に非表示 */
        }
        
        .products-grid {
            display: grid;
            grid-template-columns: repeat({{ config.columns_count|default(5) }}, 1fr);
            gap: 20px;
            margin-bottom: 20px;
            min-height: 280px; /* 商品カード1行分の高さ + 少しの余白 (200px画像 + 60px情報部分 + 20px余白) */
        }
        
        /* 残りのCSS（商品カード等）は変更なし */
        .product-card {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
            background: white;
            cursor: pointer;
        }
        
        .product-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transform: translateY(-2px);
        }
        
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: #f8f9fa;
        }
        
        .product-info {
            padding: 15px;
        }
        
        .product-name {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
            color: #333;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .product-price {
            font-size: 16px;
            font-weight: bold;
            color: #e74c3c;
        }
        
        .product-list-button {
            text-align: center;
            margin-top: 20px;
        }
        
        .btn-product-list {
            background: #28a745;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .btn-product-list:hover {
            background: #218838;
            color: white;
            text-decoration: none;
            transform: translateY(-1px);
        }
        
        .loading {
            text-align: center;
            padding: 40px;
            color: #6c757d;
        }
        
        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .no-products-message {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
            font-size: 16px;
            background: #f8f9fa;
            border-radius: 8px;
            border: 2px dashed #dee2e6;
            margin: 20px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 200px;
        }
        
        .debug-info {
            background: #d1ecf1;
            color: #0c5460;
            padding: 10px;
            border-radius: 5px;
            font-size: 12px;
            margin-top: 20px;
        }
        
        @media (max-width: 768px) {
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
                min-height: 280px; /* モバイルでも同じ最小高さ */
            }
            
            .carousel-btn {
                width: 35px;
                height: 35px;
                font-size: 16px;
            }
            
            .no-products-message {
                padding: 40px 15px;
                min-height: 180px;
            }
        }
        
        @media (max-width: 480px) {
            .products-grid {
                grid-template-columns: 1fr;
                min-height: 280px; /* シングルカラムでも同じ */
            }
            
            .no-products-message {
                padding: 30px 10px;
                min-height: 160px;
                font-size: 14px;
            }
        }
    </style>

    {% if block_data.error is defined %}
        <div class=\"error-message\">
            <strong>エラーが発生しました:</strong> {{ block_data.error }}
        </div>
    {% endif %}
    
    {# カルーセル付きカテゴリータグ表示（カテゴリーが存在する場合のみ） #}
    {% if categories|length > 0 %}
        <div class=\"category-carousel-container\" id=\"categoryCarouselContainer\">
            <div class=\"category-carousel\">
                <div class=\"category-tags\" id=\"categoryTags\">
                    <a href=\"#\" class=\"category-tag active\" data-category-id=\"0\">すべて</a>
                    {% for category in categories %}
                        <a href=\"#\" class=\"category-tag\" data-category-id=\"{{ category.id }}\">
                            {{ category.name }}
                        </a>
                    {% endfor %}
                </div>
            </div>
            
            {# カルーセル制御ボタン（静的に作成） #}
            <button class=\"carousel-btn carousel-btn-prev\" id=\"carouselPrev\">
                <span>&#8249;</span>
            </button>
            <button class=\"carousel-btn carousel-btn-next\" id=\"carouselNext\">
                <span>&#8250;</span>
            </button>
        </div>
    {% endif %}
    
    <div class=\"products-container\">
        <div class=\"loading\" id=\"productsLoading\" style=\"display: none;\">
            <i class=\"fa fa-spinner fa-spin\"></i> 読み込み中...
        </div>
        
        <div class=\"products-grid\" id=\"productsGrid\">
            {# デフォルトは「すべて」カテゴリー（キー0）の商品を表示 #}
            {% set all_products = products[0]|default([]) %}
            
            {% for product in all_products %}
                <div class=\"product-card\" onclick=\"location.href='/products/detail/{{ product.id }}'\">
                    {% if product.image_path %}
                        <img src=\"{{ product.image_path }}\" 
                            alt=\"{{ product.name }}\" class=\"product-image\">
                    {% else %}
                        <img src=\"/category-product/no-image\" alt=\"画像なし\" class=\"product-image\">
                    {% endif %}
                    
                    <div class=\"product-info\">
                        <div class=\"product-name\">{{ product.name }}</div>
                        <div class=\"product-price\">¥{{ product.price|number_format }}</div>
                    </div>
                </div>
            {% endfor %}
        </div>
    </div>

    {# 常に商品一覧ボタンを表示 #}
    <div class=\"product-list-button\">
        <a href=\"{{ url('product_list') }}\" class=\"btn-product-list\" id=\"productListButton\">
            商品一覧を見る
        </a>
    </div>

    {# {% if app.debug %}
        <div class=\"debug-info\">
            <strong>デバッグ情報:</strong><br>
            カテゴリー数: {{ categories|length }}<br>
            すべて商品数: {{ products[0]|default([])|length }}<br>
            商品総数: {% set total = 0 %}{% for cat_id, cat_products in products %}{% set total = total + cat_products|length %}{% endfor %}{{ total }}<br>
            設定: {{ config.display_count }}/{{ config.columns_count }}/{{ config.rows_count }}<br>
        </div>
    {% endif %} #}

    {# 商品データをJavaScript用に埋め込み #}
    <script type=\"application/json\" id=\"productData\">
        {{ products|json_encode|raw }}
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, initializing category product block...');
            
            // 重複実行防止
            if (window.categoryProductBlockInitialized) {
                console.log('Already initialized, skipping...');
                return;
            }
            
            const categoryTags = document.querySelectorAll('.category-tag');
            const categoryTagsContainer = document.getElementById('categoryTags');
            const carouselContainer = document.getElementById('categoryCarouselContainer');
            const productsGrid = document.getElementById('productsGrid');
            const productsLoading = document.getElementById('productsLoading');
            const productListButton = document.getElementById('productListButton');
            const carouselPrev = document.getElementById('carouselPrev');
            const carouselNext = document.getElementById('carouselNext');
            
            console.log('Elements found:', {
                categoryTags: categoryTags.length,
                categoryTagsContainer: !!categoryTagsContainer,
                carouselContainer: !!carouselContainer,
                carouselPrev: !!carouselPrev,
                carouselNext: !!carouselNext
            });
            
            // 必要な要素の確認
            if (!categoryTagsContainer || !carouselContainer || !carouselPrev || !carouselNext || categoryTags.length === 0) {
                console.warn('Required carousel elements not found or no categories');
                return;
            }
            
            // カルーセル設定
            let currentOffset = 0;
            let needsCarousel = false;
            
            // 商品データを取得
            let productData = {};
            try {
                const dataScript = document.getElementById('productData');
                if (dataScript) {
                    productData = JSON.parse(dataScript.textContent);
                    console.log('Product data loaded:', Object.keys(productData));
                }
            } catch (e) {
                console.error('Failed to parse product data:', e);
            }

            // カルーセル初期化関数
            function initCarousel() {
                console.log('Starting carousel initialization...');
                
                // レイアウトが完了するまで待つ
                requestAnimationFrame(function() {
                    requestAnimationFrame(function() {
                        console.log('Layout should be ready, calculating dimensions...');
                        
                        // 強制的にレイアウトを確定
                        carouselContainer.offsetHeight;
                        categoryTagsContainer.offsetWidth;
                        
                        // 寸法計算
                        const carousel = document.querySelector('.category-carousel');
                        const carouselRect = carousel.getBoundingClientRect();
                        const containerWidth = carouselRect.width;
                        
                        console.log('Container width:', containerWidth);
                        
                        if (containerWidth <= 0) {
                            console.warn('Container width is 0, retrying...');
                            setTimeout(initCarousel, 100);
                            return;
                        }
                        
                        // タグの総幅を計算
                        let totalTagsWidth = 0;
                        let maxTagWidth = 0;
                        
                        console.log('Calculating tag dimensions...');
                        categoryTags.forEach(function(tag, index) {
                            const tagRect = tag.getBoundingClientRect();
                            const tagWidth = tagRect.width;
                            totalTagsWidth += tagWidth + 10; // gap分も追加
                            maxTagWidth = Math.max(maxTagWidth, tagWidth);
                            
                            console.log(`Tag \${index} (\${tag.textContent}): width=\${tagWidth}`);
                        });
                        totalTagsWidth -= 10; // 最後のgapは除く
                        
                        // 平均的なタグ幅を計算（gap込み）
                        const averageTagWidth = maxTagWidth + 10;
                        
                        console.log('Tag width calculation:', {
                            totalTagsWidth: totalTagsWidth,
                            containerWidth: containerWidth,
                            averageTagWidth: averageTagWidth,
                            maxTagWidth: maxTagWidth,
                            tagCount: categoryTags.length
                        });
                        
                        // カルーセルが必要かどうかを判定（少し余裕を持って）
                        needsCarousel = totalTagsWidth > (containerWidth - 20);
                        
                        console.log('Needs carousel:', needsCarousel);
                        
                        if (needsCarousel) {
                            // カルーセル有効
                            carouselContainer.classList.remove('no-carousel');
                            carouselPrev.classList.add('show');
                            carouselNext.classList.add('show');
                            
                            // 初期状態では両ボタンを有効にする（後でupdateCarouselで正しく設定される）
                            carouselPrev.classList.remove('disabled');
                            carouselNext.classList.remove('disabled');
                            
                            // カルーセル計算用のタグ幅を保存
                            window.carouselTagWidth = averageTagWidth;
                            
                            console.log('Carousel enabled, buttons should be visible and clickable');
                            console.log('Stored tag width for carousel:', window.carouselTagWidth);
                        } else {
                            // カルーセル無効
                            carouselContainer.classList.add('no-carousel');
                            carouselPrev.classList.remove('show');
                            carouselNext.classList.remove('show');
                            currentOffset = 0;
                            categoryTagsContainer.style.transform = 'translateX(0)';
                            console.log('Carousel disabled');
                        }
                        
                        updateCarousel();
                        
                        // 初期化完了フラグ
                        window.categoryProductBlockInitialized = true;
                        console.log('Carousel initialization complete');
                        
                        // デバッグ: ボタンの最終状態を確認
                        setTimeout(function() {
                            console.log('Final button state check:', {
                                prevVisible: window.getComputedStyle(carouselPrev).visibility,
                                prevOpacity: window.getComputedStyle(carouselPrev).opacity,
                                prevDisplay: window.getComputedStyle(carouselPrev).display,
                                nextVisible: window.getComputedStyle(carouselNext).visibility,
                                nextOpacity: window.getComputedStyle(carouselNext).opacity,
                                nextDisplay: window.getComputedStyle(carouselNext).display,
                                needsCarousel: needsCarousel,
                                currentOffset: currentOffset
                            });
                            
                            // 手動でボタンをテスト
                            console.log('Testing button functionality...');
                            console.log('Prev button element:', carouselPrev);
                            console.log('Next button element:', carouselNext);
                            
                            // ボタンに直接クリックイベントをテスト
                            if (carouselPrev) {
                                console.log('Prev button can be clicked:', !carouselPrev.disabled);
                            }
                            if (carouselNext) {
                                console.log('Next button can be clicked:', !carouselNext.disabled);
                            }
                        }, 100);
                    });
                });
            }

            function updateCarousel() {
                if (!needsCarousel) {
                    return;
                }
                
                // 保存されたタグ幅を使用、または再計算
                let tagWidth = window.carouselTagWidth;
                if (!tagWidth && categoryTags.length > 0) {
                    const firstTag = categoryTags[0];
                    const tagRect = firstTag.getBoundingClientRect();
                    tagWidth = tagRect.width + 10; // gap込み
                    window.carouselTagWidth = tagWidth;
                }
                
                const carousel = document.querySelector('.category-carousel');
                const containerWidth = carousel.getBoundingClientRect().width;
                
                // 表示可能なタグ数（より保守的に計算）
                const visibleTags = Math.floor((containerWidth - 40) / tagWidth); // パディング分を考慮
                const maxOffset = Math.max(0, categoryTags.length - visibleTags);
                
                console.log('UpdateCarousel calculation:', {
                    tagWidth: tagWidth,
                    containerWidth: containerWidth,
                    totalTags: categoryTags.length,
                    visibleTags: visibleTags,
                    maxOffset: maxOffset,
                    currentOffset: currentOffset
                });
                
                // オフセット調整
                currentOffset = Math.max(0, Math.min(currentOffset, maxOffset));
                
                const translateX = -currentOffset * tagWidth;
                categoryTagsContainer.style.transform = `translateX(\${translateX}px)`;
                
                console.log('Carousel update:', {
                    currentOffset: currentOffset,
                    maxOffset: maxOffset,
                    visibleTags: visibleTags,
                    translateX: translateX
                });
                
                // ボタン状態更新
                updateButtonStates(maxOffset);
            }
            
            function updateButtonStates(maxOffset) {
                if (!carouselPrev || !carouselNext) return;
                
                console.log('Updating button states:', {
                    currentOffset: currentOffset,
                    maxOffset: maxOffset
                });
                
                // 前へボタン
                if (currentOffset <= 0) {
                    carouselPrev.classList.add('disabled');
                    console.log('Prev button disabled');
                } else {
                    carouselPrev.classList.remove('disabled');
                    console.log('Prev button enabled');
                }
                
                // 次へボタン
                if (currentOffset >= maxOffset) {
                    carouselNext.classList.add('disabled');
                    console.log('Next button disabled');
                } else {
                    carouselNext.classList.remove('disabled');
                    console.log('Next button enabled');
                }
            }

            // イベントリスナー設定
            function setupEventListeners() {
                console.log('Setting up event listeners...');
                
                // カテゴリータグのクリック
                categoryTags.forEach(function(tag) {
                    tag.addEventListener('click', function(e) {
                        e.preventDefault();
                        
                        const categoryId = parseInt(this.dataset.categoryId);
                        
                        // アクティブ状態の更新
                        categoryTags.forEach(t => t.classList.remove('active'));
                        this.classList.add('active');
                        
                        // 商品一覧ボタンのリンク更新
                        if (productListButton) {
                            if (categoryId > 0) {
                                productListButton.href = '{{ url(\"product_list\") }}?category_id=' + categoryId;
                            } else {
                                productListButton.href = '{{ url(\"product_list\") }}';
                            }
                        }
                        
                        // 商品表示の切り替え
                        updateProductsGrid(categoryId);
                    });
                });

                // カルーセルボタンのデバッグ情報
                console.log('Carousel buttons:', {
                    prev: carouselPrev,
                    next: carouselNext,
                    prevClassList: carouselPrev ? carouselPrev.classList.toString() : 'null',
                    nextClassList: carouselNext ? carouselNext.classList.toString() : 'null'
                });

                // カルーセルボタンのクリック（より確実な設定）
                if (carouselPrev) {
                    console.log('Adding event listener to prev button');
                    carouselPrev.addEventListener('click', function(e) {
                        console.log('=== PREV BUTTON CLICKED ===');
                        e.preventDefault();
                        e.stopPropagation();
                        
                        console.log('Button state:', {
                            disabled: this.classList.contains('disabled'),
                            currentOffset: currentOffset,
                            needsCarousel: needsCarousel
                        });
                        
                        if (!this.classList.contains('disabled') && currentOffset > 0 && needsCarousel) {
                            console.log('Moving prev from offset:', currentOffset);
                            currentOffset = Math.max(0, currentOffset - 1);
                            console.log('New offset:', currentOffset);
                            updateCarousel();
                        } else {
                            console.log('Prev button click ignored:', {
                                disabled: this.classList.contains('disabled'),
                                atStart: currentOffset <= 0,
                                needsCarousel: needsCarousel
                            });
                        }
                    });
                    
                    // ホバーテスト
                    carouselPrev.addEventListener('mouseenter', function() {
                        console.log('Prev button hover enter');
                    });
                    carouselPrev.addEventListener('mouseleave', function() {
                        console.log('Prev button hover leave');
                    });
                } else {
                    console.error('Prev button not found!');
                }

                if (carouselNext) {
                    console.log('Adding event listener to next button');
                    carouselNext.addEventListener('click', function(e) {
                        console.log('=== NEXT BUTTON CLICKED ===');
                        e.preventDefault();
                        e.stopPropagation();
                        
                        console.log('Button state:', {
                            disabled: this.classList.contains('disabled'),
                            currentOffset: currentOffset,
                            needsCarousel: needsCarousel
                        });
                        
                        if (!this.classList.contains('disabled') && needsCarousel) {
                            // より確実な計算
                            const carousel = document.querySelector('.category-carousel');
                            if (!carousel) {
                                console.error('Carousel container not found');
                                return;
                            }
                            
                            const containerWidth = carousel.getBoundingClientRect().width;
                            console.log('Container width:', containerWidth);
                            
                            if (categoryTags.length === 0) {
                                console.error('No category tags found');
                                return;
                            }
                            
                            // 保存されたタグ幅を使用
                            let tagWidth = window.carouselTagWidth;
                            if (!tagWidth) {
                                const firstTag = categoryTags[0];
                                const tagRect = firstTag.getBoundingClientRect();
                                tagWidth = tagRect.width + 10; // gap込み
                            }
                            
                            console.log('Tag width:', tagWidth);
                            
                            const visibleTags = Math.floor((containerWidth - 40) / tagWidth); // パディング考慮
                            const maxOffset = Math.max(0, categoryTags.length - visibleTags);
                            
                            console.log('Calculation:', {
                                totalTags: categoryTags.length,
                                visibleTags: visibleTags,
                                maxOffset: maxOffset,
                                currentOffset: currentOffset
                            });
                            
                            if (currentOffset < maxOffset) {
                                console.log('Moving next from offset:', currentOffset);
                                currentOffset = Math.min(maxOffset, currentOffset + 1);
                                console.log('New offset:', currentOffset);
                                updateCarousel();
                            } else {
                                console.log('Next button click ignored - at end:', {
                                    currentOffset: currentOffset,
                                    maxOffset: maxOffset
                                });
                            }
                        } else {
                            console.log('Next button click ignored:', {
                                disabled: this.classList.contains('disabled'),
                                needsCarousel: needsCarousel
                            });
                        }
                    });
                    
                    // ホバーテスト
                    carouselNext.addEventListener('mouseenter', function() {
                        console.log('Next button hover enter');
                    });
                    carouselNext.addEventListener('mouseleave', function() {
                        console.log('Next button hover leave');
                    });
                } else {
                    console.error('Next button not found!');
                }
            }

            function updateProductsGrid(categoryId) {
                const products = productData[categoryId] || [];
                
                console.log('Updating grid for category:', categoryId, 'Products:', products.length);
                
                if (products.length === 0) {
                    productsGrid.innerHTML = '<div class=\"no-products-message\">このカテゴリーには商品がありません</div>';
                    return;
                }
                
                let html = '';
                products.forEach(function(product) {
                    const imageSrc = product.image_path || '/category-product/no-image';
                    const imageHtml = `<img src=\"\${imageSrc}\" alt=\"\${escapeHtml(product.name)}\" class=\"product-image\" onerror=\"this.src='/category-product/no-image'; this.onerror=null;\">`;
                    
                    html += `
                        <div class=\"product-card\" onclick=\"location.href='/products/detail/\${product.id}'\">
                            \${imageHtml}
                            <div class=\"product-info\">
                                <div class=\"product-name\">\${escapeHtml(product.name)}</div>
                                <div class=\"product-price\">¥\${product.price.toLocaleString()}</div>
                            </div>
                        </div>
                    `;
                });
                
                productsGrid.innerHTML = html;
            }
            
            function escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }

            // 初期化実行
            setupEventListeners();
            
            // 少し遅延を持たせて初期化
            setTimeout(function() {
                console.log('Starting delayed initialization...');
                initCarousel();
            }, 50);

            // リサイズ時の再計算
            let resizeTimeout;
            window.addEventListener('resize', function() {
                if (!window.categoryProductBlockInitialized) return;
                
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(function() {
                    console.log('Resize detected, reinitializing...');
                    window.categoryProductBlockInitialized = false;
                    currentOffset = 0;
                    initCarousel();
                }, 200);
            });
        });
    </script>
</div>", "Block/category_product_block.twig", "/home/asa3150/www/ec-cube/html/app/Plugin/CategoryProductBlock/Block/category_product_block.twig");
    }
}
