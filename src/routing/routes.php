<?php

namespace App\routing;

use App\controllers\BrandsController;
use App\controllers\ModelsController;
use App\controllers\ModelDetailsController;

Router::get('/getBrands', function () {

    BrandsController::getBrands();

});

Router::get('/getModels/{brandId}', function ($brandId) {

    ModelsController::getModels();

});

Router::get('/getModelDetails/{modelId}', function ($modelId) {

    ModelDetailsController::getModelDetails();

});
