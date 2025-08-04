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

/* Block/custom_news.twig */
class __TwigTemplate_1ae881ab6586baf451cf50583aac2e51 extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/custom_news.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/custom_news.twig"));

        // line 1
        $context["NewsList"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, $this->env->getFunction('repository')->getCallable()("Eccube\\Entity\\News"), "getList", [], "method", false, false, false, 1), 0, 5);
        // line 2
        echo "<div class=\"\" style=\"\">
        <div class=\"ec-newsRole__news\">
            ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["NewsList"]) || array_key_exists("NewsList", $context) ? $context["NewsList"] : (function () { throw new RuntimeError('Variable "NewsList" does not exist.', 4, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["News"]) {
            // line 5
            echo "                <div class=\"ec-newsRole__newsItem mt-3\">
                    <div class=\"ec-newsRole__newsHeading\">
                        <div class=\"ec-newsRole__newsDate\" style=\"font-weight:bold;\">
                            ";
            // line 8
            echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\IntlExtension']->date_day($this->env, twig_get_attribute($this->env, $this->source, $context["News"], "publish_date", [], "any", false, false, false, 8)), "html", null, true);
            echo "
                        </div>
                        <div class=\"ec-newsRole__newsColumn border-top\">
                            <div class=\"ec-newsRole__newsTitle h5 mt-3\">
                                <a href=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("custom_news_detail", ["id" => twig_get_attribute($this->env, $this->source, $context["News"], "id", [], "any", false, false, false, 12)]), "html", null, true);
            echo "\"
                                   ";
            // line 13
            if ((twig_get_attribute($this->env, $this->source, $context["News"], "link_method", [], "any", false, false, false, 13) == "1")) {
                echo "target=\"_blank\"";
            }
            echo ">
                                    ";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["News"], "title", [], "any", false, false, false, 14), "html", null, true);
            echo "
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class=\"ec-newsRole__newsDescription\">
                        ";
            // line 21
            echo "                    </div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['News'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "        </div>
    </div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "Block/custom_news.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 24,  84 => 21,  75 => 14,  69 => 13,  65 => 12,  58 => 8,  53 => 5,  49 => 4,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set NewsList = repository('Eccube\\\\Entity\\\\News').getList()|slice(0, 5) %}
<div class=\"\" style=\"\">
        <div class=\"ec-newsRole__news\">
            {% for News in NewsList %}
                <div class=\"ec-newsRole__newsItem mt-3\">
                    <div class=\"ec-newsRole__newsHeading\">
                        <div class=\"ec-newsRole__newsDate\" style=\"font-weight:bold;\">
                            {{ News.publish_date|date_day }}
                        </div>
                        <div class=\"ec-newsRole__newsColumn border-top\">
                            <div class=\"ec-newsRole__newsTitle h5 mt-3\">
                                <a href=\"{{ path('custom_news_detail', {'id': News.id}) }}\"
                                   {% if News.link_method == '1' %}target=\"_blank\"{% endif %}>
                                    {{ News.title }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class=\"ec-newsRole__newsDescription\">
                        {# 必要に応じて説明文などを追加 #}
                    </div>
                </div>
            {% endfor %}
        </div>
    </div>", "Block/custom_news.twig", "/home/asa3150/www/ec-cube/html/app/template/default/Block/custom_news.twig");
    }
}
