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

/* Block/footer.twig */
class __TwigTemplate_c556f7413210a535ea7cc3e03a0f57f7 extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/footer.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/footer.twig"));

        // line 11
        echo "<div class=\"ec-footerRole\"     style=\"background-color:white;\">
    <div class=\"ec-footerRole__inner\">
        <ul class=\"ec-footerNavi\"     style=\"color:black;\">
            ";
        // line 15
        echo "            ";
        // line 16
        echo "            ";
        // line 17
        echo "            ";
        // line 18
        echo "            ";
        // line 19
        echo "            ";
        // line 20
        echo "            ";
        // line 21
        echo "            ";
        // line 22
        echo "            ";
        // line 23
        echo "            ";
        // line 24
        echo "            ";
        // line 25
        echo "            ";
        // line 26
        echo "            <li class=\"ec-footerNavi__link\">
                <p>ABOUT</p>
                <p>
                <a href=\"";
        // line 29
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("help_about");
        echo "\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("当サイトについて"), "html", null, true);
        echo "</a>
                </p>
                <p>
                <a href=\"";
        // line 32
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("help_privacy");
        echo "\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("プライバシーポリシー"), "html", null, true);
        echo "</a>
                </p>
                <p>
                <a href=\"";
        // line 35
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("help_tradelaw");
        echo "\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("特定商取引法に基づく表記"), "html", null, true);
        echo "</a>
                </p>
                <p>
                <a href=\"";
        // line 38
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("contact");
        echo "\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("お問い合わせ"), "html", null, true);
        echo "</a>
                </p>
            </li>
        </ul>
        <div class=\"ec-footerTitle\">
            <div class=\"ec-footerTitle__logo\">
                <a href=\"";
        // line 44
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("homepage");
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["BaseInfo"]) || array_key_exists("BaseInfo", $context) ? $context["BaseInfo"] : (function () { throw new RuntimeError('Variable "BaseInfo" does not exist.', 44, $this->source); })()), "shop_name", [], "any", false, false, false, 44), "html", null, true);
        echo "</a>
            </div>
            <div class=\"ec-footerTitle__copyright\">copyright (c) ";
        // line 46
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["BaseInfo"]) || array_key_exists("BaseInfo", $context) ? $context["BaseInfo"] : (function () { throw new RuntimeError('Variable "BaseInfo" does not exist.', 46, $this->source); })()), "shop_name", [], "any", false, false, false, 46), "html", null, true);
        echo " all rights reserved.</div>
        </div>
    </div>
</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "Block/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 46,  110 => 44,  99 => 38,  91 => 35,  83 => 32,  75 => 29,  70 => 26,  68 => 25,  66 => 24,  64 => 23,  62 => 22,  60 => 21,  58 => 20,  56 => 19,  54 => 18,  52 => 17,  50 => 16,  48 => 15,  43 => 11,);
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
<div class=\"ec-footerRole\"     style=\"background-color:white;\">
    <div class=\"ec-footerRole__inner\">
        <ul class=\"ec-footerNavi\"     style=\"color:black;\">
            {#<li class=\"ec-footerNavi__link\">#}
            {#    <a href=\"{{ url('help_about') }}\">{{ '当サイトについて'|trans }}</a>#}
            {#</li>#}
            {#<li class=\"ec-footerNavi__link\">#}
            {#    <a href=\"{{ url('help_privacy') }}\">{{ 'プライバシーポリシー'|trans }}</a>#}
            {#</li>#}
            {#<li class=\"ec-footerNavi__link\">#}
            {#    <a href=\"{{ url('help_tradelaw') }}\">{{ '特定商取引法に基づく表記'|trans }}</a>#}
            {#</li>#}
            {#<li class=\"ec-footerNavi__link\">#}
            {#    <a href=\"{{ url('contact') }}\">{{ 'お問い合わせ'|trans }}</a>#}
            {#</li>#}
            <li class=\"ec-footerNavi__link\">
                <p>ABOUT</p>
                <p>
                <a href=\"{{ url('help_about') }}\">{{ '当サイトについて'|trans }}</a>
                </p>
                <p>
                <a href=\"{{ url('help_privacy') }}\">{{ 'プライバシーポリシー'|trans }}</a>
                </p>
                <p>
                <a href=\"{{ url('help_tradelaw') }}\">{{ '特定商取引法に基づく表記'|trans }}</a>
                </p>
                <p>
                <a href=\"{{ url('contact') }}\">{{ 'お問い合わせ'|trans }}</a>
                </p>
            </li>
        </ul>
        <div class=\"ec-footerTitle\">
            <div class=\"ec-footerTitle__logo\">
                <a href=\"{{ url('homepage') }}\">{{ BaseInfo.shop_name }}</a>
            </div>
            <div class=\"ec-footerTitle__copyright\">copyright (c) {{ BaseInfo.shop_name }} all rights reserved.</div>
        </div>
    </div>
</div>", "Block/footer.twig", "/home/asa3150/www/ec-cube/html/app/template/default/Block/footer.twig");
    }
}
