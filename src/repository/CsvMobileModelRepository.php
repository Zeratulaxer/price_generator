<?php

namespace App\repository;

use App\model\MobileModel;
use App\model\Money;
use App\service\creditPriceCalculator\CreditPriceCalculator;
use App\service\csvStorage\CsvStorage;

class CsvMobileModelRepository implements MobileModelRepositoryInterface
{
    private CsvStorage $csvStorage;

    private CreditPriceCalculator $creditPriceCalculator;

    public function __construct(CsvStorage $csvStorage, CreditPriceCalculator $creditPriceCalculator)
    {
        $this->csvStorage = $csvStorage;
        $this->creditPriceCalculator = $creditPriceCalculator;
    }

    function add(MobileModel $mobileModel): void
    {
        // TODO: Implement add() method.
    }

    /**
     * @inheritDoc
     */
    function findAllByBrandId(int $brand_id): array
    {
        $mobileModels = $this->csvStorage->findAll([$this, 'hydrate']);

        $filtered_result = array_filter($mobileModels, function (MobileModel $mobileModel) use ($brand_id) {
            return $mobileModel->getBrandId() === $brand_id;
        });

        return array_values($filtered_result);
    }

    function hydrate(array $item): ?MobileModel
    {
        $basePrice = new Money((float)$item['price_amount'], $item['price_currency']);

        return new MobileModel(
            $item['id'],
            $item['name'],
            $item['brand_id'],
            $basePrice,
            $this->creditPriceCalculator->calculate($basePrice, 12),
            $this->creditPriceCalculator->calculate($basePrice, 24),
            $this->creditPriceCalculator->calculate($basePrice, 36),
        );
    }
}