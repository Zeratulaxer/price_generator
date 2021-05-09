<?php

namespace App\repository;

use App\model\MobileBrand;
use App\model\PercentageRate;

class PercentageRateRepository implements PercentageRateRepositoryInterface
{
    function add(MobileBrand $mobileBrand): void
    {
        // TODO: Implement add() method.
    }

    function findOneByMonthCount(int $monthCount): PercentageRate
    {
        // TODO: Implement findOneByMonthCount() method.
    }
}