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

/* Block/use_method.twig */
class __TwigTemplate_4bc1fe22a6fbc0e3c987c4c2ebb01718 extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/use_method.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/use_method.twig"));

        // line 1
        echo "<div class=\"container mt-5\">
        <h2 class=\"text-center mb-4\">レンタル利用方法</h2>
        <div class=\"row align-items-stretch justify-content-center g-0\">
            <!-- ステップ1 -->
            <div class=\"col-md-2 col-sm-12 mb-2 d-flex justify-content-center\">
                <div class=\"card rental-card\" style=\"width: 15rem;border: none;\">
                    <img src=\"/html/user_data/assets/img/item_order.jpg\" class=\"card-img-top\" alt=\"ネットで注文\">
                    <div class=\"card-body\">
                        <h5 class=\"card-title\"><span class=\"text-primary\">01</span> ネットで注文</h5>
                        <p class=\"card-text\">プランやお届け日を選択したら注文完了！ご自宅に商品が届きます。</p>
                    </div>
                </div>
            </div>
            
            <!-- 矢印アイコン1 -->
            <div class=\"col-md-1 col-sm-12 mb-2 d-none d-md-flex align-items-center justify-content-center\">
                <i class=\"bi bi-caret-right fs-1 text-primary\"></i>
            </div>
            
            <!-- ステップ2 -->
            <div class=\"col-md-2 col-sm-12 mb-2 d-flex justify-content-center\">
                <div class=\"card rental-card\" style=\"width: 15rem;border: none;\">
                    <img src=\"/html/user_data/assets/img/item_use.jpg\" class=\"card-img-top\" alt=\"ご利用開始\">
                    <div class=\"card-body\">
                        <h5 class=\"card-title\"><span class=\"text-primary\">02</span> ご利用開始</h5>
                        <p class=\"card-text\">万が一の故障・破損の際も「トラブルあんしん宣言」でサポートします。</p>
                    </div>
                </div>
            </div>
            
            <!-- 矢印アイコン2 -->
            <div class=\"col-md-1 col-sm-12 mb-2 d-none d-md-flex align-items-center justify-content-center\">
                <i class=\"bi bi-caret-right fs-1 text-primary\"></i>
            </div>
            
            <!-- ステップ3 -->
            <div class=\"col-md-2 col-sm-12 mb-2 d-flex justify-content-center\">
                <div class=\"card rental-card\" style=\"width: 15rem;border: none;\">
                    <img src=\"/html/user_data/assets/img/item_back.jpg\" class=\"card-img-top\" alt=\"返送してレンタル終了\">
                    <div class=\"card-body\">
                        <h5 class=\"card-title\"><span class=\"text-primary\">03</span> 返送してレンタル終了</h5>
                        <p class=\"card-text\">返送するだけで自動的にレンタル終了までの手続きが進みます。</p>
                    </div>
                </div>
            </div>
        </div><!--row-->

        <h2 class=\"text-center mb-4 mt-2\">レンタルプラン</h2>
        <div class=\"row align-items-stretch justify-content-center g-0\">
            <!-- プラン1 -->
            <div class=\"col-md-2 col-sm-12 mb-2 d-flex justify-content-center\">
                <div class=\"card rental-card\" style=\"width: 15rem;border: none;\">
                    <img src=\"/html/user_data/assets/img/basic.jpg\" class=\"card-img-top\" alt=\"月額制プラン\">
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">月額制プラン</h5>
                        <p class=\"card-text\">継続的なレンタル利用にオススメのプランです。</p>
                    </div>
                </div>
            </div>
            
            <!-- 矢印アイコン -->
            <div class=\"col-md-1 col-sm-12 mb-2 d-none d-md-flex align-items-center justify-content-center\">
                <i class=\"bi bi-caret-right fs-1 text-primary\"></i>
            </div>
            
            <!-- プラン2 -->
            <div class=\"col-md-2 col-sm-12 mb-2 d-flex justify-content-center\">
                <div class=\"card rental-card\" style=\"width: 15rem;border: none;\">
                    <img src=\"/html/user_data/assets/img/gold.jpg\" class=\"card-img-top\" alt=\"ワンタイムプラン\">
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">ワンタイムプラン</h5>
                        <p class=\"card-text\">一時的なレンタル利用にオススメのプランです。</p>
                    </div>
                </div>
            </div>
        </div><!--row2-->
    </div><!--container-->";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "Block/use_method.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"container mt-5\">
        <h2 class=\"text-center mb-4\">レンタル利用方法</h2>
        <div class=\"row align-items-stretch justify-content-center g-0\">
            <!-- ステップ1 -->
            <div class=\"col-md-2 col-sm-12 mb-2 d-flex justify-content-center\">
                <div class=\"card rental-card\" style=\"width: 15rem;border: none;\">
                    <img src=\"/html/user_data/assets/img/item_order.jpg\" class=\"card-img-top\" alt=\"ネットで注文\">
                    <div class=\"card-body\">
                        <h5 class=\"card-title\"><span class=\"text-primary\">01</span> ネットで注文</h5>
                        <p class=\"card-text\">プランやお届け日を選択したら注文完了！ご自宅に商品が届きます。</p>
                    </div>
                </div>
            </div>
            
            <!-- 矢印アイコン1 -->
            <div class=\"col-md-1 col-sm-12 mb-2 d-none d-md-flex align-items-center justify-content-center\">
                <i class=\"bi bi-caret-right fs-1 text-primary\"></i>
            </div>
            
            <!-- ステップ2 -->
            <div class=\"col-md-2 col-sm-12 mb-2 d-flex justify-content-center\">
                <div class=\"card rental-card\" style=\"width: 15rem;border: none;\">
                    <img src=\"/html/user_data/assets/img/item_use.jpg\" class=\"card-img-top\" alt=\"ご利用開始\">
                    <div class=\"card-body\">
                        <h5 class=\"card-title\"><span class=\"text-primary\">02</span> ご利用開始</h5>
                        <p class=\"card-text\">万が一の故障・破損の際も「トラブルあんしん宣言」でサポートします。</p>
                    </div>
                </div>
            </div>
            
            <!-- 矢印アイコン2 -->
            <div class=\"col-md-1 col-sm-12 mb-2 d-none d-md-flex align-items-center justify-content-center\">
                <i class=\"bi bi-caret-right fs-1 text-primary\"></i>
            </div>
            
            <!-- ステップ3 -->
            <div class=\"col-md-2 col-sm-12 mb-2 d-flex justify-content-center\">
                <div class=\"card rental-card\" style=\"width: 15rem;border: none;\">
                    <img src=\"/html/user_data/assets/img/item_back.jpg\" class=\"card-img-top\" alt=\"返送してレンタル終了\">
                    <div class=\"card-body\">
                        <h5 class=\"card-title\"><span class=\"text-primary\">03</span> 返送してレンタル終了</h5>
                        <p class=\"card-text\">返送するだけで自動的にレンタル終了までの手続きが進みます。</p>
                    </div>
                </div>
            </div>
        </div><!--row-->

        <h2 class=\"text-center mb-4 mt-2\">レンタルプラン</h2>
        <div class=\"row align-items-stretch justify-content-center g-0\">
            <!-- プラン1 -->
            <div class=\"col-md-2 col-sm-12 mb-2 d-flex justify-content-center\">
                <div class=\"card rental-card\" style=\"width: 15rem;border: none;\">
                    <img src=\"/html/user_data/assets/img/basic.jpg\" class=\"card-img-top\" alt=\"月額制プラン\">
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">月額制プラン</h5>
                        <p class=\"card-text\">継続的なレンタル利用にオススメのプランです。</p>
                    </div>
                </div>
            </div>
            
            <!-- 矢印アイコン -->
            <div class=\"col-md-1 col-sm-12 mb-2 d-none d-md-flex align-items-center justify-content-center\">
                <i class=\"bi bi-caret-right fs-1 text-primary\"></i>
            </div>
            
            <!-- プラン2 -->
            <div class=\"col-md-2 col-sm-12 mb-2 d-flex justify-content-center\">
                <div class=\"card rental-card\" style=\"width: 15rem;border: none;\">
                    <img src=\"/html/user_data/assets/img/gold.jpg\" class=\"card-img-top\" alt=\"ワンタイムプラン\">
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">ワンタイムプラン</h5>
                        <p class=\"card-text\">一時的なレンタル利用にオススメのプランです。</p>
                    </div>
                </div>
            </div>
        </div><!--row2-->
    </div><!--container-->", "Block/use_method.twig", "/home/asa3150/www/ec-cube/html/app/template/default/Block/use_method.twig");
    }
}
