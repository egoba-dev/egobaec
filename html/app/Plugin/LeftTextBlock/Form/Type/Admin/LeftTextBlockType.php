<?php

namespace Plugin\LeftTextBlock\Form\Type\Admin;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Plugin\LeftTextBlock\Entity\LeftTextBlock;

class LeftTextBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'タイトル',
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['max' => 255])
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'タイトルを入力してください'
                ]
            ])
            ->add('content', TextareaType::class, [
                'label' => 'コンテンツ',
                'required' => false, // 必須から任意に変更
                'attr' => [
                    'rows' => 10,
                    'class' => 'form-control',
                    'placeholder' => 'コンテンツを入力してください（HTMLタグ使用可能）'
                ]
            ])
            ->add('show_content', CheckboxType::class, [
                'label' => 'コンテンツを表示する',
                'required' => false,
                'mapped' => true, // Entityのプロパティにマップする
                'attr' => [
                    'class' => 'form-check-input'
                ],
                'help' => 'チェックを外すとタイトルのみ表示されます'
            ])
            ->add('font_size', IntegerType::class, [
                'label' => 'フォントサイズ (px)',
                'required' => false,
                'attr' => [
                    'min' => 10,
                    'max' => 72,
                    'class' => 'form-control'
                ],
                'constraints' => [
                    new Assert\Range(['min' => 10, 'max' => 72])
                ]
            ])
            ->add('font_family', ChoiceType::class, [
                'label' => 'フォントファミリー',
                'required' => false,
                'choices' => [
                    'デフォルト' => 'inherit',
                    'ゴシック体' => 'sans-serif',
                    '明朝体' => 'serif',
                    'Arial' => 'Arial, sans-serif',
                    'Times New Roman' => '"Times New Roman", serif',
                    'Georgia' => 'Georgia, serif',
                    'Verdana' => 'Verdana, sans-serif',
                    'Helvetica' => 'Helvetica, Arial, sans-serif',
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('sort_no', IntegerType::class, [
                'label' => '表示順',
                'required' => false,
                'attr' => [
                    'min' => 0,
                    'class' => 'form-control'
                ],
                'help' => '数値が小さいほど上位に表示されます'
            ])
            ->add('visible', CheckboxType::class, [
                'label' => '表示する',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LeftTextBlock::class,
        ]);
    }
}