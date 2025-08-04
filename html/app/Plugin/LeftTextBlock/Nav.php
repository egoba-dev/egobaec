<?php

namespace Plugin\LeftTextBlock;

use Eccube\Common\EccubeNav;

class Nav implements EccubeNav
{
    /**
     * @return array
     */
    public static function getNav()
    {
        return [
            'content' => [
                'children' => [
                    'left_text_block' => [
                        'name' => '段落テキストブロック',
                        'url' => 'plugin_left_text_block_admin_index',
                    ],
                ],
            ],
        ];
    }
}