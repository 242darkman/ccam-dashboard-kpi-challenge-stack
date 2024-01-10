<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer extends User
{
    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }


    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 20)]
    private ?string $customer_number = null;

    #[ORM\OneToMany(targetEntity: Order::class, mappedBy: "customer")]
    private $orders;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCustomerNumber(): ?string
    {
        return $this->customer_number;
    }

    public function setCustomerNumber(string $customer_number): static
    {
        $this->customer_number = $customer_number;

        return $this;
    }

    /**
     * Get the value of orders
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    /**
     * Set the value of orders
     *
     * @return
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;

        return $this;
    }
}
