<?php

namespace Customize\Twig\Extension;

use Eccube\Repository\ProductRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * 新着商品用Twigエクステンション
 */
class NewItemExtension extends AbstractExtension
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('get_new_products', [$this, 'getNewProducts']),
        ];
    }

    /**
     * 新着商品を取得
     */
    public function getNewProducts($limit = 7)
    {
        $qb = $this->productRepository->createQueryBuilder('p')
            ->andWhere('p.Status = :status')
            ->setParameter('status', 1)
            ->orderBy('p.create_date', 'DESC')
            ->setMaxResults($limit);

        return $qb->getQuery()->getResult();
    }
}