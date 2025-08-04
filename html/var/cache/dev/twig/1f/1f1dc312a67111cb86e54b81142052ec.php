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

/* Block/custom_campaign.twig */
class __TwigTemplate_830324dd0d80e35a91cdede3d7725669 extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/custom_campaign.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/custom_campaign.twig"));

        // line 13
        echo "
<div class=\"row mt-4\">
    <div class=\"col-md-6 col-12 mb-3\">
        <div class=\"card h-100\" style=\"border-radius: 30px; overflow: hidden;\">
            <img src=\"/html/user_data/assets/img/rumba_ad.png\" class=\"card-img\" alt=\"長期利用向け商品の画像\">
            <div class=\"card-img-overlay d-flex flex-column justify-content-end\">
                <p class=\"card-text mb-1\">
                    ";
        // line 21
        echo "                    
                </p>
                ";
        // line 24
        echo "                ";
        // line 25
        echo "                ";
        // line 26
        echo "                ";
        // line 27
        echo "                <p class=\"card-text mb-0\">
                    <a href=\"";
        // line 28
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_list");
        echo "?category_id=17\" class=\"text-decoration-none\">
                        レンタルははこちらから <i class=\"fas fa-chevron-right\"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>

    <div class=\"col-md-6 col-12 mb-3\">
        <a href=\"\">
        <div class=\"card h-100\" style=\"border-radius: 30px; overflow: hidden;\">
            <img src=\"/html/user_data/assets/img/robo_ad.png\" class=\"card-img\" alt=\"旅行用カメラレンタルの画像\">
            <div class=\"card-img-overlay d-flex flex-column justify-content-end\">
                <p class=\"card-text mb-1\">
                    ";
        // line 43
        echo "                </p>
                ";
        // line 45
        echo "                ";
        // line 46
        echo "                ";
        // line 47
        echo "                ";
        // line 48
        echo "                ";
        // line 49
        echo "                <p class=\"card-text mb-0\">
                    <a href=\"";
        // line 50
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_list");
        echo "?category_id=15\" class=\"text-decoration-none\">
                        レンタルはこちらから<i class=\"fas fa-chevron-right\"></i>
                    </a>
                </p>
            </div>
        </div>
    </div></a>
</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "Block/custom_campaign.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 50,  93 => 49,  91 => 48,  89 => 47,  87 => 46,  85 => 45,  82 => 43,  65 => 28,  62 => 27,  60 => 26,  58 => 25,  56 => 24,  52 => 21,  43 => 13,);
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
    <div class=\"col-md-6 col-12 mb-3\">
        <div class=\"card h-100\" style=\"border-radius: 30px; overflow: hidden;\">
            <img src=\"/html/user_data/assets/img/rumba_ad.png\" class=\"card-img\" alt=\"長期利用向け商品の画像\">
            <div class=\"card-img-overlay d-flex flex-column justify-content-end\">
                <p class=\"card-text mb-1\">
                    {#<small class=\"badge bg-primary\">７月２１日まで</small>#}
                    
                </p>
                {#<h3 class=\"card-title h4 mb-2\">#}
                {#    ルンバ　夏のキャンペーン中<br>#}
                {#    3ヶ月間最大３０％OFF!！#}
                {#</h3>#}
                <p class=\"card-text mb-0\">
                    <a href=\"{{ url('product_list') }}?category_id=17\" class=\"text-decoration-none\">
                        レンタルははこちらから <i class=\"fas fa-chevron-right\"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>

    <div class=\"col-md-6 col-12 mb-3\">
        <a href=\"\">
        <div class=\"card h-100\" style=\"border-radius: 30px; overflow: hidden;\">
            <img src=\"/html/user_data/assets/img/robo_ad.png\" class=\"card-img\" alt=\"旅行用カメラレンタルの画像\">
            <div class=\"card-img-overlay d-flex flex-column justify-content-end\">
                <p class=\"card-text mb-1\">
                    {#<small class=\"badge bg-warning\">注目！</small>#}
                </p>
                {#<h3 class=\"card-title h4 mb-2\">#}
                {#    Panasonic ROBO<br>#}
                {#    話題のロボットが<br>#}
                {#    今だけ５００円OFF!#}
                {#</h3>#}
                <p class=\"card-text mb-0\">
                    <a href=\"{{ url('product_list') }}?category_id=15\" class=\"text-decoration-none\">
                        レンタルはこちらから<i class=\"fas fa-chevron-right\"></i>
                    </a>
                </p>
            </div>
        </div>
    </div></a>
</div>", "Block/custom_campaign.twig", "/home/asa3150/www/ec-cube/html/app/template/default/Block/custom_campaign.twig");
    }
}
