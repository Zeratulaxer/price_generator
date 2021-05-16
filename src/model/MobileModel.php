<?php

namespace App\model;

class MobileModel implements \JsonSerializable
{
    private int $id;
    private string $name;
    private int $brandId;
    private Money $price;
    private CreditPrice $creditPrice12;
    private CreditPrice $creditPrice24;
    private CreditPrice $creditPrice36;

    public function __construct(
        int $id,
        string $name,
        int $brandId,
        Money $price,
        CreditPrice $creditPrice12,
        CreditPrice $creditPrice24,
        CreditPrice $creditPrice36
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->brandId = $brandId;
        $this->price = $price;
        $this->creditPrice12 = $creditPrice12;
        $this->creditPrice24 = $creditPrice24;
        $this->creditPrice36 = $creditPrice36;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'brandId' => $this->getBrandId(),
            'price' => $this->getPrice(),
            'creditPrice12' => $this->getCreditPrice12(),
            'creditPrice24' => $this->getCreditPrice24(),
            'creditPrice36' => $this->getCreditPrice36()
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBrandId(): int
    {
        return $this->brandId;
    }

    public function getPrice(): Money
    {
        return $this->price;
    }

    public function getCreditPrice12(): CreditPrice
    {
        return $this->creditPrice12;
    }

    public function getCreditPrice24(): CreditPrice
    {
        return $this->creditPrice24;
    }

    public function getCreditPrice36(): CreditPrice
    {
        return $this->creditPrice36;
    }
}