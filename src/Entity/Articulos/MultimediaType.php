<?php

namespace App\Entity\Articulos;

use Doctrine\ORM\Mapping as ORM;

/**
 * MultimediaType
 * 
 * @ORM\Table(name="multimedia_type")
 * @ORM\Entity
 */
class MultimediaType
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
     * @var string|null
     *
     * @ORM\Column(name="m_type", type="string", length=80, nullable=true)
     */
    private $mType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMType(): ?string
    {
        return $this->mType;
    }

    public function setMType(?string $mType): self
    {
        $this->mType = $mType;

        return $this;
    }


}
