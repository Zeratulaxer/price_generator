<?php

namespace App\repository;

use App\model\ModelDetails;

interface ModelDetailsRepositoryInterface
{
    function add(ModelDetails $modelDetails): void;

    /**
     * @param int $modelId
     * @return ?ModelDetails
     */
    function findOneByModelId(int $modelId): ?ModelDetails;
}