<?php

$routes->get('/', function() {
    IndexController::index();
});

$routes->get('/hiekkalaatikko', function() {
    IndexController::sandbox();
});

$routes->get('/tilaukset', function() {
    TilausController::showAll();
});

$routes->post('/tilaukset/:id/destroy', function($id) {
    TilausController::destroy($id);
});

$routes->get('/tilaus', function() {
    TilausController::index();
});

$routes->post('/tilaus', function() {
    TilausController::store();
});

$routes->get('/potilaat', function() {
    PotilasController::showAll();
});

$routes->get('/potilas/:id/ohjeet', function($id) {
    OhjeController::index($id);
});

$routes->get('/potilas/:id/uusiohje', function($id) {
    OhjeController::uusi($id);
});

$routes->post('/potilas/:id/uusiohje', function($id) {
    OhjeController::store($id);
});

$routes->get('/potilas/:pid/ohjeet/:id/edit', function($pid, $id) {
    OhjeController::edit($id);
});

$routes->post('/potilas/:pid/ohjeet/:id/edit', function($pid, $id) {
    OhjeController::update($id);
});

$routes->post('/potilas/:pid/ohjeet/:id/destroy', function($pid, $id) {
    OhjeController::destroy($id);
});

$routes->get('/laakarit', function() {
    LaakariController::showAll();
});

$routes->get('/laakari/:id', function($id) {
    LaakariController::show($id);
});

$routes->get('/potilas/:id', function($id) {
    PotilaatController::show($id);
});

$routes->get('/raportit', function() {
    RaporttiController::showAll();
});

$routes->get('/tilaukset/:id/raportti', function($id) {
    RaporttiController::index($id);
});

$routes->get('/tilaukset/:id/raportti', function($id) {
    RaporttiController::save($id);
});

$routes->get('/potilas/:id/historia', function($id) {
    HistoriaController::index($id);
});

$routes->post('/potilas/:id/historia', function($id) {
    HistoriaController::save($id);
});

$routes->post('/potilas/:id/historia/destroy', function($id) {
    HistoriaController::destroy($id);
});

$routes->post('/tilaukset/:id/raportti', function($id) {
    RaporttiController::store($id);
});


$routes->get('/login', function() {
    UserController::login();
});

$routes->post('/login', function() {
    UserController::handle_login();
});

$routes->get('/adminlogin', function() {
    AdminController::login();
});

$routes->post('/adminlogin', function() {
    AdminController::handle_login();
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

$routes->get('/omasivu', function() {
    OmasivuController::index();
});
