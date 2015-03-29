<?php

$routes->get('/', function() {
    HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->get('/tilaus', function() {
    HelloWorldController::tilaus();
});

$routes->get('/potilaat', function() {
    PotilasController::index();
});

$routes->post('/potilaat', function() {
    PotilasController::store();
});

$routes->get ('/potilas/uusipotilas', function() {
   PotilasController::uusipotilas(); 
});

$routes->get('/laakari', function() {
    HelloWorldController::laakari();
});

$routes->get('/potilas/:id', function($id) {
    PotilasController::show($id);
});

$routes->get('/login', function() {
    HelloWorldController::login();
});

$routes->get('/register', function() {
    HelloWorldController::register();
});

$routes->get('/ohje', function() {
    HelloWorldController::ohje();
});

$routes->get('/raportti', function() {
    HelloWorldController::raportti();
});
