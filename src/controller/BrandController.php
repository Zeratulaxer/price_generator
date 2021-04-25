<?php

namespace App\controller;

use App\repository\CsvMobileBrandRepository;

//todo use DI
class BrandController
{
    public static function getBrands(): string
    {
        $csvMobileBrandRepository = new CsvMobileBrandRepository();

        $mobileBrands = $csvMobileBrandRepository->findAll();

        return json_encode($mobileBrands);
    }
}