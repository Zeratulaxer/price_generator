<?php

namespace App\controller;

use RuntimeException;

class BrandController
{
    public static function getBrands(string $filename): string
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

        return json_encode($result);
    }
}