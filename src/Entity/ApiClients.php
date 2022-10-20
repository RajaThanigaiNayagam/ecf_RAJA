<?php

namespace App\Entity;

use App\Repository\ApiClientsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApiClientsRepository::class)
 */
class ApiClients
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $client_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $client_secret;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $client_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $client_mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $active;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $short_description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $full_description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo_url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dpo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $technical_contact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commercial_contact;

    /**
     * @ORM\OneToOne(targetEntity=ApiClientsGrants::class, mappedBy="client_id", cascade={"persist", "remove"})
     */
    private $install_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientId(): ?string
    {
        return $this->client_id;
    }

    public function setClientId(string $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getClientSecret(): ?string
    {
        return $this->client_secret;
    }

    public function setClientSecret(string $client_secret): self
    {
        $this->client_secret = $client_secret;

        return $this;
    }

    public function getClientName(): ?string
    {
        return $this->client_name;
    }

    public function setClientName(string $client_name): self
    {
        $this->client_name = $client_name;

        return $this;
    }

    public function getClientMail(): ?string
    {
        return $this->client_mail;
    }

    public function setClientMail(string $client_mail): self
    {
        $this->client_mail = $client_mail;

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

    public function getShortDescription(): ?string
    {
        return $this->short_description;
    }

    public function setShortDescription(?string $short_description): self
    {
        $this->short_description = $short_description;

        return $this;
    }

    public function getFullDescription(): ?string
    {
        return $this->full_description;
    }

    public function setFullDescription(?string $full_description): self
    {
        $this->full_description = $full_description;

        return $this;
    }

    public function getLogoUrl(): ?string
    {
        return $this->logo_url;
    }

    public function setLogoUrl(string $logo_url): self
    {
        $this->logo_url = $logo_url;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getDpo(): ?string
    {
        return $this->dpo;
    }

    public function setDpo(string $dpo): self
    {
        $this->dpo = $dpo;

        return $this;
    }

    public function getTechnicalContact(): ?string
    {
        return $this->technical_contact;
    }

    public function setTechnicalContact(string $technical_contact): self
    {
        $this->technical_contact = $technical_contact;

        return $this;
    }

    public function getCommercialContact(): ?string
    {
        return $this->commercial_contact;
    }

    public function setCommercialContact(?string $commercial_contact): self
    {
        $this->commercial_contact = $commercial_contact;

        return $this;
    }

    public function getInstallId(): ?ApiClientsGrants
    {
        return $this->install_id;
    }

    public function setInstallId(ApiClientsGrants $install_id): self
    {
        // set the owning side of the relation if necessary
        if ($install_id->getClientId() !== $this) {
            $install_id->setClientId($this);
        }

        $this->install_id = $install_id;

        return $this;
    }
}
