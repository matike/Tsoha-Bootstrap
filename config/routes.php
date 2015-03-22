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
    HelloWorldController::potilaat();
});

$routes->get('/laakari', function() {
    HelloWorldController::laakari();
});

$routes->get('/potilas', function() {
    HelloWorldController::potilas();
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
