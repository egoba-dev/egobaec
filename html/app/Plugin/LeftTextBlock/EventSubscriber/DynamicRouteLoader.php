<?php

namespace Plugin\LeftTextBlock\EventSubscriber;

use Plugin\LeftTextBlock\Repository\LeftTextBlockRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class DynamicRouteLoader implements EventSubscriberInterface
{
    private $leftTextBlockRepository;
    private static $routesAdded = false;

    public function __construct(LeftTextBlockRepository $leftTextBlockRepository)
    {
        $this->leftTextBlockRepository = $leftTextBlockRepository;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 255], // 高優先度で実行
        ];
    }

    public function onKernelRequest(RequestEvent $event)
    {
        // 1回だけ実行
        if (self::$routesAdded) {
            return;
        }
        self::$routesAdded = true;

        try {
            // 有効なテキストブロックを取得
            $textBlocks = $this->leftTextBlockRepository->findBy(['visible' => true]);
            
            $router = $event->getRequest()->get('_router');
            if (!$router) {
                return;
            }

            $routeCollection = $router->getRouteCollection();

            // 各テキストブロックに対してルートを動的に追加
            foreach ($textBlocks as $textBlock) {
                $routeName = 'block_left_text_block_' . $textBlock->getId();
                $path = '/block/left_text_block_' . $textBlock->getId();
                
                // 既に存在する場合はスキップ
                if ($routeCollection->get($routeName)) {
                    continue;
                }

                $route = new Route(
                    $path,
                    [
                        '_controller' => 'Plugin\\LeftTextBlock\\Controller\\BlockController::renderDynamicTextBlock',
                        'id' => $textBlock->getId()
                    ],
                    [],
                    [],
                    '',
                    [],
                    ['GET']
                );

                $routeCollection->add($routeName, $route);
                error_log("Added dynamic route: {$routeName} -> {$path}");
            }
        } catch (\Exception $e) {
            error_log('DynamicRouteLoader Error: ' . $e->getMessage());
        }
    }
}