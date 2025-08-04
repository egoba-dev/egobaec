<?php

namespace Plugin\CarouselFeature\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Eccube\Entity\AbstractEntity;
use Eccube\Entity\Product;

/**
 * @ORM\Table(name="dtb_carousel_feature")
 * @ORM\Entity(repositoryClass="Plugin\CarouselFeature\Repository\CarouselFeatureRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class CarouselFeature extends AbstractEntity
{
    const STATUS_DRAFT = 'draft';
    const STATUS_PUBLISHED = 'published';
    const STATUS_INACTIVE = 'inactive';

    const LINK_TYPE_NONE = 'none';
    const LINK_TYPE_PRODUCT = 'product';
    const LINK_TYPE_EXTERNAL = 'external';
    const LINK_TYPE_INTERNAL = 'internal';

    /**
     * @var int
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string|null
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * @var string
     * @ORM\Column(name="status", type="string", length=20, options={"default":"draft"})
     */
    private $status = self::STATUS_DRAFT;

    /**
     * @var int
     * @ORM\Column(name="sort_no", type="integer", options={"default":0})
     */
    private $sort_no = 0;

    /**
     * @var string
     * @ORM\Column(name="link_type", type="string", length=20, options={"default":"none"})
     */
    private $link_type = self::LINK_TYPE_NONE;

    /**
     * @var string|null
     * @ORM\Column(name="link_url", type="string", length=1024, nullable=true)
     */
    private $link_url;

    /**
     * @var string|null
     * @ORM\Column(name="link_text", type="string", length=255, nullable=true)
     */
    private $link_text;

    /**
     * @var Product|null
     * @ORM\ManyToOne(targetEntity="Eccube\Entity\Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $Product;

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
     * @var Collection|CarouselImage[]
     * @ORM\OneToMany(targetEntity="Plugin\CarouselFeature\Entity\CarouselImage", mappedBy="CarouselFeature", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\OrderBy({"sort_no" = "ASC"})
     */
    private $CarouselImages;

    public function __construct()
    {
        $this->CarouselImages = new ArrayCollection();
    }

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

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
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

    public function getLinkType()
    {
        return $this->link_type;
    }

    public function setLinkType($link_type)
    {
        $this->link_type = $link_type;
        return $this;
    }

    public function getLinkUrl()
    {
        return $this->link_url;
    }

    public function setLinkUrl($link_url)
    {
        $this->link_url = $link_url;
        return $this;
    }

    public function getLinkText()
    {
        return $this->link_text;
    }

    public function setLinkText($link_text)
    {
        $this->link_text = $link_text;
        return $this;
    }

    public function getProduct()
    {
        return $this->Product;
    }

    public function setProduct(Product $Product = null)
    {
        $this->Product = $Product;
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

    public function getCarouselImages()
    {
        return $this->CarouselImages;
    }

    public function addCarouselImage(CarouselImage $carouselImage)
    {
        $this->CarouselImages[] = $carouselImage;
        $carouselImage->setCarouselFeature($this);
        return $this;
    }

    public function removeCarouselImage(CarouselImage $carouselImage)
    {
        $this->CarouselImages->removeElement($carouselImage);
        return $this;
    }

    /**
     * 有効な画像を取得
     */
    public function getValidImages()
    {
        return $this->CarouselImages->filter(function(CarouselImage $image) {
            return $image->getFileName() && file_exists($image->getFullPath());
        });
    }

    /**
     * リンクURLを取得（商品の場合は自動生成）
     */
    public function getResolvedLinkUrl()
    {
        if ($this->link_type === self::LINK_TYPE_PRODUCT && $this->Product) {
            return '/products/detail/' . $this->Product->getId();
        }
        return $this->link_url;
    }

    /**
     * リンクテキストを取得（商品の場合は商品名）
     */
    public function getResolvedLinkText()
    {
        if ($this->link_type === self::LINK_TYPE_PRODUCT && $this->Product) {
            return $this->link_text ?: $this->Product->getName();
        }
        return $this->link_text;
    }

    /**
     * 公開状態かチェック
     */
    public function isPublished()
    {
        return $this->status === self::STATUS_PUBLISHED;
    }

    /**
     * リンクが有効かチェック
     */
    public function hasValidLink()
    {
        if ($this->link_type === self::LINK_TYPE_NONE) {
            return false;
        }
        if ($this->link_type === self::LINK_TYPE_PRODUCT) {
            return $this->Product && $this->Product->getStatus()->getId() === 1; // 公開中
        }
        return !empty($this->link_url);
    }

    /**
     * ステータス一覧を取得
     */
    public static function getStatusChoices()
    {
        return [
            '下書き' => self::STATUS_DRAFT,
            '公開' => self::STATUS_PUBLISHED,
            '非公開' => self::STATUS_INACTIVE,
        ];
    }

    /**
     * リンクタイプ一覧を取得
     */
    public static function getLinkTypeChoices()
    {
        return [
            'リンクなし' => self::LINK_TYPE_NONE,
            '商品ページ' => self::LINK_TYPE_PRODUCT,
            '外部URL' => self::LINK_TYPE_EXTERNAL,
            '内部ページ' => self::LINK_TYPE_INTERNAL,
        ];
    }
}