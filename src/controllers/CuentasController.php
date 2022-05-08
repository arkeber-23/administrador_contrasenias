<?php

namespace Eber\controllers;

use Eber\models\CuentasModelo;

class CuentasController{

    public static function all()
    {
        if(isset($_SESSION['usuario'])){
            $cuentasModelo = new CuentasModelo();
            $cuentasModelo->setIdUsuario($_SESSION['usuario']->id_usuario);
            $cuentas = $cuentasModelo->all();
            require_once './src/views/home/home.php';
        }
    }

}

?>