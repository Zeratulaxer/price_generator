<?php

namespace App\routing;

use App\controller\BrandController;
use App\controller\ModelController;
use App\controller\ModelDetailsController;

Router::get('/getBrands', function () {
    return BrandController::getBrands();
});

Router::get('/getModels/{brand_id}', function (int $brand_id) {
    return ModelController::getModels($brand_id);
});

Router::get('/getModelDetails/{model_id}', function (int $model_id) {
    return ModelDetailsController::getModelDetails($model_id);
});