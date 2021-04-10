<?php

namespace App\routing;

use App\controller\BrandController;
use App\controller\ModelController;
use App\controller\ModelDetailsController;

function getFilename(string $filename): string
{
    return __DIR__ . "/../../storage/$filename";
}

Router::get('/getBrands', function () {
    return BrandController::getBrands(getFilename("brands.csv"));
});

Router::get('/getModels/{brand_id}', function ($brand_id) {
    return ModelController::getModels(getFilename("models.csv"), $brand_id);
});

Router::get('/getModelDetails/{model_id}', function ($model_id) {
    return ModelDetailsController::getModelDetails(getFilename("model_details.csv"), $model_id);
});