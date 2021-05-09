<?php

namespace App\repository;

use App\model\ModelDetails;
use App\service\csvStorage\CsvStorage;

class CsvModelDetailsRepository implements ModelDetailsRepositoryInterface
{
    private CsvStorage $csvStorage;

    public function __construct(CsvStorage $csvStorage)
    {
        $this->csvStorage = $csvStorage;
    }

    function add(ModelDetails $modelDetails): void
    {
        // TODO: Implement add() method.
    }

    function findOneByModelId(int $model_id): ?ModelDetails
    {
        $modelDetailsList = $this->csvStorage->findAll([$this, 'hydrate']);

        $filtered_result = array_filter($modelDetailsList, function (ModelDetails $modelDetails) use ($model_id) {
            return $modelDetails->getModelId() === $model_id;
        });

        if (count($filtered_result) <= 0) return null;

        return reset($filtered_result);
    }

    function hydrate(array $item): ModelDetails
    {
        return new ModelDetails(
            $item['id'],
            $item['name'],
            $item['processor'],
            $item['cpu'],
            $item['memory'],
            $item['storage'],
            $item['battery'],
            $item['display'],
            $item['rear_camera'],
            $item['front_camera'],
            $item['model_id'],
        );
    }
}