<?php

namespace App\repository;

use App\model\MobileBrand;
use App\service\csvStorage\CsvStorage;

class CsvMobileBrandRepository implements MobileBrandRepositoryInterface
{
    private CsvStorage $csvStorage;

    public function __construct(CsvStorage $csvStorage)
    {
        $this->csvStorage = $csvStorage;
    }

    function add(MobileBrand $mobileBrand): void
    {
        // TODO: Implement add() method.
    }

    /**
     * @inheritDoc
     */
    function findAll(): array
    {
        return $this->csvStorage->findAll(array($this, 'hydrate'));
    }

    function hydrate(array $item): MobileBrand
    {
        return new MobileBrand(
            $item['id'],
            $item['name'],
        );
    }
}