<?php

namespace Eber\controllers;

use Eber\models\UsuarioModelo;

class UsuarioController
{

    public static function login()
    {
        if (!isset($_SESSION['usuario'])) {
            require_once './src/views/login/login.php';
        } else {
            header('Location:' . BASE_URL . '/home');
        }
    }

    public static function loginVerify($email, $password)
    {

        $usuarioModelo = new UsuarioModelo();
        $usuarioModelo->setCorreo($email);
        $usuarioModelo->setContrasenia($password);
        $login = $usuarioModelo->login();
        if (is_object($login)) {
            $_SESSION['usuario'] = $login;
            header('Location:' . BASE_URL . '/home');
        } else {
            $_SESSION['error_login'] = 'Email y/o contraseña incorrectos';
        }
        header('Location:' . BASE_URL . '/login');
    }

    public static function logout(){
        if($_SESSION['usuario']){
            unset($_SESSION['usuario']);
        }
        header('Location:' . BASE_URL . '/login');
    }
}
