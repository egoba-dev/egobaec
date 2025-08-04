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

/* @MakerProductBlock/Product/maker_list.twig */
class __TwigTemplate_e009b85ef0309b6ba595893cce5394de extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@MakerProductBlock/Product/maker_list.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@MakerProductBlock/Product/maker_list.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"ja\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["maker"]) || array_key_exists("maker", $context) ? $context["maker"] : (function () { throw new RuntimeError('Variable "maker" does not exist.', 6, $this->source); })()), "name", [], "any", false, false, false, 6), "html", null, true);
        echo "の商品 - ";
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["BaseInfo"] ?? null), "shop_name", [], "any", true, true, false, 6)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["BaseInfo"] ?? null), "shop_name", [], "any", false, false, false, 6), "EC-CUBE")) : ("EC-CUBE")), "html", null, true);
        echo "</title>
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/style.css"), "html", null, true);
        echo "\">
    <style>
        .maker-product-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .maker-header {
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }
        .product-item {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
            border-radius: 5px;
        }
        .product-item img {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .product-item h3 {
            margin: 10px 0;
            font-size: 16px;
        }
        .product-item .price {
            font-weight: bold;
            color: #e74c3c;
            font-size: 18px;
        }
        .breadcrumb {
            margin-bottom: 20px;
        }
        .breadcrumb a {
            color: #007bff;
            text-decoration: none;
        }
        .pagination {
            text-align: center;
            margin: 30px 0;
        }
        .controls {
            margin: 20px 0;
            text-align: right;
        }
        .controls select {
            margin-left: 10px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class=\"maker-product-container\">
        <!-- パンくずナビ -->
        <div class=\"breadcrumb\">
            <a href=\"";
        // line 70
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("homepage");
        echo "\">ホーム</a> &gt; 
            <a href=\"";
        // line 71
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_list");
        echo "\">商品一覧</a> &gt; 
            ";
        // line 72
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["maker"]) || array_key_exists("maker", $context) ? $context["maker"] : (function () { throw new RuntimeError('Variable "maker" does not exist.', 72, $this->source); })()), "name", [], "any", false, false, false, 72), "html", null, true);
        echo "の商品
        </div>

        <!-- ヘッダー -->
        <div class=\"maker-header\">
            <h1>";
        // line 77
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["maker"]) || array_key_exists("maker", $context) ? $context["maker"] : (function () { throw new RuntimeError('Variable "maker" does not exist.', 77, $this->source); })()), "name", [], "any", false, false, false, 77), "html", null, true);
        echo "の商品</h1>
            ";
        // line 78
        if (((isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 78, $this->source); })()) && (twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 78, $this->source); })()), "totalItemCount", [], "any", false, false, false, 78) > 0))) {
            // line 79
            echo "                <p>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 79, $this->source); })()), "totalItemCount", [], "any", false, false, false, 79), "html", null, true);
            echo "件の商品が見つかりました</p>
            ";
        }
        // line 81
        echo "        </div>

        ";
        // line 83
        if (((isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 83, $this->source); })()) && (twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 83, $this->source); })()), "totalItemCount", [], "any", false, false, false, 83) > 0))) {
            // line 84
            echo "            <!-- コントロール -->
            <div class=\"controls\">
                <label>表示件数:
                    <select class=\"disp-number\">
                        ";
            // line 88
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["disp_number_choices"]) || array_key_exists("disp_number_choices", $context) ? $context["disp_number_choices"] : (function () { throw new RuntimeError('Variable "disp_number_choices" does not exist.', 88, $this->source); })()));
            foreach ($context['_seq'] as $context["value"] => $context["label"]) {
                // line 89
                echo "                            <option value=\"";
                echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                echo "\"";
                if (((isset($context["disp_number"]) || array_key_exists("disp_number", $context) ? $context["disp_number"] : (function () { throw new RuntimeError('Variable "disp_number" does not exist.', 89, $this->source); })()) == $context["value"])) {
                    echo " selected";
                }
                echo ">";
                echo twig_escape_filter($this->env, $context["label"], "html", null, true);
                echo "件</option>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['value'], $context['label'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 91
            echo "                    </select>
                </label>
                <label>並び順:
                    <select class=\"order-by\">
                        ";
            // line 95
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["orderby_choices"]) || array_key_exists("orderby_choices", $context) ? $context["orderby_choices"] : (function () { throw new RuntimeError('Variable "orderby_choices" does not exist.', 95, $this->source); })()));
            foreach ($context['_seq'] as $context["value"] => $context["label"]) {
                // line 96
                echo "                            <option value=\"";
                echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                echo "\"";
                if (((isset($context["orderby"]) || array_key_exists("orderby", $context) ? $context["orderby"] : (function () { throw new RuntimeError('Variable "orderby" does not exist.', 96, $this->source); })()) == $context["value"])) {
                    echo " selected";
                }
                echo ">";
                echo twig_escape_filter($this->env, $context["label"], "html", null, true);
                echo "</option>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['value'], $context['label'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 98
            echo "                    </select>
                </label>
            </div>

            <!-- 商品グリッド -->
            <div class=\"product-grid\">
                ";
            // line 104
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 104, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["Product"]) {
                // line 105
                echo "                    <div class=\"product-item\">
                        <a href=\"";
                // line 106
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_detail", ["id" => twig_get_attribute($this->env, $this->source, $context["Product"], "id", [], "any", false, false, false, 106)]), "html", null, true);
                echo "\">
                            <img src=\"";
                // line 107
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl($this->extensions['Eccube\Twig\Extension\EccubeExtension']->getNoImageProduct(twig_get_attribute($this->env, $this->source, $context["Product"], "main_list_image", [], "any", false, false, false, 107)), "save_image"), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Product"], "name", [], "any", false, false, false, 107), "html", null, true);
                echo "\">
                            <h3>";
                // line 108
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Product"], "name", [], "any", false, false, false, 108), "html", null, true);
                echo "</h3>
                            <div class=\"price\">
                                ";
                // line 110
                if (twig_get_attribute($this->env, $this->source, $context["Product"], "hasProductClass", [], "any", false, false, false, 110)) {
                    // line 111
                    echo "                                    ";
                    if ((twig_get_attribute($this->env, $this->source, $context["Product"], "getPrice02Min", [], "any", false, false, false, 111) == twig_get_attribute($this->env, $this->source, $context["Product"], "getPrice02Max", [], "any", false, false, false, 111))) {
                        // line 112
                        echo "                                        ";
                        echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, $context["Product"], "getPrice02IncTaxMin", [], "any", false, false, false, 112)), "html", null, true);
                        echo "
                                    ";
                    } else {
                        // line 114
                        echo "                                        ";
                        echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, $context["Product"], "getPrice02IncTaxMin", [], "any", false, false, false, 114)), "html", null, true);
                        echo " ～ ";
                        echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, $context["Product"], "getPrice02IncTaxMax", [], "any", false, false, false, 114)), "html", null, true);
                        echo "
                                    ";
                    }
                    // line 116
                    echo "                                ";
                } else {
                    // line 117
                    echo "                                    ";
                    echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, $context["Product"], "getPrice02IncTaxMin", [], "any", false, false, false, 117)), "html", null, true);
                    echo "
                                ";
                }
                // line 119
                echo "                            </div>
                        </a>
                        ";
                // line 121
                if (twig_get_attribute($this->env, $this->source, $context["Product"], "description_list", [], "any", false, false, false, 121)) {
                    // line 122
                    echo "                            <p>";
                    echo twig_escape_filter($this->env, twig_slice($this->env, twig_nl2br(twig_get_attribute($this->env, $this->source, $context["Product"], "description_list", [], "any", false, false, false, 122)), 0, 100), "html", null, true);
                    echo "...</p>
                        ";
                }
                // line 124
                echo "                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 126
            echo "            </div>

            <!-- ページネーション -->
            ";
            // line 129
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 129, $this->source); })()), "paginationData", [], "any", false, false, false, 129), "pageCount", [], "any", false, false, false, 129) > 1)) {
                // line 130
                echo "                <div class=\"pagination\">
                    ";
                // line 131
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 131, $this->source); })()), "paginationData", [], "any", false, false, false, 131), "current", [], "any", false, false, false, 131) > 1)) {
                    // line 132
                    echo "                        <a href=\"?pageno=";
                    echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 132, $this->source); })()), "paginationData", [], "any", false, false, false, 132), "current", [], "any", false, false, false, 132) - 1), "html", null, true);
                    echo "&disp_number=";
                    echo twig_escape_filter($this->env, (isset($context["disp_number"]) || array_key_exists("disp_number", $context) ? $context["disp_number"] : (function () { throw new RuntimeError('Variable "disp_number" does not exist.', 132, $this->source); })()), "html", null, true);
                    echo "&orderby=";
                    echo twig_escape_filter($this->env, (isset($context["orderby"]) || array_key_exists("orderby", $context) ? $context["orderby"] : (function () { throw new RuntimeError('Variable "orderby" does not exist.', 132, $this->source); })()), "html", null, true);
                    echo "\">&laquo; 前へ</a>
                    ";
                }
                // line 134
                echo "                    
                    ";
                // line 135
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 135, $this->source); })()), "paginationData", [], "any", false, false, false, 135), "pagesInRange", [], "any", false, false, false, 135));
                foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                    // line 136
                    echo "                        ";
                    if (($context["page"] == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 136, $this->source); })()), "paginationData", [], "any", false, false, false, 136), "current", [], "any", false, false, false, 136))) {
                        // line 137
                        echo "                            <span style=\"margin: 0 5px; font-weight: bold;\">";
                        echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                        echo "</span>
                        ";
                    } else {
                        // line 139
                        echo "                            <a href=\"?pageno=";
                        echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                        echo "&disp_number=";
                        echo twig_escape_filter($this->env, (isset($context["disp_number"]) || array_key_exists("disp_number", $context) ? $context["disp_number"] : (function () { throw new RuntimeError('Variable "disp_number" does not exist.', 139, $this->source); })()), "html", null, true);
                        echo "&orderby=";
                        echo twig_escape_filter($this->env, (isset($context["orderby"]) || array_key_exists("orderby", $context) ? $context["orderby"] : (function () { throw new RuntimeError('Variable "orderby" does not exist.', 139, $this->source); })()), "html", null, true);
                        echo "\" style=\"margin: 0 5px;\">";
                        echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                        echo "</a>
                        ";
                    }
                    // line 141
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 142
                echo "                    
                    ";
                // line 143
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 143, $this->source); })()), "paginationData", [], "any", false, false, false, 143), "current", [], "any", false, false, false, 143) < twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 143, $this->source); })()), "paginationData", [], "any", false, false, false, 143), "pageCount", [], "any", false, false, false, 143))) {
                    // line 144
                    echo "                        <a href=\"?pageno=";
                    echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 144, $this->source); })()), "paginationData", [], "any", false, false, false, 144), "current", [], "any", false, false, false, 144) + 1), "html", null, true);
                    echo "&disp_number=";
                    echo twig_escape_filter($this->env, (isset($context["disp_number"]) || array_key_exists("disp_number", $context) ? $context["disp_number"] : (function () { throw new RuntimeError('Variable "disp_number" does not exist.', 144, $this->source); })()), "html", null, true);
                    echo "&orderby=";
                    echo twig_escape_filter($this->env, (isset($context["orderby"]) || array_key_exists("orderby", $context) ? $context["orderby"] : (function () { throw new RuntimeError('Variable "orderby" does not exist.', 144, $this->source); })()), "html", null, true);
                    echo "\">次へ &raquo;</a>
                    ";
                }
                // line 146
                echo "                </div>
            ";
            }
            // line 148
            echo "        ";
        } else {
            // line 149
            echo "            <div style=\"text-align: center; margin: 50px 0;\">
                <p>";
            // line 150
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["maker"]) || array_key_exists("maker", $context) ? $context["maker"] : (function () { throw new RuntimeError('Variable "maker" does not exist.', 150, $this->source); })()), "name", [], "any", false, false, false, 150), "html", null, true);
            echo "の商品は見つかりませんでした。</p>
                <p><a href=\"";
            // line 151
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_list");
            echo "\">すべての商品を見る</a></p>
            </div>
        ";
        }
        // line 154
        echo "    </div>

    <script src=\"";
        // line 156
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/eccube.js"), "html", null, true);
        echo "\"></script>
    <script>
        \$(function() {
            // 表示件数を変更
            \$('.disp-number').change(function() {
                var dispNumber = \$(this).val();
                var currentUrl = new URL(window.location.href);
                currentUrl.searchParams.set('disp_number', dispNumber);
                currentUrl.searchParams.set('pageno', 1);
                window.location.href = currentUrl.toString();
            });

            // 並び順を変更
            \$('.order-by').change(function() {
                var orderBy = \$(this).val();
                var currentUrl = new URL(window.location.href);
                currentUrl.searchParams.set('orderby', orderBy);
                currentUrl.searchParams.set('pageno', 1);
                window.location.href = currentUrl.toString();
            });
        });
    </script>
</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "@MakerProductBlock/Product/maker_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  378 => 156,  374 => 154,  368 => 151,  364 => 150,  361 => 149,  358 => 148,  354 => 146,  344 => 144,  342 => 143,  339 => 142,  333 => 141,  321 => 139,  315 => 137,  312 => 136,  308 => 135,  305 => 134,  295 => 132,  293 => 131,  290 => 130,  288 => 129,  283 => 126,  276 => 124,  270 => 122,  268 => 121,  264 => 119,  258 => 117,  255 => 116,  247 => 114,  241 => 112,  238 => 111,  236 => 110,  231 => 108,  225 => 107,  221 => 106,  218 => 105,  214 => 104,  206 => 98,  191 => 96,  187 => 95,  181 => 91,  166 => 89,  162 => 88,  156 => 84,  154 => 83,  150 => 81,  144 => 79,  142 => 78,  138 => 77,  130 => 72,  126 => 71,  122 => 70,  56 => 7,  50 => 6,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"ja\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{{ maker.name }}の商品 - {{ BaseInfo.shop_name|default('EC-CUBE') }}</title>
    <link rel=\"stylesheet\" href=\"{{ asset('assets/css/style.css') }}\">
    <style>
        .maker-product-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .maker-header {
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }
        .product-item {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
            border-radius: 5px;
        }
        .product-item img {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .product-item h3 {
            margin: 10px 0;
            font-size: 16px;
        }
        .product-item .price {
            font-weight: bold;
            color: #e74c3c;
            font-size: 18px;
        }
        .breadcrumb {
            margin-bottom: 20px;
        }
        .breadcrumb a {
            color: #007bff;
            text-decoration: none;
        }
        .pagination {
            text-align: center;
            margin: 30px 0;
        }
        .controls {
            margin: 20px 0;
            text-align: right;
        }
        .controls select {
            margin-left: 10px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class=\"maker-product-container\">
        <!-- パンくずナビ -->
        <div class=\"breadcrumb\">
            <a href=\"{{ url('homepage') }}\">ホーム</a> &gt; 
            <a href=\"{{ url('product_list') }}\">商品一覧</a> &gt; 
            {{ maker.name }}の商品
        </div>

        <!-- ヘッダー -->
        <div class=\"maker-header\">
            <h1>{{ maker.name }}の商品</h1>
            {% if pagination and pagination.totalItemCount > 0 %}
                <p>{{ pagination.totalItemCount }}件の商品が見つかりました</p>
            {% endif %}
        </div>

        {% if pagination and pagination.totalItemCount > 0 %}
            <!-- コントロール -->
            <div class=\"controls\">
                <label>表示件数:
                    <select class=\"disp-number\">
                        {% for value, label in disp_number_choices %}
                            <option value=\"{{ value }}\"{% if disp_number == value %} selected{% endif %}>{{ label }}件</option>
                        {% endfor %}
                    </select>
                </label>
                <label>並び順:
                    <select class=\"order-by\">
                        {% for value, label in orderby_choices %}
                            <option value=\"{{ value }}\"{% if orderby == value %} selected{% endif %}>{{ label }}</option>
                        {% endfor %}
                    </select>
                </label>
            </div>

            <!-- 商品グリッド -->
            <div class=\"product-grid\">
                {% for Product in pagination %}
                    <div class=\"product-item\">
                        <a href=\"{{ url('product_detail', {'id': Product.id}) }}\">
                            <img src=\"{{ asset(Product.main_list_image|no_image_product, 'save_image') }}\" alt=\"{{ Product.name }}\">
                            <h3>{{ Product.name }}</h3>
                            <div class=\"price\">
                                {% if Product.hasProductClass %}
                                    {% if Product.getPrice02Min == Product.getPrice02Max %}
                                        {{ Product.getPrice02IncTaxMin|price }}
                                    {% else %}
                                        {{ Product.getPrice02IncTaxMin|price }} ～ {{ Product.getPrice02IncTaxMax|price }}
                                    {% endif %}
                                {% else %}
                                    {{ Product.getPrice02IncTaxMin|price }}
                                {% endif %}
                            </div>
                        </a>
                        {% if Product.description_list %}
                            <p>{{ Product.description_list|raw|nl2br|slice(0, 100) }}...</p>
                        {% endif %}
                    </div>
                {% endfor %}
            </div>

            <!-- ページネーション -->
            {% if pagination.paginationData.pageCount > 1 %}
                <div class=\"pagination\">
                    {% if pagination.paginationData.current > 1 %}
                        <a href=\"?pageno={{ pagination.paginationData.current - 1 }}&disp_number={{ disp_number }}&orderby={{ orderby }}\">&laquo; 前へ</a>
                    {% endif %}
                    
                    {% for page in pagination.paginationData.pagesInRange %}
                        {% if page == pagination.paginationData.current %}
                            <span style=\"margin: 0 5px; font-weight: bold;\">{{ page }}</span>
                        {% else %}
                            <a href=\"?pageno={{ page }}&disp_number={{ disp_number }}&orderby={{ orderby }}\" style=\"margin: 0 5px;\">{{ page }}</a>
                        {% endif %}
                    {% endfor %}
                    
                    {% if pagination.paginationData.current < pagination.paginationData.pageCount %}
                        <a href=\"?pageno={{ pagination.paginationData.current + 1 }}&disp_number={{ disp_number }}&orderby={{ orderby }}\">次へ &raquo;</a>
                    {% endif %}
                </div>
            {% endif %}
        {% else %}
            <div style=\"text-align: center; margin: 50px 0;\">
                <p>{{ maker.name }}の商品は見つかりませんでした。</p>
                <p><a href=\"{{ url('product_list') }}\">すべての商品を見る</a></p>
            </div>
        {% endif %}
    </div>

    <script src=\"{{ asset('assets/js/eccube.js') }}\"></script>
    <script>
        \$(function() {
            // 表示件数を変更
            \$('.disp-number').change(function() {
                var dispNumber = \$(this).val();
                var currentUrl = new URL(window.location.href);
                currentUrl.searchParams.set('disp_number', dispNumber);
                currentUrl.searchParams.set('pageno', 1);
                window.location.href = currentUrl.toString();
            });

            // 並び順を変更
            \$('.order-by').change(function() {
                var orderBy = \$(this).val();
                var currentUrl = new URL(window.location.href);
                currentUrl.searchParams.set('orderby', orderBy);
                currentUrl.searchParams.set('pageno', 1);
                window.location.href = currentUrl.toString();
            });
        });
    </script>
</body>
</html>
", "@MakerProductBlock/Product/maker_list.twig", "/home/asa3150/www/ec-cube/html/app/Plugin/MakerProductBlock/Resource/template/Product/maker_list.twig");
    }
}
