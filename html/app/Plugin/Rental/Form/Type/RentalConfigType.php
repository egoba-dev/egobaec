<?php

namespace Plugin\Rental\Form\Type;

use Plugin\Rental\Entity\RentalConfig;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
// レンタル設定用のフォームタイプです。

class RentalConfigType extends AbstractType
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
            ->add('rental_terms', TextareaType::class, [
                'label' => 'rental.admin.config.rental_terms',
                'required' => false,
                'attr' => [
                    'rows' => 8,
                ],
            ])
            ->add('auto_approval', CheckboxType::class, [
                'label' => 'rental.admin.config.auto_approval',
                'required' => false,
            ])
            ->add('default_max_days', IntegerType::class, [
                'label' => 'rental.admin.config.default_max_days',
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\GreaterThan([
                        'value' => 0,
                        'message' => 'rental.admin.config.greater_than_zero',
                    ]),
                ],
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
            'data_class' => RentalConfig::class,
        ]);
    }
}