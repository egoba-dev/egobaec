<?php

namespace Plugin\CarouselFeature\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Entity\AbstractEntity;

/**
 * @ORM\Table(name="dtb_carousel_config")
 * @ORM\Entity(repositoryClass="Plugin\CarouselFeature\Repository\CarouselConfigRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class CarouselConfig extends AbstractEntity
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     * @ORM\Column(name="display_count", type="integer", options={"default":5})
     */
    private $display_count = 5;

    /**
     * @var int
     * @ORM\Column(name="auto_play", type="integer", options={"default":1})
     */
    private $auto_play = 1;

    /**
     * @var int
     * @ORM\Column(name="auto_play_interval", type="integer", options={"default":5000})
     */
    private $auto_play_interval = 5000;

    /**
     * @var int
     * @ORM\Column(name="show_navigation", type="integer", options={"default":1})
     */
    private $show_navigation = 1;

    /**
     * @var int
     * @ORM\Column(name="show_indicators", type="integer", options={"default":1})
     */
    private $show_indicators = 1;

    /**
     * @var int
     * @ORM\Column(name="enable_touch_swipe", type="integer", options={"default":1})
     */
    private $enable_touch_swipe = 1;

    /**
     * @var int
     * @ORM\Column(name="enable_keyboard_nav", type="integer", options={"default":1})
     */
    private $enable_keyboard_nav = 1;

    /**
     * @var string
     * @ORM\Column(name="transition_effect", type="string", length=20, options={"default":"slide"})
     */
    private $transition_effect = 'slide';

    /**
     * @var int
     * @ORM\Column(name="transition_duration", type="integer", options={"default":500})
     */
    private $transition_duration = 500;

    /**
     * @var \DateTime
     * @ORM\Column(name="create_date", type="datetime")
     */
    private $create_date;

    /**
     * @var \DateTime
     * @ORM\Column(name="update_date", type="datetime")
     */
    private $update_date;

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $now = new \DateTime();
        $this->create_date = $now;
        $this->update_date = $now;
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->update_date = new \DateTime();
    }

    // Getters and Setters

    public function getId()
    {
        return $this->id;
    }

    public function getDisplayCount()
    {
        return $this->display_count;
    }

    public function setDisplayCount($display_count)
    {
        $this->display_count = max(1, min(10, (int)$display_count));
        return $this;
    }

    // Boolean フィールドのゲッター・セッターを修正
    public function getAutoPlay()
    {
        return (bool)$this->auto_play; // Boolean として返す
    }

    public function setAutoPlay($auto_play)
    {
        $this->auto_play = (int)(bool)$auto_play; // integer として保存
        return $this;
    }

    public function getAutoPlayInterval()
    {
        return $this->auto_play_interval;
    }

    public function setAutoPlayInterval($auto_play_interval)
    {
        $this->auto_play_interval = max(1000, min(30000, (int)$auto_play_interval));
        return $this;
    }

    public function getShowNavigation()
    {
        return (bool)$this->show_navigation; // Boolean として返す
    }

    public function setShowNavigation($show_navigation)
    {
        $this->show_navigation = (int)(bool)$show_navigation; // integer として保存
        return $this;
    }

    public function getShowIndicators()
    {
        return (bool)$this->show_indicators; // Boolean として返す
    }

    public function setShowIndicators($show_indicators)
    {
        $this->show_indicators = (int)(bool)$show_indicators; // integer として保存
        return $this;
    }

    public function getEnableTouchSwipe()
    {
        return (bool)$this->enable_touch_swipe; // Boolean として返す
    }

    public function setEnableTouchSwipe($enable_touch_swipe)
    {
        $this->enable_touch_swipe = (int)(bool)$enable_touch_swipe; // integer として保存
        return $this;
    }

    public function getEnableKeyboardNav()
    {
        return (bool)$this->enable_keyboard_nav; // Boolean として返す
    }

    public function setEnableKeyboardNav($enable_keyboard_nav)
    {
        $this->enable_keyboard_nav = (int)(bool)$enable_keyboard_nav; // integer として保存
        return $this;
    }

    public function getTransitionEffect()
    {
        return $this->transition_effect;
    }

    public function setTransitionEffect($transition_effect)
    {
        $this->transition_effect = $transition_effect;
        return $this;
    }

    public function getTransitionDuration()
    {
        return $this->transition_duration;
    }

    public function setTransitionDuration($transition_duration)
    {
        $this->transition_duration = max(100, min(2000, (int)$transition_duration));
        return $this;
    }

    public function getCreateDate()
    {
        return $this->create_date;
    }

    public function setCreateDate($create_date)
    {
        $this->create_date = $create_date;
        return $this;
    }

    public function getUpdateDate()
    {
        return $this->update_date;
    }

    public function setUpdateDate($update_date)
    {
        $this->update_date = $update_date;
        return $this;
    }

    // Utility methods

    /**
     * 自動再生が有効かチェック
     */
    public function isAutoPlayEnabled()
    {
        return (bool)$this->auto_play;
    }

    /**
     * ナビゲーションが有効かチェック
     */
    public function isNavigationEnabled()
    {
        return (bool)$this->show_navigation;
    }

    /**
     * インジケーターが有効かチェック
     */
    public function isIndicatorsEnabled()
    {
        return (bool)$this->show_indicators;
    }

    /**
     * タッチスワイプが有効かチェック
     */
    public function isTouchSwipeEnabled()
    {
        return (bool)$this->enable_touch_swipe;
    }

    /**
     * キーボードナビゲーションが有効かチェック
     */
    public function isKeyboardNavEnabled()
    {
        return (bool)$this->enable_keyboard_nav;
    }

    /**
     * JavaScript用の設定配列を取得
     */
    public function toJsConfig()
    {
        return [
            'displayCount' => $this->display_count,
            'autoPlay' => $this->isAutoPlayEnabled(),
            'autoPlayInterval' => $this->auto_play_interval,
            'showNavigation' => $this->isNavigationEnabled(),
            'showIndicators' => $this->isIndicatorsEnabled(),
            'enableTouchSwipe' => $this->isTouchSwipeEnabled(),
            'enableKeyboardNav' => $this->isKeyboardNavEnabled(),
            'transitionEffect' => $this->transition_effect,
            'transitionDuration' => $this->transition_duration
        ];
    }

    /**
     * トランジション効果の選択肢を取得
     */
    public static function getTransitionEffectChoices()
    {
        return [
            'スライド' => 'slide',
            'フェード' => 'fade',
            'なし' => 'none'
        ];
    }

    /**
     * デフォルト設定を取得
     */
    public static function getDefaultConfig()
    {
        $config = new self();
        return $config;
    }

    /**
     * 設定をバリデート
     */
    public function validate()
    {
        $errors = [];

        if ($this->display_count < 1 || $this->display_count > 10) {
            $errors[] = '表示枚数は1-10の範囲で設定してください。';
        }

        if ($this->auto_play_interval < 1000 || $this->auto_play_interval > 30000) {
            $errors[] = '自動再生間隔は1000-30000msの範囲で設定してください。';
        }

        if ($this->transition_duration < 100 || $this->transition_duration > 2000) {
            $errors[] = 'トランジション時間は100-2000msの範囲で設定してください。';
        }

        $validEffects = array_values(self::getTransitionEffectChoices());
        if (!in_array($this->transition_effect, $validEffects)) {
            $errors[] = '無効なトランジション効果が選択されています。';
        }

        return $errors;
    }
}