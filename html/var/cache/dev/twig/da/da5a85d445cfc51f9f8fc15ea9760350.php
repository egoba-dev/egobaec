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

/* block.twig */
class __TwigTemplate_841829b699a9a09504e2d0691406294e extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "block.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "block.twig"));

        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["Blocks"]) || array_key_exists("Blocks", $context) ? $context["Blocks"] : (function () { throw new RuntimeError('Variable "Blocks" does not exist.', 11, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["Block"]) {
            // line 12
            echo "    <!-- ▼";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Block"], "name", [], "any", false, false, false, 12), "html", null, true);
            echo " -->
    ";
            // line 13
            if (twig_get_attribute($this->env, $this->source, $context["Block"], "use_controller", [], "any", false, false, false, 13)) {
                // line 14
                echo "        ";
                if ((is_string($__internal_compile_0 = twig_get_attribute($this->env, $this->source, $context["Block"], "file_name", [], "any", false, false, false, 14)) && is_string($__internal_compile_1 = "maker_product_") && ('' === $__internal_compile_1 || 0 === strpos($__internal_compile_0, $__internal_compile_1)))) {
                    // line 15
                    echo "            ";
                    $context["blockId"] = twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["Block"], "file_name", [], "any", false, false, false, 15), ["maker_product_" => ""]);
                    // line 16
                    echo "            ";
                    $context["controller"] = "Plugin\\MakerProductBlock\\Controller\\Block\\MakerProductController::index";
                    // line 17
                    echo "            ";
                    echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller((isset($context["controller"]) || array_key_exists("controller", $context) ? $context["controller"] : (function () { throw new RuntimeError('Variable "controller" does not exist.', 17, $this->source); })()), ["id" => (isset($context["blockId"]) || array_key_exists("blockId", $context) ? $context["blockId"] : (function () { throw new RuntimeError('Variable "blockId" does not exist.', 17, $this->source); })())]));
                    echo "
        ";
                } elseif ((is_string($__internal_compile_2 = twig_get_attribute($this->env, $this->source,                 // line 18
$context["Block"], "file_name", [], "any", false, false, false, 18)) && is_string($__internal_compile_3 = "left_text_block_") && ('' === $__internal_compile_3 || 0 === strpos($__internal_compile_2, $__internal_compile_3)))) {
                    // line 19
                    echo "            ";
                    $context["blockId"] = twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["Block"], "file_name", [], "any", false, false, false, 19), ["left_text_block_" => ""]);
                    // line 20
                    echo "            ";
                    $context["controller"] = "Plugin\\LeftTextBlock\\Controller\\BlockController::index";
                    // line 21
                    echo "            ";
                    echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller((isset($context["controller"]) || array_key_exists("controller", $context) ? $context["controller"] : (function () { throw new RuntimeError('Variable "controller" does not exist.', 21, $this->source); })()), ["id" => (isset($context["blockId"]) || array_key_exists("blockId", $context) ? $context["blockId"] : (function () { throw new RuntimeError('Variable "blockId" does not exist.', 21, $this->source); })())]));
                    echo "
        ";
                } else {
                    // line 23
                    echo "            ";
                    echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(("block_" . twig_get_attribute($this->env, $this->source, $context["Block"], "file_name", [], "any", false, false, false, 23))));
                    echo "
        ";
                }
                // line 25
                echo "    ";
            } else {
                // line 26
                echo "        ";
                echo $this->extensions['Eccube\Twig\Extension\TwigIncludeExtension']->include_dispatch($context, (("Block/" . twig_get_attribute($this->env, $this->source, $context["Block"], "file_name", [], "any", false, false, false, 26)) . ".twig"));
                echo "
    ";
            }
            // line 28
            echo "    <!-- ▲";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Block"], "name", [], "any", false, false, false, 28), "html", null, true);
            echo " -->
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Block'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "block.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 28,  91 => 26,  88 => 25,  82 => 23,  76 => 21,  73 => 20,  70 => 19,  68 => 18,  63 => 17,  60 => 16,  57 => 15,  54 => 14,  52 => 13,  47 => 12,  43 => 11,);
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
{% for Block in Blocks %}
    <!-- ▼{{ Block.name }} -->
    {% if Block.use_controller %}
        {% if Block.file_name starts with \"maker_product_\" %}
            {% set blockId = Block.file_name|replace({\"maker_product_\": \"\"}) %}
            {% set controller = \"Plugin\\\\MakerProductBlock\\\\Controller\\\\Block\\\\MakerProductController::index\" %}
            {{ render(controller(controller, {\"id\": blockId})) }}
        {% elseif Block.file_name starts with \"left_text_block_\" %}
            {% set blockId = Block.file_name|replace({\"left_text_block_\": \"\"}) %}
            {% set controller = \"Plugin\\\\LeftTextBlock\\\\Controller\\\\BlockController::index\" %}
            {{ render(controller(controller, {\"id\": blockId})) }}
        {% else %}
            {{ render(path('block_' ~ Block.file_name)) }}
        {% endif %}
    {% else %}
        {{ include_dispatch('Block/' ~ Block.file_name ~ '.twig') }}
    {% endif %}
    <!-- ▲{{ Block.name }} -->
{% endfor %}", "block.twig", "/home/asa3150/www/ec-cube/html/src/Eccube/Resource/template/default/block.twig");
    }
}
