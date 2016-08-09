<?php

namespace Quotes;

require "../vendor/autoload.php";

session_start();

$config = require __DIR__ . '/../src/config.php';

// instantiate app
$app = new \Slim\App($config);

// bring in config settings

require __DIR__ . '/../src/dependencies.php';

// URI routes
require __DIR__ . '/../src/routes.php';

// lets gooooo
$app->run();
