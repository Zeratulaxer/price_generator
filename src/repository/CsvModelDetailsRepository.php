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

    function findOneByModelId(int $modelId): ?ModelDetails
    {
        $modelDetailsList = $this->csvStorage->findAll([$this, 'hydrate']);

        $filteredResult = array_filter($modelDetailsList, function (ModelDetails $modelDetails) use ($modelId) {
            return $modelDetails->getModelId() === $modelId;
        });

        if (count($filteredResult) <= 0) return null;

        return reset($filteredResult);
    }

    function hydrate(array $item): ModelDetails
    {
        return new ModelDetails(
            $item['id'],
            $item['name'],
            $item['cpu_core'],
            $item['cpu_ghz'],
            $item['memory'],
            $item['storage'],
            $item['battery'],
            $item['display_type'],
            $item['display_pix'],
            $item['rear_camera'],
            $item['front_camera'],
            $item['model_id'],
        );
    }
}