<?php

namespace App\routing;

use App\controller\BrandController;
use App\controller\ModelController;
use App\controller\ModelDetailsController;

Router::get('/getBrands', function () {

    BrandController::getBrands('storage/brands.csv');

});

Router::get('/getModels/{brand_id}', function ($brand_id) {

    ModelController::getModels('storage/models.csv', $brand_id);

});

Router::get('/getModelDetails/{model_id}', function ($model_id) {

    ModelDetailsController::getModelDetails('storage/model_details.csv', $model_id);

});