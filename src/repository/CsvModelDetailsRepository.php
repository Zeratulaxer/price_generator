<?php

namespace App\repository;

use App\model\ModelDetails;
use RuntimeException;

class CsvModelDetailsRepository implements ModelDetailsRepositoryInterface
{
    private const FILENAME = 'model_details.csv';
    private const SEPARATOR = ';';

    function add(ModelDetails $modelDetails): void
    {
        // TODO: Implement add() method.
    }

    function findOneByModelId(int $model_id): ?ModelDetails
    {
        $handle = fopen($this->getFilename(), 'r');

        if ($handle === false) throw new RuntimeException('File not found or do not open');

        $headers = fgetcsv($handle, 0, self::SEPARATOR);

        $modelDetailsList = [];

        while ($row = fgetcsv($handle, 0, self::SEPARATOR)) {
            $modelDetailsList[] = $this->hydrate(array_combine($headers, $row));
        }

        $filtered_result = array_filter($modelDetailsList, function (ModelDetails $modelDetails) use ($model_id) {
            return $modelDetails->getModelId() === $model_id;
        });

        if (count($filtered_result) <= 0) return null;

        return reset($filtered_result);
    }

    private function getFilename(): string
    {
        return __DIR__ . "/../../storage/" . self::FILENAME;
    }

    private function hydrate(array $item): ModelDetails
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