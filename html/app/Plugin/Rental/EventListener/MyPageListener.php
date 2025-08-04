<?php
namespace Plugin\Rental\EventListener;

use Eccube\Event\TemplateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyPageListener implements EventSubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Mypage/navi.twig' => ['onMypageNaviRender'],
            'Mypage/index.twig' => ['onMypageRender', 100],  // 優先度を高く設定
        ];
    }

    /**
     * マイページナビにレンタル履歴へのリンクを追加
     *
     * @param TemplateEvent $event
     */
    public function onMypageNaviRender(TemplateEvent $event)
    {
        $twig = '@Rental/front/mypage_navi_add.twig';
        $event->addSnippet($twig);
    }

    /**
     * マイページトップにレンタル情報を表示
     *
     * @param TemplateEvent $event
     */
    public function onMypageRender(TemplateEvent $event)
    {
        // レンタル情報のテンプレートを追加
        $twig = '@Rental/front/mypage_rental_info.twig';
        $event->addSnippet($twig);
        
        // CSSは直接HTMLに埋め込む方法で対応
        $event->setParameter('rental_css', true);
    }
}