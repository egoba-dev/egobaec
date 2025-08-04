<?php

namespace Plugin\Rental\Form\Type\Admin;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RentalSearchType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // 予約番号
            ->add('id', TextType::class, [
                'label' => 'rental.admin.search.reservation_id',
                'required' => false,
            ])
            // 商品名
            ->add('product_name', TextType::class, [
                'label' => 'rental.admin.search.product_name',
                'required' => false,
            ])
            // 顧客名
            ->add('customer_name', TextType::class, [
                'label' => 'rental.admin.search.customer_name',
                'required' => false,
            ])
            // ステータス
            ->add('rental_status_id', ChoiceType::class, [
                'label' => 'rental.admin.search.status',
                'choices' => [
                    'rental.admin.order.status.reserved' => 1,
                    'rental.admin.order.status.renting' => 2,
                    'rental.admin.order.status.returned' => 3,
                    'rental.admin.order.status.overdue' => 4,
                    'rental.admin.order.status.canceled' => 5,
                ],
                'expanded' => true,
                'multiple' => true,
                'required' => false,
            ])
            // 期間（From）
            ->add('start_date_from', DateType::class, [
                'label' => 'rental.admin.search.start_date_from',
                'required' => false,
                'input' => 'datetime',
                'widget' => 'single_text',
            ])
            // 期間（To）
            ->add('start_date_to', DateType::class, [
                'label' => 'rental.admin.search.start_date_to',
                'required' => false,
                'input' => 'datetime',
                'widget' => 'single_text',
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => true,
        ]);
    }
}