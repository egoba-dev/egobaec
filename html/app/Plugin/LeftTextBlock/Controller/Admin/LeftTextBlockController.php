<?php

namespace Plugin\LeftTextBlock\Controller\Admin;

use Eccube\Controller\AbstractController;
use Plugin\LeftTextBlock\Entity\LeftTextBlock;
use Plugin\LeftTextBlock\Form\Type\Admin\LeftTextBlockType;
use Plugin\LeftTextBlock\Repository\LeftTextBlockRepository;
use Plugin\LeftTextBlock\Service\LeftTextBlockService; //追加
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

#[Route('/%eccube_admin_route%/left_text_block')]
class LeftTextBlockController extends AbstractController
{
    /**
     * @var LeftTextBlockRepository
     */
    protected $leftTextBlockRepository;
    private $leftTextBlockService;

    public function __construct(
    LeftTextBlockRepository $leftTextBlockRepository,
    LeftTextBlockService $leftTextBlockService  // 追加
    ) {
    $this->leftTextBlockRepository = $leftTextBlockRepository;
    $this->leftTextBlockService = $leftTextBlockService;  // 追加
    }

    #[Route('/', name: 'plugin_left_text_block_admin_index')]
    #[Template('@LeftTextBlock/admin/index.twig')]
    public function index(): array
    {
        $LeftTextBlocks = $this->leftTextBlockRepository->findAllOrderByCreateDate();

        return [
            'LeftTextBlocks' => $LeftTextBlocks,
        ];
    }

    #[Route('/new', name: 'plugin_left_text_block_admin_new')]
    #[Route('/{id}/edit', requirements: ['id' => '\d+'], name: 'plugin_left_text_block_admin_edit')]
    #[Template('@LeftTextBlock/admin/edit.twig')]
    public function edit(Request $request, $id = null): array|Response
    {
        if ($id) {
            $LeftTextBlock = $this->leftTextBlockRepository->find($id);
            if (!$LeftTextBlock) {
                throw $this->createNotFoundException();
            }
        } else {
            $LeftTextBlock = new LeftTextBlock();
            // 新規作成時のデフォルト値設定
            $maxSortNo = $this->leftTextBlockRepository->getMaxSortNo();
            $LeftTextBlock->setSortNo($maxSortNo + 1);
        }

        $form = $this->createForm(LeftTextBlockType::class, $LeftTextBlock);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
        if ($id) {
        // 更新の場合
        $this->leftTextBlockService->updateTextBlock($LeftTextBlock);
        } else {
        // 新規作成の場合
        $this->leftTextBlockService->createTextBlock($LeftTextBlock);
        }

        $this->addSuccess('保存しました。', 'admin');
        return $this->redirectToRoute('plugin_left_text_block_admin_index');
        }

        return [
            'form' => $form->createView(),
            'LeftTextBlock' => $LeftTextBlock,
        ];
    }

    #[Route('/{id}/delete', requirements: ['id' => '\d+'], name: 'plugin_left_text_block_admin_delete', methods: ['DELETE', 'POST'])]
    public function delete(Request $request, $id): Response
   {
    // CSRFトークンの検証
    if (!$this->isCsrfTokenValid('token', $request->request->get('_token'))) {
        throw $this->createAccessDeniedException('CSRF token is invalid.');
    }

    $LeftTextBlock = $this->leftTextBlockRepository->find($id);
    if (!$LeftTextBlock) {
        throw $this->createNotFoundException();
    }

    // サービスを使用して削除
    $this->leftTextBlockService->deleteTextBlock($LeftTextBlock);

    $this->addSuccess('削除しました。', 'admin');
    return $this->redirectToRoute('plugin_left_text_block_admin_index');
    }
    #[Route('/{id}/visible', requirements: ['id' => '\d+'], name: 'plugin_left_text_block_admin_visible', methods: ['PUT', 'POST'])]
    public function visible(Request $request, $id): Response
    {
        // CSRFトークンの検証
        if (!$this->isCsrfTokenValid('token', $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('CSRF token is invalid.');
        }

        $LeftTextBlock = $this->leftTextBlockRepository->find($id);
        if (!$LeftTextBlock) {
            throw $this->createNotFoundException();
        }

        $LeftTextBlock->setVisible(!$LeftTextBlock->getVisible());
        $this->entityManager->flush();

        $status = $LeftTextBlock->getVisible() ? '表示' : '非表示';
        $this->addSuccess($status . 'に変更しました。', 'admin');

        return $this->redirectToRoute('plugin_left_text_block_admin_index');
    }
}