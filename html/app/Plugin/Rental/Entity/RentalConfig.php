<?php
namespace Plugin\Rental\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Entity\AbstractEntity;
// レンタル機能の全体設定を保存するエンティティです。

/**
 * RentalConfig
 *
 * @ORM\Table(name="plg_rental_config")
 * @ORM\Entity(repositoryClass="Plugin\Rental\Repository\RentalConfigRepository")
 */
class RentalConfig extends AbstractEntity
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
     * @var string|null
     *
     * @ORM\Column(name="rental_terms", type="text", nullable=true)
     */
    private $rental_terms;

    /**
     * @var boolean
     *
     * @ORM\Column(name="auto_approval", type="boolean", options={"default":true})
     */
    private $auto_approval = true;

    /**
     * @var int|null
     *
     * @ORM\Column(name="default_max_days", type="integer", nullable=true)
     */
    private $default_max_days;

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
     * Get rental_terms
     *
     * @return string|null
     */
    public function getRentalTerms()
    {
        return $this->rental_terms;
    }

    /**
     * Set rental_terms
     *
     * @param string|null $rental_terms
     *
     * @return RentalConfig
     */
    public function setRentalTerms($rental_terms)
    {
        $this->rental_terms = $rental_terms;

        return $this;
    }

    /**
     * Get auto_approval
     *
     * @return boolean
     */
    public function isAutoApproval()
    {
        return $this->auto_approval;
    }

    /**
     * Set auto_approval
     *
     * @param boolean $auto_approval
     *
     * @return RentalConfig
     */
    public function setAutoApproval($auto_approval)
    {
        $this->auto_approval = $auto_approval;

        return $this;
    }

    /**
     * Get default_max_days
     *
     * @return int|null
     */
    public function getDefaultMaxDays()
    {
        return $this->default_max_days;
    }

    /**
     * Set default_max_days
     *
     * @param int|null $default_max_days
     *
     * @return RentalConfig
     */
    public function setDefaultMaxDays($default_max_days)
    {
        $this->default_max_days = $default_max_days;

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
     * @return RentalConfig
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
     * @return RentalConfig
     */
    public function setUpdateDate($update_date)
    {
        $this->update_date = $update_date;

        return $this;
    }
}