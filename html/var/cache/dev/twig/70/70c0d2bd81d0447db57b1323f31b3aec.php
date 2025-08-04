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

/* Block/custom_header.twig */
class __TwigTemplate_f22b71acf7fb685e6e3d332dc293a367 extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/custom_header.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/custom_header.twig"));

        // line 7
        echo "
<style>
    .custom-header .navbar-nav .nav-link {
        text-align: center;
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
        color: #333;
        text-decoration: none;
    }
    
    .custom-header .navbar-nav .nav-link:hover {
        color: #0d6efd;
    }
    
    .custom-header .navbar-nav .nav-link img {
        display: block;
        margin: 0 auto 0.25rem;
    }
    
    .custom-header .border-right {
        border-right: 1px solid #dee2e6;
    }
    
    .custom-header .search-form {
        min-width: 250px;
    }
    
    .custom-header .search-form .form-control {
        height: 32px;
        font-size: 0.875rem;
    }
    
    .custom-header .search-form .btn {
        height: 32px;
        padding: 0.25rem 1rem;
        font-size: 0.875rem;
        white-space: nowrap;
        min-width: 60px;
    }
    
    @media (max-width: 991px) {
        .custom-header .navbar-nav {
            text-align: center;
        }
        
        .custom-header .search-form {
            min-width: 100%;
            margin-top: 1rem;
        }
    }
    
    /* スムーズスクロール */
    html {
        scroll-behavior: smooth;
    }
</style>

<script>
    function scrollToSection(sectionId) {
        const element = document.getElementById(sectionId);
        if (element) {
            // ヘッダーの高さを考慮してオフセット調整
            const headerHeight = 80;
            const elementPosition = element.offsetTop - headerHeight;
            
            window.scrollTo({
                top: elementPosition,
                behavior: 'smooth'
            });
        }
    }
</script>

<nav class=\"navbar navbar-expand-lg bg-body-tertiary custom-header mt-3\">
    <div class=\"container-fluid\">
        <!-- ブランドロゴ -->
        <a class=\"navbar-brand\" href=\"";
        // line 83
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("homepage");
        echo "\">
            <img src=\"/html/user_data/assets/img/icon/logo.png\" alt=\"";
        // line 84
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["BaseInfo"]) || array_key_exists("BaseInfo", $context) ? $context["BaseInfo"] : (function () { throw new RuntimeError('Variable "BaseInfo" does not exist.', 84, $this->source); })()), "shop_name", [], "any", false, false, false, 84), "html", null, true);
        echo "\" width=\"30\" height=\"30\">
            ";
        // line 85
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["BaseInfo"]) || array_key_exists("BaseInfo", $context) ? $context["BaseInfo"] : (function () { throw new RuntimeError('Variable "BaseInfo" does not exist.', 85, $this->source); })()), "shop_name", [], "any", false, false, false, 85), "html", null, true);
        echo "
        </a>
        
        <!-- ハンバーガーメニュー（モバイル用） -->
        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#customNavbar\" aria-controls=\"customNavbar\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        
        <!-- ナビゲーションメニュー -->
        <div class=\"collapse navbar-collapse\" id=\"customNavbar\">
            <ul class=\"navbar-nav ms-auto\">
                ";
        // line 96
        if ( !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_USER")) {
            // line 97
            echo "                <li class=\"nav-item\">
                    <a class=\"nav-link border-right\" href=\"";
            // line 98
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("entry");
            echo "\">
                        <img src=\"/html/user_data/assets/img/icon/signin.png\" width=\"30\" height=\"30\" alt=\"新規会員登録\">
                        ";
            // line 100
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("新規会員登録"), "html", null, true);
            echo "
                    </a>
                </li>
                ";
        }
        // line 104
        echo "                
                <li class=\"nav-item\">
                    <a class=\"nav-link border-right\" href=\"#question-section\" onclick=\"scrollToSection('question-section')\">
                        <img src=\"/html/user_data/assets/img/icon/question.png\" width=\"30\" height=\"30\" alt=\"Q&A\">
                        ";
        // line 108
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Q＆A"), "html", null, true);
        echo "
                    </a>
                </li>
                
                <li class=\"nav-item\">
                    <a class=\"nav-link border-right\" href=\"";
        // line 113
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("mypage_favorite");
        echo "\">
                        <img src=\"/html/user_data/assets/img/icon/favorite.png\" width=\"30\" height=\"30\" alt=\"お気に入り\">
                        ";
        // line 115
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("お気に入り"), "html", null, true);
        echo "
                    </a>
                </li>
                
                <li class=\"nav-item\">
                    ";
        // line 120
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_USER")) {
            // line 121
            echo "                        <a class=\"nav-link border-right\" href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("mypage");
            echo "\">
                            <img src=\"/html/user_data/assets/img/icon/login.png\" width=\"30\" height=\"30\" alt=\"マイページ\">
                            ";
            // line 123
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("マイページ"), "html", null, true);
            echo "
                        </a>
                    ";
        } else {
            // line 126
            echo "                        <a class=\"nav-link border-right\" href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("mypage_login");
            echo "\">
                            <img src=\"/html/user_data/assets/img/icon/login.png\" width=\"30\" height=\"30\" alt=\"ログイン\">
                            ";
            // line 128
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("ログイン"), "html", null, true);
            echo "
                        </a>
                    ";
        }
        // line 131
        echo "                </li>
                
                <li class=\"nav-item\">
                    <a class=\"nav-link border-right\" href=\"";
        // line 134
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("cart");
        echo "\">
                        <img src=\"/html/user_data/assets/img/icon/cart.png\" width=\"30\" height=\"30\" alt=\"カート\">
                        ";
        // line 136
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("カート"), "html", null, true);
        echo "
                    </a>
                </li>
                
                <li class=\"nav-item d-flex align-items-center m-3\">
                    <form class=\"d-flex search-form\" method=\"get\" action=\"";
        // line 141
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("product_list");
        echo "\" role=\"search\">
                        <input class=\"form-control me-2\" type=\"search\" name=\"name\" placeholder=\"";
        // line 142
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("商品名・キーワード"), "html", null, true);
        echo "\" aria-label=\"search\" value=\"";
        echo twig_escape_filter($this->env, ((array_key_exists("search_word", $context)) ? (_twig_default_filter((isset($context["search_word"]) || array_key_exists("search_word", $context) ? $context["search_word"] : (function () { throw new RuntimeError('Variable "search_word" does not exist.', 142, $this->source); })()), "")) : ("")), "html", null, true);
        echo "\">
                        <button class=\"btn btn-outline-secondary\" type=\"submit\">";
        // line 143
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("検索"), "html", null, true);
        echo "</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "Block/custom_header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  241 => 143,  235 => 142,  231 => 141,  223 => 136,  218 => 134,  213 => 131,  207 => 128,  201 => 126,  195 => 123,  189 => 121,  187 => 120,  179 => 115,  174 => 113,  166 => 108,  160 => 104,  153 => 100,  148 => 98,  145 => 97,  143 => 96,  129 => 85,  125 => 84,  121 => 83,  43 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * カスタムヘッダーブロック
 * custom_header.twig
 */
#}

<style>
    .custom-header .navbar-nav .nav-link {
        text-align: center;
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
        color: #333;
        text-decoration: none;
    }
    
    .custom-header .navbar-nav .nav-link:hover {
        color: #0d6efd;
    }
    
    .custom-header .navbar-nav .nav-link img {
        display: block;
        margin: 0 auto 0.25rem;
    }
    
    .custom-header .border-right {
        border-right: 1px solid #dee2e6;
    }
    
    .custom-header .search-form {
        min-width: 250px;
    }
    
    .custom-header .search-form .form-control {
        height: 32px;
        font-size: 0.875rem;
    }
    
    .custom-header .search-form .btn {
        height: 32px;
        padding: 0.25rem 1rem;
        font-size: 0.875rem;
        white-space: nowrap;
        min-width: 60px;
    }
    
    @media (max-width: 991px) {
        .custom-header .navbar-nav {
            text-align: center;
        }
        
        .custom-header .search-form {
            min-width: 100%;
            margin-top: 1rem;
        }
    }
    
    /* スムーズスクロール */
    html {
        scroll-behavior: smooth;
    }
</style>

<script>
    function scrollToSection(sectionId) {
        const element = document.getElementById(sectionId);
        if (element) {
            // ヘッダーの高さを考慮してオフセット調整
            const headerHeight = 80;
            const elementPosition = element.offsetTop - headerHeight;
            
            window.scrollTo({
                top: elementPosition,
                behavior: 'smooth'
            });
        }
    }
</script>

<nav class=\"navbar navbar-expand-lg bg-body-tertiary custom-header mt-3\">
    <div class=\"container-fluid\">
        <!-- ブランドロゴ -->
        <a class=\"navbar-brand\" href=\"{{ url('homepage') }}\">
            <img src=\"/html/user_data/assets/img/icon/logo.png\" alt=\"{{ BaseInfo.shop_name }}\" width=\"30\" height=\"30\">
            {{ BaseInfo.shop_name }}
        </a>
        
        <!-- ハンバーガーメニュー（モバイル用） -->
        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#customNavbar\" aria-controls=\"customNavbar\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        
        <!-- ナビゲーションメニュー -->
        <div class=\"collapse navbar-collapse\" id=\"customNavbar\">
            <ul class=\"navbar-nav ms-auto\">
                {% if not is_granted('ROLE_USER') %}
                <li class=\"nav-item\">
                    <a class=\"nav-link border-right\" href=\"{{ url('entry') }}\">
                        <img src=\"/html/user_data/assets/img/icon/signin.png\" width=\"30\" height=\"30\" alt=\"新規会員登録\">
                        {{ '新規会員登録'|trans }}
                    </a>
                </li>
                {% endif %}
                
                <li class=\"nav-item\">
                    <a class=\"nav-link border-right\" href=\"#question-section\" onclick=\"scrollToSection('question-section')\">
                        <img src=\"/html/user_data/assets/img/icon/question.png\" width=\"30\" height=\"30\" alt=\"Q&A\">
                        {{'Q＆A'|trans}}
                    </a>
                </li>
                
                <li class=\"nav-item\">
                    <a class=\"nav-link border-right\" href=\"{{ url('mypage_favorite') }}\">
                        <img src=\"/html/user_data/assets/img/icon/favorite.png\" width=\"30\" height=\"30\" alt=\"お気に入り\">
                        {{ 'お気に入り'|trans }}
                    </a>
                </li>
                
                <li class=\"nav-item\">
                    {% if is_granted('ROLE_USER') %}
                        <a class=\"nav-link border-right\" href=\"{{ url('mypage') }}\">
                            <img src=\"/html/user_data/assets/img/icon/login.png\" width=\"30\" height=\"30\" alt=\"マイページ\">
                            {{ 'マイページ'|trans }}
                        </a>
                    {% else %}
                        <a class=\"nav-link border-right\" href=\"{{ url('mypage_login') }}\">
                            <img src=\"/html/user_data/assets/img/icon/login.png\" width=\"30\" height=\"30\" alt=\"ログイン\">
                            {{ 'ログイン'|trans }}
                        </a>
                    {% endif %}
                </li>
                
                <li class=\"nav-item\">
                    <a class=\"nav-link border-right\" href=\"{{ url('cart') }}\">
                        <img src=\"/html/user_data/assets/img/icon/cart.png\" width=\"30\" height=\"30\" alt=\"カート\">
                        {{ 'カート'|trans }}
                    </a>
                </li>
                
                <li class=\"nav-item d-flex align-items-center m-3\">
                    <form class=\"d-flex search-form\" method=\"get\" action=\"{{ url('product_list') }}\" role=\"search\">
                        <input class=\"form-control me-2\" type=\"search\" name=\"name\" placeholder=\"{{ '商品名・キーワード'|trans }}\" aria-label=\"search\" value=\"{{ search_word|default('') }}\">
                        <button class=\"btn btn-outline-secondary\" type=\"submit\">{{ '検索'|trans }}</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>", "Block/custom_header.twig", "/home/asa3150/www/ec-cube/html/app/template/default/Block/custom_header.twig");
    }
}
