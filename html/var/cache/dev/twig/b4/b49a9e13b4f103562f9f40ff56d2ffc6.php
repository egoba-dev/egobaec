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

/* meta.twig */
class __TwigTemplate_67aea3460cecab66797b1db9e7f5a554 extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "meta.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "meta.twig"));

        // line 1
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1, $this->source); })()), "request", [], "any", false, false, false, 1), "get", [0 => "_route"], "method", false, false, false, 1) == "product_detail")) {
            // line 2
            echo "    ";
            $context["meta_og_type"] = "og:product";
            // line 3
            echo "    ";
            $context["meta_description"] = _twig_default_filter(((twig_get_attribute($this->env, $this->source, ($context["Product"] ?? null), "description_list", [], "any", true, true, false, 3)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["Product"] ?? null), "description_list", [], "any", false, false, false, 3), twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 3, $this->source); })()), "description_detail", [], "any", false, false, false, 3))) : (twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 3, $this->source); })()), "description_detail", [], "any", false, false, false, 3))), twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 3, $this->source); })()), "description", [], "any", false, false, false, 3));
            // line 4
            echo "    ";
            $context["meta_canonical"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_detail", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 4, $this->source); })()), "id", [], "any", false, false, false, 4)]);
            // line 5
            echo "    <meta property=\"og:title\" content=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 5, $this->source); })()), "name", [], "any", false, false, false, 5), "html", null, true);
            echo "\" />
    <meta property=\"og:image\" content=\"";
            // line 6
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\HttpFoundationExtension']->generateAbsoluteUrl($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl($this->extensions['Eccube\Twig\Extension\EccubeExtension']->getNoImageProduct(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 6, $this->source); })()), "main_list_image", [], "any", false, false, false, 6)), "save_image")), "html", null, true);
            echo "\" />
    <meta property=\"product:price:amount\" content=\"";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 7, $this->source); })()), "getPrice02IncTaxMin", [], "any", false, false, false, 7), "html", null, true);
            echo "\"/>
    <meta property=\"product:price:currency\" content=\"";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["eccube_config"]) || array_key_exists("eccube_config", $context) ? $context["eccube_config"] : (function () { throw new RuntimeError('Variable "eccube_config" does not exist.', 8, $this->source); })()), "currency", [], "any", false, false, false, 8), "html", null, true);
            echo "\"/>
    <meta property=\"product:product_link\" content=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_detail", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 9, $this->source); })()), "id", [], "any", false, false, false, 9)]), "html", null, true);
            echo "\"/>
    <meta property=\"product:retailer_title\" content=\"";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["BaseInfo"]) || array_key_exists("BaseInfo", $context) ? $context["BaseInfo"] : (function () { throw new RuntimeError('Variable "BaseInfo" does not exist.', 10, $this->source); })()), "shop_name", [], "any", false, false, false, 10), "html", null, true);
            echo "\"/>
    ";
            // line 11
            if ( !twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 11, $this->source); })()), "stock_find", [], "any", false, false, false, 11)) {
                // line 12
                echo "        <meta name=\"robots\" content=\"noindex\">
    ";
            }
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 14
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "request", [], "any", false, false, false, 14), "get", [0 => "_route"], "method", false, false, false, 14) == "product_list")) {
            // line 15
            echo "    ";
            $context["meta_canonical"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_list", ["category_id" => ((twig_get_attribute($this->env, $this->source, ($context["Category"] ?? null), "id", [], "any", true, true, false, 15)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["Category"] ?? null), "id", [], "any", false, false, false, 15), null)) : (null))]);
            // line 16
            echo "    ";
            if ((twig_length_filter($this->env, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 16, $this->source); })())) == 0)) {
                // line 17
                echo "        <meta name=\"robots\" content=\"noindex\">
    ";
            }
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 19
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 19, $this->source); })()), "request", [], "any", false, false, false, 19), "get", [0 => "_route"], "method", false, false, false, 19) == "homepage")) {
            // line 20
            echo "    ";
            $context["meta_og_type"] = "website";
            // line 21
            echo "    ";
            $context["meta_canonical"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("homepage");
        } elseif (((        // line 22
array_key_exists("Page", $context) && (twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 22, $this->source); })()), "edit_type", [], "any", false, false, false, 22) == 0)) && twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "url", [], "any", true, true, false, 22))) {
            // line 23
            echo "    ";
            $context["meta_canonical"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, (isset($context["eccube_config"]) || array_key_exists("eccube_config", $context) ? $context["eccube_config"] : (function () { throw new RuntimeError('Variable "eccube_config" does not exist.', 23, $this->source); })()), "eccube_user_data_route", [], "any", false, false, false, 23), ["route" => twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 23, $this->source); })()), "url", [], "any", false, false, false, 23)]);
        }
        // line 25
        echo "
<meta property=\"og:type\" content=\"";
        // line 26
        echo twig_escape_filter($this->env, ((array_key_exists("meta_og_type", $context)) ? (_twig_default_filter((isset($context["meta_og_type"]) || array_key_exists("meta_og_type", $context) ? $context["meta_og_type"] : (function () { throw new RuntimeError('Variable "meta_og_type" does not exist.', 26, $this->source); })()), "article")) : ("article")), "html", null, true);
        echo "\"/>
<meta property=\"og:site_name\" content=\"";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["BaseInfo"]) || array_key_exists("BaseInfo", $context) ? $context["BaseInfo"] : (function () { throw new RuntimeError('Variable "BaseInfo" does not exist.', 27, $this->source); })()), "shop_name", [], "any", false, false, false, 27), "html", null, true);
        echo "\"/>
";
        // line 28
        $context["meta_description"] = ((array_key_exists("meta_description", $context)) ? (_twig_default_filter((isset($context["meta_description"]) || array_key_exists("meta_description", $context) ? $context["meta_description"] : (function () { throw new RuntimeError('Variable "meta_description" does not exist.', 28, $this->source); })()), twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 28, $this->source); })()), "description", [], "any", false, false, false, 28))) : (twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 28, $this->source); })()), "description", [], "any", false, false, false, 28)));
        // line 29
        if ((isset($context["meta_description"]) || array_key_exists("meta_description", $context) ? $context["meta_description"] : (function () { throw new RuntimeError('Variable "meta_description" does not exist.', 29, $this->source); })())) {
            // line 30
            echo "    <meta name=\"description\" content=\"";
            echo twig_escape_filter($this->env, twig_slice($this->env, twig_striptags((isset($context["meta_description"]) || array_key_exists("meta_description", $context) ? $context["meta_description"] : (function () { throw new RuntimeError('Variable "meta_description" does not exist.', 30, $this->source); })())), 0, 120), "html", null, true);
            echo "\">
    <meta property=\"og:description\" content=\"";
            // line 31
            echo twig_escape_filter($this->env, twig_slice($this->env, twig_striptags((isset($context["meta_description"]) || array_key_exists("meta_description", $context) ? $context["meta_description"] : (function () { throw new RuntimeError('Variable "meta_description" does not exist.', 31, $this->source); })())), 0, 120), "html", null, true);
            echo "\"/>
";
        }
        // line 33
        if (((array_key_exists("meta_canonical", $context)) ? (_twig_default_filter((isset($context["meta_canonical"]) || array_key_exists("meta_canonical", $context) ? $context["meta_canonical"] : (function () { throw new RuntimeError('Variable "meta_canonical" does not exist.', 33, $this->source); })()))) : (""))) {
            // line 34
            echo "    ";
            // line 35
            echo "    ";
            // line 36
            echo "    ";
            if ((array_key_exists("Category", $context) && (isset($context["Category"]) || array_key_exists("Category", $context) ? $context["Category"] : (function () { throw new RuntimeError('Variable "Category" does not exist.', 36, $this->source); })()))) {
                // line 37
                echo "        ";
                if (((array_key_exists("pagination", $context) && twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "paginationData", [], "any", true, true, false, 37)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 37, $this->source); })()), "paginationData", [], "any", false, false, false, 37), "pageCount", [], "any", false, false, false, 37) > 1))) {
                    // line 38
                    echo "            ";
                    // line 39
                    echo "            ";
                    if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 39, $this->source); })()), "paginationData", [], "any", false, false, false, 39), "current", [], "any", false, false, false, 39) == 1)) {
                        // line 40
                        echo "            <meta property=\"og:url\" content=\"";
                        echo twig_escape_filter($this->env, (isset($context["meta_canonical"]) || array_key_exists("meta_canonical", $context) ? $context["meta_canonical"] : (function () { throw new RuntimeError('Variable "meta_canonical" does not exist.', 40, $this->source); })()), "html", null, true);
                        echo "\"/>
            <link rel=\"next\" href=\"";
                        // line 41
                        echo twig_escape_filter($this->env, (isset($context["meta_canonical"]) || array_key_exists("meta_canonical", $context) ? $context["meta_canonical"] : (function () { throw new RuntimeError('Variable "meta_canonical" does not exist.', 41, $this->source); })()), "html", null, true);
                        echo "&pageno=2\" title=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Category"]) || array_key_exists("Category", $context) ? $context["Category"] : (function () { throw new RuntimeError('Variable "Category" does not exist.', 41, $this->source); })()), "name", [], "any", false, false, false, 41), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%pageno%ページ目", ["%pageno%" => 2]), "html", null, true);
                        echo "\">
            <link rel=\"canonical\" href=\"";
                        // line 42
                        echo twig_escape_filter($this->env, (isset($context["meta_canonical"]) || array_key_exists("meta_canonical", $context) ? $context["meta_canonical"] : (function () { throw new RuntimeError('Variable "meta_canonical" does not exist.', 42, $this->source); })()), "html", null, true);
                        echo "\" />
            ";
                        // line 44
                        echo "            ";
                    } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 44, $this->source); })()), "paginationData", [], "any", false, false, false, 44), "last", [], "any", false, false, false, 44) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 44, $this->source); })()), "paginationData", [], "any", false, false, false, 44), "current", [], "any", false, false, false, 44))) {
                        // line 45
                        echo "            <meta property=\"og:url\" content=\"";
                        echo twig_escape_filter($this->env, (isset($context["meta_canonical"]) || array_key_exists("meta_canonical", $context) ? $context["meta_canonical"] : (function () { throw new RuntimeError('Variable "meta_canonical" does not exist.', 45, $this->source); })()), "html", null, true);
                        echo "&pageno=";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 45, $this->source); })()), "paginationData", [], "any", false, false, false, 45), "last", [], "any", false, false, false, 45), "html", null, true);
                        echo "\"/>
            <link rel=\"prev\" href=\"";
                        // line 46
                        echo twig_escape_filter($this->env, (isset($context["meta_canonical"]) || array_key_exists("meta_canonical", $context) ? $context["meta_canonical"] : (function () { throw new RuntimeError('Variable "meta_canonical" does not exist.', 46, $this->source); })()), "html", null, true);
                        echo "&pageno=";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 46, $this->source); })()), "paginationData", [], "any", false, false, false, 46), "previous", [], "any", false, false, false, 46), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Category"]) || array_key_exists("Category", $context) ? $context["Category"] : (function () { throw new RuntimeError('Variable "Category" does not exist.', 46, $this->source); })()), "name", [], "any", false, false, false, 46), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%pageno%ページ目", ["%pageno%" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 46, $this->source); })()), "paginationData", [], "any", false, false, false, 46), "previous", [], "any", false, false, false, 46)]), "html", null, true);
                        echo "\">
            <link rel=\"canonical\" href=\"";
                        // line 47
                        echo twig_escape_filter($this->env, (isset($context["meta_canonical"]) || array_key_exists("meta_canonical", $context) ? $context["meta_canonical"] : (function () { throw new RuntimeError('Variable "meta_canonical" does not exist.', 47, $this->source); })()), "html", null, true);
                        echo "&pageno=";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 47, $this->source); })()), "paginationData", [], "any", false, false, false, 47), "last", [], "any", false, false, false, 47), "html", null, true);
                        echo "\" />
            ";
                        // line 49
                        echo "            ";
                    } else {
                        // line 50
                        echo "            <meta property=\"og:url\" content=\"";
                        echo twig_escape_filter($this->env, (isset($context["meta_canonical"]) || array_key_exists("meta_canonical", $context) ? $context["meta_canonical"] : (function () { throw new RuntimeError('Variable "meta_canonical" does not exist.', 50, $this->source); })()), "html", null, true);
                        echo "&pageno=";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 50, $this->source); })()), "paginationData", [], "any", false, false, false, 50), "current", [], "any", false, false, false, 50), "html", null, true);
                        echo "\"/>
            <link rel=\"next\" href=\"";
                        // line 51
                        echo twig_escape_filter($this->env, (isset($context["meta_canonical"]) || array_key_exists("meta_canonical", $context) ? $context["meta_canonical"] : (function () { throw new RuntimeError('Variable "meta_canonical" does not exist.', 51, $this->source); })()), "html", null, true);
                        echo "&pageno=";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 51, $this->source); })()), "paginationData", [], "any", false, false, false, 51), "next", [], "any", false, false, false, 51), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Category"]) || array_key_exists("Category", $context) ? $context["Category"] : (function () { throw new RuntimeError('Variable "Category" does not exist.', 51, $this->source); })()), "name", [], "any", false, false, false, 51), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%pageno%ページ目", ["%pageno%" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 51, $this->source); })()), "paginationData", [], "any", false, false, false, 51), "next", [], "any", false, false, false, 51)]), "html", null, true);
                        echo "\">
            <link rel=\"prev\" href=\"";
                        // line 52
                        echo twig_escape_filter($this->env, (isset($context["meta_canonical"]) || array_key_exists("meta_canonical", $context) ? $context["meta_canonical"] : (function () { throw new RuntimeError('Variable "meta_canonical" does not exist.', 52, $this->source); })()), "html", null, true);
                        echo "&pageno=";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 52, $this->source); })()), "paginationData", [], "any", false, false, false, 52), "previous", [], "any", false, false, false, 52), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Category"]) || array_key_exists("Category", $context) ? $context["Category"] : (function () { throw new RuntimeError('Variable "Category" does not exist.', 52, $this->source); })()), "name", [], "any", false, false, false, 52), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("%pageno%ページ目", ["%pageno%" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 52, $this->source); })()), "paginationData", [], "any", false, false, false, 52), "previous", [], "any", false, false, false, 52)]), "html", null, true);
                        echo "\">
            <link rel=\"canonical\" href=\"";
                        // line 53
                        echo twig_escape_filter($this->env, (isset($context["meta_canonical"]) || array_key_exists("meta_canonical", $context) ? $context["meta_canonical"] : (function () { throw new RuntimeError('Variable "meta_canonical" does not exist.', 53, $this->source); })()), "html", null, true);
                        echo "&pageno=";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 53, $this->source); })()), "paginationData", [], "any", false, false, false, 53), "current", [], "any", false, false, false, 53), "html", null, true);
                        echo "\" />
            ";
                    }
                    // line 55
                    echo "        ";
                } else {
                    // line 56
                    echo "        ";
                    // line 57
                    echo "        <meta property=\"og:url\" content=\"";
                    echo twig_escape_filter($this->env, (isset($context["meta_canonical"]) || array_key_exists("meta_canonical", $context) ? $context["meta_canonical"] : (function () { throw new RuntimeError('Variable "meta_canonical" does not exist.', 57, $this->source); })()), "html", null, true);
                    echo "\"/>
        <link rel=\"canonical\" href=\"";
                    // line 58
                    echo twig_escape_filter($this->env, (isset($context["meta_canonical"]) || array_key_exists("meta_canonical", $context) ? $context["meta_canonical"] : (function () { throw new RuntimeError('Variable "meta_canonical" does not exist.', 58, $this->source); })()), "html", null, true);
                    echo "\" />
        ";
                }
                // line 60
                echo "    ";
                // line 61
                echo "    ";
            } else {
                // line 62
                echo "    <meta property=\"og:url\" content=\"";
                echo twig_escape_filter($this->env, (isset($context["meta_canonical"]) || array_key_exists("meta_canonical", $context) ? $context["meta_canonical"] : (function () { throw new RuntimeError('Variable "meta_canonical" does not exist.', 62, $this->source); })()), "html", null, true);
                echo "\"/>
    <link rel=\"canonical\" href=\"";
                // line 63
                echo twig_escape_filter($this->env, (isset($context["meta_canonical"]) || array_key_exists("meta_canonical", $context) ? $context["meta_canonical"] : (function () { throw new RuntimeError('Variable "meta_canonical" does not exist.', 63, $this->source); })()), "html", null, true);
                echo "\" />
    ";
            }
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "meta.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  258 => 63,  253 => 62,  250 => 61,  248 => 60,  243 => 58,  238 => 57,  236 => 56,  233 => 55,  226 => 53,  216 => 52,  206 => 51,  199 => 50,  196 => 49,  190 => 47,  180 => 46,  173 => 45,  170 => 44,  166 => 42,  158 => 41,  153 => 40,  150 => 39,  148 => 38,  145 => 37,  142 => 36,  140 => 35,  138 => 34,  136 => 33,  131 => 31,  126 => 30,  124 => 29,  122 => 28,  118 => 27,  114 => 26,  111 => 25,  107 => 23,  105 => 22,  102 => 21,  99 => 20,  97 => 19,  93 => 17,  90 => 16,  87 => 15,  85 => 14,  81 => 12,  79 => 11,  75 => 10,  71 => 9,  67 => 8,  63 => 7,  59 => 6,  54 => 5,  51 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if app.request.get('_route') == 'product_detail' %}
    {% set meta_og_type = \"og:product\" %}
    {% set meta_description = Product.description_list | default(Product.description_detail) | default(Page.description) %}
    {% set meta_canonical = url('product_detail', {'id': Product.id}) %}
    <meta property=\"og:title\" content=\"{{ Product.name }}\" />
    <meta property=\"og:image\" content=\"{{ absolute_url(asset(Product.main_list_image|no_image_product, 'save_image')) }}\" />
    <meta property=\"product:price:amount\" content=\"{{ Product.getPrice02IncTaxMin }}\"/>
    <meta property=\"product:price:currency\" content=\"{{ eccube_config.currency }}\"/>
    <meta property=\"product:product_link\" content=\"{{ url('product_detail', {'id': Product.id}) }}\"/>
    <meta property=\"product:retailer_title\" content=\"{{ BaseInfo.shop_name }}\"/>
    {% if not Product.stock_find %}
        <meta name=\"robots\" content=\"noindex\">
    {% endif %}
{% elseif app.request.get('_route') == 'product_list' %}
    {% set meta_canonical = url('product_list', {'category_id': Category.id|default(null)}) %}
    {% if pagination|length == 0 %}
        <meta name=\"robots\" content=\"noindex\">
    {% endif %}
{% elseif app.request.get('_route') == 'homepage' %}
    {% set meta_og_type = 'website' %}
    {% set meta_canonical = url('homepage') %}
{% elseif Page is defined and Page.edit_type == 0 and Page.url is defined %}
    {% set meta_canonical = url(eccube_config.eccube_user_data_route, {'route': Page.url}) %}
{% endif %}

<meta property=\"og:type\" content=\"{{ meta_og_type|default('article') }}\"/>
<meta property=\"og:site_name\" content=\"{{ BaseInfo.shop_name }}\"/>
{% set meta_description = meta_description | default(Page.description) %}
{% if meta_description %}
    <meta name=\"description\" content=\"{{ meta_description|striptags|slice(0,120) }}\">
    <meta property=\"og:description\" content=\"{{ meta_description|striptags|slice(0,120) }}\"/>
{% endif %}
{% if meta_canonical|default() %}
    {# canonical url #}
    {# Product list #}
    {% if Category is defined and Category %}
        {% if pagination is defined and pagination.paginationData is defined and pagination.paginationData.pageCount > 1 %}
            {# 最初のページ #}
            {% if pagination.paginationData.current == 1  %}
            <meta property=\"og:url\" content=\"{{ meta_canonical }}\"/>
            <link rel=\"next\" href=\"{{ meta_canonical }}&pageno=2\" title=\"{{ Category.name }} {{ '%pageno%ページ目'|trans({ '%pageno%': 2 }) }}\">
            <link rel=\"canonical\" href=\"{{ meta_canonical }}\" />
            {# 最後のページ #}
            {% elseif pagination.paginationData.last == pagination.paginationData.current %}
            <meta property=\"og:url\" content=\"{{ meta_canonical }}&pageno={{ pagination.paginationData.last }}\"/>
            <link rel=\"prev\" href=\"{{ meta_canonical }}&pageno={{ pagination.paginationData.previous }}\" title=\"{{ Category.name }} {{ '%pageno%ページ目'|trans({ '%pageno%': pagination.paginationData.previous }) }}\">
            <link rel=\"canonical\" href=\"{{ meta_canonical }}&pageno={{ pagination.paginationData.last }}\" />
            {# 途中のページ #}
            {% else %}
            <meta property=\"og:url\" content=\"{{ meta_canonical }}&pageno={{ pagination.paginationData.current }}\"/>
            <link rel=\"next\" href=\"{{ meta_canonical }}&pageno={{ pagination.paginationData.next }}\" title=\"{{ Category.name }} {{ '%pageno%ページ目'|trans({ '%pageno%': pagination.paginationData.next }) }}\">
            <link rel=\"prev\" href=\"{{ meta_canonical }}&pageno={{ pagination.paginationData.previous }}\" title=\"{{ Category.name }} {{ '%pageno%ページ目'|trans({ '%pageno%': pagination.paginationData.previous }) }}\">
            <link rel=\"canonical\" href=\"{{ meta_canonical }}&pageno={{ pagination.paginationData.current }}\" />
            {% endif %}
        {% else %}
        {# ページング無し #}
        <meta property=\"og:url\" content=\"{{ meta_canonical }}\"/>
        <link rel=\"canonical\" href=\"{{ meta_canonical }}\" />
        {% endif %}
    {# Other #}
    {% else %}
    <meta property=\"og:url\" content=\"{{ meta_canonical }}\"/>
    <link rel=\"canonical\" href=\"{{ meta_canonical }}\" />
    {% endif %}
{% endif %}
", "meta.twig", "/home/asa3150/www/ec-cube/html/src/Eccube/Resource/template/default/meta.twig");
    }
}
