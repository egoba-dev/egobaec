<?php
namespace Plugin\Rental\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Entity\AbstractEntity;
use Eccube\Entity\Product;
// 商品のレンタル設定情報を保存するエンティティです。


/**
 * RentalProduct
 *
 * @ORM\Table(name="plg_rental_product")
 * @ORM\Entity(repositoryClass="Plugin\Rental\Repository\RentalProductRepository")
 */
class RentalProduct extends AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var Product
     *
     * @ORM\OneToOne(targetEntity="Eccube\Entity\Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $Product;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rental_flg", type="boolean", options={"default":false})
     */
    private $rental_flg = false;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rental_price_daily", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $rental_price_daily;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rental_price_weekly", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $rental_price_weekly;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rental_price_monthly", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $rental_price_monthly;

    /**
     * @var int|null
     *
     * @ORM\Column(name="rental_max_days", type="integer", nullable=true)
     */
    private $rental_max_days;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param int $id
     *
     * @return RentalProduct
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get Product
     *
     * @return Product|null
     */
    public function getProduct()
    {
        return $this->Product;
    }

    /**
     * Set Product
     *
     * @param Product|null $Product
     *
     * @return RentalProduct
     */
    public function setProduct(Product $Product = null)
    {
        $this->Product = $Product;

        return $this;
    }

    /**
     * Get rental_flg
     *
     * @return boolean
     */
    public function isRentalFlg()
    {
        return $this->rental_flg;
    }

    /**
     * Set rental_flg
     *
     * @param boolean $rental_flg
     *
     * @return RentalProduct
     */
    public function setRentalFlg($rental_flg)
    {
        $this->rental_flg = $rental_flg;

        return $this;
    }

    /**
     * Get rental_price_daily
     *
     * @return string|null
     */
    public function getRentalPriceDaily()
    {
        return $this->rental_price_daily;
    }

    /**
     * Set rental_price_daily
     *
     * @param string|null $rental_price_daily
     *
     * @return RentalProduct
     */
    public function setRentalPriceDaily($rental_price_daily)
    {
        $this->rental_price_daily = $rental_price_daily;

        return $this;
    }

    /**
     * Get rental_price_weekly
     *
     * @return string|null
     */
    public function getRentalPriceWeekly()
    {
        return $this->rental_price_weekly;
    }

    /**
     * Set rental_price_weekly
     *
     * @param string|null $rental_price_weekly
     *
     * @return RentalProduct
     */
    public function setRentalPriceWeekly($rental_price_weekly)
    {
        $this->rental_price_weekly = $rental_price_weekly;

        return $this;
    }

    /**
     * Get rental_price_monthly
     *
     * @return string|null
     */
    public function getRentalPriceMonthly()
    {
        return $this->rental_price_monthly;
    }

    /**
     * Set rental_price_monthly
     *
     * @param string|null $rental_price_monthly
     *
     * @return RentalProduct
     */
    public function setRentalPriceMonthly($rental_price_monthly)
    {
        $this->rental_price_monthly = $rental_price_monthly;

        return $this;
    }

    /**
     * Get rental_max_days
     *
     * @return int|null
     */
    public function getRentalMaxDays()
    {
        return $this->rental_max_days;
    }

    /**
     * Set rental_max_days
     *
     * @param int|null $rental_max_days
     *
     * @return RentalProduct
     */
    public function setRentalMaxDays($rental_max_days)
    {
        $this->rental_max_days = $rental_max_days;

        return $this;
    }
}