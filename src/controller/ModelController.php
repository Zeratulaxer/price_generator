<?php

namespace App\controller;

use App\repository\CsvMobileModelRepository;
use App\repository\CsvPercentageRateRepository;
use App\service\creditPriceCalculator\CreditPriceCalculator;
use App\service\csvStorage\CsvStorage;

class ModelController
{
    public static function getModels(int $brand_id) : string
    {
        $csvMobileModelRepository = new CsvMobileModelRepository(
            new CsvStorage('models.csv'),
            new CreditPriceCalculator(new CsvPercentageRateRepository(new CsvStorage('percentage_rate.csv')))
        );

        $mobileModels = $csvMobileModelRepository->findAllByBrandId($brand_id);

        return json_encode($mobileModels);
    }
}


