<?php

namespace Plugin\LeftTextBlock\Controller;

use Plugin\LeftTextBlock\Repository\LeftTextBlockRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Eccube\Controller\AbstractController;
use Twig\Environment;

class BlockController extends AbstractController
{
    private $leftTextBlockRepository;
    private $twig;

    public function __construct(LeftTextBlockRepository $leftTextBlockRepository, Environment $twig)
    {
        $this->leftTextBlockRepository = $leftTextBlockRepository;
        $this->twig = $twig;
    }

    /**
     * 動的テキストブロック表示（IDベース）
     */
    public function index($id = null): Response
    {
        try {
            if ($id !== null) {
                // 特定のIDのテキストブロックを取得
                $leftTextBlock = $this->leftTextBlockRepository->find($id);
                
                if (!$leftTextBlock || !$leftTextBlock->getVisible()) {
                    return new Response('');
                }
                
                $leftTextBlocks = [$leftTextBlock];
            } else {
                // 全ての有効なテキストブロックを表示
                $leftTextBlocks = $this->leftTextBlockRepository->findBy(['visible' => true], ['sortNo' => 'ASC']);
            }

            // Twigテンプレートを使用してレンダリング
            $html = $this->twig->render('@LeftTextBlock/Block/left_text_block.twig', [
                'LeftTextBlocks' => $leftTextBlocks
            ]);

            return new Response($html);
        } catch (\Exception $e) {
            error_log("LeftTextBlock BlockController Error (ID: {$id}): " . $e->getMessage());
            return new Response("<div class=\"left-text-block-error\">テキストブロックの読み込みに失敗しました。</div>");
        }
    }

     /**
     * 個別テキストブロック表示（ID 1-9）
     */
    /**
     * @Route("/block/left_text_block_1", name="block_left_text_block_1", methods={"GET"})
     */
    public function leftTextBlock1(): Response { return $this->index(1); }

    /**
     * @Route("/block/left_text_block_2", name="block_left_text_block_2", methods={"GET"})
     */
    public function leftTextBlock2(): Response { return $this->index(2); }

    /**
     * @Route("/block/left_text_block_3", name="block_left_text_block_3", methods={"GET"})
     */
    public function leftTextBlock3(): Response { return $this->index(3); }

    /**
     * @Route("/block/left_text_block_4", name="block_left_text_block_4", methods={"GET"})
     */
    public function leftTextBlock4(): Response { return $this->index(4); }

    /**
     * @Route("/block/left_text_block_5", name="block_left_text_block_5", methods={"GET"})
     */
    public function leftTextBlock5(): Response { return $this->index(5); }

    /**
     * @Route("/block/left_text_block_6", name="block_left_text_block_6", methods={"GET"})
     */
    public function leftTextBlock6(): Response { return $this->index(6); }

    /**
     * @Route("/block/left_text_block_7", name="block_left_text_block_7", methods={"GET"})
     */
    public function leftTextBlock7(): Response { return $this->index(7); }

    /**
     * @Route("/block/left_text_block_8", name="block_left_text_block_8", methods={"GET"})
     */
    public function leftTextBlock8(): Response { return $this->index(8); }

    /**
     * @Route("/block/left_text_block_9", name="block_left_text_block_9", methods={"GET"})
     */
    public function leftTextBlock9(): Response { return $this->index(9); }
    /**
     * 個別テキストブロック表示（ID 10）
     * @Route("/block/left_text_block_10", name="block_left_text_block_10", methods={"GET"})
     */
    public function leftTextBlock10(): Response
    {
        return $this->index(10);
    }

    /**
     * 個別テキストブロック表示（ID 11）
     * @Route("/block/left_text_block_11", name="block_left_text_block_11", methods={"GET"})
     */
    public function leftTextBlock11(): Response
    {
        return $this->index(11);
    }

    /**
     * 個別テキストブロック表示（ID 12）
     * @Route("/block/left_text_block_12", name="block_left_text_block_12", methods={"GET"})
     */
    public function leftTextBlock12(): Response
    {
        return $this->index(12);
    }

    /**
     * 個別テキストブロック表示（ID 13）
     * @Route("/block/left_text_block_13", name="block_left_text_block_13", methods={"GET"})
     */
    public function leftTextBlock13(): Response
    {
        return $this->index(13);
    }

    /**
     * 個別テキストブロック表示（ID 14）
     * @Route("/block/left_text_block_14", name="block_left_text_block_14", methods={"GET"})
     */
    public function leftTextBlock14(): Response
    {
        return $this->index(14);
    }

    /**
     * 個別テキストブロック表示（ID 15）
     * @Route("/block/left_text_block_15", name="block_left_text_block_15", methods={"GET"})
     */
    public function leftTextBlock15(): Response
    {
        return $this->index(15);
    }

    /**
     * 個別テキストブロック表示（ID 16）
     * @Route("/block/left_text_block_16", name="block_left_text_block_16", methods={"GET"})
     */
    public function leftTextBlock16(): Response
    {
        return $this->index(16);
    }

    /**
     * 個別テキストブロック表示（ID 17）
     * @Route("/block/left_text_block_17", name="block_left_text_block_17", methods={"GET"})
     */
    public function leftTextBlock17(): Response
    {
        return $this->index(17);
    }

    /**
     * 個別テキストブロック表示（ID 18）
     * @Route("/block/left_text_block_18", name="block_left_text_block_18", methods={"GET"})
     */
    public function leftTextBlock18(): Response
    {
        return $this->index(18);
    }

    /**
     * 個別テキストブロック表示（ID 19）
     * @Route("/block/left_text_block_19", name="block_left_text_block_19", methods={"GET"})
     */
    public function leftTextBlock19(): Response
    {
        return $this->index(19);
    }

    /**
     * 個別テキストブロック表示（ID 20）
     * @Route("/block/left_text_block_20", name="block_left_text_block_20", methods={"GET"})
     */
    public function leftTextBlock20(): Response
    {
        return $this->index(20);
    }
     /**
     * 個別テキストブロック表示（ID 21-30）
     */
    public function leftTextBlock21(): Response { return $this->index(21); }
    public function leftTextBlock22(): Response { return $this->index(22); }
    public function leftTextBlock23(): Response { return $this->index(23); }
    public function leftTextBlock24(): Response { return $this->index(24); }
    public function leftTextBlock25(): Response { return $this->index(25); }
    public function leftTextBlock26(): Response { return $this->index(26); }
    public function leftTextBlock27(): Response { return $this->index(27); }
    public function leftTextBlock28(): Response { return $this->index(28); }
    public function leftTextBlock29(): Response { return $this->index(29); }
    public function leftTextBlock30(): Response { return $this->index(30); }

    /**
     * 個別テキストブロック表示（ID 31-40）
     */
    public function leftTextBlock31(): Response { return $this->index(31); }
    public function leftTextBlock32(): Response { return $this->index(32); }
    public function leftTextBlock33(): Response { return $this->index(33); }
    public function leftTextBlock34(): Response { return $this->index(34); }
    public function leftTextBlock35(): Response { return $this->index(35); }
    public function leftTextBlock36(): Response { return $this->index(36); }
    public function leftTextBlock37(): Response { return $this->index(37); }
    public function leftTextBlock38(): Response { return $this->index(38); }
    public function leftTextBlock39(): Response { return $this->index(39); }
    public function leftTextBlock40(): Response { return $this->index(40); }

    /**
     * 個別テキストブロック表示（ID 41-50）
     */
    public function leftTextBlock41(): Response { return $this->index(41); }
    public function leftTextBlock42(): Response { return $this->index(42); }
    public function leftTextBlock43(): Response { return $this->index(43); }
    public function leftTextBlock44(): Response { return $this->index(44); }
    public function leftTextBlock45(): Response { return $this->index(45); }
    public function leftTextBlock46(): Response { return $this->index(46); }
    public function leftTextBlock47(): Response { return $this->index(47); }
    public function leftTextBlock48(): Response { return $this->index(48); }
    public function leftTextBlock49(): Response { return $this->index(49); }
    public function leftTextBlock50(): Response { return $this->index(50); }

    /**
     * 個別テキストブロック表示（ID 41-50）
     */
    public function leftTextBlock51(): Response { return $this->index(51); }
    public function leftTextBlock52(): Response { return $this->index(52); }
    public function leftTextBlock53(): Response { return $this->index(53); }
    public function leftTextBlock54(): Response { return $this->index(54); }
    public function leftTextBlock55(): Response { return $this->index(55); }
    public function leftTextBlock56(): Response { return $this->index(56); }
    public function leftTextBlock57(): Response { return $this->index(57); }
    public function leftTextBlock58(): Response { return $this->index(58); }
    public function leftTextBlock59(): Response { return $this->index(59); }
    public function leftTextBlock60(): Response { return $this->index(60); }


     /**
     * 個別テキストブロック表示（ID 61-70）
     */
    public function leftTextBlock61(): Response { return $this->index(61); }
    public function leftTextBlock62(): Response { return $this->index(62); }
    public function leftTextBlock63(): Response { return $this->index(63); }
    public function leftTextBlock64(): Response { return $this->index(64); }
    public function leftTextBlock65(): Response { return $this->index(65); }
    public function leftTextBlock66(): Response { return $this->index(66); }
    public function leftTextBlock67(): Response { return $this->index(67); }
    public function leftTextBlock68(): Response { return $this->index(68); }
    public function leftTextBlock69(): Response { return $this->index(69); }
    public function leftTextBlock70(): Response { return $this->index(70); }

    /**
     * 個別テキストブロック表示（ID 71-80）
     */
    public function leftTextBlock71(): Response { return $this->index(71); }
    public function leftTextBlock72(): Response { return $this->index(72); }
    public function leftTextBlock73(): Response { return $this->index(73); }
    public function leftTextBlock74(): Response { return $this->index(74); }
    public function leftTextBlock75(): Response { return $this->index(75); }
    public function leftTextBlock76(): Response { return $this->index(76); }
    public function leftTextBlock77(): Response { return $this->index(77); }
    public function leftTextBlock78(): Response { return $this->index(78); }
    public function leftTextBlock79(): Response { return $this->index(79); }
    public function leftTextBlock80(): Response { return $this->index(80); }

    /**
     * 個別テキストブロック表示（ID 81-90）
     */
    public function leftTextBlock81(): Response { return $this->index(81); }
    public function leftTextBlock82(): Response { return $this->index(82); }
    public function leftTextBlock83(): Response { return $this->index(83); }
    public function leftTextBlock84(): Response { return $this->index(84); }
    public function leftTextBlock85(): Response { return $this->index(85); }
    public function leftTextBlock86(): Response { return $this->index(86); }
    public function leftTextBlock87(): Response { return $this->index(87); }
    public function leftTextBlock88(): Response { return $this->index(88); }
    public function leftTextBlock89(): Response { return $this->index(89); }
    public function leftTextBlock90(): Response { return $this->index(90); }
    /**
     * 個別テキストブロック表示（ID 91-100）
     */
    public function leftTextBlock91(): Response { return $this->index(91); }
    public function leftTextBlock92(): Response { return $this->index(92); }
    public function leftTextBlock93(): Response { return $this->index(93); }
    public function leftTextBlock94(): Response { return $this->index(94); }
    public function leftTextBlock95(): Response { return $this->index(95); }
    public function leftTextBlock96(): Response { return $this->index(96); }
    public function leftTextBlock97(): Response { return $this->index(97); }
    public function leftTextBlock98(): Response { return $this->index(98); }
    public function leftTextBlock99(): Response { return $this->index(99); }
    public function leftTextBlock100(): Response { return $this->index(100); }
}