<?php

namespace Plugin\MakerProductBlock\Controller\Block;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Controller\AbstractController;
use Plugin\MakerProductBlock\Repository\MakerBlockRepository;
use Plugin\MakerProductBlock\Service\MakerService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * メーカー商品ブロックコントローラ
 */
class MakerProductController extends AbstractController
{
    protected $makerBlockRepository;
    protected $makerService;
    protected $entityManager;
    
    public function __construct(
        MakerBlockRepository $makerBlockRepository,
        MakerService $makerService,
        EntityManagerInterface $entityManager
    ) {
        $this->makerBlockRepository = $makerBlockRepository;
        $this->makerService = $makerService;
        $this->entityManager = $entityManager;
    }
    
    /**
     * @Route("/block/maker_product/{id}", requirements={"id"="\w+"}, name="block_maker_product", methods={"GET"})
     * @Template("@MakerProductBlock/Block/maker_product.twig")
     */
    public function index(Request $request, $id = null)
    {
        // デフォルトの返り値
        $defaultResponse = [
            "Products" => [],
            "maker_name" => "",
            "maker_id" => null,
            "block_id" => null,
            "visible_count" => 4,
            "visible_count_sp" => 1,
        ];
        
        try {
            // IDからmachine_idとblock_idを抽出
            $Block = $this->entityManager->getRepository("Eccube\Entity\Block")
                ->findOneBy(["file_name" => "maker_product_" . $id]);
            
            if (!$Block) {
                return $defaultResponse;
            }
            
            // ブロックIDからメーカーブロック情報を取得
            $MakerBlock = $this->makerBlockRepository->findOneBy(["block_id" => $Block->getId()]);
            if (!$MakerBlock || !$MakerBlock->isEnabled()) {
                return $defaultResponse;
            }
            
            // メーカー情報を取得
            $Maker = $this->makerService->getMakerById($MakerBlock->getMakerId());
            if (!$Maker) {
                return array_merge($defaultResponse, [
                    "maker_id" => $MakerBlock->getMakerId(),
                    "block_id" => $MakerBlock->getId(),
                    "visible_count" => $MakerBlock->getVisibleCount(),
                    "visible_count_sp" => $MakerBlock->getVisibleCountSp(),
                ]);
            }
            
            // 商品情報を取得
            $Products = $this->makerService->getProductsByMakerId(
                $MakerBlock->getMakerId(),
                $MakerBlock->getProductCount(),
                $MakerBlock->getSortType()
            );
            
            return [
                "maker_id" => $MakerBlock->getMakerId(),
                "maker_name" => $Maker->getName(),
                "Products" => $Products,
                "block_id" => $MakerBlock->getId(),
                "visible_count" => $MakerBlock->getVisibleCount(),
                "visible_count_sp" => $MakerBlock->getVisibleCountSp(),
            ];
            
        } catch (\Exception $e) {
            // エラーログを出力
            error_log("MakerProductController error: " . $e->getMessage());
            return $defaultResponse;
        }
    }
}