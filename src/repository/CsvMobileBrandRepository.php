<?php

namespace App\repository;

use App\model\MobileBrand;

class CsvMobileBrandRepository implements MobileBrandRepositoryInterface
{
    private const FILENAME = 'brands.csv';
    private const SEPARATOR = ';';

    function add(MobileBrand $mobileBrand): void
    {
        // TODO: Implement add() method.
    }

    /**
     * @inheritDoc
     */
    function findAll(): array
    {
        $handle = fopen($this->getFilename(), 'r');

        if ($handle === false) throw new \RuntimeException('File not found or do not open');

        $headers = fgetcsv($handle, 0, self::SEPARATOR);

        $mobileBrands = [];

        while ($row = fgetcsv($handle, 0, self::SEPARATOR)) {
            $mobileBrands[] = $this->hydrate(array_combine($headers, $row));
        }

        return $mobileBrands;
    }

    private function getFilename(): string
    {
        return __DIR__ . "/../../storage/" . self::FILENAME;
    }

    private function hydrate(array $item): MobileBrand
    {
        return new MobileBrand(
            $item['id'],
            $item['Brand'],
        );
    }
}