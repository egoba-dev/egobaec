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

/* Block/custom_advertisement.twig */
class __TwigTemplate_779daebc968e2757997a5cd57b067143 extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/custom_advertisement.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/custom_advertisement.twig"));

        // line 13
        echo "
<div class=\"row mt-4\">
    
    <div class=\"col-md-6 col-12 mb-3\"><a href=\"";
        // line 16
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("entry");
        echo "\">
        <div class=\"card h-100\" style=\"border-radius: 30px; overflow: hidden;\">
            <img src=\"/html/user_data/assets/img/member_registration.png\" class=\"card-img\" alt=\"長期利用向け商品の画像\">
            <div class=\"card-img-overlay d-flex flex-column justify-content-end\">
                <p class=\"card-text mb-1\">
                    ";
        // line 22
        echo "                    ";
        // line 23
        echo "                </p>
                ";
        // line 25
        echo "                ";
        // line 26
        echo "                ";
        // line 27
        echo "                ";
        // line 28
        echo "                ";
        // line 29
        echo "                ";
        // line 30
        echo "                ";
        // line 31
        echo "                ";
        // line 32
        echo "            </div>
        </a>
        </div>
        
    </div>

    <div class=\"col-md-6 col-12 mb-3\">
        <div class=\"card h-100\" style=\"border-radius: 30px; overflow: hidden;\">
            <img src=\"/html/user_data/assets/img/line_ad.png\" class=\"card-img\" alt=\"LINE広告\">
            <div class=\"card-img-overlay d-flex flex-column justify-content-end\">
                <p class=\"card-text mb-1\">
                    ";
        // line 44
        echo "                </p>
                ";
        // line 46
        echo "                ";
        // line 47
        echo "                ";
        // line 48
        echo "                ";
        // line 49
        echo "                <p class=\"card-text mb-0\">
                    <a href=\"https://demo-rental-eccube.sakuraweb.com/user_data/line_ad_detail\" class=\"text-decoration-none\">
                        今すぐチェック <i class=\"fas fa-chevron-right\"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "Block/custom_advertisement.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 49,  95 => 48,  93 => 47,  91 => 46,  88 => 44,  75 => 32,  73 => 31,  71 => 30,  69 => 29,  67 => 28,  65 => 27,  63 => 26,  61 => 25,  58 => 23,  56 => 22,  48 => 16,  43 => 13,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
#}

<div class=\"row mt-4\">
    
    <div class=\"col-md-6 col-12 mb-3\"><a href=\"{{ url('entry') }}\">
        <div class=\"card h-100\" style=\"border-radius: 30px; overflow: hidden;\">
            <img src=\"/html/user_data/assets/img/member_registration.png\" class=\"card-img\" alt=\"長期利用向け商品の画像\">
            <div class=\"card-img-overlay d-flex flex-column justify-content-end\">
                <p class=\"card-text mb-1\">
                    {#<small class=\"badge bg-primary\">注目</small>#}
                    {#レンタルサービス#}
                </p>
                {#<h2 class=\"card-title h4 mb-2\">#}
                {#    まずは会員登録！#}
                {#</h2>#}
                {#<p class=\"card-text mb-0\">#}
                {#    <a href=\"{{ url('product_list') }}\" class=\"text-decoration-none\">#}
                {#        最短３０秒！無料でかんたん登録<i class=\"fas fa-chevron-right\"></i>#}
                {#    </a>#}
                {#</p>#}
            </div>
        </a>
        </div>
        
    </div>

    <div class=\"col-md-6 col-12 mb-3\">
        <div class=\"card h-100\" style=\"border-radius: 30px; overflow: hidden;\">
            <img src=\"/html/user_data/assets/img/line_ad.png\" class=\"card-img\" alt=\"LINE広告\">
            <div class=\"card-img-overlay d-flex flex-column justify-content-end\">
                <p class=\"card-text mb-1\">
                    {#<small class=\"badge bg-warning\">LINE</small>#}
                </p>
                {#<h3 class=\"card-title h4 mb-2\">#}
                {#    LINE登録で<br>#}
                {#    ５％オフクーポンプレゼント！#}
                {#</h3>#}
                <p class=\"card-text mb-0\">
                    <a href=\"https://demo-rental-eccube.sakuraweb.com/user_data/line_ad_detail\" class=\"text-decoration-none\">
                        今すぐチェック <i class=\"fas fa-chevron-right\"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>", "Block/custom_advertisement.twig", "/home/asa3150/www/ec-cube/html/app/template/default/Block/custom_advertisement.twig");
    }
}
