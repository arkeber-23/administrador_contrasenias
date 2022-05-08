<?php require_once './src/views/layout/header.php';
if (isset($_SESSION['usuario'])) : ?>
    <div class="cuentas">
        <?php foreach ($cuentas as $cuenta): ?>
            <div class="card">
                <div class="card-img">
                    <img src="./resources/icons/icon.svg" alt="RED SOCIAL">
                </div>
                <div class="card-body">
                    <h4 class="card-body-title"><?=$cuenta->nombre_red_social;?></h4>
                    <p> <b>Correo:</b> <span> <?="PABLITO CLAVO"//$cuenta->correo;?></span></p>
                    <p><b>Password:</b><span><?="UN CLAVITO" //$cuenta->contrasenia;?></span></p>
                </div>
            </div>
    <?php
        endforeach;
    else :
        header('Location: ' . BASE_URL . '/login');
    endif;
    ?>

    </div>