<?php

namespace App\controller;

use App\repository\CsvModelDetailsRepository;

class ModelDetailsController
{
    public static function getModelDetails(int $model_id) : string
    {
        $csvModelDetailsRepository = new CsvModelDetailsRepository();

        $modelDetails = $csvModelDetailsRepository->findOneByModelId($model_id);

        return json_encode($modelDetails);
    }
}