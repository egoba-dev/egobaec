<?php

namespace Plugin\Rental\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Eccube\Form\Type\Master\PrefType;
use Eccube\Form\Type\PhoneNumberType;
use Eccube\Form\Type\PostalType;
use Eccube\Form\Type\NameType;
use Eccube\Form\Type\KanaType;
use Eccube\Form\Type\RepeatedEmailType;

use Eccube\Form\Type\AddressType; 

class RentalPaymentType extends AbstractType
{
    /**
     * 支払いタイプのフォーム設定
     * 
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // 支払い方法のみに簡略化
        $builder->add('payment_method', ChoiceType::class, [
            'choices' => [
                '現金払い' => 'cash',
                '代金引換' => 'cod'
            ],
            'expanded' => true,  // ← 正しいスペル
            'multiple' => false,
            'required' => true,
        ]);
    }
    /**
     * オプション設定
     * 
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);

        // 各フィールドの独自オプションを設定
        $resolver->setDefined([
            'name_options',
            'kana_options',
            'postal_code_options',
            'address_options',
            'phone_number_options',
            'email_options',
        ]);
    }
}