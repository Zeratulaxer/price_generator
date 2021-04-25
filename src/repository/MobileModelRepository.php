<?php

namespace App\repository;

use App\model\MobileModel;

class MobileModelRepository implements MobileModelRepositoryInterface
{

    function add(MobileModel $mobileModel): void
    {
        // TODO: Implement add() method.
    }

    /**
     * @inheritDoc
     */
    function findAllByBrandId(int $brand_id): array
    {
        // TODO: Implement findAllByBrandId() method.
    }
}