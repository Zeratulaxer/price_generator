<?php

namespace App\model;

class CreditPrice implements \JsonSerializable
{
    private int $monthCount;

    private Money $price;

    private Money $pricePerMonth;

    public function __construct(Money $price, int $monthCount, Money $pricePerMonth)
    {
        //todo use assert functions
        if ($monthCount === 0) throw new \RuntimeException("Month count should be greater then zero.");

        $this->monthCount = $monthCount;
        $this->price = $price;
        $this->pricePerMonth = $pricePerMonth;
    }

    public function jsonSerialize(): array
    {
        return [
            'monthCount' => $this->getMonthCount(),
            'price' => $this->getPrice(),
            'pricePerMonth' => $this->getPricePerMonth(),
        ];
    }

    public function getMonthCount(): int
    {
        return $this->monthCount;
    }

    public function getPrice(): Money
    {
        return $this->price;
    }

    public function getPricePerMonth(): Money
    {
        return $this->pricePerMonth;
    }
}