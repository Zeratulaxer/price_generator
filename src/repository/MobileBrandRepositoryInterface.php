<?php

namespace App\repository;

use App\model\MobileBrand;

interface MobileBrandRepositoryInterface
{
    function add(MobileBrand $mobileBrand): void;

    /**
     * @return MobileBrand[]
     */
    function findAll(): array;
}