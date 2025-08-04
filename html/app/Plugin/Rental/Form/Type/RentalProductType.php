<?php

namespace Plugin\Rental\Form\Type;

use Plugin\Rental\Entity\RentalProduct;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
// レンタル商品設定用のフォームタイプです。

class RentalProductType extends AbstractType
{
    /**
     * フォームの構築
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rental_flg', CheckboxType::class, [
                'label' => 'rental.admin.product.rental_flg',
                'required' => false,
                'mapped' => true,
            ])
            ->add('rental_price_daily', MoneyType::class, [
                'label' => 'rental.admin.product.rental_price_daily',
                'required' => false,
                'constraints' => [
                    new Assert\GreaterThanOrEqual([
                        'value' => 0,
                        'message' => 'rental.admin.product.greater_than_zero',
                    ]),
                ],
                'currency' => 'JPY',
                'scale' => 0,
                'mapped' => true,
            ])
            ->add('rental_price_weekly', MoneyType::class, [
                'label' => 'rental.admin.product.rental_price_weekly',
                'required' => false,
                'constraints' => [
                    new Assert\GreaterThanOrEqual([
                        'value' => 0,
                        'message' => 'rental.admin.product.greater_than_zero',
                    ]),
                ],
                'currency' => 'JPY',
                'scale' => 0,
                'mapped' => true,
            ])
            ->add('rental_price_monthly', MoneyType::class, [
                'label' => 'rental.admin.product.rental_price_monthly',
                'required' => false,
                'constraints' => [
                    new Assert\GreaterThanOrEqual([
                        'value' => 0,
                        'message' => 'rental.admin.product.greater_than_zero',
                    ]),
                ],
                'currency' => 'JPY',
                'scale' => 0,
                'mapped' => true,
            ])
            ->add('rental_max_days', IntegerType::class, [
                'label' => 'rental.admin.product.rental_max_days',
                'required' => false,
                'constraints' => [
                    new Assert\GreaterThanOrEqual([
                        'value' => 1,
                        'message' => 'rental.admin.product.greater_than_zero',
                    ]),
                ],
                'mapped' => true,
            ]);
    }

    /**
     * オプションの設定
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RentalProduct::class,
        ]);
    }
}