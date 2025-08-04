<?php

namespace Plugin\CarouselFeature\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Plugin\CarouselFeature\Entity\CarouselConfig;

/**
 * カルーセル設定リポジトリ
 */
class CarouselConfigRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarouselConfig::class);
    }

    /**
     * 設定を取得（1件のみなので固定IDで取得）
     */
    public function getConfig()
    {
        return $this->find(1);
    }

    /**
     * 設定を保存
     */
    public function save(CarouselConfig $config, bool $flush = true)
    {
        $this->getEntityManager()->persist($config);
        
        if ($flush) {
            $this->getEntityManager()->flush();
        }
        
        return $config;
    }

    /**
     * 設定を削除
     */
    public function remove(CarouselConfig $config, bool $flush = true)
    {
        $this->getEntityManager()->remove($config);
        
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * デフォルト設定を作成
     */
    public function createDefaultConfig()
    {
        $config = new CarouselConfig();
        $config->setDisplayCount(5);
        $config->setAutoPlay(true);
        $config->setAutoPlayInterval(5000);
        $config->setShowNavigation(true);
        $config->setShowIndicators(true);
        $config->setEnableTouchSwipe(true);
        $config->setEnableKeyboardNav(true);
        $config->setTransitionEffect('slide');
        $config->setTransitionDuration(500);

        return $this->save($config);
    }

    /**
     * 設定が存在するかチェック
     */
    public function configExists()
    {
        return $this->getConfig() !== null;
    }

    /**
     * 設定を初期化（存在しない場合のみ作成）
     */
    public function initializeConfig()
    {
        if (!$this->configExists()) {
            return $this->createDefaultConfig();
        }
        
        return $this->getConfig();
    }
}