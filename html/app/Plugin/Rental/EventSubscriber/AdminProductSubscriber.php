<?php
// app/Plugin/Rental/EventSubscriber/AdminProductSubscriber.php
//商品保存時にレンタル情報も保存
namespace Plugin\Rental\EventSubscriber;

use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Plugin\Rental\Entity\RentalProduct;
use Plugin\Rental\Repository\RentalProductRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormInterface;

class AdminProductSubscriber implements EventSubscriberInterface
{
    /**
     * @var RentalProductRepository
     */
    protected $rentalProductRepository;

    /**
     * コンストラクタ
     *
     * @param RentalProductRepository $rentalProductRepository
     */
    public function __construct(RentalProductRepository $rentalProductRepository)
    {
        $this->rentalProductRepository = $rentalProductRepository;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            EccubeEvents::ADMIN_PRODUCT_EDIT_COMPLETE => 'onProductEditComplete',
        ];
    }

    /**
     * 商品の保存完了時
     *
     * @param EventArgs $event
     */
    public function onProductEditComplete(EventArgs $event)
    {
        $Product = $event->getArgument('Product');
        $form = $event->getArgument('form');
        
        // フォームからレンタル設定情報を取得
        $rentalProductForm = $form->get('rental_product');
        
        // 既存のエンティティを検索
        $RentalProduct = $this->rentalProductRepository->findByProduct($Product);
        
        if (!$RentalProduct) {
            $RentalProduct = new RentalProduct();
            $RentalProduct->setId($Product->getId());
            $RentalProduct->setProduct($Product);
        }
        
        // フォームからエンティティに値を設定
        $this->setRentalProductData($RentalProduct, $rentalProductForm);
        
        // データベースに保存
        $this->rentalProductRepository->save($RentalProduct);
    }
    
    /**
     * フォームからエンティティにデータを設定
     *
     * @param RentalProduct $RentalProduct
     * @param FormInterface $form
     */
    private function setRentalProductData(RentalProduct $RentalProduct, FormInterface $form)
    {
        $RentalProduct->setRentalFlg($form->get('rental_flg')->getData());
        $RentalProduct->setRentalPriceDaily($form->get('rental_price_daily')->getData());
        $RentalProduct->setRentalPriceWeekly($form->get('rental_price_weekly')->getData());
        $RentalProduct->setRentalPriceMonthly($form->get('rental_price_monthly')->getData());
        $RentalProduct->setRentalMaxDays($form->get('rental_max_days')->getData());
    }
}