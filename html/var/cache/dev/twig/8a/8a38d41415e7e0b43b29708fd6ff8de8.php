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

/* Block/new_item.twig */
class __TwigTemplate_504de5912d0956ab6307ce31bdc8c5bc extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/new_item.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/new_item.twig"));

        // line 8
        echo "<div class=\"ec-role\">
    <div class=\"ec-newItemRole\">
        <style>
            .ec-newItemRole {
                padding: 20px;
                margin-bottom: 30px;
                
            }
            
            .ec-newItemRole__heading {
                text-align: center;
                margin-bottom: 20px;
            }
            
            .ec-newItemRole__title {
                font-size: 24px;
                font-weight: bold;
                color: #333;
                margin-bottom: 15px;
            }
            
            .ec-newItemRole__grid {
                display: grid;
                grid-template-columns: repeat(7, 1fr);
                gap: 10px;
                margin-bottom: 30px;
                /*min-height: 280px;*/
                transition: all 0.3s ease;
            }
            
            /* 商品数に応じた動的調整用のクラス */
            .ec-newItemRole__grid.auto-fit {
                justify-content: center;
                max-width: fit-content;
                margin-left: auto;
                margin-right: auto;
            }
            
            /* 商品数別の最適化 */
            .ec-newItemRole__grid[data-count=\"1\"] {
                grid-template-columns: 1fr;
                max-width: 200px;
            }
            
            .ec-newItemRole__grid[data-count=\"2\"] {
                grid-template-columns: repeat(2, 1fr);
                max-width: 440px;
            }
            
            .ec-newItemRole__grid[data-count=\"3\"] {
                grid-template-columns: repeat(3, 1fr);
                max-width: 680px;
            }
            
            .ec-newItemRole__grid[data-count=\"4\"] {
                grid-template-columns: repeat(4, 1fr);
                max-width: 920px;
            }
            
            .ec-newItemRole__grid[data-count=\"5\"] {
                grid-template-columns: repeat(5, 1fr);
                max-width: 1160px;
            }
            
            .ec-newItemRole__grid[data-count=\"6\"] {
                grid-template-columns: repeat(6, 1fr);
                max-width: 1400px;
            }
            
            .ec-newItemRole__item {
                border: 1px solid #dee2e6;
                border-radius: 8px;
                overflow: hidden;
                transition: all 0.3s ease;
                background: white;
                cursor: pointer;
                text-decoration: none;
                color: inherit;
                
                background-size: cover;
            }
            
            .ec-newItemRole__item:hover {
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                transform: translateY(-2px);
                text-decoration: none;
                color: inherit;
            }
            
            .ec-newItemRole__itemImage {
                width: 100%;
                height: 70%;
                object-fit: cover;
                background: #f8f9fa;
                display: block;
            }
            
            .ec-newItemRole__itemInfo {
                padding: 15px;
            }
            
            .ec-newItemRole__itemTitle {
                font-size: 14px;
                font-weight: 500;
                margin-bottom: 8px;
                color: #333;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                line-height: 1.4;
            }
            
            .ec-newItemRole__itemPrice {
                font-size: 16px;
                font-weight: bold;
                color: #e74c3c;
                margin: 0;
            }
            
            .ec-newItemRole__buttonContainer {
    text-align: center;
    margin-top: 20px;
    width: 100%;
    clear: both;
    position: relative;
}
            
            .ec-newItemRole__button {
                background: #007bff;
                color: white;
                border: none;
                padding: 12px 30px;
                border-radius: 25px;
                font-size: 16px;
                font-weight: 500;
                text-decoration: none;
                transition: all 0.3s ease;
                display: inline-block;
            }
            
            .ec-newItemRole__button:hover {
                background: #0056b3;
                color: white;
                text-decoration: none;
                transform: translateY(-1px);
            }
            
            .ec-newItemRole__noProducts {
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
            
            /* レスポンシブ対応 */
            @media (max-width: 1200px) {
                .ec-newItemRole__grid {
                    grid-template-columns: repeat(5, 1fr);
                    gap: 15px;
                }
            }
            
            @media (max-width: 992px) {
                .ec-newItemRole__grid {
                    grid-template-columns: repeat(4, 1fr);
                }
            }
            
            @media (max-width: 768px) {
                .ec-newItemRole__grid {
                    grid-template-columns: repeat(3, 1fr);
                    gap: 15px;
                }
                
                .ec-newItemRole__itemImage {
                    height: 150px;
                }
                
                .ec-newItemRole__itemInfo {
                    padding: 12px;
                }
                
                .ec-newItemRole__itemTitle {
                    font-size: 13px;
                }
                
                .ec-newItemRole__itemPrice {
                    font-size: 14px;
                }
            }
            
            @media (max-width: 480px) {
                .ec-newItemRole__grid {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 12px;
                }
                
                .ec-newItemRole__itemImage {
                    height: 120px;
                }
                
                .ec-newItemRole__itemInfo {
                    padding: 10px;
                }
                
                .ec-newItemRole__itemTitle {
                    font-size: 12px;
                    -webkit-line-clamp: 1;
                }
                
                .ec-newItemRole__itemPrice {
                    font-size: 13px;
                }
            }
        </style>
        
        ";
        // line 235
        echo "        ";
        // line 236
        echo "        ";
        // line 237
        echo "        
        <div class=\"ec-newItemRole__grid\" id=\"newItemGrid\">
            ";
        // line 240
        echo "            ";
        $context["NewProducts"] = $this->extensions['Customize\Twig\Extension\NewItemExtension']->getNewProducts(7);
        // line 241
        echo "            ";
        if ((twig_length_filter($this->env, (isset($context["NewProducts"]) || array_key_exists("NewProducts", $context) ? $context["NewProducts"] : (function () { throw new RuntimeError('Variable "NewProducts" does not exist.', 241, $this->source); })())) > 0)) {
            // line 242
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["NewProducts"]) || array_key_exists("NewProducts", $context) ? $context["NewProducts"] : (function () { throw new RuntimeError('Variable "NewProducts" does not exist.', 242, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["Product"]) {
                // line 243
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_detail", ["id" => twig_get_attribute($this->env, $this->source, $context["Product"], "id", [], "any", false, false, false, 243)]), "html", null, true);
                echo "\" class=\"ec-newItemRole__item\">
                        ";
                // line 244
                if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Product"], "main_list_image", [], "any", false, false, false, 244)) > 0)) {
                    // line 245
                    echo "                            <img src=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(twig_get_attribute($this->env, $this->source, $context["Product"], "main_list_image", [], "any", false, false, false, 245), "save_image"), "html", null, true);
                    echo "\" 
                                 alt=\"";
                    // line 246
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Product"], "name", [], "any", false, false, false, 246), "html", null, true);
                    echo "\" 
                                 class=\"ec-newItemRole__itemImage\"
                                 onerror=\"this.src='";
                    // line 248
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl($this->extensions['Eccube\Twig\Extension\EccubeExtension']->getNoImageProduct(""), "save_image"), "html", null, true);
                    echo "'\">
                        ";
                } else {
                    // line 250
                    echo "                            <img src=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl($this->extensions['Eccube\Twig\Extension\EccubeExtension']->getNoImageProduct(""), "save_image"), "html", null, true);
                    echo "\" 
                                 alt=\"";
                    // line 251
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Product"], "name", [], "any", false, false, false, 251), "html", null, true);
                    echo "\" 
                                 class=\"ec-newItemRole__itemImage\">
                        ";
                }
                // line 254
                echo "                        
                        <div class=\"ec-newItemRole__itemInfo\">
                            <p class=\"ec-newItemRole__itemTitle\">";
                // line 256
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Product"], "name", [], "any", false, false, false, 256), "html", null, true);
                echo "</p>
                            ";
                // line 257
                if (twig_get_attribute($this->env, $this->source, $context["Product"], "hasProductClass", [], "any", false, false, false, 257)) {
                    // line 258
                    echo "                                <p class=\"ec-newItemRole__itemPrice\">
                                    ";
                    // line 259
                    if ((twig_get_attribute($this->env, $this->source, $context["Product"], "getPrice02Min", [], "any", false, false, false, 259) == twig_get_attribute($this->env, $this->source, $context["Product"], "getPrice02Max", [], "any", false, false, false, 259))) {
                        // line 260
                        echo "                                        ";
                        echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, $context["Product"], "getPrice02IncTaxMin", [], "any", false, false, false, 260)), "html", null, true);
                        echo "
                                    ";
                    } else {
                        // line 262
                        echo "                                        ";
                        echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, $context["Product"], "getPrice02IncTaxMin", [], "any", false, false, false, 262)), "html", null, true);
                        echo "～";
                        echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, $context["Product"], "getPrice02IncTaxMax", [], "any", false, false, false, 262)), "html", null, true);
                        echo "
                                    ";
                    }
                    // line 264
                    echo "                                </p>
                            ";
                }
                // line 266
                echo "                        </div>
                    </a>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 269
            echo "            ";
        } else {
            // line 270
            echo "                <div class=\"ec-newItemRole__noProducts\">
                    ";
            // line 271
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("新着商品がありません"), "html", null, true);
            echo "
                </div>
            ";
        }
        // line 274
        echo "        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const grid = document.getElementById('newItemGrid');
                const items = grid.querySelectorAll('.ec-newItemRole__item');
                const itemCount = items.length;
                
                // 商品数をdata属性として設定
                if (itemCount > 0) {
                    grid.setAttribute('data-count', itemCount);
                    
                    // 7個未満の場合は中央寄せクラスを追加
                    if (itemCount < 7) {
                        grid.classList.add('auto-fit');
                    }
                }
                
                // レスポンシブ対応：画面サイズに応じてdata-count属性をリセット
                function adjustGridForScreen() {
                    if (window.innerWidth <= 1200) {
                        // タブレット・スマホではdata-count属性を無効化
                        grid.style.gridTemplateColumns = '';
                        grid.style.maxWidth = '';
                    } else {
                        // PCでは商品数に応じた調整を有効化
                        if (itemCount < 7) {
                            grid.setAttribute('data-count', itemCount);
                        }
                    }
                }
                
                // 初期調整
                adjustGridForScreen();
                
                // ウィンドウリサイズ時の調整
                window.addEventListener('resize', adjustGridForScreen);
            });
        </script>
        
        ";
        // line 315
        echo "　　<div class=\"ec-newItemRole__buttonContainer\" style=\"text-align: center; width: 100%; clear: both;\">
    　<a href=\"";
        // line 316
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_list");
        echo "?orderby=2\" class=\"ec-newItemRole__button\">
        ";
        // line 317
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("商品一覧を見る"), "html", null, true);
        echo "
    　</a>
　　</div>
    </div>
</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "Block/new_item.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  425 => 317,  421 => 316,  418 => 315,  376 => 274,  370 => 271,  367 => 270,  364 => 269,  356 => 266,  352 => 264,  344 => 262,  338 => 260,  336 => 259,  333 => 258,  331 => 257,  327 => 256,  323 => 254,  317 => 251,  312 => 250,  307 => 248,  302 => 246,  297 => 245,  295 => 244,  290 => 243,  285 => 242,  282 => 241,  279 => 240,  275 => 237,  273 => 236,  271 => 235,  43 => 8,);
    }

    public function getSourceContext()
    {
        return new Source("{#
This file is part of EC-CUBE
Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
http://www.ec-cube.co.jp/
For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
#}
<div class=\"ec-role\">
    <div class=\"ec-newItemRole\">
        <style>
            .ec-newItemRole {
                padding: 20px;
                margin-bottom: 30px;
                
            }
            
            .ec-newItemRole__heading {
                text-align: center;
                margin-bottom: 20px;
            }
            
            .ec-newItemRole__title {
                font-size: 24px;
                font-weight: bold;
                color: #333;
                margin-bottom: 15px;
            }
            
            .ec-newItemRole__grid {
                display: grid;
                grid-template-columns: repeat(7, 1fr);
                gap: 10px;
                margin-bottom: 30px;
                /*min-height: 280px;*/
                transition: all 0.3s ease;
            }
            
            /* 商品数に応じた動的調整用のクラス */
            .ec-newItemRole__grid.auto-fit {
                justify-content: center;
                max-width: fit-content;
                margin-left: auto;
                margin-right: auto;
            }
            
            /* 商品数別の最適化 */
            .ec-newItemRole__grid[data-count=\"1\"] {
                grid-template-columns: 1fr;
                max-width: 200px;
            }
            
            .ec-newItemRole__grid[data-count=\"2\"] {
                grid-template-columns: repeat(2, 1fr);
                max-width: 440px;
            }
            
            .ec-newItemRole__grid[data-count=\"3\"] {
                grid-template-columns: repeat(3, 1fr);
                max-width: 680px;
            }
            
            .ec-newItemRole__grid[data-count=\"4\"] {
                grid-template-columns: repeat(4, 1fr);
                max-width: 920px;
            }
            
            .ec-newItemRole__grid[data-count=\"5\"] {
                grid-template-columns: repeat(5, 1fr);
                max-width: 1160px;
            }
            
            .ec-newItemRole__grid[data-count=\"6\"] {
                grid-template-columns: repeat(6, 1fr);
                max-width: 1400px;
            }
            
            .ec-newItemRole__item {
                border: 1px solid #dee2e6;
                border-radius: 8px;
                overflow: hidden;
                transition: all 0.3s ease;
                background: white;
                cursor: pointer;
                text-decoration: none;
                color: inherit;
                
                background-size: cover;
            }
            
            .ec-newItemRole__item:hover {
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                transform: translateY(-2px);
                text-decoration: none;
                color: inherit;
            }
            
            .ec-newItemRole__itemImage {
                width: 100%;
                height: 70%;
                object-fit: cover;
                background: #f8f9fa;
                display: block;
            }
            
            .ec-newItemRole__itemInfo {
                padding: 15px;
            }
            
            .ec-newItemRole__itemTitle {
                font-size: 14px;
                font-weight: 500;
                margin-bottom: 8px;
                color: #333;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                line-height: 1.4;
            }
            
            .ec-newItemRole__itemPrice {
                font-size: 16px;
                font-weight: bold;
                color: #e74c3c;
                margin: 0;
            }
            
            .ec-newItemRole__buttonContainer {
    text-align: center;
    margin-top: 20px;
    width: 100%;
    clear: both;
    position: relative;
}
            
            .ec-newItemRole__button {
                background: #007bff;
                color: white;
                border: none;
                padding: 12px 30px;
                border-radius: 25px;
                font-size: 16px;
                font-weight: 500;
                text-decoration: none;
                transition: all 0.3s ease;
                display: inline-block;
            }
            
            .ec-newItemRole__button:hover {
                background: #0056b3;
                color: white;
                text-decoration: none;
                transform: translateY(-1px);
            }
            
            .ec-newItemRole__noProducts {
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
            
            /* レスポンシブ対応 */
            @media (max-width: 1200px) {
                .ec-newItemRole__grid {
                    grid-template-columns: repeat(5, 1fr);
                    gap: 15px;
                }
            }
            
            @media (max-width: 992px) {
                .ec-newItemRole__grid {
                    grid-template-columns: repeat(4, 1fr);
                }
            }
            
            @media (max-width: 768px) {
                .ec-newItemRole__grid {
                    grid-template-columns: repeat(3, 1fr);
                    gap: 15px;
                }
                
                .ec-newItemRole__itemImage {
                    height: 150px;
                }
                
                .ec-newItemRole__itemInfo {
                    padding: 12px;
                }
                
                .ec-newItemRole__itemTitle {
                    font-size: 13px;
                }
                
                .ec-newItemRole__itemPrice {
                    font-size: 14px;
                }
            }
            
            @media (max-width: 480px) {
                .ec-newItemRole__grid {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 12px;
                }
                
                .ec-newItemRole__itemImage {
                    height: 120px;
                }
                
                .ec-newItemRole__itemInfo {
                    padding: 10px;
                }
                
                .ec-newItemRole__itemTitle {
                    font-size: 12px;
                    -webkit-line-clamp: 1;
                }
                
                .ec-newItemRole__itemPrice {
                    font-size: 13px;
                }
            }
        </style>
        
        {#<div class=\"ec-newItemRole__heading\">#}
        {#    <h2 class=\"ec-newItemRole__title\">{{ '新着商品'|trans }}</h2>#}
        {#</div>#}
        
        <div class=\"ec-newItemRole__grid\" id=\"newItemGrid\">
            {# 新着商品のループ（最大7個まで表示） #}
            {% set NewProducts = get_new_products(7) %}
            {% if NewProducts|length > 0 %}
                {% for Product in NewProducts %}
                    <a href=\"{{ url('product_detail', {'id': Product.id}) }}\" class=\"ec-newItemRole__item\">
                        {% if Product.main_list_image|length > 0 %}
                            <img src=\"{{ asset(Product.main_list_image, 'save_image') }}\" 
                                 alt=\"{{ Product.name }}\" 
                                 class=\"ec-newItemRole__itemImage\"
                                 onerror=\"this.src='{{ asset(''|no_image_product, 'save_image') }}'\">
                        {% else %}
                            <img src=\"{{ asset(''|no_image_product, 'save_image') }}\" 
                                 alt=\"{{ Product.name }}\" 
                                 class=\"ec-newItemRole__itemImage\">
                        {% endif %}
                        
                        <div class=\"ec-newItemRole__itemInfo\">
                            <p class=\"ec-newItemRole__itemTitle\">{{ Product.name }}</p>
                            {% if Product.hasProductClass %}
                                <p class=\"ec-newItemRole__itemPrice\">
                                    {% if Product.getPrice02Min == Product.getPrice02Max %}
                                        {{ Product.getPrice02IncTaxMin|price }}
                                    {% else %}
                                        {{ Product.getPrice02IncTaxMin|price }}～{{ Product.getPrice02IncTaxMax|price }}
                                    {% endif %}
                                </p>
                            {% endif %}
                        </div>
                    </a>
                {% endfor %}
            {% else %}
                <div class=\"ec-newItemRole__noProducts\">
                    {{ '新着商品がありません'|trans }}
                </div>
            {% endif %}
        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const grid = document.getElementById('newItemGrid');
                const items = grid.querySelectorAll('.ec-newItemRole__item');
                const itemCount = items.length;
                
                // 商品数をdata属性として設定
                if (itemCount > 0) {
                    grid.setAttribute('data-count', itemCount);
                    
                    // 7個未満の場合は中央寄せクラスを追加
                    if (itemCount < 7) {
                        grid.classList.add('auto-fit');
                    }
                }
                
                // レスポンシブ対応：画面サイズに応じてdata-count属性をリセット
                function adjustGridForScreen() {
                    if (window.innerWidth <= 1200) {
                        // タブレット・スマホではdata-count属性を無効化
                        grid.style.gridTemplateColumns = '';
                        grid.style.maxWidth = '';
                    } else {
                        // PCでは商品数に応じた調整を有効化
                        if (itemCount < 7) {
                            grid.setAttribute('data-count', itemCount);
                        }
                    }
                }
                
                // 初期調整
                adjustGridForScreen();
                
                // ウィンドウリサイズ時の調整
                window.addEventListener('resize', adjustGridForScreen);
            });
        </script>
        
        {# 修正版: 新着順ソート対応 #}
　　<div class=\"ec-newItemRole__buttonContainer\" style=\"text-align: center; width: 100%; clear: both;\">
    　<a href=\"{{ url('product_list') }}?orderby=2\" class=\"ec-newItemRole__button\">
        {{ '商品一覧を見る'|trans }}
    　</a>
　　</div>
    </div>
</div>", "Block/new_item.twig", "/home/asa3150/www/ec-cube/html/app/template/default/Block/new_item.twig");
    }
}
