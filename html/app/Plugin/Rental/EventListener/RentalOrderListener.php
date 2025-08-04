<?php
// app/Plugin/Rental/EventListener/RentalOrderListener.php

namespace Plugin\Rental\EventListener;

use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Plugin\Rental\Repository\RentalProductRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class RentalOrderListener implements EventSubscriberInterface
{
    /**
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * @var RentalProductRepository
     */
    protected $rentalProductRepository;

    public function __construct(
        RequestStack $requestStack,
        RentalProductRepository $rentalProductRepository
    ) {
        $this->requestStack = $requestStack;
        $this->rentalProductRepository = $rentalProductRepository;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            EccubeEvents::FRONT_SHOPPING_COMPLETE_INITIALIZE => 'onShoppingCompleteInitialize',
        ];
    }

    /**
     * 注文完了時にレンタル情報を保存する
     *
     * @param EventArgs $event
     */
    public function onShoppingCompleteInitialize(EventArgs $event)
    {
        // セッションを取得
        $session = $this->requestStack->getSession();
        
        // 注文情報を取得
        $Order = $event->getArgument('Order');
        if (!$Order) {
            return;
        }
        
        // 注文内の商品をループ
        foreach ($Order->getOrderItems() as $OrderItem) {
            $ProductClass = $OrderItem->getProductClass();
            if (!$ProductClass) {
                continue;
            }
            
            // カート用に保存されたレンタル情報を取得
            $rentalDataKey = 'rental_data_' . $ProductClass->getId();
            $RentalData = $session->get($rentalDataKey);
            
            if (!$RentalData) {
                continue; // レンタル情報なし
            }
            
            // 商品がレンタル可能か確認
            $Product = $ProductClass->getProduct();
            $RentalProduct = $this->rentalProductRepository->findByProduct($Product);
            if (!$RentalProduct || !$RentalProduct->isRentalFlg()) {
                continue; // レンタル対象商品ではない
            }
            
            // ここでRentalOrderエンティティを作成して保存
            try {
                // EntityManagerのDIをコンストラクタに追加する必要があります
                $entityManager = $event->getEntityManager();
                
                $RentalOrder = new \Plugin\Rental\Entity\RentalOrder();
                $RentalOrder->setOrder($Order);
                $RentalOrder->setOrderItem($OrderItem);
                $RentalOrder->setRentalStartDate(new \DateTime($RentalData['rental_start_date']));
                $RentalOrder->setRentalPeriod($RentalData['rental_period']);
                $RentalOrder->setRentalEndDate(new \DateTime($RentalData['rental_end_date']));
                $RentalOrder->setRentalStatusId(1); // 1: 予約中
                $RentalOrder->setRentalProduct($RentalProduct);
                
                $entityManager->persist($RentalOrder);
                $entityManager->flush();
                
                // 処理後はセッションからデータを削除
                $session->remove($rentalDataKey);
                
            } catch (\Exception $e) {
                // エラーログ記録
                log_error('レンタル注文の保存に失敗しました: ' . $e->getMessage());
            }
        }
    }
}