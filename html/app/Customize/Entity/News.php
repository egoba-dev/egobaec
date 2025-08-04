<?php
// customize/Entity/News.php

namespace Customize\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Customize\Repository\NewsRepository")
 * @ORM\Table(name="dtb_news")
 */
class News
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(name="publish_date", type="datetime", nullable=true)
     */
    private $publishDate;

    // --- Getter/Setter ---
    
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
    
    public function getPublishDate(): ?\DateTimeInterface
    {
        return $this->publishDate;
    }
    
    public function setPublishDate(?\DateTimeInterface $publishDate): self
    {
        $this->publishDate = $publishDate;
        return $this;
    }
}