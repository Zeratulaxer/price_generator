<?php

namespace App\controller;

use RuntimeException;


class ModelDetailsController
{
    public static function getModelDetails($filename, int $model_id)
    {
        if (($handle = fopen($filename, 'r')) !== false) {
            $headers = fgetcsv($handle, 0, ';');
        } else throw new RuntimeException('File not found or do not open');

        // todo process error cases

        //colums
        $result = [];

        //rows
        while ($row = fgetcsv($handle, 0, ';')) {
            if ($row[10] == $model_id) {
                $result[] = array_combine($headers, $row);
            }
        }

        array_filter($result, function ($value) use ($model_id) {
            return json_encode($value == $model_id);
        });
    }
}