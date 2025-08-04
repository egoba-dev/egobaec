<?php

namespace Plugin\CarouselFeature\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Entity\AbstractEntity;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Table(name="dtb_carousel_image")
 * @ORM\Entity(repositoryClass="Plugin\CarouselFeature\Repository\CarouselImageRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class CarouselImage extends AbstractEntity
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var CarouselFeature
     * @ORM\ManyToOne(targetEntity="Plugin\CarouselFeature\Entity\CarouselFeature", inversedBy="CarouselImages")
     * @ORM\JoinColumn(name="carousel_feature_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $CarouselFeature;

    /**
     * @var string|null
     * @ORM\Column(name="file_name", type="string", length=255, nullable=true)
     */
    private $file_name;

    /**
     * @var string|null
     * @ORM\Column(name="original_name", type="string", length=255, nullable=true)
     */
    private $original_name;

    /**
     * @var string|null
     * @ORM\Column(name="alt_text", type="string", length=255, nullable=true)
     */
    private $alt_text;

    /**
     * @var int
     * @ORM\Column(name="sort_no", type="integer", options={"default":0})
     */
    private $sort_no = 0;

    /**
     * @var string|null
     * @ORM\Column(name="webp_file_name", type="string", length=255, nullable=true)
     */
    private $webp_file_name;

    /**
     * @var int|null
     * @ORM\Column(name="file_size", type="integer", nullable=true)
     */
    private $file_size;

    /**
     * @var int|null
     * @ORM\Column(name="width", type="integer", nullable=true)
     */
    private $width;

    /**
     * @var int|null
     * @ORM\Column(name="height", type="integer", nullable=true)
     */
    private $height;

    /**
     * @var \DateTime
     * @ORM\Column(name="create_date", type="datetime")
     */
    private $create_date;

    /**
     * @var \DateTime
     * @ORM\Column(name="update_date", type="datetime")
     */
    private $update_date;

    /**
     * アップロードされたファイル（一時的）
     * @var File|null
     */
    private $uploadedFile;

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $now = new \DateTime();
        $this->create_date = $now;
        $this->update_date = $now;
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->update_date = new \DateTime();
    }

    // Getters and Setters

    public function getId()
    {
        return $this->id;
    }

    public function getCarouselFeature()
    {
        return $this->CarouselFeature;
    }

    public function setCarouselFeature(CarouselFeature $carouselFeature = null)
    {
        $this->CarouselFeature = $carouselFeature;
        return $this;
    }

    public function getFileName()
    {
        return $this->file_name;
    }

    public function setFileName($file_name)
    {
        $this->file_name = $file_name;
        return $this;
    }

    public function getOriginalName()
    {
        return $this->original_name;
    }

    public function setOriginalName($original_name)
    {
        $this->original_name = $original_name;
        return $this;
    }

    public function getAltText()
    {
        return $this->alt_text;
    }

    public function setAltText($alt_text)
    {
        $this->alt_text = $alt_text;
        return $this;
    }

    public function getSortNo()
    {
        return $this->sort_no;
    }

    public function setSortNo($sort_no)
    {
        $this->sort_no = $sort_no;
        return $this;
    }

    public function getWebpFileName()
    {
        return $this->webp_file_name;
    }

    public function setWebpFileName($webp_file_name)
    {
        $this->webp_file_name = $webp_file_name;
        return $this;
    }

    public function getFileSize()
    {
        return $this->file_size;
    }

    public function setFileSize($file_size)
    {
        $this->file_size = $file_size;
        return $this;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    public function getCreateDate()
    {
        return $this->create_date;
    }

    public function setCreateDate($create_date)
    {
        $this->create_date = $create_date;
        return $this;
    }

    public function getUpdateDate()
    {
        return $this->update_date;
    }

    public function setUpdateDate($update_date)
    {
        $this->update_date = $update_date;
        return $this;
    }

    public function getUploadedFile()
    {
        return $this->uploadedFile;
    }

    public function setUploadedFile(File $uploadedFile = null)
    {
        $this->uploadedFile = $uploadedFile;
        return $this;
    }

    /**
     * 画像ファイルのフルパスを取得（save_image形式）
     */
    public function getFullPath()
    {
        if (!$this->file_name) {
            return null;
        }
        
        $projectDir = realpath(__DIR__ . '/../../../../');
        return $projectDir . '/upload/save_image/' . $this->file_name;
    }

    /**
     * WebP画像ファイルのフルパスを取得
     */
    public function getWebpFullPath()
    {
        if (!$this->webp_file_name) {
            return null;
        }
        
        $projectDir = realpath(__DIR__ . '/../../../../');
        return $projectDir . '/upload/save_image/' . $this->webp_file_name;
    }

    /**
     * 表示用URL（WebP優先）を取得
     * EC-CUBEのasset関数で使用するため、save_image用のパスを返す
     */
    public function getDisplayPath()
    {
        // WebPファイルがあり、ブラウザがサポートしていればWebPを返す
        if ($this->webp_file_name && $this->isWebpSupported()) {
            return $this->webp_file_name;
        }
        
        return $this->file_name;
    }

    /**
     * 通常画像のパスを取得（asset関数で使用）
     * 修正: file_nameがディレクトリを含む場合とそうでない場合を処理
     */
    public function getImagePath()
    {
        if (!$this->file_name) {
            return null;
        }
        
        // ファイル名にディレクトリが含まれているかチェック
        if (strpos($this->file_name, '/') !== false) {
            // 既にパスが含まれている場合はそのまま返す
            return $this->file_name;
        } else {
            // ファイル名のみの場合はcarousel_featureディレクトリを追加
            return 'carousel_feature/' . $this->file_name;
        }
    }

    /**
     * 直接画像URLを取得（デバッグ用）
     */
    public function getDirectImageUrl()
    {
        if (!$this->file_name) {
            return null;
        }
        
        // 直接のパスを返す
        return '/upload/save_image/' . $this->file_name;
    }

    /**
     * テンプレート用：画像パスを取得（getImagePathのエイリアス）
     */
    public function imagePath()
    {
        return $this->getImagePath();
    }

    /**
     * WebP画像のパスを取得（asset関数で使用）
     */
    public function getWebpPath()
    {
        if (!$this->webp_file_name) {
            return null;
        }
        
        // WebPファイル名にディレクトリが含まれているかチェック
        if (strpos($this->webp_file_name, '/') !== false) {
            return $this->webp_file_name;
        } else {
            return 'carousel_feature/' . $this->webp_file_name;
        }
    }

    /**
     * サムネイルパスを取得
     */
    public function getThumbnailPath($width = 300, $height = 200)
    {
        if (!$this->file_name) {
            return null;
        }
        
        $baseName = pathinfo($this->file_name, PATHINFO_FILENAME);
        $extension = pathinfo($this->file_name, PATHINFO_EXTENSION);
        return 'carousel_feature/thumbnails/thumb_' . $width . 'x' . $height . '_' . $baseName . '.' . $extension;
    }

    /**
     * ファイルの拡張子を取得
     */
    public function getExtension()
    {
        if (!$this->file_name) {
            return null;
        }
        return pathinfo($this->file_name, PATHINFO_EXTENSION);
    }

    /**
     * 画像の比率を取得
     */
    public function getAspectRatio()
    {
        if (!$this->width || !$this->height) {
            return null;
        }
        return $this->width / $this->height;
    }

    /**
     * WebPサポートチェック（簡易版）
     */
    private function isWebpSupported()
    {
        // 実際の実装では、ブラウザのAcceptヘッダーやJavaScriptでの判定が必要
        // ここでは簡易的にWebPファイルが存在するかをチェック
        return $this->webp_file_name && file_exists($this->getWebpFullPath());
    }

    /**
     * 適切なaltテキストを取得
     */
    public function getResolvedAltText()
    {
        if ($this->alt_text) {
            return $this->alt_text;
        }
        if ($this->CarouselFeature) {
            return $this->CarouselFeature->getTitle();
        }
        return 'カルーセル画像';
    }

    /**
     * ファイルサイズを人間が読める形式で取得
     */
    public function getFormattedFileSize()
    {
        if (!$this->file_size) {
            return null;
        }

        $units = ['B', 'KB', 'MB', 'GB'];
        $size = $this->file_size;
        $unitIndex = 0;

        while ($size >= 1024 && $unitIndex < count($units) - 1) {
            $size /= 1024;
            $unitIndex++;
        }

        return round($size, 2) . ' ' . $units[$unitIndex];
    }

    /**
     * 画像が有効かチェック
     */
    public function isValid()
    {
        return $this->file_name && file_exists($this->getFullPath());
    }
}