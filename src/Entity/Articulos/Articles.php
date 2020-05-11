<?php

namespace App\Entity\Articulos;

use Doctrine\ORM\Mapping as ORM;

/**
 * Articles
 * 
 * @ORM\Table(name="articles", indexes={@ORM\Index(name="id_cat", columns={"id_cat"})})
 * @ORM\Entity
 */
class Articles
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="art_title", type="string", length=80, nullable=false)
     */
    private $artTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="art_desc", type="string", length=400, nullable=false)
     */
    private $artDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="art_evalu", type="string", length=5, nullable=false, options={"fixed"=true})
     */
    private $artEvalu;

    /**
     * @var int
     *
     * @ORM\Column(name="visited_cnt", type="integer", nullable=false)
     */
    private $visitedCnt = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="visited_at", type="datetime", nullable=false)
     */
    private $visitedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_at", type="datetime", nullable=false)
     */
    private $createAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $isActive = '0';

    /**
     * @var \Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cat", referencedColumnName="id")
     * })
     */
    private $idCat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtTitle(): ?string
    {
        return $this->artTitle;
    }

    public function setArtTitle(string $artTitle): self
    {
        $this->artTitle = $artTitle;

        return $this;
    }

    public function getArtDesc(): ?string
    {
        return $this->artDesc;
    }

    public function setArtDesc(string $artDesc): self
    {
        $this->artDesc = $artDesc;

        return $this;
    }

    public function getArtEvalu(): ?string
    {
        return $this->artEvalu;
    }

    public function setArtEvalu(string $artEvalu): self
    {
        $this->artEvalu = $artEvalu;

        return $this;
    }

    public function getVisitedCnt(): ?int
    {
        return $this->visitedCnt;
    }

    public function setVisitedCnt(int $visitedCnt): self
    {
        $this->visitedCnt = $visitedCnt;

        return $this;
    }

    public function getVisitedAt(): ?\DateTimeInterface
    {
        return $this->visitedAt;
    }

    public function setVisitedAt(\DateTimeInterface $visitedAt): self
    {
        $this->visitedAt = $visitedAt;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeInterface $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getIdCat(): ?Categories
    {
        return $this->idCat;
    }

    public function setIdCat(?Categories $idCat): self
    {
        $this->idCat = $idCat;

        return $this;
    }


}
