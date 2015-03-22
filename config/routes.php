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

$routes->get('/laakarit', function() {
    HelloWorldController::laakarit();
});

$routes->get('/laakari', function() {
    HelloWorldController::laakari();
});

$routes->get('/login', function() {
    HelloWorldController::login();
});

$routes->get('/register', function() {
    HelloWorldController::register();
});

