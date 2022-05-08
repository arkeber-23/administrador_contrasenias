<?php

use Bramus\Router\Router;
use Eber\controllers\CuentasController;
use Eber\controllers\UsuarioController;

$router = new Router();

$router->get('/', function () {
    header('Location:' . BASE_URL . '/login');
});

$router->get('/login', function () {
    UsuarioController::login();
});

$router->post('/login', function () {
    if (isset($_POST) && !empty($_POST['email'])&& !empty($_POST['password'])) {
        extract($_POST);
        UsuarioController::loginVerify($email, $password);
    }
});

$router->get('/logout', function () {
    UsuarioController::logout();
});
$router->get('/home', function () {
    CuentasController::all();
});




$router->run();
