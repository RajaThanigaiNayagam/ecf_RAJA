<?php

namespace App\Entity;

use App\Repository\ApiClientsGrantsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApiClientsGrantsRepository::class)
 */
class ApiClientsGrants
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=ApiClients::class, inversedBy="install_id", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $client_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $install_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $active;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $perms;

    /**
     * @ORM\Column(type="integer")
     */
    private $branch_id;

    /**
     * @ORM\OneToMany(targetEntity=ApiInstallPerm::class, mappedBy="install_id", orphanRemoval=true)
     */
    private $clientid;

    public function __construct()
    {
        $this->clientid = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientId(): ?ApiClients
    {
        return $this->client_id;
    }

    public function setClientId(ApiClients $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getInstallId(): ?int
    {
        return $this->install_id;
    }

    public function setInstallId(int $install_id): self
    {
        $this->install_id = $install_id;

        return $this;
    }

    public function getActive(): ?string
    {
        return $this->active;
    }

    public function setActive(string $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getPerms(): ?string
    {
        return $this->perms;
    }

    public function setPerms(string $perms): self
    {
        $this->perms = $perms;

        return $this;
    }

    public function getBranchId(): ?int
    {
        return $this->branch_id;
    }

    public function setBranchId(int $branch_id): self
    {
        $this->branch_id = $branch_id;

        return $this;
    }

    public function addClientid(ApiInstallPerm $clientid): self
    {
        if (!$this->clientid->contains($clientid)) {
            $this->clientid[] = $clientid;
            $clientid->setInstallId($this);
        }

        return $this;
    }

    public function removeClientid(ApiInstallPerm $clientid): self
    {
        if ($this->clientid->removeElement($clientid)) {
            // set the owning side to null (unless already changed)
            if ($clientid->getInstallId() === $this) {
                $clientid->setInstallId(null);
            }
        }

        return $this;
    }
}
