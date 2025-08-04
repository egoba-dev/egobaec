-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql3107.db.sakura.ne.jp
-- 生成日時: 2025 年 8 月 04 日 20:04
-- サーバのバージョン： 8.0.40
-- PHP のバージョン: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `asa3150_demo_ec_cube`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_authority_role`
--

CREATE TABLE `dtb_authority_role` (
  `id` int UNSIGNED NOT NULL,
  `authority_id` smallint UNSIGNED DEFAULT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `deny_url` varchar(4000) COLLATE utf8mb4_bin NOT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_base_info`
--

CREATE TABLE `dtb_base_info` (
  `id` int UNSIGNED NOT NULL,
  `country_id` smallint UNSIGNED DEFAULT NULL,
  `pref_id` smallint UNSIGNED DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `company_kana` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `postal_code` varchar(8) COLLATE utf8mb4_bin DEFAULT NULL,
  `addr01` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `addr02` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `phone_number` varchar(14) COLLATE utf8mb4_bin DEFAULT NULL,
  `business_hour` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `email01` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `email02` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `email03` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `email04` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `shop_kana` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `shop_name_eng` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `good_traded` varchar(4000) COLLATE utf8mb4_bin DEFAULT NULL,
  `message` varchar(4000) COLLATE utf8mb4_bin DEFAULT NULL,
  `delivery_free_amount` decimal(12,2) UNSIGNED DEFAULT NULL,
  `delivery_free_quantity` int UNSIGNED DEFAULT NULL,
  `option_mypage_order_status_display` tinyint(1) NOT NULL DEFAULT '1',
  `option_nostock_hidden` tinyint(1) NOT NULL DEFAULT '0',
  `option_favorite_product` tinyint(1) NOT NULL DEFAULT '1',
  `option_product_delivery_fee` tinyint(1) NOT NULL DEFAULT '0',
  `invoice_registration_number` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `option_product_tax_rule` tinyint(1) NOT NULL DEFAULT '0',
  `option_customer_activate` tinyint(1) NOT NULL DEFAULT '1',
  `option_remember_me` tinyint(1) NOT NULL DEFAULT '1',
  `authentication_key` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `php_path` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `option_point` tinyint(1) NOT NULL DEFAULT '1',
  `basic_point_rate` decimal(10,0) UNSIGNED DEFAULT '1',
  `point_conversion_rate` decimal(10,0) UNSIGNED DEFAULT '1',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `site_kit_site_id` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `site_kit_site_secret` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_base_info`
--

INSERT INTO `dtb_base_info` (`id`, `country_id`, `pref_id`, `company_name`, `company_kana`, `postal_code`, `addr01`, `addr02`, `phone_number`, `business_hour`, `email01`, `email02`, `email03`, `email04`, `shop_name`, `shop_kana`, `shop_name_eng`, `update_date`, `good_traded`, `message`, `delivery_free_amount`, `delivery_free_quantity`, `option_mypage_order_status_display`, `option_nostock_hidden`, `option_favorite_product`, `option_product_delivery_fee`, `invoice_registration_number`, `option_product_tax_rule`, `option_customer_activate`, `option_remember_me`, `authentication_key`, `php_path`, `option_point`, `basic_point_rate`, `point_conversion_rate`, `discriminator_type`, `site_kit_site_id`, `site_kit_site_secret`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'egoba.satoshi@gmail.com', 'egoba.satoshi@gmail.com', 'egoba.satoshi@gmail.com', 'egoba.satoshi@gmail.com', 'RentalService', NULL, NULL, '2025-06-09 18:09:59', NULL, NULL, NULL, NULL, 1, 0, 1, 0, NULL, 0, 1, 1, 'qzP4ZQC16Ep6WRzZhPQ8roBWyKNf0TZVFqxqLPYO', NULL, 1, 1, 1, 'baseinfo', NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_block`
--

CREATE TABLE `dtb_block` (
  `id` int UNSIGNED NOT NULL,
  `device_type_id` smallint UNSIGNED DEFAULT NULL,
  `block_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `use_controller` tinyint(1) NOT NULL DEFAULT '0',
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_block`
--

INSERT INTO `dtb_block` (`id`, `device_type_id`, `block_name`, `file_name`, `use_controller`, `deletable`, `create_date`, `update_date`, `discriminator_type`) VALUES
(1, 10, 'カート', 'cart', 0, 0, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'block'),
(2, 10, 'カテゴリ', 'category', 0, 0, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'block'),
(3, 10, 'カテゴリナビ(PC)', 'category_nav_pc', 0, 0, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'block'),
(4, 10, 'カテゴリナビ(SP)', 'category_nav_sp', 0, 0, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'block'),
(5, 10, '新入荷商品特集', 'eyecatch', 0, 0, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'block'),
(6, 10, 'フッター', 'footer', 0, 0, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'block'),
(7, 10, 'ヘッダー(商品検索・ログインナビ・カート)', 'header', 0, 0, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'block'),
(8, 10, 'ログインナビ(共通)', 'login', 0, 0, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'block'),
(9, 10, 'ログインナビ(SP)', 'login_sp', 0, 0, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'block'),
(10, 10, 'ロゴ', 'logo', 0, 0, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'block'),
(11, 10, '新着商品', 'new_item', 0, 0, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'block'),
(12, 10, '新着情報', 'news', 0, 0, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'block'),
(13, 10, '商品検索', 'search_product', 1, 0, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'block'),
(14, 10, 'トピック', 'topic', 0, 0, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'block'),
(17, 10, 'カレンダー', 'calendar', 1, 0, '2021-03-16 12:00:00', '2021-03-16 12:00:00', 'block'),
(18, 10, 'おすすめ商品', 'recommend_product_block', 0, 0, '2025-05-16 08:56:02', '2025-05-16 08:56:02', 'block'),
(19, NULL, 'カテゴリー商品ブロック', 'category_product_block', 0, 0, '2025-05-30 07:36:02', '2025-05-30 07:36:02', 'block'),
(22, 10, 'TOSHIBA特集', 'maker_product_684297396c80d', 1, 1, '2025-06-06 07:22:33', '2025-06-06 07:22:33', 'block'),
(23, 10, 'SONY特集', 'maker_product_68429f552eec2', 1, 1, '2025-06-06 07:57:09', '2025-06-06 07:57:09', 'block'),
(24, 10, 'SHARP特集', 'maker_product_68467e0d311b0', 1, 1, '2025-06-09 06:24:13', '2025-06-09 06:24:13', 'block'),
(25, 10, '左寄せテキスト: 人気メーカー・シリーズ', 'left_text_block_19', 1, 1, '2025-06-18 16:39:23', '2025-06-18 16:44:27', 'block'),
(26, 10, '左寄せテキスト: ジャンル別売れ筋商品', 'left_text_block_20', 1, 1, '2025-06-18 16:40:18', '2025-06-18 16:45:40', 'block'),
(27, 10, '左寄せテキスト: 続々入荷中！新着商品', 'left_text_block_21', 1, 1, '2025-06-18 16:48:56', '2025-06-18 16:50:16', 'block'),
(1000, NULL, 'カルーセル特集', 'carousel_feature', 1, 0, '2025-07-01 05:24:59', '2025-07-01 05:24:59', 'block'),
(1001, 10, 'カスタム新着情報', 'custom_news', 0, 1, '2025-07-01 08:32:40', '2025-07-01 08:41:18', 'block'),
(1002, 10, '左寄せテキスト: 最新ニュース', 'left_text_block_22', 1, 1, '2025-07-01 17:45:36', '2025-07-01 17:45:36', 'block'),
(1003, 10, 'カスタム利用方法', 'use_method', 0, 1, '2025-07-02 07:45:32', '2025-07-02 07:54:39', 'block'),
(1004, 10, 'アプリ紹介', 'aplication_ad', 0, 1, '2025-07-03 07:28:30', '2025-07-03 07:31:01', 'block'),
(1005, 10, 'よくあるご質問', 'question_list', 0, 1, '2025-07-03 07:31:43', '2025-07-03 07:31:43', 'block'),
(1006, 10, 'カスタムフッター', 'custom_footer', 0, 1, '2025-07-04 08:12:50', '2025-07-04 08:12:50', 'block'),
(1007, 10, 'カスタムヘッダー', 'custom_header', 0, 1, '2025-07-07 05:09:53', '2025-07-07 05:09:53', 'block'),
(1008, 10, 'カスタムトピック', 'custom_topic', 0, 1, '2025-07-08 06:22:47', '2025-07-08 06:22:47', 'block'),
(1009, 10, 'カスタムキャンペーン', 'custom_campaign', 0, 1, '2025-07-08 07:17:20', '2025-07-08 07:17:20', 'block'),
(1010, 10, 'カスタム広告', 'custom_advertisement', 0, 1, '2025-07-08 07:39:46', '2025-07-08 07:39:46', 'block'),
(1011, 10, 'メーカー一覧', 'maker_lineup', 0, 1, '2025-07-11 05:27:36', '2025-07-11 05:27:36', 'block');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_block_position`
--

CREATE TABLE `dtb_block_position` (
  `section` int UNSIGNED NOT NULL,
  `block_id` int UNSIGNED NOT NULL,
  `layout_id` int UNSIGNED NOT NULL,
  `block_row` int UNSIGNED DEFAULT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_block_position`
--

INSERT INTO `dtb_block_position` (`section`, `block_id`, `layout_id`, `block_row`, `discriminator_type`) VALUES
(3, 3, 2, 3, 'blockposition'),
(3, 7, 0, 0, 'blockposition'),
(3, 7, 2, 1, 'blockposition'),
(3, 10, 2, 2, 'blockposition'),
(3, 1007, 1, 0, 'blockposition'),
(4, 1000, 1, 0, 'blockposition'),
(7, 2, 0, 8, 'blockposition'),
(7, 5, 0, 7, 'blockposition'),
(7, 11, 0, 1, 'blockposition'),
(7, 11, 1, 4, 'blockposition'),
(7, 12, 0, 0, 'blockposition'),
(7, 14, 0, 3, 'blockposition'),
(7, 18, 2, 1, 'blockposition'),
(7, 19, 0, 2, 'blockposition'),
(7, 19, 1, 7, 'blockposition'),
(7, 22, 0, 6, 'blockposition'),
(7, 22, 1, 12, 'blockposition'),
(7, 23, 0, 5, 'blockposition'),
(7, 23, 1, 11, 'blockposition'),
(7, 24, 0, 4, 'blockposition'),
(7, 24, 1, 10, 'blockposition'),
(7, 25, 1, 9, 'blockposition'),
(7, 26, 1, 6, 'blockposition'),
(7, 27, 1, 3, 'blockposition'),
(7, 1001, 1, 1, 'blockposition'),
(7, 1002, 1, 0, 'blockposition'),
(7, 1003, 1, 14, 'blockposition'),
(7, 1004, 1, 16, 'blockposition'),
(7, 1005, 1, 15, 'blockposition'),
(7, 1008, 1, 13, 'blockposition'),
(7, 1009, 1, 5, 'blockposition'),
(7, 1010, 1, 8, 'blockposition'),
(7, 1011, 1, 2, 'blockposition'),
(10, 6, 0, 0, 'blockposition'),
(10, 6, 2, 1, 'blockposition'),
(10, 1006, 1, 0, 'blockposition'),
(11, 4, 0, 1, 'blockposition'),
(11, 4, 1, 1, 'blockposition'),
(11, 4, 2, 2, 'blockposition'),
(11, 9, 0, 2, 'blockposition'),
(11, 9, 1, 2, 'blockposition'),
(11, 9, 2, 3, 'blockposition'),
(11, 13, 0, 0, 'blockposition'),
(11, 13, 1, 0, 'blockposition'),
(11, 13, 2, 1, 'blockposition');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_calendar`
--

CREATE TABLE `dtb_calendar` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `holiday` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_carousel_config`
--

CREATE TABLE `dtb_carousel_config` (
  `id` int UNSIGNED NOT NULL,
  `display_count` int NOT NULL DEFAULT '5',
  `auto_play` int NOT NULL DEFAULT '1',
  `auto_play_interval` int NOT NULL DEFAULT '5000',
  `show_navigation` int NOT NULL DEFAULT '1',
  `show_indicators` int NOT NULL DEFAULT '1',
  `enable_touch_swipe` int NOT NULL DEFAULT '1',
  `enable_keyboard_nav` int NOT NULL DEFAULT '1',
  `transition_effect` varchar(20) COLLATE utf8mb4_bin NOT NULL DEFAULT 'slide',
  `transition_duration` int NOT NULL DEFAULT '500',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetime)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetime)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_carousel_config`
--

INSERT INTO `dtb_carousel_config` (`id`, `display_count`, `auto_play`, `auto_play_interval`, `show_navigation`, `show_indicators`, `enable_touch_swipe`, `enable_keyboard_nav`, `transition_effect`, `transition_duration`, `create_date`, `update_date`) VALUES
(1, 5, 1, 5000, 1, 1, 1, 1, 'slide', 500, '2025-07-01 05:27:13', '2025-07-01 05:27:13');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_carousel_feature`
--

CREATE TABLE `dtb_carousel_feature` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `content` longtext COLLATE utf8mb4_bin,
  `status` varchar(20) COLLATE utf8mb4_bin NOT NULL DEFAULT 'draft',
  `sort_no` int NOT NULL DEFAULT '0',
  `link_type` varchar(20) COLLATE utf8mb4_bin NOT NULL DEFAULT 'none',
  `link_url` varchar(1024) COLLATE utf8mb4_bin DEFAULT NULL,
  `link_text` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetime)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetime)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_carousel_feature`
--

INSERT INTO `dtb_carousel_feature` (`id`, `product_id`, `title`, `content`, `status`, `sort_no`, `link_type`, `link_url`, `link_text`, `create_date`, `update_date`) VALUES
(1, NULL, 'クーポン特集', '全商品２０％OFFクーポン配布中！', 'published', 1, 'internal', 'https://demo-rental-eccube.sakuraweb.com/user_data/coupon_special', 'こちらから＞', '2025-07-01 05:26:43', '2025-07-14 06:23:24'),
(2, NULL, '特集2', '説明２', 'published', 2, 'external', 'https://www.google.com/', 'Google', '2025-07-01 05:28:57', '2025-07-01 05:28:57'),
(3, NULL, '特集3', '説明3', 'published', 3, 'external', 'https://onlineshop.smt.docomo.ne.jp/', 'ドコモ', '2025-07-01 05:41:22', '2025-07-01 05:43:06');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_carousel_image`
--

CREATE TABLE `dtb_carousel_image` (
  `id` int UNSIGNED NOT NULL,
  `carousel_feature_id` int UNSIGNED DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `original_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `alt_text` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `sort_no` int NOT NULL DEFAULT '0',
  `webp_file_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `file_size` int DEFAULT NULL,
  `width` int DEFAULT NULL,
  `height` int DEFAULT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetime)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetime)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_carousel_image`
--

INSERT INTO `dtb_carousel_image` (`id`, `carousel_feature_id`, `file_name`, `original_name`, `alt_text`, `sort_no`, `webp_file_name`, `file_size`, `width`, `height`, `create_date`, `update_date`) VALUES
(2, 2, 'carousel_feature/carousel_20250701142857_6863721906734.jpeg', 'AdobeStock_233234925.jpeg', NULL, 1, 'carousel_feature/carousel_20250701142857_6863721906734.webp', 985363, 3000, 2250, '2025-07-01 05:28:57', '2025-07-01 05:28:57'),
(3, 3, 'carousel_feature/carousel_20250701144122_68637502f308b.jpg', 'mobile-4596292_1920.jpg', NULL, 1, 'carousel_feature/carousel_20250701144122_68637502f308b.webp', 217571, 1920, 1280, '2025-07-01 05:41:23', '2025-07-01 05:41:23'),
(6, 1, 'carousel_feature/carousel_20250714161301_6874adfdb2f57.jpg', 'camp.jpg', NULL, 1, 'carousel_feature/carousel_20250714161301_6874adfdb2f57.webp', 1549778, 1920, 1280, '2025-07-14 07:13:02', '2025-07-14 07:13:02');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_cart`
--

CREATE TABLE `dtb_cart` (
  `id` int UNSIGNED NOT NULL,
  `customer_id` int UNSIGNED DEFAULT NULL,
  `cart_key` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `pre_order_id` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `total_price` decimal(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `delivery_fee_total` decimal(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `sort_no` smallint UNSIGNED DEFAULT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `add_point` decimal(12,0) UNSIGNED NOT NULL DEFAULT '0',
  `use_point` decimal(12,0) UNSIGNED NOT NULL DEFAULT '0',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_cart`
--

INSERT INTO `dtb_cart` (`id`, `customer_id`, `cart_key`, `pre_order_id`, `total_price`, `delivery_fee_total`, `sort_no`, `create_date`, `update_date`, `add_point`, `use_point`, `discriminator_type`) VALUES
(2, NULL, 'DdeQIfCdkm9NNmIjc9mdyXMakjDqRnR2_1', NULL, 17380.00, 0.00, NULL, '2025-06-02 03:53:37', '2025-06-02 03:53:38', 0, 0, 'cart'),
(3, NULL, '47Md9bNYuADVK4QuiNiWuGxylPPnUJ0U_1', NULL, 550.00, 0.00, NULL, '2025-06-02 08:08:52', '2025-06-02 08:08:53', 0, 0, 'cart'),
(6, NULL, 'z0OsPtH3rTNY9RMWH1jGPTObnQjVeYwS_1', NULL, 2200.00, 0.00, NULL, '2025-07-18 08:27:01', '2025-07-18 08:27:02', 0, 0, 'cart');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_cart_item`
--

CREATE TABLE `dtb_cart_item` (
  `id` int UNSIGNED NOT NULL,
  `product_class_id` int UNSIGNED DEFAULT NULL,
  `cart_id` int UNSIGNED DEFAULT NULL,
  `price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `quantity` decimal(10,0) NOT NULL DEFAULT '0',
  `point_rate` decimal(10,0) UNSIGNED DEFAULT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_cart_item`
--

INSERT INTO `dtb_cart_item` (`id`, `product_class_id`, `cart_id`, `price`, `quantity`, `point_rate`, `discriminator_type`) VALUES
(2, 11, 2, 3080.00, 1, NULL, 'cartitem'),
(3, 9, 2, 14300.00, 1, NULL, 'cartitem'),
(4, 13, 3, 550.00, 1, NULL, 'cartitem'),
(8, 16, 6, 1100.00, 1, NULL, 'cartitem'),
(9, 15, 6, 1100.00, 1, NULL, 'cartitem');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_category`
--

CREATE TABLE `dtb_category` (
  `id` int UNSIGNED NOT NULL,
  `parent_category_id` int UNSIGNED DEFAULT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `hierarchy` int UNSIGNED NOT NULL,
  `sort_no` int NOT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_category`
--

INSERT INTO `dtb_category` (`id`, `parent_category_id`, `creator_id`, `category_name`, `hierarchy`, `sort_no`, `create_date`, `update_date`, `discriminator_type`) VALUES
(1, NULL, NULL, 'ジェラート', 1, 5, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'category'),
(2, NULL, NULL, '新入荷', 1, 6, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'category'),
(3, 1, NULL, '彩のデザート', 2, 3, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'category'),
(4, 3, NULL, 'CUBE', 3, 2, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'category'),
(5, NULL, NULL, 'アイスサンド', 1, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'category'),
(6, 5, NULL, 'フルーツ', 2, 4, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'category'),
(7, NULL, 1, '家電', 1, 13, '2025-05-30 07:45:50', '2025-05-30 07:45:50', 'category'),
(8, NULL, 1, '日用品', 1, 14, '2025-05-30 07:54:01', '2025-05-30 07:54:01', 'category'),
(9, NULL, 1, '防災', 1, 15, '2025-05-30 07:54:18', '2025-05-30 07:54:18', 'category'),
(10, NULL, 1, '本', 1, 16, '2025-05-30 07:54:23', '2025-05-30 07:54:23', 'category'),
(11, 7, 1, 'ゲーム機', 2, 7, '2025-07-10 07:27:52', '2025-07-10 07:27:52', 'category'),
(12, NULL, 1, '長期利用', 1, 17, '2025-07-10 07:30:22', '2025-07-10 07:30:22', 'category'),
(13, 7, 1, 'カメラ', 2, 8, '2025-07-10 07:44:25', '2025-07-10 07:44:25', 'category'),
(14, NULL, 1, '旅行', 1, 18, '2025-07-10 07:44:59', '2025-07-10 07:44:59', 'category'),
(15, 7, 1, 'ロボット', 2, 9, '2025-07-10 07:50:25', '2025-07-10 07:50:25', 'category'),
(16, NULL, 1, '掃除', 1, 19, '2025-07-10 08:02:04', '2025-07-10 08:02:04', 'category'),
(17, 7, 1, 'ルンバ', 2, 10, '2025-07-10 08:02:21', '2025-07-10 08:02:21', 'category'),
(18, 7, 1, 'パソコン', 2, 11, '2025-07-10 15:07:53', '2025-07-10 15:07:53', 'category'),
(19, 7, 1, 'テレビ', 2, 12, '2025-07-10 15:11:52', '2025-07-10 15:11:52', 'category');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_class_category`
--

CREATE TABLE `dtb_class_category` (
  `id` int UNSIGNED NOT NULL,
  `class_name_id` int UNSIGNED DEFAULT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `backend_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` int UNSIGNED NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_class_category`
--

INSERT INTO `dtb_class_category` (`id`, `class_name_id`, `creator_id`, `backend_name`, `name`, `sort_no`, `visible`, `create_date`, `update_date`, `discriminator_type`) VALUES
(1, 1, NULL, 'チョコ', 'チョコ', 3, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'classcategory'),
(2, 1, NULL, '抹茶', '抹茶', 2, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'classcategory'),
(3, 1, NULL, 'バニラ', 'バニラ', 1, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'classcategory'),
(4, 2, NULL, '16mm × 16mm', '16mm × 16mm', 3, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'classcategory'),
(5, 2, NULL, '32mm × 32mm', '32mm × 32mm', 2, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'classcategory'),
(6, 2, NULL, '64cm × 64cm', '64cm × 64cm', 1, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'classcategory');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_class_name`
--

CREATE TABLE `dtb_class_name` (
  `id` int UNSIGNED NOT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `backend_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` int UNSIGNED NOT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_class_name`
--

INSERT INTO `dtb_class_name` (`id`, `creator_id`, `backend_name`, `name`, `sort_no`, `create_date`, `update_date`, `discriminator_type`) VALUES
(1, NULL, 'CUBE用味', 'フレーバー', 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'classname'),
(2, NULL, 'CUBE用サイズ', 'サイズ', 2, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'classname');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_csv`
--

CREATE TABLE `dtb_csv` (
  `id` int UNSIGNED NOT NULL,
  `csv_type_id` smallint UNSIGNED DEFAULT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `entity_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `field_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `reference_field_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `disp_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_csv`
--

INSERT INTO `dtb_csv` (`id`, `csv_type_id`, `creator_id`, `entity_name`, `field_name`, `reference_field_name`, `disp_name`, `sort_no`, `enabled`, `create_date`, `update_date`, `discriminator_type`) VALUES
(1, 1, NULL, 'Eccube\\\\Entity\\\\Product', 'id', NULL, '商品ID', 1, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(2, 1, NULL, 'Eccube\\\\Entity\\\\Product', 'Status', 'id', '公開ステータス(ID)', 2, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(3, 1, NULL, 'Eccube\\\\Entity\\\\Product', 'Status', 'name', '公開ステータス(名称)', 3, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(4, 1, NULL, 'Eccube\\\\Entity\\\\Product', 'name', NULL, '商品名', 4, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(5, 1, NULL, 'Eccube\\\\Entity\\\\Product', 'note', NULL, 'ショップ用メモ欄', 5, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(6, 1, NULL, 'Eccube\\\\Entity\\\\Product', 'description_list', NULL, '商品説明(一覧)', 6, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(7, 1, NULL, 'Eccube\\\\Entity\\\\Product', 'description_detail', NULL, '商品説明(詳細)', 7, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(8, 1, NULL, 'Eccube\\\\Entity\\\\Product', 'search_word', NULL, '検索ワード', 8, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(9, 1, NULL, 'Eccube\\\\Entity\\\\Product', 'free_area', NULL, 'フリーエリア', 9, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(10, 1, NULL, 'Eccube\\\\Entity\\\\ProductClass', 'id', NULL, '商品規格ID', 10, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(11, 1, NULL, 'Eccube\\\\Entity\\\\ProductClass', 'SaleType', 'id', '販売種別(ID)', 11, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(12, 1, NULL, 'Eccube\\\\Entity\\\\ProductClass', 'SaleType', 'name', '販売種別(名称)', 12, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(13, 1, NULL, 'Eccube\\\\Entity\\\\ProductClass', 'ClassCategory1', 'id', '規格分類1(ID)', 13, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(14, 1, NULL, 'Eccube\\\\Entity\\\\ProductClass', 'ClassCategory1', 'name', '規格分類1(名称)', 14, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(15, 1, NULL, 'Eccube\\\\Entity\\\\ProductClass', 'ClassCategory2', 'id', '規格分類2(ID)', 15, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(16, 1, NULL, 'Eccube\\\\Entity\\\\ProductClass', 'ClassCategory2', 'name', '規格分類2(名称)', 16, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(17, 1, NULL, 'Eccube\\\\Entity\\\\ProductClass', 'DeliveryDuration', 'id', '発送日目安(ID)', 17, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(18, 1, NULL, 'Eccube\\\\Entity\\\\ProductClass', 'DeliveryDuration', 'name', '発送日目安(名称)', 18, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(19, 1, NULL, 'Eccube\\\\Entity\\\\ProductClass', 'code', NULL, '商品コード', 19, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(20, 1, NULL, 'Eccube\\\\Entity\\\\ProductClass', 'stock', NULL, '在庫数', 20, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(21, 1, NULL, 'Eccube\\\\Entity\\\\ProductClass', 'stock_unlimited', NULL, '在庫数無制限フラグ', 21, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(22, 1, NULL, 'Eccube\\\\Entity\\\\ProductClass', 'sale_limit', NULL, '販売制限数', 22, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(23, 1, NULL, 'Eccube\\\\Entity\\\\ProductClass', 'price01', NULL, '通常価格', 23, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(24, 1, NULL, 'Eccube\\\\Entity\\\\ProductClass', 'price02', NULL, '販売価格', 24, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(25, 1, NULL, 'Eccube\\\\Entity\\\\ProductClass', 'delivery_fee', NULL, '送料', 25, 0, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(26, 1, NULL, 'Eccube\\\\Entity\\\\Product', 'ProductImage', 'file_name', '商品画像', 26, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(27, 1, NULL, 'Eccube\\\\Entity\\\\Product', 'ProductCategories', 'category_id', '商品カテゴリ(ID)', 27, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(28, 1, NULL, 'Eccube\\\\Entity\\\\Product', 'ProductCategories', 'Category', '商品カテゴリ(名称)', 28, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(29, 1, NULL, 'Eccube\\\\Entity\\\\Product', 'ProductTag', 'tag_id', 'タグ(ID)', 29, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(30, 1, NULL, 'Eccube\\\\Entity\\\\Product', 'ProductTag', 'Tag', 'タグ(名称)', 30, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(31, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'id', NULL, '会員ID', 1, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(32, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'name01', NULL, 'お名前(姓)', 2, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(33, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'name02', NULL, 'お名前(名)', 3, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(34, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'kana01', NULL, 'お名前(セイ)', 4, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(35, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'kana02', NULL, 'お名前(メイ)', 5, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(36, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'company_name', NULL, '会社名', 6, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(37, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'postal_code', NULL, '郵便番号', 7, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(38, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'Pref', 'id', '都道府県(ID)', 9, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(39, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'Pref', 'name', '都道府県(名称)', 10, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(40, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'addr01', NULL, '住所1', 11, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(41, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'addr02', NULL, '住所2', 12, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(42, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'email', NULL, 'メールアドレス', 13, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(43, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'phone_number', NULL, 'TEL', 14, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(44, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'Sex', 'id', '性別(ID)', 20, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(45, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'Sex', 'name', '性別(名称)', 21, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(46, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'Job', 'id', '職業(ID)', 22, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(47, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'Job', 'name', '職業(名称)', 23, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(48, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'birth', NULL, '誕生日', 24, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(49, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'first_buy_date', NULL, '初回購入日', 25, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(50, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'last_buy_date', NULL, '最終購入日', 26, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(51, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'buy_times', NULL, '購入回数', 27, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(52, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'note', NULL, 'ショップ用メモ欄', 28, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(53, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'Status', 'id', '会員ステータス(ID)', 29, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(54, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'Status', 'name', '会員ステータス(名称)', 30, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(55, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'create_date', NULL, '登録日', 31, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(56, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'update_date', NULL, '更新日', 32, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(57, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'id', NULL, '注文ID', 1, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(58, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'order_no', NULL, '注文番号', 2, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(59, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'Customer', 'id', '会員ID', 3, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(60, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'name01', NULL, 'お名前(姓)', 4, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(61, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'name02', NULL, 'お名前(名)', 5, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(62, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'kana01', NULL, 'お名前(セイ)', 6, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(63, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'kana02', NULL, 'お名前(メイ)', 7, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(64, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'company_name', NULL, '会社名', 8, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(65, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'postal_code', NULL, '郵便番号', 9, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(66, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'Pref', 'id', '都道府県(ID)', 10, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(67, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'Pref', 'name', '都道府県(名称)', 11, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(68, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'addr01', NULL, '住所1', 12, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(69, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'addr02', NULL, '住所2', 13, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(70, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'email', NULL, 'メールアドレス', 14, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(71, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'phone_number', NULL, 'TEL', 15, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(72, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'Sex', 'id', '性別(ID)', 16, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(73, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'Sex', 'name', '性別(名称)', 17, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(74, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'Job', 'id', '職業(ID)', 18, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(75, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'Job', 'name', '職業(名称)', 19, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(76, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'birth', NULL, '誕生日', 20, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(77, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'note', NULL, 'ショップ用メモ欄', 21, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(78, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'subtotal', NULL, '小計', 22, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(79, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'discount', NULL, '値引き', 23, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(80, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'delivery_fee_total', NULL, '送料', 24, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(81, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'tax', NULL, '税金', 25, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(82, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'total', NULL, '合計', 26, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(83, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'payment_total', NULL, '支払合計', 27, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(84, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'OrderStatus', 'id', '対応状況(ID)', 28, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(85, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'OrderStatus', 'name', '対応状況(名称)', 29, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(86, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'Payment', 'id', '支払方法(ID)', 30, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(87, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'payment_method', NULL, '支払方法(名称)', 31, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(88, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'order_date', NULL, '受注日', 32, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(89, 3, NULL, 'Eccube\\\\Entity\\\\Order', 'payment_date', NULL, '入金日', 33, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(90, 3, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'id', NULL, '注文詳細ID', 34, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(91, 3, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'Product', 'id', '商品ID', 35, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(92, 3, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'ProductClass', 'id', '商品規格ID', 36, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(93, 3, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'product_name', NULL, '商品名', 37, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(94, 3, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'product_code', NULL, '商品コード', 38, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(95, 3, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'class_name1', NULL, '規格名1', 39, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(96, 3, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'class_name2', NULL, '規格名2', 40, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(97, 3, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'class_category_name1', NULL, '規格分類名1', 41, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(98, 3, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'class_category_name2', NULL, '規格分類名2', 42, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(99, 3, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'price', NULL, '価格', 43, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(100, 3, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'quantity', NULL, '個数', 44, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(101, 3, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'tax_rate', NULL, '税率', 45, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(102, 3, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'tax_rule', NULL, '税率ルール(ID)', 46, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(103, 3, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'OrderItemType', 'id', '明細区分(ID)', 47, 1, '2018-07-23 09:00:00', '2018-07-23 09:00:00', 'csv'),
(104, 3, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'OrderItemType', 'name', '明細区分(名称)', 48, 1, '2018-07-23 09:00:00', '2018-07-23 09:00:00', 'csv'),
(105, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'id', NULL, '出荷ID', 49, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(106, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'name01', NULL, '配送先_お名前(姓)', 50, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(107, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'name02', NULL, '配送先_お名前(名)', 51, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(108, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'kana01', NULL, '配送先_お名前(セイ)', 52, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(109, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'kana02', NULL, '配送先_お名前(メイ)', 53, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(110, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'company_name', NULL, '配送先_会社名', 54, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(111, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'postal_code', NULL, '配送先_郵便番号', 55, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(112, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'Pref', 'id', '配送先_都道府県(ID)', 56, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(113, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'Pref', 'name', '配送先_都道府県(名称)', 57, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(114, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'addr01', NULL, '配送先_住所1', 58, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(115, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'addr02', NULL, '配送先_住所2', 59, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(116, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'phone_number', NULL, '配送先_TEL', 60, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(117, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'Delivery', 'id', '配送業者(ID)', 61, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(118, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'shipping_delivery_name', NULL, '配送業者(名称)', 62, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(119, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'time_id', NULL, 'お届け時間ID', 63, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(120, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'shipping_delivery_time', NULL, 'お届け時間(名称)', 64, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(121, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'shipping_delivery_date', NULL, 'お届け希望日', 65, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(123, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'shipping_delivery_fee', NULL, '送料', 67, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(124, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'shipping_date', NULL, '発送日', 68, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(125, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'tracking_number', NULL, '出荷伝票番号', 69, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(126, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'note', NULL, '配達用メモ', 70, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(127, 3, NULL, 'Eccube\\\\Entity\\\\Shipping', 'mail_send_date', NULL, '出荷メール送信日', 71, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(128, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'id', NULL, '注文ID', 1, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(129, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'order_no', NULL, '注文番号', 2, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(130, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'Customer', 'id', '会員ID', 3, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(131, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'name01', NULL, 'お名前(姓)', 4, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(132, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'name02', NULL, 'お名前(名)', 5, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(133, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'kana01', NULL, 'お名前(セイ)', 6, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(134, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'kana02', NULL, 'お名前(メイ)', 7, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(135, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'company_name', NULL, '会社名', 8, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(136, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'postal_code', NULL, '郵便番号', 9, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(137, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'Pref', 'id', '都道府県(ID)', 10, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(138, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'Pref', 'name', '都道府県(名称)', 11, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(139, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'addr01', NULL, '住所1', 12, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(140, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'addr02', NULL, '住所2', 13, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(141, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'email', NULL, 'メールアドレス', 14, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(142, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'phone_number', NULL, 'TEL', 15, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(143, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'Sex', 'id', '性別(ID)', 16, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(144, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'Sex', 'name', '性別(名称)', 17, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(145, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'Job', 'id', '職業(ID)', 18, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(146, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'Job', 'name', '職業(名称)', 19, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(147, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'birth', NULL, '誕生日', 20, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(148, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'note', NULL, 'ショップ用メモ欄', 21, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(149, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'subtotal', NULL, '小計', 22, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(150, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'discount', NULL, '値引き', 23, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(151, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'delivery_fee_total', NULL, '送料', 24, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(152, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'tax', NULL, '税金', 25, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(153, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'total', NULL, '合計', 26, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(154, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'payment_total', NULL, '支払合計', 27, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(155, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'OrderStatus', 'id', '対応状況(ID)', 28, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(156, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'OrderStatus', 'name', '対応状況(名称)', 29, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(157, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'Payment', 'id', '支払方法(ID)', 30, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(158, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'payment_method', NULL, '支払方法(名称)', 31, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(159, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'order_date', NULL, '受注日', 32, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(160, 4, NULL, 'Eccube\\\\Entity\\\\Order', 'payment_date', NULL, '入金日', 33, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(161, 4, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'id', NULL, '注文詳細ID', 34, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(162, 4, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'Product', 'id', '商品ID', 35, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(163, 4, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'ProductClass', 'id', '商品規格ID', 36, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(164, 4, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'product_name', NULL, '商品名', 37, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(165, 4, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'product_code', NULL, '商品コード', 38, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(166, 4, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'class_name1', NULL, '規格名1', 39, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(167, 4, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'class_name2', NULL, '規格名2', 40, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(168, 4, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'class_category_name1', NULL, '規格分類名1', 41, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(169, 4, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'class_category_name2', NULL, '規格分類名2', 42, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(170, 4, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'price', NULL, '価格', 43, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(171, 4, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'quantity', NULL, '個数', 44, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(172, 4, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'tax_rate', NULL, '税率', 45, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(173, 4, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'tax_rule', NULL, '税率ルール(ID)', 46, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(174, 4, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'OrderItemType', 'id', '明細区分(ID)', 47, 1, '2018-07-23 09:00:00', '2018-07-23 09:00:00', 'csv'),
(175, 4, NULL, 'Eccube\\\\Entity\\\\OrderItem', 'OrderItemType', 'name', '明細区分(名称)', 48, 1, '2018-07-23 09:00:00', '2018-07-23 09:00:00', 'csv'),
(176, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'id', NULL, '出荷ID', 49, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(177, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'name01', NULL, '配送先_お名前(姓)', 50, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(178, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'name02', NULL, '配送先_お名前(名)', 51, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(179, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'kana01', NULL, '配送先_お名前(セイ)', 52, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(180, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'kana02', NULL, '配送先_お名前(メイ)', 53, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(181, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'company_name', NULL, '配送先_会社名', 54, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(182, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'postal_code', NULL, '配送先_郵便番号', 55, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(183, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'Pref', 'id', '配送先_都道府県(ID)', 56, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(184, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'Pref', 'name', '配送先_都道府県(名称)', 57, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(185, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'addr01', NULL, '配送先_住所1', 58, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(186, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'addr02', NULL, '配送先_住所2', 59, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(187, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'phone_number', NULL, '配送先_TEL', 60, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(188, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'Delivery', 'id', '配送業者(ID)', 61, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(189, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'shipping_delivery_name', NULL, '配送業者(名称)', 62, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(190, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'time_id', NULL, 'お届け時間ID', 63, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(191, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'shipping_delivery_time', NULL, 'お届け時間(名称)', 64, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(192, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'shipping_delivery_date', NULL, 'お届け希望日', 65, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(194, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'shipping_delivery_fee', NULL, '送料', 67, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(195, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'shipping_date', NULL, '発送日', 68, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(196, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'tracking_number', NULL, '出荷伝票番号', 69, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(197, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'note', NULL, '配達用メモ', 70, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(198, 4, NULL, 'Eccube\\\\Entity\\\\Shipping', 'mail_send_date', NULL, '出荷メール送信日', 71, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(199, 5, NULL, 'Eccube\\\\Entity\\\\Category', 'id', NULL, 'カテゴリID', 1, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(200, 5, NULL, 'Eccube\\\\Entity\\\\Category', 'sort_no', NULL, '表示ランク', 2, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(201, 5, NULL, 'Eccube\\\\Entity\\\\Category', 'name', NULL, 'カテゴリ名', 3, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(202, 5, NULL, 'Eccube\\\\Entity\\\\Category', 'Parent', 'id', '親カテゴリID', 4, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(203, 5, NULL, 'Eccube\\\\Entity\\\\Category', 'level', NULL, '階層', 5, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(204, 1, NULL, 'Eccube\\\\Entity\\\\ProductClass', 'TaxRule', 'tax_rate', '税率', 31, 0, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv'),
(205, 2, NULL, 'Eccube\\\\Entity\\\\Customer', 'point', NULL, 'ポイント', 33, 1, '2017-03-07 10:14:00', '2017-03-07 10:14:00', 'csv');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_customer`
--

CREATE TABLE `dtb_customer` (
  `id` int UNSIGNED NOT NULL,
  `customer_status_id` smallint UNSIGNED DEFAULT NULL,
  `sex_id` smallint UNSIGNED DEFAULT NULL,
  `job_id` smallint UNSIGNED DEFAULT NULL,
  `country_id` smallint UNSIGNED DEFAULT NULL,
  `pref_id` smallint UNSIGNED DEFAULT NULL,
  `name01` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `name02` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `kana01` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `kana02` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `postal_code` varchar(8) COLLATE utf8mb4_bin DEFAULT NULL,
  `addr01` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `addr02` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `phone_number` varchar(14) COLLATE utf8mb4_bin DEFAULT NULL,
  `birth` datetime DEFAULT NULL COMMENT '(DC2Type:datetimetz)',
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `salt` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `secret_key` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `first_buy_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetimetz)',
  `last_buy_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetimetz)',
  `buy_times` decimal(10,0) UNSIGNED DEFAULT '0',
  `buy_total` decimal(12,2) UNSIGNED DEFAULT '0.00',
  `note` varchar(4000) COLLATE utf8mb4_bin DEFAULT NULL,
  `reset_key` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `reset_expire` datetime DEFAULT NULL COMMENT '(DC2Type:datetimetz)',
  `point` decimal(12,0) NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `plg_mailmagazine_flg` smallint UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_customer_address`
--

CREATE TABLE `dtb_customer_address` (
  `id` int UNSIGNED NOT NULL,
  `customer_id` int UNSIGNED DEFAULT NULL,
  `country_id` smallint UNSIGNED DEFAULT NULL,
  `pref_id` smallint UNSIGNED DEFAULT NULL,
  `name01` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `name02` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `kana01` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `kana02` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `postal_code` varchar(8) COLLATE utf8mb4_bin DEFAULT NULL,
  `addr01` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `addr02` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `phone_number` varchar(14) COLLATE utf8mb4_bin DEFAULT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_customer_favorite_product`
--

CREATE TABLE `dtb_customer_favorite_product` (
  `id` int UNSIGNED NOT NULL,
  `customer_id` int UNSIGNED DEFAULT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_delivery`
--

CREATE TABLE `dtb_delivery` (
  `id` int UNSIGNED NOT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `sale_type_id` smallint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `description` varchar(4000) COLLATE utf8mb4_bin DEFAULT NULL,
  `confirm_url` varchar(4000) COLLATE utf8mb4_bin DEFAULT NULL,
  `sort_no` int UNSIGNED DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_delivery`
--

INSERT INTO `dtb_delivery` (`id`, `creator_id`, `sale_type_id`, `name`, `service_name`, `description`, `confirm_url`, `sort_no`, `visible`, `create_date`, `update_date`, `discriminator_type`) VALUES
(1, NULL, 1, 'サンプル業者', 'サンプル業者', NULL, NULL, 1, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'delivery'),
(2, NULL, 2, 'サンプル宅配', 'サンプル宅配', NULL, NULL, 2, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'delivery');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_delivery_duration`
--

CREATE TABLE `dtb_delivery_duration` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `duration` smallint NOT NULL DEFAULT '0',
  `sort_no` int UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_delivery_duration`
--

INSERT INTO `dtb_delivery_duration` (`id`, `name`, `duration`, `sort_no`, `discriminator_type`) VALUES
(1, '即日', 0, 0, 'deliveryduration'),
(2, '1～2日後', 1, 1, 'deliveryduration'),
(3, '3～4日後', 3, 2, 'deliveryduration'),
(4, '1週間以降', 7, 3, 'deliveryduration'),
(5, '2週間以降', 14, 4, 'deliveryduration'),
(6, '3週間以降', 21, 5, 'deliveryduration'),
(7, '1ヶ月以降', 30, 6, 'deliveryduration'),
(8, '2ヶ月以降', 60, 7, 'deliveryduration'),
(9, 'お取り寄せ(商品入荷後)', -1, 8, 'deliveryduration');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_delivery_fee`
--

CREATE TABLE `dtb_delivery_fee` (
  `id` int UNSIGNED NOT NULL,
  `delivery_id` int UNSIGNED DEFAULT NULL,
  `pref_id` smallint UNSIGNED DEFAULT NULL,
  `fee` decimal(12,2) UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_delivery_fee`
--

INSERT INTO `dtb_delivery_fee` (`id`, `delivery_id`, `pref_id`, `fee`, `discriminator_type`) VALUES
(1, 1, 1, 1000.00, 'deliveryfee'),
(2, 1, 2, 1000.00, 'deliveryfee'),
(3, 1, 3, 1000.00, 'deliveryfee'),
(4, 1, 4, 1000.00, 'deliveryfee'),
(5, 1, 5, 1000.00, 'deliveryfee'),
(6, 1, 6, 1000.00, 'deliveryfee'),
(7, 1, 7, 1000.00, 'deliveryfee'),
(8, 1, 8, 1000.00, 'deliveryfee'),
(9, 1, 9, 1000.00, 'deliveryfee'),
(10, 1, 10, 1000.00, 'deliveryfee'),
(11, 1, 11, 1000.00, 'deliveryfee'),
(12, 1, 12, 1000.00, 'deliveryfee'),
(13, 1, 13, 1000.00, 'deliveryfee'),
(14, 1, 14, 1000.00, 'deliveryfee'),
(15, 1, 15, 1000.00, 'deliveryfee'),
(16, 1, 16, 1000.00, 'deliveryfee'),
(17, 1, 17, 1000.00, 'deliveryfee'),
(18, 1, 18, 1000.00, 'deliveryfee'),
(19, 1, 19, 1000.00, 'deliveryfee'),
(20, 1, 20, 1000.00, 'deliveryfee'),
(21, 1, 21, 1000.00, 'deliveryfee'),
(22, 1, 22, 1000.00, 'deliveryfee'),
(23, 1, 23, 1000.00, 'deliveryfee'),
(24, 1, 24, 1000.00, 'deliveryfee'),
(25, 1, 25, 1000.00, 'deliveryfee'),
(26, 1, 26, 1000.00, 'deliveryfee'),
(27, 1, 27, 1000.00, 'deliveryfee'),
(28, 1, 28, 1000.00, 'deliveryfee'),
(29, 1, 29, 1000.00, 'deliveryfee'),
(30, 1, 30, 1000.00, 'deliveryfee'),
(31, 1, 31, 1000.00, 'deliveryfee'),
(32, 1, 32, 1000.00, 'deliveryfee'),
(33, 1, 33, 1000.00, 'deliveryfee'),
(34, 1, 34, 1000.00, 'deliveryfee'),
(35, 1, 35, 1000.00, 'deliveryfee'),
(36, 1, 36, 1000.00, 'deliveryfee'),
(37, 1, 37, 1000.00, 'deliveryfee'),
(38, 1, 38, 1000.00, 'deliveryfee'),
(39, 1, 39, 1000.00, 'deliveryfee'),
(40, 1, 40, 1000.00, 'deliveryfee'),
(41, 1, 41, 1000.00, 'deliveryfee'),
(42, 1, 42, 1000.00, 'deliveryfee'),
(43, 1, 43, 1000.00, 'deliveryfee'),
(44, 1, 44, 1000.00, 'deliveryfee'),
(45, 1, 45, 1000.00, 'deliveryfee'),
(46, 1, 46, 1000.00, 'deliveryfee'),
(47, 1, 47, 1000.00, 'deliveryfee'),
(48, 2, 1, 0.00, 'deliveryfee'),
(49, 2, 2, 0.00, 'deliveryfee'),
(50, 2, 3, 0.00, 'deliveryfee'),
(51, 2, 4, 0.00, 'deliveryfee'),
(52, 2, 5, 0.00, 'deliveryfee'),
(53, 2, 6, 0.00, 'deliveryfee'),
(54, 2, 7, 0.00, 'deliveryfee'),
(55, 2, 8, 0.00, 'deliveryfee'),
(56, 2, 9, 0.00, 'deliveryfee'),
(57, 2, 10, 0.00, 'deliveryfee'),
(58, 2, 11, 0.00, 'deliveryfee'),
(59, 2, 12, 0.00, 'deliveryfee'),
(60, 2, 13, 0.00, 'deliveryfee'),
(61, 2, 14, 0.00, 'deliveryfee'),
(62, 2, 15, 0.00, 'deliveryfee'),
(63, 2, 16, 0.00, 'deliveryfee'),
(64, 2, 17, 0.00, 'deliveryfee'),
(65, 2, 18, 0.00, 'deliveryfee'),
(66, 2, 19, 0.00, 'deliveryfee'),
(67, 2, 20, 0.00, 'deliveryfee'),
(68, 2, 21, 0.00, 'deliveryfee'),
(69, 2, 22, 0.00, 'deliveryfee'),
(70, 2, 23, 0.00, 'deliveryfee'),
(71, 2, 24, 0.00, 'deliveryfee'),
(72, 2, 25, 0.00, 'deliveryfee'),
(73, 2, 26, 0.00, 'deliveryfee'),
(74, 2, 27, 0.00, 'deliveryfee'),
(75, 2, 28, 0.00, 'deliveryfee'),
(76, 2, 29, 0.00, 'deliveryfee'),
(77, 2, 30, 0.00, 'deliveryfee'),
(78, 2, 31, 0.00, 'deliveryfee'),
(79, 2, 32, 0.00, 'deliveryfee'),
(80, 2, 33, 0.00, 'deliveryfee'),
(81, 2, 34, 0.00, 'deliveryfee'),
(82, 2, 35, 0.00, 'deliveryfee'),
(83, 2, 36, 0.00, 'deliveryfee'),
(84, 2, 37, 0.00, 'deliveryfee'),
(85, 2, 38, 0.00, 'deliveryfee'),
(86, 2, 39, 0.00, 'deliveryfee'),
(87, 2, 40, 0.00, 'deliveryfee'),
(88, 2, 41, 0.00, 'deliveryfee'),
(89, 2, 42, 0.00, 'deliveryfee'),
(90, 2, 43, 0.00, 'deliveryfee'),
(91, 2, 44, 0.00, 'deliveryfee'),
(92, 2, 45, 0.00, 'deliveryfee'),
(93, 2, 46, 0.00, 'deliveryfee'),
(94, 2, 47, 0.00, 'deliveryfee');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_delivery_time`
--

CREATE TABLE `dtb_delivery_time` (
  `id` int UNSIGNED NOT NULL,
  `delivery_id` int UNSIGNED DEFAULT NULL,
  `delivery_time` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_delivery_time`
--

INSERT INTO `dtb_delivery_time` (`id`, `delivery_id`, `delivery_time`, `sort_no`, `visible`, `create_date`, `update_date`, `discriminator_type`) VALUES
(1, 1, '午前', 1, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'deliverytime'),
(2, 1, '午後', 2, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'deliverytime');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_layout`
--

CREATE TABLE `dtb_layout` (
  `id` int UNSIGNED NOT NULL,
  `device_type_id` smallint UNSIGNED DEFAULT NULL,
  `layout_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_layout`
--

INSERT INTO `dtb_layout` (`id`, `device_type_id`, `layout_name`, `create_date`, `update_date`, `discriminator_type`) VALUES
(0, 10, 'トップページ用レイアウト', '2017-03-07 10:14:52', '2025-06-13 07:54:32', 'layout'),
(1, 10, 'トップページ用レイアウト', '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'layout'),
(2, 10, '下層ページ用レイアウト', '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'layout');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_login_history`
--

CREATE TABLE `dtb_login_history` (
  `id` int UNSIGNED NOT NULL,
  `login_history_status_id` smallint UNSIGNED NOT NULL,
  `member_id` int UNSIGNED DEFAULT NULL,
  `user_name` longtext COLLATE utf8mb4_bin,
  `client_ip` longtext COLLATE utf8mb4_bin,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_login_history`
--

INSERT INTO `dtb_login_history` (`id`, `login_history_status_id`, `member_id`, `user_name`, `client_ip`, `create_date`, `update_date`, `discriminator_type`) VALUES
(1, 1, 1, 'egoba_admin', '203.179.194.211', '2025-05-16 02:52:51', '2025-05-16 02:52:51', 'loginhistory'),
(2, 1, 1, 'egoba_admin', '203.179.194.211', '2025-05-16 03:01:21', '2025-05-16 03:01:21', 'loginhistory'),
(3, 0, 1, 'egoba_admin', '203.179.194.211', '2025-05-16 03:20:18', '2025-05-16 03:20:18', 'loginhistory'),
(4, 1, 1, 'egoba_admin', '203.179.194.211', '2025-05-16 03:20:26', '2025-05-16 03:20:26', 'loginhistory'),
(5, 1, 1, 'egoba_admin', '133.114.249.18', '2025-05-16 06:13:27', '2025-05-16 06:13:27', 'loginhistory'),
(6, 1, 1, 'egoba_admin', '203.179.194.211', '2025-05-16 06:28:25', '2025-05-16 06:28:25', 'loginhistory'),
(7, 1, 1, 'egoba_admin', '203.179.194.211', '2025-05-16 07:51:59', '2025-05-16 07:51:59', 'loginhistory'),
(8, 1, 1, 'egoba_admin', '203.179.194.211', '2025-05-16 07:54:48', '2025-05-16 07:54:48', 'loginhistory'),
(9, 1, 1, 'egoba_admin', '203.179.194.211', '2025-05-16 08:20:13', '2025-05-16 08:20:13', 'loginhistory'),
(10, 0, 1, 'egoba_admin', '203.179.194.211', '2025-05-16 08:25:29', '2025-05-16 08:25:29', 'loginhistory'),
(11, 0, 1, 'egoba_admin', '203.179.194.211', '2025-05-16 08:25:38', '2025-05-16 08:25:38', 'loginhistory'),
(12, 0, 1, 'egoba_admin', '203.179.194.211', '2025-05-16 08:25:46', '2025-05-16 08:25:46', 'loginhistory'),
(13, 1, 1, 'egoba_admin', '203.179.194.211', '2025-05-16 08:25:56', '2025-05-16 08:25:56', 'loginhistory'),
(14, 1, 1, 'egoba_admin', '203.179.194.211', '2025-05-16 08:48:56', '2025-05-16 08:48:56', 'loginhistory'),
(15, 1, 1, 'egoba_admin', '203.179.194.211', '2025-05-17 11:09:03', '2025-05-17 11:09:03', 'loginhistory'),
(16, 1, 1, 'egoba_admin', '203.179.194.211', '2025-05-30 03:54:25', '2025-05-30 03:54:25', 'loginhistory'),
(17, 1, 1, 'egoba_admin', '203.179.194.211', '2025-06-06 04:38:58', '2025-06-06 04:38:58', 'loginhistory'),
(18, 1, 1, 'egoba_admin', '203.179.194.211', '2025-06-06 06:33:15', '2025-06-06 06:33:15', 'loginhistory'),
(19, 0, 1, 'egoba_admin', '203.179.194.211', '2025-06-06 06:35:55', '2025-06-06 06:35:55', 'loginhistory'),
(20, 1, 1, 'egoba_admin', '203.179.194.211', '2025-06-06 06:36:01', '2025-06-06 06:36:01', 'loginhistory'),
(21, 1, 1, 'egoba_admin', '203.179.194.211', '2025-06-09 01:03:21', '2025-06-09 01:03:21', 'loginhistory'),
(22, 1, 1, 'egoba_admin', '203.179.194.211', '2025-06-09 01:20:17', '2025-06-09 01:20:17', 'loginhistory'),
(23, 1, 1, 'egoba_admin', '203.179.194.211', '2025-06-09 17:25:37', '2025-06-09 17:25:37', 'loginhistory'),
(24, 1, 1, 'egoba_admin', '203.179.194.211', '2025-06-10 03:47:13', '2025-06-10 03:47:13', 'loginhistory'),
(25, 1, 1, 'egoba_admin', '203.179.194.211', '2025-06-13 07:13:03', '2025-06-13 07:13:03', 'loginhistory'),
(26, 1, 1, 'egoba_admin', '203.179.194.211', '2025-06-16 04:19:58', '2025-06-16 04:19:58', 'loginhistory'),
(27, 1, 1, 'egoba_admin', '203.179.194.211', '2025-06-16 13:04:07', '2025-06-16 13:04:07', 'loginhistory'),
(28, 0, 1, 'egoba_admin', '49.156.196.138', '2025-06-18 04:36:38', '2025-06-18 04:36:38', 'loginhistory'),
(29, 1, 1, 'egoba_admin', '49.156.196.138', '2025-06-18 04:36:46', '2025-06-18 04:36:46', 'loginhistory'),
(30, 0, 1, 'egoba_admin', '49.156.196.138', '2025-06-18 06:15:41', '2025-06-18 06:15:41', 'loginhistory'),
(31, 1, 1, 'egoba_admin', '49.156.196.138', '2025-06-18 06:15:48', '2025-06-18 06:15:48', 'loginhistory'),
(32, 0, 1, 'egoba_admin', '49.156.196.138', '2025-06-18 13:07:09', '2025-06-18 13:07:09', 'loginhistory'),
(33, 1, 1, 'egoba_admin', '49.156.196.138', '2025-06-18 13:07:15', '2025-06-18 13:07:15', 'loginhistory'),
(34, 1, 1, 'egoba_admin', '49.156.196.138', '2025-07-01 05:23:30', '2025-07-01 05:23:30', 'loginhistory'),
(35, 1, 1, 'egoba_admin', '49.156.196.138', '2025-07-01 08:30:18', '2025-07-01 08:30:18', 'loginhistory'),
(36, 1, 1, 'egoba_admin', '49.156.196.138', '2025-07-02 07:33:03', '2025-07-02 07:33:03', 'loginhistory'),
(37, 0, 1, 'egoba_admin', '49.156.196.138', '2025-07-03 07:24:24', '2025-07-03 07:24:24', 'loginhistory'),
(38, 1, 1, 'egoba_admin', '49.156.196.138', '2025-07-03 07:24:31', '2025-07-03 07:24:31', 'loginhistory'),
(39, 1, 1, 'egoba_admin', '49.156.196.138', '2025-07-03 08:03:50', '2025-07-03 08:03:50', 'loginhistory'),
(40, 1, 1, 'egoba_admin', '49.156.196.138', '2025-07-04 08:11:41', '2025-07-04 08:11:41', 'loginhistory'),
(41, 1, 1, 'egoba_admin', '49.156.196.138', '2025-07-04 13:16:47', '2025-07-04 13:16:47', 'loginhistory'),
(42, 1, 1, 'egoba_admin', '49.156.196.138', '2025-07-07 05:05:18', '2025-07-07 05:05:18', 'loginhistory'),
(43, 1, 1, 'egoba_admin', '49.156.196.138', '2025-07-08 06:15:06', '2025-07-08 06:15:06', 'loginhistory'),
(44, 1, 1, 'egoba_admin', '49.156.196.138', '2025-07-09 03:13:22', '2025-07-09 03:13:22', 'loginhistory'),
(45, 1, 1, 'egoba_admin', '49.156.196.138', '2025-07-09 12:33:04', '2025-07-09 12:33:04', 'loginhistory'),
(46, 1, 1, 'egoba_admin', '49.156.196.138', '2025-07-10 05:04:59', '2025-07-10 05:04:59', 'loginhistory'),
(47, 0, 1, 'egoba_admin', '49.156.196.138', '2025-07-10 15:05:14', '2025-07-10 15:05:14', 'loginhistory'),
(48, 1, 1, 'egoba_admin', '49.156.196.138', '2025-07-10 15:05:22', '2025-07-10 15:05:22', 'loginhistory'),
(49, 1, 1, 'egoba_admin', '49.156.196.138', '2025-07-11 05:23:07', '2025-07-11 05:23:07', 'loginhistory'),
(50, 1, 1, 'egoba_admin', '49.156.196.138', '2025-07-14 06:14:10', '2025-07-14 06:14:10', 'loginhistory'),
(51, 1, 1, 'egoba_admin', '49.156.196.138', '2025-07-31 04:22:45', '2025-07-31 04:22:45', 'loginhistory'),
(52, 1, 1, 'egoba_admin', '49.156.196.138', '2025-08-01 01:21:33', '2025-08-01 01:21:33', 'loginhistory');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_mail_history`
--

CREATE TABLE `dtb_mail_history` (
  `id` int UNSIGNED NOT NULL,
  `order_id` int UNSIGNED DEFAULT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `send_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetimetz)',
  `mail_subject` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `mail_body` longtext COLLATE utf8mb4_bin,
  `mail_html_body` longtext COLLATE utf8mb4_bin,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_mail_template`
--

CREATE TABLE `dtb_mail_template` (
  `id` int UNSIGNED NOT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `mail_subject` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_mail_template`
--

INSERT INTO `dtb_mail_template` (`id`, `creator_id`, `name`, `file_name`, `mail_subject`, `create_date`, `update_date`, `discriminator_type`) VALUES
(1, NULL, '注文受付メール', 'Mail/order.twig', 'ご注文ありがとうございます', '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'mailtemplate'),
(2, NULL, '会員仮登録メール', 'Mail/entry_confirm.twig', '会員登録のご確認', '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'mailtemplate'),
(3, NULL, '会員本登録メール', 'Mail/entry_complete.twig', '会員登録が完了しました。', '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'mailtemplate'),
(4, NULL, '会員退会メール', 'Mail/customer_withdraw_mail.twig', '退会手続きのご完了', '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'mailtemplate'),
(5, NULL, '問合受付メール', 'Mail/contact_mail.twig', 'お問い合わせを受け付けました。', '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'mailtemplate'),
(6, NULL, 'パスワードリセット', 'Mail/forgot_mail.twig', 'パスワード変更のご確認', '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'mailtemplate'),
(7, NULL, 'パスワードリマインダー', 'Mail/reset_complete_mail.twig', 'パスワード変更のお知らせ', '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'mailtemplate'),
(8, NULL, '出荷通知メール', 'Mail/shipping_notify.twig', '商品出荷のお知らせ', '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'mailtemplate');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_member`
--

CREATE TABLE `dtb_member` (
  `id` int UNSIGNED NOT NULL,
  `work_id` smallint UNSIGNED DEFAULT NULL,
  `authority_id` smallint UNSIGNED DEFAULT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `login_id` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `salt` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `two_factor_auth_key` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `two_factor_auth_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `login_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_member`
--

INSERT INTO `dtb_member` (`id`, `work_id`, `authority_id`, `creator_id`, `name`, `department`, `login_id`, `password`, `salt`, `sort_no`, `two_factor_auth_key`, `two_factor_auth_enabled`, `create_date`, `update_date`, `login_date`, `discriminator_type`) VALUES
(1, 1, 0, 1, '管理者', 'egoba_rental', 'egoba_admin', '08aa155a4d59723301a8748504cb9786a60e11b7843e00b9b7c58653a4455ae5', '5m6WQv3FQ1gzNahWPDHkLAIC40jVTP6p', 1, NULL, 0, '2025-05-16 02:52:18', '2025-08-01 01:21:33', '2025-08-01 01:21:33', 'member');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_news`
--

CREATE TABLE `dtb_news` (
  `id` int UNSIGNED NOT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetimetz)',
  `title` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `description` longtext COLLATE utf8mb4_bin,
  `url` varchar(4000) COLLATE utf8mb4_bin DEFAULT NULL,
  `link_method` tinyint(1) NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_news`
--

INSERT INTO `dtb_news` (`id`, `creator_id`, `publish_date`, `title`, `description`, `url`, `link_method`, `create_date`, `update_date`, `visible`, `discriminator_type`) VALUES
(1, NULL, '2018-09-01 09:00:00', 'サイトオープンいたしました!', '旬の色どりスイーツとこだわりのジェラートをお届けします。', NULL, 1, '2018-09-01 09:00:00', '2018-09-01 09:00:00', 1, 'news'),
(2, 1, '2025-07-01 08:41:35', 'お知らせ', 'サイトを更新しました。', NULL, 0, '2025-07-01 08:42:16', '2025-07-01 08:42:16', 1, 'news');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_order`
--

CREATE TABLE `dtb_order` (
  `id` int UNSIGNED NOT NULL,
  `customer_id` int UNSIGNED DEFAULT NULL,
  `country_id` smallint UNSIGNED DEFAULT NULL,
  `pref_id` smallint UNSIGNED DEFAULT NULL,
  `sex_id` smallint UNSIGNED DEFAULT NULL,
  `job_id` smallint UNSIGNED DEFAULT NULL,
  `payment_id` int UNSIGNED DEFAULT NULL,
  `device_type_id` smallint UNSIGNED DEFAULT NULL,
  `pre_order_id` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `message` varchar(4000) COLLATE utf8mb4_bin DEFAULT NULL,
  `name01` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `name02` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `kana01` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `kana02` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `phone_number` varchar(14) COLLATE utf8mb4_bin DEFAULT NULL,
  `postal_code` varchar(8) COLLATE utf8mb4_bin DEFAULT NULL,
  `addr01` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `addr02` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `birth` datetime DEFAULT NULL COMMENT '(DC2Type:datetimetz)',
  `subtotal` decimal(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `discount` decimal(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `delivery_fee_total` decimal(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `charge` decimal(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `tax` decimal(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `total` decimal(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `payment_total` decimal(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `payment_method` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `note` varchar(4000) COLLATE utf8mb4_bin DEFAULT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `order_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetimetz)',
  `payment_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetimetz)',
  `currency_code` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `complete_message` longtext COLLATE utf8mb4_bin,
  `complete_mail_message` longtext COLLATE utf8mb4_bin,
  `add_point` decimal(12,0) UNSIGNED NOT NULL DEFAULT '0',
  `use_point` decimal(12,0) UNSIGNED NOT NULL DEFAULT '0',
  `order_status_id` smallint UNSIGNED DEFAULT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_order_item`
--

CREATE TABLE `dtb_order_item` (
  `id` int UNSIGNED NOT NULL,
  `order_id` int UNSIGNED DEFAULT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `product_class_id` int UNSIGNED DEFAULT NULL,
  `shipping_id` int UNSIGNED DEFAULT NULL,
  `rounding_type_id` smallint UNSIGNED DEFAULT NULL,
  `tax_type_id` smallint UNSIGNED DEFAULT NULL,
  `tax_display_type_id` smallint UNSIGNED DEFAULT NULL,
  `order_item_type_id` smallint UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `class_name1` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `class_name2` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `class_category_name1` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `class_category_name2` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `quantity` decimal(10,0) NOT NULL DEFAULT '0',
  `tax` decimal(10,0) NOT NULL DEFAULT '0',
  `tax_rate` decimal(10,0) UNSIGNED NOT NULL DEFAULT '0',
  `tax_adjust` decimal(10,0) UNSIGNED NOT NULL DEFAULT '0',
  `tax_rule_id` smallint UNSIGNED DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `processor_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `point_rate` decimal(10,0) UNSIGNED DEFAULT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_order_pdf`
--

CREATE TABLE `dtb_order_pdf` (
  `member_id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `message1` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `message2` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `message3` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `note1` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `note2` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `note3` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_page`
--

CREATE TABLE `dtb_page` (
  `id` int UNSIGNED NOT NULL,
  `master_page_id` int UNSIGNED DEFAULT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `edit_type` smallint UNSIGNED NOT NULL DEFAULT '1',
  `author` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `meta_robots` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `meta_tags` varchar(4000) COLLATE utf8mb4_bin DEFAULT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_page`
--

INSERT INTO `dtb_page` (`id`, `master_page_id`, `page_name`, `url`, `file_name`, `edit_type`, `author`, `description`, `keyword`, `create_date`, `update_date`, `meta_robots`, `meta_tags`, `discriminator_type`) VALUES
(0, NULL, 'プレビューデータ', 'preview', NULL, 1, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', NULL, NULL, 'page'),
(1, NULL, 'TOPページ', 'homepage', 'index', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', NULL, NULL, 'page'),
(2, NULL, '商品一覧ページ', 'product_list', 'Product/list', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', NULL, NULL, 'page'),
(3, NULL, '商品詳細ページ', 'product_detail', 'Product/detail', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', NULL, NULL, 'page'),
(4, NULL, 'MYページ', 'mypage', 'Mypage/index', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(5, NULL, 'MYページ/会員登録内容変更(入力ページ)', 'mypage_change', 'Mypage/change', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(6, NULL, 'MYページ/会員登録内容変更(完了ページ)', 'mypage_change_complete', 'Mypage/change_complete', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(7, NULL, 'MYページ/お届け先一覧', 'mypage_delivery', 'Mypage/delivery', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(8, NULL, 'MYページ/お届け先追加', 'mypage_delivery_new', 'Mypage/delivery_edit', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(9, NULL, 'MYページ/お気に入り一覧', 'mypage_favorite', 'Mypage/favorite', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(10, NULL, 'MYページ/購入履歴詳細', 'mypage_history', 'Mypage/history', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(11, NULL, 'MYページ/ログイン', 'mypage_login', 'Mypage/login', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(12, NULL, 'MYページ/退会手続き(入力ページ)', 'mypage_withdraw', 'Mypage/withdraw', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(13, NULL, 'MYページ/退会手続き(完了ページ)', 'mypage_withdraw_complete', 'Mypage/withdraw_complete', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(14, NULL, '当サイトについて', 'help_about', 'Help/about', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', NULL, NULL, 'page'),
(15, NULL, '現在のカゴの中', 'cart', 'Cart/index', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(16, NULL, 'お問い合わせ(入力ページ)', 'contact', 'Contact/index', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', NULL, NULL, 'page'),
(17, NULL, 'お問い合わせ(完了ページ)', 'contact_complete', 'Contact/complete', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(18, NULL, '会員登録(入力ページ)', 'entry', 'Entry/index', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', NULL, NULL, 'page'),
(19, NULL, 'ご利用規約', 'help_agreement', 'Help/agreement', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', NULL, NULL, 'page'),
(20, NULL, '会員登録(完了ページ)', 'entry_complete', 'Entry/complete', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(21, NULL, '特定商取引に関する法律に基づく表記', 'help_tradelaw', 'Help/tradelaw', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', NULL, NULL, 'page'),
(22, NULL, '本会員登録(完了ページ)', 'entry_activate', 'Entry/activate', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(23, NULL, '商品購入', 'shopping', 'Shopping/index', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(24, NULL, '商品購入/お届け先の指定', 'shopping_shipping', 'Shopping/shipping', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(25, NULL, '商品購入/お届け先の複数指定', 'shopping_shipping_multiple', 'Shopping/shipping_multiple', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(28, NULL, '商品購入/ご注文完了', 'shopping_complete', 'Shopping/complete', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(29, NULL, 'プライバシーポリシー', 'help_privacy', 'Help/privacy', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', NULL, NULL, 'page'),
(30, NULL, '商品購入ログイン', 'shopping_login', 'Shopping/login', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(31, NULL, '非会員購入情報入力', 'shopping_nonmember', 'Shopping/nonmember', 2, NULL, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'noindex', NULL, 'page'),
(32, NULL, '商品購入/お届け先の追加', 'shopping_shipping_edit', 'Shopping/shipping_edit', 2, NULL, NULL, NULL, '2017-03-07 01:15:02', '2017-03-07 01:15:02', 'noindex', NULL, 'page'),
(33, NULL, '商品購入/お届け先の複数指定(お届け先の追加)', 'shopping_shipping_multiple_edit', 'Shopping/shipping_multiple_edit', 2, NULL, NULL, NULL, '2017-03-07 01:15:02', '2017-03-07 01:15:02', 'noindex', NULL, 'page'),
(34, NULL, '商品購入/購入エラー', 'shopping_error', 'Shopping/shopping_error', 2, NULL, NULL, NULL, '2017-03-07 01:15:02', '2017-03-07 01:15:02', 'noindex', NULL, 'page'),
(35, NULL, 'ご利用ガイド', 'help_guide', 'Help/guide', 2, NULL, NULL, NULL, '2017-03-07 01:15:02', '2017-03-07 01:15:02', NULL, NULL, 'page'),
(36, NULL, 'パスワード再発行(入力ページ)', 'forgot', 'Forgot/index', 2, NULL, NULL, NULL, '2017-03-07 01:15:02', '2017-03-07 01:15:02', NULL, NULL, 'page'),
(37, NULL, 'パスワード再発行(完了ページ)', 'forgot_complete', 'Forgot/complete', 2, NULL, NULL, NULL, '2017-03-07 01:15:02', '2017-03-07 01:15:02', 'noindex', NULL, 'page'),
(38, NULL, 'パスワード再発行(再設定ページ)', 'forgot_reset', 'Forgot/reset', 2, NULL, NULL, NULL, '2017-03-07 01:15:02', '2017-03-07 01:15:05', 'noindex', NULL, 'page'),
(42, NULL, '商品購入/遷移', 'shopping_redirect_to', 'Shopping/index', 2, NULL, NULL, NULL, '2017-03-07 01:15:03', '2017-03-07 01:15:03', 'noindex', NULL, 'page'),
(44, 8, 'MYページ/お届け先編集', 'mypage_delivery_edit', 'Mypage/delivery_edit', 2, NULL, NULL, NULL, '2017-03-07 01:15:05', '2017-03-07 01:15:05', 'noindex', NULL, 'page'),
(45, NULL, '商品購入/ご注文確認', 'shopping_confirm', 'Shopping/confirm', 2, NULL, NULL, NULL, '2017-03-07 01:15:03', '2017-03-07 01:15:03', 'noindex', NULL, 'page'),
(46, 18, '会員登録(確認ページ)', 'entry_confirm', 'Entry/confirm', 3, NULL, NULL, NULL, '2020-01-12 01:15:03', '2020-01-12 01:15:03', 'noindex', NULL, 'page'),
(47, 12, 'MYページ/退会手続き(確認ページ)', 'mypage_withdraw_confirm', 'Mypage/withdraw_confirm', 3, NULL, NULL, NULL, '2020-01-12 10:14:52', '2020-01-12 10:14:52', 'noindex', NULL, 'page'),
(48, 16, 'お問い合わせ(確認ページ)', 'contact_confirm', 'Contact/confirm', 3, NULL, NULL, NULL, '2020-01-12 10:14:52', '2020-01-12 10:14:52', 'noindex', NULL, 'page'),
(49, NULL, 'カスタム新着情報詳細', 'custom_news_detail', 'custom_news_detail', 0, NULL, NULL, NULL, '2025-07-01 08:31:23', '2025-07-01 08:31:23', NULL, NULL, 'page'),
(50, NULL, '公式LINE紹介ページ', 'line_ad_detail', 'line_ad_detail', 0, NULL, NULL, NULL, '2025-07-10 05:10:16', '2025-07-10 05:10:16', NULL, NULL, 'page'),
(51, NULL, 'クーポン特集ページ', 'coupon_special', 'coupon_special', 0, NULL, NULL, NULL, '2025-07-14 06:19:46', '2025-07-14 06:19:46', NULL, NULL, 'page');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_page_layout`
--

CREATE TABLE `dtb_page_layout` (
  `page_id` int UNSIGNED NOT NULL,
  `layout_id` int UNSIGNED NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_page_layout`
--

INSERT INTO `dtb_page_layout` (`page_id`, `layout_id`, `sort_no`, `discriminator_type`) VALUES
(0, 0, 2, 'pagelayout'),
(1, 1, 44, 'pagelayout'),
(2, 2, 4, 'pagelayout'),
(3, 2, 5, 'pagelayout'),
(4, 2, 6, 'pagelayout'),
(5, 2, 7, 'pagelayout'),
(6, 2, 8, 'pagelayout'),
(7, 2, 36, 'pagelayout'),
(8, 2, 37, 'pagelayout'),
(9, 2, 9, 'pagelayout'),
(10, 2, 10, 'pagelayout'),
(11, 2, 11, 'pagelayout'),
(12, 2, 12, 'pagelayout'),
(13, 2, 14, 'pagelayout'),
(14, 2, 13, 'pagelayout'),
(15, 2, 15, 'pagelayout'),
(16, 2, 16, 'pagelayout'),
(17, 2, 17, 'pagelayout'),
(18, 2, 18, 'pagelayout'),
(19, 2, 33, 'pagelayout'),
(20, 2, 19, 'pagelayout'),
(21, 2, 20, 'pagelayout'),
(22, 2, 21, 'pagelayout'),
(23, 2, 35, 'pagelayout'),
(24, 2, 22, 'pagelayout'),
(25, 2, 34, 'pagelayout'),
(28, 2, 23, 'pagelayout'),
(29, 2, 24, 'pagelayout'),
(30, 2, 25, 'pagelayout'),
(31, 2, 26, 'pagelayout'),
(32, 2, 27, 'pagelayout'),
(33, 2, 28, 'pagelayout'),
(34, 2, 29, 'pagelayout'),
(35, 2, 30, 'pagelayout'),
(36, 2, 31, 'pagelayout'),
(37, 2, 32, 'pagelayout'),
(38, 2, 39, 'pagelayout'),
(42, 2, 38, 'pagelayout'),
(44, 2, 40, 'pagelayout'),
(45, 2, 41, 'pagelayout'),
(46, 2, 42, 'pagelayout'),
(47, 2, 43, 'pagelayout'),
(48, 2, 44, 'pagelayout');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_payment`
--

CREATE TABLE `dtb_payment` (
  `id` int UNSIGNED NOT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `charge` decimal(12,2) UNSIGNED DEFAULT '0.00',
  `rule_max` decimal(12,2) UNSIGNED DEFAULT NULL,
  `sort_no` smallint UNSIGNED DEFAULT NULL,
  `fixed` tinyint(1) NOT NULL DEFAULT '1',
  `payment_image` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `rule_min` decimal(12,2) UNSIGNED DEFAULT NULL,
  `method_class` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_payment`
--

INSERT INTO `dtb_payment` (`id`, `creator_id`, `payment_method`, `charge`, `rule_max`, `sort_no`, `fixed`, `payment_image`, `rule_min`, `method_class`, `visible`, `create_date`, `update_date`, `discriminator_type`) VALUES
(1, NULL, '郵便振替', 0.00, NULL, 4, 1, NULL, 0.00, 'Eccube\\Service\\Payment\\Method\\Cash', 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'payment'),
(2, NULL, '現金書留', 0.00, NULL, 3, 1, NULL, 0.00, 'Eccube\\Service\\Payment\\Method\\Cash', 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'payment'),
(3, NULL, '銀行振込', 0.00, NULL, 2, 1, NULL, 0.00, 'Eccube\\Service\\Payment\\Method\\Cash', 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'payment'),
(4, NULL, '代金引換', 0.00, NULL, 1, 1, NULL, 0.00, 'Eccube\\Service\\Payment\\Method\\Cash', 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'payment');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_payment_option`
--

CREATE TABLE `dtb_payment_option` (
  `delivery_id` int UNSIGNED NOT NULL,
  `payment_id` int UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_payment_option`
--

INSERT INTO `dtb_payment_option` (`delivery_id`, `payment_id`, `discriminator_type`) VALUES
(1, 1, 'paymentoption'),
(1, 2, 'paymentoption'),
(1, 3, 'paymentoption'),
(1, 4, 'paymentoption'),
(2, 3, 'paymentoption');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_plugin`
--

CREATE TABLE `dtb_plugin` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `version` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `initialized` tinyint(1) NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_plugin`
--

INSERT INTO `dtb_plugin` (`id`, `name`, `code`, `enabled`, `version`, `source`, `initialized`, `create_date`, `update_date`, `discriminator_type`) VALUES
(1, 'おすすめ商品管理プラグイン', 'Recommend42', 1, '4.2.2', '2403', 1, '2021-08-13 00:00:00', '2025-05-16 08:56:02', 'plugin'),
(2, 'Coupon Plugin for EC-CUBE42', 'Coupon42', 0, '4.2.4', '2401', 0, '2021-08-13 00:00:00', '2021-08-13 00:00:00', 'plugin'),
(3, 'メールマガジンプラグイン', 'MailMagazine42', 0, '4.2.3', '2404', 0, '2021-08-13 00:00:00', '2021-08-13 00:00:00', 'plugin'),
(4, '売上集計プラグイン', 'SalesReport42', 0, '4.2.3', '2406', 0, '2021-08-13 00:00:00', '2021-08-13 00:00:00', 'plugin'),
(5, '関連商品プラグイン', 'RelatedProduct42', 0, '4.2.2', '2398', 0, '2021-08-13 00:00:00', '2021-08-13 00:00:00', 'plugin'),
(6, 'Securitychecker42', 'Securitychecker42', 0, '4.2.0', '2402', 0, '2021-08-13 00:00:00', '2021-08-13 00:00:00', 'plugin'),
(7, '商品レビュー管理プラグイン', 'ProductReview42', 0, '4.2.4', '2405', 0, '2021-08-13 00:00:00', '2021-08-13 00:00:00', 'plugin'),
(8, 'Web API', 'Api42', 0, '4.2.3', '2400', 0, '2021-08-13 00:00:00', '2021-08-13 00:00:00', 'plugin'),
(9, 'Site Kit プラグイン', 'SiteKit42', 0, '4.2.2', '2399', 0, '2021-08-13 00:00:00', '2021-08-13 00:00:00', 'plugin'),
(11, 'EC-CUBE用レンタル管理プラグイン', 'Rental', 1, '1.0.0', '0', 1, '2025-05-16 07:36:05', '2025-05-16 08:17:20', 'plugin'),
(13, 'カテゴリー商品ブロックプラグイン', 'CategoryProductBlock', 1, '1.0.0', '0', 1, '2025-05-30 07:35:42', '2025-05-30 07:36:02', 'plugin'),
(14, 'メーカー管理プラグイン', 'Maker42', 1, '4.3.0', '0', 1, '2025-06-06 06:36:16', '2025-06-06 06:36:33', 'plugin'),
(16, 'メーカー商品ブロックプラグイン', 'MakerProductBlock', 1, '1.0.0', '0', 1, '2025-06-09 06:07:38', '2025-06-09 06:23:18', 'plugin'),
(18, '段落テキストブロックプラグイン', 'LeftTextBlock', 1, '1.0.0', '0', 1, '2025-06-16 04:25:31', '2025-06-16 04:25:50', 'plugin'),
(19, 'WordPress風カルーセル特集機能プラグイン', 'CarouselFeature', 1, '1.0.0', '0', 1, '2025-07-01 05:24:35', '2025-07-01 05:25:00', 'plugin');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_product`
--

CREATE TABLE `dtb_product` (
  `id` int UNSIGNED NOT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `product_status_id` smallint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `note` longtext COLLATE utf8mb4_bin,
  `description_list` longtext COLLATE utf8mb4_bin,
  `description_detail` longtext COLLATE utf8mb4_bin,
  `search_word` longtext COLLATE utf8mb4_bin,
  `free_area` longtext COLLATE utf8mb4_bin,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `maker_id` int UNSIGNED DEFAULT NULL,
  `maker_url` varchar(1024) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_product`
--

INSERT INTO `dtb_product` (`id`, `creator_id`, `product_status_id`, `name`, `note`, `description_list`, `description_detail`, `search_word`, `free_area`, `create_date`, `update_date`, `discriminator_type`, `maker_id`, `maker_url`) VALUES
(1, NULL, 1, '彩のジェラートCUBE', NULL, NULL, '冬でも食べたい立方体のジェラート。\n定番のチョコフレーバーは、チョコレート特有の甘い香りが特徴です。適度な甘みと日本人の口に合いやすいサイズ感で長く愛用いただけます。\n最高級バニラフレーバーは、贈り物としても人気です。', NULL, NULL, '2018-09-28 10:14:52', '2018-09-28 10:14:52', 'product', NULL, NULL),
(2, NULL, 1, 'チェリーアイスサンド', NULL, NULL, 'チェリーアイスサンドは北海道産のチェリーのアイスをサクサクのクッキーでサンドしたスイーツです。\n立方体なので大量に持ち運ぶときも便利です。\nいまだけ、頑丈な箱つきです。', NULL, NULL, '2018-09-28 10:14:52', '2018-09-28 10:14:52', 'product', NULL, NULL),
(3, 1, 1, 'ロボホンライト', NULL, NULL, 'シャープ独自のロボット', 'ロボホンライト　ロボット　シャープ　SHARP sharp', NULL, '2025-05-30 07:43:23', '2025-07-10 15:24:12', 'product', 4, NULL),
(4, 1, 1, '本', NULL, NULL, NULL, NULL, NULL, '2025-05-30 07:58:07', '2025-05-30 08:02:31', 'product', NULL, NULL),
(5, 1, 1, 'VAIO F16', NULL, NULL, '最新PC', 'パソコン　PC　pc　vaio VAIO ソニー', NULL, '2025-06-09 07:12:56', '2025-07-10 15:07:40', 'product', 3, NULL),
(6, 1, 1, 'X8 series X8900R', NULL, NULL, '2025年最新製品', NULL, NULL, '2025-06-09 18:29:53', '2025-07-10 15:14:58', 'product', 2, NULL),
(7, 1, 1, '【SONY】PS5', NULL, NULL, 'プレイステーション５', 'プレイステーション　PS5　ゲーム', NULL, '2025-07-10 07:26:17', '2025-07-10 07:30:44', 'product', 3, NULL),
(8, 1, 1, 'VLOGCAM　ZV-E1', NULL, NULL, '１眼レフカメラ', 'カメラ　１眼レフ　SONY', NULL, '2025-07-10 07:44:00', '2025-07-10 07:45:12', 'product', 3, NULL),
(9, 1, 1, '【Panasonic】ROBO', NULL, NULL, '癒しロボット', 'パナソニック　ロボット', NULL, '2025-07-10 07:53:25', '2025-07-10 07:53:25', 'product', 1, NULL),
(10, 1, 1, 'Roomba Combo 10MAX', NULL, NULL, '最新機能搭載', 'ルンバ　掃除', NULL, '2025-07-10 08:01:55', '2025-07-10 08:02:39', 'product', NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_product_category`
--

CREATE TABLE `dtb_product_category` (
  `product_id` int UNSIGNED NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_product_category`
--

INSERT INTO `dtb_product_category` (`product_id`, `category_id`, `discriminator_type`) VALUES
(1, 1, 'productcategory'),
(1, 2, 'productcategory'),
(1, 3, 'productcategory'),
(1, 4, 'productcategory'),
(2, 2, 'productcategory'),
(2, 5, 'productcategory'),
(2, 6, 'productcategory'),
(3, 7, 'productcategory'),
(3, 12, 'productcategory'),
(3, 15, 'productcategory'),
(4, 10, 'productcategory'),
(5, 7, 'productcategory'),
(6, 7, 'productcategory'),
(6, 12, 'productcategory'),
(6, 19, 'productcategory'),
(7, 7, 'productcategory'),
(7, 11, 'productcategory'),
(7, 12, 'productcategory'),
(8, 7, 'productcategory'),
(8, 11, 'productcategory'),
(8, 14, 'productcategory'),
(9, 7, 'productcategory'),
(9, 15, 'productcategory'),
(10, 7, 'productcategory'),
(10, 15, 'productcategory'),
(10, 16, 'productcategory'),
(10, 17, 'productcategory');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_product_class`
--

CREATE TABLE `dtb_product_class` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `sale_type_id` smallint UNSIGNED DEFAULT NULL,
  `class_category_id1` int UNSIGNED DEFAULT NULL,
  `class_category_id2` int UNSIGNED DEFAULT NULL,
  `delivery_duration_id` int UNSIGNED DEFAULT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `stock` decimal(10,0) DEFAULT NULL,
  `stock_unlimited` tinyint(1) NOT NULL DEFAULT '0',
  `sale_limit` decimal(10,0) UNSIGNED DEFAULT NULL,
  `price01` decimal(12,2) DEFAULT NULL,
  `price02` decimal(12,2) NOT NULL,
  `delivery_fee` decimal(12,2) UNSIGNED DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `currency_code` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `point_rate` decimal(10,0) UNSIGNED DEFAULT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_product_class`
--

INSERT INTO `dtb_product_class` (`id`, `product_id`, `sale_type_id`, `class_category_id1`, `class_category_id2`, `delivery_duration_id`, `creator_id`, `product_code`, `stock`, `stock_unlimited`, `sale_limit`, `price01`, `price02`, `delivery_fee`, `visible`, `create_date`, `update_date`, `currency_code`, `point_rate`, `discriminator_type`) VALUES
(1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 115000.00, 110000.00, NULL, 0, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'JPY', NULL, 'productclass'),
(2, 1, 1, 3, 6, NULL, NULL, 'cube-01', NULL, 1, NULL, 115000.00, 110000.00, NULL, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'JPY', NULL, 'productclass'),
(3, 1, 1, 3, 5, NULL, NULL, 'cube-02', NULL, 1, NULL, 95000.00, 93000.00, NULL, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'JPY', NULL, 'productclass'),
(4, 1, 1, 3, 4, NULL, NULL, 'cube-03', NULL, 1, NULL, 75000.00, 74000.00, NULL, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'JPY', NULL, 'productclass'),
(5, 1, 1, 2, 6, NULL, NULL, 'cube-04', NULL, 1, NULL, 95000.00, 93000.00, NULL, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'JPY', NULL, 'productclass'),
(6, 1, 1, 2, 5, NULL, NULL, 'cube-05', NULL, 1, NULL, 50000.00, 49000.00, NULL, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'JPY', NULL, 'productclass'),
(7, 1, 1, 2, 4, NULL, NULL, 'cube-06', NULL, 1, NULL, 35000.00, 34500.00, NULL, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'JPY', NULL, 'productclass'),
(8, 1, 1, 1, 6, NULL, NULL, 'cube-07', NULL, 1, NULL, NULL, 18000.00, NULL, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'JPY', NULL, 'productclass'),
(9, 1, 1, 1, 5, NULL, NULL, 'cube-08', NULL, 1, NULL, NULL, 13000.00, NULL, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'JPY', NULL, 'productclass'),
(10, 1, 1, 1, 4, NULL, NULL, 'cube-09', NULL, 1, NULL, NULL, 5000.00, NULL, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'JPY', NULL, 'productclass'),
(11, 2, 1, NULL, NULL, NULL, NULL, 'sand-01', 100, 0, 5, 3000.00, 2800.00, NULL, 1, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'JPY', NULL, 'productclass'),
(12, 3, 1, NULL, NULL, NULL, 1, NULL, 1, 0, 1, 2000.00, 2000.00, NULL, 1, '2025-05-30 07:43:23', '2025-07-10 15:24:12', 'JPY', NULL, 'productclass'),
(13, 4, 1, NULL, NULL, NULL, 1, NULL, 1, 0, 1, 500.00, 500.00, NULL, 1, '2025-05-30 07:58:07', '2025-05-30 08:02:30', 'JPY', NULL, 'productclass'),
(14, 5, 1, NULL, NULL, NULL, 1, 'pc-01', 1, 0, 1, 2000.00, 2000.00, NULL, 1, '2025-06-09 07:12:56', '2025-07-10 15:07:40', 'JPY', NULL, 'productclass'),
(15, 6, 1, NULL, NULL, NULL, 1, NULL, 1, 0, 1, 1000.00, 1000.00, NULL, 1, '2025-06-09 18:29:53', '2025-07-10 15:14:58', 'JPY', NULL, 'productclass'),
(16, 7, 1, NULL, NULL, 4, 1, 'ps-05', 5, 0, 1, 1000.00, 1000.00, NULL, 1, '2025-07-10 07:26:17', '2025-07-10 07:30:44', 'JPY', NULL, 'productclass'),
(17, 8, 1, NULL, NULL, 4, 1, 'cam-01', 5, 0, 1, 500.00, 500.00, NULL, 1, '2025-07-10 07:44:00', '2025-07-10 07:45:12', 'JPY', NULL, 'productclass'),
(18, 9, 1, NULL, NULL, 7, 1, 'robo-01', 1, 0, 1, 300.00, 300.00, NULL, 1, '2025-07-10 07:53:25', '2025-07-10 07:53:25', 'JPY', NULL, 'productclass'),
(19, 10, 1, NULL, NULL, 7, 1, 'rumba-01', NULL, 1, 5, 500.00, 500.00, NULL, 1, '2025-07-10 08:01:55', '2025-07-10 08:02:39', 'JPY', NULL, 'productclass');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_product_image`
--

CREATE TABLE `dtb_product_image` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_product_image`
--

INSERT INTO `dtb_product_image` (`id`, `product_id`, `creator_id`, `file_name`, `sort_no`, `create_date`, `discriminator_type`) VALUES
(1, 1, NULL, 'cube-1.png', 1, '2017-03-07 10:14:52', 'productimage'),
(2, 1, NULL, 'cube-2.png', 2, '2017-03-07 10:14:52', 'productimage'),
(3, 1, NULL, 'cube-3.png', 3, '2017-03-07 10:14:52', 'productimage'),
(4, 2, NULL, 'sand-1.png', 1, '2017-03-07 10:14:52', 'productimage'),
(5, 2, NULL, 'sand-2.png', 2, '2017-03-07 10:14:52', 'productimage'),
(6, 2, NULL, 'sand-3.png', 3, '2017-03-07 10:14:52', 'productimage'),
(8, 4, 1, '0530165758_68396506acd94.jpeg', 0, '2025-05-30 07:58:07', 'productimage'),
(11, 7, 1, '0710162301_686f6a55f2b88.png', 0, '2025-07-10 07:26:17', 'productimage'),
(12, 8, 1, '0710164233_686f6ee9722d8.png', 0, '2025-07-10 07:44:00', 'productimage'),
(13, 9, 1, '0710165132_686f710470ded.png', 0, '2025-07-10 07:53:25', 'productimage'),
(14, 10, 1, '0710165858_686f72c22cecd.png', 0, '2025-07-10 08:01:55', 'productimage'),
(15, 5, 1, '0711000612_686fd6e4d1396.png', 0, '2025-07-10 15:07:40', 'productimage'),
(16, 6, 1, '0711001447_686fd8e7e7112.png', 0, '2025-07-10 15:14:58', 'productimage'),
(17, 3, 1, '0711002259_686fdad323a81.png', 0, '2025-07-10 15:24:12', 'productimage');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_product_stock`
--

CREATE TABLE `dtb_product_stock` (
  `id` int UNSIGNED NOT NULL,
  `product_class_id` int UNSIGNED DEFAULT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `stock` decimal(10,0) DEFAULT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_product_stock`
--

INSERT INTO `dtb_product_stock` (`id`, `product_class_id`, `creator_id`, `stock`, `create_date`, `update_date`, `discriminator_type`) VALUES
(1, 1, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'productstock'),
(2, 2, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'productstock'),
(3, 3, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'productstock'),
(4, 4, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'productstock'),
(5, 5, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'productstock'),
(6, 6, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'productstock'),
(7, 7, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'productstock'),
(8, 8, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'productstock'),
(9, 9, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'productstock'),
(10, 10, NULL, NULL, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'productstock'),
(11, 11, NULL, 100, '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'productstock'),
(12, 12, 1, 1, '2025-05-30 07:43:23', '2025-07-10 15:24:12', 'productstock'),
(13, 13, 1, 1, '2025-05-30 07:58:07', '2025-05-30 08:02:30', 'productstock'),
(14, 14, 1, 1, '2025-06-09 07:12:56', '2025-07-10 15:07:40', 'productstock'),
(15, 15, 1, 1, '2025-06-09 18:29:53', '2025-07-10 15:14:58', 'productstock'),
(16, 16, 1, 5, '2025-07-10 07:26:17', '2025-07-10 07:30:44', 'productstock'),
(17, 17, 1, 5, '2025-07-10 07:44:00', '2025-07-10 07:45:12', 'productstock'),
(18, 18, 1, 1, '2025-07-10 07:53:25', '2025-07-10 07:53:25', 'productstock'),
(19, 19, 1, NULL, '2025-07-10 08:01:55', '2025-07-10 08:01:55', 'productstock');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_product_tag`
--

CREATE TABLE `dtb_product_tag` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `tag_id` int UNSIGNED DEFAULT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_shipping`
--

CREATE TABLE `dtb_shipping` (
  `id` int UNSIGNED NOT NULL,
  `order_id` int UNSIGNED DEFAULT NULL,
  `country_id` smallint UNSIGNED DEFAULT NULL,
  `pref_id` smallint UNSIGNED DEFAULT NULL,
  `delivery_id` int UNSIGNED DEFAULT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `name01` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `name02` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `kana01` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `kana02` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `phone_number` varchar(14) COLLATE utf8mb4_bin DEFAULT NULL,
  `postal_code` varchar(8) COLLATE utf8mb4_bin DEFAULT NULL,
  `addr01` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `addr02` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `delivery_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `time_id` int UNSIGNED DEFAULT NULL,
  `delivery_time` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetimetz)',
  `shipping_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetimetz)',
  `tracking_number` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `note` varchar(4000) COLLATE utf8mb4_bin DEFAULT NULL,
  `sort_no` smallint UNSIGNED DEFAULT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `mail_send_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_tag`
--

CREATE TABLE `dtb_tag` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_tag`
--

INSERT INTO `dtb_tag` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(1, '新商品', 1, 'tag'),
(2, 'おすすめ商品', 2, 'tag'),
(3, '限定品', 3, 'tag');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_tax_rule`
--

CREATE TABLE `dtb_tax_rule` (
  `id` int UNSIGNED NOT NULL,
  `product_class_id` int UNSIGNED DEFAULT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `country_id` smallint UNSIGNED DEFAULT NULL,
  `pref_id` smallint UNSIGNED DEFAULT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `rounding_type_id` smallint UNSIGNED DEFAULT NULL,
  `tax_rate` decimal(10,0) UNSIGNED NOT NULL DEFAULT '0',
  `tax_adjust` decimal(10,0) UNSIGNED NOT NULL DEFAULT '0',
  `apply_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_tax_rule`
--

INSERT INTO `dtb_tax_rule` (`id`, `product_class_id`, `creator_id`, `country_id`, `pref_id`, `product_id`, `rounding_type_id`, `tax_rate`, `tax_adjust`, `apply_date`, `create_date`, `update_date`, `discriminator_type`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 1, 10, 0, '2017-03-07 10:14:52', '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'taxrule');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_template`
--

CREATE TABLE `dtb_template` (
  `id` int UNSIGNED NOT NULL,
  `device_type_id` smallint UNSIGNED DEFAULT NULL,
  `template_code` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `template_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_template`
--

INSERT INTO `dtb_template` (`id`, `device_type_id`, `template_code`, `template_name`, `create_date`, `update_date`, `discriminator_type`) VALUES
(1, 10, 'default', 'デフォルト', '2017-03-07 10:14:52', '2017-03-07 10:14:52', 'template');

-- --------------------------------------------------------

--
-- テーブルの構造 `dtb_tradelaw`
--

CREATE TABLE `dtb_tradelaw` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `description` varchar(4000) COLLATE utf8mb4_bin DEFAULT NULL,
  `sort_no` smallint NOT NULL,
  `display_order_screen` tinyint(1) NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `dtb_tradelaw`
--

INSERT INTO `dtb_tradelaw` (`id`, `name`, `description`, `sort_no`, `display_order_screen`, `discriminator_type`) VALUES
(1, '販売業者', NULL, 1, 0, 'tradelaw'),
(2, '代表責任者', NULL, 2, 0, 'tradelaw'),
(3, '所在地', NULL, 3, 0, 'tradelaw'),
(4, '電話番号', NULL, 4, 0, 'tradelaw'),
(5, 'メールアドレス', NULL, 5, 0, 'tradelaw'),
(6, 'URL', NULL, 6, 0, 'tradelaw'),
(7, '商品代金以外の必要料金', NULL, 7, 0, 'tradelaw'),
(8, '引き渡し時期', NULL, 8, 0, 'tradelaw'),
(9, 'お支払方法', NULL, 9, 0, 'tradelaw'),
(10, '返品・交換について', NULL, 10, 0, 'tradelaw'),
(11, NULL, NULL, 11, 0, 'tradelaw'),
(12, NULL, NULL, 12, 0, 'tradelaw'),
(13, NULL, NULL, 13, 0, 'tradelaw'),
(14, NULL, NULL, 14, 0, 'tradelaw'),
(15, NULL, NULL, 15, 0, 'tradelaw');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_authority`
--

CREATE TABLE `mtb_authority` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_authority`
--

INSERT INTO `mtb_authority` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(0, 'システム管理者', 0, 'authority'),
(1, '店舗オーナー', 1, 'authority');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_country`
--

CREATE TABLE `mtb_country` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_country`
--

INSERT INTO `mtb_country` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(4, 'アフガニスタン', 4, 'country'),
(8, 'アルバニア', 12, 'country'),
(10, '南極', 149, 'country'),
(12, 'アルジェリア', 9, 'country'),
(16, 'アメリカ領サモア', 7, 'country'),
(20, 'アンドラ', 17, 'country'),
(24, 'アンゴラ', 15, 'country'),
(28, 'アンティグア・バーブーダ', 16, 'country'),
(31, 'アゼルバイジャン', 3, 'country'),
(32, 'アルゼンチン', 10, 'country'),
(36, 'オーストラリア', 39, 'country'),
(40, 'オーストリア', 40, 'country'),
(44, 'バハマ', 167, 'country'),
(48, 'バーレーン', 161, 'country'),
(50, 'バングラデシュ', 175, 'country'),
(51, 'アルメニア', 13, 'country'),
(52, 'バルバドス', 172, 'country'),
(56, 'ベルギー', 201, 'country'),
(60, 'バミューダ諸島|バミューダ', 169, 'country'),
(64, 'ブータン', 181, 'country'),
(68, 'ボリビア|ボリビア多民族国', 206, 'country'),
(70, 'ボスニア・ヘルツェゴビナ', 203, 'country'),
(72, 'ボツワナ', 204, 'country'),
(74, 'ブーベ島', 182, 'country'),
(76, 'ブラジル', 186, 'country'),
(84, 'ベリーズ', 199, 'country'),
(86, 'イギリス領インド洋地域', 20, 'country'),
(90, 'ソロモン諸島', 121, 'country'),
(92, 'イギリス領ヴァージン諸島', 21, 'country'),
(96, 'ブルネイ|ブルネイ・ダルサラーム', 193, 'country'),
(100, 'ブルガリア', 191, 'country'),
(104, 'ミャンマー', 224, 'country'),
(108, 'ブルンジ', 194, 'country'),
(112, 'ベラルーシ', 198, 'country'),
(116, 'カンボジア', 55, 'country'),
(120, 'カメルーン', 53, 'country'),
(124, 'カナダ', 51, 'country'),
(132, 'カーボベルデ', 45, 'country'),
(136, 'ケイマン諸島', 75, 'country'),
(140, '中央アフリカ共和国', 130, 'country'),
(144, 'スリランカ', 108, 'country'),
(148, 'チャド', 129, 'country'),
(152, 'チリ', 134, 'country'),
(156, '中華人民共和国|中国', 131, 'country'),
(158, '台湾', 125, 'country'),
(162, 'クリスマス島 (オーストラリア)|クリスマス島', 71, 'country'),
(166, 'ココス諸島|ココス（キーリング）諸島', 78, 'country'),
(170, 'コロンビア', 81, 'country'),
(174, 'コモロ', 80, 'country'),
(175, 'マヨット', 214, 'country'),
(178, 'コンゴ共和国', 82, 'country'),
(180, 'コンゴ民主共和国', 83, 'country'),
(184, 'クック諸島', 69, 'country'),
(188, 'コスタリカ', 79, 'country'),
(191, 'クロアチア', 74, 'country'),
(192, 'キューバ', 60, 'country'),
(196, 'キプロス', 59, 'country'),
(203, 'チェコ', 128, 'country'),
(204, 'ベナン', 196, 'country'),
(208, 'デンマーク', 136, 'country'),
(212, 'ドミニカ国', 141, 'country'),
(214, 'ドミニカ共和国', 140, 'country'),
(218, 'エクアドル', 33, 'country'),
(222, 'エルサルバドル', 38, 'country'),
(226, '赤道ギニア', 113, 'country'),
(231, 'エチオピア', 36, 'country'),
(232, 'エリトリア', 37, 'country'),
(233, 'エストニア', 35, 'country'),
(234, 'フェロー諸島', 184, 'country'),
(238, 'フォークランド諸島|フォークランド（マルビナス）諸島', 185, 'country'),
(239, 'サウスジョージア・サウスサンドウィッチ諸島', 85, 'country'),
(242, 'フィジー', 178, 'country'),
(246, 'フィンランド', 180, 'country'),
(248, 'オーランド諸島', 41, 'country'),
(250, 'フランス', 187, 'country'),
(254, 'フランス領ギアナ', 188, 'country'),
(258, 'フランス領ポリネシア', 189, 'country'),
(260, 'フランス領南方・南極地域', 190, 'country'),
(262, 'ジブチ', 94, 'country'),
(266, 'ガボン', 52, 'country'),
(268, 'グルジア', 72, 'country'),
(270, 'ガンビア', 54, 'country'),
(275, 'パレスチナ', 173, 'country'),
(276, 'ドイツ', 137, 'country'),
(288, 'ガーナ', 44, 'country'),
(292, 'ジブラルタル', 95, 'country'),
(296, 'キリバス', 63, 'country'),
(300, 'ギリシャ', 62, 'country'),
(304, 'グリーンランド', 70, 'country'),
(308, 'グレナダ', 73, 'country'),
(312, 'グアドループ', 66, 'country'),
(316, 'グアム', 67, 'country'),
(320, 'グアテマラ', 65, 'country'),
(324, 'ギニア', 57, 'country'),
(328, 'ガイアナ', 47, 'country'),
(332, 'ハイチ', 162, 'country'),
(334, 'ハード島とマクドナルド諸島', 160, 'country'),
(336, 'バチカン|バチカン市国', 164, 'country'),
(340, 'ホンジュラス', 209, 'country'),
(344, '香港', 208, 'country'),
(348, 'ハンガリー', 174, 'country'),
(352, 'アイスランド', 1, 'country'),
(356, 'インド', 26, 'country'),
(360, 'インドネシア', 27, 'country'),
(364, 'イラン|イラン・イスラム共和国', 25, 'country'),
(368, 'イラク', 24, 'country'),
(372, 'アイルランド', 2, 'country'),
(376, 'イスラエル', 22, 'country'),
(380, 'イタリア', 23, 'country'),
(384, 'コートジボワール', 77, 'country'),
(388, 'ジャマイカ', 97, 'country'),
(392, '日本', 153, 'country'),
(398, 'カザフスタン', 48, 'country'),
(400, 'ヨルダン', 236, 'country'),
(404, 'ケニア', 76, 'country'),
(408, '朝鮮民主主義人民共和国', 133, 'country'),
(410, '大韓民国', 124, 'country'),
(414, 'クウェート', 68, 'country'),
(417, 'キルギス', 64, 'country'),
(418, 'ラオス|ラオス人民民主共和国', 237, 'country'),
(422, 'レバノン', 247, 'country'),
(426, 'レソト', 246, 'country'),
(428, 'ラトビア', 238, 'country'),
(430, 'リベリア', 242, 'country'),
(434, 'リビア', 240, 'country'),
(438, 'リヒテンシュタイン', 241, 'country'),
(440, 'リトアニア', 239, 'country'),
(442, 'ルクセンブルク', 244, 'country'),
(446, 'マカオ', 211, 'country'),
(450, 'マダガスカル', 213, 'country'),
(454, 'マラウイ', 215, 'country'),
(458, 'マレーシア', 219, 'country'),
(462, 'モルディブ', 230, 'country'),
(466, 'マリ共和国|マリ', 216, 'country'),
(470, 'マルタ', 217, 'country'),
(474, 'マルティニーク', 218, 'country'),
(478, 'モーリタニア', 227, 'country'),
(480, 'モーリシャス', 226, 'country'),
(484, 'メキシコ', 225, 'country'),
(492, 'モナコ', 229, 'country'),
(496, 'モンゴル国|モンゴル', 233, 'country'),
(498, 'モルドバ|モルドバ共和国', 231, 'country'),
(499, 'モンテネグロ', 234, 'country'),
(500, 'モントセラト', 235, 'country'),
(504, 'モロッコ', 232, 'country'),
(508, 'モザンビーク', 228, 'country'),
(512, 'オマーン', 42, 'country'),
(516, 'ナミビア', 148, 'country'),
(520, 'ナウル', 147, 'country'),
(524, 'ネパール', 157, 'country'),
(528, 'オランダ', 43, 'country'),
(531, 'キュラソー島|キュラソー', 61, 'country'),
(533, 'アルバ', 11, 'country'),
(534, 'シント・マールテン|シント・マールテン（オランダ領）', 100, 'country'),
(535, 'BES諸島|ボネール、シント・ユースタティウスおよびサバ', 205, 'country'),
(540, 'ニューカレドニア', 155, 'country'),
(548, 'バヌアツ', 166, 'country'),
(554, 'ニュージーランド', 156, 'country'),
(558, 'ニカラグア', 151, 'country'),
(562, 'ニジェール', 152, 'country'),
(566, 'ナイジェリア', 146, 'country'),
(570, 'ニウエ', 150, 'country'),
(574, 'ノーフォーク島', 158, 'country'),
(578, 'ノルウェー', 159, 'country'),
(580, '北マリアナ諸島', 56, 'country'),
(581, '合衆国領有小離島', 50, 'country'),
(583, 'ミクロネシア連邦', 221, 'country'),
(584, 'マーシャル諸島', 210, 'country'),
(585, 'パラオ', 170, 'country'),
(586, 'パキスタン', 163, 'country'),
(591, 'パナマ', 165, 'country'),
(598, 'パプアニューギニア', 168, 'country'),
(600, 'パラグアイ', 171, 'country'),
(604, 'ペルー', 200, 'country'),
(608, 'フィリピン', 179, 'country'),
(612, 'ピトケアン諸島|ピトケアン', 177, 'country'),
(616, 'ポーランド', 202, 'country'),
(620, 'ポルトガル', 207, 'country'),
(624, 'ギニアビサウ', 58, 'country'),
(626, '東ティモール', 176, 'country'),
(630, 'プエルトリコ', 183, 'country'),
(634, 'カタール', 49, 'country'),
(638, 'レユニオン', 248, 'country'),
(642, 'ルーマニア', 243, 'country'),
(643, 'ロシア|ロシア連邦', 249, 'country'),
(646, 'ルワンダ', 245, 'country'),
(652, 'サン・バルテルミー島|サン・バルテルミー', 88, 'country'),
(654, 'セントヘレナ・アセンションおよびトリスタンダクーニャ', 118, 'country'),
(659, 'セントクリストファー・ネイビス', 116, 'country'),
(660, 'アンギラ', 14, 'country'),
(662, 'セントルシア', 119, 'country'),
(663, 'サン・マルタン (西インド諸島)|サン・マルタン（フランス領）', 92, 'country'),
(666, 'サンピエール島・ミクロン島', 90, 'country'),
(670, 'セントビンセント・グレナディーン|セントビンセントおよびグレナディーン諸島', 117, 'country'),
(674, 'サンマリノ', 91, 'country'),
(678, 'サントメ・プリンシペ', 87, 'country'),
(682, 'サウジアラビア', 84, 'country'),
(686, 'セネガル', 114, 'country'),
(688, 'セルビア', 115, 'country'),
(690, 'セーシェル', 112, 'country'),
(694, 'シエラレオネ', 93, 'country'),
(702, 'シンガポール', 99, 'country'),
(703, 'スロバキア', 109, 'country'),
(704, 'ベトナム', 195, 'country'),
(705, 'スロベニア', 110, 'country'),
(706, 'ソマリア', 120, 'country'),
(710, '南アフリカ共和国|南アフリカ', 222, 'country'),
(716, 'ジンバブエ', 101, 'country'),
(724, 'スペイン', 106, 'country'),
(728, '南スーダン', 223, 'country'),
(729, 'スーダン', 104, 'country'),
(732, '西サハラ', 154, 'country'),
(740, 'スリナム', 107, 'country'),
(744, 'スヴァールバル諸島およびヤンマイエン島', 105, 'country'),
(748, 'スワジランド', 111, 'country'),
(752, 'スウェーデン', 103, 'country'),
(756, 'スイス', 102, 'country'),
(760, 'シリア|シリア・アラブ共和国', 98, 'country'),
(762, 'タジキスタン', 126, 'country'),
(764, 'タイ王国|タイ', 123, 'country'),
(768, 'トーゴ', 138, 'country'),
(772, 'トケラウ', 139, 'country'),
(776, 'トンガ', 145, 'country'),
(780, 'トリニダード・トバゴ', 142, 'country'),
(784, 'アラブ首長国連邦', 8, 'country'),
(788, 'チュニジア', 132, 'country'),
(792, 'トルコ', 144, 'country'),
(795, 'トルクメニスタン', 143, 'country'),
(796, 'タークス・カイコス諸島', 122, 'country'),
(798, 'ツバル', 135, 'country'),
(800, 'ウガンダ', 29, 'country'),
(804, 'ウクライナ', 30, 'country'),
(807, 'マケドニア共和国|マケドニア旧ユーゴスラビア共和国', 212, 'country'),
(818, 'エジプト', 34, 'country'),
(826, 'イギリス', 19, 'country'),
(831, 'ガーンジー', 46, 'country'),
(832, 'ジャージー', 96, 'country'),
(833, 'マン島', 220, 'country'),
(834, 'タンザニア', 127, 'country'),
(840, 'アメリカ合衆国', 5, 'country'),
(850, 'アメリカ領ヴァージン諸島', 6, 'country'),
(854, 'ブルキナファソ', 192, 'country'),
(858, 'ウルグアイ', 32, 'country'),
(860, 'ウズベキスタン', 31, 'country'),
(862, 'ベネズエラ|ベネズエラ・ボリバル共和国', 197, 'country'),
(876, 'ウォリス・フツナ', 28, 'country'),
(882, 'サモア', 86, 'country'),
(887, 'イエメン', 18, 'country'),
(894, 'ザンビア', 89, 'country');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_csv_type`
--

CREATE TABLE `mtb_csv_type` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_csv_type`
--

INSERT INTO `mtb_csv_type` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(1, '商品CSV', 3, 'csvtype'),
(2, '会員CSV', 4, 'csvtype'),
(3, '受注CSV', 1, 'csvtype'),
(4, '配送CSV', 1, 'csvtype'),
(5, 'カテゴリCSV', 5, 'csvtype');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_customer_order_status`
--

CREATE TABLE `mtb_customer_order_status` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_customer_order_status`
--

INSERT INTO `mtb_customer_order_status` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(1, '注文受付', 0, 'customerorderstatus'),
(3, '注文取消し', 4, 'customerorderstatus'),
(4, '注文受付', 3, 'customerorderstatus'),
(5, '発送済み', 6, 'customerorderstatus'),
(6, '注文受付', 2, 'customerorderstatus'),
(7, '注文受付', 1, 'customerorderstatus'),
(8, '注文未完了', 5, 'customerorderstatus'),
(9, '返品', 7, 'customerorderstatus');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_customer_status`
--

CREATE TABLE `mtb_customer_status` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_customer_status`
--

INSERT INTO `mtb_customer_status` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(1, '仮会員', 0, 'customerstatus'),
(2, '本会員', 1, 'customerstatus'),
(3, '退会', 2, 'customerstatus');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_device_type`
--

CREATE TABLE `mtb_device_type` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_device_type`
--

INSERT INTO `mtb_device_type` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(2, 'モバイル', 0, 'devicetype'),
(10, 'PC', 1, 'devicetype');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_job`
--

CREATE TABLE `mtb_job` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_job`
--

INSERT INTO `mtb_job` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(1, '公務員', 0, 'job'),
(2, 'コンサルタント', 1, 'job'),
(3, 'コンピューター関連技術職', 2, 'job'),
(4, 'コンピューター関連以外の技術職', 3, 'job'),
(5, '金融関係', 4, 'job'),
(6, '医師', 5, 'job'),
(7, '弁護士', 6, 'job'),
(8, '総務・人事・事務', 7, 'job'),
(9, '営業・販売', 8, 'job'),
(10, '研究・開発', 9, 'job'),
(11, '広報・宣伝', 10, 'job'),
(12, '企画・マーケティング', 11, 'job'),
(13, 'デザイン関係', 12, 'job'),
(14, '会社経営・役員', 13, 'job'),
(15, '出版・マスコミ関係', 14, 'job'),
(16, '学生・フリーター', 15, 'job'),
(17, '主婦', 16, 'job'),
(18, 'その他', 17, 'job');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_login_history_status`
--

CREATE TABLE `mtb_login_history_status` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_login_history_status`
--

INSERT INTO `mtb_login_history_status` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(0, '失敗', 0, 'loginhistorystatus'),
(1, '成功', 1, 'loginhistorystatus');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_order_item_type`
--

CREATE TABLE `mtb_order_item_type` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_order_item_type`
--

INSERT INTO `mtb_order_item_type` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(1, '商品', 0, 'orderitemtype'),
(2, '送料', 1, 'orderitemtype'),
(3, '手数料', 2, 'orderitemtype'),
(4, '割引', 3, 'orderitemtype'),
(5, '税', 4, 'orderitemtype'),
(6, 'ポイント', 5, 'orderitemtype');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_order_status`
--

CREATE TABLE `mtb_order_status` (
  `id` smallint UNSIGNED NOT NULL,
  `display_order_count` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_order_status`
--

INSERT INTO `mtb_order_status` (`id`, `display_order_count`, `name`, `sort_no`, `discriminator_type`) VALUES
(1, 1, '新規受付', 0, 'orderstatus'),
(3, 0, '注文取消し', 3, 'orderstatus'),
(4, 1, '対応中', 2, 'orderstatus'),
(5, 0, '発送済み', 4, 'orderstatus'),
(6, 1, '入金済み', 1, 'orderstatus'),
(7, 0, '決済処理中', 6, 'orderstatus'),
(8, 0, '購入処理中', 5, 'orderstatus'),
(9, 0, '返品', 7, 'orderstatus');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_order_status_color`
--

CREATE TABLE `mtb_order_status_color` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_order_status_color`
--

INSERT INTO `mtb_order_status_color` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(1, '#437ec4', 0, 'orderstatuscolor'),
(3, '#C04949', 3, 'orderstatuscolor'),
(4, '#EEB128', 2, 'orderstatuscolor'),
(5, '#25B877', 4, 'orderstatuscolor'),
(6, '#25B877', 1, 'orderstatuscolor'),
(7, '#A3A3A3', 6, 'orderstatuscolor'),
(8, '#A3A3A3', 5, 'orderstatuscolor'),
(9, '#C04949', 7, 'orderstatuscolor');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_page_max`
--

CREATE TABLE `mtb_page_max` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_page_max`
--

INSERT INTO `mtb_page_max` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(10, '10', 0, 'pagemax'),
(20, '20', 1, 'pagemax'),
(30, '30', 2, 'pagemax'),
(40, '40', 3, 'pagemax'),
(50, '50', 4, 'pagemax'),
(60, '60', 5, 'pagemax'),
(70, '70', 6, 'pagemax'),
(80, '80', 7, 'pagemax'),
(90, '90', 8, 'pagemax'),
(100, '100', 9, 'pagemax');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_pref`
--

CREATE TABLE `mtb_pref` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_pref`
--

INSERT INTO `mtb_pref` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(1, '北海道', 1, 'pref'),
(2, '青森県', 2, 'pref'),
(3, '岩手県', 3, 'pref'),
(4, '宮城県', 4, 'pref'),
(5, '秋田県', 5, 'pref'),
(6, '山形県', 6, 'pref'),
(7, '福島県', 7, 'pref'),
(8, '茨城県', 8, 'pref'),
(9, '栃木県', 9, 'pref'),
(10, '群馬県', 10, 'pref'),
(11, '埼玉県', 11, 'pref'),
(12, '千葉県', 12, 'pref'),
(13, '東京都', 13, 'pref'),
(14, '神奈川県', 14, 'pref'),
(15, '新潟県', 15, 'pref'),
(16, '富山県', 16, 'pref'),
(17, '石川県', 17, 'pref'),
(18, '福井県', 18, 'pref'),
(19, '山梨県', 19, 'pref'),
(20, '長野県', 20, 'pref'),
(21, '岐阜県', 21, 'pref'),
(22, '静岡県', 22, 'pref'),
(23, '愛知県', 23, 'pref'),
(24, '三重県', 24, 'pref'),
(25, '滋賀県', 25, 'pref'),
(26, '京都府', 26, 'pref'),
(27, '大阪府', 27, 'pref'),
(28, '兵庫県', 28, 'pref'),
(29, '奈良県', 29, 'pref'),
(30, '和歌山県', 30, 'pref'),
(31, '鳥取県', 31, 'pref'),
(32, '島根県', 32, 'pref'),
(33, '岡山県', 33, 'pref'),
(34, '広島県', 34, 'pref'),
(35, '山口県', 35, 'pref'),
(36, '徳島県', 36, 'pref'),
(37, '香川県', 37, 'pref'),
(38, '愛媛県', 38, 'pref'),
(39, '高知県', 39, 'pref'),
(40, '福岡県', 40, 'pref'),
(41, '佐賀県', 41, 'pref'),
(42, '長崎県', 42, 'pref'),
(43, '熊本県', 43, 'pref'),
(44, '大分県', 44, 'pref'),
(45, '宮崎県', 45, 'pref'),
(46, '鹿児島県', 46, 'pref'),
(47, '沖縄県', 47, 'pref');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_product_list_max`
--

CREATE TABLE `mtb_product_list_max` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_product_list_max`
--

INSERT INTO `mtb_product_list_max` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(20, '20件', 0, 'productlistmax'),
(40, '40件', 1, 'productlistmax'),
(60, '60件', 2, 'productlistmax');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_product_list_order_by`
--

CREATE TABLE `mtb_product_list_order_by` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_product_list_order_by`
--

INSERT INTO `mtb_product_list_order_by` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(1, '価格が低い順', 0, 'productlistorderby'),
(2, '新着順', 2, 'productlistorderby'),
(3, '価格が高い順', 1, 'productlistorderby');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_product_status`
--

CREATE TABLE `mtb_product_status` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_product_status`
--

INSERT INTO `mtb_product_status` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(1, '公開', 0, 'productstatus'),
(2, '非公開', 1, 'productstatus'),
(3, '廃止', 2, 'productstatus');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_rounding_type`
--

CREATE TABLE `mtb_rounding_type` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_rounding_type`
--

INSERT INTO `mtb_rounding_type` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(1, '四捨五入', 0, 'roundingtype'),
(2, '切り捨て', 1, 'roundingtype'),
(3, '切り上げ', 2, 'roundingtype');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_sale_type`
--

CREATE TABLE `mtb_sale_type` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_sale_type`
--

INSERT INTO `mtb_sale_type` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(1, '販売種別A', 0, 'saletype'),
(2, '販売種別B', 1, 'saletype');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_sex`
--

CREATE TABLE `mtb_sex` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_sex`
--

INSERT INTO `mtb_sex` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(1, '男性', 0, 'sex'),
(2, '女性', 1, 'sex'),
(3, 'その他', 2, 'sex'),
(4, '回答しない', 3, 'sex');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_tax_display_type`
--

CREATE TABLE `mtb_tax_display_type` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_tax_display_type`
--

INSERT INTO `mtb_tax_display_type` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(1, '税抜', 0, 'taxdisplaytype'),
(2, '税込', 1, 'taxdisplaytype');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_tax_type`
--

CREATE TABLE `mtb_tax_type` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_tax_type`
--

INSERT INTO `mtb_tax_type` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(1, '課税', 0, 'taxtype'),
(2, '不課税', 1, 'taxtype'),
(3, '非課税', 2, 'taxtype');

-- --------------------------------------------------------

--
-- テーブルの構造 `mtb_work`
--

CREATE TABLE `mtb_work` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL,
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `mtb_work`
--

INSERT INTO `mtb_work` (`id`, `name`, `sort_no`, `discriminator_type`) VALUES
(0, '非稼働', 0, 'work'),
(1, '稼働', 1, 'work');

-- --------------------------------------------------------

--
-- テーブルの構造 `oauth2_access_token`
--

CREATE TABLE `oauth2_access_token` (
  `identifier` char(80) COLLATE utf8mb4_bin NOT NULL,
  `client` varchar(32) COLLATE utf8mb4_bin NOT NULL,
  `expiry` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `user_identifier` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_bin COMMENT '(DC2Type:oauth2_scope)',
  `revoked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `oauth2_authorization_code`
--

CREATE TABLE `oauth2_authorization_code` (
  `identifier` char(80) COLLATE utf8mb4_bin NOT NULL,
  `client` varchar(32) COLLATE utf8mb4_bin NOT NULL,
  `expiry` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `user_identifier` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_bin COMMENT '(DC2Type:oauth2_scope)',
  `revoked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `oauth2_client`
--

CREATE TABLE `oauth2_client` (
  `identifier` varchar(32) COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `secret` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `redirect_uris` text COLLATE utf8mb4_bin COMMENT '(DC2Type:oauth2_redirect_uri)',
  `grants` text COLLATE utf8mb4_bin COMMENT '(DC2Type:oauth2_grant)',
  `scopes` text COLLATE utf8mb4_bin COMMENT '(DC2Type:oauth2_scope)',
  `active` tinyint(1) NOT NULL,
  `allow_plain_text_pkce` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `oauth2_refresh_token`
--

CREATE TABLE `oauth2_refresh_token` (
  `identifier` char(80) COLLATE utf8mb4_bin NOT NULL,
  `access_token` char(80) COLLATE utf8mb4_bin DEFAULT NULL,
  `expiry` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `revoked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_api_webhook`
--

CREATE TABLE `plg_api_webhook` (
  `id` int UNSIGNED NOT NULL,
  `payload_url` varchar(1024) COLLATE utf8mb4_bin NOT NULL,
  `secret` varchar(1024) COLLATE utf8mb4_bin DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_category_product_block_config`
--

CREATE TABLE `plg_category_product_block_config` (
  `id` int UNSIGNED NOT NULL,
  `display_count` int NOT NULL DEFAULT '10',
  `columns_count` int NOT NULL DEFAULT '5',
  `rows_count` int NOT NULL DEFAULT '2',
  `show_category_tags` tinyint(1) NOT NULL DEFAULT '1',
  `show_product_list_button` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `plg_category_product_block_config`
--

INSERT INTO `plg_category_product_block_config` (`id`, `display_count`, `columns_count`, `rows_count`, `show_category_tags`, `show_product_list_button`) VALUES
(1, 10, 5, 2, 1, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_coupon`
--

CREATE TABLE `plg_coupon` (
  `coupon_id` int UNSIGNED NOT NULL,
  `coupon_cd` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `coupon_type` smallint DEFAULT NULL,
  `coupon_name` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `discount_type` smallint DEFAULT NULL,
  `coupon_use_time` int DEFAULT NULL,
  `discount_price` decimal(12,2) UNSIGNED DEFAULT '0.00',
  `discount_rate` decimal(10,0) UNSIGNED DEFAULT '0',
  `enable_flag` tinyint(1) NOT NULL DEFAULT '1',
  `available_from_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `available_to_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `coupon_member` tinyint(1) NOT NULL DEFAULT '0',
  `coupon_lower_limit` decimal(12,2) UNSIGNED DEFAULT '0.00',
  `coupon_release` int NOT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_coupon_detail`
--

CREATE TABLE `plg_coupon_detail` (
  `coupon_detail_id` int UNSIGNED NOT NULL,
  `coupon_id` int UNSIGNED DEFAULT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `category_id` int UNSIGNED DEFAULT NULL,
  `coupon_type` smallint DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_coupon_order`
--

CREATE TABLE `plg_coupon_order` (
  `coupon_order_id` int UNSIGNED NOT NULL,
  `coupon_id` int UNSIGNED NOT NULL,
  `coupon_cd` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `coupon_name` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `order_id` int UNSIGNED NOT NULL,
  `pre_order_id` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `order_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetimetz)',
  `order_item_id` int UNSIGNED DEFAULT NULL,
  `discount` decimal(12,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `order_change_status` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_left_text_block`
--

CREATE TABLE `plg_left_text_block` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `content` longtext COLLATE utf8mb4_bin,
  `font_size` int DEFAULT NULL,
  `font_family` varchar(500) COLLATE utf8mb4_bin DEFAULT NULL,
  `sort_no` int NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetime)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetime)',
  `deleted_at` datetime DEFAULT NULL,
  `show_content` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `plg_left_text_block`
--

INSERT INTO `plg_left_text_block` (`id`, `title`, `content`, `font_size`, `font_family`, `sort_no`, `visible`, `create_date`, `update_date`, `deleted_at`, `show_content`) VALUES
(18, 'メーカーラインナップ', '人気メーカーを取り添えています。', 20, 'inherit', 1, 1, '2025-06-18 07:17:55', '2025-06-18 07:38:01', '2025-06-18 07:38:01', 0),
(19, '人気メーカー・シリーズ', '人気メーカーを取り揃えています。', 25, NULL, 1, 1, '2025-06-18 07:39:23', '2025-06-18 07:44:27', NULL, 0),
(20, 'ジャンル別売れ筋商品', '豊富な商品があります。', 25, NULL, 2, 1, '2025-06-18 07:40:18', '2025-06-18 07:45:40', NULL, 0),
(21, '続々入荷中！新着商品', '人気商品を追加しています。', 20, NULL, 3, 1, '2025-06-18 07:48:56', '2025-06-18 07:50:16', NULL, 0),
(22, '最新ニュース', NULL, 20, NULL, 4, 1, '2025-07-01 08:45:36', '2025-07-01 08:45:36', NULL, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_mailmaga_send_history`
--

CREATE TABLE `plg_mailmaga_send_history` (
  `send_id` int UNSIGNED NOT NULL,
  `creator_id` int UNSIGNED DEFAULT NULL,
  `mail_method` smallint DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_bin,
  `html_body` longtext COLLATE utf8mb4_bin,
  `send_count` int UNSIGNED DEFAULT NULL,
  `complete_count` int UNSIGNED DEFAULT '0',
  `error_count` int UNSIGNED DEFAULT '0',
  `start_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetimetz)',
  `end_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetimetz)',
  `search_data` longtext COLLATE utf8mb4_bin,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_mailmaga_template`
--

CREATE TABLE `plg_mailmaga_template` (
  `template_id` int UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `body` longtext COLLATE utf8mb4_bin NOT NULL,
  `html_body` longtext COLLATE utf8mb4_bin,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_maker`
--

CREATE TABLE `plg_maker` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` int NOT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `plg_maker`
--

INSERT INTO `plg_maker` (`id`, `name`, `sort_no`, `create_date`, `update_date`) VALUES
(1, 'PANASONIC', 1, '2025-06-06 06:51:30', '2025-06-06 06:51:30'),
(2, 'TOSHIBA', 2, '2025-06-06 07:22:04', '2025-06-06 07:22:04'),
(3, 'SONY', 3, '2025-06-06 07:54:29', '2025-06-06 07:54:29'),
(4, 'SHARP', 4, '2025-06-09 06:09:08', '2025-06-09 06:09:08');

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_maker_product_block`
--

CREATE TABLE `plg_maker_product_block` (
  `id` int UNSIGNED NOT NULL,
  `maker_id` int UNSIGNED NOT NULL,
  `block_id` int UNSIGNED NOT NULL,
  `block_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `product_count` int NOT NULL DEFAULT '5',
  `visible_count` int NOT NULL DEFAULT '4',
  `visible_count_sp` int NOT NULL DEFAULT '1',
  `sort_type` varchar(20) COLLATE utf8mb4_bin NOT NULL DEFAULT 'new',
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `sort_no` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `plg_maker_product_block`
--

INSERT INTO `plg_maker_product_block` (`id`, `maker_id`, `block_id`, `block_name`, `product_count`, `visible_count`, `visible_count_sp`, `sort_type`, `is_enabled`, `create_date`, `update_date`, `sort_no`) VALUES
(1, 7, 20, 'SONY特集', 5, 4, 2, 'new', 1, '2025-05-30 07:44:25', '2025-06-06 07:59:39', 4),
(2, 7, 21, 'PANASONIC特集', 5, 4, 2, 'new', 1, '2025-06-06 06:52:45', '2025-06-06 07:18:16', 2),
(3, 2, 22, 'TOSHIBA特集', 5, 4, 2, 'new', 1, '2025-06-06 07:22:33', '2025-06-09 18:31:10', 3),
(4, 3, 23, 'SONY特集', 5, 4, 2, 'new', 1, '2025-06-06 07:57:09', '2025-06-09 05:44:05', 1),
(5, 4, 24, 'SHARP特集', 5, 4, 1, 'new', 1, '2025-06-09 06:24:13', '2025-06-09 06:24:13', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_product_review`
--

CREATE TABLE `plg_product_review` (
  `id` int UNSIGNED NOT NULL,
  `sex_id` smallint UNSIGNED DEFAULT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `customer_id` int UNSIGNED DEFAULT NULL,
  `status_id` smallint UNSIGNED DEFAULT NULL,
  `reviewer_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `reviewer_url` longtext COLLATE utf8mb4_bin,
  `title` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `comment` longtext COLLATE utf8mb4_bin NOT NULL,
  `recommend_level` smallint NOT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_product_review_config`
--

CREATE TABLE `plg_product_review_config` (
  `id` int UNSIGNED NOT NULL,
  `csv_type_id` smallint UNSIGNED DEFAULT NULL,
  `review_max` smallint UNSIGNED DEFAULT '5',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_product_review_status`
--

CREATE TABLE `plg_product_review_status` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `sort_no` smallint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_recommend_product`
--

CREATE TABLE `plg_recommend_product` (
  `recommend_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_bin,
  `sort_no` int DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `plg_recommend_product`
--

INSERT INTO `plg_recommend_product` (`recommend_id`, `product_id`, `comment`, `sort_no`, `visible`, `create_date`, `update_date`, `discriminator_type`) VALUES
(1, 3, '大人気', 1, 0, '2025-06-09 17:27:25', '2025-06-09 17:44:29', 'recommendproduct'),
(2, 5, '高性能', 2, 0, '2025-06-09 17:29:19', '2025-06-09 17:44:24', 'recommendproduct');

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_related_product`
--

CREATE TABLE `plg_related_product` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `child_product_id` int UNSIGNED DEFAULT NULL,
  `content` varchar(4000) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_rental_config`
--

CREATE TABLE `plg_rental_config` (
  `id` int UNSIGNED NOT NULL,
  `rental_terms` longtext COLLATE utf8mb4_bin,
  `auto_approval` tinyint(1) NOT NULL DEFAULT '1',
  `default_max_days` int DEFAULT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetime)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetime)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `plg_rental_config`
--

INSERT INTO `plg_rental_config` (`id`, `rental_terms`, `auto_approval`, `default_max_days`, `create_date`, `update_date`) VALUES
(1, 'レンタル利用規約のデフォルトテキスト', 1, 90, '2025-05-16 08:20:31', '2025-05-16 08:20:31');

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_rental_order`
--

CREATE TABLE `plg_rental_order` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `order_id` int UNSIGNED DEFAULT NULL,
  `product_class_id` int UNSIGNED DEFAULT NULL,
  `customer_id` int UNSIGNED DEFAULT NULL,
  `rental_start_date` datetime NOT NULL COMMENT '(DC2Type:datetime)',
  `rental_end_date` datetime NOT NULL COMMENT '(DC2Type:datetime)',
  `return_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetime)',
  `rental_status_id` smallint UNSIGNED NOT NULL,
  `rental_period` int UNSIGNED NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `price` decimal(12,2) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `options_json` longtext COLLATE utf8mb4_bin,
  `name01` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `name02` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `kana01` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `kana02` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `postal_code` varchar(8) COLLATE utf8mb4_bin DEFAULT NULL,
  `pref` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `addr01` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `addr02` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `phone_number` varchar(14) COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetime)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetime)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_rental_product`
--

CREATE TABLE `plg_rental_product` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `rental_flg` tinyint(1) NOT NULL DEFAULT '0',
  `rental_price_daily` decimal(12,2) DEFAULT NULL,
  `rental_price_weekly` decimal(12,2) DEFAULT NULL,
  `rental_price_monthly` decimal(12,2) DEFAULT NULL,
  `rental_max_days` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `plg_rental_product`
--

INSERT INTO `plg_rental_product` (`id`, `product_id`, `rental_flg`, `rental_price_daily`, `rental_price_weekly`, `rental_price_monthly`, `rental_max_days`) VALUES
(3, 3, 0, NULL, NULL, NULL, NULL),
(4, 4, 0, NULL, NULL, NULL, NULL),
(5, 5, 0, NULL, NULL, NULL, NULL),
(6, 6, 0, NULL, NULL, NULL, NULL),
(7, 7, 0, NULL, NULL, NULL, NULL),
(8, 8, 0, NULL, NULL, NULL, NULL),
(9, 9, 0, NULL, NULL, NULL, NULL),
(10, 10, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_Securitychecker4_config`
--

CREATE TABLE `plg_Securitychecker4_config` (
  `id` smallint UNSIGNED NOT NULL,
  `check_result` longtext COLLATE utf8mb4_bin,
  `create_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `update_date` datetime NOT NULL COMMENT '(DC2Type:datetimetz)',
  `discriminator_type` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `plg_site_kit_id_token`
--

CREATE TABLE `plg_site_kit_id_token` (
  `id` int UNSIGNED NOT NULL,
  `member_id` int UNSIGNED DEFAULT NULL,
  `id_token` longtext COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `dtb_authority_role`
--
ALTER TABLE `dtb_authority_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4A1F70B181EC865B` (`authority_id`),
  ADD KEY `IDX_4A1F70B161220EA6` (`creator_id`);

--
-- テーブルのインデックス `dtb_base_info`
--
ALTER TABLE `dtb_base_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1D3655F4F92F3E70` (`country_id`),
  ADD KEY `IDX_1D3655F4E171EF5F` (`pref_id`);

--
-- テーブルのインデックス `dtb_block`
--
ALTER TABLE `dtb_block`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `device_type_id` (`device_type_id`,`file_name`),
  ADD KEY `IDX_6B54DCBD4FFA550E` (`device_type_id`);

--
-- テーブルのインデックス `dtb_block_position`
--
ALTER TABLE `dtb_block_position`
  ADD PRIMARY KEY (`section`,`block_id`,`layout_id`),
  ADD KEY `IDX_35DCD731E9ED820C` (`block_id`),
  ADD KEY `IDX_35DCD7318C22AA1A` (`layout_id`);

--
-- テーブルのインデックス `dtb_calendar`
--
ALTER TABLE `dtb_calendar`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `dtb_carousel_config`
--
ALTER TABLE `dtb_carousel_config`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `dtb_carousel_feature`
--
ALTER TABLE `dtb_carousel_feature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D3AB8F4584665A` (`product_id`);

--
-- テーブルのインデックス `dtb_carousel_image`
--
ALTER TABLE `dtb_carousel_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_232412B2E8115CD2` (`carousel_feature_id`);

--
-- テーブルのインデックス `dtb_cart`
--
ALTER TABLE `dtb_cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dtb_cart_pre_order_id_idx` (`pre_order_id`),
  ADD KEY `IDX_FC3C24F09395C3F3` (`customer_id`),
  ADD KEY `dtb_cart_update_date_idx` (`update_date`);

--
-- テーブルのインデックス `dtb_cart_item`
--
ALTER TABLE `dtb_cart_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B0228F7421B06187` (`product_class_id`),
  ADD KEY `IDX_B0228F741AD5CDBF` (`cart_id`);

--
-- テーブルのインデックス `dtb_category`
--
ALTER TABLE `dtb_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5ED2C2B796A8F92` (`parent_category_id`),
  ADD KEY `IDX_5ED2C2B61220EA6` (`creator_id`);

--
-- テーブルのインデックス `dtb_class_category`
--
ALTER TABLE `dtb_class_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9B0D1DBAB462FB2A` (`class_name_id`),
  ADD KEY `IDX_9B0D1DBA61220EA6` (`creator_id`);

--
-- テーブルのインデックス `dtb_class_name`
--
ALTER TABLE `dtb_class_name`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_187C95AD61220EA6` (`creator_id`);

--
-- テーブルのインデックス `dtb_csv`
--
ALTER TABLE `dtb_csv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F55F48C3E8507796` (`csv_type_id`),
  ADD KEY `IDX_F55F48C361220EA6` (`creator_id`);

--
-- テーブルのインデックス `dtb_customer`
--
ALTER TABLE `dtb_customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `secret_key` (`secret_key`),
  ADD KEY `IDX_8298BBE3C00AF8A7` (`customer_status_id`),
  ADD KEY `IDX_8298BBE35A2DB2A0` (`sex_id`),
  ADD KEY `IDX_8298BBE3BE04EA9` (`job_id`),
  ADD KEY `IDX_8298BBE3F92F3E70` (`country_id`),
  ADD KEY `IDX_8298BBE3E171EF5F` (`pref_id`),
  ADD KEY `dtb_customer_buy_times_idx` (`buy_times`),
  ADD KEY `dtb_customer_buy_total_idx` (`buy_total`),
  ADD KEY `dtb_customer_create_date_idx` (`create_date`),
  ADD KEY `dtb_customer_update_date_idx` (`update_date`),
  ADD KEY `dtb_customer_last_buy_date_idx` (`last_buy_date`),
  ADD KEY `dtb_customer_email_idx` (`email`);

--
-- テーブルのインデックス `dtb_customer_address`
--
ALTER TABLE `dtb_customer_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6C38C0F89395C3F3` (`customer_id`),
  ADD KEY `IDX_6C38C0F8F92F3E70` (`country_id`),
  ADD KEY `IDX_6C38C0F8E171EF5F` (`pref_id`);

--
-- テーブルのインデックス `dtb_customer_favorite_product`
--
ALTER TABLE `dtb_customer_favorite_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_ED6313839395C3F3` (`customer_id`),
  ADD KEY `IDX_ED6313834584665A` (`product_id`);

--
-- テーブルのインデックス `dtb_delivery`
--
ALTER TABLE `dtb_delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3420D9FA61220EA6` (`creator_id`),
  ADD KEY `IDX_3420D9FAB0524E01` (`sale_type_id`);

--
-- テーブルのインデックス `dtb_delivery_duration`
--
ALTER TABLE `dtb_delivery_duration`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `dtb_delivery_fee`
--
ALTER TABLE `dtb_delivery_fee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_491552412136921` (`delivery_id`),
  ADD KEY `IDX_4915524E171EF5F` (`pref_id`);

--
-- テーブルのインデックス `dtb_delivery_time`
--
ALTER TABLE `dtb_delivery_time`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E80EE3A612136921` (`delivery_id`);

--
-- テーブルのインデックス `dtb_layout`
--
ALTER TABLE `dtb_layout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5A62AA7C4FFA550E` (`device_type_id`);

--
-- テーブルのインデックス `dtb_login_history`
--
ALTER TABLE `dtb_login_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6191DD4F9FA62FDD` (`login_history_status_id`),
  ADD KEY `IDX_6191DD4F7597D3FE` (`member_id`);

--
-- テーブルのインデックス `dtb_mail_history`
--
ALTER TABLE `dtb_mail_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4870AB118D9F6D38` (`order_id`),
  ADD KEY `IDX_4870AB1161220EA6` (`creator_id`);

--
-- テーブルのインデックス `dtb_mail_template`
--
ALTER TABLE `dtb_mail_template`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1CB16DB261220EA6` (`creator_id`);

--
-- テーブルのインデックス `dtb_member`
--
ALTER TABLE `dtb_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_10BC3BE6BB3453DB` (`work_id`),
  ADD KEY `IDX_10BC3BE681EC865B` (`authority_id`),
  ADD KEY `IDX_10BC3BE661220EA6` (`creator_id`);

--
-- テーブルのインデックス `dtb_news`
--
ALTER TABLE `dtb_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EA4C351761220EA6` (`creator_id`);

--
-- テーブルのインデックス `dtb_order`
--
ALTER TABLE `dtb_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dtb_order_pre_order_id_idx` (`pre_order_id`),
  ADD KEY `IDX_1D66D8079395C3F3` (`customer_id`),
  ADD KEY `IDX_1D66D807F92F3E70` (`country_id`),
  ADD KEY `IDX_1D66D807E171EF5F` (`pref_id`),
  ADD KEY `IDX_1D66D8075A2DB2A0` (`sex_id`),
  ADD KEY `IDX_1D66D807BE04EA9` (`job_id`),
  ADD KEY `IDX_1D66D8074C3A3BB` (`payment_id`),
  ADD KEY `IDX_1D66D8074FFA550E` (`device_type_id`),
  ADD KEY `IDX_1D66D807D7707B45` (`order_status_id`),
  ADD KEY `dtb_order_email_idx` (`email`),
  ADD KEY `dtb_order_order_date_idx` (`order_date`),
  ADD KEY `dtb_order_payment_date_idx` (`payment_date`),
  ADD KEY `dtb_order_update_date_idx` (`update_date`),
  ADD KEY `dtb_order_order_no_idx` (`order_no`);

--
-- テーブルのインデックス `dtb_order_item`
--
ALTER TABLE `dtb_order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A0C8C3ED8D9F6D38` (`order_id`),
  ADD KEY `IDX_A0C8C3ED4584665A` (`product_id`),
  ADD KEY `IDX_A0C8C3ED21B06187` (`product_class_id`),
  ADD KEY `IDX_A0C8C3ED4887F3F8` (`shipping_id`),
  ADD KEY `IDX_A0C8C3ED1BD5C574` (`rounding_type_id`),
  ADD KEY `IDX_A0C8C3ED84042C99` (`tax_type_id`),
  ADD KEY `IDX_A0C8C3EDA2505856` (`tax_display_type_id`),
  ADD KEY `IDX_A0C8C3EDCAD13EAD` (`order_item_type_id`);

--
-- テーブルのインデックス `dtb_order_pdf`
--
ALTER TABLE `dtb_order_pdf`
  ADD PRIMARY KEY (`member_id`);

--
-- テーブルのインデックス `dtb_page`
--
ALTER TABLE `dtb_page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E3951A67D0618E8C` (`master_page_id`),
  ADD KEY `dtb_page_url_idx` (`url`);

--
-- テーブルのインデックス `dtb_page_layout`
--
ALTER TABLE `dtb_page_layout`
  ADD PRIMARY KEY (`page_id`,`layout_id`),
  ADD KEY `IDX_F2799941C4663E4` (`page_id`),
  ADD KEY `IDX_F27999418C22AA1A` (`layout_id`);

--
-- テーブルのインデックス `dtb_payment`
--
ALTER TABLE `dtb_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7AFF628F61220EA6` (`creator_id`);

--
-- テーブルのインデックス `dtb_payment_option`
--
ALTER TABLE `dtb_payment_option`
  ADD PRIMARY KEY (`delivery_id`,`payment_id`),
  ADD KEY `IDX_5631540D12136921` (`delivery_id`),
  ADD KEY `IDX_5631540D4C3A3BB` (`payment_id`);

--
-- テーブルのインデックス `dtb_plugin`
--
ALTER TABLE `dtb_plugin`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `dtb_product`
--
ALTER TABLE `dtb_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C49DE22F61220EA6` (`creator_id`),
  ADD KEY `IDX_C49DE22F557B630` (`product_status_id`),
  ADD KEY `IDX_C49DE22F68DA5EC3` (`maker_id`);

--
-- テーブルのインデックス `dtb_product_category`
--
ALTER TABLE `dtb_product_category`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `IDX_B05778914584665A` (`product_id`),
  ADD KEY `IDX_B057789112469DE2` (`category_id`);

--
-- テーブルのインデックス `dtb_product_class`
--
ALTER TABLE `dtb_product_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1A11D1BA4584665A` (`product_id`),
  ADD KEY `IDX_1A11D1BAB0524E01` (`sale_type_id`),
  ADD KEY `IDX_1A11D1BA248D128` (`class_category_id1`),
  ADD KEY `IDX_1A11D1BA9B418092` (`class_category_id2`),
  ADD KEY `IDX_1A11D1BABA4269E` (`delivery_duration_id`),
  ADD KEY `IDX_1A11D1BA61220EA6` (`creator_id`),
  ADD KEY `dtb_product_class_price02_idx` (`price02`),
  ADD KEY `dtb_product_class_stock_stock_unlimited_idx` (`stock`,`stock_unlimited`);

--
-- テーブルのインデックス `dtb_product_image`
--
ALTER TABLE `dtb_product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3267CC7A4584665A` (`product_id`),
  ADD KEY `IDX_3267CC7A61220EA6` (`creator_id`);

--
-- テーブルのインデックス `dtb_product_stock`
--
ALTER TABLE `dtb_product_stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BC6C9E4521B06187` (`product_class_id`),
  ADD KEY `IDX_BC6C9E4561220EA6` (`creator_id`);

--
-- テーブルのインデックス `dtb_product_tag`
--
ALTER TABLE `dtb_product_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4433E7214584665A` (`product_id`),
  ADD KEY `IDX_4433E721BAD26311` (`tag_id`),
  ADD KEY `IDX_4433E72161220EA6` (`creator_id`);

--
-- テーブルのインデックス `dtb_shipping`
--
ALTER TABLE `dtb_shipping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2EBD22CE8D9F6D38` (`order_id`),
  ADD KEY `IDX_2EBD22CEF92F3E70` (`country_id`),
  ADD KEY `IDX_2EBD22CEE171EF5F` (`pref_id`),
  ADD KEY `IDX_2EBD22CE12136921` (`delivery_id`),
  ADD KEY `IDX_2EBD22CE61220EA6` (`creator_id`);

--
-- テーブルのインデックス `dtb_tag`
--
ALTER TABLE `dtb_tag`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `dtb_tax_rule`
--
ALTER TABLE `dtb_tax_rule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_59F696DE21B06187` (`product_class_id`),
  ADD KEY `IDX_59F696DE61220EA6` (`creator_id`),
  ADD KEY `IDX_59F696DEF92F3E70` (`country_id`),
  ADD KEY `IDX_59F696DEE171EF5F` (`pref_id`),
  ADD KEY `IDX_59F696DE4584665A` (`product_id`),
  ADD KEY `IDX_59F696DE1BD5C574` (`rounding_type_id`);

--
-- テーブルのインデックス `dtb_template`
--
ALTER TABLE `dtb_template`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_94C12A694FFA550E` (`device_type_id`);

--
-- テーブルのインデックス `dtb_tradelaw`
--
ALTER TABLE `dtb_tradelaw`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_authority`
--
ALTER TABLE `mtb_authority`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_country`
--
ALTER TABLE `mtb_country`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_csv_type`
--
ALTER TABLE `mtb_csv_type`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_customer_order_status`
--
ALTER TABLE `mtb_customer_order_status`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_customer_status`
--
ALTER TABLE `mtb_customer_status`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_device_type`
--
ALTER TABLE `mtb_device_type`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_job`
--
ALTER TABLE `mtb_job`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_login_history_status`
--
ALTER TABLE `mtb_login_history_status`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_order_item_type`
--
ALTER TABLE `mtb_order_item_type`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_order_status`
--
ALTER TABLE `mtb_order_status`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_order_status_color`
--
ALTER TABLE `mtb_order_status_color`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_page_max`
--
ALTER TABLE `mtb_page_max`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_pref`
--
ALTER TABLE `mtb_pref`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_product_list_max`
--
ALTER TABLE `mtb_product_list_max`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_product_list_order_by`
--
ALTER TABLE `mtb_product_list_order_by`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_product_status`
--
ALTER TABLE `mtb_product_status`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_rounding_type`
--
ALTER TABLE `mtb_rounding_type`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_sale_type`
--
ALTER TABLE `mtb_sale_type`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_sex`
--
ALTER TABLE `mtb_sex`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_tax_display_type`
--
ALTER TABLE `mtb_tax_display_type`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_tax_type`
--
ALTER TABLE `mtb_tax_type`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mtb_work`
--
ALTER TABLE `mtb_work`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `oauth2_access_token`
--
ALTER TABLE `oauth2_access_token`
  ADD PRIMARY KEY (`identifier`),
  ADD KEY `IDX_454D9673C7440455` (`client`);

--
-- テーブルのインデックス `oauth2_authorization_code`
--
ALTER TABLE `oauth2_authorization_code`
  ADD PRIMARY KEY (`identifier`),
  ADD KEY `IDX_509FEF5FC7440455` (`client`);

--
-- テーブルのインデックス `oauth2_client`
--
ALTER TABLE `oauth2_client`
  ADD PRIMARY KEY (`identifier`);

--
-- テーブルのインデックス `oauth2_refresh_token`
--
ALTER TABLE `oauth2_refresh_token`
  ADD PRIMARY KEY (`identifier`),
  ADD KEY `IDX_4DD90732B6A2DD68` (`access_token`);

--
-- テーブルのインデックス `plg_api_webhook`
--
ALTER TABLE `plg_api_webhook`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `plg_category_product_block_config`
--
ALTER TABLE `plg_category_product_block_config`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `plg_coupon`
--
ALTER TABLE `plg_coupon`
  ADD PRIMARY KEY (`coupon_id`),
  ADD UNIQUE KEY `UNIQ_755A31039C2A7D91` (`coupon_cd`);

--
-- テーブルのインデックス `plg_coupon_detail`
--
ALTER TABLE `plg_coupon_detail`
  ADD PRIMARY KEY (`coupon_detail_id`),
  ADD KEY `IDX_7B9D14166C5951B` (`coupon_id`),
  ADD KEY `IDX_7B9D1414584665A` (`product_id`),
  ADD KEY `IDX_7B9D14112469DE2` (`category_id`);

--
-- テーブルのインデックス `plg_coupon_order`
--
ALTER TABLE `plg_coupon_order`
  ADD PRIMARY KEY (`coupon_order_id`);

--
-- テーブルのインデックス `plg_left_text_block`
--
ALTER TABLE `plg_left_text_block`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `plg_mailmaga_send_history`
--
ALTER TABLE `plg_mailmaga_send_history`
  ADD PRIMARY KEY (`send_id`),
  ADD KEY `IDX_424AD01261220EA6` (`creator_id`);

--
-- テーブルのインデックス `plg_mailmaga_template`
--
ALTER TABLE `plg_mailmaga_template`
  ADD PRIMARY KEY (`template_id`);

--
-- テーブルのインデックス `plg_maker`
--
ALTER TABLE `plg_maker`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `plg_maker_product_block`
--
ALTER TABLE `plg_maker_product_block`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `plg_product_review`
--
ALTER TABLE `plg_product_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9CA38FA25A2DB2A0` (`sex_id`),
  ADD KEY `IDX_9CA38FA24584665A` (`product_id`),
  ADD KEY `IDX_9CA38FA29395C3F3` (`customer_id`),
  ADD KEY `IDX_9CA38FA26BF700BD` (`status_id`);

--
-- テーブルのインデックス `plg_product_review_config`
--
ALTER TABLE `plg_product_review_config`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D27A17EFE8507796` (`csv_type_id`);

--
-- テーブルのインデックス `plg_product_review_status`
--
ALTER TABLE `plg_product_review_status`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `plg_recommend_product`
--
ALTER TABLE `plg_recommend_product`
  ADD PRIMARY KEY (`recommend_id`),
  ADD KEY `IDX_7EA2C2D14584665A` (`product_id`);

--
-- テーブルのインデックス `plg_related_product`
--
ALTER TABLE `plg_related_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_77B090F74584665A` (`product_id`),
  ADD KEY `IDX_77B090F7A15B9831` (`child_product_id`);

--
-- テーブルのインデックス `plg_rental_config`
--
ALTER TABLE `plg_rental_config`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `plg_rental_order`
--
ALTER TABLE `plg_rental_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E6EB08FE4584665A` (`product_id`),
  ADD KEY `IDX_E6EB08FE8D9F6D38` (`order_id`),
  ADD KEY `IDX_E6EB08FE21B06187` (`product_class_id`),
  ADD KEY `IDX_E6EB08FE9395C3F3` (`customer_id`);

--
-- テーブルのインデックス `plg_rental_product`
--
ALTER TABLE `plg_rental_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_873091824584665A` (`product_id`);

--
-- テーブルのインデックス `plg_Securitychecker4_config`
--
ALTER TABLE `plg_Securitychecker4_config`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `plg_site_kit_id_token`
--
ALTER TABLE `plg_site_kit_id_token`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_5B28B5227597D3FE` (`member_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `dtb_authority_role`
--
ALTER TABLE `dtb_authority_role`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `dtb_base_info`
--
ALTER TABLE `dtb_base_info`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `dtb_block`
--
ALTER TABLE `dtb_block`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;

--
-- テーブルの AUTO_INCREMENT `dtb_calendar`
--
ALTER TABLE `dtb_calendar`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `dtb_carousel_config`
--
ALTER TABLE `dtb_carousel_config`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `dtb_carousel_feature`
--
ALTER TABLE `dtb_carousel_feature`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `dtb_carousel_image`
--
ALTER TABLE `dtb_carousel_image`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `dtb_cart`
--
ALTER TABLE `dtb_cart`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `dtb_cart_item`
--
ALTER TABLE `dtb_cart_item`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルの AUTO_INCREMENT `dtb_category`
--
ALTER TABLE `dtb_category`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- テーブルの AUTO_INCREMENT `dtb_class_category`
--
ALTER TABLE `dtb_class_category`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `dtb_class_name`
--
ALTER TABLE `dtb_class_name`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `dtb_csv`
--
ALTER TABLE `dtb_csv`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- テーブルの AUTO_INCREMENT `dtb_customer`
--
ALTER TABLE `dtb_customer`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `dtb_customer_address`
--
ALTER TABLE `dtb_customer_address`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `dtb_customer_favorite_product`
--
ALTER TABLE `dtb_customer_favorite_product`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `dtb_delivery`
--
ALTER TABLE `dtb_delivery`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `dtb_delivery_duration`
--
ALTER TABLE `dtb_delivery_duration`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルの AUTO_INCREMENT `dtb_delivery_fee`
--
ALTER TABLE `dtb_delivery_fee`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- テーブルの AUTO_INCREMENT `dtb_delivery_time`
--
ALTER TABLE `dtb_delivery_time`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `dtb_layout`
--
ALTER TABLE `dtb_layout`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `dtb_login_history`
--
ALTER TABLE `dtb_login_history`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- テーブルの AUTO_INCREMENT `dtb_mail_history`
--
ALTER TABLE `dtb_mail_history`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `dtb_mail_template`
--
ALTER TABLE `dtb_mail_template`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `dtb_member`
--
ALTER TABLE `dtb_member`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `dtb_news`
--
ALTER TABLE `dtb_news`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `dtb_order`
--
ALTER TABLE `dtb_order`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `dtb_order_item`
--
ALTER TABLE `dtb_order_item`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `dtb_page`
--
ALTER TABLE `dtb_page`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- テーブルの AUTO_INCREMENT `dtb_payment`
--
ALTER TABLE `dtb_payment`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `dtb_plugin`
--
ALTER TABLE `dtb_plugin`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- テーブルの AUTO_INCREMENT `dtb_product`
--
ALTER TABLE `dtb_product`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルの AUTO_INCREMENT `dtb_product_class`
--
ALTER TABLE `dtb_product_class`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- テーブルの AUTO_INCREMENT `dtb_product_image`
--
ALTER TABLE `dtb_product_image`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- テーブルの AUTO_INCREMENT `dtb_product_stock`
--
ALTER TABLE `dtb_product_stock`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- テーブルの AUTO_INCREMENT `dtb_product_tag`
--
ALTER TABLE `dtb_product_tag`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `dtb_shipping`
--
ALTER TABLE `dtb_shipping`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `dtb_tag`
--
ALTER TABLE `dtb_tag`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `dtb_tax_rule`
--
ALTER TABLE `dtb_tax_rule`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `dtb_template`
--
ALTER TABLE `dtb_template`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `dtb_tradelaw`
--
ALTER TABLE `dtb_tradelaw`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- テーブルの AUTO_INCREMENT `plg_api_webhook`
--
ALTER TABLE `plg_api_webhook`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `plg_category_product_block_config`
--
ALTER TABLE `plg_category_product_block_config`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `plg_coupon`
--
ALTER TABLE `plg_coupon`
  MODIFY `coupon_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `plg_coupon_detail`
--
ALTER TABLE `plg_coupon_detail`
  MODIFY `coupon_detail_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `plg_coupon_order`
--
ALTER TABLE `plg_coupon_order`
  MODIFY `coupon_order_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `plg_left_text_block`
--
ALTER TABLE `plg_left_text_block`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- テーブルの AUTO_INCREMENT `plg_mailmaga_send_history`
--
ALTER TABLE `plg_mailmaga_send_history`
  MODIFY `send_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `plg_mailmaga_template`
--
ALTER TABLE `plg_mailmaga_template`
  MODIFY `template_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `plg_maker`
--
ALTER TABLE `plg_maker`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `plg_maker_product_block`
--
ALTER TABLE `plg_maker_product_block`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- テーブルの AUTO_INCREMENT `plg_product_review`
--
ALTER TABLE `plg_product_review`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `plg_product_review_config`
--
ALTER TABLE `plg_product_review_config`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `plg_recommend_product`
--
ALTER TABLE `plg_recommend_product`
  MODIFY `recommend_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `plg_related_product`
--
ALTER TABLE `plg_related_product`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `plg_rental_config`
--
ALTER TABLE `plg_rental_config`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `plg_rental_order`
--
ALTER TABLE `plg_rental_order`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `plg_site_kit_id_token`
--
ALTER TABLE `plg_site_kit_id_token`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `dtb_authority_role`
--
ALTER TABLE `dtb_authority_role`
  ADD CONSTRAINT `FK_4A1F70B161220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`),
  ADD CONSTRAINT `FK_4A1F70B181EC865B` FOREIGN KEY (`authority_id`) REFERENCES `mtb_authority` (`id`);

--
-- テーブルの制約 `dtb_base_info`
--
ALTER TABLE `dtb_base_info`
  ADD CONSTRAINT `FK_1D3655F4E171EF5F` FOREIGN KEY (`pref_id`) REFERENCES `mtb_pref` (`id`),
  ADD CONSTRAINT `FK_1D3655F4F92F3E70` FOREIGN KEY (`country_id`) REFERENCES `mtb_country` (`id`);

--
-- テーブルの制約 `dtb_block`
--
ALTER TABLE `dtb_block`
  ADD CONSTRAINT `FK_6B54DCBD4FFA550E` FOREIGN KEY (`device_type_id`) REFERENCES `mtb_device_type` (`id`);

--
-- テーブルの制約 `dtb_block_position`
--
ALTER TABLE `dtb_block_position`
  ADD CONSTRAINT `FK_35DCD7318C22AA1A` FOREIGN KEY (`layout_id`) REFERENCES `dtb_layout` (`id`),
  ADD CONSTRAINT `FK_35DCD731E9ED820C` FOREIGN KEY (`block_id`) REFERENCES `dtb_block` (`id`);

--
-- テーブルの制約 `dtb_carousel_feature`
--
ALTER TABLE `dtb_carousel_feature`
  ADD CONSTRAINT `FK_D3AB8F4584665A` FOREIGN KEY (`product_id`) REFERENCES `dtb_product` (`id`) ON DELETE SET NULL;

--
-- テーブルの制約 `dtb_carousel_image`
--
ALTER TABLE `dtb_carousel_image`
  ADD CONSTRAINT `FK_232412B2E8115CD2` FOREIGN KEY (`carousel_feature_id`) REFERENCES `dtb_carousel_feature` (`id`) ON DELETE CASCADE;

--
-- テーブルの制約 `dtb_cart`
--
ALTER TABLE `dtb_cart`
  ADD CONSTRAINT `FK_FC3C24F09395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `dtb_customer` (`id`);

--
-- テーブルの制約 `dtb_cart_item`
--
ALTER TABLE `dtb_cart_item`
  ADD CONSTRAINT `FK_B0228F741AD5CDBF` FOREIGN KEY (`cart_id`) REFERENCES `dtb_cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B0228F7421B06187` FOREIGN KEY (`product_class_id`) REFERENCES `dtb_product_class` (`id`);

--
-- テーブルの制約 `dtb_category`
--
ALTER TABLE `dtb_category`
  ADD CONSTRAINT `FK_5ED2C2B61220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`),
  ADD CONSTRAINT `FK_5ED2C2B796A8F92` FOREIGN KEY (`parent_category_id`) REFERENCES `dtb_category` (`id`);

--
-- テーブルの制約 `dtb_class_category`
--
ALTER TABLE `dtb_class_category`
  ADD CONSTRAINT `FK_9B0D1DBA61220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`),
  ADD CONSTRAINT `FK_9B0D1DBAB462FB2A` FOREIGN KEY (`class_name_id`) REFERENCES `dtb_class_name` (`id`);

--
-- テーブルの制約 `dtb_class_name`
--
ALTER TABLE `dtb_class_name`
  ADD CONSTRAINT `FK_187C95AD61220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`);

--
-- テーブルの制約 `dtb_csv`
--
ALTER TABLE `dtb_csv`
  ADD CONSTRAINT `FK_F55F48C361220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`),
  ADD CONSTRAINT `FK_F55F48C3E8507796` FOREIGN KEY (`csv_type_id`) REFERENCES `mtb_csv_type` (`id`);

--
-- テーブルの制約 `dtb_customer`
--
ALTER TABLE `dtb_customer`
  ADD CONSTRAINT `FK_8298BBE35A2DB2A0` FOREIGN KEY (`sex_id`) REFERENCES `mtb_sex` (`id`),
  ADD CONSTRAINT `FK_8298BBE3BE04EA9` FOREIGN KEY (`job_id`) REFERENCES `mtb_job` (`id`),
  ADD CONSTRAINT `FK_8298BBE3C00AF8A7` FOREIGN KEY (`customer_status_id`) REFERENCES `mtb_customer_status` (`id`),
  ADD CONSTRAINT `FK_8298BBE3E171EF5F` FOREIGN KEY (`pref_id`) REFERENCES `mtb_pref` (`id`),
  ADD CONSTRAINT `FK_8298BBE3F92F3E70` FOREIGN KEY (`country_id`) REFERENCES `mtb_country` (`id`);

--
-- テーブルの制約 `dtb_customer_address`
--
ALTER TABLE `dtb_customer_address`
  ADD CONSTRAINT `FK_6C38C0F89395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `dtb_customer` (`id`),
  ADD CONSTRAINT `FK_6C38C0F8E171EF5F` FOREIGN KEY (`pref_id`) REFERENCES `mtb_pref` (`id`),
  ADD CONSTRAINT `FK_6C38C0F8F92F3E70` FOREIGN KEY (`country_id`) REFERENCES `mtb_country` (`id`);

--
-- テーブルの制約 `dtb_customer_favorite_product`
--
ALTER TABLE `dtb_customer_favorite_product`
  ADD CONSTRAINT `FK_ED6313834584665A` FOREIGN KEY (`product_id`) REFERENCES `dtb_product` (`id`),
  ADD CONSTRAINT `FK_ED6313839395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `dtb_customer` (`id`);

--
-- テーブルの制約 `dtb_delivery`
--
ALTER TABLE `dtb_delivery`
  ADD CONSTRAINT `FK_3420D9FA61220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`),
  ADD CONSTRAINT `FK_3420D9FAB0524E01` FOREIGN KEY (`sale_type_id`) REFERENCES `mtb_sale_type` (`id`);

--
-- テーブルの制約 `dtb_delivery_fee`
--
ALTER TABLE `dtb_delivery_fee`
  ADD CONSTRAINT `FK_491552412136921` FOREIGN KEY (`delivery_id`) REFERENCES `dtb_delivery` (`id`),
  ADD CONSTRAINT `FK_4915524E171EF5F` FOREIGN KEY (`pref_id`) REFERENCES `mtb_pref` (`id`);

--
-- テーブルの制約 `dtb_delivery_time`
--
ALTER TABLE `dtb_delivery_time`
  ADD CONSTRAINT `FK_E80EE3A612136921` FOREIGN KEY (`delivery_id`) REFERENCES `dtb_delivery` (`id`);

--
-- テーブルの制約 `dtb_layout`
--
ALTER TABLE `dtb_layout`
  ADD CONSTRAINT `FK_5A62AA7C4FFA550E` FOREIGN KEY (`device_type_id`) REFERENCES `mtb_device_type` (`id`);

--
-- テーブルの制約 `dtb_login_history`
--
ALTER TABLE `dtb_login_history`
  ADD CONSTRAINT `FK_6191DD4F7597D3FE` FOREIGN KEY (`member_id`) REFERENCES `dtb_member` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_6191DD4F9FA62FDD` FOREIGN KEY (`login_history_status_id`) REFERENCES `mtb_login_history_status` (`id`);

--
-- テーブルの制約 `dtb_mail_history`
--
ALTER TABLE `dtb_mail_history`
  ADD CONSTRAINT `FK_4870AB1161220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`),
  ADD CONSTRAINT `FK_4870AB118D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `dtb_order` (`id`);

--
-- テーブルの制約 `dtb_mail_template`
--
ALTER TABLE `dtb_mail_template`
  ADD CONSTRAINT `FK_1CB16DB261220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`);

--
-- テーブルの制約 `dtb_member`
--
ALTER TABLE `dtb_member`
  ADD CONSTRAINT `FK_10BC3BE661220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`),
  ADD CONSTRAINT `FK_10BC3BE681EC865B` FOREIGN KEY (`authority_id`) REFERENCES `mtb_authority` (`id`),
  ADD CONSTRAINT `FK_10BC3BE6BB3453DB` FOREIGN KEY (`work_id`) REFERENCES `mtb_work` (`id`);

--
-- テーブルの制約 `dtb_news`
--
ALTER TABLE `dtb_news`
  ADD CONSTRAINT `FK_EA4C351761220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`);

--
-- テーブルの制約 `dtb_order`
--
ALTER TABLE `dtb_order`
  ADD CONSTRAINT `FK_1D66D8074C3A3BB` FOREIGN KEY (`payment_id`) REFERENCES `dtb_payment` (`id`),
  ADD CONSTRAINT `FK_1D66D8074FFA550E` FOREIGN KEY (`device_type_id`) REFERENCES `mtb_device_type` (`id`),
  ADD CONSTRAINT `FK_1D66D8075A2DB2A0` FOREIGN KEY (`sex_id`) REFERENCES `mtb_sex` (`id`),
  ADD CONSTRAINT `FK_1D66D8079395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `dtb_customer` (`id`),
  ADD CONSTRAINT `FK_1D66D807BE04EA9` FOREIGN KEY (`job_id`) REFERENCES `mtb_job` (`id`),
  ADD CONSTRAINT `FK_1D66D807E171EF5F` FOREIGN KEY (`pref_id`) REFERENCES `mtb_pref` (`id`),
  ADD CONSTRAINT `FK_1D66D807F92F3E70` FOREIGN KEY (`country_id`) REFERENCES `mtb_country` (`id`);

--
-- テーブルの制約 `dtb_order_item`
--
ALTER TABLE `dtb_order_item`
  ADD CONSTRAINT `FK_A0C8C3ED1BD5C574` FOREIGN KEY (`rounding_type_id`) REFERENCES `mtb_rounding_type` (`id`),
  ADD CONSTRAINT `FK_A0C8C3ED21B06187` FOREIGN KEY (`product_class_id`) REFERENCES `dtb_product_class` (`id`),
  ADD CONSTRAINT `FK_A0C8C3ED4584665A` FOREIGN KEY (`product_id`) REFERENCES `dtb_product` (`id`),
  ADD CONSTRAINT `FK_A0C8C3ED4887F3F8` FOREIGN KEY (`shipping_id`) REFERENCES `dtb_shipping` (`id`),
  ADD CONSTRAINT `FK_A0C8C3ED84042C99` FOREIGN KEY (`tax_type_id`) REFERENCES `mtb_tax_type` (`id`),
  ADD CONSTRAINT `FK_A0C8C3ED8D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `dtb_order` (`id`),
  ADD CONSTRAINT `FK_A0C8C3EDA2505856` FOREIGN KEY (`tax_display_type_id`) REFERENCES `mtb_tax_display_type` (`id`),
  ADD CONSTRAINT `FK_A0C8C3EDCAD13EAD` FOREIGN KEY (`order_item_type_id`) REFERENCES `mtb_order_item_type` (`id`);

--
-- テーブルの制約 `dtb_page`
--
ALTER TABLE `dtb_page`
  ADD CONSTRAINT `FK_E3951A67D0618E8C` FOREIGN KEY (`master_page_id`) REFERENCES `dtb_page` (`id`);

--
-- テーブルの制約 `dtb_page_layout`
--
ALTER TABLE `dtb_page_layout`
  ADD CONSTRAINT `FK_F27999418C22AA1A` FOREIGN KEY (`layout_id`) REFERENCES `dtb_layout` (`id`),
  ADD CONSTRAINT `FK_F2799941C4663E4` FOREIGN KEY (`page_id`) REFERENCES `dtb_page` (`id`);

--
-- テーブルの制約 `dtb_payment`
--
ALTER TABLE `dtb_payment`
  ADD CONSTRAINT `FK_7AFF628F61220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`);

--
-- テーブルの制約 `dtb_payment_option`
--
ALTER TABLE `dtb_payment_option`
  ADD CONSTRAINT `FK_5631540D12136921` FOREIGN KEY (`delivery_id`) REFERENCES `dtb_delivery` (`id`),
  ADD CONSTRAINT `FK_5631540D4C3A3BB` FOREIGN KEY (`payment_id`) REFERENCES `dtb_payment` (`id`);

--
-- テーブルの制約 `dtb_product`
--
ALTER TABLE `dtb_product`
  ADD CONSTRAINT `FK_C49DE22F557B630` FOREIGN KEY (`product_status_id`) REFERENCES `mtb_product_status` (`id`),
  ADD CONSTRAINT `FK_C49DE22F61220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`),
  ADD CONSTRAINT `FK_C49DE22F68DA5EC3` FOREIGN KEY (`maker_id`) REFERENCES `plg_maker` (`id`);

--
-- テーブルの制約 `dtb_product_category`
--
ALTER TABLE `dtb_product_category`
  ADD CONSTRAINT `FK_B057789112469DE2` FOREIGN KEY (`category_id`) REFERENCES `dtb_category` (`id`),
  ADD CONSTRAINT `FK_B05778914584665A` FOREIGN KEY (`product_id`) REFERENCES `dtb_product` (`id`);

--
-- テーブルの制約 `dtb_product_class`
--
ALTER TABLE `dtb_product_class`
  ADD CONSTRAINT `FK_1A11D1BA248D128` FOREIGN KEY (`class_category_id1`) REFERENCES `dtb_class_category` (`id`),
  ADD CONSTRAINT `FK_1A11D1BA4584665A` FOREIGN KEY (`product_id`) REFERENCES `dtb_product` (`id`),
  ADD CONSTRAINT `FK_1A11D1BA61220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`),
  ADD CONSTRAINT `FK_1A11D1BA9B418092` FOREIGN KEY (`class_category_id2`) REFERENCES `dtb_class_category` (`id`),
  ADD CONSTRAINT `FK_1A11D1BAB0524E01` FOREIGN KEY (`sale_type_id`) REFERENCES `mtb_sale_type` (`id`),
  ADD CONSTRAINT `FK_1A11D1BABA4269E` FOREIGN KEY (`delivery_duration_id`) REFERENCES `dtb_delivery_duration` (`id`);

--
-- テーブルの制約 `dtb_product_image`
--
ALTER TABLE `dtb_product_image`
  ADD CONSTRAINT `FK_3267CC7A4584665A` FOREIGN KEY (`product_id`) REFERENCES `dtb_product` (`id`),
  ADD CONSTRAINT `FK_3267CC7A61220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`);

--
-- テーブルの制約 `dtb_product_stock`
--
ALTER TABLE `dtb_product_stock`
  ADD CONSTRAINT `FK_BC6C9E4521B06187` FOREIGN KEY (`product_class_id`) REFERENCES `dtb_product_class` (`id`),
  ADD CONSTRAINT `FK_BC6C9E4561220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`);

--
-- テーブルの制約 `dtb_product_tag`
--
ALTER TABLE `dtb_product_tag`
  ADD CONSTRAINT `FK_4433E7214584665A` FOREIGN KEY (`product_id`) REFERENCES `dtb_product` (`id`),
  ADD CONSTRAINT `FK_4433E72161220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`),
  ADD CONSTRAINT `FK_4433E721BAD26311` FOREIGN KEY (`tag_id`) REFERENCES `dtb_tag` (`id`);

--
-- テーブルの制約 `dtb_shipping`
--
ALTER TABLE `dtb_shipping`
  ADD CONSTRAINT `FK_2EBD22CE12136921` FOREIGN KEY (`delivery_id`) REFERENCES `dtb_delivery` (`id`),
  ADD CONSTRAINT `FK_2EBD22CE61220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`),
  ADD CONSTRAINT `FK_2EBD22CE8D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `dtb_order` (`id`),
  ADD CONSTRAINT `FK_2EBD22CEE171EF5F` FOREIGN KEY (`pref_id`) REFERENCES `mtb_pref` (`id`),
  ADD CONSTRAINT `FK_2EBD22CEF92F3E70` FOREIGN KEY (`country_id`) REFERENCES `mtb_country` (`id`);

--
-- テーブルの制約 `dtb_tax_rule`
--
ALTER TABLE `dtb_tax_rule`
  ADD CONSTRAINT `FK_59F696DE1BD5C574` FOREIGN KEY (`rounding_type_id`) REFERENCES `mtb_rounding_type` (`id`),
  ADD CONSTRAINT `FK_59F696DE21B06187` FOREIGN KEY (`product_class_id`) REFERENCES `dtb_product_class` (`id`),
  ADD CONSTRAINT `FK_59F696DE4584665A` FOREIGN KEY (`product_id`) REFERENCES `dtb_product` (`id`),
  ADD CONSTRAINT `FK_59F696DE61220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`),
  ADD CONSTRAINT `FK_59F696DEE171EF5F` FOREIGN KEY (`pref_id`) REFERENCES `mtb_pref` (`id`),
  ADD CONSTRAINT `FK_59F696DEF92F3E70` FOREIGN KEY (`country_id`) REFERENCES `mtb_country` (`id`);

--
-- テーブルの制約 `dtb_template`
--
ALTER TABLE `dtb_template`
  ADD CONSTRAINT `FK_94C12A694FFA550E` FOREIGN KEY (`device_type_id`) REFERENCES `mtb_device_type` (`id`);

--
-- テーブルの制約 `oauth2_access_token`
--
ALTER TABLE `oauth2_access_token`
  ADD CONSTRAINT `FK_454D9673C7440455` FOREIGN KEY (`client`) REFERENCES `oauth2_client` (`identifier`) ON DELETE CASCADE;

--
-- テーブルの制約 `oauth2_authorization_code`
--
ALTER TABLE `oauth2_authorization_code`
  ADD CONSTRAINT `FK_509FEF5FC7440455` FOREIGN KEY (`client`) REFERENCES `oauth2_client` (`identifier`) ON DELETE CASCADE;

--
-- テーブルの制約 `oauth2_refresh_token`
--
ALTER TABLE `oauth2_refresh_token`
  ADD CONSTRAINT `FK_4DD90732B6A2DD68` FOREIGN KEY (`access_token`) REFERENCES `oauth2_access_token` (`identifier`) ON DELETE SET NULL;

--
-- テーブルの制約 `plg_coupon_detail`
--
ALTER TABLE `plg_coupon_detail`
  ADD CONSTRAINT `FK_7B9D14112469DE2` FOREIGN KEY (`category_id`) REFERENCES `dtb_category` (`id`),
  ADD CONSTRAINT `FK_7B9D1414584665A` FOREIGN KEY (`product_id`) REFERENCES `dtb_product` (`id`),
  ADD CONSTRAINT `FK_7B9D14166C5951B` FOREIGN KEY (`coupon_id`) REFERENCES `plg_coupon` (`coupon_id`);

--
-- テーブルの制約 `plg_mailmaga_send_history`
--
ALTER TABLE `plg_mailmaga_send_history`
  ADD CONSTRAINT `FK_424AD01261220EA6` FOREIGN KEY (`creator_id`) REFERENCES `dtb_member` (`id`);

--
-- テーブルの制約 `plg_product_review`
--
ALTER TABLE `plg_product_review`
  ADD CONSTRAINT `FK_9CA38FA24584665A` FOREIGN KEY (`product_id`) REFERENCES `dtb_product` (`id`),
  ADD CONSTRAINT `FK_9CA38FA25A2DB2A0` FOREIGN KEY (`sex_id`) REFERENCES `mtb_sex` (`id`),
  ADD CONSTRAINT `FK_9CA38FA26BF700BD` FOREIGN KEY (`status_id`) REFERENCES `plg_product_review_status` (`id`),
  ADD CONSTRAINT `FK_9CA38FA29395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `dtb_customer` (`id`);

--
-- テーブルの制約 `plg_product_review_config`
--
ALTER TABLE `plg_product_review_config`
  ADD CONSTRAINT `FK_D27A17EFE8507796` FOREIGN KEY (`csv_type_id`) REFERENCES `mtb_csv_type` (`id`);

--
-- テーブルの制約 `plg_recommend_product`
--
ALTER TABLE `plg_recommend_product`
  ADD CONSTRAINT `FK_7EA2C2D14584665A` FOREIGN KEY (`product_id`) REFERENCES `dtb_product` (`id`);

--
-- テーブルの制約 `plg_related_product`
--
ALTER TABLE `plg_related_product`
  ADD CONSTRAINT `FK_77B090F74584665A` FOREIGN KEY (`product_id`) REFERENCES `dtb_product` (`id`),
  ADD CONSTRAINT `FK_77B090F7A15B9831` FOREIGN KEY (`child_product_id`) REFERENCES `dtb_product` (`id`);

--
-- テーブルの制約 `plg_rental_order`
--
ALTER TABLE `plg_rental_order`
  ADD CONSTRAINT `FK_E6EB08FE21B06187` FOREIGN KEY (`product_class_id`) REFERENCES `dtb_product_class` (`id`),
  ADD CONSTRAINT `FK_E6EB08FE4584665A` FOREIGN KEY (`product_id`) REFERENCES `dtb_product` (`id`),
  ADD CONSTRAINT `FK_E6EB08FE8D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `dtb_order` (`id`),
  ADD CONSTRAINT `FK_E6EB08FE9395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `dtb_customer` (`id`);

--
-- テーブルの制約 `plg_rental_product`
--
ALTER TABLE `plg_rental_product`
  ADD CONSTRAINT `FK_873091824584665A` FOREIGN KEY (`product_id`) REFERENCES `dtb_product` (`id`);

--
-- テーブルの制約 `plg_site_kit_id_token`
--
ALTER TABLE `plg_site_kit_id_token`
  ADD CONSTRAINT `FK_5B28B5227597D3FE` FOREIGN KEY (`member_id`) REFERENCES `dtb_member` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
