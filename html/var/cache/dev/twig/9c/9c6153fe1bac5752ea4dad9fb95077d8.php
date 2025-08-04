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

/* Block/maker_lineup.twig */
class __TwigTemplate_d0f5d37c285dd8e1249f55ffd3fdfc3d extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/maker_lineup.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/maker_lineup.twig"));

        // line 1
        echo "<div class=\"row mt-5\">
            <div class=\"col\">
                <a href=\"#\">
                <div class=\"card justify-content-center\">
                    
                    <img src=\"/html/user_data/assets/img/logo/sony_logo.png\" width=\"100%\" height=\"100%\">
                    
                </div>
                </a>
            </div>
            <div class=\"col\">
                <a href=\"#\">
                <div class=\"card\">
                    
                    <img src=\"/html/user_data/assets/img/logo/Panasonic_logo.png\" width=\"100%\" height=\"100%\">
                    
                </div>
                </a>
            </div>
            <div class=\"col\">
                <div class=\"card\">
                    
                    <img src=\"/html/user_data/assets/img/logo/Sharp_logo.png\" width=\"100%\" height=\"100%\">
                   
                </div>
            </div>
            <div class=\"col\">
                <a href=\"\">
                <div class=\"card\">
                    
                    <img src=\"/html/user_data/assets/img/logo/TOSHIBA_logo.png\" width=\"100%\" height=\"100%\">
                    
                </div>
                </a>
            </div>
        </div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "Block/maker_lineup.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"row mt-5\">
            <div class=\"col\">
                <a href=\"#\">
                <div class=\"card justify-content-center\">
                    
                    <img src=\"/html/user_data/assets/img/logo/sony_logo.png\" width=\"100%\" height=\"100%\">
                    
                </div>
                </a>
            </div>
            <div class=\"col\">
                <a href=\"#\">
                <div class=\"card\">
                    
                    <img src=\"/html/user_data/assets/img/logo/Panasonic_logo.png\" width=\"100%\" height=\"100%\">
                    
                </div>
                </a>
            </div>
            <div class=\"col\">
                <div class=\"card\">
                    
                    <img src=\"/html/user_data/assets/img/logo/Sharp_logo.png\" width=\"100%\" height=\"100%\">
                   
                </div>
            </div>
            <div class=\"col\">
                <a href=\"\">
                <div class=\"card\">
                    
                    <img src=\"/html/user_data/assets/img/logo/TOSHIBA_logo.png\" width=\"100%\" height=\"100%\">
                    
                </div>
                </a>
            </div>
        </div>", "Block/maker_lineup.twig", "/home/asa3150/www/ec-cube/html/app/template/default/Block/maker_lineup.twig");
    }
}
