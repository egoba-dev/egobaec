<?php

namespace Plugin\Rental;

use Eccube\Common\EccubeNav;

class Nav implements EccubeNav
{
    /** @var \Eccube\Common\EccubeConfig */
    private static $eccubeConfig;

    /**
     * コンストラクタ
     *
     * @param \Eccube\Common\EccubeConfig $eccubeConfig
     */
    public function __construct(\Eccube\Common\EccubeConfig $eccubeConfig)
    {
        // 設定を静的プロパティに保存
        self::$eccubeConfig = $eccubeConfig;
    }

    /**
     * {@inheritdoc}
     */
    public static function getNav()
    {
        return [
            'rental' => [
                'name' => 'rental.admin.rental.title',
                'icon' => 'fa-clock',
                'children' => [
                    'rental_active' => [
                        'name' => 'rental.admin.rental.list_title',
                        'url' => 'admin_rental_index',
                    ],
                    'rental_overdue' => [
                        'name' => 'rental.admin.overdue.title',
                        'url' => 'admin_rental_overdue',
                    ],
                    'rental_history' => [
                        'name' => 'rental.admin.history.title',
                        'url' => 'admin_rental_history',
                    ],
                    'rental_config' => [
                        'name' => 'rental.admin.config.title',
                        'url' => 'admin_rental_config',
                    ],
                ],
            ],
        ];
    }
}