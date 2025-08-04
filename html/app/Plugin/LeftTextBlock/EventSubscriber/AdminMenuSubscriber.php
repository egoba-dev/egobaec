<?php

namespace Plugin\LeftTextBlock\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * EC-CUBE 5では Nav.php と nav.yaml でメニューを追加するため、
 * このEventSubscriberは無効化
 */
class AdminMenuSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        // EC-CUBE 5では使用しない
        return [];
    }
}