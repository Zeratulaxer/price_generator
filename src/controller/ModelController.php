<?php

namespace App\controller;

use RuntimeException;

class ModelController
{
    public static function getModels(string $filename, int $brand_id)
    {
        if (($handle = fopen($filename, 'r')) !== false) {
            $headers = fgetcsv($handle, 0, ';');
        } else throw new RuntimeException('File not found or do not open');

        // todo process error cases

        //colums
        $result = [];

        //rows
        while ($row = fgetcsv($handle, 0, ';')) {
            $result[] = array_combine($headers, $row);
        }

        $filtered_result = array_filter($result, function (array $value) use ($brand_id) {
            return $value['brand_id'] == $brand_id;
        });

        return json_encode(\array_values($filtered_result));
    }
}


