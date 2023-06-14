<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $product_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $product_image = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?string $list_price = null;

    #[ORM\Column(nullable: true)]
    private ?int $qty_in_stock = null;

    #[ORM\Column(length: 200)]
    private ?string $part_number = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?string $selling_price = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $product_description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    public function setProductName(string $product_name): static
    {
        $this->product_name = $product_name;

        return $this;
    }

    public function getProductImage(): ?string
    {
        return $this->product_image;
    }

    public function setProductImage(?string $product_image): static
    {
        $this->product_image = $product_image;

        return $this;
    }


    public function getListPrice(): ?string
    {
        return $this->list_price;
    }

    public function setListPrice(?string $list_price): static
    {
        $this->list_price = $list_price;

        return $this;
    }

    public function getQtyInStock(): ?int
    {
        return $this->qty_in_stock;
    }

    public function setQtyInStock(?int $qty_in_stock): static
    {
        $this->qty_in_stock = $qty_in_stock;

        return $this;
    }

    public function getPartNumber(): ?string
    {
        return $this->part_number;
    }

    public function setPartNumber(string $part_number): static
    {
        $this->part_number = $part_number;

        return $this;
    }

    public function getSellingPrice(): ?string
    {
        return $this->selling_price;
    }

    public function setSellingPrice(?string $selling_price): static
    {
        $this->selling_price = $selling_price;

        return $this;
    }

    public function getProductDescription(): ?string
    {
        return $this->product_description;
    }

    public function setProductDescription(?string $product_description): static
    {
        $this->product_description = $product_description;

        return $this;
    }
}
