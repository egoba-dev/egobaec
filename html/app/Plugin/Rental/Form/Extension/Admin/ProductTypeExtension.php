<?php

namespace Plugin\Rental\Form\Extension\Admin;

use Eccube\Form\Type\Admin\ProductType;
use Plugin\Rental\Entity\RentalProduct;
use Plugin\Rental\Form\Type\RentalProductType;
use Plugin\Rental\Repository\RentalProductRepository;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Psr\Log\LoggerInterface;

class ProductTypeExtension extends AbstractTypeExtension
{
    /**
     * @var RentalProductRepository
     */
    protected $rentalProductRepository;
    
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * コンストラクタ
     *
     * @param RentalProductRepository $rentalProductRepository
     * @param LoggerInterface $logger
     */
    public function __construct(RentalProductRepository $rentalProductRepository, LoggerInterface $logger)
    {
        $this->rentalProductRepository = $rentalProductRepository;
        $this->logger = $logger;
    }

    /**
     * 拡張対象のフォームタイプを返す
     *
     * @return string
     */
    public static function getExtendedTypes(): iterable
    {
        yield ProductType::class;
    }

    /**
     * フォームの構築処理
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
{
    
    // 商品フォームにレンタル設定用のフォームを埋め込む
    $builder->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event) {
        $form = $event->getForm();
        $Product = $event->getData();
        
        
        
        // 新規登録時は空のエンティティを作成
        $RentalProduct = null;
        if ($Product && $Product->getId()) {
            $RentalProduct = $this->rentalProductRepository->findByProduct($Product);
        }
        
        if (!$RentalProduct) {
            $RentalProduct = new RentalProduct();
            if ($Product && $Product->getId()) {
                $RentalProduct->setProduct($Product);
            }
        }
        
        // レンタル設定フォームを追加
        $form->add('rental_product', RentalProductType::class, [
            'mapped' => false,
            'data' => $RentalProduct,
        ]);
        
        
    });
    
}
}