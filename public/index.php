<?php

use App\routing\Router;

require_once dirname(__DIR__) . '/bootstrap.php';

$request = [
    'method' => $_SERVER['REQUEST_METHOD'],
    'uri' => $_SERVER['REQUEST_URI']
];

$response = Router::handle($request);

echo $response;
