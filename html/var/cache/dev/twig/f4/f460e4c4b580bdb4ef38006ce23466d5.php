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

/* @CarouselFeature/Block/carousel_feature.twig */
class __TwigTemplate_d7edca38225e149915736137da84e8b9 extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@CarouselFeature/Block/carousel_feature.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@CarouselFeature/Block/carousel_feature.twig"));

        // line 5
        echo "
<!-- カルーセル特集ブロック開始 -->
";
        // line 7
        if ( !twig_test_empty((isset($context["carousels"]) || array_key_exists("carousels", $context) ? $context["carousels"] : (function () { throw new RuntimeError('Variable "carousels" does not exist.', 7, $this->source); })()))) {
            // line 8
            $context["carouselId"] = ("carouselFeature" . twig_random($this->env));
            // line 9
            echo "<div class=\"carousel-feature-block\" id=\"";
            echo twig_escape_filter($this->env, (isset($context["carouselId"]) || array_key_exists("carouselId", $context) ? $context["carouselId"] : (function () { throw new RuntimeError('Variable "carouselId" does not exist.', 9, $this->source); })()), "html", null, true);
            echo "\" data-config=\"";
            echo twig_escape_filter($this->env, json_encode((isset($context["jsConfig"]) || array_key_exists("jsConfig", $context) ? $context["jsConfig"] : (function () { throw new RuntimeError('Variable "jsConfig" does not exist.', 9, $this->source); })())), "html_attr");
            echo "\">
    <div class=\"carousel-container\">
        <div class=\"carousel-wrapper\">
            <div class=\"carousel-track\">
                ";
            // line 13
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["carousels"]) || array_key_exists("carousels", $context) ? $context["carousels"] : (function () { throw new RuntimeError('Variable "carousels" does not exist.', 13, $this->source); })()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["carousel"]) {
                // line 14
                echo "                <div class=\"carousel-slide\" data-slide=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 14), "html", null, true);
                echo "\">
                    ";
                // line 16
                echo "                    ";
                $context["linkUrl"] = "";
                // line 17
                echo "                    ";
                $context["linkTarget"] = "";
                // line 18
                echo "                    
                    ";
                // line 20
                echo "                    ";
                if ((twig_get_attribute($this->env, $this->source, $context["carousel"], "linkType", [], "any", false, false, false, 20) && (twig_get_attribute($this->env, $this->source, $context["carousel"], "linkType", [], "any", false, false, false, 20) != "none"))) {
                    // line 21
                    echo "                        ";
                    if (((twig_get_attribute($this->env, $this->source, $context["carousel"], "linkType", [], "any", false, false, false, 21) == "external") && twig_get_attribute($this->env, $this->source, $context["carousel"], "linkUrl", [], "any", false, false, false, 21))) {
                        // line 22
                        echo "                            ";
                        $context["linkUrl"] = twig_get_attribute($this->env, $this->source, $context["carousel"], "linkUrl", [], "any", false, false, false, 22);
                        // line 23
                        echo "                            ";
                        $context["linkTarget"] = "_blank";
                        // line 24
                        echo "                        ";
                    } elseif (((twig_get_attribute($this->env, $this->source, $context["carousel"], "linkType", [], "any", false, false, false, 24) == "internal") && twig_get_attribute($this->env, $this->source, $context["carousel"], "linkUrl", [], "any", false, false, false, 24))) {
                        // line 25
                        echo "                            ";
                        $context["linkUrl"] = twig_get_attribute($this->env, $this->source, $context["carousel"], "linkUrl", [], "any", false, false, false, 25);
                        // line 26
                        echo "                        ";
                    } elseif (((twig_get_attribute($this->env, $this->source, $context["carousel"], "linkType", [], "any", false, false, false, 26) == "product") && twig_get_attribute($this->env, $this->source, $context["carousel"], "product", [], "any", false, false, false, 26))) {
                        // line 27
                        echo "                            ";
                        $context["linkUrl"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_detail", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["carousel"], "product", [], "any", false, false, false, 27), "id", [], "any", false, false, false, 27)]);
                        // line 28
                        echo "                        ";
                    }
                    // line 29
                    echo "                    ";
                }
                // line 30
                echo "                    
                    ";
                // line 32
                echo "                    ";
                if ((isset($context["linkUrl"]) || array_key_exists("linkUrl", $context) ? $context["linkUrl"] : (function () { throw new RuntimeError('Variable "linkUrl" does not exist.', 32, $this->source); })())) {
                    // line 33
                    echo "                    <a href=\"";
                    echo twig_escape_filter($this->env, (isset($context["linkUrl"]) || array_key_exists("linkUrl", $context) ? $context["linkUrl"] : (function () { throw new RuntimeError('Variable "linkUrl" does not exist.', 33, $this->source); })()), "html", null, true);
                    echo "\" class=\"slide-link\"
                       ";
                    // line 34
                    if ((isset($context["linkTarget"]) || array_key_exists("linkTarget", $context) ? $context["linkTarget"] : (function () { throw new RuntimeError('Variable "linkTarget" does not exist.', 34, $this->source); })())) {
                        echo "target=\"";
                        echo twig_escape_filter($this->env, (isset($context["linkTarget"]) || array_key_exists("linkTarget", $context) ? $context["linkTarget"] : (function () { throw new RuntimeError('Variable "linkTarget" does not exist.', 34, $this->source); })()), "html", null, true);
                        echo "\" rel=\"noopener\"";
                    }
                    echo ">
                    ";
                }
                // line 36
                echo "                    
                    <div class=\"slide-content\">
                        ";
                // line 38
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["carousel"], "carouselImages", [], "any", false, false, false, 38))) {
                    // line 39
                    echo "                            ";
                    $context["mainImage"] = twig_first($this->env, twig_get_attribute($this->env, $this->source, $context["carousel"], "carouselImages", [], "any", false, false, false, 39));
                    // line 40
                    echo "                            <div class=\"slide-image\">
                                ";
                    // line 41
                    if (twig_get_attribute($this->env, $this->source, (isset($context["mainImage"]) || array_key_exists("mainImage", $context) ? $context["mainImage"] : (function () { throw new RuntimeError('Variable "mainImage" does not exist.', 41, $this->source); })()), "fileName", [], "any", false, false, false, 41)) {
                        // line 42
                        echo "                                    <img src=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["mainImage"]) || array_key_exists("mainImage", $context) ? $context["mainImage"] : (function () { throw new RuntimeError('Variable "mainImage" does not exist.', 42, $this->source); })()), "directImageUrl", [], "any", false, false, false, 42), "html", null, true);
                        echo "\" 
                                         alt=\"";
                        // line 43
                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["mainImage"] ?? null), "altText", [], "any", true, true, false, 43)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["mainImage"] ?? null), "altText", [], "any", false, false, false, 43), twig_get_attribute($this->env, $this->source, $context["carousel"], "title", [], "any", false, false, false, 43))) : (twig_get_attribute($this->env, $this->source, $context["carousel"], "title", [], "any", false, false, false, 43))), "html", null, true);
                        echo "\"
                                         class=\"carousel-image\"
                                         loading=\"";
                        // line 45
                        if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 45)) {
                            echo "eager";
                        } else {
                            echo "lazy";
                        }
                        echo "\"
                                         onerror=\"console.log('Direct URL failed for ";
                        // line 46
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["mainImage"]) || array_key_exists("mainImage", $context) ? $context["mainImage"] : (function () { throw new RuntimeError('Variable "mainImage" does not exist.', 46, $this->source); })()), "fileName", [], "any", false, false, false, 46), "html", null, true);
                        echo ", trying asset'); this.src='";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(twig_get_attribute($this->env, $this->source, (isset($context["mainImage"]) || array_key_exists("mainImage", $context) ? $context["mainImage"] : (function () { throw new RuntimeError('Variable "mainImage" does not exist.', 46, $this->source); })()), "imagePath", [], "any", false, false, false, 46), "save_image"), "html", null, true);
                        echo "'; this.onerror=function(){console.log('Asset also failed for ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["mainImage"]) || array_key_exists("mainImage", $context) ? $context["mainImage"] : (function () { throw new RuntimeError('Variable "mainImage" does not exist.', 46, $this->source); })()), "fileName", [], "any", false, false, false, 46), "html", null, true);
                        echo "'); this.parentElement.innerHTML='<div class=&quot;image-error&quot;><i class=&quot;fa fa-image&quot;</i><br><small>画像が見つかりません</small></div>';};\">
                                ";
                    } else {
                        // line 48
                        echo "                                    <div class=\"image-error\">
                                        <i class=\"fa fa-image\"></i><br>
                                        <small>画像が設定されていません</small>
                                    </div>
                                ";
                    }
                    // line 53
                    echo "                            </div>
                        ";
                } else {
                    // line 55
                    echo "                            <div class=\"slide-image slide-no-image\">
                                <div class=\"no-image-placeholder\">
                                    <i class=\"fa fa-image\"></i><br>
                                    <span>画像なし</span>
                                </div>
                            </div>
                        ";
                }
                // line 62
                echo "                        
                        <div class=\"slide-overlay\">
                            <div class=\"slide-text\">
                                <h3 class=\"slide-title\">";
                // line 65
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["carousel"], "title", [], "any", false, false, false, 65), "html", null, true);
                echo "</h3>
                                ";
                // line 66
                if (twig_get_attribute($this->env, $this->source, $context["carousel"], "content", [], "any", false, false, false, 66)) {
                    // line 67
                    echo "                                <p class=\"slide-description\">";
                    echo twig_escape_filter($this->env, twig_slice($this->env, twig_striptags(twig_get_attribute($this->env, $this->source, $context["carousel"], "content", [], "any", false, false, false, 67)), 0, 80), "html", null, true);
                    if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["carousel"], "content", [], "any", false, false, false, 67)) > 80)) {
                        echo "...";
                    }
                    echo "</p>
                                ";
                }
                // line 69
                echo "                                
                                ";
                // line 71
                echo "                                ";
                if ((isset($context["linkUrl"]) || array_key_exists("linkUrl", $context) ? $context["linkUrl"] : (function () { throw new RuntimeError('Variable "linkUrl" does not exist.', 71, $this->source); })())) {
                    // line 72
                    echo "                                <div class=\"slide-action\">
                                    ";
                    // line 73
                    $context["linkText"] = ((twig_get_attribute($this->env, $this->source, $context["carousel"], "linkText", [], "any", true, true, false, 73)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["carousel"], "linkText", [], "any", false, false, false, 73), "")) : (""));
                    // line 74
                    echo "                                    ";
                    $context["linkIcon"] = "fa-arrow-right";
                    // line 75
                    echo "                                    
                                    ";
                    // line 77
                    echo "                                    ";
                    if ((twig_get_attribute($this->env, $this->source, $context["carousel"], "linkType", [], "any", false, false, false, 77) == "external")) {
                        // line 78
                        echo "                                        ";
                        $context["linkText"] = (((isset($context["linkText"]) || array_key_exists("linkText", $context) ? $context["linkText"] : (function () { throw new RuntimeError('Variable "linkText" does not exist.', 78, $this->source); })())) ? ((isset($context["linkText"]) || array_key_exists("linkText", $context) ? $context["linkText"] : (function () { throw new RuntimeError('Variable "linkText" does not exist.', 78, $this->source); })())) : ("詳しく見る"));
                        // line 79
                        echo "                                        ";
                        $context["linkIcon"] = "fa-external-link-alt";
                        // line 80
                        echo "                                    ";
                    } elseif ((twig_get_attribute($this->env, $this->source, $context["carousel"], "linkType", [], "any", false, false, false, 80) == "internal")) {
                        // line 81
                        echo "                                        ";
                        $context["linkText"] = (((isset($context["linkText"]) || array_key_exists("linkText", $context) ? $context["linkText"] : (function () { throw new RuntimeError('Variable "linkText" does not exist.', 81, $this->source); })())) ? ((isset($context["linkText"]) || array_key_exists("linkText", $context) ? $context["linkText"] : (function () { throw new RuntimeError('Variable "linkText" does not exist.', 81, $this->source); })())) : ("詳しく見る"));
                        // line 82
                        echo "                                        ";
                        $context["linkIcon"] = "fa-arrow-right";
                        // line 83
                        echo "                                    ";
                    } elseif ((twig_get_attribute($this->env, $this->source, $context["carousel"], "linkType", [], "any", false, false, false, 83) == "product")) {
                        // line 84
                        echo "                                        ";
                        $context["linkText"] = (((isset($context["linkText"]) || array_key_exists("linkText", $context) ? $context["linkText"] : (function () { throw new RuntimeError('Variable "linkText" does not exist.', 84, $this->source); })())) ? ((isset($context["linkText"]) || array_key_exists("linkText", $context) ? $context["linkText"] : (function () { throw new RuntimeError('Variable "linkText" does not exist.', 84, $this->source); })())) : ("商品を見る"));
                        // line 85
                        echo "                                        ";
                        $context["linkIcon"] = "fa-shopping-cart";
                        // line 86
                        echo "                                    ";
                    }
                    // line 87
                    echo "                                    
                                    <span class=\"carousel-btn-text\">
                                        ";
                    // line 89
                    echo twig_escape_filter($this->env, (isset($context["linkText"]) || array_key_exists("linkText", $context) ? $context["linkText"] : (function () { throw new RuntimeError('Variable "linkText" does not exist.', 89, $this->source); })()), "html", null, true);
                    echo "
                                        <!--<i class=\"fa ";
                    // line 90
                    echo twig_escape_filter($this->env, (isset($context["linkIcon"]) || array_key_exists("linkIcon", $context) ? $context["linkIcon"] : (function () { throw new RuntimeError('Variable "linkIcon" does not exist.', 90, $this->source); })()), "html", null, true);
                    echo " ml-1\"></i>-->
                                    </span>
                                </div>
                                ";
                }
                // line 94
                echo "                            </div>
                        </div>
                        
                        ";
                // line 98
                echo "                        ";
                if ((isset($context["linkUrl"]) || array_key_exists("linkUrl", $context) ? $context["linkUrl"] : (function () { throw new RuntimeError('Variable "linkUrl" does not exist.', 98, $this->source); })())) {
                    // line 99
                    echo "                        <div class=\"click-overlay\"></div>
                        ";
                }
                // line 101
                echo "                    </div>
                    
                    ";
                // line 104
                echo "                    ";
                if ((isset($context["linkUrl"]) || array_key_exists("linkUrl", $context) ? $context["linkUrl"] : (function () { throw new RuntimeError('Variable "linkUrl" does not exist.', 104, $this->source); })())) {
                    // line 105
                    echo "                    </a>
                    ";
                }
                // line 107
                echo "                </div>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carousel'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 109
            echo "            </div>
            
            ";
            // line 112
            echo "            ";
            if (((twig_length_filter($this->env, (isset($context["carousels"]) || array_key_exists("carousels", $context) ? $context["carousels"] : (function () { throw new RuntimeError('Variable "carousels" does not exist.', 112, $this->source); })())) > 1) && ((twig_get_attribute($this->env, $this->source, ($context["jsConfig"] ?? null), "showNavigation", [], "any", true, true, false, 112)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["jsConfig"] ?? null), "showNavigation", [], "any", false, false, false, 112), true)) : (true)))) {
                // line 113
                echo "            <div class=\"carousel-navigation\">
                <button class=\"carousel-nav carousel-prev\" type=\"button\" aria-label=\"前へ\">
                    <i class=\"fa fa-chevron-left\"></i>
                </button>
                <button class=\"carousel-nav carousel-next\" type=\"button\" aria-label=\"次へ\">
                    <i class=\"fa fa-chevron-right\"></i>
                </button>
            </div>
            ";
            }
            // line 122
            echo "        </div>
        
        ";
            // line 125
            echo "        ";
            if (((twig_length_filter($this->env, (isset($context["carousels"]) || array_key_exists("carousels", $context) ? $context["carousels"] : (function () { throw new RuntimeError('Variable "carousels" does not exist.', 125, $this->source); })())) > 1) && ((twig_get_attribute($this->env, $this->source, ($context["jsConfig"] ?? null), "showIndicators", [], "any", true, true, false, 125)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["jsConfig"] ?? null), "showIndicators", [], "any", false, false, false, 125), true)) : (true)))) {
                // line 126
                echo "        <div class=\"carousel-indicators-external\">
            ";
                // line 127
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["carousels"]) || array_key_exists("carousels", $context) ? $context["carousels"] : (function () { throw new RuntimeError('Variable "carousels" does not exist.', 127, $this->source); })()));
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
                foreach ($context['_seq'] as $context["_key"] => $context["carousel"]) {
                    // line 128
                    echo "            <button class=\"carousel-indicator";
                    if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 128)) {
                        echo " active";
                    }
                    echo "\" 
                    type=\"button\" 
                    data-slide-to=\"";
                    // line 130
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 130), "html", null, true);
                    echo "\" 
                    aria-label=\"スライド ";
                    // line 131
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 131), "html", null, true);
                    echo "\"></button>
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['carousel'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 133
                echo "        </div>
        ";
            }
            // line 135
            echo "    </div>
</div>

";
            // line 139
            echo "<style>
.carousel-feature-block {
    position: relative;
    /*width: 100%;*/
width:90%;
    margin: 20px 0;
    /*max-width: 1200px;*/
    margin-left: auto;
    margin-right: auto;
}

.carousel-container {
    position: relative;
    background: white;
}

.carousel-wrapper {
    position: relative;
    width: 100%;
    height: 400px;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
}

.carousel-track {
    display: flex;
    width: ";
            // line 166
            echo twig_escape_filter($this->env, (twig_length_filter($this->env, (isset($context["carousels"]) || array_key_exists("carousels", $context) ? $context["carousels"] : (function () { throw new RuntimeError('Variable "carousels" does not exist.', 166, $this->source); })())) * 100), "html", null, true);
            echo "%;
    height: 100%;
    transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    will-change: transform;
}

.carousel-slide {
    flex: 0 0 ";
            // line 173
            echo twig_escape_filter($this->env, (100 / twig_length_filter($this->env, (isset($context["carousels"]) || array_key_exists("carousels", $context) ? $context["carousels"] : (function () { throw new RuntimeError('Variable "carousels" does not exist.', 173, $this->source); })()))), "html", null, true);
            echo "%;
    height: 100%;
    position: relative;
}

/* スライド全体のリンク */
.slide-link {
    display: block;
    width: 100%;
    height: 100%;
    position: relative;
    text-decoration: none;
    color: inherit;
    cursor: pointer;
    outline: none;
}

.slide-link:hover,
.slide-link:focus {
    text-decoration: none;
    color: inherit;
}

.slide-content {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.slide-image {
    width: 100%;
    height: 100%;
    position: relative;
}

.carousel-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

/* ホバー効果 */
.slide-link:hover .carousel-image {
    transform: scale(1.05);
}

.slide-link:hover .slide-overlay {
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.9));
}

.image-error, .slide-no-image, .no-image-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    flex-direction: column;
    text-align: center;
}

.slide-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
    color: white;
    padding: 40px 30px 25px;
    transition: all 0.3s ease;
}

.slide-title {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 12px;
    line-height: 1.2;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.slide-description {
    font-size: 1rem;
    margin-bottom: 18px;
    opacity: 0.95;
    line-height: 1.4;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

/* リンクボタンテキスト（クリック不可、装飾用） */
.carousel-btn-text {
    background: linear-gradient(45deg, #0095d9, #0095d9);
    color: white;
    padding: 12px 24px;
    border-radius: 25px;
    display: inline-flex;
    align-items: center;
    font-weight: 600;
    font-size: 0.9rem;
    box-shadow: 0 4px 15px black;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    pointer-events: none; /* 子要素のクリックを無効化 */
}

.slide-link:hover .carousel-btn-text {
    background: linear-gradient(45deg, #c0c6c9, #c0c6c9);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px #0095d9;
color:black;
}

/* クリック可能であることを示すオーバーレイ */
.click-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: transparent;
    transition: background 0.3s ease;
    pointer-events: none;
}

.slide-link:hover .click-overlay {
    background: rgba(255, 255, 255, 0.05);
}

.carousel-navigation {
    position: absolute;
    top: 50%;
    left: 20px;
    right: 20px;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
    pointer-events: none;
    z-index: 10;
}

.carousel-nav {
    background: rgba(255, 255, 255, 0.9);
    color: #333;
    border: none;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    pointer-events: auto;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    font-size: 1.2rem;
    z-index: 20;
}

.carousel-nav:hover {
    background: white;
    transform: scale(1.1);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
}

.carousel-nav:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none;
}

/* インジケーター - カルーセル外に配置 */
.carousel-indicators-external {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-top: 20px;
    padding: 0 20px;
}

.carousel-indicator {

margin:;
    width: 14px;
    height: 14px;
    border: 2px solid #ccc;
    border-radius: 50%;
    background: transparent;
    cursor: pointer;
    transition: all 0.3s ease;
    outline: none;
}

.carousel-indicator.active {
    background: #007bff;
    border-color: #007bff;
    transform: scale(1.2);
}

.carousel-indicator:hover {
    border-color: #007bff;
    background: rgba(0, 123, 255, 0.3);
}

@media (max-width: 768px) {
    .carousel-wrapper {
        height: 300px;
    }
    
    .slide-title {
        font-size: 1.4rem;
    }
    
    .slide-description {
        font-size: 0.9rem;
    }
    
    .carousel-nav {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
    
    .slide-overlay {
        padding: 25px 20px 20px;
    }
    
    .carousel-btn-text {
        padding: 10px 20px;
        font-size: 0.8rem;
    }
    
    .carousel-indicators-external {
        margin-top: 15px;
        gap: 10px;
    }
    
    .carousel-indicator {
        width: 12px;
        height: 12px;
    }
}

@media (max-width: 480px) {
    .carousel-wrapper {
        height: 250px;
    }
    
    .slide-title {
        font-size: 1.2rem;
    }
    
    .slide-description {
        font-size: 0.8rem;
        margin-bottom: 15px;
    }
    
    .carousel-navigation {
        left: 10px;
        right: 10px;
    }
    
    .carousel-indicators-external {
        margin-top: 12px;
        gap: 8px;
    }
    
    .carousel-indicator {
        width: 10px;
        height: 10px;
    }
}

/* フォーカス時のアクセシビリティ */
.slide-link:focus {
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.3);
    border-radius: 12px;
}

.carousel-nav:focus,
.carousel-indicator:focus {
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.3);
}
</style>

";
            // line 462
            echo "<script>
document.addEventListener('DOMContentLoaded', function() {
    const carouselBlocks = document.querySelectorAll('.carousel-feature-block');
    
    carouselBlocks.forEach(function(block) {
        // 設定を取得
        let config = {
            autoPlay: true,
            autoPlayInterval: 4000,
            showNavigation: true,
            showIndicators: true,
            enableTouchSwipe: true,
            enableKeyboardNav: true,
            transitionEffect: 'slide',
            transitionDuration: 600
        };
        
        // data-config属性から設定を読み込み
        try {
            const configAttr = block.getAttribute('data-config');
            if (configAttr) {
                const parsedConfig = JSON.parse(configAttr);
                config = Object.assign(config, parsedConfig);
                console.log('Carousel config loaded:', config);
            }
        } catch (e) {
            console.warn('Failed to parse carousel config, using defaults:', e);
        }
        
        const track = block.querySelector('.carousel-track');
        const slides = block.querySelectorAll('.carousel-slide');
        const prevBtn = block.querySelector('.carousel-prev');
        const nextBtn = block.querySelector('.carousel-next');
        const indicators = block.querySelectorAll('.carousel-indicator');
        
        console.log(`Carousel initialized with \${slides.length} slides, config:`, config);
        
        if (slides.length <= 1) {
            console.log('Only one slide, hiding navigation');
            return;
        }
        
        let currentSlide = 0;
        let autoPlayInterval;
        let isAnimating = false;
        
        function updateSlide(index, animated = true) {
            if (isAnimating && animated) {
                console.log('Animation in progress, skipping');
                return;
            }
            
            if (animated) {
                isAnimating = true;
                setTimeout(() => {
                    isAnimating = false;
                }, config.transitionDuration || 600);
            }
            
            const slideWidth = 100 / slides.length;
            const translateX = -index * slideWidth;
            
            console.log(`Moving to slide \${index}, translateX: \${translateX}%`);
            
            if (track) {
                track.style.transitionDuration = animated ? `\${config.transitionDuration || 600}ms` : '0ms';
                track.style.transform = `translateX(\${translateX}%)`;
            }
            
            // インジケーター更新
            indicators.forEach(function(indicator, i) {
                indicator.classList.toggle('active', i === index);
            });
            
            currentSlide = index;
        }
        
        function nextSlide() {
            const next = (currentSlide + 1) % slides.length;
            console.log('Next slide:', next);
            updateSlide(next);
        }
        
        function prevSlide() {
            const prev = (currentSlide - 1 + slides.length) % slides.length;
            console.log('Previous slide:', prev);
            updateSlide(prev);
        }
        
        function goToSlide(index) {
            if (index >= 0 && index < slides.length && index !== currentSlide) {
                console.log('Go to slide:', index);
                updateSlide(index);
            }
        }
        
        function startAutoPlay() {
            if (config.autoPlay && slides.length > 1) {
                console.log('Starting autoplay with interval:', config.autoPlayInterval);
                autoPlayInterval = setInterval(nextSlide, config.autoPlayInterval || 4000);
            }
        }
        
        function stopAutoPlay() {
            if (autoPlayInterval) {
                console.log('Stopping autoplay');
                clearInterval(autoPlayInterval);
                autoPlayInterval = null;
            }
        }
        
        // イベントリスナー
        if (nextBtn && config.showNavigation) {
            nextBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation(); // スライドリンクのクリックを阻止
                console.log('Next button clicked');
                stopAutoPlay();
                nextSlide();
                startAutoPlay();
            });
            console.log('Next button listener attached');
        }
        
        if (prevBtn && config.showNavigation) {
            prevBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation(); // スライドリンクのクリックを阻止
                console.log('Previous button clicked');
                stopAutoPlay();
                prevSlide();
                startAutoPlay();
            });
            console.log('Previous button listener attached');
        }
        
        if (config.showIndicators) {
            indicators.forEach(function(indicator, index) {
                indicator.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation(); // スライドリンクのクリックを阻止
                    console.log('Indicator clicked:', index);
                    stopAutoPlay();
                    goToSlide(index);
                    startAutoPlay();
                });
            });
            console.log('Indicator listeners attached');
        }
        
        // タッチ/スワイプ対応
        if (config.enableTouchSwipe) {
            let touchStartX = 0;
            let touchEndX = 0;
            
            track.addEventListener('touchstart', function(e) {
                touchStartX = e.changedTouches[0].screenX;
                stopAutoPlay();
            });
            
            track.addEventListener('touchend', function(e) {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                startAutoPlay();
            });
            
            function handleSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartX - touchEndX;
                
                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0) {
                        nextSlide();
                    } else {
                        prevSlide();
                    }
                }
            }
            console.log('Touch swipe enabled');
        }
        
        // キーボード操作
        if (config.enableKeyboardNav) {
            document.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowLeft') {
                    prevSlide();
                } else if (e.key === 'ArrowRight') {
                    nextSlide();
                }
            });
            console.log('Keyboard navigation enabled');
        }
        
        // マウスオーバーで自動再生停止
        block.addEventListener('mouseenter', stopAutoPlay);
        block.addEventListener('mouseleave', startAutoPlay);
        
        // 初期設定
        updateSlide(0, false);
        startAutoPlay();
        
        console.log('Carousel fully initialized');
    });
});
</script>
";
        } else {
            // line 668
            echo "<!-- カルーセル記事が登録されていません -->
<div class=\"carousel-feature-block carousel-empty\">
    <div style=\"padding: 3rem; text-align: center; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); border-radius: 12px; color: #6c757d;\">
        <i class=\"fa fa-info-circle\" style=\"font-size: 3rem; margin-bottom: 1.5rem; color: #007bff;\"></i>
        <h3 style=\"margin: 0; font-size: 1.4rem; font-weight: 600;\">カルーセル特集の記事が登録されていません</h3>
        <p style=\"margin: 1rem 0 0 0; font-size: 1rem; opacity: 0.8;\">管理画面からカルーセル記事を作成してください</p>
    </div>
</div>
";
        }
        // line 677
        echo "<!-- カルーセル特集ブロック終了 -->";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "@CarouselFeature/Block/carousel_feature.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  954 => 677,  943 => 668,  735 => 462,  444 => 173,  434 => 166,  405 => 139,  400 => 135,  396 => 133,  380 => 131,  376 => 130,  368 => 128,  351 => 127,  348 => 126,  345 => 125,  341 => 122,  330 => 113,  327 => 112,  323 => 109,  308 => 107,  304 => 105,  301 => 104,  297 => 101,  293 => 99,  290 => 98,  285 => 94,  278 => 90,  274 => 89,  270 => 87,  267 => 86,  264 => 85,  261 => 84,  258 => 83,  255 => 82,  252 => 81,  249 => 80,  246 => 79,  243 => 78,  240 => 77,  237 => 75,  234 => 74,  232 => 73,  229 => 72,  226 => 71,  223 => 69,  214 => 67,  212 => 66,  208 => 65,  203 => 62,  194 => 55,  190 => 53,  183 => 48,  174 => 46,  166 => 45,  161 => 43,  156 => 42,  154 => 41,  151 => 40,  148 => 39,  146 => 38,  142 => 36,  133 => 34,  128 => 33,  125 => 32,  122 => 30,  119 => 29,  116 => 28,  113 => 27,  110 => 26,  107 => 25,  104 => 24,  101 => 23,  98 => 22,  95 => 21,  92 => 20,  89 => 18,  86 => 17,  83 => 16,  78 => 14,  61 => 13,  51 => 9,  49 => 8,  47 => 7,  43 => 5,);
    }

    public function getSourceContext()
    {
        return new Source("{# 
    カルーセル特集ブロック表示テンプレート（全体クリック対応版）
    Path: app/Plugin/CarouselFeature/Resource/template/Block/carousel_feature.twig
#}

<!-- カルーセル特集ブロック開始 -->
{% if carousels is not empty %}
{% set carouselId = 'carouselFeature' ~ random() %}
<div class=\"carousel-feature-block\" id=\"{{ carouselId }}\" data-config=\"{{ jsConfig|json_encode|e('html_attr') }}\">
    <div class=\"carousel-container\">
        <div class=\"carousel-wrapper\">
            <div class=\"carousel-track\">
                {% for carousel in carousels %}
                <div class=\"carousel-slide\" data-slide=\"{{ loop.index0 }}\">
                    {# スライド全体をクリック可能にするためのリンク要素 #}
                    {% set linkUrl = '' %}
                    {% set linkTarget = '' %}
                    
                    {# リンクURLを設定 #}
                    {% if carousel.linkType and carousel.linkType != 'none' %}
                        {% if carousel.linkType == 'external' and carousel.linkUrl %}
                            {% set linkUrl = carousel.linkUrl %}
                            {% set linkTarget = '_blank' %}
                        {% elseif carousel.linkType == 'internal' and carousel.linkUrl %}
                            {% set linkUrl = carousel.linkUrl %}
                        {% elseif carousel.linkType == 'product' and carousel.product %}
                            {% set linkUrl = url('product_detail', {'id': carousel.product.id}) %}
                        {% endif %}
                    {% endif %}
                    
                    {# リンクがある場合は全体をクリック可能に #}
                    {% if linkUrl %}
                    <a href=\"{{ linkUrl }}\" class=\"slide-link\"
                       {% if linkTarget %}target=\"{{ linkTarget }}\" rel=\"noopener\"{% endif %}>
                    {% endif %}
                    
                    <div class=\"slide-content\">
                        {% if carousel.carouselImages is not empty %}
                            {% set mainImage = carousel.carouselImages|first %}
                            <div class=\"slide-image\">
                                {% if mainImage.fileName %}
                                    <img src=\"{{ mainImage.directImageUrl }}\" 
                                         alt=\"{{ mainImage.altText|default(carousel.title) }}\"
                                         class=\"carousel-image\"
                                         loading=\"{% if loop.first %}eager{% else %}lazy{% endif %}\"
                                         onerror=\"console.log('Direct URL failed for {{ mainImage.fileName }}, trying asset'); this.src='{{ asset(mainImage.imagePath, 'save_image') }}'; this.onerror=function(){console.log('Asset also failed for {{ mainImage.fileName }}'); this.parentElement.innerHTML='<div class=&quot;image-error&quot;><i class=&quot;fa fa-image&quot;</i><br><small>画像が見つかりません</small></div>';};\">
                                {% else %}
                                    <div class=\"image-error\">
                                        <i class=\"fa fa-image\"></i><br>
                                        <small>画像が設定されていません</small>
                                    </div>
                                {% endif %}
                            </div>
                        {% else %}
                            <div class=\"slide-image slide-no-image\">
                                <div class=\"no-image-placeholder\">
                                    <i class=\"fa fa-image\"></i><br>
                                    <span>画像なし</span>
                                </div>
                            </div>
                        {% endif %}
                        
                        <div class=\"slide-overlay\">
                            <div class=\"slide-text\">
                                <h3 class=\"slide-title\">{{ carousel.title }}</h3>
                                {% if carousel.content %}
                                <p class=\"slide-description\">{{ carousel.content|striptags|slice(0, 80) }}{% if carousel.content|length > 80 %}...{% endif %}</p>
                                {% endif %}
                                
                                {# リンクボタン表示（オプション） #}
                                {% if linkUrl %}
                                <div class=\"slide-action\">
                                    {% set linkText = carousel.linkText|default('') %}
                                    {% set linkIcon = 'fa-arrow-right' %}
                                    
                                    {# アイコンとテキストを設定 #}
                                    {% if carousel.linkType == 'external' %}
                                        {% set linkText = linkText ? linkText : '詳しく見る' %}
                                        {% set linkIcon = 'fa-external-link-alt' %}
                                    {% elseif carousel.linkType == 'internal' %}
                                        {% set linkText = linkText ? linkText : '詳しく見る' %}
                                        {% set linkIcon = 'fa-arrow-right' %}
                                    {% elseif carousel.linkType == 'product' %}
                                        {% set linkText = linkText ? linkText : '商品を見る' %}
                                        {% set linkIcon = 'fa-shopping-cart' %}
                                    {% endif %}
                                    
                                    <span class=\"carousel-btn-text\">
                                        {{ linkText }}
                                        <!--<i class=\"fa {{ linkIcon }} ml-1\"></i>-->
                                    </span>
                                </div>
                                {% endif %}
                            </div>
                        </div>
                        
                        {# クリック可能であることを示すホバー効果 #}
                        {% if linkUrl %}
                        <div class=\"click-overlay\"></div>
                        {% endif %}
                    </div>
                    
                    {# リンクがある場合は閉じタグ #}
                    {% if linkUrl %}
                    </a>
                    {% endif %}
                </div>
                {% endfor %}
            </div>
            
            {# ナビゲーションボタン - jsConfigから設定を参照 #}
            {% if carousels|length > 1 and jsConfig.showNavigation|default(true) %}
            <div class=\"carousel-navigation\">
                <button class=\"carousel-nav carousel-prev\" type=\"button\" aria-label=\"前へ\">
                    <i class=\"fa fa-chevron-left\"></i>
                </button>
                <button class=\"carousel-nav carousel-next\" type=\"button\" aria-label=\"次へ\">
                    <i class=\"fa fa-chevron-right\"></i>
                </button>
            </div>
            {% endif %}
        </div>
        
        {# インジケーター - カルーセル外に配置 #}
        {% if carousels|length > 1 and jsConfig.showIndicators|default(true) %}
        <div class=\"carousel-indicators-external\">
            {% for carousel in carousels %}
            <button class=\"carousel-indicator{% if loop.first %} active{% endif %}\" 
                    type=\"button\" 
                    data-slide-to=\"{{ loop.index0 }}\" 
                    aria-label=\"スライド {{ loop.index }}\"></button>
            {% endfor %}
        </div>
        {% endif %}
    </div>
</div>

{# CSS #}
<style>
.carousel-feature-block {
    position: relative;
    /*width: 100%;*/
width:90%;
    margin: 20px 0;
    /*max-width: 1200px;*/
    margin-left: auto;
    margin-right: auto;
}

.carousel-container {
    position: relative;
    background: white;
}

.carousel-wrapper {
    position: relative;
    width: 100%;
    height: 400px;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
}

.carousel-track {
    display: flex;
    width: {{ carousels|length * 100 }}%;
    height: 100%;
    transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    will-change: transform;
}

.carousel-slide {
    flex: 0 0 {{ 100 / carousels|length }}%;
    height: 100%;
    position: relative;
}

/* スライド全体のリンク */
.slide-link {
    display: block;
    width: 100%;
    height: 100%;
    position: relative;
    text-decoration: none;
    color: inherit;
    cursor: pointer;
    outline: none;
}

.slide-link:hover,
.slide-link:focus {
    text-decoration: none;
    color: inherit;
}

.slide-content {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.slide-image {
    width: 100%;
    height: 100%;
    position: relative;
}

.carousel-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

/* ホバー効果 */
.slide-link:hover .carousel-image {
    transform: scale(1.05);
}

.slide-link:hover .slide-overlay {
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.9));
}

.image-error, .slide-no-image, .no-image-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    flex-direction: column;
    text-align: center;
}

.slide-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
    color: white;
    padding: 40px 30px 25px;
    transition: all 0.3s ease;
}

.slide-title {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 12px;
    line-height: 1.2;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.slide-description {
    font-size: 1rem;
    margin-bottom: 18px;
    opacity: 0.95;
    line-height: 1.4;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

/* リンクボタンテキスト（クリック不可、装飾用） */
.carousel-btn-text {
    background: linear-gradient(45deg, #0095d9, #0095d9);
    color: white;
    padding: 12px 24px;
    border-radius: 25px;
    display: inline-flex;
    align-items: center;
    font-weight: 600;
    font-size: 0.9rem;
    box-shadow: 0 4px 15px black;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    pointer-events: none; /* 子要素のクリックを無効化 */
}

.slide-link:hover .carousel-btn-text {
    background: linear-gradient(45deg, #c0c6c9, #c0c6c9);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px #0095d9;
color:black;
}

/* クリック可能であることを示すオーバーレイ */
.click-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: transparent;
    transition: background 0.3s ease;
    pointer-events: none;
}

.slide-link:hover .click-overlay {
    background: rgba(255, 255, 255, 0.05);
}

.carousel-navigation {
    position: absolute;
    top: 50%;
    left: 20px;
    right: 20px;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
    pointer-events: none;
    z-index: 10;
}

.carousel-nav {
    background: rgba(255, 255, 255, 0.9);
    color: #333;
    border: none;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    pointer-events: auto;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    font-size: 1.2rem;
    z-index: 20;
}

.carousel-nav:hover {
    background: white;
    transform: scale(1.1);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
}

.carousel-nav:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none;
}

/* インジケーター - カルーセル外に配置 */
.carousel-indicators-external {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-top: 20px;
    padding: 0 20px;
}

.carousel-indicator {

margin:;
    width: 14px;
    height: 14px;
    border: 2px solid #ccc;
    border-radius: 50%;
    background: transparent;
    cursor: pointer;
    transition: all 0.3s ease;
    outline: none;
}

.carousel-indicator.active {
    background: #007bff;
    border-color: #007bff;
    transform: scale(1.2);
}

.carousel-indicator:hover {
    border-color: #007bff;
    background: rgba(0, 123, 255, 0.3);
}

@media (max-width: 768px) {
    .carousel-wrapper {
        height: 300px;
    }
    
    .slide-title {
        font-size: 1.4rem;
    }
    
    .slide-description {
        font-size: 0.9rem;
    }
    
    .carousel-nav {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
    
    .slide-overlay {
        padding: 25px 20px 20px;
    }
    
    .carousel-btn-text {
        padding: 10px 20px;
        font-size: 0.8rem;
    }
    
    .carousel-indicators-external {
        margin-top: 15px;
        gap: 10px;
    }
    
    .carousel-indicator {
        width: 12px;
        height: 12px;
    }
}

@media (max-width: 480px) {
    .carousel-wrapper {
        height: 250px;
    }
    
    .slide-title {
        font-size: 1.2rem;
    }
    
    .slide-description {
        font-size: 0.8rem;
        margin-bottom: 15px;
    }
    
    .carousel-navigation {
        left: 10px;
        right: 10px;
    }
    
    .carousel-indicators-external {
        margin-top: 12px;
        gap: 8px;
    }
    
    .carousel-indicator {
        width: 10px;
        height: 10px;
    }
}

/* フォーカス時のアクセシビリティ */
.slide-link:focus {
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.3);
    border-radius: 12px;
}

.carousel-nav:focus,
.carousel-indicator:focus {
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.3);
}
</style>

{# JavaScript #}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const carouselBlocks = document.querySelectorAll('.carousel-feature-block');
    
    carouselBlocks.forEach(function(block) {
        // 設定を取得
        let config = {
            autoPlay: true,
            autoPlayInterval: 4000,
            showNavigation: true,
            showIndicators: true,
            enableTouchSwipe: true,
            enableKeyboardNav: true,
            transitionEffect: 'slide',
            transitionDuration: 600
        };
        
        // data-config属性から設定を読み込み
        try {
            const configAttr = block.getAttribute('data-config');
            if (configAttr) {
                const parsedConfig = JSON.parse(configAttr);
                config = Object.assign(config, parsedConfig);
                console.log('Carousel config loaded:', config);
            }
        } catch (e) {
            console.warn('Failed to parse carousel config, using defaults:', e);
        }
        
        const track = block.querySelector('.carousel-track');
        const slides = block.querySelectorAll('.carousel-slide');
        const prevBtn = block.querySelector('.carousel-prev');
        const nextBtn = block.querySelector('.carousel-next');
        const indicators = block.querySelectorAll('.carousel-indicator');
        
        console.log(`Carousel initialized with \${slides.length} slides, config:`, config);
        
        if (slides.length <= 1) {
            console.log('Only one slide, hiding navigation');
            return;
        }
        
        let currentSlide = 0;
        let autoPlayInterval;
        let isAnimating = false;
        
        function updateSlide(index, animated = true) {
            if (isAnimating && animated) {
                console.log('Animation in progress, skipping');
                return;
            }
            
            if (animated) {
                isAnimating = true;
                setTimeout(() => {
                    isAnimating = false;
                }, config.transitionDuration || 600);
            }
            
            const slideWidth = 100 / slides.length;
            const translateX = -index * slideWidth;
            
            console.log(`Moving to slide \${index}, translateX: \${translateX}%`);
            
            if (track) {
                track.style.transitionDuration = animated ? `\${config.transitionDuration || 600}ms` : '0ms';
                track.style.transform = `translateX(\${translateX}%)`;
            }
            
            // インジケーター更新
            indicators.forEach(function(indicator, i) {
                indicator.classList.toggle('active', i === index);
            });
            
            currentSlide = index;
        }
        
        function nextSlide() {
            const next = (currentSlide + 1) % slides.length;
            console.log('Next slide:', next);
            updateSlide(next);
        }
        
        function prevSlide() {
            const prev = (currentSlide - 1 + slides.length) % slides.length;
            console.log('Previous slide:', prev);
            updateSlide(prev);
        }
        
        function goToSlide(index) {
            if (index >= 0 && index < slides.length && index !== currentSlide) {
                console.log('Go to slide:', index);
                updateSlide(index);
            }
        }
        
        function startAutoPlay() {
            if (config.autoPlay && slides.length > 1) {
                console.log('Starting autoplay with interval:', config.autoPlayInterval);
                autoPlayInterval = setInterval(nextSlide, config.autoPlayInterval || 4000);
            }
        }
        
        function stopAutoPlay() {
            if (autoPlayInterval) {
                console.log('Stopping autoplay');
                clearInterval(autoPlayInterval);
                autoPlayInterval = null;
            }
        }
        
        // イベントリスナー
        if (nextBtn && config.showNavigation) {
            nextBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation(); // スライドリンクのクリックを阻止
                console.log('Next button clicked');
                stopAutoPlay();
                nextSlide();
                startAutoPlay();
            });
            console.log('Next button listener attached');
        }
        
        if (prevBtn && config.showNavigation) {
            prevBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation(); // スライドリンクのクリックを阻止
                console.log('Previous button clicked');
                stopAutoPlay();
                prevSlide();
                startAutoPlay();
            });
            console.log('Previous button listener attached');
        }
        
        if (config.showIndicators) {
            indicators.forEach(function(indicator, index) {
                indicator.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation(); // スライドリンクのクリックを阻止
                    console.log('Indicator clicked:', index);
                    stopAutoPlay();
                    goToSlide(index);
                    startAutoPlay();
                });
            });
            console.log('Indicator listeners attached');
        }
        
        // タッチ/スワイプ対応
        if (config.enableTouchSwipe) {
            let touchStartX = 0;
            let touchEndX = 0;
            
            track.addEventListener('touchstart', function(e) {
                touchStartX = e.changedTouches[0].screenX;
                stopAutoPlay();
            });
            
            track.addEventListener('touchend', function(e) {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                startAutoPlay();
            });
            
            function handleSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartX - touchEndX;
                
                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0) {
                        nextSlide();
                    } else {
                        prevSlide();
                    }
                }
            }
            console.log('Touch swipe enabled');
        }
        
        // キーボード操作
        if (config.enableKeyboardNav) {
            document.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowLeft') {
                    prevSlide();
                } else if (e.key === 'ArrowRight') {
                    nextSlide();
                }
            });
            console.log('Keyboard navigation enabled');
        }
        
        // マウスオーバーで自動再生停止
        block.addEventListener('mouseenter', stopAutoPlay);
        block.addEventListener('mouseleave', startAutoPlay);
        
        // 初期設定
        updateSlide(0, false);
        startAutoPlay();
        
        console.log('Carousel fully initialized');
    });
});
</script>
{% else %}
<!-- カルーセル記事が登録されていません -->
<div class=\"carousel-feature-block carousel-empty\">
    <div style=\"padding: 3rem; text-align: center; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); border-radius: 12px; color: #6c757d;\">
        <i class=\"fa fa-info-circle\" style=\"font-size: 3rem; margin-bottom: 1.5rem; color: #007bff;\"></i>
        <h3 style=\"margin: 0; font-size: 1.4rem; font-weight: 600;\">カルーセル特集の記事が登録されていません</h3>
        <p style=\"margin: 1rem 0 0 0; font-size: 1rem; opacity: 0.8;\">管理画面からカルーセル記事を作成してください</p>
    </div>
</div>
{% endif %}
<!-- カルーセル特集ブロック終了 -->", "@CarouselFeature/Block/carousel_feature.twig", "/home/asa3150/www/ec-cube/html/app/Plugin/CarouselFeature/Resource/template/Block/carousel_feature.twig");
    }
}
