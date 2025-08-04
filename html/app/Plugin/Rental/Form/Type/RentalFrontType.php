<?php

namespace Plugin\Rental\Form\Type;

use Plugin\Rental\Entity\RentalProduct;
use Plugin\Rental\Service\RentalCalculationService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class RentalFrontType extends AbstractType
{
    /**
     * @var RentalCalculationService
     */
    protected $calculationService;

    /**
     * コンストラクタ
     *
     * @param RentalCalculationService $calculationService
     */
    public function __construct(RentalCalculationService $calculationService)
    {
        $this->calculationService = $calculationService;
    }

    /**
     * フォームの構築
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $RentalProduct = $options['rental_product'];
        $tomorrow = new \DateTime('+1 day');
        
        $builder
            ->add('product_id', HiddenType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('product_class_id', HiddenType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('rental_start_date', DateType::class, [
                'label' => 'rental.front.rental_start_date',
                'required' => true,
                'input' => 'string',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'data' => $tomorrow->format('Y-m-d'),
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\GreaterThanOrEqual([
                        'value' => $tomorrow->format('Y-m-d'),
                        'message' => 'rentals.front.start_date_must_be_tomorrow',
                    ]),
                ],
            ])
            // 以下に数量フィールドを追加（メソッドチェーンの一部として）
            ->add('quantity', IntegerType::class, [
                'label' => 'rental.front.quantity',
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Range(['min' => 1, 'max' => 10]),
                ],
                'data' => 1, // デフォルト値
                'attr' => [
                    'min' => 1,
                    'max' => 10,
                ],
            ]);
        
        // レンタル期間のオプションを設定する
        if ($RentalProduct) {
            $periodOptions = $this->calculationService->getRentalPeriodOptions($RentalProduct);
            
            $builder->add('rental_period', ChoiceType::class, [
                'label' => 'rental.front.rental_period',
                'required' => true,
                'choices' => array_flip($periodOptions),
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ]);
            
            // オプション選択肢を追加
            $builder->add('options', ChoiceType::class, [
                'label' => 'rental.front.options',
                'required' => false,
                'multiple' => true,
                'expanded' => true,
                'choices' => [
                    'rental.option.insurance' => 'insurance',
                    'rental.option.extension' => 'extension',
                    'rental.option.delivery' => 'delivery',
                ],
            ]);
            
            // 備考欄を追加
            $builder->add('remarks', TextareaType::class, [
                'label' => 'rental.front.remarks',
                'required' => false,
            ]);
        }
    }
    
    /**
     * オプションの設定
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
        ]);
        
        $resolver->setRequired(['rental_product']);
        $resolver->setAllowedTypes('rental_product', [RentalProduct::class, 'null']);
    }
}