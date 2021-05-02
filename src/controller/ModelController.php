<?php

namespace App\controller;

use App\repository\CsvMobileModelRepository;

class ModelController
{
    public static function getModels(int $brand_id) : string
    {
        $csvMobileModelRepository = new CsvMobileModelRepository();

        $mobileModels = $csvMobileModelRepository->findAllByBrandId($brand_id);

        return json_encode($mobileModels);
    }
}


