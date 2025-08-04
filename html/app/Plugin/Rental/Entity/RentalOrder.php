<?php
namespace Plugin\Rental\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Entity\AbstractEntity;
use Eccube\Entity\Order;
use Eccube\Entity\ProductClass;
use Eccube\Entity\Customer;
use Eccube\Entity\Product;

/**
 * RentalOrder
 *
 * @ORM\Table(name="plg_rental_order")
 * @ORM\Entity(repositoryClass="Plugin\Rental\Repository\RentalOrderRepository")
 */
class RentalOrder extends AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var Product
     *
     * @ORM\ManyToOne(targetEntity="Eccube\Entity\Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $Product;

    /**
     * @var Order
     *
     * @ORM\ManyToOne(targetEntity="Eccube\Entity\Order")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     * })
     */
    private $Order;

    /**
     * @var ProductClass
     *
     * @ORM\ManyToOne(targetEntity="Eccube\Entity\ProductClass")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_class_id", referencedColumnName="id")
     * })
     */
    private $ProductClass;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rental_start_date", type="datetime")
     */
    private $rental_start_date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rental_end_date", type="datetime")
     */
    private $rental_end_date;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="return_date", type="datetime", nullable=true)
     */
    private $return_date;

    /**
     * @var int
     *
     * @ORM\Column(name="rental_status_id", type="smallint", options={"unsigned":true})
     */
    private $rental_status_id;

    /**
     * @var int
     *
     * @ORM\Column(name="rental_period", type="integer", options={"unsigned":true})
     */
    private $rental_period;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer", options={"unsigned":true})
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=12, scale=2, options={"unsigned":true})
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_method", type="string", length=255, nullable=true)
     */
    private $payment_method;

    /**
     * @var string|null
     *
     * @ORM\Column(name="options_json", type="text", nullable=true)
     */
    private $options_json;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="Eccube\Entity\Customer", inversedBy="RentalOrders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * })
     */
    private $Customer;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name01", type="string", length=255, nullable=true)
     */
    private $name01;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name02", type="string", length=255, nullable=true)
     */
    private $name02;

    /**
     * @var string|null
     *
     * @ORM\Column(name="kana01", type="string", length=255, nullable=true)
     */
    private $kana01;

    /**
     * @var string|null
     *
     * @ORM\Column(name="kana02", type="string", length=255, nullable=true)
     */
    private $kana02;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postal_code", type="string", length=8, nullable=true)
     */
    private $postal_code;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pref", type="string", length=255, nullable=true)
     */
    private $pref;

    /**
     * @var string|null
     *
     * @ORM\Column(name="addr01", type="string", length=255, nullable=true)
     */
    private $addr01;

    /**
     * @var string|null
     *
     * @ORM\Column(name="addr02", type="string", length=255, nullable=true)
     */
    private $addr02;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone_number", type="string", length=14, nullable=true)
     */
    private $phone_number;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_date", type="datetime")
     */
    private $create_date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_date", type="datetime")
     */
    private $update_date;

    // ステータス定数
    const STATUS_RESERVED = 1;  // 予約中
    const STATUS_IN_RENTAL = 2; // レンタル中
    const STATUS_RETURNED = 3;  // 返却済み
    const STATUS_CANCELLED = 4; // キャンセル
    const STATUS_OVERDUE = 5;   // 延滞

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
     * @return RentalOrder
     */
    public function setProduct(Product $Product = null)
    {
        $this->Product = $Product;

        return $this;
    }

    /**
     * Get Order
     *
     * @return Order|null
     */
    public function getOrder()
    {
        return $this->Order;
    }

    /**
     * Set Order
     *
     * @param Order|null $Order
     *
     * @return RentalOrder
     */
    public function setOrder(Order $Order = null)
    {
        $this->Order = $Order;

        return $this;
    }

    /**
     * Get ProductClass
     *
     * @return ProductClass|null
     */
    public function getProductClass()
    {
        return $this->ProductClass;
    }

    /**
     * Set ProductClass
     *
     * @param ProductClass|null $ProductClass
     *
     * @return RentalOrder
     */
    public function setProductClass(ProductClass $ProductClass = null)
    {
        $this->ProductClass = $ProductClass;

        return $this;
    }

    /**
     * Get rental_start_date
     *
     * @return \DateTime
     */
    public function getRentalStartDate()
    {
        return $this->rental_start_date;
    }

    /**
     * Set rental_start_date
     *
     * @param \DateTime $rental_start_date
     *
     * @return RentalOrder
     */
    public function setRentalStartDate($rental_start_date)
    {
        $this->rental_start_date = $rental_start_date;

        return $this;
    }

    /**
     * Get rental_end_date
     *
     * @return \DateTime
     */
    public function getRentalEndDate()
    {
        return $this->rental_end_date;
    }

    /**
     * Set rental_end_date
     *
     * @param \DateTime $rental_end_date
     *
     * @return RentalOrder
     */
    public function setRentalEndDate($rental_end_date)
    {
        $this->rental_end_date = $rental_end_date;

        return $this;
    }

    /**
     * Get return_date
     *
     * @return \DateTime|null
     */
    public function getReturnDate()
    {
        return $this->return_date;
    }

    /**
     * Set return_date
     *
     * @param \DateTime|null $return_date
     *
     * @return RentalOrder
     */
    public function setReturnDate($return_date)
    {
        $this->return_date = $return_date;

        return $this;
    }

    /**
     * Get rental_status_id
     *
     * @return int
     */
    public function getRentalStatusId()
    {
        return $this->rental_status_id;
    }

    /**
     * Set rental_status_id
     *
     * @param int $rental_status_id
     *
     * @return RentalOrder
     */
    public function setRentalStatusId($rental_status_id)
    {
        $this->rental_status_id = $rental_status_id;

        return $this;
    }

    /**
     * Get rental_period
     *
     * @return int
     */
    public function getRentalPeriod()
    {
        return $this->rental_period;
    }

    /**
     * Set rental_period
     *
     * @param int $rental_period
     *
     * @return RentalOrder
     */
    public function setRentalPeriod($rental_period)
    {
        $this->rental_period = $rental_period;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set quantity
     *
     * @param int $quantity
     *
     * @return RentalOrder
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return RentalOrder
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get payment_method
     *
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->payment_method;
    }

    /**
     * Set payment_method
     *
     * @param string $payment_method
     *
     * @return RentalOrder
     */
    public function setPaymentMethod($payment_method)
    {
        $this->payment_method = $payment_method;

        return $this;
    }

    /**
     * Get options_json
     *
     * @return string|null
     */
    public function getOptionsJson()
    {
        return $this->options_json;
    }

    /**
     * Set options_json
     *
     * @param string|null $options_json
     *
     * @return RentalOrder
     */
    public function setOptionsJson($options_json)
    {
        $this->options_json = $options_json;

        return $this;
    }

    /**
     * Get Customer
     *
     * @return Customer|null
     */
    public function getCustomer()
    {
        return $this->Customer;
    }

    /**
     * Set Customer
     *
     * @param Customer|null $Customer
     *
     * @return RentalOrder
     */
    public function setCustomer(Customer $Customer = null)
    {
        $this->Customer = $Customer;

        return $this;
    }

    /**
     * Get create_date
     *
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->create_date;
    }

    /**
     * Set create_date
     *
     * @param \DateTime $create_date
     *
     * @return RentalOrder
     */
    public function setCreateDate($create_date)
    {
        $this->create_date = $create_date;

        return $this;
    }

    /**
     * Get update_date
     *
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->update_date;
    }

    /**
     * Set update_date
     *
     * @param \DateTime $update_date
     *
     * @return RentalOrder
     */
    public function setUpdateDate($update_date)
    {
        $this->update_date = $update_date;

        return $this;
    }

    // 名前関連のゲッターとセッター
    public function getName01()
    {
        return $this->name01;
    }

    public function setName01($name01)
    {
        $this->name01 = $name01;
        return $this;
    }

    public function getName02()
    {
        return $this->name02;
    }

    public function setName02($name02)
    {
        $this->name02 = $name02;
        return $this;
    }

    public function getKana01()
    {
        return $this->kana01;
    }

    public function setKana01($kana01)
    {
        $this->kana01 = $kana01;
        return $this;
    }

    public function getKana02()
    {
        return $this->kana02;
    }

    public function setKana02($kana02)
    {
        $this->kana02 = $kana02;
        return $this;
    }

    // 住所関連のゲッターとセッター
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    public function setPostalCode($postal_code)
    {
        $this->postal_code = $postal_code;
        return $this;
    }

    public function getPref()
    {
        return $this->pref;
    }

    public function setPref($pref)
    {
        $this->pref = $pref;
        return $this;
    }

    public function getAddr01()
    {
        return $this->addr01;
    }

    public function setAddr01($addr01)
    {
        $this->addr01 = $addr01;
        return $this;
    }

    public function getAddr02()
    {
        return $this->addr02;
    }

    public function setAddr02($addr02)
    {
        $this->addr02 = $addr02;
        return $this;
    }

    // 連絡先関連のゲッターとセッター
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Customerから住所情報をコピー
     * 
     * @param Customer $Customer
     * @return RentalOrder
     */
    public function copyAddressFromCustomer(Customer $Customer)
    {
        $this->setName01($Customer->getName01());
        $this->setName02($Customer->getName02());
        $this->setKana01($Customer->getKana01());
        $this->setKana02($Customer->getKana02());
        $this->setPostalCode($Customer->getPostalCode());
        $this->setPref($Customer->getPref());
        $this->setAddr01($Customer->getAddr01());
        $this->setAddr02($Customer->getAddr02());
        $this->setPhoneNumber($Customer->getPhoneNumber());
        $this->setEmail($Customer->getEmail());
        
        return $this;
    }

    /**
     * ステータスの日本語表記を取得
     *
     * @return string
     */
    public function getRentalStatusName()
    {
        switch ($this->rental_status_id) {
            case self::STATUS_RESERVED:
                return '予約中';
            case self::STATUS_IN_RENTAL:
                return 'レンタル中';
            case self::STATUS_RETURNED:
                return '返却済み';
            case self::STATUS_CANCELLED:
                return 'キャンセル';
            case self::STATUS_OVERDUE:
                return '延滞';
            default:
                return '不明';
        }
    }

    /**
     * 延滞かどうかを判定
     *
     * @return bool
     */
    public function isOverdue()
    {
        if ($this->rental_status_id !== self::STATUS_IN_RENTAL) {
            return false;
        }

        if (!$this->rental_end_date) {
            return false;
        }

        $now = new \DateTime();
        return $now > $this->rental_end_date;
    }

    /**
     * レンタル期間の残り日数を取得
     *
     * @return int
     */
    public function getRemainingDays()
    {
        if (!$this->rental_end_date) {
            return 0;
        }

        $now = new \DateTime();
        $interval = $now->diff($this->rental_end_date);
        
        if ($now > $this->rental_end_date) {
            return -1 * $interval->days;
        }

        return $interval->days;
    }
}