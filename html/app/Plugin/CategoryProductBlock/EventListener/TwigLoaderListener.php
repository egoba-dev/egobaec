<?php

namespace Plugin\CategoryProductBlock\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Loader\FilesystemLoader;

class TwigLoaderListener implements EventSubscriberInterface
{
    /**
     * @var FilesystemLoader
     */
    protected $twigLoader;

    /**
     * @var bool
     */
    protected static $pathsAdded = false;

    public function __construct(FilesystemLoader $twigLoader)
    {
        $this->twigLoader = $twigLoader;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 255],
        ];
    }

 public function onKernelRequest(RequestEvent $event)
{
    static $initialized = false;
    if ($initialized) return;
    
    $pluginRoot = __DIR__ . '/..';
    
    // プラグイン内の全てのテンプレートパスを追加
    $internalPaths = [
        $pluginRoot . '/Resource/template',
        $pluginRoot . '/Resource/template/Block',
        $pluginRoot . '/Resource/template/default',
        $pluginRoot . '/Resource/template/default/Block',
        $pluginRoot . '/Block',
        $pluginRoot, // プラグインルート
    ];
    
    foreach ($internalPaths as $path) {
        if (is_dir($path)) {
            try {
                // 名前空間付きとなしの両方で追加
                $this->twigLoader->addPath($path, 'CategoryProductBlock');
                $this->twigLoader->prependPath($path);
                error_log('[CategoryProductBlock] Added internal path: ' . $path);
            } catch (\Exception $e) {
                error_log('[CategoryProductBlock] Failed to add internal path: ' . $e->getMessage());
            }
        }
    }
    
    $initialized = true;
}
}