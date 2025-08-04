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

/* Block/aplication_ad.twig */
class __TwigTemplate_87de3afb0d0353d9b2f992b7cd767a4b extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/aplication_ad.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/aplication_ad.twig"));

        // line 2
        echo "<style>
    
    /* リストの枠線を削除 */
    .custom-checklist {
        border: none !important;
    }
    
    .custom-checklist .list-group-item {
        border: none !important;
        background: transparent;
        padding-left: 2rem;
        position: relative;
    }
    
    /* チェックマークアイコンを追加 */
    .custom-checklist .list-group-item::before {
        content: \"✓\";
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        color: #28a745;
        font-weight: bold;
        font-size: 1.2em;
    }
    
    .android-icon::before{
        content: \"🤖\";
        color: white;
    }
    
    .iphone-icon::before{
        content: \"🍎\";
        color: white;
    }
    
    /* 横一杯の背景色セクション */
    .full-width-section {
        width: 100%;
        
        border-top: 1px solid #dee2e6; /* Bootstrap の --bs-border-color の代替 */
        padding: 3rem 0;
        margin-top: 3rem;
    }
</style>

<!-- 横一杯の背景色セクション -->
<section class=\"full-width-section\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col mx-auto d-block\">
                <img src=\"/html/user_data/assets/img/net_shopping.jpg\" class=\"mx-auto d-block\" alt=\"アプリイメージ画像\" style=\"width:60%;\">
            </div>
            <div class=\"col\">
                <h3>公式アプリでさらに便利に！</h3>
                <ol class=\"list-group custom-checklist mt-4\">
                    <li class=\"list-group-item\">毎回のログイン不要</li>
                    <li class=\"list-group-item\">出荷日や返却日をお知らせ</li>
                    <li class=\"list-group-item\">よく使う画面をアクセスしやすく</li>
                </ol>
                <div class=\"\">
                <button type=\"button\" class=\"btn btn-dark m-4 android-icon\">Android</button>
                <button type=\"button\" class=\"btn btn-dark m-4 iphone-icon\">Iphone</button>
                </div>
            </div>
        </div>
    </div>
</section>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "Block/aplication_ad.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# EC-CUBE ブロック用 Twigファイル #}
<style>
    
    /* リストの枠線を削除 */
    .custom-checklist {
        border: none !important;
    }
    
    .custom-checklist .list-group-item {
        border: none !important;
        background: transparent;
        padding-left: 2rem;
        position: relative;
    }
    
    /* チェックマークアイコンを追加 */
    .custom-checklist .list-group-item::before {
        content: \"✓\";
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        color: #28a745;
        font-weight: bold;
        font-size: 1.2em;
    }
    
    .android-icon::before{
        content: \"🤖\";
        color: white;
    }
    
    .iphone-icon::before{
        content: \"🍎\";
        color: white;
    }
    
    /* 横一杯の背景色セクション */
    .full-width-section {
        width: 100%;
        
        border-top: 1px solid #dee2e6; /* Bootstrap の --bs-border-color の代替 */
        padding: 3rem 0;
        margin-top: 3rem;
    }
</style>

<!-- 横一杯の背景色セクション -->
<section class=\"full-width-section\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col mx-auto d-block\">
                <img src=\"/html/user_data/assets/img/net_shopping.jpg\" class=\"mx-auto d-block\" alt=\"アプリイメージ画像\" style=\"width:60%;\">
            </div>
            <div class=\"col\">
                <h3>公式アプリでさらに便利に！</h3>
                <ol class=\"list-group custom-checklist mt-4\">
                    <li class=\"list-group-item\">毎回のログイン不要</li>
                    <li class=\"list-group-item\">出荷日や返却日をお知らせ</li>
                    <li class=\"list-group-item\">よく使う画面をアクセスしやすく</li>
                </ol>
                <div class=\"\">
                <button type=\"button\" class=\"btn btn-dark m-4 android-icon\">Android</button>
                <button type=\"button\" class=\"btn btn-dark m-4 iphone-icon\">Iphone</button>
                </div>
            </div>
        </div>
    </div>
</section>", "Block/aplication_ad.twig", "/home/asa3150/www/ec-cube/html/app/template/default/Block/aplication_ad.twig");
    }
}
