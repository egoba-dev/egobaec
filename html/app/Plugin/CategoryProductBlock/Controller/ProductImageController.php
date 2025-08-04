<?php

namespace Plugin\CategoryProductBlock\Controller;

use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Eccube\Controller\AbstractController;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

/**
 * 商品画像配信コントローラー
 */
class ProductImageController extends AbstractController
{
    /**
     * @Route("/category-product/image/{filename}", name="category_product_image", methods={"GET"})
     */
    public function serveImage(string $filename): Response
    {
        error_log('[CategoryProductBlock][ProductImageController] Image request: ' . $filename);
        
        // セキュリティチェック：ファイル名の検証
        if (!preg_match('/^[a-zA-Z0-9._-]+\.(jpg|jpeg|png|gif|webp|svg)$/i', $filename)) {
            error_log('[CategoryProductBlock][ProductImageController] Invalid filename: ' . $filename);
            throw $this->createNotFoundException('Invalid filename');
        }
        
        $projectDir = $this->getParameter('kernel.project_dir');
        $imagePath = $projectDir . '/html/upload/save_image/' . $filename;
        
        error_log('[CategoryProductBlock][ProductImageController] Looking for image at: ' . $imagePath);
        
        // ファイル存在チェック
        if (!file_exists($imagePath)) {
            error_log('[CategoryProductBlock][ProductImageController] Image not found: ' . $imagePath);
            // 404の代わりにno-imageにリダイレクト
            return $this->redirect($this->generateUrl('category_product_no_image'));
        }
        
        // セキュリティチェック：ディレクトリトラバーサル攻撃防止
        $realPath = realpath($imagePath);
        $allowedPath = realpath($projectDir . '/html/upload/save_image/');
        
        if (strpos($realPath, $allowedPath) !== 0) {
            error_log('[CategoryProductBlock][ProductImageController] Access denied for: ' . $realPath);
            throw $this->createAccessDeniedException('Access denied');
        }
        
        error_log('[CategoryProductBlock][ProductImageController] Serving image: ' . $imagePath);
        
        // 画像ファイルを配信
        $response = new BinaryFileResponse($imagePath);
        
        // Content-Typeの設定
        $mimeType = mime_content_type($imagePath);
        if ($mimeType) {
            $response->headers->set('Content-Type', $mimeType);
        }
        
        // キャッシュ設定
        $response->setPublic();
        $response->setMaxAge(3600); // 1時間キャッシュ
        $response->headers->addCacheControlDirective('must-revalidate', true);
        
        // ファイル名の設定（ダウンロード時用）
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_INLINE,
            $filename
        );
        
        return $response;
    }
    
    /**
     * @Route("/category-product/no-image", name="category_product_no_image", methods={"GET"})
     */
    public function noImage(): Response
    {
        error_log('[CategoryProductBlock][ProductImageController] Serving no-image placeholder');
        
        // デフォルト画像またはSVGプレースホルダーを生成
        $svg = '<?xml version="1.0" encoding="UTF-8"?>
<svg width="300" height="300" xmlns="http://www.w3.org/2000/svg">
  <rect width="100%" height="100%" fill="#f8f9fa"/>
  <text x="50%" y="50%" font-family="Arial, sans-serif" font-size="18" 
        fill="#6c757d" text-anchor="middle" dominant-baseline="middle">
    画像なし
  </text>
</svg>';
        
        $response = new Response($svg);
        $response->headers->set('Content-Type', 'image/svg+xml');
        $response->setPublic();
        $response->setMaxAge(86400); // 24時間キャッシュ
        
        return $response;
    }
}