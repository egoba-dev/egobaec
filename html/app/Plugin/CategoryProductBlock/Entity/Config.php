<?php

namespace Plugin\CategoryProductBlock\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="plg_category_product_block_config")
 * @ORM\Entity(repositoryClass="Plugin\CategoryProductBlock\Repository\ConfigRepository")
 */
class Config
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="display_count", type="integer", nullable=false, options={"default":10})
     */
    private $display_count = 10;

    /**
     * @ORM\Column(name="columns_count", type="integer", nullable=false, options={"default":5})
     */
    private $columns_count = 5;

    /**
     * @ORM\Column(name="rows_count", type="integer", nullable=false, options={"default":2})
     */
    private $rows_count = 2;

    /**
     * @ORM\Column(name="show_category_tags", type="boolean", nullable=false, options={"default":true})
     */
    private $show_category_tags = true;

    /**
     * @ORM\Column(name="show_product_list_button", type="boolean", nullable=false, options={"default":true})
     */
    private $show_product_list_button = true;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDisplayCount(): int
    {
        return $this->display_count;
    }

    public function setDisplayCount(int $display_count): self
    {
        $this->display_count = $display_count;
        return $this;
    }

    public function getColumnsCount(): int
    {
        return $this->columns_count;
    }

    public function setColumnsCount(int $columns_count): self
    {
        $this->columns_count = $columns_count;
        return $this;
    }

    // フォーム用のエイリアス
    public function getColumns(): int
    {
        return $this->getColumnsCount();
    }

    public function setColumns(int $columns): self
    {
        return $this->setColumnsCount($columns);
    }

    public function getRowsCount(): int
    {
        return $this->rows_count;
    }

    public function setRowsCount(int $rows_count): self
    {
        $this->rows_count = $rows_count;
        return $this;
    }

    // フォーム用のエイリアス
    public function getRows(): int
    {
        return $this->getRowsCount();
    }

    public function setRows(int $rows): self
    {
        return $this->setRowsCount($rows);
    }

    public function getShowCategoryTags(): bool
    {
        return $this->show_category_tags;
    }

    public function setShowCategoryTags(bool $show_category_tags): self
    {
        $this->show_category_tags = $show_category_tags;
        return $this;
    }

    public function getShowProductListButton(): bool
    {
        return $this->show_product_list_button;
    }

    public function setShowProductListButton(bool $show_product_list_button): self
    {
        $this->show_product_list_button = $show_product_list_button;
        return $this;
    }
}