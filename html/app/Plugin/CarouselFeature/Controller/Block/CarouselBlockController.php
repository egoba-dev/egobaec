<?php

namespace Plugin\CarouselFeature\Controller\Block;

use Eccube\Controller\AbstractController;
use Plugin\CarouselFeature\Service\CarouselService;
use Plugin\CarouselFeature\Service\ConfigService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * カルーセルブロックコントローラー
 */
class CarouselBlockController extends AbstractController
{
    private $carouselService;
    private $configService;

    public function __construct(
        CarouselService $carouselService,
        ConfigService $configService
    ) {
        $this->carouselService = $carouselService;
        $this->configService = $configService;
    }

    /**
     * カルーセルブロック表示（デバッグ版）
     * 
     * @Route("/block/carousel_feature", name="block_carousel_feature", methods={"GET"})
     */
    public function index(Request $request): Response
{
    try {
        error_log('CarouselBlockController: index() called');
        
        // 設定を取得
        $config = $this->configService->getConfig();
        error_log('CarouselBlockController: Config loaded - displayCount: ' . $config->getDisplayCount());
        
        // 公開中の記事を取得
        $carousels = $this->carouselService->getPublishedCarousels($config->getDisplayCount());
        error_log('CarouselBlockController: Found ' . count($carousels) . ' published carousels');
        
        // JavaScript用設定
        $jsConfig = $this->configService->toJsConfig();
        error_log('CarouselBlockController: JS Config prepared');

        return $this->render('@CarouselFeature/Block/carousel_feature.twig', [
            'carousels' => $carousels,
            'config' => $config,
            'jsConfig' => $jsConfig
        ]);
        
    } catch (\Exception $e) {
        // エラーログを出力
        error_log('CarouselBlockController error: ' . $e->getMessage());
        error_log('CarouselBlockController error trace: ' . $e->getTraceAsString());
        
        // エラー時は空のレスポンスを返す
        return new Response('<!-- CarouselFeature Error: ' . $e->getMessage() . ' -->');
    }
}
}