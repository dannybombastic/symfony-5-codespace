<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserProfile
 *
 * @ORM\Table(name="user_profile", indexes={@ORM\Index(name="user_role", columns={"user_role"})})
 * @ORM\Entity
 */
class UserProfile
{
    /**
     * @var string
     *
     * @ORM\Column(name="user_dni", type="string", length=24, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userDni;

    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string", length=24, nullable=false)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="user_addr", type="string", length=60, nullable=false)
     */
    private $userAddr;

    /**
     * @var string
     *
     * @ORM\Column(name="user_email", type="string", length=60, nullable=false)
     */
    private $userEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="user_password", type="string", length=150, nullable=false)
     */
    private $userPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=0, nullable=false)
     */
    private $gender;

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
     * @var \UserRoles
     *
     * @ORM\ManyToOne(targetEntity="UserRoles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_role", referencedColumnName="id")
     * })
     */
    private $userRole;

    public function getUserDni(): ?string
    {
        return $this->userDni;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getUserAddr(): ?string
    {
        return $this->userAddr;
    }

    public function setUserAddr(string $userAddr): self
    {
        $this->userAddr = $userAddr;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    public function setUserEmail(string $userEmail): self
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    public function getUserPassword(): ?string
    {
        return $this->userPassword;
    }

    public function setUserPassword(string $userPassword): self
    {
        $this->userPassword = $userPassword;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

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

    public function getUserRole(): ?UserRoles
    {
        return $this->userRole;
    }

    public function setUserRole(?UserRoles $userRole): self
    {
        $this->userRole = $userRole;

        return $this;
    }


}
