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
            if ($row[2] == $brand_id) {
                $result[] = array_combine($headers, $row);
            }
        }

        array_filter($result, function ($value) use ($brand_id) {
            return json_encode($value == $brand_id);
        });
    }
}


