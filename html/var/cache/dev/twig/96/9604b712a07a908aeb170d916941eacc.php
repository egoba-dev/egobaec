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

/* default_frame.twig */
class __TwigTemplate_feaf236aa272483887f8da9b47e35543 extends \Eccube\Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'stylesheet' => [$this, 'block_stylesheet'],
            'main' => [$this, 'block_main'],
            'javascript' => [$this, 'block_javascript'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "default_frame.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "default_frame.twig"));

        // line 1
        echo "<!doctype html>
";
        // line 12
        echo "<html lang=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["eccube_config"]) || array_key_exists("eccube_config", $context) ? $context["eccube_config"] : (function () { throw new RuntimeError('Variable "eccube_config" does not exist.', 12, $this->source); })()), "locale", [], "any", false, false, false, 12), "html", null, true);
        echo "\">
<head prefix=\"og: https://ogp.me/ns# fb: https://ogp.me/ns/fb# product: https://ogp.me/ns/product#\">
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <meta name=\"eccube-csrf-token\" content=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(twig_constant("Eccube\\Common\\Constant::TOKEN_NAME")), "html", null, true);
        echo "\">
    <title>";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["BaseInfo"]) || array_key_exists("BaseInfo", $context) ? $context["BaseInfo"] : (function () { throw new RuntimeError('Variable "BaseInfo" does not exist.', 17, $this->source); })()), "shop_name", [], "any", false, false, false, 17), "html", null, true);
        if ((array_key_exists("subtitle", $context) &&  !twig_test_empty((isset($context["subtitle"]) || array_key_exists("subtitle", $context) ? $context["subtitle"] : (function () { throw new RuntimeError('Variable "subtitle" does not exist.', 17, $this->source); })())))) {
            echo " / ";
            echo twig_escape_filter($this->env, (isset($context["subtitle"]) || array_key_exists("subtitle", $context) ? $context["subtitle"] : (function () { throw new RuntimeError('Variable "subtitle" does not exist.', 17, $this->source); })()), "html", null, true);
        } elseif ((array_key_exists("title", $context) &&  !twig_test_empty((isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 17, $this->source); })())))) {
            echo " / ";
            echo twig_escape_filter($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 17, $this->source); })()), "html", null, true);
        }
        echo "</title>
    ";
        // line 18
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 18, $this->source); })()), "meta_tags", [], "any", false, false, false, 18))) {
            // line 19
            echo "        ";
            echo twig_include($this->env, $context, twig_template_from_string($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 19, $this->source); })()), "meta_tags", [], "any", false, false, false, 19)));
            echo "
        ";
            // line 20
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 20, $this->source); })()), "description", [], "any", false, false, false, 20))) {
                // line 21
                echo "            <meta name=\"description\" content=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 21, $this->source); })()), "description", [], "any", false, false, false, 21), "html", null, true);
                echo "\">
        ";
            }
            // line 23
            echo "    ";
        } else {
            // line 24
            echo "        ";
            echo twig_include($this->env, $context, "meta.twig");
            echo "
    ";
        }
        // line 26
        echo "    ";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 26, $this->source); })()), "author", [], "any", false, false, false, 26))) {
            // line 27
            echo "        <meta name=\"author\" content=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 27, $this->source); })()), "author", [], "any", false, false, false, 27), "html", null, true);
            echo "\">
    ";
        }
        // line 29
        echo "    ";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 29, $this->source); })()), "keyword", [], "any", false, false, false, 29))) {
            // line 30
            echo "        <meta name=\"keywords\" content=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 30, $this->source); })()), "keyword", [], "any", false, false, false, 30), "html", null, true);
            echo "\">
    ";
        }
        // line 32
        echo "    ";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 32, $this->source); })()), "meta_robots", [], "any", false, false, false, 32))) {
            // line 33
            echo "        <meta name=\"robots\" content=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 33, $this->source); })()), "meta_robots", [], "any", false, false, false, 33), "html", null, true);
            echo "\">
    ";
        }
        // line 35
        echo "    <link rel=\"icon\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/img/common/favicon.ico", "user_data"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.3.1/css/all.css\" integrity=\"sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/style.css"), "html", null, true);
        echo "\">
    <script src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("front.bundle.js", "bundle"), "html", null, true);
        echo "\"></script>
    ";
        // line 39
        $this->displayBlock('stylesheet', $context, $blocks);
        // line 40
        echo "    <script>
        \$(function() {
            \$.ajaxSetup({
                'headers': {
                    'ECCUBE-CSRF-TOKEN': \$('meta[name=\"eccube-csrf-token\"]').attr('content')
                }
            });
        });
    </script>
    ";
        // line 50
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 50, $this->source); })()), "Head", [], "any", false, false, false, 50)) {
            // line 51
            echo "        ";
            echo twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 51, $this->source); })()), "Head", [], "any", false, false, false, 51)]);
            echo "
    ";
        }
        // line 53
        echo "    ";
        // line 54
        echo "    ";
        if (array_key_exists("plugin_assets", $context)) {
            echo twig_include($this->env, $context, "@admin/snippet.twig", ["snippets" => (isset($context["plugin_assets"]) || array_key_exists("plugin_assets", $context) ? $context["plugin_assets"] : (function () { throw new RuntimeError('Variable "plugin_assets" does not exist.', 54, $this->source); })())]);
        }
        // line 55
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/customize.css", "user_data"), "html", null, true);
        echo "\">
</head>
<body id=\"page_";
        // line 57
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 57, $this->source); })()), "request", [], "any", false, false, false, 57), "get", [0 => "_route"], "method", false, false, false, 57), "html", null, true);
        echo "\" class=\"";
        echo twig_escape_filter($this->env, ((array_key_exists("body_class", $context)) ? (_twig_default_filter((isset($context["body_class"]) || array_key_exists("body_class", $context) ? $context["body_class"] : (function () { throw new RuntimeError('Variable "body_class" does not exist.', 57, $this->source); })()), "other_page")) : ("other_page")), "html", null, true);
        echo "\">
";
        // line 59
        if (twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 59, $this->source); })()), "BodyAfter", [], "any", false, false, false, 59)) {
            // line 60
            echo "    ";
            echo twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 60, $this->source); })()), "BodyAfter", [], "any", false, false, false, 60)]);
            echo "
";
        }
        // line 62
        echo "
";
        // line 63
        if ((isset($context["isMaintenance"]) || array_key_exists("isMaintenance", $context) ? $context["isMaintenance"] : (function () { throw new RuntimeError('Variable "isMaintenance" does not exist.', 63, $this->source); })())) {
            // line 64
            echo "    <div class=\"ec-maintenanceAlert\">
        <div>
            <div class=\"ec-maintenanceAlert__icon\"><img src=\"";
            // line 66
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/icon/exclamation-white.svg"), "html", null, true);
            echo "\"/></div>
            ";
            // line 67
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("メンテナンスモードが有効になっています。"), "html", null, true);
            echo "
        </div>
    </div>
";
        }
        // line 71
        echo "
<div class=\"ec-layoutRole\">
    ";
        // line 74
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 74, $this->source); })()), "Header", [], "any", false, false, false, 74)) {
            // line 75
            echo "        <header class=\"ec-layoutRole__header\">
            ";
            // line 76
            echo twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 76, $this->source); })()), "Header", [], "any", false, false, false, 76)]);
            echo "
        </header>
    ";
        }
        // line 79
        echo "
    ";
        // line 81
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 81, $this->source); })()), "ContentsTop", [], "any", false, false, false, 81)) {
            // line 82
            echo "        <div class=\"ec-layoutRole__contentTop\">
            ";
            // line 83
            echo twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 83, $this->source); })()), "ContentsTop", [], "any", false, false, false, 83)]);
            echo "
        </div>
    ";
        }
        // line 86
        echo "
    <div class=\"ec-layoutRole__contents\">
        ";
        // line 89
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 89, $this->source); })()), "SideLeft", [], "any", false, false, false, 89)) {
            // line 90
            echo "            <aside class=\"ec-layoutRole__left\">
                ";
            // line 91
            echo twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 91, $this->source); })()), "SideLeft", [], "any", false, false, false, 91)]);
            echo "
            </aside>
        ";
        }
        // line 94
        echo "
        ";
        // line 95
        $context["layoutRoleMain"] = "ec-layoutRole__main";
        // line 96
        echo "        ";
        if ((twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 96, $this->source); })()), "ColumnNum", [], "any", false, false, false, 96) == 2)) {
            // line 97
            echo "            ";
            $context["layoutRoleMain"] = "ec-layoutRole__mainWithColumn";
            // line 98
            echo "        ";
        } elseif ((twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 98, $this->source); })()), "ColumnNum", [], "any", false, false, false, 98) == 3)) {
            // line 99
            echo "            ";
            $context["layoutRoleMain"] = "ec-layoutRole__mainBetweenColumn";
            // line 100
            echo "        ";
        }
        // line 101
        echo "
        <main class=\"";
        // line 102
        echo twig_escape_filter($this->env, (isset($context["layoutRoleMain"]) || array_key_exists("layoutRoleMain", $context) ? $context["layoutRoleMain"] : (function () { throw new RuntimeError('Variable "layoutRoleMain" does not exist.', 102, $this->source); })()), "html", null, true);
        echo "\">
            ";
        // line 104
        echo "            ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 104, $this->source); })()), "MainTop", [], "any", false, false, false, 104)) {
            // line 105
            echo "                <div class=\"ec-layoutRole__mainTop\">
                    ";
            // line 106
            echo twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 106, $this->source); })()), "MainTop", [], "any", false, false, false, 106)]);
            echo "
                </div>
            ";
        }
        // line 109
        echo "
            ";
        // line 111
        echo "            ";
        $this->displayBlock('main', $context, $blocks);
        // line 112
        echo "
            ";
        // line 114
        echo "            ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 114, $this->source); })()), "MainBottom", [], "any", false, false, false, 114)) {
            // line 115
            echo "                <div class=\"ec-layoutRole__mainBottom\">
                    ";
            // line 116
            echo twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 116, $this->source); })()), "MainBottom", [], "any", false, false, false, 116)]);
            echo "
                </div>
            ";
        }
        // line 119
        echo "        </main>

        ";
        // line 122
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 122, $this->source); })()), "SideRight", [], "any", false, false, false, 122)) {
            // line 123
            echo "            <aside class=\"ec-layoutRole__right\">
                ";
            // line 124
            echo twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 124, $this->source); })()), "SideRight", [], "any", false, false, false, 124)]);
            echo "
            </aside>
        ";
        }
        // line 127
        echo "    </div>

    ";
        // line 130
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 130, $this->source); })()), "ContentsBottom", [], "any", false, false, false, 130)) {
            // line 131
            echo "        <div class=\"ec-layoutRole__contentBottom\">
            ";
            // line 132
            echo twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 132, $this->source); })()), "ContentsBottom", [], "any", false, false, false, 132)]);
            echo "
        </div>
    ";
        }
        // line 135
        echo "
    ";
        // line 137
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 137, $this->source); })()), "Footer", [], "any", false, false, false, 137)) {
            // line 138
            echo "        <footer class=\"ec-layoutRole__footer\">
            ";
            // line 139
            echo twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 139, $this->source); })()), "Footer", [], "any", false, false, false, 139)]);
            echo "
        </footer>
    ";
        }
        // line 142
        echo "</div><!-- ec-layoutRole -->

<div class=\"ec-overlayRole\"></div>
<div class=\"ec-drawerRoleClose\"><i class=\"fas fa-times\"></i></div>
<div class=\"ec-drawerRole\">
    ";
        // line 148
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 148, $this->source); })()), "Drawer", [], "any", false, false, false, 148)) {
            // line 149
            echo "        ";
            echo twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 149, $this->source); })()), "Drawer", [], "any", false, false, false, 149)]);
            echo "
    ";
        }
        // line 151
        echo "</div>
<div class=\"ec-blockTopBtn pagetop\">";
        // line 152
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("ページトップへ"), "html", null, true);
        echo "</div>
";
        // line 153
        $this->loadTemplate("@common/lang.twig", "default_frame.twig", 153)->display($context);
        // line 154
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/function.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 155
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/eccube.js"), "html", null, true);
        echo "\"></script>
";
        // line 156
        $this->displayBlock('javascript', $context, $blocks);
        // line 158
        if (twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 158, $this->source); })()), "CloseBodyBefore", [], "any", false, false, false, 158)) {
            // line 159
            echo "    ";
            echo twig_include($this->env, $context, "block.twig", ["Blocks" => twig_get_attribute($this->env, $this->source, (isset($context["Layout"]) || array_key_exists("Layout", $context) ? $context["Layout"] : (function () { throw new RuntimeError('Variable "Layout" does not exist.', 159, $this->source); })()), "CloseBodyBefore", [], "any", false, false, false, 159)]);
            echo "
";
        }
        // line 162
        if (array_key_exists("plugin_snippets", $context)) {
            // line 163
            echo "    ";
            echo twig_include($this->env, $context, "snippet.twig", ["snippets" => (isset($context["plugin_snippets"]) || array_key_exists("plugin_snippets", $context) ? $context["plugin_snippets"] : (function () { throw new RuntimeError('Variable "plugin_snippets" does not exist.', 163, $this->source); })())]);
            echo "
";
        }
        // line 165
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/customize.js", "user_data"), "html", null, true);
        echo "\"></script>
</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 39
    public function block_stylesheet($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheet"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheet"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 111
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "main"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "main"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 156
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascript"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascript"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "default_frame.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  463 => 156,  445 => 111,  427 => 39,  412 => 165,  406 => 163,  404 => 162,  398 => 159,  396 => 158,  394 => 156,  390 => 155,  385 => 154,  383 => 153,  379 => 152,  376 => 151,  370 => 149,  367 => 148,  360 => 142,  354 => 139,  351 => 138,  348 => 137,  345 => 135,  339 => 132,  336 => 131,  333 => 130,  329 => 127,  323 => 124,  320 => 123,  317 => 122,  313 => 119,  307 => 116,  304 => 115,  301 => 114,  298 => 112,  295 => 111,  292 => 109,  286 => 106,  283 => 105,  280 => 104,  276 => 102,  273 => 101,  270 => 100,  267 => 99,  264 => 98,  261 => 97,  258 => 96,  256 => 95,  253 => 94,  247 => 91,  244 => 90,  241 => 89,  237 => 86,  231 => 83,  228 => 82,  225 => 81,  222 => 79,  216 => 76,  213 => 75,  210 => 74,  206 => 71,  199 => 67,  195 => 66,  191 => 64,  189 => 63,  186 => 62,  180 => 60,  178 => 59,  172 => 57,  166 => 55,  161 => 54,  159 => 53,  153 => 51,  150 => 50,  139 => 40,  137 => 39,  133 => 38,  129 => 37,  123 => 35,  117 => 33,  114 => 32,  108 => 30,  105 => 29,  99 => 27,  96 => 26,  90 => 24,  87 => 23,  81 => 21,  79 => 20,  74 => 19,  72 => 18,  61 => 17,  57 => 16,  49 => 12,  46 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html>
{#
This file is part of EC-CUBE

Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.

http://www.ec-cube.co.jp/

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
#}
<html lang=\"{{ eccube_config.locale }}\">
<head prefix=\"og: https://ogp.me/ns# fb: https://ogp.me/ns/fb# product: https://ogp.me/ns/product#\">
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <meta name=\"eccube-csrf-token\" content=\"{{ csrf_token(constant('Eccube\\\\Common\\\\Constant::TOKEN_NAME')) }}\">
    <title>{{ BaseInfo.shop_name }}{% if subtitle is defined and subtitle is not empty %} / {{ subtitle }}{% elseif title is defined and title is not empty %} / {{ title }}{% endif %}</title>
    {% if Page.meta_tags is not empty %}
        {{ include(template_from_string(Page.meta_tags)) }}
        {% if Page.description is not empty %}
            <meta name=\"description\" content=\"{{ Page.description }}\">
        {% endif %}
    {% else %}
        {{ include('meta.twig') }}
    {% endif %}
    {% if Page.author is not empty %}
        <meta name=\"author\" content=\"{{ Page.author }}\">
    {% endif %}
    {% if Page.keyword is not empty %}
        <meta name=\"keywords\" content=\"{{ Page.keyword }}\">
    {% endif %}
    {% if Page.meta_robots is not empty %}
        <meta name=\"robots\" content=\"{{ Page.meta_robots }}\">
    {% endif %}
    <link rel=\"icon\" href=\"{{ asset('assets/img/common/favicon.ico', 'user_data') }}\">
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.3.1/css/all.css\" integrity=\"sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/css/style.css') }}\">
    <script src=\"{{ asset('front.bundle.js', 'bundle') }}\"></script>
    {% block stylesheet %}{% endblock %}
    <script>
        \$(function() {
            \$.ajaxSetup({
                'headers': {
                    'ECCUBE-CSRF-TOKEN': \$('meta[name=\"eccube-csrf-token\"]').attr('content')
                }
            });
        });
    </script>
    {# Layout: HEAD #}
    {% if Layout.Head %}
        {{ include('block.twig', {'Blocks': Layout.Head}) }}
    {% endif %}
    {# プラグイン用styleseetやmetatagなど #}
    {% if plugin_assets is defined %}{{ include('@admin/snippet.twig', { snippets: plugin_assets }) }}{% endif %}
    <link rel=\"stylesheet\" href=\"{{ asset('assets/css/customize.css', 'user_data') }}\">
</head>
<body id=\"page_{{ app.request.get('_route') }}\" class=\"{{ body_class|default('other_page') }}\">
{# Layout: BODY_AFTER #}
{% if Layout.BodyAfter %}
    {{ include('block.twig', {'Blocks': Layout.BodyAfter}) }}
{% endif %}

{% if isMaintenance %}
    <div class=\"ec-maintenanceAlert\">
        <div>
            <div class=\"ec-maintenanceAlert__icon\"><img src=\"{{ asset('assets/icon/exclamation-white.svg') }}\"/></div>
            {{ 'メンテナンスモードが有効になっています。'|trans }}
        </div>
    </div>
{% endif %}

<div class=\"ec-layoutRole\">
    {# Layout: HEADER #}
    {% if Layout.Header %}
        <header class=\"ec-layoutRole__header\">
            {{ include('block.twig', {'Blocks': Layout.Header}) }}
        </header>
    {% endif %}

    {# Layout: CONTENTS_TOP #}
    {% if Layout.ContentsTop %}
        <div class=\"ec-layoutRole__contentTop\">
            {{ include('block.twig', {'Blocks': Layout.ContentsTop}) }}
        </div>
    {% endif %}

    <div class=\"ec-layoutRole__contents\">
        {# Layout: SIDE_LEFT #}
        {% if Layout.SideLeft %}
            <aside class=\"ec-layoutRole__left\">
                {{ include('block.twig', {'Blocks': Layout.SideLeft}) }}
            </aside>
        {% endif %}

        {% set layoutRoleMain = 'ec-layoutRole__main' %}
        {% if Layout.ColumnNum == 2 %}
            {% set layoutRoleMain = 'ec-layoutRole__mainWithColumn' %}
        {% elseif Layout.ColumnNum == 3 %}
            {% set layoutRoleMain = 'ec-layoutRole__mainBetweenColumn' %}
        {% endif %}

        <main class=\"{{ layoutRoleMain }}\">
            {# Layout: MAIN_TOP #}
            {% if Layout.MainTop %}
                <div class=\"ec-layoutRole__mainTop\">
                    {{ include('block.twig', {'Blocks': Layout.MainTop}) }}
                </div>
            {% endif %}

            {# MAIN AREA #}
            {% block main %}{% endblock %}

            {# Layout: MAIN_Bottom #}
            {% if Layout.MainBottom %}
                <div class=\"ec-layoutRole__mainBottom\">
                    {{ include('block.twig', {'Blocks': Layout.MainBottom}) }}
                </div>
            {% endif %}
        </main>

        {# Layout: SIDE_RIGHT #}
        {% if Layout.SideRight %}
            <aside class=\"ec-layoutRole__right\">
                {{ include('block.twig', {'Blocks': Layout.SideRight}) }}
            </aside>
        {% endif %}
    </div>

    {# Layout: CONTENTS_BOTTOM #}
    {% if Layout.ContentsBottom %}
        <div class=\"ec-layoutRole__contentBottom\">
            {{ include('block.twig', {'Blocks': Layout.ContentsBottom}) }}
        </div>
    {% endif %}

    {# Layout: CONTENTS_FOOTER #}
    {% if Layout.Footer %}
        <footer class=\"ec-layoutRole__footer\">
            {{ include('block.twig', {'Blocks': Layout.Footer}) }}
        </footer>
    {% endif %}
</div><!-- ec-layoutRole -->

<div class=\"ec-overlayRole\"></div>
<div class=\"ec-drawerRoleClose\"><i class=\"fas fa-times\"></i></div>
<div class=\"ec-drawerRole\">
    {# Layout: DRAWER #}
    {% if Layout.Drawer %}
        {{ include('block.twig', {'Blocks': Layout.Drawer}) }}
    {% endif %}
</div>
<div class=\"ec-blockTopBtn pagetop\">{{'ページトップへ'|trans}}</div>
{% include('@common/lang.twig') %}
<script src=\"{{ asset('assets/js/function.js') }}\"></script>
<script src=\"{{ asset('assets/js/eccube.js') }}\"></script>
{% block javascript %}{% endblock %}
{# Layout: CLOSE_BODY_BEFORE #}
{% if Layout.CloseBodyBefore %}
    {{ include('block.twig', {'Blocks': Layout.CloseBodyBefore}) }}
{% endif %}
{# プラグイン用Snippet #}
{% if plugin_snippets is defined %}
    {{ include('snippet.twig', { snippets: plugin_snippets }) }}
{% endif %}
    <script src=\"{{ asset('assets/js/customize.js', 'user_data') }}\"></script>
</body>
</html>
", "default_frame.twig", "/home/asa3150/www/ec-cube/html/src/Eccube/Resource/template/default/default_frame.twig");
    }
}
