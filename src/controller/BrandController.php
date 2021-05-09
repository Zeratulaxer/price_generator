<?php

namespace App\controller;

use App\repository\CsvMobileBrandRepository;
use App\service\csvStorage\CsvStorage;

//todo use DI
class BrandController
{
    public static function getBrands(): string
    {
        $csvMobileBrandRepository = new CsvMobileBrandRepository(new CsvStorage('brands.csv'));

        $mobileBrands = $csvMobileBrandRepository->findAll();

        return json_encode($mobileBrands);
    }
}