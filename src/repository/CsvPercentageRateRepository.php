<?php

namespace App\repository;

use App\model\MobileBrand;
use App\model\PercentageRate;
use App\service\csvStorage\CsvStorage;

class CsvPercentageRateRepository implements PercentageRateRepositoryInterface
{
    private CsvStorage $csvStorage;

    public function __construct(CsvStorage $csvStorage)
    {
        $this->csvStorage = $csvStorage;
    }

    function add(MobileBrand $mobileBrand): void
    {
        // TODO: Implement add() method.
    }

    function findOneByMonthCount(int $monthCount): ?PercentageRate
    {
        $percentageRates = $this->csvStorage->findAll([$this, 'hydrate']);

        $filteredResult = array_filter($percentageRates, function (PercentageRate $percentageRate) use ($monthCount) {
            return $percentageRate->getMonthCount() === $monthCount;
        });

        if (count($filteredResult) <= 0) return null;

        return reset($filteredResult);
    }

    function hydrate(array $item): PercentageRate
    {
        return new PercentageRate(
            $item['month_count'],
            $item['percentage'],
            $item['bank_percentage']
        );
    }
}