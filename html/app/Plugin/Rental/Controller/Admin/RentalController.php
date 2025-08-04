<?php

namespace Plugin\Rental\Controller\Admin;

use Eccube\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;
use Plugin\Rental\Entity\RentalOrder;
use Plugin\Rental\Form\Type\RentalOrderType;
use Plugin\Rental\Repository\RentalOrderRepository;
use Plugin\Rental\Service\RentalService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
// レンタル管理の主要な管理画面を担当するコントローラーです。

/**
 * レンタル管理コントローラー
 *
 * @Route("/%eccube_admin_route%/rental")
 */
class RentalController extends AbstractController
{
    /**
     * @var RentalOrderRepository
     */
    protected $rentalOrderRepository;

    /**
     * @var RentalService
     */
    protected $rentalService;

    /**
     * コンストラクタ
     *
     * @param RentalOrderRepository $rentalOrderRepository
     * @param RentalService $rentalService
     */
    public function __construct(
        RentalOrderRepository $rentalOrderRepository,
        RentalService $rentalService
    ) {
        $this->rentalOrderRepository = $rentalOrderRepository;
        $this->rentalService = $rentalService;
    }

    /**
     * レンタル中商品一覧
     *
     * @Route("/", name="admin_rental_index")
     * @Template("@Rental/admin/rental_list.twig")
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
        // レンタル中・予約中の一覧を取得
        $qb = $this->rentalOrderRepository->createQueryBuilder('ro')
            ->where('ro.rental_status_id IN (:statuses)')
            ->setParameter('statuses', [1, 2]) // 1:予約中、2:レンタル中
            ->orderBy('ro.rental_end_date', 'ASC');
        
        $pagination = $paginator->paginate(
            $qb,
            $request->get('page', 1),
            $this->eccubeConfig['eccube_default_page_count']
        );

        return [
            'pagination' => $pagination,
        ];
    }

  /**
 * レンタル中商品の詳細・編集
 *
 * @Route("/{id}/edit", requirements={"id" = "\d+"}, name="admin_rental_edit")
 * @Template("@Rental/admin/rental_edit.twig")
 */
public function edit(Request $request, $id)
{
    $RentalOrder = $this->rentalOrderRepository->find($id);
    if (!$RentalOrder) {
        $this->addError('rental.admin.rental.not_found', 'admin');
        return $this->redirectToRoute('admin_rental_index');
    }

    $form = $this->createForm(RentalOrderType::class, $RentalOrder);
    $form->handleRequest($request);

    if ($form->isSubmitted()) {
        if ($form->isValid()) {
            try {
                $RentalOrder->setUpdateDate(new \DateTime());
                
                // 返却処理の場合は返却日時を設定
                if ($RentalOrder->getRentalStatusId() == 3 && !$RentalOrder->getReturnDate()) {
                    $RentalOrder->setReturnDate(new \DateTime());
                }
                
                $this->entityManager->persist($RentalOrder);
                $this->entityManager->flush();

                $this->addSuccess('rental.admin.rental.save_complete', 'admin');
                
                return $this->redirectToRoute('admin_rental_index');
            } catch (\Exception $e) {
                // Symfony の log サービスを経由してログを記録
                if ($this->has('logger')) {
                    $this->get('logger')->error('レンタル注文の更新に失敗', [
                        'error' => $e->getMessage(),
                        'trace' => $e->getTraceAsString()
                    ]);
                }
                
                $this->addError('rental.admin.rental.save_error', 'admin');
            }
        } else {
            // フォームにエラーがある場合は、自動的にテンプレートで表示される
            $this->addError('rental.admin.rental.validation_error', 'admin');
        }
    }

    return [
        'form' => $form->createView(),
        'RentalOrder' => $RentalOrder,
    ];
}

    /**
     * 返却処理
     *
     * @Route("/{id}/return", requirements={"id" = "\d+"}, name="admin_rental_return")
     */
    public function processReturn(Request $request, $id)
    {
        $RentalOrder = $this->rentalOrderRepository->find($id);
        if (!$RentalOrder) {
            $this->addError('rental.admin.rental.not_found', 'admin');
            return $this->redirectToRoute('admin_rental_index');
        }

        try {
            $this->rentalService->processReturn($RentalOrder);
            $this->addSuccess('rental.admin.rental.return_complete', 'admin');
        } catch (\Exception $e) {
            $this->addError('rental.admin.rental.return_error', 'admin');
        }

        return $this->redirectToRoute('admin_rental_index');
    }

    /**
     * キャンセル処理
     *
     * @Route("/{id}/cancel", requirements={"id" = "\d+"}, name="admin_rental_cancel")
     */
    public function cancel(Request $request, $id)
    {
        $RentalOrder = $this->rentalOrderRepository->find($id);
        if (!$RentalOrder) {
            $this->addError('rental.admin.rental.not_found', 'admin');
            return $this->redirectToRoute('admin_rental_index');
        }

        try {
            $this->rentalService->cancelRental($RentalOrder);
            $this->addSuccess('rental.admin.rental.cancel_complete', 'admin');
        } catch (\Exception $e) {
            $this->addError('rental.admin.rental.cancel_error', 'admin');
        }

        return $this->redirectToRoute('admin_rental_index');
    }

    /**
     * レンタル履歴
     *
     * @Route("/history", name="admin_rental_history")
     * @Template("@Rental/admin/rental_history.twig")
     */
    public function history(Request $request, PaginatorInterface $paginator)
    {
        // 返却済み・キャンセルのレンタル履歴を取得
        $qb = $this->rentalOrderRepository->createQueryBuilder('ro')
            ->where('ro.rental_status_id IN (:statuses)')
            ->setParameter('statuses', [3, 5]) // 3:返却済み、5:キャンセル
            ->orderBy('ro.update_date', 'DESC');
        
        $pagination = $paginator->paginate(
            $qb,
            $request->get('page', 1),
            $this->eccubeConfig['eccube_default_page_count']
        );

        return [
            'pagination' => $pagination,
        ];
    }

    /**
     * 延滞レンタル管理
     *
     * @Route("/overdue", name="admin_rental_overdue")
     * @Template("@Rental/admin/rental_overdue.twig")
     */
    public function overdue(Request $request, PaginatorInterface $paginator)
    {
        // 延滞情報を自動更新
        $updatedCount = $this->rentalService->updateOverdueRentals();
        
        if ($updatedCount > 0) {
            $this->addSuccess(sprintf('rental.admin.rental.overdue_updated', $updatedCount), 'admin');
        }
        
        // 延滞中のレンタルを取得
        $qb = $this->rentalOrderRepository->createQueryBuilder('ro')
            ->where('ro.rental_status_id = :status')
            ->setParameter('status', 4) // 4:返却遅延
            ->orderBy('ro.rental_end_date', 'ASC');
        
        $pagination = $paginator->paginate(
            $qb,
            $request->get('page', 1),
            $this->eccubeConfig['eccube_default_page_count']
        );

        return [
            'pagination' => $pagination,
        ];
    }



    /**
 * レンタル注文一覧（検索付き）
 *
 * @Route("/orders", name="admin_rental_orders")
 * @Template("@Rental/admin/order/index.twig")
 */
public function orders(Request $request, PaginatorInterface $paginator)
{
    // 検索フォーム
    $searchForm = $this->createForm(RentalSearchType::class);
    $searchForm->handleRequest($request);

    // クエリビルダの作成
    $qb = $this->rentalOrderRepository->createQueryBuilder('r')
        ->leftJoin('r.Customer', 'c')
        ->leftJoin('r.Product', 'p');

    // 検索条件が入力されている場合
    if ($searchForm->isSubmitted() && $searchForm->isValid()) {
        $searchData = $searchForm->getData();

        // 予約番号
        if (!empty($searchData['id'])) {
            $qb->andWhere('r.id = :id')
                ->setParameter('id', $searchData['id']);
        }

        // 商品名
        if (!empty($searchData['product_name'])) {
            $qb->andWhere('p.name LIKE :product_name')
                ->setParameter('product_name', '%' . $searchData['product_name'] . '%');
        }

        // 顧客名
        if (!empty($searchData['customer_name'])) {
            $qb->andWhere('CONCAT(c.name01, c.name02) LIKE :customer_name')
                ->setParameter('customer_name', '%' . $searchData['customer_name'] . '%');
        }

        // ステータス
        if (!empty($searchData['rental_status_id']) && count($searchData['rental_status_id']) > 0) {
            $qb->andWhere($qb->expr()->in('r.rental_status_id', ':status'))
                ->setParameter('status', $searchData['rental_status_id']);
        }

        // 期間（From）
        if (!empty($searchData['start_date_from'])) {
            $qb->andWhere('r.rental_start_date >= :start_date_from')
                ->setParameter('start_date_from', $searchData['start_date_from']);
        }

        // 期間（To）
        if (!empty($searchData['start_date_to'])) {
            $qb->andWhere('r.rental_start_date <= :start_date_to')
                ->setParameter('start_date_to', $searchData['start_date_to']);
        }
    }

    // ソート順
    $qb->orderBy('r.update_date', 'DESC');

    // ページネーション
    $pagination = $paginator->paginate(
        $qb,
        $request->get('page', 1),
        $this->eccubeConfig['eccube_default_page_count']
    );

    return [
        'pagination' => $pagination,
        'searchForm' => $searchForm->createView(),
    ];
}

/**
 * レンタル注文ステータス更新
 *
 * @Route("/{id}/status/{status}", requirements={"id" = "\d+", "status" = "\d+"}, name="admin_rental_status", methods={"PUT"})
 */
public function updateStatus(Request $request, $id, $status)
{
    $this->isTokenValid();
    
    $RentalOrder = $this->rentalOrderRepository->find($id);
    if (!$RentalOrder) {
        $this->addError('rental.admin.rental.not_found', 'admin');
        return $this->redirectToRoute('admin_rental_orders');
    }
    
    // ステータスを更新
    $RentalOrder->setRentalStatusId($status);
    $RentalOrder->setUpdateDate(new \DateTime());
    
    // 返却済みステータスに変更する場合は返却日時も設定
    if ($status == 3 && !$RentalOrder->getReturnDate()) { // 3:返却済み
        $RentalOrder->setReturnDate(new \DateTime());
    }
    
    $this->entityManager->persist($RentalOrder);
    $this->entityManager->flush();
    
    $this->addSuccess('rental.admin.rental.status_updated', 'admin');
    
    return $this->redirectToRoute('admin_rental_orders');
}
}