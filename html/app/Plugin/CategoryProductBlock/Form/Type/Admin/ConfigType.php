<?php

namespace Plugin\CategoryProductBlock\Form\Type\Admin;

use Plugin\CategoryProductBlock\Entity\Config;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ConfigType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('display_count', IntegerType::class, [
                'label' => '表示商品数',
                'help' => '1カテゴリーあたりの表示商品数を設定します', // help設定
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Range(['min' => 1, 'max' => 100]),
                ],
            ])
            ->add('columns', IntegerType::class, [
                'label' => '列数',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\GreaterThan(['value' => 0]),
                    new Assert\LessThanOrEqual(['value' => 10]),
                ],
                'attr' => [
                    'min' => 1,
                    'max' => 10,
                    'class' => 'form-control',
                ],
                'help' => '1〜10の範囲で設定してください',
            ])
            ->add('rows', IntegerType::class, [
                'label' => '行数',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\GreaterThan(['value' => 0]),
                    new Assert\LessThanOrEqual(['value' => 10]),
                ],
                'attr' => [
                    'min' => 1,
                    'max' => 10,
                    'class' => 'form-control',
                ],
                'help' => '1〜10の範囲で設定してください',
            ])
            ->add('show_category_tags', CheckboxType::class, [
                'label' => 'カテゴリータグを表示',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input',
                ],
            ])
            ->add('show_product_list_button', CheckboxType::class, [
                'label' => '商品一覧ボタンを表示',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Config::class,
        ]);
    }
}