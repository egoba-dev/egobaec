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

/* @admin/Store/plugin_detail_modal.twig */
class __TwigTemplate_b84d838b1fea2c998d35bbdb945b100f extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@admin/Store/plugin_detail_modal.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@admin/Store/plugin_detail_modal.twig"));

        // line 1
        echo "<div class=\"modal fade\" id=\"searchPluginModal-";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 1, $this->source); })()), "id", [], "any", false, false, false, 1), "html", null, true);
        echo "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"searchPluginModal\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-lg\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title fw-bold\" id=\"exampleModalLabel\">";
        // line 5
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.store.plugin_owners_search.modal.header"), "html", null, true);
        echo "</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <div class=\"row mb-5\">
                    <div class=\"col-6\">
                        <img class=\"w-100 img-responsive\"
                             src=\"";
        // line 12
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "image", [], "any", true, true, false, 12)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "image", [], "any", false, false, false, 12), $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("noimage_plugin_list.png", "save_image"))) : ($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("noimage_plugin_list.png", "save_image"))), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 12, $this->source); })()), "name", [], "any", false, false, false, 12), "html", null, true);
        echo "\">
                    </div>
                    <div class=\"col-6\">
                        <h5 class=\"fw-bold mb-3\">";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 15, $this->source); })()), "name", [], "any", false, false, false, 15), "html", null, true);
        echo "</h5>
                        <p>";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 16, $this->source); })()), "short_description", [], "any", false, false, false, 16), "html", null, true);
        echo "</p>
                        <p class=\"plg-prices text-danger\"><span class=\"fw-bold text-dark\">";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.store.plugin.price"), "html", null, true);
        echo " </span> ";
        echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\EccubeExtension']->getPriceFilter(twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 17, $this->source); })()), "price", [], "any", false, false, false, 17)), "html", null, true);
        echo "<small> (";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("common.tax_include"), "html", null, true);
        echo ")</small></p>
                    </div>
                </div>
                <div class=\"row mb-4\">
                    <div class=\"col-7 ps-4\">
                        ";
        // line 22
        echo twig_include($this->env, $context, "@admin/Store/plugin_detail_info.twig");
        echo "
                    </div>
                    <div class=\"col-5 text-end\">
                        ";
        // line 25
        if (twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 25, $this->source); })()), "contact_url", [], "any", false, false, false, 25)) {
            // line 26
            echo "                        <a class=\"btn btn-ec-regular btn-lg mb-3\" href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 26, $this->source); })()), "contact_url", [], "any", false, false, false, 26), "html", null, true);
            echo "\" target=\"_blank\"><i class=\"fa fa-image fa-lg text-secondary\"></i> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.store.plugin_owners_search.modal.contact"), "html", null, true);
            echo "</a>{ }}
                        ";
        }
        // line 28
        echo "                        ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 28, $this->source); })()), "manual_url", [], "any", false, false, false, 28)) {
            // line 29
            echo "                        <a class=\"btn btn-ec-regular btn-lg\" href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 29, $this->source); })()), "manual_url", [], "any", false, false, false, 29), "html", null, true);
            echo "\" target=\"_blank\"><i class=\"fa fa-image fa-lg text-secondary\"></i> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.store.plugin_owners_search.modal.manual"), "html", null, true);
            echo "</a>
                        ";
        }
        // line 31
        echo "                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col-12\">
                        ";
        // line 35
        $context["version_check"] = twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 35, $this->source); })()), "version_check", [], "any", false, false, false, 35);
        // line 36
        echo "                        ";
        if (((isset($context["version_check"]) || array_key_exists("version_check", $context) ? $context["version_check"] : (function () { throw new RuntimeError('Variable "version_check" does not exist.', 36, $this->source); })()) == 0)) {
            // line 37
            echo "                        <div class=\"alert alert-danger border border-danger\">
                                <p class=\"text-danger mb-1\">";
            // line 38
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.store.plugin_owners_search.modal.note", ["%version%" => twig_constant("Eccube\\Common\\Constant::VERSION")]), "html", null, true);
            echo "</p>
                        </div>
                        ";
        }
        // line 41
        echo "                    </div>
                </div>
                <hr>
                <div class=\"row mt-4\">
                    <div class=\"col-12\">
                        ";
        // line 46
        echo $this->env->getRuntime('Exercise\HTMLPurifierBundle\Twig\HTMLPurifierRuntime')->purify(twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 46, $this->source); })()), "long_description", [], "any", false, false, false, 46));
        echo "
                    </div>
                </div>
            </div>
            <div class=\"modal-footer\">
                <form action=\"";
        // line 51
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["eccube_config"]) || array_key_exists("eccube_config", $context) ? $context["eccube_config"] : (function () { throw new RuntimeError('Variable "eccube_config" does not exist.', 51, $this->source); })()), "eccube_owners_store_url", [], "any", false, false, false, 51), "html", null, true);
        echo "/gateway/purchase/?product_id=";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 51, $this->source); })()), "id", [], "any", false, false, false, 51), "html", null, true);
        echo "\" method=\"post\" target=\"_blank\">
                <button type=\"button\" class=\"btn btn-ec-sub\" data-bs-dismiss=\"modal\">";
        // line 52
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.store.plugin_owners_search.modal.cancel"), "html", null, true);
        echo "</button>
                ";
        // line 53
        if ((twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 53, $this->source); })()), "update_status", [], "any", false, false, false, 53) == 1)) {
            // line 54
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("admin_store_plugin_install_confirm", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 54, $this->source); })()), "id", [], "any", false, false, false, 54)]), "html", null, true);
            echo "\" class=\"btn btn-primary\">
                        ";
            // line 55
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.store.plugin_owners_search.install.free"), "html", null, true);
            echo "
                    </a>
                ";
        } elseif ((twig_get_attribute($this->env, $this->source,         // line 57
(isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 57, $this->source); })()), "update_status", [], "any", false, false, false, 57) == 2)) {
            // line 58
            echo "                    <a href=\"#\" class=\"btn btn-ec-regular\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.store.plugin.installed"), "html", null, true);
            echo "</a>
                ";
        } elseif ((twig_get_attribute($this->env, $this->source,         // line 59
(isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 59, $this->source); })()), "update_status", [], "any", false, false, false, 59) == 3)) {
            // line 60
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("admin_store_plugin_install_confirm", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 60, $this->source); })()), "id", [], "any", false, false, false, 60)]), "html", null, true);
            echo "\" class=\"btn btn-primary\">
                        ";
            // line 61
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.store.plugin.update"), "html", null, true);
            echo "
                    </a>
                ";
        } elseif ((twig_get_attribute($this->env, $this->source,         // line 63
(isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 63, $this->source); })()), "update_status", [], "any", false, false, false, 63) == 4)) {
            // line 64
            echo "                    <input type=\"hidden\" name=\"mode\" value=\"link_site\" />
                    <input type=\"hidden\" name=\"public_key\" value=\"";
            // line 65
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["BaseInfo"]) || array_key_exists("BaseInfo", $context) ? $context["BaseInfo"] : (function () { throw new RuntimeError('Variable "BaseInfo" does not exist.', 65, $this->source); })()), "authentication_key", [], "any", false, false, false, 65), "html", null, true);
            echo "\" />
                    <input type=\"submit\" class=\"btn btn-primary\" value=\"";
            // line 66
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.store.plugin_owners_search.install.fee"), "html", null, true);
            echo "\" />
                ";
        }
        // line 68
        echo "                </form>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "@admin/Store/plugin_detail_modal.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  206 => 68,  201 => 66,  197 => 65,  194 => 64,  192 => 63,  187 => 61,  182 => 60,  180 => 59,  175 => 58,  173 => 57,  168 => 55,  163 => 54,  161 => 53,  157 => 52,  151 => 51,  143 => 46,  136 => 41,  130 => 38,  127 => 37,  124 => 36,  122 => 35,  116 => 31,  108 => 29,  105 => 28,  97 => 26,  95 => 25,  89 => 22,  77 => 17,  73 => 16,  69 => 15,  61 => 12,  51 => 5,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"modal fade\" id=\"searchPluginModal-{{ item.id }}\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"searchPluginModal\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-lg\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title fw-bold\" id=\"exampleModalLabel\">{{ 'admin.store.plugin_owners_search.modal.header'|trans }}</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <div class=\"row mb-5\">
                    <div class=\"col-6\">
                        <img class=\"w-100 img-responsive\"
                             src=\"{{ item.image|default(asset('noimage_plugin_list.png', 'save_image')) }}\" alt=\"{{ item.name }}\">
                    </div>
                    <div class=\"col-6\">
                        <h5 class=\"fw-bold mb-3\">{{ item.name }}</h5>
                        <p>{{ item.short_description }}</p>
                        <p class=\"plg-prices text-danger\"><span class=\"fw-bold text-dark\">{{ 'admin.store.plugin.price'|trans }} </span> {{ item.price|price }}<small> ({{ 'common.tax_include'|trans }})</small></p>
                    </div>
                </div>
                <div class=\"row mb-4\">
                    <div class=\"col-7 ps-4\">
                        {{ include('@admin/Store/plugin_detail_info.twig') }}
                    </div>
                    <div class=\"col-5 text-end\">
                        {% if item.contact_url %}
                        <a class=\"btn btn-ec-regular btn-lg mb-3\" href=\"{{ item.contact_url }}\" target=\"_blank\"><i class=\"fa fa-image fa-lg text-secondary\"></i> {{ 'admin.store.plugin_owners_search.modal.contact'|trans }}</a>{ }}
                        {% endif %}
                        {% if item.manual_url %}
                        <a class=\"btn btn-ec-regular btn-lg\" href=\"{{ item.manual_url }}\" target=\"_blank\"><i class=\"fa fa-image fa-lg text-secondary\"></i> {{ 'admin.store.plugin_owners_search.modal.manual'|trans }}</a>
                        {% endif %}
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col-12\">
                        {% set version_check = item.version_check  %}
                        {% if version_check == 0 %}
                        <div class=\"alert alert-danger border border-danger\">
                                <p class=\"text-danger mb-1\">{{ 'admin.store.plugin_owners_search.modal.note'|trans({\"%version%\": constant('Eccube\\\\Common\\\\Constant::VERSION') }) }}</p>
                        </div>
                        {% endif %}
                    </div>
                </div>
                <hr>
                <div class=\"row mt-4\">
                    <div class=\"col-12\">
                        {{ item.long_description|raw|purify }}
                    </div>
                </div>
            </div>
            <div class=\"modal-footer\">
                <form action=\"{{ eccube_config.eccube_owners_store_url }}/gateway/purchase/?product_id={{ item.id }}\" method=\"post\" target=\"_blank\">
                <button type=\"button\" class=\"btn btn-ec-sub\" data-bs-dismiss=\"modal\">{{ 'admin.store.plugin_owners_search.modal.cancel'|trans }}</button>
                {% if item.update_status == 1 %}
                    <a href=\"{{ url('admin_store_plugin_install_confirm', {'id': item.id}) }}\" class=\"btn btn-primary\">
                        {{ 'admin.store.plugin_owners_search.install.free'|trans }}
                    </a>
                {% elseif item.update_status == 2 %}
                    <a href=\"#\" class=\"btn btn-ec-regular\">{{ 'admin.store.plugin.installed'|trans }}</a>
                {% elseif item.update_status == 3 %}
                    <a href=\"{{ url('admin_store_plugin_install_confirm', {'id': item.id}) }}\" class=\"btn btn-primary\">
                        {{ 'admin.store.plugin.update'|trans }}
                    </a>
                {% elseif item.update_status == 4 %}
                    <input type=\"hidden\" name=\"mode\" value=\"link_site\" />
                    <input type=\"hidden\" name=\"public_key\" value=\"{{ BaseInfo.authentication_key }}\" />
                    <input type=\"submit\" class=\"btn btn-primary\" value=\"{{ 'admin.store.plugin_owners_search.install.fee'|trans }}\" />
                {% endif %}
                </form>
            </div>
        </div>
    </div>
</div>
", "@admin/Store/plugin_detail_modal.twig", "/home/asa3150/www/ec-cube/html/src/Eccube/Resource/template/admin/Store/plugin_detail_modal.twig");
    }
}
