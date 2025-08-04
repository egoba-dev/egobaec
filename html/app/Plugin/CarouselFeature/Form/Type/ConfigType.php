<?php

namespace Plugin\CarouselFeature\Form\Type;

use Plugin\CarouselFeature\Entity\CarouselConfig;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ConfigType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('display_count', IntegerType::class, [
                'label' => '表示枚数',
                'attr' => [
                    'min' => 1,
                    'max' => 10,
                    'class' => 'form-control'
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Range(['min' => 1, 'max' => 10])
                ]
            ])
            ->add('auto_play', CheckboxType::class, [
                'label' => '自動再生',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input'
                ]
            ])
            ->add('auto_play_interval', IntegerType::class, [
                'label' => '自動再生間隔（ミリ秒）',
                'attr' => [
                    'min' => 1000,
                    'max' => 30000,
                    'class' => 'form-control'
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Range(['min' => 1000, 'max' => 30000])
                ]
            ])
            ->add('show_navigation', CheckboxType::class, [
                'label' => 'ナビゲーション表示',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input'
                ]
            ])
            ->add('show_indicators', CheckboxType::class, [
                'label' => 'インジケーター表示',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input'
                ]
            ])
            ->add('enable_touch_swipe', CheckboxType::class, [
                'label' => 'タッチスワイプ',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input'
                ]
            ])
            ->add('enable_keyboard_nav', CheckboxType::class, [
                'label' => 'キーボードナビゲーション',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input'
                ]
            ])
            ->add('transition_effect', ChoiceType::class, [
                'label' => 'トランジション効果',
                'choices' => CarouselConfig::getTransitionEffectChoices(),
                'attr' => [
                    'class' => 'form-select'
                ]
            ])
            ->add('transition_duration', IntegerType::class, [
                'label' => 'トランジション時間（ミリ秒）',
                'attr' => [
                    'min' => 100,
                    'max' => 2000,
                    'class' => 'form-control'
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Range(['min' => 100, 'max' => 2000])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CarouselConfig::class,
        ]);
    }
}