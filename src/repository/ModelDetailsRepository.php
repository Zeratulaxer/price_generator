<?php

namespace App\repository;

use App\model\ModelDetails;

class ModelDetailsRepository implements ModelDetailsRepositoryInterface
{
    function add(ModelDetails $modelDetails): void
    {
        // TODO: Implement add() method.
    }

    /**
     * @inheritDoc
     */
    function findOneByModelId(int $model_id): ?ModelDetails
    {
        // TODO: Implement findOneByModelId() method.
    }
}