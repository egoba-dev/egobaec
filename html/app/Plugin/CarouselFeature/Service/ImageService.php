<?php

namespace Plugin\CarouselFeature\Service;

use Plugin\CarouselFeature\Entity\CarouselImage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Filesystem\Filesystem;

class ImageService
{
    private $kernel;
    private $filesystem;
    private $uploadDir;
    private $webDir;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
        $this->filesystem = new Filesystem();
        
        // EC-CUBEの標準的な画像保存先（正しいパス）
        $projectDir = $kernel->getProjectDir(); // /var/www/html
        
        // パスの修正：html/htmlではなく、html/upload
        $this->webDir = $projectDir; // /var/www/html
        $this->uploadDir = $projectDir . '/upload/save_image/carousel_feature'; // 正しいパス
        
        error_log('ImageService: Project dir: ' . $projectDir);
        error_log('ImageService: Web dir: ' . $this->webDir);
        error_log('ImageService: Upload dir: ' . $this->uploadDir);
        
        // アップロードディレクトリが存在しない場合は作成
        if (!$this->filesystem->exists($this->uploadDir)) {
            $this->filesystem->mkdir($this->uploadDir, 0755);
            error_log('ImageService: Created upload directory: ' . $this->uploadDir);
        }
    }

    /**
     * 画像をアップロード
     */
    public function uploadImage(UploadedFile $uploadedFile, CarouselImage $carouselImage)
    {
        error_log('ImageService: uploadImage called for file: ' . $uploadedFile->getClientOriginalName());
        
        // ファイル検証（一時ファイルが有効な間に行う）
        $this->validateImage($uploadedFile);
        error_log('ImageService: File validation passed');

        // ファイル情報を先に取得（一時ファイルが有効な間に）
        $originalName = $uploadedFile->getClientOriginalName();
        $fileSize = $uploadedFile->getSize();
        $mimeType = $uploadedFile->getMimeType();
        
        error_log('ImageService: File info - Name: ' . $originalName . ', Size: ' . $fileSize . ', MIME: ' . $mimeType);

        // ユニークなファイル名を生成
        $fileName = $this->generateUniqueFileName($uploadedFile);
        error_log('ImageService: Generated filename: ' . $fileName);
        
        // ファイルを移動（この時点で一時ファイルは移動される）
        $uploadedFile->move($this->uploadDir, $fileName);
        error_log('ImageService: File moved to: ' . $this->uploadDir . '/' . $fileName);
        
        // 移動後のファイルパス
        $finalPath = $this->uploadDir . '/' . $fileName;
        
        // 画像情報を取得（移動後のファイルから）
        $imageInfo = getimagesize($finalPath);
        if (!$imageInfo) {
            error_log('ImageService: Failed to get image info for: ' . $finalPath);
            throw new \Exception('画像ファイルの情報を取得できませんでした。');
        }
        
        error_log('ImageService: Image dimensions: ' . $imageInfo[0] . 'x' . $imageInfo[1]);
        
        // エンティティに情報を設定（save_image形式のパスで保存）
        $carouselImage->setFileName('carousel_feature/' . $fileName);
        $carouselImage->setOriginalName($originalName);
        $carouselImage->setFileSize($fileSize);
        $carouselImage->setWidth($imageInfo[0]);
        $carouselImage->setHeight($imageInfo[1]);
        
        error_log('ImageService: Entity data set - fileName: ' . $carouselImage->getFileName());

        // WebP変換を試行
        $this->convertToWebP($finalPath, $carouselImage);

        error_log('ImageService: uploadImage completed successfully');
        return $carouselImage;
    }

    /**
     * 画像ファイルを削除
     */
    public function deleteImageFile(CarouselImage $carouselImage)
    {
        // 元画像を削除
        if ($carouselImage->getFileName()) {
            $filePath = $this->webDir . '/upload/save_image/' . $carouselImage->getFileName();
            if ($this->filesystem->exists($filePath)) {
                $this->filesystem->remove($filePath);
            }
        }

        // WebP画像を削除
        if ($carouselImage->getWebpFileName()) {
            $webpPath = $this->webDir . '/upload/save_image/' . $carouselImage->getWebpFileName();
            if ($this->filesystem->exists($webpPath)) {
                $this->filesystem->remove($webpPath);
            }
        }
    }

    /**
     * サムネイル画像を生成
     */
    public function generateThumbnail($fileName, $width = 300, $height = 200)
    {
        $originalPath = $this->webDir . '/upload/save_image/' . $fileName;
        
        if (!$this->filesystem->exists($originalPath)) {
            return null;
        }

        $imageInfo = getimagesize($originalPath);
        if (!$imageInfo) {
            return null;
        }

        // サムネイル用ディレクトリ
        $thumbnailDir = $this->uploadDir . '/thumbnails';
        if (!$this->filesystem->exists($thumbnailDir)) {
            $this->filesystem->mkdir($thumbnailDir, 0755);
        }

        $baseName = pathinfo($fileName, PATHINFO_FILENAME);
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $thumbnailFileName = sprintf('thumb_%dx%d_%s.%s', $width, $height, $baseName, $extension);
        $thumbnailPath = $thumbnailDir . '/' . $thumbnailFileName;

        // 既に存在する場合はスキップ
        if ($this->filesystem->exists($thumbnailPath)) {
            return 'carousel_feature/thumbnails/' . $thumbnailFileName;
        }

        // 画像を作成
        $sourceImage = $this->createImageFromFile($originalPath, $imageInfo[2]);
        if (!$sourceImage) {
            return null;
        }

        // リサイズ
        $thumbnailImage = imagecreatetruecolor($width, $height);
        
        // 透明度を保持
        if ($imageInfo[2] === IMAGETYPE_PNG) {
            imagealphablending($thumbnailImage, false);
            imagesavealpha($thumbnailImage, true);
            $transparent = imagecolorallocatealpha($thumbnailImage, 0, 0, 0, 127);
            imagefill($thumbnailImage, 0, 0, $transparent);
        }

        imagecopyresampled(
            $thumbnailImage,
            $sourceImage,
            0, 0, 0, 0,
            $width, $height,
            $imageInfo[0], $imageInfo[1]
        );

        // 保存
        $this->saveImage($thumbnailImage, $thumbnailPath, $imageInfo[2]);
        
        imagedestroy($sourceImage);
        imagedestroy($thumbnailImage);

        return 'carousel_feature/thumbnails/' . $thumbnailFileName;
    }

    /**
     * 画像を検証
     */
    private function validateImage(UploadedFile $file)
    {
        // アップロードエラーチェック
        if ($file->getError() !== UPLOAD_ERR_OK) {
            $errorMessages = [
                UPLOAD_ERR_INI_SIZE => 'ファイルサイズが大きすぎます（php.iniの設定を超えています）。',
                UPLOAD_ERR_FORM_SIZE => 'ファイルサイズが大きすぎます（フォームの設定を超えています）。',
                UPLOAD_ERR_PARTIAL => 'ファイルの一部のみがアップロードされました。',
                UPLOAD_ERR_NO_FILE => 'ファイルがアップロードされませんでした。',
                UPLOAD_ERR_NO_TMP_DIR => '一時ディレクトリがありません。',
                UPLOAD_ERR_CANT_WRITE => 'ディスクへの書き込みに失敗しました。',
                UPLOAD_ERR_EXTENSION => 'PHPの拡張機能によってアップロードが停止されました。',
            ];
            
            $errorMessage = $errorMessages[$file->getError()] ?? 'ファイルのアップロードでエラーが発生しました。';
            throw new \Exception($errorMessage);
        }

        // ファイルサイズチェック (10MB) - getSize()を安全に呼び出し
        try {
            $fileSize = $file->getSize();
            if ($fileSize === false || $fileSize > 10 * 1024 * 1024) {
                throw new \Exception('ファイルサイズが大きすぎます（最大10MB）。');
            }
        } catch (\Exception $e) {
            error_log('ImageService: File size check failed: ' . $e->getMessage());
            throw new \Exception('ファイルサイズの確認でエラーが発生しました。');
        }

        // MIME タイプチェック
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array($file->getMimeType(), $allowedMimeTypes)) {
            throw new \Exception('サポートされていないファイル形式です。JPEG、PNG、GIF、WebPのみ対応しています。');
        }

        // 拡張子チェック
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $extension = strtolower($file->getClientOriginalExtension());
        if (!in_array($extension, $allowedExtensions)) {
            throw new \Exception('サポートされていないファイル拡張子です。');
        }
    }

    /**
     * ユニークなファイル名を生成
     */
    private function generateUniqueFileName(UploadedFile $file)
    {
        $extension = $file->getClientOriginalExtension();
        $baseName = 'carousel_' . date('YmdHis') . '_' . uniqid();
        
        do {
            $fileName = $baseName . '.' . $extension;
            $filePath = $this->uploadDir . '/' . $fileName;
        } while ($this->filesystem->exists($filePath));

        return $fileName;
    }

    /**
     * WebP形式に変換
     */
    private function convertToWebP($imagePath, CarouselImage $carouselImage)
    {
        if (!function_exists('imagewebp')) {
            error_log('ImageService: WebP conversion not available');
            return false;
        }

        $imageInfo = getimagesize($imagePath);
        if (!$imageInfo) {
            return false;
        }

        $sourceImage = $this->createImageFromFile($imagePath, $imageInfo[2]);
        if (!$sourceImage) {
            return false;
        }

        $baseName = pathinfo($carouselImage->getFileName(), PATHINFO_FILENAME);
        $webpFileName = 'carousel_feature/' . $baseName . '.webp';
        $webpPath = $this->webDir . '/upload/save_image/' . $webpFileName;

        if (imagewebp($sourceImage, $webpPath, 80)) {
            $carouselImage->setWebpFileName($webpFileName);
            imagedestroy($sourceImage);
            error_log('ImageService: WebP conversion successful: ' . $webpFileName);
            return true;
        }

        imagedestroy($sourceImage);
        error_log('ImageService: WebP conversion failed');
        return false;
    }

    /**
     * ファイルから画像リソースを作成
     */
    private function createImageFromFile($filePath, $imageType)
    {
        switch ($imageType) {
            case IMAGETYPE_JPEG:
                return imagecreatefromjpeg($filePath);
            case IMAGETYPE_PNG:
                return imagecreatefrompng($filePath);
            case IMAGETYPE_GIF:
                return imagecreatefromgif($filePath);
            case IMAGETYPE_WEBP:
                if (function_exists('imagecreatefromwebp')) {
                    return imagecreatefromwebp($filePath);
                }
                break;
        }
        return false;
    }

    /**
     * 画像を保存
     */
    private function saveImage($image, $filePath, $imageType)
    {
        switch ($imageType) {
            case IMAGETYPE_JPEG:
                return imagejpeg($image, $filePath, 85);
            case IMAGETYPE_PNG:
                return imagepng($image, $filePath, 8);
            case IMAGETYPE_GIF:
                return imagegif($image, $filePath);
            case IMAGETYPE_WEBP:
                if (function_exists('imagewebp')) {
                    return imagewebp($image, $filePath, 80);
                }
                break;
        }
        return false;
    }
}