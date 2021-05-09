<?php

namespace App\repository;

use App\model\MobileModel;
use App\service\csvStorage\CsvStorage;

class CsvMobileModelRepository implements MobileModelRepositoryInterface
{
    private CsvStorage $csvStorage;

    public function __construct(CsvStorage $csvStorage)
    {
        $this->csvStorage = $csvStorage;
    }

    function add(MobileModel $mobileModel): void
    {
        // TODO: Implement add() method.
    }

    /**
     * @inheritDoc
     */
    function findAllByBrandId(int $brand_id): array
    {
        $mobileModels = $this->csvStorage->findAll([$this, 'hydrate']);

        $filtered_result = array_filter($mobileModels, function (MobileModel $mobileModel) use ($brand_id) {
            return $mobileModel->getBrandId() === $brand_id;
        });

        return array_values($filtered_result);
    }

    function hydrate(array $item): ?MobileModel
    {
        return new MobileModel(
            $item['id'],
            $item['name'],
            $item['brand_id'],
        );
    }
}