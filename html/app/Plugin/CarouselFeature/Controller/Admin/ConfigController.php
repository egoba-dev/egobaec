<?php

namespace Plugin\CarouselFeature\Controller\Admin;

use Eccube\Controller\AbstractController;
use Plugin\CarouselFeature\Form\Type\ConfigType;
use Plugin\CarouselFeature\Service\ConfigService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/%eccube_admin_route%/carousel_feature")
 */
class ConfigController extends AbstractController
{
    private $configService;

    public function __construct(ConfigService $configService)
    {
        $this->configService = $configService;
    }

    /**
     * 表示設定
     * 
     * @Route("/config", name="admin_carousel_feature_config", methods={"GET", "POST"})
     * @Template("@CarouselFeature/admin/config.twig")
     */
    public function index(Request $request)
    {
        $config = $this->configService->getConfig();
        $form = $this->createForm(ConfigType::class, $config);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                // フォームデータを配列に変換
                $configData = [
                    'display_count' => $form->get('display_count')->getData(),
                    'auto_play' => $form->get('auto_play')->getData(),
                    'auto_play_interval' => $form->get('auto_play_interval')->getData(),
                    'show_navigation' => $form->get('show_navigation')->getData(),
                    'show_indicators' => $form->get('show_indicators')->getData(),
                    'enable_touch_swipe' => $form->get('enable_touch_swipe')->getData(),
                    'enable_keyboard_nav' => $form->get('enable_keyboard_nav')->getData(),
                    'transition_effect' => $form->get('transition_effect')->getData(),
                    'transition_duration' => $form->get('transition_duration')->getData()
                ];

                $this->configService->updateConfig($configData);
                $this->addSuccess('設定を保存しました。', 'admin');

                return $this->redirectToRoute('admin_carousel_feature_config');

            } catch (\Exception $e) {
                $this->addError('設定の保存に失敗しました: ' . $e->getMessage(), 'admin');
            }
        }

        // 統計情報
        $stats = $this->configService->getConfigStats();

        return [
            'form' => $form->createView(),
            'config' => $config,
            'stats' => $stats
        ];
    }

    /**
     * 設定リセット
     * 
     * @Route("/config/reset", name="admin_carousel_feature_config_reset", methods={"POST"})
     */
    public function reset(Request $request)
    {
        $this->isTokenValid();

        try {
            $this->configService->resetToDefault();
            $this->addSuccess('設定をデフォルトに戻しました。', 'admin');

        } catch (\Exception $e) {
            $this->addError('設定のリセットに失敗しました: ' . $e->getMessage(), 'admin');
        }

        return $this->redirectToRoute('admin_carousel_feature_config');
    }

    /**
     * プレビュー用設定取得（Ajax）
     * 
     * @Route("/config/preview", name="admin_carousel_feature_config_preview", methods={"POST"})
     */
    public function preview(Request $request)
    {
        try {
            $configData = $request->request->all();
            
            // バリデーション
            $errors = $this->configService->validateConfigData($configData);
            if (!empty($errors)) {
                return new JsonResponse(['success' => false, 'errors' => $errors]);
            }

            // JavaScript用設定を生成
            $jsConfig = [
                'displayCount' => (int)$configData['display_count'],
                'autoPlay' => (bool)$configData['auto_play'],
                'autoPlayInterval' => (int)$configData['auto_play_interval'],
                'showNavigation' => (bool)$configData['show_navigation'],
                'showIndicators' => (bool)$configData['show_indicators'],
                'enableTouchSwipe' => (bool)$configData['enable_touch_swipe'],
                'enableKeyboardNav' => (bool)$configData['enable_keyboard_nav'],
                'transitionEffect' => $configData['transition_effect'],
                'transitionDuration' => (int)$configData['transition_duration']
            ];

            return new JsonResponse(['success' => true, 'config' => $jsConfig]);

        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * 設定検証（Ajax）
     * 
     * @Route("/config/validate", name="admin_carousel_feature_config_validate", methods={"POST"})
     */
    public function validate(Request $request)
    {
        try {
            $configData = $request->request->all();
            $errors = $this->configService->validateConfigData($configData);

            if (empty($errors)) {
                return new JsonResponse(['success' => true, 'message' => '設定は有効です。']);
            } else {
                return new JsonResponse(['success' => false, 'errors' => $errors]);
            }

        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}