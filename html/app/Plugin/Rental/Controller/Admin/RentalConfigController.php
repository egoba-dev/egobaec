<?php

namespace Plugin\Rental\Controller\Admin;

use Eccube\Controller\AbstractController;
use Plugin\Rental\Form\Type\RentalConfigType;
use Plugin\Rental\Repository\RentalConfigRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
// レンタル機能の設定画面を担当するコントローラーです。
/**
 * レンタル設定コントローラー
 *
 * @Route("/%eccube_admin_route%/rental/config")
 */
class RentalConfigController extends AbstractController
{
    /**
     * @var RentalConfigRepository
     */
    protected $rentalConfigRepository;

    /**
     * コンストラクタ
     *
     * @param RentalConfigRepository $rentalConfigRepository
     */
    public function __construct(
        RentalConfigRepository $rentalConfigRepository
    ) {
        $this->rentalConfigRepository = $rentalConfigRepository;
    }

    /**
     * レンタル設定
     *
     * @Route("/", name="admin_rental_config")
     * @Template("@Rental/admin/config.twig")
     */
    public function index(Request $request)
    {
        // 設定を取得（ない場合は作成）
        $Config = $this->rentalConfigRepository->getOrCreate();
        
        $form = $this->createForm(RentalConfigType::class, $Config);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $Config->setUpdateDate(new \DateTime());
            
            $this->entityManager->persist($Config);
            $this->entityManager->flush();
            
            $this->addSuccess('rental.admin.config.save_complete', 'admin');
            
            return $this->redirectToRoute('admin_rental_config');
        }
        
        return [
            'form' => $form->createView(),
        ];
    }
}