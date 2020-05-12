<?php

namespace App\Entity;

 
use App\Entity\Articulos\Articles;
use App\Entity\User\UserProfile;
use Doctrine\ORM\Mapping as ORM;
 

/**
 * Comments
 *
 * @ORM\Table(name="comments", indexes={@ORM\Index(name="id_art", columns={"id_art"}), @ORM\Index(name="id_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Comments
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
     * @ORM\Column(name="art_comment", type="string", length=250, nullable=false)
     */
    private $artComment;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $isActive = '0';

    /**
     *  
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Articulos\Articles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_art", referencedColumnName="id")
     * })
     */
    private $idArt = null;

    /**
     *  
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User\UserProfile")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="user_dni")
     * })
     */
    private $idUser = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtComment(): ?string
    {
        return $this->artComment;
    }

    public function setArtComment(string $artComment): self
    {
        $this->artComment = $artComment;

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

    public function getIdArt()
    {
        return $this->idArt;
    }

    public function setIdArt($idArt): self
    {
        $this->idArt = $idArt;

        return $this;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setIdUser(?UserProfile $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }


}
