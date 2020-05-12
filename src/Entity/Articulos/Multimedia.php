<?php

namespace App\Entity\Articulos;
 

use Doctrine\ORM\Mapping as ORM;

/**
 * Multimedia
 *
 * @ORM\Table(name="multimedia", indexes={@ORM\Index(name="id_art", columns={"id_art"}), @ORM\Index(name="id_tipo", columns={"id_tipo"})})
 * @ORM\Entity
 */
class Multimedia
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
     * @var int
     *
     * @ORM\Column(name="id_art", type="integer", nullable=false)
     */
    private $idArt;

    /**
     * @var string
     *
     * @ORM\Column(name="src", type="string", length=2000, nullable=false)
     */
    private $src;

    /**
     * @var bool
     *
     * @ORM\Column(name="home", type="boolean", nullable=false)
     */
    private $home = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $isActive = '0';

    /**
     * @var MultimediaType
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Articulos\MultimediaType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo", referencedColumnName="id")
     * })
     */
    private $idTipo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdArt(): ?int
    {
        return $this->idArt;
    }

    public function setIdArt(int $idArt): self
    {
        $this->idArt = $idArt;

        return $this;
    }

    public function getSrc(): ?string
    {
        return $this->src;
    }

    public function setSrc(string $src): self
    {
        $this->src = $src;

        return $this;
    }

    public function getHome(): ?bool
    {
        return $this->home;
    }

    public function setHome(bool $home): self
    {
        $this->home = $home;

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

    public function getIdTipo()
    {
        return $this->idTipo;
    }

    public function setIdTipo($idTipo): self
    {
        $this->idTipo = $idTipo;

        return $this;
    }


}
