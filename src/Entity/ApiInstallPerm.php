<?php

namespace App\Entity;

use App\Repository\ApiInstallPermRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApiInstallPermRepository::class)
 */
class ApiInstallPerm
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
    private $branch_id;

    /**
     * @ORM\ManyToOne(targetEntity=ApiClientsGrants::class, inversedBy="clientid")
     * @ORM\JoinColumn(nullable=false)
     */
    private $install_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $client_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $members_read;

    /**
     * @ORM\Column(type="integer")
     */
    private $members_write;

    /**
     * @ORM\Column(type="integer")
     */
    private $members_add;

    /**
     * @ORM\Column(type="integer")
     */
    private $members_payment_schedules_read;

    /**
     * @ORM\Column(type="integer")
     */
    private $members_statistiques_read;

    /**
     * @ORM\Column(type="integer")
     */
    private $members_subscription_read;

    /**
     * @ORM\Column(type="integer")
     */
    private $payment_schedules_read;

    /**
     * @ORM\Column(type="integer")
     */
    private $payment_schedules_write;

    /**
     * @ORM\Column(type="integer")
     */
    private $payment_day_read;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBranchId(): ?string
    {
        return $this->branch_id;
    }

    public function setBranchId(string $branch_id): self
    {
        $this->branch_id = $branch_id;

        return $this;
    }

    public function getInstallId(): ?ApiClientsGrants
    {
        return $this->install_id;
    }

    public function setInstallId(?ApiClientsGrants $install_id): self
    {
        $this->install_id = $install_id;

        return $this;
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

    public function getMembersRead(): ?int
    {
        return $this->members_read;
    }

    public function setMembersRead(int $members_read): self
    {
        $this->members_read = $members_read;

        return $this;
    }

    public function getMembersWrite(): ?int
    {
        return $this->members_write;
    }

    public function setMembersWrite(int $members_write): self
    {
        $this->members_write = $members_write;

        return $this;
    }

    public function getMembersAdd(): ?int
    {
        return $this->members_add;
    }

    public function setMembersAdd(int $members_add): self
    {
        $this->members_add = $members_add;

        return $this;
    }

    public function getMembersPaymentSchedulesRead(): ?int
    {
        return $this->members_payment_schedules_read;
    }

    public function setMembersPaymentSchedulesRead(int $members_payment_schedules_read): self
    {
        $this->members_payment_schedules_read = $members_payment_schedules_read;

        return $this;
    }

    public function getMembersStatistiquesRead(): ?int
    {
        return $this->members_statistiques_read;
    }

    public function setMembersStatistiquesRead(int $members_statistiques_read): self
    {
        $this->members_statistiques_read = $members_statistiques_read;

        return $this;
    }

    public function getMembersSubscriptionRead(): ?int
    {
        return $this->members_subscription_read;
    }

    public function setMembersSubscriptionRead(int $members_subscription_read): self
    {
        $this->members_subscription_read = $members_subscription_read;

        return $this;
    }

    public function getPaymentSchedulesRead(): ?int
    {
        return $this->payment_schedules_read;
    }

    public function setPaymentSchedulesRead(int $payment_schedules_read): self
    {
        $this->payment_schedules_read = $payment_schedules_read;

        return $this;
    }

    public function getPaymentSchedulesWrite(): ?int
    {
        return $this->payment_schedules_write;
    }

    public function setPaymentSchedulesWrite(int $payment_schedules_write): self
    {
        $this->payment_schedules_write = $payment_schedules_write;

        return $this;
    }

    public function getPaymentDayRead(): ?int
    {
        return $this->payment_day_read;
    }

    public function setPaymentDayRead(int $payment_day_read): self
    {
        $this->payment_day_read = $payment_day_read;

        return $this;
    }
}
