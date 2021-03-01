<?php

namespace App\controllers;

use RuntimeException;

class BrandsController
{
    public static function getBrands() {
        if(($file = fopen('storage/brands.csv', 'r')) !== false) {
            while ($data = fgetcsv($file, 1000, ';')) {
                 print_r(json_encode($data));
            }
        } else throw new RuntimeException('File do not open or not found');

        fclose($file);
    }

}
