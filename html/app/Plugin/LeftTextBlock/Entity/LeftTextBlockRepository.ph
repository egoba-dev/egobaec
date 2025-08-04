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
     * �����������Ƥ��ʤ��ǡ��������������Ǽ���
     */
    public function findAllOrderByCreateDate()
    {
        return $this->createQueryBuilder('ltb')
            ->where('ltb.deletedAt IS NULL')  // �����������Ƥ��ʤ���ΤΤ�
            ->orderBy('ltb.createDate', 'DESC')  // create_date �� createDate �˽���
            ->getQuery()
            ->getResult();
    }

    /**
     * ɽ����ǽ�������������Ƥ��ʤ��ǡ������¤ӽ�Ǽ���
     */
    public function findVisibleOrderBySortNo()
    {
        return $this->createQueryBuilder('ltb')
            ->where('ltb.visible = :visible')
            ->andWhere('ltb.deletedAt IS NULL')  // �����������Ƥ��ʤ���ΤΤ�
            ->setParameter('visible', true)
            ->orderBy('ltb.sortNo', 'ASC')       // sort_no �� sortNo �˽���
            ->addOrderBy('ltb.createDate', 'ASC') // create_date �� createDate �˽���
            ->getQuery()
            ->getResult();
    }

    /**
     * �����������Ƥ��ʤ��ǡ����κ����¤ӽ�����
     */
    public function getMaxSortNo()
    {
        $qb = $this->createQueryBuilder('ltb')
            ->select('MAX(ltb.sortNo) as max_sort_no')  // sort_no �� sortNo �˽���
            ->where('ltb.deletedAt IS NULL');  // �����������Ƥ��ʤ���ΤΤ�
        
        $result = $qb->getQuery()->getSingleScalarResult();
        
        return $result ? (int)$result : 0;
    }

    /**
     * �����������Ƥ��ʤ��ǡ�����ID�Ǹ���
     */
    public function find($id, $lockMode = null, $lockVersion = null)
    {
        return $this->createQueryBuilder('ltb')
            ->where('ltb.id = :id')
            ->andWhere('ltb.deletedAt IS NULL')  // �����������Ƥ��ʤ���ΤΤ�
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * �����������Ƥ��ʤ��ǡ��������դ��Ǹ���
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        $qb = $this->createQueryBuilder('ltb')
            ->where('ltb.deletedAt IS NULL');  // �����������Ƥ��ʤ���ΤΤ�

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
     * ����������줿�ǡ�����ޤ�Ƹ����ʴ����ѡ�
     */
    public function findAllIncludingDeleted()
    {
        return $this->createQueryBuilder('ltb')
            ->orderBy('ltb.createDate', 'DESC')  // create_date �� createDate �˽���
            ->getQuery()
            ->getResult();
    }

    /**
     * ����������줿�ǡ����Τ߼���
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