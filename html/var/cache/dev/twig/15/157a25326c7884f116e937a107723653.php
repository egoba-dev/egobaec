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

/* @admin/nav.twig */
class __TwigTemplate_735e545df5a876ff5a4b7ac049cccba1 extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@admin/nav.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@admin/nav.twig"));

        // line 11
        echo "<nav>
    <ul class=\"c-mainNavArea__nav\">
        <!-- ホーム -->
        <li class=\"c-mainNavArea__navItem\">
            <a class=\"c-mainNavArea__navItemTitle\" href=\"";
        // line 15
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("admin_homepage");
        echo "\">
                <i class=\"fa fa-home fa-fw\" aria-hidden=\"true\"></i>
                <span>";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.home"), "html", null, true);
        echo "</span>
            </a>
        </li>
        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["eccubeNav"]) || array_key_exists("eccubeNav", $context) ? $context["eccubeNav"] : (function () { throw new RuntimeError('Variable "eccubeNav" does not exist.', 20, $this->source); })()));
        foreach ($context['_seq'] as $context["key1"] => $context["level1"]) {
            // line 21
            echo "            <li class=\"c-mainNavArea__navItem\">
                ";
            // line 22
            if ((twig_get_attribute($this->env, $this->source, $context["level1"], "children", [], "any", true, true, false, 22) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["level1"], "children", [], "any", false, false, false, 22)) > 0))) {
                // line 23
                echo "                    <a class=\"c-mainNavArea__navItemTitle";
                echo (((twig_get_attribute($this->env, $this->source, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getActiveMenus((isset($context["menus"]) || array_key_exists("menus", $context) ? $context["menus"] : (function () { throw new RuntimeError('Variable "menus" does not exist.', 23, $this->source); })())), 0, [], "array", false, false, false, 23) != $context["key1"])) ? (" collapsed") : (""));
                echo "\"
                       data-bs-toggle=\"collapse\" href=\"#nav-";
                // line 24
                echo twig_escape_filter($this->env, $context["key1"], "html", null, true);
                echo "\"
                       aria-expanded=\"";
                // line 25
                echo (((twig_get_attribute($this->env, $this->source, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getActiveMenus((isset($context["menus"]) || array_key_exists("menus", $context) ? $context["menus"] : (function () { throw new RuntimeError('Variable "menus" does not exist.', 25, $this->source); })())), 0, [], "array", false, false, false, 25) == $context["key1"])) ? ("true") : ("false"));
                echo "\"
                       aria-controls=\"nav-";
                // line 26
                echo twig_escape_filter($this->env, $context["key1"], "html", null, true);
                echo "\">
                        <i class=\"fa ";
                // line 27
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["level1"], "icon", [], "any", false, false, false, 27), "html", null, true);
                echo " fa-fw\" aria-hidden=\"true\"></i>
                        <span>";
                // line 28
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["level1"], "name", [], "any", false, false, false, 28)), "html", null, true);
                echo "</span>
                    </a>
                    <ul class=\"collapse ";
                // line 30
                if ((twig_get_attribute($this->env, $this->source, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getActiveMenus((isset($context["menus"]) || array_key_exists("menus", $context) ? $context["menus"] : (function () { throw new RuntimeError('Variable "menus" does not exist.', 30, $this->source); })())), 0, [], "array", false, false, false, 30) == $context["key1"])) {
                    echo " show";
                }
                echo "\" id=\"nav-";
                echo twig_escape_filter($this->env, $context["key1"], "html", null, true);
                echo "\">
                        ";
                // line 31
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["level1"], "children", [], "any", false, false, false, 31));
                foreach ($context['_seq'] as $context["key2"] => $context["level2"]) {
                    // line 32
                    echo "                            <li>
                                ";
                    // line 33
                    if ((twig_get_attribute($this->env, $this->source, $context["level2"], "children", [], "any", true, true, false, 33) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["level2"], "children", [], "any", false, false, false, 33)) > 0))) {
                        // line 34
                        echo "                                    <a class=\"c-mainNavArea__navItemSubTitle";
                        echo (((twig_get_attribute($this->env, $this->source, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getActiveMenus((isset($context["menus"]) || array_key_exists("menus", $context) ? $context["menus"] : (function () { throw new RuntimeError('Variable "menus" does not exist.', 34, $this->source); })())), 1, [], "array", false, false, false, 34) != $context["key2"])) ? (" collapsed") : (""));
                        echo "\"
                                       data-bs-toggle=\"collapse\" href=\"#nav-";
                        // line 35
                        echo twig_escape_filter($this->env, $context["key2"], "html", null, true);
                        echo "\"
                                       aria-expanded=\"";
                        // line 36
                        echo (((twig_get_attribute($this->env, $this->source, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getActiveMenus((isset($context["menus"]) || array_key_exists("menus", $context) ? $context["menus"] : (function () { throw new RuntimeError('Variable "menus" does not exist.', 36, $this->source); })())), 1, [], "array", false, false, false, 36) != $context["key2"])) ? ("true") : ("false"));
                        echo "\"
                                       aria-controls=\"nav-";
                        // line 37
                        echo twig_escape_filter($this->env, $context["key2"], "html", null, true);
                        echo "\">
                                        <span>";
                        // line 38
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["level2"], "name", [], "any", false, false, false, 38)), "html", null, true);
                        echo "</span>
                                    </a>
                                    <ul class=\"collapse";
                        // line 40
                        echo (((twig_get_attribute($this->env, $this->source, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getActiveMenus((isset($context["menus"]) || array_key_exists("menus", $context) ? $context["menus"] : (function () { throw new RuntimeError('Variable "menus" does not exist.', 40, $this->source); })())), 1, [], "array", false, false, false, 40) == $context["key2"])) ? (" show") : (""));
                        echo "\" id=\"nav-";
                        echo twig_escape_filter($this->env, $context["key2"], "html", null, true);
                        echo "\">
                                        ";
                        // line 41
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["level2"], "children", [], "any", false, false, false, 41));
                        foreach ($context['_seq'] as $context["key3"] => $context["level3"]) {
                            // line 42
                            echo "                                            <li>
                                                <a href=\"";
                            // line 43
                            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, $context["level3"], "url", [], "any", false, false, false, 43), ((twig_get_attribute($this->env, $this->source, $context["level3"], "param", [], "any", true, true, false, 43)) ? (twig_get_attribute($this->env, $this->source, $context["level3"], "param", [], "any", false, false, false, 43)) : ([]))), "html", null, true);
                            echo "\"";
                            echo (((twig_get_attribute($this->env, $this->source, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getActiveMenus((isset($context["menus"]) || array_key_exists("menus", $context) ? $context["menus"] : (function () { throw new RuntimeError('Variable "menus" does not exist.', 43, $this->source); })())), 2, [], "array", false, false, false, 43) == $context["key3"])) ? (" class=\"is-active\"") : (""));
                            echo ">
                                                    <span>";
                            // line 44
                            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["level3"], "name", [], "any", false, false, false, 44)), "html", null, true);
                            echo "</span>
                                                </a>
                                            </li>
                                        ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['key3'], $context['level3'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 48
                        echo "                                    </ul>
                                ";
                    } else {
                        // line 50
                        echo "                                    <a href=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, $context["level2"], "url", [], "any", false, false, false, 50), ((twig_get_attribute($this->env, $this->source, $context["level2"], "param", [], "any", true, true, false, 50)) ? (twig_get_attribute($this->env, $this->source, $context["level2"], "param", [], "any", false, false, false, 50)) : ([]))), "html", null, true);
                        echo "\"";
                        echo (((twig_get_attribute($this->env, $this->source, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getActiveMenus((isset($context["menus"]) || array_key_exists("menus", $context) ? $context["menus"] : (function () { throw new RuntimeError('Variable "menus" does not exist.', 50, $this->source); })())), 1, [], "array", false, false, false, 50) == $context["key2"])) ? (" class=\"is-active\"") : (""));
                        echo ">
                                        <span>";
                        // line 51
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["level2"], "name", [], "any", false, false, false, 51)), "html", null, true);
                        echo "</span>
                                    </a>
                                ";
                    }
                    // line 54
                    echo "                            </li>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key2'], $context['level2'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 56
                echo "                    </ul>
                ";
            } else {
                // line 58
                echo "                    <a class=\"c-mainNavArea__navItemTitle\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, $context["level1"], "url", [], "any", false, false, false, 58), ((twig_get_attribute($this->env, $this->source, $context["level1"], "param", [], "any", true, true, false, 58)) ? (twig_get_attribute($this->env, $this->source, $context["level1"], "param", [], "any", false, false, false, 58)) : ([]))), "html", null, true);
                echo "\">
                        <i class=\"fa ";
                // line 59
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["level1"], "icon", [], "any", false, false, false, 59), "html", null, true);
                echo "\" aria-hidden=\"true\"></i>
                        <span>";
                // line 60
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["level1"], "name", [], "any", false, false, false, 60)), "html", null, true);
                echo "</span>
                    </a>
                ";
            }
            // line 63
            echo "            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key1'], $context['level1'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "        <!-- 情報 -->
        <li class=\"c-mainNavArea__navItem\">
            <a class=\"c-mainNavArea__navItemTitle collapsed\" data-bs-toggle=\"collapse\" href=\"#others\" aria-expanded=\"false\"
               aria-controls=\"others\">
                <i class=\"fa fa-info-circle fa-fw\" aria-hidden=\"true\"></i>
                <span>";
        // line 70
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.info"), "html", null, true);
        echo "</span>
            </a>
            <ul class=\"collapse\" id=\"others\">
                <li>
                    <a href=\"";
        // line 74
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["eccube_config"]) || array_key_exists("eccube_config", $context) ? $context["eccube_config"] : (function () { throw new RuntimeError('Variable "eccube_config" does not exist.', 74, $this->source); })()), "eccube_official_site_url", [], "any", false, false, false, 74), "html", null, true);
        echo "\" target=\"_blank\">
                        <span>";
        // line 75
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.info.official_site"), "html", null, true);
        echo "</span>
                    </a>
                </li>
                <li>
                    <a href=\"";
        // line 79
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["eccube_config"]) || array_key_exists("eccube_config", $context) ? $context["eccube_config"] : (function () { throw new RuntimeError('Variable "eccube_config" does not exist.', 79, $this->source); })()), "eccube_community_site_url", [], "any", false, false, false, 79), "html", null, true);
        echo "\" target=\"_blank\">
                        <span>";
        // line 80
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.info.community"), "html", null, true);
        echo "</span>
                    </a>
                </li>
                <li>
                    <a href=\"";
        // line 84
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["eccube_config"]) || array_key_exists("eccube_config", $context) ? $context["eccube_config"] : (function () { throw new RuntimeError('Variable "eccube_config" does not exist.', 84, $this->source); })()), "eccube_document_url", [], "any", false, false, false, 84), "html", null, true);
        echo "\" target=\"_blank\">
                        <span>";
        // line 85
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.info.document"), "html", null, true);
        echo "</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "@admin/nav.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  253 => 85,  249 => 84,  242 => 80,  238 => 79,  231 => 75,  227 => 74,  220 => 70,  213 => 65,  206 => 63,  200 => 60,  196 => 59,  191 => 58,  187 => 56,  180 => 54,  174 => 51,  167 => 50,  163 => 48,  153 => 44,  147 => 43,  144 => 42,  140 => 41,  134 => 40,  129 => 38,  125 => 37,  121 => 36,  117 => 35,  112 => 34,  110 => 33,  107 => 32,  103 => 31,  95 => 30,  90 => 28,  86 => 27,  82 => 26,  78 => 25,  74 => 24,  69 => 23,  67 => 22,  64 => 21,  60 => 20,  54 => 17,  49 => 15,  43 => 11,);
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
<nav>
    <ul class=\"c-mainNavArea__nav\">
        <!-- ホーム -->
        <li class=\"c-mainNavArea__navItem\">
            <a class=\"c-mainNavArea__navItemTitle\" href=\"{{ url('admin_homepage') }}\">
                <i class=\"fa fa-home fa-fw\" aria-hidden=\"true\"></i>
                <span>{{ 'admin.home'|trans }}</span>
            </a>
        </li>
        {% for key1, level1 in eccubeNav %}
            <li class=\"c-mainNavArea__navItem\">
                {% if level1.children is defined and level1.children|length > 0 %}
                    <a class=\"c-mainNavArea__navItemTitle{{ active_menus(menus)[0] != key1 ? ' collapsed' }}\"
                       data-bs-toggle=\"collapse\" href=\"#nav-{{ key1 }}\"
                       aria-expanded=\"{{ active_menus(menus)[0] == key1 ? 'true' : 'false' }}\"
                       aria-controls=\"nav-{{ key1 }}\">
                        <i class=\"fa {{ level1.icon }} fa-fw\" aria-hidden=\"true\"></i>
                        <span>{{ level1.name|trans }}</span>
                    </a>
                    <ul class=\"collapse {% if active_menus(menus)[0] == key1 %} show{% endif %}\" id=\"nav-{{ key1 }}\">
                        {% for key2, level2 in level1.children %}
                            <li>
                                {% if level2.children is defined and level2.children|length > 0 %}
                                    <a class=\"c-mainNavArea__navItemSubTitle{{ active_menus(menus)[1] != key2 ? ' collapsed' }}\"
                                       data-bs-toggle=\"collapse\" href=\"#nav-{{ key2 }}\"
                                       aria-expanded=\"{{ active_menus(menus)[1] != key2 ? 'true' : 'false' }}\"
                                       aria-controls=\"nav-{{ key2 }}\">
                                        <span>{{ level2.name|trans }}</span>
                                    </a>
                                    <ul class=\"collapse{{ active_menus(menus)[1] == key2 ? ' show' }}\" id=\"nav-{{ key2 }}\">
                                        {% for key3, level3 in level2.children %}
                                            <li>
                                                <a href=\"{{ url(level3.url, level3.param is defined ? level3.param : []) }}\"{{ active_menus(menus)[2] == key3 ? ' class=\"is-active\"' }}>
                                                    <span>{{ level3.name|trans }}</span>
                                                </a>
                                            </li>
                                        {% endfor %}
                                    </ul>
                                {% else %}
                                    <a href=\"{{ url(level2.url, level2.param is defined ? level2.param : []) }}\"{{ active_menus(menus)[1] == key2 ? ' class=\"is-active\"' }}>
                                        <span>{{ level2.name|trans }}</span>
                                    </a>
                                {% endif %}
                            </li>
                        {% endfor %}
                    </ul>
                {% else %}
                    <a class=\"c-mainNavArea__navItemTitle\" href=\"{{ url(level1.url, level1.param is defined ? level1.param : []) }}\">
                        <i class=\"fa {{ level1.icon }}\" aria-hidden=\"true\"></i>
                        <span>{{ level1.name|trans }}</span>
                    </a>
                {% endif %}
            </li>
        {% endfor %}
        <!-- 情報 -->
        <li class=\"c-mainNavArea__navItem\">
            <a class=\"c-mainNavArea__navItemTitle collapsed\" data-bs-toggle=\"collapse\" href=\"#others\" aria-expanded=\"false\"
               aria-controls=\"others\">
                <i class=\"fa fa-info-circle fa-fw\" aria-hidden=\"true\"></i>
                <span>{{ 'admin.info'|trans }}</span>
            </a>
            <ul class=\"collapse\" id=\"others\">
                <li>
                    <a href=\"{{ eccube_config.eccube_official_site_url }}\" target=\"_blank\">
                        <span>{{ 'admin.info.official_site'|trans }}</span>
                    </a>
                </li>
                <li>
                    <a href=\"{{ eccube_config.eccube_community_site_url }}\" target=\"_blank\">
                        <span>{{ 'admin.info.community'|trans }}</span>
                    </a>
                </li>
                <li>
                    <a href=\"{{ eccube_config.eccube_document_url }}\" target=\"_blank\">
                        <span>{{ 'admin.info.document'|trans }}</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
", "@admin/nav.twig", "/home/asa3150/www/ec-cube/html/src/Eccube/Resource/template/admin/nav.twig");
    }
}
