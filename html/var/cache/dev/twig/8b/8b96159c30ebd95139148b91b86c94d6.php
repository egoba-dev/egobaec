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

/* Block/recommend_product_block.twig */
class __TwigTemplate_26ac26c100c5279e24ed7ba5ec050fb2 extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/recommend_product_block.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/recommend_product_block.twig"));

        // line 9
        $context["recommend_products"] = twig_get_attribute($this->env, $this->source, $this->env->getFunction('repository')->getCallable()("Plugin\\Recommend42\\Entity\\RecommendProduct"), "getRecommendProduct", [], "any", false, false, false, 9);
        // line 10
        echo "
<!-- ▼item_list▼ -->
<div class=\"ec-shelfRole\">
    <ul class=\"ec-shelfGrid\">
        ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["recommend_products"]) || array_key_exists("recommend_products", $context) ? $context["recommend_products"] : (function () { throw new RuntimeError('Variable "recommend_products" does not exist.', 14, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["RecommendProduct"]) {
            // line 15
            echo "            <li class=\"ec-shelfGrid__item\">
                <a href=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_detail", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["RecommendProduct"], "Product", [], "any", false, false, false, 16), "id", [], "any", false, false, false, 16)]), "html", null, true);
            echo "\">
                    <img src=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl($this->extensions['Eccube\Twig\Extension\EccubeExtension']->getNoImageProduct(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["RecommendProduct"], "Product", [], "any", false, false, false, 17), "mainFileName", [], "any", false, false, false, 17)), "save_image"), "html", null, true);
            echo "\">
                    <p>";
            // line 18
            echo twig_nl2br($this->env->getRuntime('Exercise\HTMLPurifierBundle\Twig\HTMLPurifierRuntime')->purify(twig_get_attribute($this->env, $this->source, $context["RecommendProduct"], "comment", [], "any", false, false, false, 18)));
            echo "</p>
                    <dl>
                        <dt class=\"item_name\">";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["RecommendProduct"], "Product", [], "any", false, false, false, 20), "name", [], "any", false, false, false, 20), "html", null, true);
            echo "</dt>
                        <dd class=\"item_price\">
                            ";
            // line 22
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["RecommendProduct"], "Product", [], "any", false, false, false, 22), "hasProductClass", [], "any", false, false, false, 22)) {
                // line 23
                echo "                                ";
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["RecommendProduct"], "Product", [], "any", false, false, false, 23), "getPrice02Min", [], "any", false, false, false, 23) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["RecommendProduct"], "Product", [], "any", false, false, false, 23), "getPrice02Max", [], "any", false, false, false, 23))) {
                    // line 24
                    echo "                                    ";
                    echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["RecommendProduct"], "Product", [], "any", false, false, false, 24), "getPrice02IncTaxMin", [], "any", false, false, false, 24)), "html", null, true);
                    echo "
                                ";
                } else {
                    // line 26
                    echo "                                    ";
                    echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["RecommendProduct"], "Product", [], "any", false, false, false, 26), "getPrice02IncTaxMin", [], "any", false, false, false, 26)), "html", null, true);
                    echo " ～ ";
                    echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["RecommendProduct"], "Product", [], "any", false, false, false, 26), "getPrice02IncTaxMax", [], "any", false, false, false, 26)), "html", null, true);
                    echo "
                                ";
                }
                // line 28
                echo "                            ";
            } else {
                // line 29
                echo "                                ";
                echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["RecommendProduct"], "Product", [], "any", false, false, false, 29), "getPrice02IncTaxMin", [], "any", false, false, false, 29)), "html", null, true);
                echo "
                            ";
            }
            // line 31
            echo "                        </dd>
                    </dl>
                </a>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['RecommendProduct'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "    </ul>
</div>
<!-- ▲item_list▲ -->";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "Block/recommend_product_block.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 36,  104 => 31,  98 => 29,  95 => 28,  87 => 26,  81 => 24,  78 => 23,  76 => 22,  71 => 20,  66 => 18,  62 => 17,  58 => 16,  55 => 15,  51 => 14,  45 => 10,  43 => 9,);
    }

    public function getSourceContext()
    {
        return new Source("{#
 * This file is part of the Recommend Product plugin
 *
 * Copyright (C) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
#}
{% set recommend_products = repository('Plugin\\\\Recommend42\\\\Entity\\\\RecommendProduct').getRecommendProduct %}

<!-- ▼item_list▼ -->
<div class=\"ec-shelfRole\">
    <ul class=\"ec-shelfGrid\">
        {% for RecommendProduct in recommend_products %}
            <li class=\"ec-shelfGrid__item\">
                <a href=\"{{ url('product_detail', {'id': RecommendProduct.Product.id}) }}\">
                    <img src=\"{{ asset(RecommendProduct.Product.mainFileName|no_image_product, \"save_image\") }}\">
                    <p>{{ RecommendProduct.comment|raw|purify|nl2br }}</p>
                    <dl>
                        <dt class=\"item_name\">{{ RecommendProduct.Product.name }}</dt>
                        <dd class=\"item_price\">
                            {% if RecommendProduct.Product.hasProductClass %}
                                {% if RecommendProduct.Product.getPrice02Min == RecommendProduct.Product.getPrice02Max %}
                                    {{ RecommendProduct.Product.getPrice02IncTaxMin|price }}
                                {% else %}
                                    {{ RecommendProduct.Product.getPrice02IncTaxMin|price }} ～ {{ RecommendProduct.Product.getPrice02IncTaxMax|price }}
                                {% endif %}
                            {% else %}
                                {{ RecommendProduct.Product.getPrice02IncTaxMin|price }}
                            {% endif %}
                        </dd>
                    </dl>
                </a>
            </li>
        {% endfor %}
    </ul>
</div>
<!-- ▲item_list▲ -->", "Block/recommend_product_block.twig", "/home/asa3150/www/ec-cube/html/app/template/default/Block/recommend_product_block.twig");
    }
}
