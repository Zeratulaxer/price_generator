<?php

namespace App\repository;

use App\model\MobileBrand;
use App\model\PercentageRate;

interface PercentageRateRepositoryInterface
{
    function add(MobileBrand $mobileBrand): void;

    function findOneByMonthCount(int $monthCount): PercentageRate;
}