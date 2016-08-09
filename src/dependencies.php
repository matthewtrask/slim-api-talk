<?php

use Quotes\QuoteController as QuoteController;
use Quotes\QuoteRepository;

$container = $app->getContainer();

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['logger']['path'], Monolog\Logger::DEBUG));
    return $logger;
};
// Database
$container['pdo'] = function ($c) {
    $settings = $c->get('settings')['pdo'];
    return new PDO($settings['dsn'], $settings['username'], $settings['password']);
};

$container[Quotes\QuoteRepository::class] = function ($c) {
    return new QuoteRepository($c->get('logger'), $c->get('pdo'));
};

$container[Quotes\QuoteController::class] = function ($c) {
    return new QuoteController($c->get('logger'), $c->get(QuoteRepository::class));
};