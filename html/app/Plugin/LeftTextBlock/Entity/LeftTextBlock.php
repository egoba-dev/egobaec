<?php

namespace Plugin\LeftTextBlock\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="plg_left_text_block")
 * @ORM\Entity(repositoryClass="Plugin\LeftTextBlock\Repository\LeftTextBlockRepository")
 */
class LeftTextBlock
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * @var int|null
     * @ORM\Column(name="font_size", type="integer", nullable=true)
     */
    private $fontSize;

    /**
     * @var string|null
     * @ORM\Column(name="font_family", type="string", length=500, nullable=true)
     */
    private $fontFamily;

    /**
     * @var int
     * @ORM\Column(name="sort_no", type="integer", options={"default":0})
     */
    private $sortNo = 0;

    /**
     * @var bool
     * @ORM\Column(name="visible", type="boolean", options={"default":true})
     */
    private $visible = true;

    /**
     * @var bool
     * @ORM\Column(name="show_content", type="boolean", options={"default":true})
     */
    private $showContent = true;

    /**
     * @var \DateTime|null
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @var \DateTime
     * @ORM\Column(name="create_date", type="datetime")
     */
    private $createDate;

    /**
     * @var \DateTime
     * @ORM\Column(name="update_date", type="datetime")
     */
    private $updateDate;

    public function __construct()
    {
        $this->createDate = new \DateTime();
        $this->updateDate = new \DateTime();
    }

    // Getter/Setter methods

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getFontSize(): ?int
    {
        return $this->fontSize;
    }

    public function setFontSize(?int $fontSize): self
    {
        $this->fontSize = $fontSize;
        return $this;
    }

    public function getFontFamily(): ?string
    {
        return $this->fontFamily;
    }

    public function setFontFamily(?string $fontFamily): self
    {
        $this->fontFamily = $fontFamily;
        return $this;
    }

    public function getSortNo(): int
    {
        return $this->sortNo;
    }

    public function setSortNo(int $sortNo): self
    {
        $this->sortNo = $sortNo;
        return $this;
    }

    public function getVisible(): bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): self
    {
        $this->visible = $visible;
        return $this;
    }

    public function getShowContent(): bool
    {
        return $this->showContent;
    }

    public function setShowContent(bool $showContent): self
    {
        $this->showContent = $showContent;
        return $this;
    }

    public function getDeletedAt(): ?\DateTime
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTime $deletedAt): self
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }

    public function getCreateDate(): \DateTime
    {
        return $this->createDate;
    }

    public function setCreateDate(\DateTime $createDate): self
    {
        $this->createDate = $createDate;
        return $this;
    }

    public function getUpdateDate(): \DateTime
    {
        return $this->updateDate;
    }

    public function setUpdateDate(\DateTime $updateDate): self
    {
        $this->updateDate = $updateDate;
        return $this;
    }

    /**
     * 論理削除されているかチェック
     */
    public function isDeleted(): bool
    {
        return $this->deletedAt !== null;
    }

    /**
     * 論理削除を実行
     */
    public function delete(): self
    {
        $this->deletedAt = new \DateTime();
        return $this;
    }

    /**
     * 論理削除を解除
     */
    public function restore(): self
    {
        $this->deletedAt = null;
        return $this;
    }
}