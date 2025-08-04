<?php

namespace Plugin\MakerProductBlock\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Controller\AbstractController;
use Eccube\Entity\Master\ProductStatus;
use Eccube\Repository\Master\ProductStatusRepository;
use Eccube\Repository\ProductRepository;
use Knp\Component\Pager\PaginatorInterface;
use Plugin\MakerProductBlock\Service\MakerService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MakerProductListController extends AbstractController
{
    protected $productRepository;
    protected $makerService;
    protected $paginator;
    protected $productStatusRepository;
    protected $entityManager;

    public function __construct(
        ProductRepository $productRepository,
        MakerService $makerService,
        PaginatorInterface $paginator,
        ProductStatusRepository $productStatusRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->productRepository = $productRepository;
        $this->makerService = $makerService;
        $this->paginator = $paginator;
        $this->productStatusRepository = $productStatusRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/maker/products/{makerId}", name="maker_product_list", requirements={"makerId"="\d+"}, methods={"GET"})
     * @Template("@MakerProductBlock/Product/maker_list.twig")
     */
    public function index(Request $request, $makerId)
    {
        $maker = $this->makerService->getMakerById($makerId);
        if (!$maker) {
            throw $this->createNotFoundException('指定されたメーカーが見つかりません。');
        }

        $dispNumber = (int) $request->query->get('disp_number', 20);
        $page = (int) $request->query->get('pageno', 1);
        $orderBy = $request->query->get('orderby', 'new');

        $connection = $this->entityManager->getConnection();
        $sql = "SELECT id FROM dtb_product WHERE maker_id = ? AND product_status_id = ? ORDER BY ";
        
        switch ($orderBy) {
            case 'price': $sql .= "price02 ASC"; break;
            case 'price_desc': $sql .= "price02 DESC"; break;
            case 'name': $sql .= "name ASC"; break;
            case 'old': $sql .= "create_date ASC"; break;
            default: $sql .= "create_date DESC"; break;
        }
        
        $stmt = $connection->prepare($sql);
        $result = $stmt->executeQuery([$makerId, ProductStatus::DISPLAY_SHOW]);
        $productIds = $result->fetchFirstColumn();

        if (empty($productIds)) {
            return [
                'maker' => $maker,
                'pagination' => null,
                'disp_number' => $dispNumber,
                'disp_number_choices' => [20 => '20', 40 => '40', 60 => '60'],
                'orderby' => $orderBy,
                'orderby_choices' => ['new' => '新着順', 'price' => '価格が低い順', 'price_desc' => '価格が高い順', 'name' => '商品名順']
            ];
        }

        $qb = $this->productRepository->createQueryBuilder('p')
            ->where('p.id IN (:product_ids)')
            ->andWhere('p.Status = :status')
            ->setParameter('product_ids', $productIds)
            ->setParameter('status', ProductStatus::DISPLAY_SHOW)
            ->orderBy('p.create_date', 'DESC');

        $pagination = $this->paginator->paginate($qb->getQuery(), $page, $dispNumber);

        return [
            'maker' => $maker,
            'pagination' => $pagination,
            'disp_number' => $dispNumber,
            'disp_number_choices' => [20 => '20', 40 => '40', 60 => '60'],
            'orderby' => $orderBy,
            'orderby_choices' => ['new' => '新着順', 'price' => '価格が低い順', 'price_desc' => '価格が高い順', 'name' => '商品名順']
        ];
    }
}
