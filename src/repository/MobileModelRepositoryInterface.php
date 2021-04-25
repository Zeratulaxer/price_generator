<?php

namespace App\repository;

use App\model\MobileModel;

interface MobileModelRepositoryInterface
{
    function add(MobileModel $mobileModel): void;

    /**
     * @param int $brand_id
     * @return MobileModel[]
     */
    function findAllByBrandId(int $brand_id): array;
}