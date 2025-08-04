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

/* Product/detail.twig */
class __TwigTemplate_f4112ae9cb1c1d21f31b3f950a43ccab extends \Eccube\Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'stylesheet' => [$this, 'block_stylesheet'],
            'javascript' => [$this, 'block_javascript'],
            'main' => [$this, 'block_main'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 11
        return "default_frame.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Product/detail.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Product/detail.twig"));

        // line 13
        $context["body_class"] = "product_page";
        // line 11
        $this->parent = $this->loadTemplate("default_frame.twig", "Product/detail.twig", 11);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 15
    public function block_stylesheet($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheet"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheet"));

        // line 16
        echo "    <style>

        .slick-slider {
            margin-bottom: 30px;
        }

        .slick-dots {
            position: absolute;
            bottom: -45px;
            display: block;
            width: 100%;
            padding: 0;
            list-style: none;
            text-align: center;
        }

        .slick-dots li {
            position: relative;
            display: inline-block;
            width: 20px;
            height: 20px;
            margin: 0 5px;
            padding: 0;

            cursor: pointer;
        }

        .slick-dots li button {
            font-size: 0;
            line-height: 0;
            display: block;
            width: 20px;
            height: 20px;
            padding: 5px;
            cursor: pointer;
            color: transparent;
            border: 0;
            outline: none;
            background: transparent;
        }

        .slick-dots li button:hover,
        .slick-dots li button:focus {
            outline: none;
        }

        .slick-dots li button:hover:before,
        .slick-dots li button:focus:before {
            opacity: 1;
        }

        .slick-dots li button:before {
            content: \" \";
            line-height: 20px;
            position: absolute;
            top: 0;
            left: 0;
            width: 12px;
            height: 12px;
            text-align: center;
            opacity: .25;
            background-color: black;
            border-radius: 50%;

        }

        .slick-dots li.slick-active button:before {
            opacity: .75;
            background-color: black;
        }

        .slick-dots li button.thumbnail img {
            width: 0;
            height: 0;
        }

    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 95
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascript"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascript"));

        // line 96
        echo "    <script>
        eccube.classCategories = ";
        // line 97
        echo $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getClassCategoriesAsJson((isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 97, $this->source); })()));
        echo ";

        // 規格2に選択肢を割り当てる。
        function fnSetClassCategories(form, classcat_id2_selected) {
            var \$form = \$(form);
            var product_id = \$form.find('input[name=product_id]').val();
            var \$sele1 = \$form.find('select[name=classcategory_id1]');
            var \$sele2 = \$form.find('select[name=classcategory_id2]');
            eccube.setClassCategories(\$form, product_id, \$sele1, \$sele2, classcat_id2_selected);
        }

        ";
        // line 108
        if (twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "classcategory_id2", [], "any", true, true, false, 108)) {
            // line 109
            echo "        fnSetClassCategories(
            \$('#form1'), ";
            // line 110
            echo json_encode(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 110, $this->source); })()), "classcategory_id2", [], "any", false, false, false, 110), "vars", [], "any", false, false, false, 110), "value", [], "any", false, false, false, 110));
            echo "
        );
        ";
        } elseif (twig_get_attribute($this->env, $this->source,         // line 112
($context["form"] ?? null), "classcategory_id1", [], "any", true, true, false, 112)) {
            // line 113
            echo "        eccube.checkStock(\$('#form1'), ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 113, $this->source); })()), "id", [], "any", false, false, false, 113), "html", null, true);
            echo ", ";
            echo json_encode(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 113, $this->source); })()), "classcategory_id1", [], "any", false, false, false, 113), "vars", [], "any", false, false, false, 113), "value", [], "any", false, false, false, 113));
            echo ", null);
        ";
        }
        // line 115
        echo "    </script>
    <script>
        \$(function() {
            // bfcache無効化
            \$(window).bind('pageshow', function(event) {
                if (event.originalEvent.persisted) {
                    location.reload(true);
                }
            });

            // Core Web Vital の Cumulative Layout Shift(CLS)対策のため
            // img タグに width, height が付与されている.
            // 630px 未満の画面サイズでは縦横比が壊れるための対策
            // see https://github.com/EC-CUBE/ec-cube/pull/5023
            \$('.ec-grid2__cell').hide();
            var removeSize = function () {
                \$('.slide-item').height('');
                \$('.slide-item img')
                    .removeAttr('width')
                    .removeAttr('height')
                    .removeAttr('style');
            };
            var slickInitial = function(slick) {
                \$('.ec-grid2__cell').fadeIn(1500);
                var baseHeight = \$(slick.target).height();
                var baseWidth = \$(slick.target).width();
                var rate = baseWidth / baseHeight;

                \$('.slide-item').height(baseHeight * rate); // 余白を削除する
                // transform を使用することでCLSの影響を受けないようにする
                \$('.slide-item img')
                    .css(
                        {
                            'transform-origin': 'top left',
                            'transform': 'scaleY(' + rate + ')',
                            'transition': 'transform .1s'
                        }
                    );
                // 正しいサイズに近くなったら属性を解除する
                setTimeout(removeSize, 500);
            };
            \$('.item_visual').on('init', slickInitial);
            // リサイズ時は CLS の影響を受けないため属性を解除する
            \$(window).resize(removeSize);
            \$('.item_visual').slick({
                dots: false,
                arrows: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        dots: true
                    }
                }]
            });

            \$('.slideThumb').on('click', function() {
                var index = \$(this).attr('data-index');
                \$('.item_visual').slick('slickGoTo', index, false);
            })
        });
    </script>
    <script>
        \$(function() {
            \$('.add-cart').on('click', function(event) {
                ";
        // line 179
        if (twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "classcategory_id1", [], "any", true, true, false, 179)) {
            // line 180
            echo "                // 規格1フォームの必須チェック
                if (\$('#classcategory_id1').val() == '__unselected' || \$('#classcategory_id1').val() == '') {
                    \$('#classcategory_id1')[0].setCustomValidity('";
            // line 182
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("項目が選択されていません"), "html", null, true);
            echo "');
                    return true;
                } else {
                    \$('#classcategory_id1')[0].setCustomValidity('');
                }
                ";
        }
        // line 188
        echo "
                ";
        // line 189
        if (twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "classcategory_id2", [], "any", true, true, false, 189)) {
            // line 190
            echo "                // 規格2フォームの必須チェック
                if (\$('#classcategory_id2').val() == '__unselected' || \$('#classcategory_id2').val() == '') {
                    \$('#classcategory_id2')[0].setCustomValidity('";
            // line 192
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("項目が選択されていません"), "html", null, true);
            echo "');
                    return true;
                } else {
                    \$('#classcategory_id2')[0].setCustomValidity('');
                }
                ";
        }
        // line 198
        echo "
                // 個数フォームのチェック
                if (\$('#quantity').val() < 1) {
                    \$('#quantity')[0].setCustomValidity('";
        // line 201
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("1以上で入力してください。"), "html", null, true);
        echo "');
                    return true;
                } else {
                    \$('#quantity')[0].setCustomValidity('');
                }

                event.preventDefault();
                \$form = \$('#form1');
                \$.ajax({
                    url: \$form.attr('action'),
                    type: \$form.attr('method'),
                    data: \$form.serialize(),
                    dataType: 'json',
                    beforeSend: function(xhr, settings) {
                        // Buttonを無効にする
                        \$('.add-cart').prop('disabled', true);
                    }
                }).done(function(data) {
                    // レスポンス内のメッセージをalertで表示
                    \$.each(data.messages, function() {
                        \$('#ec-modal-header').html(this);
                    });

                    \$('.ec-modal').show()

                    // カートブロックを更新する
                    \$.ajax({
                        url: \"";
        // line 228
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("block_cart");
        echo "\",
                        type: 'GET',
                        dataType: 'html'
                    }).done(function(html) {
                        \$('.ec-headerRole__cart').html(html);
                    });
                }).fail(function(data) {
                    alert('";
        // line 235
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("カートへの追加に失敗しました。"), "html", null, true);
        echo "');
                }).always(function(data) {
                    // Buttonを有効にする
                    \$('.add-cart').prop('disabled', false);
                });
            });
        });

        \$('.ec-modal-wrap').on('click', function(e) {
            // モーダル内の処理は外側にバブリングさせない
            e.stopPropagation();
        });
        \$('.ec-modal-overlay, .ec-modal, .ec-modal-close, .ec-inlineBtn--cancel').on('click', function() {
            \$('.ec-modal').hide()
        });
    </script>
    <script type=\"application/ld+json\">
    {
        \"@context\": \"https://schema.org/\",
        \"@type\": \"Product\",
        \"name\": \"";
        // line 255
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 255, $this->source); })()), "name", [], "any", false, false, false, 255), "html", null, true);
        echo "\",
        \"image\": [
            ";
        // line 257
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 257, $this->source); })()), "ProductImage", [], "any", false, false, false, 257));
        $context['_iterated'] = false;
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["img"]) {
            // line 258
            echo "                \"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 258, $this->source); })()), "request", [], "any", false, false, false, 258), "schemeAndHttpHost", [], "any", false, false, false, 258), "html", null, true);
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl($context["img"], "save_image"), "html", null, true);
            echo "\"";
            if ( !twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 258)) {
                echo ",";
            }
            // line 259
            echo "
            ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 261
            echo "                \"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 261, $this->source); })()), "request", [], "any", false, false, false, 261), "schemeAndHttpHost", [], "any", false, false, false, 261), "html", null, true);
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl($this->extensions['Eccube\Twig\Extension\EccubeExtension']->getNoImageProduct(""), "save_image"), "html", null, true);
            echo "\"
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['img'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 263
        echo "        ],
        \"description\": \"";
        // line 264
        echo twig_escape_filter($this->env, twig_slice($this->env, twig_replace_filter(((twig_get_attribute($this->env, $this->source, ($context["Product"] ?? null), "description_list", [], "any", true, true, false, 264)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["Product"] ?? null), "description_list", [], "any", false, false, false, 264), twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 264, $this->source); })()), "description_detail", [], "any", false, false, false, 264))) : (twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 264, $this->source); })()), "description_detail", [], "any", false, false, false, 264))), ["
" => "", "" => ""]), 0, 300), "html", null, true);
        echo "\",
        ";
        // line 265
        if (twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 265, $this->source); })()), "code_min", [], "any", false, false, false, 265)) {
            // line 266
            echo "        \"sku\": \"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 266, $this->source); })()), "code_min", [], "any", false, false, false, 266), "html", null, true);
            echo "\",
        ";
        }
        // line 268
        echo "        \"offers\": {
            \"@type\": \"Offer\",
            \"url\": \"";
        // line 270
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_detail", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 270, $this->source); })()), "id", [], "any", false, false, false, 270)]), "html", null, true);
        echo "\",
            \"priceCurrency\": \"";
        // line 271
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["eccube_config"]) || array_key_exists("eccube_config", $context) ? $context["eccube_config"] : (function () { throw new RuntimeError('Variable "eccube_config" does not exist.', 271, $this->source); })()), "currency", [], "any", false, false, false, 271), "html", null, true);
        echo "\",
            \"price\": ";
        // line 272
        ((twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 272, $this->source); })()), "getPrice02IncTaxMin", [], "any", false, false, false, 272)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 272, $this->source); })()), "getPrice02IncTaxMin", [], "any", false, false, false, 272), "html", null, true))) : (print (0)));
        echo ",
            \"availability\": \"";
        // line 273
        echo ((twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 273, $this->source); })()), "stock_find", [], "any", false, false, false, 273)) ? ("InStock") : ("OutOfStock"));
        echo "\"
        }
    }
    </script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 279
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "main"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "main"));

        // line 280
        echo "    <div class=\"ec-productRole\">
        <div class=\"ec-grid2\">
            <div class=\"ec-grid2__cell\">
                <div class=\"ec-sliderItemRole\">

                    <div class=\"item_visual\">
                        ";
        // line 286
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 286, $this->source); })()), "ProductImage", [], "any", false, false, false, 286));
        $context['_iterated'] = false;
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["ProductImage"]) {
            // line 287
            echo "                            <div class=\"slide-item\"><img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl($context["ProductImage"], "save_image"), "html", null, true);
            echo "\" alt=\"";
            ((twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 287)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 287, $this->source); })()), "name", [], "any", false, false, false, 287), "html", null, true))) : (print ("")));
            echo "\" width=\"550\" height=\"550\"";
            if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 287) > 1)) {
                echo " loading=\"lazy\"";
            }
            echo "></div>
                        ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 289
            echo "                            <div class=\"slide-item\"><img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl($this->extensions['Eccube\Twig\Extension\EccubeExtension']->getNoImageProduct(""), "save_image"), "html", null, true);
            echo "\" alt=\"";
            ((twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 289)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 289, $this->source); })()), "name", [], "any", false, false, false, 289), "html", null, true))) : (print ("")));
            echo "\" width=\"550\" height=\"550\"></div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ProductImage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 291
        echo "                    </div>
                    <div class=\"item_nav\">
                        ";
        // line 293
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 293, $this->source); })()), "ProductImage", [], "any", false, false, false, 293));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["ProductImage"]) {
            // line 294
            echo "                            <div class=\"slideThumb\" data-index=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 294), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl($context["ProductImage"], "save_image"), "html", null, true);
            echo "\" alt=\"\" width=\"133\" height=\"133\" loading=\"lazy\"></div>
                        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ProductImage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 296
        echo "                    </div>
                </div>
            </div>
            <div class=\"ec-grid2__cell\">
                <div class=\"ec-productRole__profile\">
                    ";
        // line 302
        echo "                    <div class=\"ec-productRole__title\">
                        <h2 class=\"ec-headingTitle\">";
        // line 303
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 303, $this->source); })()), "name", [], "any", false, false, false, 303), "html", null, true);
        echo "</h2>
                    </div>
                    ";
        // line 306
        echo "                    <ul class=\"ec-productRole__tags\">
                        ";
        // line 307
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 307, $this->source); })()), "Tags", [], "any", false, false, false, 307));
        foreach ($context['_seq'] as $context["_key"] => $context["Tag"]) {
            // line 308
            echo "                            <li class=\"ec-productRole__tag tag_";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Tag"], "id", [], "any", false, false, false, 308), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["Tag"], "html", null, true);
            echo "</li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Tag'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 310
        echo "                    </ul>
                    ";
        // line 312
        echo "                    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 312, $this->source); })()), "hasProductClass", [], "any", false, false, false, 312)) {
            // line 313
            echo "<div class=\"ec-productRole__priceRegular\">
                            ";
            // line 314
            if (( !(null === twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 314, $this->source); })()), "getPrice01Min", [], "any", false, false, false, 314)) && (twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 314, $this->source); })()), "getPrice01IncTaxMin", [], "any", false, false, false, 314) == twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 314, $this->source); })()), "getPrice01IncTaxMax", [], "any", false, false, false, 314)))) {
                // line 315
                echo "                                <span class=\"ec-productRole__priceRegularPrice\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("通常価格"), "html", null, true);
                echo "：<span class=\"price01-default\">";
                echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 315, $this->source); })()), "getPrice01IncTaxMin", [], "any", false, false, false, 315)), "html", null, true);
                echo "</span></span>
                                <span class=\"ec-productRole__priceRegularTax\">";
                // line 316
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("税込"), "html", null, true);
                echo "</span>
                            ";
            } elseif (( !(null === twig_get_attribute($this->env, $this->source,             // line 317
(isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 317, $this->source); })()), "getPrice01Min", [], "any", false, false, false, 317)) &&  !(null === twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 317, $this->source); })()), "getPrice01Max", [], "any", false, false, false, 317)))) {
                // line 318
                echo "                                <span class=\"ec-productRole__priceRegularPrice\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("通常価格"), "html", null, true);
                echo "：<span class=\"price01-default\">";
                echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 318, $this->source); })()), "getPrice01IncTaxMin", [], "any", false, false, false, 318)), "html", null, true);
                echo "～ ";
                echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 318, $this->source); })()), "getPrice01IncTaxMax", [], "any", false, false, false, 318)), "html", null, true);
                echo "</span></span>
                                <span class=\"ec-productRole__priceRegularTax\">";
                // line 319
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("税込"), "html", null, true);
                echo "</span>
                            ";
            }
            // line 321
            echo "                        </div>
                    ";
        } else {
            // line 323
            echo "                        ";
            if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 323, $this->source); })()), "getPrice01Max", [], "any", false, false, false, 323))) {
                // line 324
                echo "                            <span class=\"ec-productRole__priceRegularPrice\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("通常価格"), "html", null, true);
                echo "：";
                echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 324, $this->source); })()), "getPrice01IncTaxMin", [], "any", false, false, false, 324)), "html", null, true);
                echo "</span>
                            <span class=\"ec-productRole__priceRegularTax\">";
                // line 325
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("税込"), "html", null, true);
                echo "</span>
                        ";
            }
            // line 327
            echo "                    ";
        }
        // line 328
        echo "                    ";
        // line 329
        echo "                    <div class=\"ec-productRole__price\">
                        ";
        // line 330
        if (twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 330, $this->source); })()), "hasProductClass", [], "any", false, false, false, 330)) {
            // line 331
            if ((twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 331, $this->source); })()), "getPrice02IncTaxMin", [], "any", false, false, false, 331) == twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 331, $this->source); })()), "getPrice02IncTaxMax", [], "any", false, false, false, 331))) {
                // line 332
                echo "                                <div class=\"ec-price\">
                                    <span class=\"ec-price__price price02-default\">";
                // line 333
                echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 333, $this->source); })()), "getPrice02IncTaxMin", [], "any", false, false, false, 333)), "html", null, true);
                echo "</span>
                                    <span class=\"ec-price__tax\">";
                // line 334
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("税込"), "html", null, true);
                echo "</span>
                                </div>
                            ";
            } else {
                // line 337
                echo "                                <div class=\"ec-price\">
                                    <span class=\"ec-price__price price02-default\">";
                // line 338
                echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 338, $this->source); })()), "getPrice02IncTaxMin", [], "any", false, false, false, 338)), "html", null, true);
                echo " ～ ";
                echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 338, $this->source); })()), "getPrice02IncTaxMax", [], "any", false, false, false, 338)), "html", null, true);
                echo "</span>
                                    <span class=\"ec-price__tax\">";
                // line 339
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("税込"), "html", null, true);
                echo "</span>
                                </div>
                            ";
            }
            // line 342
            echo "                        ";
        } else {
            // line 343
            echo "                            <div class=\"ec-price\">
                                <span class=\"ec-price__price\">";
            // line 344
            echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 344, $this->source); })()), "getPrice02IncTaxMin", [], "any", false, false, false, 344)), "html", null, true);
            echo "</span>
                                <span class=\"ec-price__tax\">";
            // line 345
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("税込"), "html", null, true);
            echo "</span>
                            </div>
                        ";
        }
        // line 348
        echo "                    </div>
                    ";
        // line 350
        echo "                    ";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 350, $this->source); })()), "code_min", [], "any", false, false, false, 350))) {
            // line 351
            echo "                        <div class=\"ec-productRole__code\">
                            ";
            // line 352
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("商品コード"), "html", null, true);
            echo "： <span class=\"product-code-default\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 352, $this->source); })()), "code_min", [], "any", false, false, false, 352), "html", null, true);
            if ((twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 352, $this->source); })()), "code_min", [], "any", false, false, false, 352) != twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 352, $this->source); })()), "code_max", [], "any", false, false, false, 352))) {
                echo " ～ ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 352, $this->source); })()), "code_max", [], "any", false, false, false, 352), "html", null, true);
            }
            echo "</span>
                        </div>
                    ";
        }
        // line 355
        echo "                    ";
        // line 356
        echo "                    ";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 356, $this->source); })()), "ProductCategories", [], "any", false, false, false, 356))) {
            // line 357
            echo "                        <div class=\"ec-productRole__category\">
                            <div>";
            // line 358
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("関連カテゴリ"), "html", null, true);
            echo "</div>
                            ";
            // line 359
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 359, $this->source); })()), "ProductCategories", [], "any", false, false, false, 359));
            foreach ($context['_seq'] as $context["_key"] => $context["ProductCategory"]) {
                // line 360
                echo "                                <ul>
                                    <li>
                                        ";
                // line 362
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["ProductCategory"], "Category", [], "any", false, false, false, 362), "path", [], "any", false, false, false, 362));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["Category"]) {
                    // line 363
                    echo "                                            <a href=\"";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_list");
                    echo "?category_id=";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Category"], "id", [], "any", false, false, false, 363), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Category"], "name", [], "any", false, false, false, 363), "html", null, true);
                    echo "</a>";
                    if ((twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 363) == false)) {
                        // line 364
                        echo "                                            <span>＞</span>";
                    }
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Category'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 366
                echo "                                    </li>
                                </ul>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ProductCategory'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 369
            echo "                        </div>
                    ";
        }
        // line 371
        echo "                    <form action=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_add_cart", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 371, $this->source); })()), "id", [], "any", false, false, false, 371)]), "html", null, true);
        echo "\" method=\"post\" id=\"form1\" name=\"form1\">
                        ";
        // line 372
        if (twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 372, $this->source); })()), "stock_find", [], "any", false, false, false, 372)) {
            // line 373
            echo "                            <div class=\"ec-productRole__actions\">
                                ";
            // line 374
            if (twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "classcategory_id1", [], "any", true, true, false, 374)) {
                // line 375
                echo "                                    <div class=\"ec-select\">
                                        ";
                // line 376
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 376, $this->source); })()), "classcategory_id1", [], "any", false, false, false, 376), 'row');
                echo "
                                        ";
                // line 377
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 377, $this->source); })()), "classcategory_id1", [], "any", false, false, false, 377), 'errors');
                echo "
                                    </div>
                                    ";
                // line 379
                if (twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "classcategory_id2", [], "any", true, true, false, 379)) {
                    // line 380
                    echo "                                        <div class=\"ec-select\">
                                            ";
                    // line 381
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 381, $this->source); })()), "classcategory_id2", [], "any", false, false, false, 381), 'row');
                    echo "
                                            ";
                    // line 382
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 382, $this->source); })()), "classcategory_id2", [], "any", false, false, false, 382), 'errors');
                    echo "
                                        </div>
                                    ";
                }
                // line 385
                echo "                                ";
            }
            // line 386
            echo "                                <div class=\"ec-numberInput\"><span>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("数量"), "html", null, true);
            echo "</span>
                                    ";
            // line 387
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 387, $this->source); })()), "quantity", [], "any", false, false, false, 387), 'widget');
            echo "
                                    ";
            // line 388
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 388, $this->source); })()), "quantity", [], "any", false, false, false, 388), 'errors');
            echo "
                                </div>
                            </div>
                            <div class=\"ec-productRole__btn\">
                                <button type=\"submit\" class=\"ec-blockBtn--action add-cart\">
                                    ";
            // line 393
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("カートに入れる"), "html", null, true);
            echo "
                                </button>
                            </div>
                        ";
        } else {
            // line 397
            echo "                            <div class=\"ec-productRole__btn\">
                                <button type=\"button\" class=\"ec-blockBtn--action\" disabled=\"disabled\">
                                    ";
            // line 399
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("ただいま品切れ中です。"), "html", null, true);
            echo "
                                </button>
                            </div>
                        ";
        }
        // line 403
        echo "
                        ";
        // line 404
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 404, $this->source); })()), 'rest');
        echo "
                    </form>
                    <div class=\"ec-modal\">
                        <div class=\"ec-modal-overlay\">
                            <div class=\"ec-modal-wrap\">
                                <span class=\"ec-modal-close\"><span class=\"ec-icon\"><img src=\"";
        // line 409
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/icon/cross-dark.svg"), "html", null, true);
        echo "\" alt=\"\"/></span></span>
                                <div id=\"ec-modal-header\" class=\"text-center\">";
        // line 410
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("カートに追加しました。"), "html", null, true);
        echo "</div>
                                <div class=\"ec-modal-box\">
                                    <div class=\"ec-role\">
                                        <span class=\"ec-inlineBtn--cancel\">";
        // line 413
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("お買い物を続ける"), "html", null, true);
        echo "</span>
                                        <a href=\"";
        // line 414
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("cart");
        echo "\" class=\"ec-inlineBtn--action\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("カートへ進む"), "html", null, true);
        echo "</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
        // line 420
        if (twig_get_attribute($this->env, $this->source, (isset($context["BaseInfo"]) || array_key_exists("BaseInfo", $context) ? $context["BaseInfo"] : (function () { throw new RuntimeError('Variable "BaseInfo" does not exist.', 420, $this->source); })()), "option_favorite_product", [], "any", false, false, false, 420)) {
            // line 421
            echo "                        <form action=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_add_favorite", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 421, $this->source); })()), "id", [], "any", false, false, false, 421)]), "html", null, true);
            echo "\" method=\"post\">
                            <div class=\"ec-productRole__btn\">
                                ";
            // line 423
            if (((isset($context["is_favorite"]) || array_key_exists("is_favorite", $context) ? $context["is_favorite"] : (function () { throw new RuntimeError('Variable "is_favorite" does not exist.', 423, $this->source); })()) == false)) {
                // line 424
                echo "                                    <button type=\"submit\" id=\"favorite\" class=\"ec-blockBtn--cancel\">
                                        ";
                // line 425
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("お気に入りに追加"), "html", null, true);
                echo "
                                    </button>
                                ";
            } else {
                // line 428
                echo "                                    <button type=\"submit\" id=\"favorite\" class=\"ec-blockBtn--cancel\"
                                            disabled=\"disabled\">";
                // line 429
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("お気に入りに追加済です。"), "html", null, true);
                echo "
                                    </button>
                                ";
            }
            // line 432
            echo "                            </div>
                        </form>
                    ";
        }
        // line 435
        echo "                    <div class=\"ec-productRole__description\">";
        echo twig_nl2br(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 435, $this->source); })()), "description_detail", [], "any", false, false, false, 435));
        echo "
                    </div>
                </div>
            </div>
        </div>
        ";
        // line 440
        if (twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 440, $this->source); })()), "freearea", [], "any", false, false, false, 440)) {
            // line 441
            echo "             <div class=\"ec-productRole__description\">
                 ";
            // line 442
            echo twig_include($this->env, $context, twig_template_from_string($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 442, $this->source); })()), "freearea", [], "any", false, false, false, 442)));
            echo "
            </div>
        ";
        }
        // line 445
        echo "    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "Product/detail.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  991 => 445,  985 => 442,  982 => 441,  980 => 440,  971 => 435,  966 => 432,  960 => 429,  957 => 428,  951 => 425,  948 => 424,  946 => 423,  940 => 421,  938 => 420,  927 => 414,  923 => 413,  917 => 410,  913 => 409,  905 => 404,  902 => 403,  895 => 399,  891 => 397,  884 => 393,  876 => 388,  872 => 387,  867 => 386,  864 => 385,  858 => 382,  854 => 381,  851 => 380,  849 => 379,  844 => 377,  840 => 376,  837 => 375,  835 => 374,  832 => 373,  830 => 372,  825 => 371,  821 => 369,  813 => 366,  798 => 364,  789 => 363,  772 => 362,  768 => 360,  764 => 359,  760 => 358,  757 => 357,  754 => 356,  752 => 355,  740 => 352,  737 => 351,  734 => 350,  731 => 348,  725 => 345,  721 => 344,  718 => 343,  715 => 342,  709 => 339,  703 => 338,  700 => 337,  694 => 334,  690 => 333,  687 => 332,  685 => 331,  683 => 330,  680 => 329,  678 => 328,  675 => 327,  670 => 325,  663 => 324,  660 => 323,  656 => 321,  651 => 319,  642 => 318,  640 => 317,  636 => 316,  629 => 315,  627 => 314,  624 => 313,  621 => 312,  618 => 310,  607 => 308,  603 => 307,  600 => 306,  595 => 303,  592 => 302,  585 => 296,  566 => 294,  549 => 293,  545 => 291,  534 => 289,  512 => 287,  494 => 286,  486 => 280,  476 => 279,  461 => 273,  457 => 272,  453 => 271,  449 => 270,  445 => 268,  439 => 266,  437 => 265,  432 => 264,  429 => 263,  419 => 261,  405 => 259,  397 => 258,  379 => 257,  374 => 255,  351 => 235,  341 => 228,  311 => 201,  306 => 198,  297 => 192,  293 => 190,  291 => 189,  288 => 188,  279 => 182,  275 => 180,  273 => 179,  207 => 115,  199 => 113,  197 => 112,  192 => 110,  189 => 109,  187 => 108,  173 => 97,  170 => 96,  160 => 95,  73 => 16,  63 => 15,  52 => 11,  50 => 13,  37 => 11,);
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
{% extends 'default_frame.twig' %}

{% set body_class = 'product_page' %}

{% block stylesheet %}
    <style>

        .slick-slider {
            margin-bottom: 30px;
        }

        .slick-dots {
            position: absolute;
            bottom: -45px;
            display: block;
            width: 100%;
            padding: 0;
            list-style: none;
            text-align: center;
        }

        .slick-dots li {
            position: relative;
            display: inline-block;
            width: 20px;
            height: 20px;
            margin: 0 5px;
            padding: 0;

            cursor: pointer;
        }

        .slick-dots li button {
            font-size: 0;
            line-height: 0;
            display: block;
            width: 20px;
            height: 20px;
            padding: 5px;
            cursor: pointer;
            color: transparent;
            border: 0;
            outline: none;
            background: transparent;
        }

        .slick-dots li button:hover,
        .slick-dots li button:focus {
            outline: none;
        }

        .slick-dots li button:hover:before,
        .slick-dots li button:focus:before {
            opacity: 1;
        }

        .slick-dots li button:before {
            content: \" \";
            line-height: 20px;
            position: absolute;
            top: 0;
            left: 0;
            width: 12px;
            height: 12px;
            text-align: center;
            opacity: .25;
            background-color: black;
            border-radius: 50%;

        }

        .slick-dots li.slick-active button:before {
            opacity: .75;
            background-color: black;
        }

        .slick-dots li button.thumbnail img {
            width: 0;
            height: 0;
        }

    </style>
{% endblock %}

{% block javascript %}
    <script>
        eccube.classCategories = {{ class_categories_as_json(Product)|raw }};

        // 規格2に選択肢を割り当てる。
        function fnSetClassCategories(form, classcat_id2_selected) {
            var \$form = \$(form);
            var product_id = \$form.find('input[name=product_id]').val();
            var \$sele1 = \$form.find('select[name=classcategory_id1]');
            var \$sele2 = \$form.find('select[name=classcategory_id2]');
            eccube.setClassCategories(\$form, product_id, \$sele1, \$sele2, classcat_id2_selected);
        }

        {% if form.classcategory_id2 is defined %}
        fnSetClassCategories(
            \$('#form1'), {{ form.classcategory_id2.vars.value|json_encode|raw }}
        );
        {% elseif form.classcategory_id1 is defined %}
        eccube.checkStock(\$('#form1'), {{ Product.id }}, {{ form.classcategory_id1.vars.value|json_encode|raw }}, null);
        {% endif %}
    </script>
    <script>
        \$(function() {
            // bfcache無効化
            \$(window).bind('pageshow', function(event) {
                if (event.originalEvent.persisted) {
                    location.reload(true);
                }
            });

            // Core Web Vital の Cumulative Layout Shift(CLS)対策のため
            // img タグに width, height が付与されている.
            // 630px 未満の画面サイズでは縦横比が壊れるための対策
            // see https://github.com/EC-CUBE/ec-cube/pull/5023
            \$('.ec-grid2__cell').hide();
            var removeSize = function () {
                \$('.slide-item').height('');
                \$('.slide-item img')
                    .removeAttr('width')
                    .removeAttr('height')
                    .removeAttr('style');
            };
            var slickInitial = function(slick) {
                \$('.ec-grid2__cell').fadeIn(1500);
                var baseHeight = \$(slick.target).height();
                var baseWidth = \$(slick.target).width();
                var rate = baseWidth / baseHeight;

                \$('.slide-item').height(baseHeight * rate); // 余白を削除する
                // transform を使用することでCLSの影響を受けないようにする
                \$('.slide-item img')
                    .css(
                        {
                            'transform-origin': 'top left',
                            'transform': 'scaleY(' + rate + ')',
                            'transition': 'transform .1s'
                        }
                    );
                // 正しいサイズに近くなったら属性を解除する
                setTimeout(removeSize, 500);
            };
            \$('.item_visual').on('init', slickInitial);
            // リサイズ時は CLS の影響を受けないため属性を解除する
            \$(window).resize(removeSize);
            \$('.item_visual').slick({
                dots: false,
                arrows: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        dots: true
                    }
                }]
            });

            \$('.slideThumb').on('click', function() {
                var index = \$(this).attr('data-index');
                \$('.item_visual').slick('slickGoTo', index, false);
            })
        });
    </script>
    <script>
        \$(function() {
            \$('.add-cart').on('click', function(event) {
                {% if form.classcategory_id1 is defined %}
                // 規格1フォームの必須チェック
                if (\$('#classcategory_id1').val() == '__unselected' || \$('#classcategory_id1').val() == '') {
                    \$('#classcategory_id1')[0].setCustomValidity('{{ '項目が選択されていません'|trans }}');
                    return true;
                } else {
                    \$('#classcategory_id1')[0].setCustomValidity('');
                }
                {% endif %}

                {% if form.classcategory_id2 is defined %}
                // 規格2フォームの必須チェック
                if (\$('#classcategory_id2').val() == '__unselected' || \$('#classcategory_id2').val() == '') {
                    \$('#classcategory_id2')[0].setCustomValidity('{{ '項目が選択されていません'|trans }}');
                    return true;
                } else {
                    \$('#classcategory_id2')[0].setCustomValidity('');
                }
                {% endif %}

                // 個数フォームのチェック
                if (\$('#quantity').val() < 1) {
                    \$('#quantity')[0].setCustomValidity('{{ '1以上で入力してください。'|trans }}');
                    return true;
                } else {
                    \$('#quantity')[0].setCustomValidity('');
                }

                event.preventDefault();
                \$form = \$('#form1');
                \$.ajax({
                    url: \$form.attr('action'),
                    type: \$form.attr('method'),
                    data: \$form.serialize(),
                    dataType: 'json',
                    beforeSend: function(xhr, settings) {
                        // Buttonを無効にする
                        \$('.add-cart').prop('disabled', true);
                    }
                }).done(function(data) {
                    // レスポンス内のメッセージをalertで表示
                    \$.each(data.messages, function() {
                        \$('#ec-modal-header').html(this);
                    });

                    \$('.ec-modal').show()

                    // カートブロックを更新する
                    \$.ajax({
                        url: \"{{ url('block_cart') }}\",
                        type: 'GET',
                        dataType: 'html'
                    }).done(function(html) {
                        \$('.ec-headerRole__cart').html(html);
                    });
                }).fail(function(data) {
                    alert('{{ 'カートへの追加に失敗しました。'|trans }}');
                }).always(function(data) {
                    // Buttonを有効にする
                    \$('.add-cart').prop('disabled', false);
                });
            });
        });

        \$('.ec-modal-wrap').on('click', function(e) {
            // モーダル内の処理は外側にバブリングさせない
            e.stopPropagation();
        });
        \$('.ec-modal-overlay, .ec-modal, .ec-modal-close, .ec-inlineBtn--cancel').on('click', function() {
            \$('.ec-modal').hide()
        });
    </script>
    <script type=\"application/ld+json\">
    {
        \"@context\": \"https://schema.org/\",
        \"@type\": \"Product\",
        \"name\": \"{{ Product.name }}\",
        \"image\": [
            {% for img in Product.ProductImage %}
                \"{{ app.request.schemeAndHttpHost }}{{ asset(img, 'save_image') }}\"{% if not loop.last %},{% endif %}

            {% else %}
                \"{{ app.request.schemeAndHttpHost }}{{ asset(''|no_image_product, 'save_image') }}\"
            {% endfor %}
        ],
        \"description\": \"{{ Product.description_list | default(Product.description_detail) | replace({'\\n': '', '\\r': ''}) | slice(0,300) }}\",
        {% if Product.code_min %}
        \"sku\": \"{{ Product.code_min }}\",
        {% endif %}
        \"offers\": {
            \"@type\": \"Offer\",
            \"url\": \"{{ url('product_detail', {'id': Product.id}) }}\",
            \"priceCurrency\": \"{{ eccube_config.currency }}\",
            \"price\": {{ Product.getPrice02IncTaxMin ? Product.getPrice02IncTaxMin : 0}},
            \"availability\": \"{{ Product.stock_find ? \"InStock\" : \"OutOfStock\" }}\"
        }
    }
    </script>
{% endblock %}

{% block main %}
    <div class=\"ec-productRole\">
        <div class=\"ec-grid2\">
            <div class=\"ec-grid2__cell\">
                <div class=\"ec-sliderItemRole\">

                    <div class=\"item_visual\">
                        {% for ProductImage in Product.ProductImage %}
                            <div class=\"slide-item\"><img src=\"{{ asset(ProductImage, 'save_image') }}\" alt=\"{{ loop.first ? Product.name : '' }}\" width=\"550\" height=\"550\"{% if loop.index > 1 %} loading=\"lazy\"{% endif %}></div>
                        {% else %}
                            <div class=\"slide-item\"><img src=\"{{ asset(''|no_image_product, 'save_image') }}\" alt=\"{{ loop.first ? Product.name : '' }}\" width=\"550\" height=\"550\"></div>
                        {% endfor %}
                    </div>
                    <div class=\"item_nav\">
                        {% for ProductImage in Product.ProductImage %}
                            <div class=\"slideThumb\" data-index=\"{{ loop.index0 }}\"><img src=\"{{ asset(ProductImage, 'save_image') }}\" alt=\"\" width=\"133\" height=\"133\" loading=\"lazy\"></div>
                        {% endfor %}
                    </div>
                </div>
            </div>
            <div class=\"ec-grid2__cell\">
                <div class=\"ec-productRole__profile\">
                    {# 商品名 #}
                    <div class=\"ec-productRole__title\">
                        <h2 class=\"ec-headingTitle\">{{ Product.name }}</h2>
                    </div>
                    {# タグ #}
                    <ul class=\"ec-productRole__tags\">
                        {% for Tag in Product.Tags %}
                            <li class=\"ec-productRole__tag tag_{{ Tag.id }}\">{{ Tag }}</li>
                        {% endfor %}
                    </ul>
                    {# 通常価格 #}
                    {% if Product.hasProductClass -%}
                        <div class=\"ec-productRole__priceRegular\">
                            {% if Product.getPrice01Min is not null and Product.getPrice01IncTaxMin == Product.getPrice01IncTaxMax %}
                                <span class=\"ec-productRole__priceRegularPrice\">{{ '通常価格'|trans }}：<span class=\"price01-default\">{{ Product.getPrice01IncTaxMin|price }}</span></span>
                                <span class=\"ec-productRole__priceRegularTax\">{{ '税込'|trans }}</span>
                            {% elseif Product.getPrice01Min is not null and Product.getPrice01Max is not null %}
                                <span class=\"ec-productRole__priceRegularPrice\">{{ '通常価格'|trans }}：<span class=\"price01-default\">{{ Product.getPrice01IncTaxMin|price }}～ {{ Product.getPrice01IncTaxMax|price }}</span></span>
                                <span class=\"ec-productRole__priceRegularTax\">{{ '税込'|trans }}</span>
                            {% endif %}
                        </div>
                    {% else %}
                        {% if Product.getPrice01Max is not null %}
                            <span class=\"ec-productRole__priceRegularPrice\">{{ '通常価格'|trans }}：{{ Product.getPrice01IncTaxMin|price }}</span>
                            <span class=\"ec-productRole__priceRegularTax\">{{ '税込'|trans }}</span>
                        {% endif %}
                    {% endif %}
                    {# 販売価格 #}
                    <div class=\"ec-productRole__price\">
                        {% if Product.hasProductClass -%}
                            {% if Product.getPrice02IncTaxMin == Product.getPrice02IncTaxMax %}
                                <div class=\"ec-price\">
                                    <span class=\"ec-price__price price02-default\">{{ Product.getPrice02IncTaxMin|price }}</span>
                                    <span class=\"ec-price__tax\">{{ '税込'|trans }}</span>
                                </div>
                            {% else %}
                                <div class=\"ec-price\">
                                    <span class=\"ec-price__price price02-default\">{{ Product.getPrice02IncTaxMin|price }} ～ {{ Product.getPrice02IncTaxMax|price }}</span>
                                    <span class=\"ec-price__tax\">{{ '税込'|trans }}</span>
                                </div>
                            {% endif %}
                        {% else %}
                            <div class=\"ec-price\">
                                <span class=\"ec-price__price\">{{ Product.getPrice02IncTaxMin|price }}</span>
                                <span class=\"ec-price__tax\">{{ '税込'|trans }}</span>
                            </div>
                        {% endif %}
                    </div>
                    {# 商品コード #}
                    {% if Product.code_min is not empty %}
                        <div class=\"ec-productRole__code\">
                            {{ '商品コード'|trans }}： <span class=\"product-code-default\">{{ Product.code_min }}{% if Product.code_min != Product.code_max %} ～ {{ Product.code_max }}{% endif %}</span>
                        </div>
                    {% endif %}
                    {# 関連カテゴリ #}
                    {% if Product.ProductCategories is not empty %}
                        <div class=\"ec-productRole__category\">
                            <div>{{ '関連カテゴリ'|trans }}</div>
                            {% for ProductCategory in Product.ProductCategories %}
                                <ul>
                                    <li>
                                        {% for Category in ProductCategory.Category.path %}
                                            <a href=\"{{ url('product_list') }}?category_id={{ Category.id }}\">{{ Category.name }}</a> {%- if loop.last == false %}
                                            <span>＞</span>{% endif -%}
                                        {% endfor %}
                                    </li>
                                </ul>
                            {% endfor %}
                        </div>
                    {% endif %}
                    <form action=\"{{ url('product_add_cart', {id:Product.id}) }}\" method=\"post\" id=\"form1\" name=\"form1\">
                        {% if Product.stock_find %}
                            <div class=\"ec-productRole__actions\">
                                {% if form.classcategory_id1 is defined %}
                                    <div class=\"ec-select\">
                                        {{ form_row(form.classcategory_id1) }}
                                        {{ form_errors(form.classcategory_id1) }}
                                    </div>
                                    {% if form.classcategory_id2 is defined %}
                                        <div class=\"ec-select\">
                                            {{ form_row(form.classcategory_id2) }}
                                            {{ form_errors(form.classcategory_id2) }}
                                        </div>
                                    {% endif %}
                                {% endif %}
                                <div class=\"ec-numberInput\"><span>{{ '数量'|trans }}</span>
                                    {{ form_widget(form.quantity) }}
                                    {{ form_errors(form.quantity) }}
                                </div>
                            </div>
                            <div class=\"ec-productRole__btn\">
                                <button type=\"submit\" class=\"ec-blockBtn--action add-cart\">
                                    {{ 'カートに入れる'|trans }}
                                </button>
                            </div>
                        {% else %}
                            <div class=\"ec-productRole__btn\">
                                <button type=\"button\" class=\"ec-blockBtn--action\" disabled=\"disabled\">
                                    {{ 'ただいま品切れ中です。'|trans }}
                                </button>
                            </div>
                        {% endif %}

                        {{ form_rest(form) }}
                    </form>
                    <div class=\"ec-modal\">
                        <div class=\"ec-modal-overlay\">
                            <div class=\"ec-modal-wrap\">
                                <span class=\"ec-modal-close\"><span class=\"ec-icon\"><img src=\"{{ asset('assets/icon/cross-dark.svg') }}\" alt=\"\"/></span></span>
                                <div id=\"ec-modal-header\" class=\"text-center\">{{ 'カートに追加しました。'|trans }}</div>
                                <div class=\"ec-modal-box\">
                                    <div class=\"ec-role\">
                                        <span class=\"ec-inlineBtn--cancel\">{{ 'お買い物を続ける'|trans }}</span>
                                        <a href=\"{{ url('cart') }}\" class=\"ec-inlineBtn--action\">{{ 'カートへ進む'|trans }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {% if BaseInfo.option_favorite_product %}
                        <form action=\"{{ url('product_add_favorite', {id:Product.id}) }}\" method=\"post\">
                            <div class=\"ec-productRole__btn\">
                                {% if is_favorite == false %}
                                    <button type=\"submit\" id=\"favorite\" class=\"ec-blockBtn--cancel\">
                                        {{ 'お気に入りに追加'|trans }}
                                    </button>
                                {% else %}
                                    <button type=\"submit\" id=\"favorite\" class=\"ec-blockBtn--cancel\"
                                            disabled=\"disabled\">{{ 'お気に入りに追加済です。'|trans }}
                                    </button>
                                {% endif %}
                            </div>
                        </form>
                    {% endif %}
                    <div class=\"ec-productRole__description\">{{ Product.description_detail|raw|nl2br }}
                    </div>
                </div>
            </div>
        </div>
        {% if Product.freearea %}
             <div class=\"ec-productRole__description\">
                 {{ include(template_from_string(Product.freearea)) }}
            </div>
        {% endif %}
    </div>
{% endblock %}
", "Product/detail.twig", "/home/asa3150/www/ec-cube/html/src/Eccube/Resource/template/default/Product/detail.twig");
    }
}
