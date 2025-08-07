<?php
// customize/Controller/NewsController.php

namespace Customize\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Customize\Entity\News;

class NewsController extends AbstractController
{
    /**
     * @Route("/news/{id}", name="custom_news_detail", requirements={"id"="\d+"})
    */

    public function detail(int $id, EntityManagerInterface $entityManager): Response
    {
        $news = $entityManager->getRepository(News::class)->find($id);
        if (!$news) {
            throw $this->createNotFoundException('指定されたニュースが存在しません');
        }
        return $this->render('@user_data/custom_news_detail.twig', ['news' => $news]);

    }
}