<?php

namespace Plugin\CarouselFeature\Service;

use Doctrine\ORM\EntityManagerInterface;
use Plugin\CarouselFeature\Entity\CarouselConfig;
use Plugin\CarouselFeature\Repository\CarouselConfigRepository;

class ConfigService
{
    private $entityManager;
    private $configRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->configRepository = $entityManager->getRepository(CarouselConfig::class);
    }

    /**
     * 設定を取得（存在しない場合は作成）
     */
    public function getConfig()
    {
        $config = $this->configRepository->getConfig();
        
        if (!$config) {
            $config = $this->createDefaultConfig();
        }

        return $config;
    }

    /**
     * 設定を更新
     */
    public function updateConfig(array $data)
    {
        $config = $this->getConfig();

        // データをエンティティに設定
        if (isset($data['display_count'])) {
            $config->setDisplayCount($data['display_count']);
        }
        if (isset($data['auto_play'])) {
            $config->setAutoPlay($data['auto_play']);
        }
        if (isset($data['auto_play_interval'])) {
            $config->setAutoPlayInterval($data['auto_play_interval']);
        }
        if (isset($data['show_navigation'])) {
            $config->setShowNavigation($data['show_navigation']);
        }
        if (isset($data['show_indicators'])) {
            $config->setShowIndicators($data['show_indicators']);
        }
        if (isset($data['enable_touch_swipe'])) {
            $config->setEnableTouchSwipe($data['enable_touch_swipe']);
        }
        if (isset($data['enable_keyboard_nav'])) {
            $config->setEnableKeyboardNav($data['enable_keyboard_nav']);
        }
        if (isset($data['transition_effect'])) {
            $config->setTransitionEffect($data['transition_effect']);
        }
        if (isset($data['transition_duration'])) {
            $config->setTransitionDuration($data['transition_duration']);
        }

        return $this->configRepository->save($config);
    }

    /**
     * デフォルト設定を作成
     */
    public function createDefaultConfig()
    {
        return $this->configRepository->createDefaultConfig();
    }

    /**
     * 設定をデフォルトにリセット
     */
    public function resetToDefault()
    {
        $config = $this->getConfig();
        
        $config->setDisplayCount(5);
        $config->setAutoPlay(true);
        $config->setAutoPlayInterval(5000);
        $config->setShowNavigation(true);
        $config->setShowIndicators(true);
        $config->setEnableTouchSwipe(true);
        $config->setEnableKeyboardNav(true);
        $config->setTransitionEffect('slide');
        $config->setTransitionDuration(500);

        return $this->configRepository->save($config);
    }

    /**
     * 設定データの検証
     */
    public function validateConfigData(array $data)
    {
        $errors = [];

        if (isset($data['display_count'])) {
            $displayCount = (int)$data['display_count'];
            if ($displayCount < 1 || $displayCount > 10) {
                $errors[] = '表示枚数は1-10の範囲で設定してください。';
            }
        }

        if (isset($data['auto_play_interval'])) {
            $interval = (int)$data['auto_play_interval'];
            if ($interval < 1000 || $interval > 30000) {
                $errors[] = '自動再生間隔は1000-30000msの範囲で設定してください。';
            }
        }

        if (isset($data['transition_duration'])) {
            $duration = (int)$data['transition_duration'];
            if ($duration < 100 || $duration > 2000) {
                $errors[] = 'トランジション時間は100-2000msの範囲で設定してください。';
            }
        }

        if (isset($data['transition_effect'])) {
            $validEffects = array_values(CarouselConfig::getTransitionEffectChoices());
            if (!in_array($data['transition_effect'], $validEffects)) {
                $errors[] = '無効なトランジション効果が選択されています。';
            }
        }

        return $errors;
    }

    /**
     * 設定統計情報を取得
     */
    public function getConfigStats()
    {
        $config = $this->getConfig();
        
        return [
            'display_count' => $config->getDisplayCount(),
            'auto_play_enabled' => $config->isAutoPlayEnabled(),
            'auto_play_interval_seconds' => $config->getAutoPlayInterval() / 1000,
            'navigation_enabled' => $config->isNavigationEnabled(),
            'indicators_enabled' => $config->isIndicatorsEnabled(),
            'touch_swipe_enabled' => $config->isTouchSwipeEnabled(),
            'keyboard_nav_enabled' => $config->isKeyboardNavEnabled(),
            'transition_effect' => $config->getTransitionEffect(),
            'transition_duration_seconds' => $config->getTransitionDuration() / 1000,
        ];
    }

    
    /**
     * JavaScript用設定配列を取得
     */
    public function toJsConfig()
    {
        $config = $this->getConfig();
        
        return [
            'autoPlay' => $config->getAutoPlay(),
            'autoPlayInterval' => $config->getAutoPlayInterval(),
            'showNavigation' => $config->getShowNavigation(),
            'showIndicators' => $config->getShowIndicators(),
            'enableTouchSwipe' => $config->getEnableTouchSwipe(),
            'enableKeyboardNav' => $config->getEnableKeyboardNav(),
            'transitionEffect' => $config->getTransitionEffect(),
            'transitionDuration' => $config->getTransitionDuration()
        ];
    }
}