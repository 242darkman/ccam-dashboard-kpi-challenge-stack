<?php

namespace App\Entity;

use App\Entity\Customer;
use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $orderedAt = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Customer $customer = null;

    #[ORM\Column]
    private ?float $amount = null;

    #[ORM\Column(length: 50)]
    private ?string $order_number = null;

    // #[ORM\OneToMany(mappedBy: 'orders', targetEntity: Delivery::class)]
    // private Collection $deliveries;

    #[ORM\OneToMany(mappedBy: 'orders', targetEntity: ComplaintsAndReturns::class)]
    private Collection $complaintsAndReturns;

    // public function __construct()
    // {
    //     $this->deliveries = new ArrayCollection();
    //     $this->complaintsAndReturns = new ArrayCollection();
    // }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderedAt(): ?\DateTimeImmutable
    {
        return $this->orderedAt;
    }

    public function setOrderedAt(\DateTimeImmutable $orderedAt): static
    {
        $this->orderedAt = $orderedAt;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): static
    {
        $this->customer = $customer;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getOrderNumber(): ?string
    {
        return $this->order_number;
    }

    public function setOrderNumber(string $order_number): static
    {
        $this->order_number = $order_number;

        return $this;
    }

    // /**
    //  * @return Collection<int, Delivery>
    //  */
    // public function getDeliveries(): Collection
    // {
    //     return $this->deliveries;
    // }

    // public function addDelivery(Delivery $delivery): static
    // {
    //     if (!$this->deliveries->contains($delivery)) {
    //         $this->deliveries->add($delivery);
    //         $delivery->setOrders($this);
    //     }

    //     return $this;
    // }

    // public function removeDelivery(Delivery $delivery): static
    // {
    //     if ($this->deliveries->removeElement($delivery)) {
    //         // set the owning side to null (unless already changed)
    //         if ($delivery->getOrders() === $this) {
    //             $delivery->setOrders(null);
    //         }
    //     }

    //     return $this;
    // }

    /**
     * @return Collection<int, ComplaintsAndReturns>
     */
    public function getComplaintsAndReturns(): Collection
    {
        return $this->complaintsAndReturns;
    }

    public function addComplaintsAndReturn(ComplaintsAndReturns $complaintsAndReturn): static
    {
        if (!$this->complaintsAndReturns->contains($complaintsAndReturn)) {
            $this->complaintsAndReturns->add($complaintsAndReturn);
            $complaintsAndReturn->setOrders($this);
        }

        return $this;
    }

    public function removeComplaintsAndReturn(ComplaintsAndReturns $complaintsAndReturn): static
    {
        if ($this->complaintsAndReturns->removeElement($complaintsAndReturn)) {
            // set the owning side to null (unless already changed)
            if ($complaintsAndReturn->getOrders() === $this) {
                $complaintsAndReturn->setOrders(null);
            }
        }

        return $this;
    }
}
