<?php

namespace App\service\creditPriceCalculator;

use App\model\CreditPrice;
use App\model\Money;
use App\repository\PercentageRateRepositoryInterface;
use RuntimeException;

class CreditPriceCalculator
{
    private PercentageRateRepositoryInterface $percentageRateRepository;

    public function __construct(PercentageRateRepositoryInterface $percentageRateRepository)
    {
        $this->percentageRateRepository = $percentageRateRepository;
    }

    function calculate(Money $basePrice, int $monthCount): CreditPrice
    {
        $percentageRate = $this->percentageRateRepository->findOneByMonthCount($monthCount);

        if ($percentageRate === null) throw new RuntimeException("Percentage rate by month count not found.");

        $priceAmount = ($basePrice->getAmount() * ($percentageRate->getPercentage() + 1));

        $price = new Money($priceAmount, $basePrice->getCurrency());

        return new CreditPrice(
            $price,
            $monthCount,
            new Money(($price->getAmount() * ($percentageRate->getBankPercentage() + 1)) / $monthCount, $price->getCurrency())
        );
    }
}