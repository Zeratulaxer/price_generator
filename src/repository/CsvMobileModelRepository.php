<?php

namespace App\repository;

use App\model\MobileModel;
use RuntimeException;

class CsvMobileModelRepository implements MobileModelRepositoryInterface
{
    private const FILENAME = 'models.csv';
    private const SEPARATOR = ';';

    function add(MobileModel $mobileModel): void
    {
        // TODO: Implement add() method.
    }

    /**
     * @inheritDoc
     */
    function findAllByBrandId(int $brand_id): array
    {
        $handle = fopen($this->getFilename(), 'r');

        if ($handle === false) throw new RuntimeException('File not found or do not open');

        $headers = fgetcsv($handle, 0, self::SEPARATOR);

        $mobileModels = [];

        while ($row = fgetcsv($handle, 0, self::SEPARATOR)) {
            $mobileModels[] = $this->hydrate(array_combine($headers, $row));
        }

        $filtered_result = array_filter($mobileModels, function (MobileModel $mobileModel) use ($brand_id) {
            return $mobileModel->getBrandId() === $brand_id;
        });

        return array_values($filtered_result);
    }

    private function getFilename(): string
    {
        return __DIR__ . "/../../storage/" . self::FILENAME;
    }

    private function hydrate(array $item): ?MobileModel
    {
        return new MobileModel(
            $item['id'],
            $item['name'],
            $item['brand_id'],
        );
    }
}