<?php

namespace App\repository;

use App\model\ModelDetails;

interface ModelDetailsRepositoryInterface
{
    function add(ModelDetails $modelDetails): void;

    /**
     * @param int $model_id
     * @return ?ModelDetails
     */
    function findOneByModelId(int $model_id): ?ModelDetails;
}