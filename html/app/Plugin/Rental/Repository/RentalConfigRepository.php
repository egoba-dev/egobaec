<?php

namespace Plugin\Rental\Repository;

use Doctrine\Persistence\ManagerRegistry;
use Plugin\Rental\Entity\RentalConfig;
use Eccube\Repository\AbstractRepository;

/**
 * RentalConfigRepository
 *
 * レンタル設定情報を管理するリポジトリクラス
 */
class RentalConfigRepository extends AbstractRepository
{
    /**
     * コンストラクタ
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RentalConfig::class);
    }

    /**
     * 設定を取得（常に1レコードのみ）
     *
     * @return RentalConfig|null
     */
    public function getConfig()
    {
        return $this->find(1);
    }

    /**
     * 設定が存在しない場合はデフォルト設定を作成
     *
     * @return RentalConfig
     */
    public function getOrCreate()
    {
        $Config = $this->find(1);
        
        if (!$Config) {
            $Config = new RentalConfig();
            $Config->setAutoApproval(true);
            $Config->setDefaultMaxDays(90); // デフォルトの最大レンタル日数
            $Config->setRentalTerms('レンタル利用規約のデフォルトテキスト');
            $Config->setCreateDate(new \DateTime());
            $Config->setUpdateDate(new \DateTime());
            
            $entityManager = $this->getEntityManager();
            $entityManager->persist($Config);
            $entityManager->flush();
        }
        
        return $Config;
    }
}
