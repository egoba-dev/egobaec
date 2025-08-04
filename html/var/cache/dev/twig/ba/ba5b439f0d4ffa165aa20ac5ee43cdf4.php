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

/* Block/question_list.twig */
class __TwigTemplate_9faea11d090e8804234c6f0e32779614 extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/question_list.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/question_list.twig"));

        // line 7
        echo "
<style>
    .accordion-container {
        max-width: 800px;
        margin: 0 auto;
    }
    
    @media (max-width: 768px) {
        .accordion-container {
            margin: 0 15px;
        }
    }
    
    /* アコーディオンボタンのフォーカス時の青い枠線を削除 */
    .accordion-button:focus {
        box-shadow: none;
        border-color: inherit;
        outline: none;
    }
    
    /* ボタンクリック時のアクティブ状態の青いスタイルも削除 */
    .accordion-button:active {
        box-shadow: none;
    }
    
    /* アコーディオンアイテムのボーダーを確実に表示 */
    .accordion {
    border: 1px solid #dee2e6;
    border-radius: 0.375rem;
}

.accordion-item {
    border: none;
    border-bottom: 1px solid #dee2e6;
}

.accordion-item:last-child {
    border-bottom: none;
}
    
    /*.accordion-item {*/
    /*    border: 1px solid #dee2e6;*/
    /*    border-bottom: 0;*/
    /*}*/
    
    /*.accordion-item:last-child {*/
    /*    border-bottom: 1px solid #dee2e6;*/
    /*}*/
    
    /* スクロール時のオフセット調整（ヘッダーの高さ分） */
    #question-section {
        scroll-margin-top: 80px;
    }
</style>

<section id=\"question-section\" class=\"question-section\">
    <div class=\"container\">
        <h2 class=\"text-center mt-5 mb-5\">よくあるご質問</h2>
        <div class=\"accordion-container\">
            <div class=\"accordion\" id=\"accordionExample\">
                <div class=\"accordion-item\">
                    <h2 class=\"accordion-header\">
                        <button class=\"accordion-button\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseOne\" aria-expanded=\"true\" aria-controls=\"collapseOne\">
                            レンタル料金はいくらですか？
                        </button>
                    </h2>
                    <div id=\"collapseOne\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">
                        <div class=\"accordion-body\">
                            <strong>商品によって異なります。それぞれの商品ページで確認してみましょう！</strong>
                        </div>
                    </div>
                </div>

                <div class=\"accordion-item\">
                    <h2 class=\"accordion-header\">
                        <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseTwo\" aria-expanded=\"false\" aria-controls=\"collapseTwo\">
                            レンタルできる商品にはどんなものがありますか？
                        </button>
                    </h2>
                    <div id=\"collapseTwo\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">
                        <div class=\"accordion-body\">
                            <strong>カメラやビデオカメラ、家電製品、調理家電、ベビー用品、美容家電、オフィス機器など幅広いジャンルの商品を取り扱っています。</strong>
                        </div>
                    </div>
                </div>

                <div class=\"accordion-item\">
                    <h2 class=\"accordion-header\">
                        <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseThree\" aria-expanded=\"false\" aria-controls=\"collapseThree\">
                            レンタルの最短期間や最大期間は決まっていますか？
                        </button>
                    </h2>
                    <div id=\"collapseThree\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">
                        <div class=\"accordion-body\">
                            <strong>商品によって異なりますが、最短1日から選べるワンタイムプランと1ヶ月単位の月額制プランを用意しています。各商品ページでご希望のレンタル期間をご確認いただけます。</strong>
                        </div>
                    </div>
                </div>

                <div class=\"accordion-item\">
                    <h2 class=\"accordion-header\">
                        <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseFour\" aria-expanded=\"false\" aria-controls=\"collapseFour\">
                            レンタルした商品はいつ届きますか？
                        </button>
                    </h2>
                    <div id=\"collapseFour\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">
                        <div class=\"accordion-body\">
                            <strong>お届け日として指定できる最短の日付は、商品によって異なります。各商品の詳細ページに表示されているカレンダーをご確認ください。<br><br>
                            在庫のご用意がある場合は、当日の17:00まで、翌日の日付をお届け予定日に指定して注文することが可能です。<br><br>
                            翌日の日付をお届け予定日に指定されたご注文については、商品が予定通り到着するよう、当日中に出荷の手続きがおこなわれます。<br><br>
                            ただし、お届け先が北海道、九州地方、広島県、島根県、山口県に該当する場合、最短で指定可能なお届け予定日は翌々日となります。</strong>
                        </div>
                    </div>
                </div>

                <div class=\"accordion-item\">
                    <h2 class=\"accordion-header\">
                        <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseFive\" aria-expanded=\"false\" aria-controls=\"collapseFive\">
                            商品の返却方法を教えてください。
                        </button>
                    </h2>
                    <div id=\"collapseFive\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">
                        <div class=\"accordion-body\">
                            <strong>返送の準備はすべてマイページで完了します。<br><br>
                            専用バーコードを表示してコンビニや街の宅配ロッカーでスマートに返送。<br><br>
                            もしご自宅まで商品を取りに来てもらいたければ訪問集荷をお申込み。<br><br>
                            これらの準備がすべてマイページ（注文履歴）からおこなえます。送り状のご用意は必要ありません。</strong>
                        </div>
                    </div>
                </div>

                <div class=\"accordion-item\">
                    <h2 class=\"accordion-header\">
                        <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseSix\" aria-expanded=\"false\" aria-controls=\"collapseSix\">
                            返送日のうちに商品がレンタルショップに届かなかったらどうなりますか？
                        </button>
                    </h2>
                    <div id=\"collapseSix\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">
                        <div class=\"accordion-body\">
                            <strong>返送日＝必着日ではありませんのでご安心ください。<br><br>
                            返送日（最終日）の24時までに、コンビニや配送業者の方に箱を渡して発送を済ませた時点でお客様側の返却手続きは完了となります。当日中にお手元から離れれば大丈夫です。<br><br>
                            返送日や更新日の日付に商品がレンティオに届く必要はありません。</strong>
                        </div>
                    </div>
                </div>

                <div class=\"accordion-item\">
                    <h2 class=\"accordion-header\">
                        <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseSeven\" aria-expanded=\"false\" aria-controls=\"collapseSeven\">
                            レンタルした商品が、破損・故障したらどうなりますか？
                        </button>
                    </h2>
                    <div id=\"collapseSeven\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">
                        <div class=\"accordion-body\">
                            <strong>利用方法に過失のない中での故障、破損については一切の費用請求はいたしません。<br><br>
                            落下など、お客様の過失による破損の場合は賠償費用として、都度2,000円を上限とした金額を申し受けます。<br><br>
                            故障発生時はまずはカスタマーサポートにご連絡ください。</strong>
                        </div>
                    </div>
                </div>

                <div class=\"accordion-item\">
                    <h2 class=\"accordion-header\">
                        <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEight\" aria-expanded=\"false\" aria-controls=\"collapseEight\">
                            支払い方法は何がありますか？
                        </button>
                    </h2>
                    <div id=\"collapseEight\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">
                        <div class=\"accordion-body\">
                            <strong>クレジットカード・後払い決済・Amazon Payをご利用いただけます。<br><br>
                            法人、個人事業主のお客様は請求書払い(掛け払い)もご利用可能です。</strong>
                        </div>
                    </div>
                </div>

                <div class=\"accordion-item\">
                    <h2 class=\"accordion-header\">
                        <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseNine\" aria-expanded=\"false\" aria-controls=\"collapseNine\">
                            法人利用・大量レンタルはできますか？
                        </button>
                    </h2>
                    <div id=\"collapseNine\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">
                        <div class=\"accordion-body\">
                            <strong>大量レンタル・法人のお客さまにもサービスを提供しております。<br><br>
                            法人向け担当者が個別にサポートいたします。1営業日以内にご対応可能ですので、法人様向け 注文に関するご相談フォームからお問い合わせください。</strong>
                        </div>
                    </div>
                </div>
            </div><!--accordion-->
        </div><!--accordion-container-->
    </div><!--container-->
</section>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "Block/question_list.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * よくあるご質問ブロック
 * question_list.twig
 */
#}

<style>
    .accordion-container {
        max-width: 800px;
        margin: 0 auto;
    }
    
    @media (max-width: 768px) {
        .accordion-container {
            margin: 0 15px;
        }
    }
    
    /* アコーディオンボタンのフォーカス時の青い枠線を削除 */
    .accordion-button:focus {
        box-shadow: none;
        border-color: inherit;
        outline: none;
    }
    
    /* ボタンクリック時のアクティブ状態の青いスタイルも削除 */
    .accordion-button:active {
        box-shadow: none;
    }
    
    /* アコーディオンアイテムのボーダーを確実に表示 */
    .accordion {
    border: 1px solid #dee2e6;
    border-radius: 0.375rem;
}

.accordion-item {
    border: none;
    border-bottom: 1px solid #dee2e6;
}

.accordion-item:last-child {
    border-bottom: none;
}
    
    /*.accordion-item {*/
    /*    border: 1px solid #dee2e6;*/
    /*    border-bottom: 0;*/
    /*}*/
    
    /*.accordion-item:last-child {*/
    /*    border-bottom: 1px solid #dee2e6;*/
    /*}*/
    
    /* スクロール時のオフセット調整（ヘッダーの高さ分） */
    #question-section {
        scroll-margin-top: 80px;
    }
</style>

<section id=\"question-section\" class=\"question-section\">
    <div class=\"container\">
        <h2 class=\"text-center mt-5 mb-5\">よくあるご質問</h2>
        <div class=\"accordion-container\">
            <div class=\"accordion\" id=\"accordionExample\">
                <div class=\"accordion-item\">
                    <h2 class=\"accordion-header\">
                        <button class=\"accordion-button\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseOne\" aria-expanded=\"true\" aria-controls=\"collapseOne\">
                            レンタル料金はいくらですか？
                        </button>
                    </h2>
                    <div id=\"collapseOne\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">
                        <div class=\"accordion-body\">
                            <strong>商品によって異なります。それぞれの商品ページで確認してみましょう！</strong>
                        </div>
                    </div>
                </div>

                <div class=\"accordion-item\">
                    <h2 class=\"accordion-header\">
                        <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseTwo\" aria-expanded=\"false\" aria-controls=\"collapseTwo\">
                            レンタルできる商品にはどんなものがありますか？
                        </button>
                    </h2>
                    <div id=\"collapseTwo\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">
                        <div class=\"accordion-body\">
                            <strong>カメラやビデオカメラ、家電製品、調理家電、ベビー用品、美容家電、オフィス機器など幅広いジャンルの商品を取り扱っています。</strong>
                        </div>
                    </div>
                </div>

                <div class=\"accordion-item\">
                    <h2 class=\"accordion-header\">
                        <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseThree\" aria-expanded=\"false\" aria-controls=\"collapseThree\">
                            レンタルの最短期間や最大期間は決まっていますか？
                        </button>
                    </h2>
                    <div id=\"collapseThree\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">
                        <div class=\"accordion-body\">
                            <strong>商品によって異なりますが、最短1日から選べるワンタイムプランと1ヶ月単位の月額制プランを用意しています。各商品ページでご希望のレンタル期間をご確認いただけます。</strong>
                        </div>
                    </div>
                </div>

                <div class=\"accordion-item\">
                    <h2 class=\"accordion-header\">
                        <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseFour\" aria-expanded=\"false\" aria-controls=\"collapseFour\">
                            レンタルした商品はいつ届きますか？
                        </button>
                    </h2>
                    <div id=\"collapseFour\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">
                        <div class=\"accordion-body\">
                            <strong>お届け日として指定できる最短の日付は、商品によって異なります。各商品の詳細ページに表示されているカレンダーをご確認ください。<br><br>
                            在庫のご用意がある場合は、当日の17:00まで、翌日の日付をお届け予定日に指定して注文することが可能です。<br><br>
                            翌日の日付をお届け予定日に指定されたご注文については、商品が予定通り到着するよう、当日中に出荷の手続きがおこなわれます。<br><br>
                            ただし、お届け先が北海道、九州地方、広島県、島根県、山口県に該当する場合、最短で指定可能なお届け予定日は翌々日となります。</strong>
                        </div>
                    </div>
                </div>

                <div class=\"accordion-item\">
                    <h2 class=\"accordion-header\">
                        <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseFive\" aria-expanded=\"false\" aria-controls=\"collapseFive\">
                            商品の返却方法を教えてください。
                        </button>
                    </h2>
                    <div id=\"collapseFive\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">
                        <div class=\"accordion-body\">
                            <strong>返送の準備はすべてマイページで完了します。<br><br>
                            専用バーコードを表示してコンビニや街の宅配ロッカーでスマートに返送。<br><br>
                            もしご自宅まで商品を取りに来てもらいたければ訪問集荷をお申込み。<br><br>
                            これらの準備がすべてマイページ（注文履歴）からおこなえます。送り状のご用意は必要ありません。</strong>
                        </div>
                    </div>
                </div>

                <div class=\"accordion-item\">
                    <h2 class=\"accordion-header\">
                        <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseSix\" aria-expanded=\"false\" aria-controls=\"collapseSix\">
                            返送日のうちに商品がレンタルショップに届かなかったらどうなりますか？
                        </button>
                    </h2>
                    <div id=\"collapseSix\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">
                        <div class=\"accordion-body\">
                            <strong>返送日＝必着日ではありませんのでご安心ください。<br><br>
                            返送日（最終日）の24時までに、コンビニや配送業者の方に箱を渡して発送を済ませた時点でお客様側の返却手続きは完了となります。当日中にお手元から離れれば大丈夫です。<br><br>
                            返送日や更新日の日付に商品がレンティオに届く必要はありません。</strong>
                        </div>
                    </div>
                </div>

                <div class=\"accordion-item\">
                    <h2 class=\"accordion-header\">
                        <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseSeven\" aria-expanded=\"false\" aria-controls=\"collapseSeven\">
                            レンタルした商品が、破損・故障したらどうなりますか？
                        </button>
                    </h2>
                    <div id=\"collapseSeven\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">
                        <div class=\"accordion-body\">
                            <strong>利用方法に過失のない中での故障、破損については一切の費用請求はいたしません。<br><br>
                            落下など、お客様の過失による破損の場合は賠償費用として、都度2,000円を上限とした金額を申し受けます。<br><br>
                            故障発生時はまずはカスタマーサポートにご連絡ください。</strong>
                        </div>
                    </div>
                </div>

                <div class=\"accordion-item\">
                    <h2 class=\"accordion-header\">
                        <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseEight\" aria-expanded=\"false\" aria-controls=\"collapseEight\">
                            支払い方法は何がありますか？
                        </button>
                    </h2>
                    <div id=\"collapseEight\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">
                        <div class=\"accordion-body\">
                            <strong>クレジットカード・後払い決済・Amazon Payをご利用いただけます。<br><br>
                            法人、個人事業主のお客様は請求書払い(掛け払い)もご利用可能です。</strong>
                        </div>
                    </div>
                </div>

                <div class=\"accordion-item\">
                    <h2 class=\"accordion-header\">
                        <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseNine\" aria-expanded=\"false\" aria-controls=\"collapseNine\">
                            法人利用・大量レンタルはできますか？
                        </button>
                    </h2>
                    <div id=\"collapseNine\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionExample\">
                        <div class=\"accordion-body\">
                            <strong>大量レンタル・法人のお客さまにもサービスを提供しております。<br><br>
                            法人向け担当者が個別にサポートいたします。1営業日以内にご対応可能ですので、法人様向け 注文に関するご相談フォームからお問い合わせください。</strong>
                        </div>
                    </div>
                </div>
            </div><!--accordion-->
        </div><!--accordion-container-->
    </div><!--container-->
</section>", "Block/question_list.twig", "/home/asa3150/www/ec-cube/html/app/template/default/Block/question_list.twig");
    }
}
