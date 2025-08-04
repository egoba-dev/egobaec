<?php

namespace Plugin\CategoryProductBlock\Controller\Admin;

use Eccube\Controller\AbstractController;
use Plugin\CategoryProductBlock\Entity\Config;
use Plugin\CategoryProductBlock\Form\Type\Admin\ConfigType;
use Plugin\CategoryProductBlock\Repository\ConfigRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ConfigController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var ConfigRepository
     */
    protected $configRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        ConfigRepository $configRepository
    ) {
        $this->entityManager = $entityManager;
        $this->configRepository = $configRepository;
    }

    /**
     * @Route("/%eccube_admin_route%/category_product_block/config", name="category_product_block_admin_config")
     * @Template("@CategoryProductBlock/admin/config.twig")
     */
    public function index(Request $request)
    {
        try {
            error_log('[CategoryProductBlock][ConfigController] Index start');
            
            $config = $this->configRepository->get();
            if (!$config) {
                $config = new Config();
                $config->setDisplayCount(10);
                $config->setColumnsCount(5);
                $config->setRowsCount(2);
                $config->setShowCategoryTags(true);
                $config->setShowProductListButton(true);
            }
            
            $form = $this->createForm(ConfigType::class, $config);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                // 親クラスの save メソッドを使用
                $this->configRepository->save($config);

                $this->addSuccess('admin.common.save_complete', 'admin');
                
                error_log('[CategoryProductBlock][ConfigController] Config saved successfully');
                
                // @Templateアノテーション使用時はリダイレクトできないため、
                // 成功メッセージを表示してフォームを再表示
            }

            return [
                'form' => $form->createView(),
                'Config' => $config,
            ];
        } catch (\Exception $e) {
            error_log('[CategoryProductBlock][ConfigController] Error: ' . $e->getMessage());
            error_log('[CategoryProductBlock][ConfigController] Stack trace: ' . $e->getTraceAsString());
            
            $this->addError('admin.common.save_error', 'admin');
            
            return [
                'form' => null,
                'Config' => new Config(),
                'error' => $e->getMessage(),
            ];
        }
    }
}