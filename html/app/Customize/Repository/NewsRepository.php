<?php
// customize/Repository/NewsRepository.php

namespace Customize\Repository;

use Doctrine\ORM\EntityRepository;

class NewsRepository extends EntityRepository
{
    /**
     * �����Ѥߥ˥塼��������������륵��ץ�᥽�å�
     *
     * @return array
     */
    public function findPublishedNews(): array
    {
        $qb = $this->createQueryBuilder('n');
        $qb->where('n.publishDate <= :now')
           ->setParameter('now', new \DateTime())
           ->orderBy('n.publishDate', 'DESC');

        return $qb->getQuery()->getResult();
    }
}