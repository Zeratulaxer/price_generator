<?php

use App\routing\Router;

require_once __DIR__ . '/../bootstrap.php';

Router::handle($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);