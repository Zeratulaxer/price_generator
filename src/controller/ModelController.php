<?php

namespace App\controller;

use App\repository\CsvMobileModelRepository;
use App\service\csvStorage\CsvStorage;

class ModelController
{
    public static function getModels(int $brand_id) : string
    {
        $csvMobileModelRepository = new CsvMobileModelRepository(new CsvStorage('models.csv'));

        $mobileModels = $csvMobileModelRepository->findAllByBrandId($brand_id);

        return json_encode($mobileModels);
    }
}


