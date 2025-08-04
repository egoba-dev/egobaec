<?php

namespace Plugin\CarouselFeature\Form\Type;

use Plugin\CarouselFeature\Entity\CarouselFeature;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarouselListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('keyword', TextType::class, [
                'label' => 'キーワード検索',
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'タイトルまたは内容で検索'
                ]
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'ステータス',
                'choices' => array_merge(
                    ['すべて' => ''],
                    CarouselFeature::getStatusChoices()
                ),
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('link_type', ChoiceType::class, [
                'label' => 'リンクタイプ',
                'choices' => array_merge(
                    ['すべて' => ''],
                    CarouselFeature::getLinkTypeChoices()
                ),
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => false,
            'method' => 'GET',
        ]);
    }
}