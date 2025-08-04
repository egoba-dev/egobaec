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

/* @LeftTextBlock/Block/left_text_block.twig */
class __TwigTemplate_fda979f1b1b3f005908f958d30c7035f extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@LeftTextBlock/Block/left_text_block.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@LeftTextBlock/Block/left_text_block.twig"));

        // line 1
        if ((isset($context["LeftTextBlocks"]) || array_key_exists("LeftTextBlocks", $context) ? $context["LeftTextBlocks"] : (function () { throw new RuntimeError('Variable "LeftTextBlocks" does not exist.', 1, $this->source); })())) {
            // line 2
            echo "    <div class=\"left-text-block\">
        ";
            // line 3
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["LeftTextBlocks"]) || array_key_exists("LeftTextBlocks", $context) ? $context["LeftTextBlocks"] : (function () { throw new RuntimeError('Variable "LeftTextBlocks" does not exist.', 3, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["LeftTextBlock"]) {
                // line 4
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["LeftTextBlock"], "visible", [], "any", false, false, false, 4)) {
                    // line 5
                    echo "                <div class=\"left-text-block-item\" style=\"text-align: left; margin-bottom: 20px;\">
                    ";
                    // line 6
                    $context["fontSize"] = ((twig_get_attribute($this->env, $this->source, $context["LeftTextBlock"], "fontSize", [], "any", false, false, false, 6)) ? (twig_get_attribute($this->env, $this->source, $context["LeftTextBlock"], "fontSize", [], "any", false, false, false, 6)) : (16));
                    // line 7
                    echo "                    ";
                    $context["fontFamily"] = ((twig_get_attribute($this->env, $this->source, $context["LeftTextBlock"], "fontFamily", [], "any", false, false, false, 7)) ? (twig_get_attribute($this->env, $this->source, $context["LeftTextBlock"], "fontFamily", [], "any", false, false, false, 7)) : ("inherit"));
                    // line 8
                    echo "                    
                    ";
                    // line 9
                    if (twig_get_attribute($this->env, $this->source, $context["LeftTextBlock"], "title", [], "any", false, false, false, 9)) {
                        // line 10
                        echo "                        <h3 class=\"left-text-block-title\" style=\"text-align: left; margin-bottom: 10px; font-size: ";
                        echo twig_escape_filter($this->env, (isset($context["fontSize"]) || array_key_exists("fontSize", $context) ? $context["fontSize"] : (function () { throw new RuntimeError('Variable "fontSize" does not exist.', 10, $this->source); })()), "html", null, true);
                        echo "px; font-family: ";
                        echo twig_escape_filter($this->env, (isset($context["fontFamily"]) || array_key_exists("fontFamily", $context) ? $context["fontFamily"] : (function () { throw new RuntimeError('Variable "fontFamily" does not exist.', 10, $this->source); })()), "html", null, true);
                        echo ";\">
                            ";
                        // line 11
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["LeftTextBlock"], "title", [], "any", false, false, false, 11), "html", null, true);
                        echo "
                        </h3>
                    ";
                    }
                    // line 14
                    echo "                    
                    ";
                    // line 16
                    echo "                    ";
                    if (((twig_get_attribute($this->env, $this->source, $context["LeftTextBlock"], "content", [], "any", false, false, false, 16) && twig_trim_filter(twig_get_attribute($this->env, $this->source, $context["LeftTextBlock"], "content", [], "any", false, false, false, 16))) && twig_get_attribute($this->env, $this->source, $context["LeftTextBlock"], "showContent", [], "any", false, false, false, 16))) {
                        // line 17
                        echo "                        <div class=\"left-text-block-content\" style=\"text-align: left; font-size: ";
                        echo twig_escape_filter($this->env, (isset($context["fontSize"]) || array_key_exists("fontSize", $context) ? $context["fontSize"] : (function () { throw new RuntimeError('Variable "fontSize" does not exist.', 17, $this->source); })()), "html", null, true);
                        echo "px; font-family: ";
                        echo twig_escape_filter($this->env, (isset($context["fontFamily"]) || array_key_exists("fontFamily", $context) ? $context["fontFamily"] : (function () { throw new RuntimeError('Variable "fontFamily" does not exist.', 17, $this->source); })()), "html", null, true);
                        echo "; line-height: 1.6;\">
                            ";
                        // line 18
                        echo twig_get_attribute($this->env, $this->source, $context["LeftTextBlock"], "content", [], "any", false, false, false, 18);
                        echo "
                        </div>
                    ";
                    }
                    // line 21
                    echo "                </div>
            ";
                }
                // line 23
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['LeftTextBlock'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "    </div>
";
        }
        // line 26
        echo "
<style>
.left-text-block {
    width: 100%;
}

.left-text-block-item {
    margin-bottom: 20px;
    padding: 10px 0;
}

.left-text-block-title {
    margin-bottom: 10px;
    font-weight: bold;
}

.left-text-block-content {
    line-height: 1.6;
    word-wrap: break-word;
}

.left-text-block-content p {
    margin-bottom: 10px;
}

.left-text-block-content p:last-child {
    margin-bottom: 0;
}

/* レスポンシブ対応 */
@media (max-width: 768px) {
    .left-text-block-item {
        margin-bottom: 15px;
        padding: 8px 0;
    }
}
</style>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "@LeftTextBlock/Block/left_text_block.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 26,  110 => 24,  104 => 23,  100 => 21,  94 => 18,  87 => 17,  84 => 16,  81 => 14,  75 => 11,  68 => 10,  66 => 9,  63 => 8,  60 => 7,  58 => 6,  55 => 5,  52 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if LeftTextBlocks %}
    <div class=\"left-text-block\">
        {% for LeftTextBlock in LeftTextBlocks %}
            {% if LeftTextBlock.visible %}
                <div class=\"left-text-block-item\" style=\"text-align: left; margin-bottom: 20px;\">
                    {% set fontSize = LeftTextBlock.fontSize ?: 16 %}
                    {% set fontFamily = LeftTextBlock.fontFamily ?: 'inherit' %}
                    
                    {% if LeftTextBlock.title %}
                        <h3 class=\"left-text-block-title\" style=\"text-align: left; margin-bottom: 10px; font-size: {{ fontSize }}px; font-family: {{ fontFamily }};\">
                            {{ LeftTextBlock.title }}
                        </h3>
                    {% endif %}
                    
                    {# コンテンツがあり、show_contentフラグがtrueの場合のみ表示 #}
                    {% if LeftTextBlock.content and LeftTextBlock.content|trim and LeftTextBlock.showContent %}
                        <div class=\"left-text-block-content\" style=\"text-align: left; font-size: {{ fontSize }}px; font-family: {{ fontFamily }}; line-height: 1.6;\">
                            {{ LeftTextBlock.content|raw }}
                        </div>
                    {% endif %}
                </div>
            {% endif %}
        {% endfor %}
    </div>
{% endif %}

<style>
.left-text-block {
    width: 100%;
}

.left-text-block-item {
    margin-bottom: 20px;
    padding: 10px 0;
}

.left-text-block-title {
    margin-bottom: 10px;
    font-weight: bold;
}

.left-text-block-content {
    line-height: 1.6;
    word-wrap: break-word;
}

.left-text-block-content p {
    margin-bottom: 10px;
}

.left-text-block-content p:last-child {
    margin-bottom: 0;
}

/* レスポンシブ対応 */
@media (max-width: 768px) {
    .left-text-block-item {
        margin-bottom: 15px;
        padding: 8px 0;
    }
}
</style>", "@LeftTextBlock/Block/left_text_block.twig", "/home/asa3150/www/ec-cube/html/app/Plugin/LeftTextBlock/Resource/template/Block/left_text_block.twig");
    }
}
