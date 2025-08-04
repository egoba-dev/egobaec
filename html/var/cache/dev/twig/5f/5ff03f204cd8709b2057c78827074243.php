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

/* Block/custom_footer.twig */
class __TwigTemplate_b443cbc334e9c34223d28a9f941d62b4 extends \Eccube\Twig\Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/custom_footer.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Block/custom_footer.twig"));

        // line 6
        echo "
<style>
    .footer {
        background-color: #f8f9fa;
        padding: 50px 0;
        color: #666;
    }
    .footer-column h5 {
        color: #333;
        font-weight: bold;
        margin-bottom: 20px;
        font-size: 16px;
    }
    .footer-column ul {
        list-style: none;
        padding: 0;
    }
    .footer-column ul li {
        margin-bottom: 10px;
    }
    .footer-column ul li a {
        color: #666;
        text-decoration: none;
        font-size: 14px;
        transition: color 0.3s;
    }
    .footer-column ul li a:hover {
        color: #007bff;
    }
    .payment-methods {
        margin-top: 10px;
    }
    .payment-methods img {
        height: 25px;
        margin-right: 5px;
        margin-bottom: 5px;
    }
    .business-inquiry {
        padding: 20px 0;
        margin-top: 30px;
    }
    .business-inquiry h6 {
        font-size: 14px;
        margin-bottom: 10px;
    }
    h6 {
        margin-top: 20px;
        font-weight: bold;
    }
    .business-inquiry p {
        font-size: 12px;
        margin: 0;
    }
    .container p {
        margin-top: 20px;
        margin-bottom: 30px;
    }
</style>

<footer class=\"footer\">
    <div class=\"container\">
        <div class=\"row\">
            <!-- 1列目: 当社について -->
            <div class=\"col-lg-3 col-md-6 footer-column\">
                <h5>当社について</h5>
                <ul>
                    <li><a href=\"#\">当サイトはじめてガイド</a></li>
                    <li><a href=\"#\">商品の返送方法</a></li>
                    <li><a href=\"#\">公式クーポン・キャンペーン</a></li>
                    <li><a href=\"#\">当社のそのまま購入</a></li>
                    <li><a href=\"#\">お客様の評価</a></li>
                    <li><a href=\"#\">公式メディア Press</a></li>
                    <li><a href=\"#\">運営会社</a></li>
                    <li><a href=\"#\">取材・メディア掲載のお問い合わせ</a></li>
                </ul>
            </div>

            <!-- 2列目: カスタマーサポート -->
            <div class=\"col-lg-3 col-md-6 footer-column\">
                <h5>カスタマーサポート</h5>
                <ul>
                    <li><a href=\"#\">お支払い方法</a></li>
                    <li><a href=\"#\">お届けについて(送料/日時指定)</a></li>
                    <li><a href=\"#\">トラブルあんしん宣言</a></li>
                    <li><a href=\"#\">レンタル品の購入</a></li>
                    <li><a href=\"#\">よくあるご質問</a></li>
                </ul>
            </div>

            <!-- 3列目: お支払い方法 -->
            <div class=\"col-lg-3 col-md-6 footer-column\">
                <h5>お支払い方法</h5>
                <div class=\"payment-methods\">
                    <img src=\"https://via.placeholder.com/40x25/4169E1/FFFFFF?text=VISA\" alt=\"VISA\">
                    <img src=\"https://via.placeholder.com/40x25/FF5F00/FFFFFF?text=MC\" alt=\"MasterCard\">
                    <img src=\"https://via.placeholder.com/40x25/DC143C/FFFFFF?text=JCB\" alt=\"JCB\">
                    <img src=\"https://via.placeholder.com/40x25/006FCF/FFFFFF?text=AMEX\" alt=\"American Express\">
                    <img src=\"https://via.placeholder.com/40x25/000000/FFFFFF?text=DC\" alt=\"Diners Club\">
                    <br>
                    <img src=\"https://via.placeholder.com/80x25/FF9500/FFFFFF?text=Amazon+Pay\" alt=\"Amazon Pay\">
                </div>
                <ul style=\"margin-top: 20px;\">
                    <li>クレジットカード</li>
                    <li>後払い(コンビニ・郵便局・銀行)</li>
                    <li>Amazon Pay</li>
                    <li>請求書払い(法人のお客様専用)</li>
                </ul>
            </div>

            <!-- 4列目: レンタルビジネスをご検討の方へ -->
            <div class=\"col-lg-3 col-md-6 footer-column\">
                <h5>レンタルビジネスをご検討の方へ</h5>
                <ul>
                    <li><a href=\"#\">サプライヤー向けサービス</a></li>
                    <li><a href=\"#\">レンタルECサイト構築プラットフォーム</a></li>
                    <li><a href=\"#\">当社への商品掲載</a></li>
                    <li><a href=\"#\">マーケティングサービス</a></li>
                    <li><a href=\"#\">販促キャンペーン施策</a></li>
                    <li><a href=\"#\">アンケート調査</a></li>
                </ul>
                
                <h5 style=\"margin-top: 30px;\">お役立ち情報</h5>
                <ul>
                    <li><a href=\"#\">ウェビナー</a></li>
                    <li><a href=\"#\">当社コラム</a></li>
                    <li><a href=\"#\">調査レポート</a></li>
                    <li><a href=\"#\">最新事例紹介</a></li>
                    <li><a href=\"#\">ビジネス活用事例インタビュー</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- 法人向け問い合わせセクション -->
    <div class=\"container border-top\">
        <div class=\"row mt-4\">
            <div class=\"col-12\">
                <h6>法人のお客様・まとまった数量が必要な方へ</h6>
                <p>10台〜100台以上の大量発注もお任せください。法人向け担当者が個別にサポートいたします。</p>
            </div>
        </div>
    </div>

    <!-- お届けについてセクション -->
    <div class=\"container border-top\">
        <div class=\"row mt-1\">
            <div class=\"col-12\">
                <h6>お届けについて</h6>
                <p>レンタル料金は往復送料込みの金額です。最短翌日配達、お届け日時指定も可能です。</p>
                <h6>お客様専用お問い合わせ窓口</h6>
                <p>お問い合わせにはメール、チャット、電話でご対応いたします。</p>
                <p>お気軽にお問い合わせください（年中無休 11:00〜17:00）</p>
                <h6>事業者・メディアの方向け お問い合わせ窓口</h6>
                <p>広告・サービスのご提案、事業提携・製品取扱のご相談、取材・メディア掲載に関するご質問などはこちらからお問い合わせください。</p>
            </div>
        </div>
    </div>

    <!-- 会社概要セクション -->
    <div class=\"container border-top\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h6>当社 - カメラ、家電、ガジェットのレンタルを全品往復送料無料で。</h6>
                <p>カメラのレンタル、家電のお試しなら当社にお任せください！ミラーレス一眼カメラや交換レンズ、GoPro、360度カメラなどのアクションカメラ、運動会におすすめのビデオカメラ、旅行におすすめの防水カメラを往復送料無料でご利用できます。ライブ・コンサートを楽しむ双眼鏡、結婚式・二次会で活躍するチェキのレンタルも格安価格で提供しています。ワイヤレスイヤホンやスマートロックなど最新ガジェットもお試しできます。法人レンタルのニーズも高いノートパソコンと周辺機器のプリンターやキーボードをはじめWi-Fiルーター、スマホやプロジェクターや空気清浄機は月額制でレンタルも可能です。ルンバなどのロボット掃除機やダイソンをはじめとしたコードレス掃除機といった掃除家電も買う前に試せます。ヘアドライヤーや美顔器などの美容家電、ホットクックや食洗機、オーブンレンジ、コーヒーメーカーなどのキッチン家電はサブスク利用も。季節家電の扇風機・ヒーター、高圧洗浄機などの生活家電、子供の成長に合わせたベビーカーやベビーラックなどのベビー用品は必要な期間だけお得に使えます。キャンプ用品やポータブル電源、スーツケースの取り扱いもあります。東京、神奈川、埼玉だけでなく愛知、大阪、北海道、九州でも日本全国全品往復送料無料。さらに在庫のある商品は17時までの注文で最短翌日配達。電話やチャットでも問い合わせできるので、安心してご利用いただけます。</p>
            </div>
        </div>
    </div>

    <!-- 情報セキュリティセクション -->
    <div class=\"container border-top\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h6>情報セキュリティ方針について</h6>
                <p>当社は情報セキュリティ管理体制強化の一環としてISMS認証を取得しています。</p>
            </div>
        </div>
    </div>

    <!-- 採用情報セクション -->
    <div class=\"container border-top\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h6>採用情報</h6>
                <p>カスタマーサポート、物流、メンテナンス、セールス、デザイナー、広報、ライター、マーケター、データアナリスト、人事、経理、法務の募集について</p>
                <p>エンジニア、プロダクトマネージャーの募集について</p>
                <p>※時期により一部の職種では募集をおこなっていない場合もございます。</p>
            </div>
        </div>
    </div>

    <!-- ブランド名セクション -->
    <div class=\"container border-top\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h4 class=\"text-center\">レンタルサービス</h4>
            </div>
        </div>
    </div>
</footer>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "Block/custom_footer.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 6,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * フッターブロック
 */
#}

<style>
    .footer {
        background-color: #f8f9fa;
        padding: 50px 0;
        color: #666;
    }
    .footer-column h5 {
        color: #333;
        font-weight: bold;
        margin-bottom: 20px;
        font-size: 16px;
    }
    .footer-column ul {
        list-style: none;
        padding: 0;
    }
    .footer-column ul li {
        margin-bottom: 10px;
    }
    .footer-column ul li a {
        color: #666;
        text-decoration: none;
        font-size: 14px;
        transition: color 0.3s;
    }
    .footer-column ul li a:hover {
        color: #007bff;
    }
    .payment-methods {
        margin-top: 10px;
    }
    .payment-methods img {
        height: 25px;
        margin-right: 5px;
        margin-bottom: 5px;
    }
    .business-inquiry {
        padding: 20px 0;
        margin-top: 30px;
    }
    .business-inquiry h6 {
        font-size: 14px;
        margin-bottom: 10px;
    }
    h6 {
        margin-top: 20px;
        font-weight: bold;
    }
    .business-inquiry p {
        font-size: 12px;
        margin: 0;
    }
    .container p {
        margin-top: 20px;
        margin-bottom: 30px;
    }
</style>

<footer class=\"footer\">
    <div class=\"container\">
        <div class=\"row\">
            <!-- 1列目: 当社について -->
            <div class=\"col-lg-3 col-md-6 footer-column\">
                <h5>当社について</h5>
                <ul>
                    <li><a href=\"#\">当サイトはじめてガイド</a></li>
                    <li><a href=\"#\">商品の返送方法</a></li>
                    <li><a href=\"#\">公式クーポン・キャンペーン</a></li>
                    <li><a href=\"#\">当社のそのまま購入</a></li>
                    <li><a href=\"#\">お客様の評価</a></li>
                    <li><a href=\"#\">公式メディア Press</a></li>
                    <li><a href=\"#\">運営会社</a></li>
                    <li><a href=\"#\">取材・メディア掲載のお問い合わせ</a></li>
                </ul>
            </div>

            <!-- 2列目: カスタマーサポート -->
            <div class=\"col-lg-3 col-md-6 footer-column\">
                <h5>カスタマーサポート</h5>
                <ul>
                    <li><a href=\"#\">お支払い方法</a></li>
                    <li><a href=\"#\">お届けについて(送料/日時指定)</a></li>
                    <li><a href=\"#\">トラブルあんしん宣言</a></li>
                    <li><a href=\"#\">レンタル品の購入</a></li>
                    <li><a href=\"#\">よくあるご質問</a></li>
                </ul>
            </div>

            <!-- 3列目: お支払い方法 -->
            <div class=\"col-lg-3 col-md-6 footer-column\">
                <h5>お支払い方法</h5>
                <div class=\"payment-methods\">
                    <img src=\"https://via.placeholder.com/40x25/4169E1/FFFFFF?text=VISA\" alt=\"VISA\">
                    <img src=\"https://via.placeholder.com/40x25/FF5F00/FFFFFF?text=MC\" alt=\"MasterCard\">
                    <img src=\"https://via.placeholder.com/40x25/DC143C/FFFFFF?text=JCB\" alt=\"JCB\">
                    <img src=\"https://via.placeholder.com/40x25/006FCF/FFFFFF?text=AMEX\" alt=\"American Express\">
                    <img src=\"https://via.placeholder.com/40x25/000000/FFFFFF?text=DC\" alt=\"Diners Club\">
                    <br>
                    <img src=\"https://via.placeholder.com/80x25/FF9500/FFFFFF?text=Amazon+Pay\" alt=\"Amazon Pay\">
                </div>
                <ul style=\"margin-top: 20px;\">
                    <li>クレジットカード</li>
                    <li>後払い(コンビニ・郵便局・銀行)</li>
                    <li>Amazon Pay</li>
                    <li>請求書払い(法人のお客様専用)</li>
                </ul>
            </div>

            <!-- 4列目: レンタルビジネスをご検討の方へ -->
            <div class=\"col-lg-3 col-md-6 footer-column\">
                <h5>レンタルビジネスをご検討の方へ</h5>
                <ul>
                    <li><a href=\"#\">サプライヤー向けサービス</a></li>
                    <li><a href=\"#\">レンタルECサイト構築プラットフォーム</a></li>
                    <li><a href=\"#\">当社への商品掲載</a></li>
                    <li><a href=\"#\">マーケティングサービス</a></li>
                    <li><a href=\"#\">販促キャンペーン施策</a></li>
                    <li><a href=\"#\">アンケート調査</a></li>
                </ul>
                
                <h5 style=\"margin-top: 30px;\">お役立ち情報</h5>
                <ul>
                    <li><a href=\"#\">ウェビナー</a></li>
                    <li><a href=\"#\">当社コラム</a></li>
                    <li><a href=\"#\">調査レポート</a></li>
                    <li><a href=\"#\">最新事例紹介</a></li>
                    <li><a href=\"#\">ビジネス活用事例インタビュー</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- 法人向け問い合わせセクション -->
    <div class=\"container border-top\">
        <div class=\"row mt-4\">
            <div class=\"col-12\">
                <h6>法人のお客様・まとまった数量が必要な方へ</h6>
                <p>10台〜100台以上の大量発注もお任せください。法人向け担当者が個別にサポートいたします。</p>
            </div>
        </div>
    </div>

    <!-- お届けについてセクション -->
    <div class=\"container border-top\">
        <div class=\"row mt-1\">
            <div class=\"col-12\">
                <h6>お届けについて</h6>
                <p>レンタル料金は往復送料込みの金額です。最短翌日配達、お届け日時指定も可能です。</p>
                <h6>お客様専用お問い合わせ窓口</h6>
                <p>お問い合わせにはメール、チャット、電話でご対応いたします。</p>
                <p>お気軽にお問い合わせください（年中無休 11:00〜17:00）</p>
                <h6>事業者・メディアの方向け お問い合わせ窓口</h6>
                <p>広告・サービスのご提案、事業提携・製品取扱のご相談、取材・メディア掲載に関するご質問などはこちらからお問い合わせください。</p>
            </div>
        </div>
    </div>

    <!-- 会社概要セクション -->
    <div class=\"container border-top\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h6>当社 - カメラ、家電、ガジェットのレンタルを全品往復送料無料で。</h6>
                <p>カメラのレンタル、家電のお試しなら当社にお任せください！ミラーレス一眼カメラや交換レンズ、GoPro、360度カメラなどのアクションカメラ、運動会におすすめのビデオカメラ、旅行におすすめの防水カメラを往復送料無料でご利用できます。ライブ・コンサートを楽しむ双眼鏡、結婚式・二次会で活躍するチェキのレンタルも格安価格で提供しています。ワイヤレスイヤホンやスマートロックなど最新ガジェットもお試しできます。法人レンタルのニーズも高いノートパソコンと周辺機器のプリンターやキーボードをはじめWi-Fiルーター、スマホやプロジェクターや空気清浄機は月額制でレンタルも可能です。ルンバなどのロボット掃除機やダイソンをはじめとしたコードレス掃除機といった掃除家電も買う前に試せます。ヘアドライヤーや美顔器などの美容家電、ホットクックや食洗機、オーブンレンジ、コーヒーメーカーなどのキッチン家電はサブスク利用も。季節家電の扇風機・ヒーター、高圧洗浄機などの生活家電、子供の成長に合わせたベビーカーやベビーラックなどのベビー用品は必要な期間だけお得に使えます。キャンプ用品やポータブル電源、スーツケースの取り扱いもあります。東京、神奈川、埼玉だけでなく愛知、大阪、北海道、九州でも日本全国全品往復送料無料。さらに在庫のある商品は17時までの注文で最短翌日配達。電話やチャットでも問い合わせできるので、安心してご利用いただけます。</p>
            </div>
        </div>
    </div>

    <!-- 情報セキュリティセクション -->
    <div class=\"container border-top\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h6>情報セキュリティ方針について</h6>
                <p>当社は情報セキュリティ管理体制強化の一環としてISMS認証を取得しています。</p>
            </div>
        </div>
    </div>

    <!-- 採用情報セクション -->
    <div class=\"container border-top\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h6>採用情報</h6>
                <p>カスタマーサポート、物流、メンテナンス、セールス、デザイナー、広報、ライター、マーケター、データアナリスト、人事、経理、法務の募集について</p>
                <p>エンジニア、プロダクトマネージャーの募集について</p>
                <p>※時期により一部の職種では募集をおこなっていない場合もございます。</p>
            </div>
        </div>
    </div>

    <!-- ブランド名セクション -->
    <div class=\"container border-top\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h4 class=\"text-center\">レンタルサービス</h4>
            </div>
        </div>
    </div>
</footer>", "Block/custom_footer.twig", "/home/asa3150/www/ec-cube/html/app/template/default/Block/custom_footer.twig");
    }
}
