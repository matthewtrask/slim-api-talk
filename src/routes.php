<?php
use Quotes\QuoteController;

// CRUD Endpoints for Quotes
$app->get('/quote', QuoteController::class.':index');
$app->get('/quote/{id}', QuoteController::class.':fetch');
$app->post('/quote', QuoteController::class.':create');
$app->put('/quote/{id}', QuoteController::class.':update');
$app->delete('/quote/{id}', QuoteController::class.':delete');
