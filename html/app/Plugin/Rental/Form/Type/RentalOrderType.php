<?php

namespace Plugin\Rental\Form\Type;

use Plugin\Rental\Entity\RentalOrder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class RentalOrderType extends AbstractType
{
    /**
     * フォームの構築
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rental_start_date', DateTimeType::class, [
                'label' => 'rental.admin.rental.rental_start_date',
                'required' => true,
                'input' => 'datetime',
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'yyyy-MM-dd HH:mm',
                'attr' => [
                    'class' => 'datetimepicker-input',
                    'data-target' => '#rental_start_date',
                    'data-toggle' => 'datetimepicker',
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('rental_end_date', DateTimeType::class, [
                'label' => 'rental.admin.rental.rental_end_date',
                'required' => true,
                'input' => 'datetime',
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'yyyy-MM-dd HH:mm',
                'attr' => [
                    'class' => 'datetimepicker-input',
                    'data-target' => '#rental_end_date',
                    'data-toggle' => 'datetimepicker',
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\GreaterThan([
                        'propertyPath' => 'parent.all[rental_start_date].data',
                        'message' => 'rental.admin.rental.end_date_must_be_greater',
                    ]),
                ],
            ])
            ->add('rental_status_id', ChoiceType::class, [
                'label' => 'rental.admin.rental.rental_status',
                'required' => true,
                'choices' => [
                    'rental.admin.rental.status.reserved' => 1,
                    'rental.admin.rental.status.renting' => 2,
                    'rental.admin.rental.status.returned' => 3,
                    'rental.admin.rental.status.overdue' => 4,
                    'rental.admin.rental.status.canceled' => 5,
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ]);
        
        // 返却済みまたは延滞の場合は返却日を追加
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $form = $event->getForm();
            $data = $event->getData();
            
            if ($data && in_array($data->getRentalStatusId(), [3, 4])) {
                $form->add('return_date', DateTimeType::class, [
                    'label' => 'rental.admin.rental.return_date',
                    'required' => true,
                    'input' => 'datetime',
                    'widget' => 'single_text',
                    'html5' => false,
                    'format' => 'yyyy-MM-dd HH:mm',
                    'attr' => [
                        'class' => 'datetimepicker-input',
                        'data-target' => '#return_date',
                        'data-toggle' => 'datetimepicker',
                    ],
                    'constraints' => [
                        new Assert\NotBlank(),
                    ],
                ]);
            }
        });
    }

    /**
     * オプションの設定
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RentalOrder::class,
        ]);
    }
}