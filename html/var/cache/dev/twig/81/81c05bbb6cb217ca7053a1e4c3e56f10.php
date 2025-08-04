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

/* @Maker42/default/maker.twig */
class __TwigTemplate_8a8b428ec6611eeb4eea523af6c3b4e4 extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Maker42/default/maker.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Maker42/default/maker.twig"));

        // line 11
        echo "
<script>
    \$(function () {
        \$('#maker_area').insertBefore(\$('div.ec-productRole__category'));
    });
</script>

";
        // line 18
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 18, $this->source); })()), "Maker", [], "any", false, false, false, 18))) {
            // line 19
            echo "    <div id=\"maker_area\" class=\"ec-productRole__maker\" style=\"padding: 14px 0; border-bottom: 1px dotted #ccc;\">
        ";
            // line 20
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 20, $this->source); })()), "maker_url", [], "any", false, false, false, 20))) {
                // line 21
                echo "            <p class=\"ec-maker\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("maker.admin.maker"), "html", null, true);
                echo "： <a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 21, $this->source); })()), "maker_url", [], "any", false, false, false, 21), "html", null, true);
                echo "\" target=\"_blank\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 21, $this->source); })()), "Maker", [], "any", false, false, false, 21), "name", [], "any", false, false, false, 21), "html", null, true);
                echo "</a></p>
        ";
            } else {
                // line 23
                echo "            <p class=\"ec-maker\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("maker.admin.maker"), "html", null, true);
                echo "： ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Product"]) || array_key_exists("Product", $context) ? $context["Product"] : (function () { throw new RuntimeError('Variable "Product" does not exist.', 23, $this->source); })()), "Maker", [], "any", false, false, false, 23), "name", [], "any", false, false, false, 23), "html", null, true);
                echo "</p>
        ";
            }
            // line 25
            echo "    </div>
";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "@Maker42/default/maker.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 25,  69 => 23,  59 => 21,  57 => 20,  54 => 19,  52 => 18,  43 => 11,);
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

<script>
    \$(function () {
        \$('#maker_area').insertBefore(\$('div.ec-productRole__category'));
    });
</script>

{% if Product.Maker is not empty %}
    <div id=\"maker_area\" class=\"ec-productRole__maker\" style=\"padding: 14px 0; border-bottom: 1px dotted #ccc;\">
        {% if Product.maker_url is not empty %}
            <p class=\"ec-maker\">{{ 'maker.admin.maker'|trans }}： <a href=\"{{ Product.maker_url }}\" target=\"_blank\">{{ Product.Maker.name }}</a></p>
        {% else %}
            <p class=\"ec-maker\">{{ 'maker.admin.maker'|trans }}： {{ Product.Maker.name }}</p>
        {% endif %}
    </div>
{% endif %}
", "@Maker42/default/maker.twig", "/home/asa3150/www/ec-cube/html/app/Plugin/Maker42/Resource/template/default/maker.twig");
    }
}
