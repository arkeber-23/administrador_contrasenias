<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./resources/icons/favi-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./resources/css/login.css">
    <link rel="stylesheet" href="./resources/css/home.css">
    <link rel="stylesheet"
        href="http://localhost/administrador_contrasenias/vendor/components/font-awesome/css/all.min.css">
    <title>GESTOR DE CONTRASEÑAS</title>
</head>

<body>
    <nav class="nav">
        <div class="nav-contenido">
            <div class="nav-logo">
                <h3><a href="https://arkeber-23.github.io/Ebercode" target="_blank">EBERCODE</a></h3>
            </div>
            <?php if (isset($_SESSION['usuario'])) : ?>
            <div class="nav-buscador">
                <input type="search" placeholder="Buscar">
            </div>
            <?php endif; ?>
            <div class="nav-items">
                <ul>
                    <?php if (!isset($_SESSION['usuario'])) : ?>
                    <li><a href="#">login</a></li>
                    <li><a href="#">Registrarse</a></li>
                    <?php else : ?>
                    <h5></h5>
                    <li><p>Usuario: <?=$_SESSION['usuario']->nombre?></p> </li>
                    <li><a href="<?=BASE_URL?>./logout">Cerrar sesión</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <section class="contenedor">