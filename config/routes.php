<?php

$routes->get('/', function() {
    HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->get('/tilaukset', function() {
    TilausController::showAll();
});

$routes->get('/tilaus', function() {
    TilausController::index();
});

$routes->post('/tilaus', function() {
    TilausController::store();
});

$routes->get('/potilaat', function() {
    PotilaatController::index();
});

$routes->get('/uusiohje', function() {
    HelloWorldController::uusiOhje();
});

$routes->post('/uusiohje', function() {
    OhjeController::store();
});

$routes->get('/laakari', function() {
    HelloWorldController::laakari();
});

$routes->get('/potilas/:id', function($id) {
    PotilaatController::show($id);
});

$routes->get('/potilas/:id/ohjeet', function($id) {
    OhjeController::index($id);
});

$routes->get('/ohje', function() {
    OhjeController::ohje();
});

$routes->get('/tilaukset/:id/raportti', function($id) {
    RaporttiController::index($id);
});

$routes->post('/tilaukset/:id/raportti', function($id) {
    RaporttiController::store($id);
});

$routes->post('/ohjeet/:id/destroy', function($id) {
    OhjeController::destroy($id);
});

$routes->get('/login', function() {
    UserController::login();
});

$routes->post('/login', function() {
    UserController::handle_login();
});

$routes->post('/logout', function() {
    UserController::logout();
});

$routes->get('/register', function() {
    UserController::register();
});

$routes->post('/register', function() {
    UserController::handle_register();
});
