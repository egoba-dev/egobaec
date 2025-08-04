<?php
namespace Plugin\Rental\Controller\Front;

use Eccube\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Plugin\Rental\Repository\RentalOrderRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RentalMyPageController extends AbstractController
{
    /**
     * @var RentalOrderRepository
     */
    protected $rentalOrderRepository;

    /**
     * RentalMyPageController constructor.
     *
     * @param RentalOrderRepository $rentalOrderRepository
     */
    public function __construct(
        RentalOrderRepository $rentalOrderRepository
    ) {
        $this->rentalOrderRepository = $rentalOrderRepository;
    }

    /**
     * レンタル履歴一覧画面.
     *
     * @Route("/mypage/rental/history", name="mypage_rental_history")
     */
    public function index(Request $request)
    {
        $Customer = $this->getUser();
        
        // ログイン状態のチェック
        if (!$Customer) {
            return $this->redirectToRoute('mypage_login');
        }
        
        // 会員に紐づくレンタル注文を取得
        $RentalOrders = $this->rentalOrderRepository->findBy(
            ['Customer' => $Customer],
            ['id' => 'DESC']
        );
        
        // HTMLを直接生成
        $html = $this->generateHistoryHtml($RentalOrders);
        
        $response = new \Symfony\Component\HttpFoundation\Response($html);
        return $response;
    }

    /**
     * レンタル履歴一覧画面（シンプルパス）.
     *
     * @Route("/mypage/rental", name="mypage_rental")
     */
    public function indexSimple(Request $request)
    {
        return $this->index($request);
    }

    /**
     * レンタル履歴詳細画面.
     *
     * @Route("/mypage/rental/history/{id}", name="mypage_rental_history_detail", requirements={"id" = "\d+"})
     */
    public function detail(Request $request, $id)
    {
        $Customer = $this->getUser();
        
        // ログイン状態のチェック
        if (!$Customer) {
            return $this->redirectToRoute('mypage_login');
        }
        
        // レンタル注文を取得
        $RentalOrder = $this->rentalOrderRepository->find($id);
        
        // 本人のレンタル注文以外はアクセス禁止
        if (!$RentalOrder || $RentalOrder->getCustomer()->getId() != $Customer->getId()) {
            throw new NotFoundHttpException();
        }
        
        // デバッグ情報：レンタル注文のプロパティを確認
        $orderProps = [];
        $reflectionClass = new \ReflectionClass($RentalOrder);
        foreach ($reflectionClass->getMethods() as $method) {
            if (strpos($method->getName(), 'get') === 0) {
                $orderProps[] = $method->getName();
            }
        }
        
        // HTMLを直接生成
        $html = $this->generateDetailHtml($RentalOrder, $orderProps);
        
        $response = new \Symfony\Component\HttpFoundation\Response($html);
        return $response;
    }

    /**
     * レンタル履歴一覧ページのHTMLを生成
     */
    private function generateHistoryHtml($RentalOrders)
    {
        $baseUrl = $this->generateUrl('homepage', [], \Symfony\Component\Routing\Generator\UrlGeneratorInterface::ABSOLUTE_URL);
        
        // HTML生成
        $html = '<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>レンタル履歴一覧 - EC-CUBE</title>
    <meta property="og:type" content="website"/>
    <meta name="description" content="レンタル履歴一覧ページです。">
    <meta property="og:description" content="レンタル履歴一覧ページです。">
    <link rel="stylesheet" href="' . $baseUrl . 'assets/css/style.css">
    <link rel="stylesheet" href="' . $baseUrl . 'assets/css/slick.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body id="page_mypage_rental_history" class="mypage">
    <div class="ec-layoutRole">
        <header class="ec-layoutRole__header">
            <div class="ec-headerNaviRole">
                <div class="ec-headerNaviRole__left">
                    <div class="ec-headerNaviRole__nav">
                        <a href="' . $baseUrl . '">
                            <img src="' . $baseUrl . 'assets/img/common/logo.png" alt="EC-CUBE">
                        </a>
                    </div>
                </div>
                <div class="ec-headerNaviRole__right">
                    <div class="ec-headerNaviRole__nav">
                        <a href="' . $this->generateUrl('mypage') . '">マイページ</a>
                    </div>
                </div>
            </div>
        </header>
        <div class="ec-layoutRole__contents">
            <div class="ec-layoutRole__main">
                <div class="ec-mypageRole">
                    <div class="ec-pageHeader">
                        <h1>マイページ</h1>
                    </div>
                    <div class="ec-navlistRole">
                        <ul class="ec-navlistRole__navlist">
                            <li class="ec-navlistRole__item">
                                <a href="' . $this->generateUrl('mypage') . '">ご注文履歴</a>
                            </li>
                            <li class="ec-navlistRole__item">
                                <a href="' . $this->generateUrl('mypage_favorite') . '">お気に入り一覧</a>
                            </li>
                            <li class="ec-navlistRole__item active">
                                <a href="' . $this->generateUrl('mypage_rental_history') . '">レンタル履歴</a>
                            </li>
                            <li class="ec-navlistRole__item">
                                <a href="' . $this->generateUrl('mypage_change') . '">会員情報編集</a>
                            </li>
                            <li class="ec-navlistRole__item">
                                <a href="' . $this->generateUrl('mypage_withdraw') . '">退会手続き</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="ec-mypageRole">
                    <div class="ec-rentalHistoryRole">
                        <div class="ec-pageHeader">
                            <h1>レンタル履歴一覧</h1>
                        </div>';
                        
        if (count($RentalOrders) > 0) {
            $html .= '<p>' . count($RentalOrders) . '件のレンタル履歴があります</p>
                        <div class="ec-orderRole">
                            <div class="ec-orderRole__detail">
                                <div class="ec-orderDelivery">
                                    <div class="ec-orderDelivery__title">
                                        レンタル履歴
                                    </div>
                                    <div class="ec-orderDelivery__item">
                                        <table class="ec-orderDelivery__table">
                                            <thead>
                                                <tr>
                                                    <th>注文日</th>
                                                    <th>商品名</th>
                                                    <th>レンタル期間</th>
                                                    <th>状態</th>
                                                    <th>詳細</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                            
            foreach ($RentalOrders as $RentalOrder) {
                $createDate = $RentalOrder->getCreateDate() ? $RentalOrder->getCreateDate()->format('Y/m/d') : '-';
                
                // 商品名の取得
$productName = '商品情報なし';

// ProductClassからProductを取得
if (method_exists($RentalOrder, 'getProductClass') && $RentalOrder->getProductClass()) {
    $productClass = $RentalOrder->getProductClass();
    if (method_exists($productClass, 'getProduct') && $productClass->getProduct()) {
        $product = $productClass->getProduct();
        if (method_exists($product, 'getName')) {
            $productName = $product->getName();
        }
    }
}
                // レンタル期間の取得 (複数の可能性を試す)
                $startDate = '-';
                $endDate = '-';
                if (method_exists($RentalOrder, 'getRentalStartDate') && $RentalOrder->getRentalStartDate()) {
                    $startDate = $RentalOrder->getRentalStartDate()->format('Y/m/d');
                } elseif (method_exists($RentalOrder, 'getStartDate') && $RentalOrder->getStartDate()) {
                    $startDate = $RentalOrder->getStartDate()->format('Y/m/d');
                }
                
                if (method_exists($RentalOrder, 'getRentalEndDate') && $RentalOrder->getRentalEndDate()) {
                    $endDate = $RentalOrder->getRentalEndDate()->format('Y/m/d');
                } elseif (method_exists($RentalOrder, 'getEndDate') && $RentalOrder->getEndDate()) {
                    $endDate = $RentalOrder->getEndDate()->format('Y/m/d');
                }
                
                // ステータス取得 
                $status = '不明';
                if (method_exists($RentalOrder, 'getRentalStatusId')) {
                    $statusId = $RentalOrder->getRentalStatusId();
                    // ステータスIDから名前へのマッピング
                    $statusMap = [
                        0 => '未定',
                        1 => 'レンタル中',
                        2 => '返却済み',
                        3 => '返却遅延',
                        4 => '予約中',
                        // 必要に応じて他のステータスを追加
                    ];
                    $status = isset($statusMap[$statusId]) ? $statusMap[$statusId] : '不明 (ID: ' . $statusId . ')';
                }
                // getRentalStatusNameメソッドも試す
                if ($status === '不明' && method_exists($RentalOrder, 'getRentalStatusName')) {
                    $statusName = $RentalOrder->getRentalStatusName();
                    if ($statusName) {
                        $status = $statusName;
                    }
                }
                
                $detailUrl = $this->generateUrl('mypage_rental_history_detail', ['id' => $RentalOrder->getId()]);
                
                $html .= '<tr>
                    <td>' . $createDate . '</td>
                    <td>' . $productName . '</td>
                    <td>' . $startDate . ' 〜 ' . $endDate . '</td>
                    <td>' . $status . '</td>
                    <td><a href="' . $detailUrl . '">詳細</a></td>
                </tr>';
            }
            
            $html .= '</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>';
        } else {
            $html .= '<p class="ec-para-normal">レンタル履歴はありません</p>';
        }
        
        $html .= '</div>
                </div>
            </div>
        </div>
        <footer class="ec-layoutRole__footer">
            <div class="ec-footerRole">
                <div class="ec-footerRole__inner">
                    <p>© EC-CUBE</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>';
        
        return $html;
    }

    /**
     * レンタル詳細ページのHTML生成
     */
    private function generateDetailHtml($RentalOrder, $orderProps = [])
    {
        $baseUrl = $this->generateUrl('homepage', [], \Symfony\Component\Routing\Generator\UrlGeneratorInterface::ABSOLUTE_URL);
        
        // 必要な情報を取得
        $orderDate = $RentalOrder->getCreateDate() ? $RentalOrder->getCreateDate()->format('Y年m月d日 H:i') : '-';
        
       // 商品名の取得
$productName = '商品情報なし';

// ProductClassからProductを取得
if (method_exists($RentalOrder, 'getProductClass') && $RentalOrder->getProductClass()) {
    $productClass = $RentalOrder->getProductClass();
    if (method_exists($productClass, 'getProduct') && $productClass->getProduct()) {
        $product = $productClass->getProduct();
        if (method_exists($product, 'getName')) {
            $productName = $product->getName();
        }
    }
}
        
        // レンタル期間の取得 (複数の可能性を試す)
        $startDate = '-';
        $endDate = '-';
        if (method_exists($RentalOrder, 'getRentalStartDate') && $RentalOrder->getRentalStartDate()) {
            $startDate = $RentalOrder->getRentalStartDate()->format('Y/m/d');
        } elseif (method_exists($RentalOrder, 'getStartDate') && $RentalOrder->getStartDate()) {
            $startDate = $RentalOrder->getStartDate()->format('Y/m/d');
        }
        
        if (method_exists($RentalOrder, 'getRentalEndDate') && $RentalOrder->getRentalEndDate()) {
            $endDate = $RentalOrder->getRentalEndDate()->format('Y/m/d');
        } elseif (method_exists($RentalOrder, 'getEndDate') && $RentalOrder->getEndDate()) {
            $endDate = $RentalOrder->getEndDate()->format('Y/m/d');
        }
        
        // ステータス取得 (デバッグに基づく修正)
$status = '不明';
if (method_exists($RentalOrder, 'getRentalStatusId')) {
    $statusId = $RentalOrder->getRentalStatusId();
    // ステータスIDから名前へのマッピング
    $statusMap = [
        0 => '未定',
        1 => 'レンタル中',
        2 => '返却済み',
        3 => '返却遅延',
        4 => '予約中',
        // 必要に応じて他のステータスを追加
    ];
    $status = isset($statusMap[$statusId]) ? $statusMap[$statusId] : '不明 (ID: ' . $statusId . ')';
}
// getRentalStatusNameメソッドも試す
if ($status === '不明' && method_exists($RentalOrder, 'getRentalStatusName')) {
    $statusName = $RentalOrder->getRentalStatusName();
    if ($statusName) {
        $status = $statusName;
    }
}
        
        // オプションの取得
        $options = [];
        if (method_exists($RentalOrder, 'getOptionsJson') && $RentalOrder->getOptionsJson()) {
            $jsonData = $RentalOrder->getOptionsJson();
            $decodedOptions = json_decode($jsonData, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $options = $decodedOptions;
            }
        }
        
        $remarks = isset($options['remarks']) ? $options['remarks'] : '特にありません';
        
        // デバッグ情報：利用可能なgetterメソッド
        $debugInfo = '';
        if (!empty($orderProps)) {
            $debugInfo = '<div class="ec-rectHeading"><h2>デバッグ情報</h2></div><div style="font-size: 12px; margin-bottom: 20px; color: #999;">';
            $debugInfo .= 'レンタル注文のプロパティ:<br>';
            foreach ($orderProps as $prop) {
                $debugInfo .= '- ' . $prop . '<br>';
            }
            $debugInfo .= '</div>';
        }

        // 実際のデータをデバッグ情報に追加
$debugInfo = '<div class="ec-rectHeading"><h2>デバッグ情報</h2></div><div style="font-size: 12px; margin-bottom: 20px; color: #999;">';
$debugInfo .= 'レンタル注文のプロパティ:<br>';
foreach ($orderProps as $prop) {
    $debugInfo .= '- ' . $prop . '<br>';
}

// 実際の値も表示
$debugInfo .= '<br>実際の値:<br>';
if (method_exists($RentalOrder, 'getProduct')) {
    $debugInfo .= '- getProduct: ' . (is_object($RentalOrder->getProduct()) ? get_class($RentalOrder->getProduct()) : var_export($RentalOrder->getProduct(), true)) . '<br>';
}
if (method_exists($RentalOrder, 'getRentalStatusId')) {
    $debugInfo .= '- getRentalStatusId: ' . var_export($RentalOrder->getRentalStatusId(), true) . '<br>';
}
if (method_exists($RentalOrder, 'getRentalStatusName')) {
    $debugInfo .= '- getRentalStatusName: ' . var_export($RentalOrder->getRentalStatusName(), true) . '<br>';
}

$debugInfo .= '</div>';
        
        // HTML生成
        $html = '<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>レンタル履歴詳細 - EC-CUBE</title>
    <meta property="og:type" content="website"/>
    <meta name="description" content="レンタル履歴詳細ページです。">
    <meta property="og:description" content="レンタル履歴詳細ページです。">
    <link rel="stylesheet" href="' . $baseUrl . 'assets/css/style.css">
    <link rel="stylesheet" href="' . $baseUrl . 'assets/css/slick.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body id="page_mypage_rental_history_detail" class="mypage">
    <div class="ec-layoutRole">
        <header class="ec-layoutRole__header">
            <div class="ec-headerNaviRole">
                <div class="ec-headerNaviRole__left">
                    <div class="ec-headerNaviRole__nav">
                        <a href="' . $baseUrl . '">
                            <img src="' . $baseUrl . 'assets/img/common/logo.png" alt="EC-CUBE">
                        </a>
                    </div>
                </div>
                <div class="ec-headerNaviRole__right">
                    <div class="ec-headerNaviRole__nav">
                        <a href="' . $this->generateUrl('mypage') . '">マイページ</a>
                    </div>
                </div>
            </div>
        </header>
        <div class="ec-layoutRole__contents">
            <div class="ec-layoutRole__main">
                <div class="ec-mypageRole">
                    <div class="ec-pageHeader">
                        <h1>マイページ</h1>
                    </div>
                    <div class="ec-navlistRole">
                        <ul class="ec-navlistRole__navlist">
                            <li class="ec-navlistRole__item">
                                <a href="' . $this->generateUrl('mypage') . '">ご注文履歴</a>
                            </li>
                            <li class="ec-navlistRole__item">
                                <a href="' . $this->generateUrl('mypage_favorite') . '">お気に入り一覧</a>
                            </li>
                            <li class="ec-navlistRole__item active">
                                <a href="' . $this->generateUrl('mypage_rental_history') . '">レンタル履歴</a>
                            </li>
                            <li class="ec-navlistRole__item">
                                <a href="' . $this->generateUrl('mypage_change') . '">会員情報編集</a>
                            </li>
                            <li class="ec-navlistRole__item">
                                <a href="' . $this->generateUrl('mypage_withdraw') . '">退会手続き</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="ec-mypageRole">
                    <div class="ec-rentalHistoryRole">
                        <div class="ec-pageHeader">
                            <h1>レンタル履歴詳細</h1>
                        </div>
                        
                        <div class="ec-orderRole">
                            <div class="ec-orderRole__detail">
                                <div class="ec-orderDelivery">
                                    <div class="ec-orderDelivery__title">
                                        レンタル情報
                                    </div>
                                    <div class="ec-orderDelivery__item">
                                        <div class="ec-rectHeading">
                                            <h2>基本情報</h2>
                                        </div>
                                        <div class="ec-deliverAddress">
                                            <p>注文日時：' . $orderDate . '</p>
                                            <p>商品名：' . $productName . '</p>
                                            <p>レンタル期間：' . $startDate . ' 〜 ' . $endDate . '</p>
                                            <p>ステータス：' . $status . '</p>
                                        </div>
                                        
                                        <div class="ec-rectHeading">
                                            <h2>備考</h2>
                                        </div>
                                        <p>' . nl2br(htmlspecialchars($remarks)) . '</p>
                                        
                                        ' . $debugInfo . '
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="ec-navlistRole">
                            <div class="ec-navlistRole__navlist">
                                <a href="' . $this->generateUrl('mypage_rental_history') . '" class="ec-blockBtn--cancel">レンタル履歴一覧に戻る</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="ec-layoutRole__footer">
            <div class="ec-footerRole">
                <div class="ec-footerRole__inner">
                    <p>© EC-CUBE</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>';
        
        return $html;
    }
}