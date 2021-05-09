<?php

namespace App\controller;

use App\repository\CsvModelDetailsRepository;
use App\service\csvStorage\CsvStorage;

class ModelDetailsController
{
    public static function getModelDetails(int $model_id) : string
    {
        $csvModelDetailsRepository = new CsvModelDetailsRepository(new CsvStorage('model_details.csv'));

        $modelDetails = $csvModelDetailsRepository->findOneByModelId($model_id);

        return json_encode($modelDetails);
    }
}