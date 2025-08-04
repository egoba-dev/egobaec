<?php
namespace Plugin\Rental\Service;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Entity\Order;
use Eccube\Entity\Product;
use Eccube\Entity\ProductClass;
use Plugin\Rental\Entity\RentalOrder;
use Plugin\Rental\Entity\RentalProduct;
use Plugin\Rental\Repository\RentalOrderRepository;
use Plugin\Rental\Repository\RentalProductRepository;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * レンタル機能のメインサービスクラス
 */
class RentalService
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var RentalProductRepository
     */
    protected $rentalProductRepository;

    /**
     * @var RentalOrderRepository
     */
    protected $rentalOrderRepository;

    /**
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * コンストラクタ
     *
     * @param EntityManagerInterface $entityManager
     * @param RentalProductRepository $rentalProductRepository
     * @param RentalOrderRepository $rentalOrderRepository
     * @param RequestStack $requestStack
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        RentalProductRepository $rentalProductRepository,
        RentalOrderRepository $rentalOrderRepository,
        RequestStack $requestStack
    ) {
        $this->entityManager = $entityManager;
        $this->rentalProductRepository = $rentalProductRepository;
        $this->rentalOrderRepository = $rentalOrderRepository;
        $this->requestStack = $requestStack;
    }

    // セッションを取得するヘルパーメソッド
    private function getSession()
    {
        return $this->requestStack->getSession();
    }

    // 以下のメソッドで $this->session の代わりに $this->getSession() を使用するように修正
    
    /**
     * カートにレンタル情報を追加（セッションに保存）
     *
     * @param string $cartItemId
     * @param string $rentalStartDate
     * @param int $rentalPeriod
     * @return void
     */
    public function addRentalInfoToCart($cartItemId, $rentalStartDate, $rentalPeriod)
    {
        $session = $this->getSession();
        $rentalSession = $session->get('rental.cart', []);
        
        $startDate = new \DateTime($rentalStartDate);
        $endDate = clone $startDate;
        $endDate->modify("+{$rentalPeriod} days");
        
        $rentalSession[$cartItemId] = [
            'rental_start_date' => $startDate->format('Y-m-d'),
            'rental_period' => $rentalPeriod,
            'rental_end_date' => $endDate->format('Y-m-d'),
        ];
        
        $session->set('rental.cart', $rentalSession);
    }

    /**
     * カートからレンタル情報を取得
     *
     * @param string $cartItemId
     * @return array|null
     */
    public function getRentalInfoFromCart($cartItemId)
    {
        $session = $this->getSession();
        $rentalSession = $session->get('rental.cart', []);
        
        if (isset($rentalSession[$cartItemId])) {
            return $rentalSession[$cartItemId];
        }
        
        return null;
    }

    /**
     * 注文完了時にレンタル注文を作成
     *
     * @param Order $Order
     * @return void
     */
    public function createRentalOrders(Order $Order)
    {
        $session = $this->getSession();
        $rentalSession = $session->get('rental.cart', []);
        if (empty($rentalSession)) {
            return;
        }
        
        foreach ($Order->getOrderItems() as $OrderItem) {
            $ProductClass = $OrderItem->getProductClass();
            if (!$ProductClass) continue;
            
            // カートアイテムIDを取得（この例では便宜上Product ClassのIDを使用）
            $cartItemId = $ProductClass->getId();
            
            if (!isset($rentalSession[$cartItemId])) {
                continue;
            }
            
            $rentalInfo = $rentalSession[$cartItemId];
            
            $RentalOrder = new RentalOrder();
            $RentalOrder->setOrder($Order);
            $RentalOrder->setProductClass($ProductClass);
            $RentalOrder->setRentalStartDate(new \DateTime($rentalInfo['rental_start_date']));
            $RentalOrder->setRentalEndDate(new \DateTime($rentalInfo['rental_end_date']));
            $RentalOrder->setRentalStatusId(1); // 1: レンタル予約中
            $RentalOrder->setCreateDate(new \DateTime());
            $RentalOrder->setUpdateDate(new \DateTime());
            
            $this->entityManager->persist($RentalOrder);
        }
        
        $this->entityManager->flush();
        
        // 注文完了後にセッションからレンタル情報を削除
        $session->remove('rental.cart');
    }

    /**
     * レンタル開始処理
     *
     * @param RentalOrder $RentalOrder
     * @return RentalOrder
     */
    public function startRental(RentalOrder $RentalOrder)
    {
        $RentalOrder->setRentalStatusId(2); // 2: レンタル中
        $RentalOrder->setUpdateDate(new \DateTime());
        
        $this->entityManager->persist($RentalOrder);
        $this->entityManager->flush();
        
        return $RentalOrder;
    }

    /**
     * 返却処理
     *
     * @param RentalOrder $RentalOrder
     * @return RentalOrder
     */
    public function processReturn(RentalOrder $RentalOrder)
    {
        $RentalOrder->setReturnDate(new \DateTime());
        $RentalOrder->setRentalStatusId(3); // 3: 返却済み
        $RentalOrder->setUpdateDate(new \DateTime());
        
        $this->entityManager->persist($RentalOrder);
        $this->entityManager->flush();
        
        return $RentalOrder;
    }

    /**
     * レンタルキャンセル処理
     *
     * @param RentalOrder $RentalOrder
     * @return RentalOrder
     */
    public function cancelRental(RentalOrder $RentalOrder)
    {
        $RentalOrder->setRentalStatusId(5); // 5: キャンセル
        $RentalOrder->setUpdateDate(new \DateTime());
        
        $this->entityManager->persist($RentalOrder);
        $this->entityManager->flush();
        
        return $RentalOrder;
    }

    /**
     * 返却遅延商品をチェックして更新
     *
     * @return int 更新した件数
     */
    public function updateOverdueRentals()
    {
        $overdueRentals = $this->rentalOrderRepository->getOverdueRentals();
        $count = 0;
        
        foreach ($overdueRentals as $RentalOrder) {
            $RentalOrder->setRentalStatusId(4); // 4: 返却遅延
            $RentalOrder->setUpdateDate(new \DateTime());
            
            $this->entityManager->persist($RentalOrder);
            $count++;
        }
        
        if ($count > 0) {
            $this->entityManager->flush();
        }
        
        return $count;
    }
}
