<?php

namespace Plugin\CarouselFeature\Controller\Admin;

use Eccube\Controller\AbstractController;
use Plugin\CarouselFeature\Entity\CarouselFeature;
use Plugin\CarouselFeature\Form\Type\CarouselListType;
use Plugin\CarouselFeature\Service\CarouselService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/%eccube_admin_route%/carousel_feature")
 */
class CarouselListController extends AbstractController
{
    private $carouselService;

    public function __construct(CarouselService $carouselService)
    {
        $this->carouselService = $carouselService;
    }

    /**
     * 記事一覧
     * 
     * @Route("/", name="admin_carousel_feature_list", methods={"GET", "POST"})
     * @Template("@CarouselFeature/admin/carousel_list.twig")
     */
    public function index(Request $request)
    {
        $searchForm = $this->createForm(CarouselListType::class);
        $searchForm->handleRequest($request);

        // 検索パラメータ取得
        $searchParams = [];
        if ($searchForm->isSubmitted() && $searchForm->isValid()) {
            $data = $searchForm->getData();
            $searchParams = array_filter($data, function($value) {
                return $value !== null && $value !== '';
            });
        }

        // 記事一覧取得
        $carousels = $this->carouselService->getCarouselsForAdmin($searchParams);

        // 統計情報取得
        $statistics = $this->carouselService->getStatistics();

        return [
            'searchForm' => $searchForm->createView(),
            'carousels' => $carousels,
            'statistics' => $statistics,
            'searchParams' => $searchParams
        ];
    }

    /**
     * ソート順更新（Ajax）
     * 
     * @Route("/sort", name="admin_carousel_feature_sort", methods={"POST"})
     */
    public function updateSort(Request $request)
    {
        $this->isTokenValid();

        try {
            $sortData = $request->request->get('sort_data', []);
            
            if (empty($sortData)) {
                return new JsonResponse(['success' => false, 'message' => 'ソートデータが空です。']);
            }

            $this->carouselService->updateSortOrder($sortData);

            return new JsonResponse(['success' => true, 'message' => 'ソート順を更新しました。']);

        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'message' => 'ソート順の更新に失敗しました: ' . $e->getMessage()]);
        }
    }

    /**
     * 一括ステータス更新（Ajax）
     * 
     * @Route("/bulk-status", name="admin_carousel_feature_bulk_status", methods={"POST"})
     */
    public function bulkUpdateStatus(Request $request)
    {
        $this->isTokenValid();

        try {
            $ids = $request->request->get('ids', []);
            $status = $request->request->get('status');

            if (empty($ids)) {
                return new JsonResponse(['success' => false, 'message' => '選択された記事がありません。']);
            }

            $validStatuses = [
                CarouselFeature::STATUS_DRAFT,
                CarouselFeature::STATUS_PUBLISHED,
                CarouselFeature::STATUS_INACTIVE
            ];

            if (!in_array($status, $validStatuses)) {
                return new JsonResponse(['success' => false, 'message' => '無効なステータスです。']);
            }

            $updatedCount = $this->carouselService->updateMultipleStatus($ids, $status);

            return new JsonResponse([
                'success' => true, 
                'message' => sprintf('%d件の記事のステータスを更新しました。', $updatedCount)
            ]);

        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'message' => 'ステータスの更新に失敗しました: ' . $e->getMessage()]);
        }
    }

    /**
     * 一括削除（Ajax）
     * 
     * @Route("/bulk-delete", name="admin_carousel_feature_bulk_delete", methods={"POST"})
     */
    public function bulkDelete(Request $request)
    {
        $this->isTokenValid();

        try {
            $ids = $request->request->get('ids', []);

            if (empty($ids)) {
                return new JsonResponse(['success' => false, 'message' => '選択された記事がありません。']);
            }

            $repository = $this->getDoctrine()->getRepository(CarouselFeature::class);
            $deletedCount = 0;

            foreach ($ids as $id) {
                $carousel = $repository->find($id);
                if ($carousel) {
                    $this->carouselService->deleteCarousel($carousel);
                    $deletedCount++;
                }
            }

            return new JsonResponse([
                'success' => true, 
                'message' => sprintf('%d件の記事を削除しました。', $deletedCount)
            ]);

        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'message' => '記事の削除に失敗しました: ' . $e->getMessage()]);
        }
    }

    /**
     * 記事詳細（Ajax）
     * 
     * @Route("/{id}/detail", name="admin_carousel_feature_detail", methods={"GET"}, requirements={"id" = "\d+"})
     */
    public function detail(CarouselFeature $carousel)
    {
        return new JsonResponse([
            'success' => true,
            'data' => [
                'id' => $carousel->getId(),
                'title' => $carousel->getTitle(),
                'content' => $carousel->getContent(),
                'status' => $carousel->getStatus(),
                'link_type' => $carousel->getLinkType(),
                'link_url' => $carousel->getResolvedLinkUrl(),
                'link_text' => $carousel->getResolvedLinkText(),
                'product_name' => $carousel->getProduct() ? $carousel->getProduct()->getName() : null,
                'image_count' => $carousel->getValidImages()->count(),
                'created_at' => $carousel->getCreateDate()->format('Y-m-d H:i:s'),
                'updated_at' => $carousel->getUpdateDate()->format('Y-m-d H:i:s')
            ]
        ]);
    }

    /**
     * CSVエクスポート
     * 
     * @Route("/export", name="admin_carousel_feature_export", methods={"POST"})
     */
    public function export(Request $request)
    {
        $this->isTokenValid();

        try {
            $searchParams = $request->request->get('search_params', []);
            $carousels = $this->carouselService->getCarouselsForAdmin($searchParams);

            $csvData = [];
            $csvData[] = [
                'ID',
                'タイトル',
                'ステータス',
                'リンクタイプ',
                'リンクURL',
                'リンクテキスト',
                '商品名',
                '画像数',
                '作成日',
                '更新日'
            ];

            foreach ($carousels as $carousel) {
                $csvData[] = [
                    $carousel->getId(),
                    $carousel->getTitle(),
                    $this->getStatusLabel($carousel->getStatus()),
                    $this->getLinkTypeLabel($carousel->getLinkType()),
                    $carousel->getResolvedLinkUrl(),
                    $carousel->getResolvedLinkText(),
                    $carousel->getProduct() ? $carousel->getProduct()->getName() : '',
                    $carousel->getValidImages()->count(),
                    $carousel->getCreateDate()->format('Y-m-d H:i:s'),
                    $carousel->getUpdateDate()->format('Y-m-d H:i:s')
                ];
            }

            $response = $this->renderView('@CarouselFeature/admin/export.csv.twig', [
                'data' => $csvData
            ]);

            $filename = 'carousel_features_' . date('YmdHis') . '.csv';

            return new \Symfony\Component\HttpFoundation\Response(
                $response,
                200,
                [
                    'Content-Type' => 'text/csv; charset=UTF-8',
                    'Content-Disposition' => sprintf('attachment; filename="%s"', $filename)
                ]
            );

        } catch (\Exception $e) {
            $this->addError('CSVエクスポートに失敗しました: ' . $e->getMessage(), 'admin');
            return $this->redirectToRoute('admin_carousel_feature_list');
        }
    }

    /**
     * ステータスラベル取得
     */
    private function getStatusLabel($status)
    {
        $labels = [
            CarouselFeature::STATUS_DRAFT => '下書き',
            CarouselFeature::STATUS_PUBLISHED => '公開',
            CarouselFeature::STATUS_INACTIVE => '非公開'
        ];

        return $labels[$status] ?? $status;
    }

    /**
     * リンクタイプラベル取得
     */
    private function getLinkTypeLabel($linkType)
    {
        $labels = [
            CarouselFeature::LINK_TYPE_NONE => 'リンクなし',
            CarouselFeature::LINK_TYPE_PRODUCT => '商品ページ',
            CarouselFeature::LINK_TYPE_EXTERNAL => '外部URL',
            CarouselFeature::LINK_TYPE_INTERNAL => '内部ページ'
        ];

        return $labels[$linkType] ?? $linkType;
    }
}