<?php

namespace Plugin\LeftTextBlock\Repository;

use Eccube\Repository\AbstractRepository;
use Plugin\LeftTextBlock\Entity\LeftTextBlock;
use Doctrine\Persistence\ManagerRegistry;

class LeftTextBlockRepository extends AbstractRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LeftTextBlock::class);
    }

    /**
     * 論理削除されていないデータを作成日時順で取得
     */
    public function findAllOrderByCreateDate()
    {
        return $this->createQueryBuilder('ltb')
            ->where('ltb.deletedAt IS NULL')
            ->orderBy('ltb.createDate', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * 表示可能で論理削除されていないデータを並び順で取得
     */
    public function findVisibleOrderBySortNo()
    {
        return $this->createQueryBuilder('ltb')
            ->where('ltb.visible = :visible')
            ->andWhere('ltb.deletedAt IS NULL')
            ->setParameter('visible', true)
            ->orderBy('ltb.sortNo', 'ASC')
            ->addOrderBy('ltb.createDate', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * 論理削除されていないデータの最大並び順を取得
     */
    public function getMaxSortNo()
    {
        $qb = $this->createQueryBuilder('ltb')
            ->select('MAX(ltb.sortNo) as max_sort_no')
            ->where('ltb.deletedAt IS NULL');
        
        $result = $qb->getQuery()->getSingleScalarResult();
        
        return $result ? (int)$result : 0;
    }

    /**
     * 論理削除されていないデータをIDで検索
     */
    public function find($id, $lockMode = null, $lockVersion = null)
    {
        return $this->createQueryBuilder('ltb')
            ->where('ltb.id = :id')
            ->andWhere('ltb.deletedAt IS NULL')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * 論理削除されていないデータを条件付きで検索
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        $qb = $this->createQueryBuilder('ltb')
            ->where('ltb.deletedAt IS NULL');

        foreach ($criteria as $field => $value) {
            $qb->andWhere("ltb.{$field} = :{$field}")
               ->setParameter($field, $value);
        }

        if ($orderBy) {
            foreach ($orderBy as $field => $direction) {
                $qb->addOrderBy("ltb.{$field}", $direction);
            }
        }

        if ($limit) {
            $qb->setMaxResults($limit);
        }

        if ($offset) {
            $qb->setFirstResult($offset);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * 論理削除されたデータも含めて検索（管理用）
     */
    public function findAllIncludingDeleted()
    {
        return $this->createQueryBuilder('ltb')
            ->orderBy('ltb.createDate', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * 論理削除されたデータのみ取得
     */
    public function findDeleted()
    {
        return $this->createQueryBuilder('ltb')
            ->where('ltb.deletedAt IS NOT NULL')
            ->orderBy('ltb.deletedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}