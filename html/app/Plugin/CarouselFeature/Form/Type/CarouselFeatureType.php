<?php

namespace Plugin\CarouselFeature\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Plugin\CarouselFeature\Entity\CarouselFeature;

class CarouselFeatureType extends AbstractType
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
                ]
            ])
            ->add('content', TextareaType::class, [
                'label' => 'コンテンツ',
                'required' => false,
                'attr' => [
                    'rows' => 5
                ]
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'ステータス',
                'choices' => CarouselFeature::getStatusChoices(),
                'required' => true
            ])
            ->add('link_type', ChoiceType::class, [
                'label' => 'リンクタイプ',
                'choices' => CarouselFeature::getLinkTypeChoices(),
                'required' => true
            ])
            ->add('link_url', TextType::class, [
                'label' => 'リンクURL',
                'required' => false,
                'constraints' => [
                    new Assert\Length(['max' => 1024])
                ]
            ])
            ->add('link_text', TextType::class, [
                'label' => 'リンクテキスト',
                'required' => false,
                'constraints' => [
                    new Assert\Length(['max' => 255])
                ]
            ])
            ->add('Product', EntityType::class, [
                'class' => 'Eccube\\Entity\\Product',
                'label' => '商品',
                'required' => false,
                'placeholder' => '商品を選択してください',
                'choice_label' => 'name'
            ])
            // 画像フィールド（複数選択可能）
            ->add('images', FileType::class, [
                'label' => '画像',
                'required' => false,
                'multiple' => true,
                'mapped' => false, // エンティティにマップしない
                'attr' => [
                    'accept' => 'image/*'
                ],
                'constraints' => [
                    new Assert\All([
                        new Assert\File([
                            'maxSize' => '10M',
                            'mimeTypes' => [
                                'image/jpeg',
                                'image/png',
                                'image/gif',
                                'image/webp'
                            ],
                            'mimeTypesMessage' => 'サポートされていないファイル形式です。'
                        ])
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CarouselFeature::class,
        ]);
    }
}