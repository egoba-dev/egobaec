<?php

namespace Plugin\CarouselFeature\Navigation;

use Eccube\Common\EccubeNav;

/**
 * 管理画面ナビゲーション設定
 */
class AdminNavigationProvider implements EccubeNav
{
    /**
     * ナビゲーション設定を返す
     */
    public static function getNav()
    {
        return [
            'content' => [
                'children' => [
                    'carousel_feature' => [
                        'name' => 'カルーセル特集',
                        'icon' => 'fa-images',
                        'children' => [
                            'carousel_feature_list' => [
                                'name' => '記事一覧',
                                'url' => 'admin_carousel_feature_list',
                                'icon' => 'fa-list'
                            ],
                            'carousel_feature_create' => [
                                'name' => '新規作成',
                                'url' => 'admin_carousel_feature_create',
                                'icon' => 'fa-plus'
                            ],
                            'carousel_feature_config' => [
                                'name' => '表示設定',
                                'url' => 'admin_carousel_feature_config',
                                'icon' => 'fa-cog'
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}