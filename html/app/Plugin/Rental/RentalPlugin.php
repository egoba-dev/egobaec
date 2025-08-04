<?php

namespace Plugin\Rental;

use Eccube\Plugin\AbstractPluginManager;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class RentalPlugin extends AbstractPluginManager
{
    /**
     * Install the plugin.
     *
     * @param array $meta
     * @param ContainerInterface $container
     */
    public function install(array $meta, ContainerInterface $container)
    {
        // インストール時の処理は主にPluginManagerで行うため空にしています
    }

    /**
     * Uninstall the plugin.
     *
     * @param array $meta
     * @param ContainerInterface $container
     */
    public function uninstall(array $meta, ContainerInterface $container)
    {
        // アンインストール時の処理は主にPluginManagerで行うため空にしています
    }

    /**
     * Enable the plugin.
     *
     * @param array $meta
     * @param ContainerInterface $container
     */
    public function enable(array $meta, ContainerInterface $container)
    {
        // 有効化時の処理（必要であれば記述）
    }

    /**
     * Disable the plugin.
     *
     * @param array $meta
     * @param ContainerInterface $container
     */
    public function disable(array $meta, ContainerInterface $container)
    {
        // 無効化時の処理（必要であれば記述）
    }

    /**
     * プラグインが有効な時に実行される処理
     *
     * @param ContainerInterface $container
     */
    public function boot(ContainerInterface $container)
    {
        // サービスプロバイダー登録
        // テンプレートパス登録
        $twig = $container->get('twig');
        $twig->addPath(__DIR__ . '/Resource/template', 'Rental');
        
        // オーバーライド用テンプレートパスを登録
        $twig->addPath(__DIR__ . '/Resource/template/override', '');
    }
}