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

/* Block/header.twig */
class __TwigTemplate_09d38fe36b12651ec3d8d473b6e01b0f extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/header.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/header.twig"));

        // line 11
        echo "<div class=\"ec-headerNaviRole\">
    <div class=\"ec-headerNaviRole__left\">
        <div class=\"ec-headerNaviRole__search\">
        <h3><a href=\"";
        // line 14
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("homepage");
        echo "\">
        ";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["BaseInfo"]) || array_key_exists("BaseInfo", $context) ? $context["BaseInfo"] : (function () { throw new RuntimeError('Variable "BaseInfo" does not exist.', 15, $this->source); })()), "shop_name", [], "any", false, false, false, 15), "html", null, true);
        echo "
        </a>
        </h3>
        </div>
        <div >
            ";
        // line 20
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("block_search_product"));
        echo "
        </div>
        <div class=\"ec-headerRole__navSP\">
            ";
        // line 23
        echo twig_include($this->env, $context, "Block/nav_sp.twig");
        echo "
        </div>
    </div>
    <div class=\"ec-headerNaviRole__right\">
        
        <div class=\"ec-headerNaviRole__nav\">
            ";
        // line 29
        echo twig_include($this->env, $context, "Block/login.twig");
        echo "
        </div>
        <div class=\"ec-headerRole__cart\">
            ";
        // line 32
        echo twig_include($this->env, $context, "Block/cart.twig");
        echo "
        </div>
    </div>
</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "Block/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 32,  75 => 29,  66 => 23,  60 => 20,  52 => 15,  48 => 14,  43 => 11,);
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
<div class=\"ec-headerNaviRole\">
    <div class=\"ec-headerNaviRole__left\">
        <div class=\"ec-headerNaviRole__search\">
        <h3><a href=\"{{ url('homepage') }}\">
        {{ BaseInfo.shop_name }}
        </a>
        </h3>
        </div>
        <div >
            {{ render(path('block_search_product')) }}
        </div>
        <div class=\"ec-headerRole__navSP\">
            {{ include('Block/nav_sp.twig') }}
        </div>
    </div>
    <div class=\"ec-headerNaviRole__right\">
        
        <div class=\"ec-headerNaviRole__nav\">
            {{ include('Block/login.twig') }}
        </div>
        <div class=\"ec-headerRole__cart\">
            {{ include('Block/cart.twig') }}
        </div>
    </div>
</div>", "Block/header.twig", "/home/asa3150/www/ec-cube/html/app/template/default/Block/header.twig");
    }
}
