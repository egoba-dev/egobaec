<?php

namespace Plugin\Rental\Controller\Front;

use Eccube\Controller\AbstractController;
use Eccube\Repository\ProductClassRepository;
use Eccube\Service\CartService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Plugin\Rental\Form\Type\RentalFrontType;
use Plugin\Rental\Entity\RentalOrder;
use Plugin\Rental\Service\RentalCalculationService;

use Psr\Log\LoggerInterface; // ← 追加


class RentalProductController extends AbstractController
{
    /**
     * @var ProductClassRepository
     */
    protected $productClassRepository;

    /**
     * @var CartService
     */
    protected $cartService;

    /**
     * @var RentalCalculationService
     */
    protected $calculationService;

    /**
     * @var LoggerInterface
     */
    protected $logger; // ← 追加

    /**
     * コンストラクタ
     */
    public function __construct(
        ProductClassRepository $productClassRepository,
        CartService $cartService,
        RentalCalculationService $calculationService,
        LoggerInterface $logger // ← 追加
    ) {
        $this->productClassRepository = $productClassRepository;
        $this->cartService = $cartService;
        $this->calculationService = $calculationService;
        $this->logger = $logger; // ← 追加
    }

    /**
     * レンタル商品をカートに追加
     *
     * @Route("/rental/add_cart", name="rental_add_cart")
     */
    public function addCart(Request $request)
    {
        // リクエストデータの取得
        $productId = $request->get('product_id');
        
        // リダイレクト処理に変更（レンタル入力画面へ）
        return $this->redirectToRoute('rental_input', ['id' => $productId]);
    }

    /**
     * レンタル予約入力画面
     *
     * @Route("/rental/input/{id}", name="rental_input", methods={"GET", "POST"})
     * @Template("@Rental/default/input.twig")
     */
    public function input(Request $request, $id)
    {
        // 商品情報の取得
        $Product = $this->entityManager->getRepository('\Eccube\Entity\Product')->find($id);
        if (!$Product) {
            throw new NotFoundHttpException('商品が見つかりません');
        }

        // レンタル可能な商品かチェック
        $RentalProduct = $this->entityManager->getRepository('Plugin\Rental\Entity\RentalProduct')
            ->findOneBy(['Product' => $Product]);
        if (!$RentalProduct) {
            return $this->redirectToRoute('product_detail', ['id' => $id]);
        }

        // フォームの作成
        $form = $this->createForm(RentalFrontType::class, null, [
            'rental_product' => $RentalProduct
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // デバッグ出力
            $this->logger->info('フォーム送信: ' . $id);
            
            // フォームからデータを取得
            $formData = $form->getData();
            $this->logger->info('フォームデータ: ' . json_encode($formData));
            
            // セッションにレンタル情報を保存
            $rental_session = [
                'product_id' => $Product->getId(),
                'product_name' => $Product->getName(),
                'start_date' => $formData['rental_start_date'],
                'end_date' => $this->calculateEndDate($formData['rental_start_date'], $formData['rental_period']),
                'period' => $formData['rental_period'],
                'quantity' => isset($formData['quantity']) ? $formData['quantity'] : 1,
                'options' => $formData['options'] ?? [],
                'remarks' => $formData['remarks'] ?? '',
            ];
            
            $this->logger->info('セッションデータ: ' . json_encode($rental_session));
            
            // 金額計算
            $rental_session['price'] = $this->calculationService->calculateRentalPrice(
                $RentalProduct, 
                $rental_session['period'],
                $rental_session['quantity']
            );
            
            // セッションに保存
            $session = $request->getSession();
            $session->set('rental', $rental_session);
            
            $this->logger->info('確認画面へリダイレクト');
            
            // 確認画面へリダイレクト
            return $this->redirectToRoute('rental_confirm');
        }

        // テンプレート変数をシンプルに
        return [
            'form' => $form->createView(),
            'Product' => $Product,
            'RentalProduct' => $RentalProduct,
        ];
    }


/**
 * レンタル期間から終了日を計算
 */
private function calculateEndDate($startDate, $period)
{
    $startDateTime = new \DateTime($startDate);
    $endDateTime = clone $startDateTime;
    $endDateTime->modify('+' . $period . ' days');
    return $endDateTime->format('Y-m-d');
}

    /**
 * レンタル予約確認画面
 *
 * @Route("/rental/confirm", name="rental_confirm", methods={"GET"})
 * @Template("@Rental/default/confirm.twig")
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
    
    // 日数計算
    $start_date = new \DateTime($rental['start_date']);
    $end_date = new \DateTime($rental['end_date']);
    $interval = $start_date->diff($end_date);
    $days = $interval->days + 1; // 開始日も含める
    
    return [
        'Product' => $Product,
        'rental' => $rental,
        'days' => $days,
    ];
}

/**
 * レンタル予約処理
 *
 * @Route("/rental/complete", name="rental_complete", methods={"POST"})
 * @Template("@Rental/default/complete.twig")
 */
public function complete(Request $request)
{
    // セッションからレンタル情報を取得
    $session = $request->getSession();
    $rental = $session->get('rental');
    
    // セッションにレンタル情報がない場合はトップページへリダイレクト
    if (!$rental) {
        return $this->redirectToRoute('homepage');
    }
    
    // レンタル注文エンティティの作成
    $RentalOrder = new RentalOrder();
    
    // 商品情報を設定
    $Product = $this->entityManager->getRepository('\Eccube\Entity\Product')->find($rental['product_id']);
    $RentalOrder->setProduct($Product);
    
    // 日付・数量・金額などを設定
    $RentalOrder->setRentalStartDate(new \DateTime($rental['start_date']));
    $RentalOrder->setRentalEndDate(new \DateTime($rental['end_date']));
    $RentalOrder->setRentalPeriod($rental['period']);
    $RentalOrder->setQuantity($rental['quantity']);
    $RentalOrder->setPrice($rental['price']);
    
    // オプション・備考を設定
    $RentalOrder->setOptionsJson(json_encode([
        'options' => $rental['options'],
        'remarks' => $rental['remarks'],
    ]));
    
    // 現在のユーザーを設定
    $Customer = $this->getUser();
    if ($Customer) {
        $RentalOrder->setCustomer($Customer);
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
    
    // セッションからレンタル情報をクリア
    $session->remove('rental');
    
    return [
        'rental' => $rental,
        'order_id' => $RentalOrder->getId(),
    ];
}

}
// return $this->redirectToRoute('cart');