<?php

namespace Plugin\Rental;

use Eccube\Plugin\AbstractPluginManager;
use Psr\Container\ContainerInterface;

/**
 * プラグイン管理クラス
 */
class PluginManager extends AbstractPluginManager
{
    /**
     * プラグインインストール時の処理
     *
     * @param array $meta プラグインの設定情報
     * @param ContainerInterface $container コンテナ
     */
    public function install(array $meta, ContainerInterface $container)
    {
        // 親クラスのインストール処理を実行
        parent::install($meta, $container);
    }

    /**
     * プラグインアップデート時の処理
     *
     * @param array $meta プラグインの設定情報
     * @param ContainerInterface $container コンテナ
     */
    public function update(array $meta, ContainerInterface $container)
    {
        // 親クラスのアップデート処理を実行
        parent::update($meta, $container);
    }

    /**
     * プラグイン有効化時の処理
     *
     * @param array $meta プラグインの設定情報
     * @param ContainerInterface $container コンテナ
     */
    public function enable(array $meta, ContainerInterface $container)
    {
        // 親クラスの有効化処理を実行
        parent::enable($meta, $container);
        
        // EntityExtensionは既にEntity/Extensionディレクトリにあるので処理不要
    }

    /**
     * プラグイン無効化時の処理
     *
     * @param array $meta プラグインの設定情報
     * @param ContainerInterface $container コンテナ
     */
    public function disable(array $meta, ContainerInterface $container)
    {
        // 親クラスの無効化処理を実行
        parent::disable($meta, $container);
        
        // EntityExtensionは自動で無効化されるので処理不要
    }

    /**
     * プラグイン削除時の処理
     *
     * @param array $meta プラグインの設定情報
     * @param ContainerInterface $container コンテナ
     */
    public function uninstall(array $meta, ContainerInterface $container)
    {
        // 親クラスの削除処理を実行
        parent::uninstall($meta, $container);
    }
}