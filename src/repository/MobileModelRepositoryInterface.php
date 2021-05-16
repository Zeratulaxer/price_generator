<?php

namespace App\repository;

use App\model\MobileModel;

interface MobileModelRepositoryInterface
{
    function add(MobileModel $mobileModel): void;

    /**
     * @param int $brandId
     * @return MobileModel[]
     */
    function findAllByBrandId(int $brandId): array;
}