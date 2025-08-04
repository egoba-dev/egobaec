<?php
namespace Plugin\Rental\Controller\Front;

use Eccube\Controller\AbstractController;
use Plugin\Rental\Entity\RentalOrder;
use Plugin\Rental\Form\Type\RentalPaymentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Psr\Log\LoggerInterface;

use Symfony\Component\HttpFoundation\RedirectResponse;

//メール送信
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

/**
 * レンタル決済コントローラー
 *
 * @Route("/rental/payment")
 */
class RentalPaymentController extends AbstractController
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var MailService
     */
    protected $mailService;


    /**
     * コンストラクタ
     *
     * @param LoggerInterface $logger
     */


     public function __construct(
        LoggerInterface $logger,
        MailerInterface $mailer
    ) {
        $this->logger = $logger;
        $this->mailer = $mailer;
    }

   /**
 * 決済方法選択画面
 *
 * @Route("/", name="rental_payment", methods={"GET", "POST"})
 */
public function index(Request $request)
{
    // セッションからレンタル情報を取得
    $session = $request->getSession();
    $rental = $session->get('rental');
    
    // セッションにレンタル情報がない場合はトップページへリダイレクト
    if (!$rental) {
        return $this->redirectToRoute('homepage');
    }
    
    // 商品情報を取得
    $Product = $this->entityManager->getRepository('\Eccube\Entity\Product')->find($rental['product_id']);
    
    // デバッグ出力を追加
    $this->logger->info('決済ページ表示: ' . $request->getMethod());
    
    // 決済方法選択フォーム（オプションは一旦外す）
    $form = $this->createForm(RentalPaymentType::class);
    $form->handleRequest($request);
    
    // フォーム送信時の処理
    if ($form->isSubmitted() && $form->isValid()) {
        $this->logger->info('決済フォーム送信成功');
        $formData = $form->getData();
        
        // デバッグ出力
        $this->logger->info('フォームデータ: ' . json_encode($formData));
        
        // 選択された決済方法をセッションに保存
        $rental['payment_method'] = $formData['payment_method'];
        
        // セッションに保存
        $session->set('rental', $rental);
        $this->logger->info('セッション更新完了');
        
        // 注文確定画面へリダイレクト
        $this->logger->info('リダイレクト: rental_payment_confirm');
        return $this->redirectToRoute('rental_payment_confirm');
    } else if ($form->isSubmitted()) {
        // バリデーションエラーがある場合
        $this->logger->error('決済フォームバリデーションエラー: ' . json_encode($form->getErrors(true, true)));
    }
    
    return $this->render('@Rental/default/payment.twig', [
        'form' => $form->createView(),
        'Product' => $Product,
        'rental' => $rental,
    ]);
}

/**
 * メタタグ情報を指定してレンダリング
 */
private function renderWithMetaOgp($template, array $parameters = [])
{
    // デフォルトのメタ情報を設定
    if (!isset($parameters['meta_og_type'])) {
        $parameters['meta_og_type'] = 'website';
    }
    
    if (!isset($parameters['meta_description'])) {
        $parameters['meta_description'] = 'レンタル支払いページです。';
    }
    
    return $this->render($template, $parameters);
}

/**
 * 注文確定画面
 *
 * @Route("/confirm", name="rental_payment_confirm", methods={"GET", "POST"})
 */
public function confirm(Request $request)
{
    // セッションからレンタル情報を取得
    $session = $request->getSession();
    $rental = $session->get('rental');
    
    // セッションにレンタル情報がない場合はトップページへリダイレクト
    if (!$rental) {
        return $this->redirectToRoute('homepage');
    }
    
    // 商品情報を取得
    $Product = $this->entityManager->getRepository('\Eccube\Entity\Product')->find($rental['product_id']);
    
    // リクエストメソッドをログに記録
    $this->logger->info('確定画面: ' . $request->getMethod());
    
    // POSTリクエストの場合
    if ($request->isMethod('POST')) {
        $this->logger->info('POSTリクエスト受信');
        
        try {
            // トランザクション開始
            $this->entityManager->getConnection()->beginTransaction();
            
            // レンタル注文エンティティの作成
            $RentalOrder = new \Plugin\Rental\Entity\RentalOrder();
            
            // 商品情報を設定
            $ProductClass = $this->entityManager->getRepository('\Eccube\Entity\ProductClass')->findOneBy(['Product' => $Product]);
            if (!$ProductClass) {
                throw new \Exception('商品規格が見つかりません。');
            }
            
            $RentalOrder->setProductClass($ProductClass);
            
            // 日付・数量・金額などを設定
            $RentalOrder->setRentalStartDate(new \DateTime($rental['start_date']));
            $RentalOrder->setRentalEndDate(new \DateTime($rental['end_date']));
            $RentalOrder->setRentalPeriod($rental['period']);
            $RentalOrder->setQuantity($rental['quantity']);
            $RentalOrder->setPrice($rental['price']);
            $RentalOrder->setPaymentMethod($rental['payment_method']);
            
            // オプション・備考を設定
            $RentalOrder->setOptionsJson(json_encode([
                'options' => $rental['options'] ?? [],
                'remarks' => $rental['remarks'] ?? '',
            ]));
            
            // 現在のユーザーを設定
            $Customer = $this->getUser();
            if ($Customer) {
                $RentalOrder->setCustomer($Customer);
                
                // 顧客情報をコピー
                if (method_exists($RentalOrder, 'copyAddressFromCustomer')) {
                    $RentalOrder->copyAddressFromCustomer($Customer);
                }
            }
            
            // レンタルステータスを「予約中」に設定
            $RentalOrder->setRentalStatusId(1); // 1:予約中
            
            // 作成日時と更新日時を設定
            $now = new \DateTime();
            $RentalOrder->setCreateDate($now);
            $RentalOrder->setUpdateDate($now);
            
            // データベースに保存
            $this->entityManager->persist($RentalOrder);
            $this->entityManager->flush();
            
            // コミット
            $this->entityManager->getConnection()->commit();
            
            // メール送信処理
            $this->sendRentalOrderMail($RentalOrder, $Customer);
            
            // セッションからレンタル情報をクリア
            $session->remove('rental');
            
            // 完了ページへリダイレクト
            return $this->redirectToRoute('rental_payment_complete', ['id' => $RentalOrder->getId()]);
            
        } catch (\Exception $e) {
            // ロールバック
            $this->entityManager->getConnection()->rollBack();
            
            // エラーメッセージを表示
            $this->addError('rental.payment.error', 'front');
            
            // ロギング
            $this->logger->error('注文保存エラー: ' . $e->getMessage());
            
            return $this->redirectToRoute('rental_payment');
        }
    }
    
    // テンプレート変数
    return $this->render('@Rental/default/payment_confirm.twig', [
        'Product' => $Product,
        'rental' => $rental,
        'payment_method' => $this->getPaymentMethodName($rental['payment_method']),
    ]);
}

/**
 * CSRFトークンを取得
 * 
 * @return string
 */
private function getCsrfToken()
{
    return $this->container->get('security.csrf.token_manager')->getToken('authenticate')->getValue();
}


/**
 * 注文完了画面
 *
 * @Route("/complete/{id}", name="rental_payment_complete", methods={"GET"})
 */
public function complete(Request $request, $id)
{
    try {
        // レンタル注文を取得
        $RentalOrder = $this->entityManager->getRepository(RentalOrder::class)->find($id);
        if (!$RentalOrder) {
            throw new NotFoundHttpException('レンタル注文が見つかりません');
        }
        
        // デバッグ出力
        $this->logger->info('注文完了画面表示: ID=' . $id);
        
        // 現在のユーザーを取得
        $Customer = $this->getUser();
        
        // 管理者の場合はチェックをスキップ
        $isAdmin = false;
        if ($Customer && $this->isGranted('ROLE_ADMIN')) {
            $isAdmin = true;
        }
        
        // ユーザーチェック（管理者の場合はスキップ）
        if (!$isAdmin && (!$Customer || ($RentalOrder->getCustomer() && $RentalOrder->getCustomer()->getId() != $Customer->getId()))) {
            throw new NotFoundHttpException('レンタル注文が見つかりません');
        }
        
        // テンプレートをレンダリングしてレスポンスを返す
        return $this->render('@Rental/default/payment_complete.twig', [
            'RentalOrder' => $RentalOrder,
        ]);
        
    } catch (\Exception $e) {
        // エラー時もレスポンスオブジェクトを返す
        $this->logger->error('完了画面エラー: ' . $e->getMessage());
        
        return $this->render('@Rental/default/payment_complete.twig', [
            'error' => true,
            'message' => 'エラーが発生しました: ' . $e->getMessage(),
        ]);
    }
}



/**
 * 支払い方法の名称を取得
 *
 * @param string $paymentMethod
 * @return string
 */
private function getPaymentMethodName($paymentMethod)
{
    switch ($paymentMethod) {
        case 'cash':
            return '現金払い';
        case 'cod':
            return '代金引換';
        default:
            return $paymentMethod;
    }
}


private function sendRentalOrderMail(RentalOrder $RentalOrder, $Customer = null)
{
    // メール本文を作成
    $mailBody = sprintf(
        "レンタル注文を受け付けました。\n\n" .
        "注文番号: %s\n" .
        "商品名: %s\n" .
        "レンタル期間: %s 〜 %s\n" .
        "数量: %d\n" .
        "合計金額: %s\n\n" .
        "この度はご利用ありがとうございました。",
        $RentalOrder->getId(),
        $RentalOrder->getProductClass()->getProduct()->getName(),
        $RentalOrder->getRentalStartDate()->format('Y年m月d日'),
        $RentalOrder->getRentalEndDate()->format('Y年m月d日'),
        $RentalOrder->getQuantity(),
        number_format($RentalOrder->getPrice()) . '円'
    );
    
    // メール送信
    try {
        $email = (new Email())
            ->from($this->eccubeConfig['eccube_info_mail_from_email'])
            ->to($Customer ? $Customer->getEmail() : $RentalOrder->getEmail())
            ->subject('レンタル注文確認')
            ->text($mailBody);
        
        $this->mailer->send($email);
        $this->logger->info('注文確認メール送信完了');
        
    } catch (\Exception $e) {
        $this->logger->error('メール送信エラー: ' . $e->getMessage());
    }
}

}