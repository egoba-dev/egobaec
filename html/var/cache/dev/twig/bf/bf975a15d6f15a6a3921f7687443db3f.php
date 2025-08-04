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

/* @MakerProductBlock/Block/maker_product.twig */
class __TwigTemplate_1cec1287a78963fbf8b76957a029e0a4 extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@MakerProductBlock/Block/maker_product.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@MakerProductBlock/Block/maker_product.twig"));

        // line 1
        echo "
";
        // line 2
        if ((array_key_exists("Products", $context) &&  !twig_test_empty((isset($context["Products"]) || array_key_exists("Products", $context) ? $context["Products"] : (function () { throw new RuntimeError('Variable "Products" does not exist.', 2, $this->source); })())))) {
            // line 3
            echo "    ";
            // line 4
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("MakerProductBlock/css/maker-product-block.css", "plugin"), "html", null, true);
            echo "\" type=\"text/css\">

    <div class=\"ec-maker-block\">
        <div class=\"ec-maker-block__header\">
            <h2 class=\"ec-maker-block__title\">";
            // line 8
            echo twig_escape_filter($this->env, ((array_key_exists("maker_name", $context)) ? (_twig_default_filter((isset($context["maker_name"]) || array_key_exists("maker_name", $context) ? $context["maker_name"] : (function () { throw new RuntimeError('Variable "maker_name" does not exist.', 8, $this->source); })()), "")) : ("")), "html", null, true);
            echo "</h2>
            ";
            // line 9
            if ((array_key_exists("maker_id", $context) &&  !twig_test_empty((isset($context["maker_id"]) || array_key_exists("maker_id", $context) ? $context["maker_id"] : (function () { throw new RuntimeError('Variable "maker_id" does not exist.', 9, $this->source); })())))) {
                // line 10
                echo "                ";
                // line 11
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("maker_product_list", ["makerId" => (isset($context["maker_id"]) || array_key_exists("maker_id", $context) ? $context["maker_id"] : (function () { throw new RuntimeError('Variable "maker_id" does not exist.', 11, $this->source); })())]), "html", null, true);
                echo "\" class=\"ec-maker-block__link\">
                    ";
                // line 12
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("すべての商品を見る"), "html", null, true);
                echo " <i class=\"fas fa-angle-right\"></i>
                </a>
            ";
            }
            // line 15
            echo "        </div>

        <div class=\"ec-maker-block__carousel\" 
             data-visible-count=\"";
            // line 18
            echo twig_escape_filter($this->env, ((array_key_exists("visible_count", $context)) ? (_twig_default_filter((isset($context["visible_count"]) || array_key_exists("visible_count", $context) ? $context["visible_count"] : (function () { throw new RuntimeError('Variable "visible_count" does not exist.', 18, $this->source); })()), 4)) : (4)), "html", null, true);
            echo "\" 
             data-visible-count-sp=\"";
            // line 19
            echo twig_escape_filter($this->env, ((array_key_exists("visible_count_sp", $context)) ? (_twig_default_filter((isset($context["visible_count_sp"]) || array_key_exists("visible_count_sp", $context) ? $context["visible_count_sp"] : (function () { throw new RuntimeError('Variable "visible_count_sp" does not exist.', 19, $this->source); })()), 1)) : (1)), "html", null, true);
            echo "\">
            ";
            // line 20
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["Products"]) || array_key_exists("Products", $context) ? $context["Products"] : (function () { throw new RuntimeError('Variable "Products" does not exist.', 20, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["Product"]) {
                // line 21
                echo "                ";
                if ((array_key_exists("Product", $context) && twig_get_attribute($this->env, $this->source, $context["Product"], "id", [], "any", true, true, false, 21))) {
                    // line 22
                    echo "                    <div class=\"ec-maker-block__item \">
                        <a href=\"";
                    // line 23
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_detail", ["id" => twig_get_attribute($this->env, $this->source, $context["Product"], "id", [], "any", false, false, false, 23)]), "html", null, true);
                    echo "\">
                            <div class=\"ec-maker-block__item-image\">
                                ";
                    // line 25
                    $context["mainImage"] = twig_get_attribute($this->env, $this->source, $context["Product"], "getMainListImage", [], "any", false, false, false, 25);
                    // line 26
                    echo "                                ";
                    if ((array_key_exists("mainImage", $context) &&  !twig_test_empty((isset($context["mainImage"]) || array_key_exists("mainImage", $context) ? $context["mainImage"] : (function () { throw new RuntimeError('Variable "mainImage" does not exist.', 26, $this->source); })())))) {
                        // line 27
                        echo "                                    <img src=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((isset($context["mainImage"]) || array_key_exists("mainImage", $context) ? $context["mainImage"] : (function () { throw new RuntimeError('Variable "mainImage" does not exist.', 27, $this->source); })()), "save_image"), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["Product"], "name", [], "any", true, true, false, 27)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["Product"], "name", [], "any", false, false, false, 27), "")) : ("")), "html", null, true);
                        echo "\">
                                ";
                    } else {
                        // line 29
                        echo "                                    <img src=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl($this->extensions['Eccube\Twig\Extension\EccubeExtension']->getNoImageProduct(""), "save_image"), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["Product"], "name", [], "any", true, true, false, 29)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["Product"], "name", [], "any", false, false, false, 29), "")) : ("")), "html", null, true);
                        echo "\">
                                ";
                    }
                    // line 31
                    echo "                            </div>
                            <div class=\"ec-maker-block__item-name\">";
                    // line 32
                    echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["Product"], "name", [], "any", true, true, false, 32)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["Product"], "name", [], "any", false, false, false, 32), "")) : ("")), "html", null, true);
                    echo "</div>
                            <div class=\"ec-maker-block__item-price\">
                                ";
                    // line 34
                    if ((twig_get_attribute($this->env, $this->source, $context["Product"], "hasProductClass", [], "any", true, true, false, 34) && twig_get_attribute($this->env, $this->source, $context["Product"], "hasProductClass", [], "any", false, false, false, 34))) {
                        // line 35
                        echo "                                    ";
                        $context["priceMin"] = twig_get_attribute($this->env, $this->source, $context["Product"], "getPrice02IncTaxMin", [], "any", false, false, false, 35);
                        // line 36
                        echo "                                    ";
                        $context["priceMax"] = twig_get_attribute($this->env, $this->source, $context["Product"], "getPrice02IncTaxMax", [], "any", false, false, false, 36);
                        // line 37
                        echo "                                    ";
                        if (((isset($context["priceMin"]) || array_key_exists("priceMin", $context) ? $context["priceMin"] : (function () { throw new RuntimeError('Variable "priceMin" does not exist.', 37, $this->source); })()) == (isset($context["priceMax"]) || array_key_exists("priceMax", $context) ? $context["priceMax"] : (function () { throw new RuntimeError('Variable "priceMax" does not exist.', 37, $this->source); })()))) {
                            // line 38
                            echo "                                        ";
                            echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter((isset($context["priceMin"]) || array_key_exists("priceMin", $context) ? $context["priceMin"] : (function () { throw new RuntimeError('Variable "priceMin" does not exist.', 38, $this->source); })())), "html", null, true);
                            echo "
                                    ";
                        } else {
                            // line 40
                            echo "                                        ";
                            echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter((isset($context["priceMin"]) || array_key_exists("priceMin", $context) ? $context["priceMin"] : (function () { throw new RuntimeError('Variable "priceMin" does not exist.', 40, $this->source); })())), "html", null, true);
                            echo " ～ ";
                            echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter((isset($context["priceMax"]) || array_key_exists("priceMax", $context) ? $context["priceMax"] : (function () { throw new RuntimeError('Variable "priceMax" does not exist.', 40, $this->source); })())), "html", null, true);
                            echo "
                                    ";
                        }
                        // line 42
                        echo "                                ";
                    } else {
                        // line 43
                        echo "                                    ";
                        $context["price"] = twig_get_attribute($this->env, $this->source, $context["Product"], "getPrice02IncTaxMin", [], "any", false, false, false, 43);
                        // line 44
                        echo "                                    ";
                        if (array_key_exists("price", $context)) {
                            // line 45
                            echo "                                        ";
                            echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter((isset($context["price"]) || array_key_exists("price", $context) ? $context["price"] : (function () { throw new RuntimeError('Variable "price" does not exist.', 45, $this->source); })())), "html", null, true);
                            echo "
                                    ";
                        }
                        // line 47
                        echo "                                ";
                    }
                    // line 48
                    echo "                            </div>
                        </a>
                    </div>
                ";
                }
                // line 52
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo "        </div>
    </div>

    ";
            // line 57
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("MakerProductBlock/js/maker-product-carousel.js", "plugin"), "html", null, true);
            echo "\"></script>
";
        } else {
            // line 59
            echo "    ";
            // line 60
            echo "    ";
            if (twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 60, $this->source); })()), "debug", [], "any", false, false, false, 60)) {
                // line 61
                echo "        <div style=\"padding: 20px; text-align: center; color: #666;\">
            表示する商品がありません。
        </div>
    ";
            }
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "@MakerProductBlock/Block/maker_product.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  205 => 61,  202 => 60,  200 => 59,  194 => 57,  189 => 53,  183 => 52,  177 => 48,  174 => 47,  168 => 45,  165 => 44,  162 => 43,  159 => 42,  151 => 40,  145 => 38,  142 => 37,  139 => 36,  136 => 35,  134 => 34,  129 => 32,  126 => 31,  118 => 29,  110 => 27,  107 => 26,  105 => 25,  100 => 23,  97 => 22,  94 => 21,  90 => 20,  86 => 19,  82 => 18,  77 => 15,  71 => 12,  66 => 11,  64 => 10,  62 => 9,  58 => 8,  50 => 4,  48 => 3,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
{% if Products is defined and Products is not empty %}
    {# 外部CSSの読み込み #}
    <link rel=\"stylesheet\" href=\"{{ asset('MakerProductBlock/css/maker-product-block.css', 'plugin') }}\" type=\"text/css\">

    <div class=\"ec-maker-block\">
        <div class=\"ec-maker-block__header\">
            <h2 class=\"ec-maker-block__title\">{{ maker_name|default('') }}</h2>
            {% if maker_id is defined and maker_id is not empty %}
                {# メーカー専用の商品リストページへのリンク #}
                <a href=\"{{ url('maker_product_list', {'makerId': maker_id}) }}\" class=\"ec-maker-block__link\">
                    {{ 'すべての商品を見る'|trans }} <i class=\"fas fa-angle-right\"></i>
                </a>
            {% endif %}
        </div>

        <div class=\"ec-maker-block__carousel\" 
             data-visible-count=\"{{ visible_count|default(4) }}\" 
             data-visible-count-sp=\"{{ visible_count_sp|default(1) }}\">
            {% for Product in Products %}
                {% if Product is defined and Product.id is defined %}
                    <div class=\"ec-maker-block__item \">
                        <a href=\"{{ url('product_detail', {'id': Product.id}) }}\">
                            <div class=\"ec-maker-block__item-image\">
                                {% set mainImage = Product.getMainListImage %}
                                {% if mainImage is defined and mainImage is not empty %}
                                    <img src=\"{{ asset(mainImage, 'save_image') }}\" alt=\"{{ Product.name|default('') }}\">
                                {% else %}
                                    <img src=\"{{ asset(''|no_image_product, 'save_image') }}\" alt=\"{{ Product.name|default('') }}\">
                                {% endif %}
                            </div>
                            <div class=\"ec-maker-block__item-name\">{{ Product.name|default('') }}</div>
                            <div class=\"ec-maker-block__item-price\">
                                {% if Product.hasProductClass is defined and Product.hasProductClass %}
                                    {% set priceMin = Product.getPrice02IncTaxMin %}
                                    {% set priceMax = Product.getPrice02IncTaxMax %}
                                    {% if priceMin == priceMax %}
                                        {{ priceMin|price }}
                                    {% else %}
                                        {{ priceMin|price }} ～ {{ priceMax|price }}
                                    {% endif %}
                                {% else %}
                                    {% set price = Product.getPrice02IncTaxMin %}
                                    {% if price is defined %}
                                        {{ price|price }}
                                    {% endif %}
                                {% endif %}
                            </div>
                        </a>
                    </div>
                {% endif %}
            {% endfor %}
        </div>
    </div>

    {# 外部JSの読み込み #}
    <script src=\"{{ asset('MakerProductBlock/js/maker-product-carousel.js', 'plugin') }}\"></script>
{% else %}
    {# 商品がない場合の表示（デバッグ用、本番では削除可能） #}
    {% if app.debug %}
        <div style=\"padding: 20px; text-align: center; color: #666;\">
            表示する商品がありません。
        </div>
    {% endif %}
{% endif %}", "@MakerProductBlock/Block/maker_product.twig", "/home/asa3150/www/ec-cube/html/app/Plugin/MakerProductBlock/Resource/template/Block/maker_product.twig");
    }
}
