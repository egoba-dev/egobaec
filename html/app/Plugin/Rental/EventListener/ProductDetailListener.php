<?php

namespace Plugin\Rental\EventListener;

use Eccube\Entity\Product;
use Eccube\Event\TemplateEvent;
use Plugin\Rental\Form\Type\RentalFrontType;
use Plugin\Rental\Repository\RentalProductRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormFactoryInterface;

class ProductDetailListener implements EventSubscriberInterface
{
    /**
     * @var FormFactoryInterface
     */
    protected $formFactory;
    
    /**
     * @var RentalProductRepository
     */
    protected $rentalProductRepository;
    
    /**
     * ProductDetailListener constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param RentalProductRepository $rentalProductRepository
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        RentalProductRepository $rentalProductRepository
    ) {
        $this->formFactory = $formFactory;
        $this->rentalProductRepository = $rentalProductRepository;
    }
    
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Product/detail.twig' => ['onTemplateProductDetail'],
        ];
    }
    
    /**
     * 商品詳細画面にレンタルフォームを追加
     *
     * @param TemplateEvent $event
     */
    public function onTemplateProductDetail(TemplateEvent $event)
    {
        $parameters = $event->getParameters();
        /** @var Product $Product */
        $Product = $parameters['Product'];
        
        // レンタル設定の取得
        $RentalProduct = $this->rentalProductRepository->findByProduct($Product);
        
        // レンタル対象商品のみフォームを表示
        if ($RentalProduct && $RentalProduct->isRentalFlg()) {
            $form = $this->formFactory->createBuilder(RentalFrontType::class, null, [
                'rental_product' => $RentalProduct,
            ])->getForm();
            
            $parameters['rental_product'] = $RentalProduct;
            $parameters['rental_form'] = $form->createView();
            
            $event->setParameters($parameters);
            
            // 商品詳細ページにレンタルフォームを追加
            $event->addSnippet('@Rental/front/rental_form.twig');
        }
    }
}
