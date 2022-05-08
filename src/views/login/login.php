<?php require_once './src/views/layout/header.php'; 
use Eber\config\Utilidad;
?>


<div class="login">
    <div class="form-login">
        <div class="logo-login">
            <img src="<?= BASE_URL ?>/resources/icons/logo-login.png" alt="EBER CABEZA">
        </div>
        <?php if(isset($_SESSION['error_login'])):?>
        <div class="Error-login">
                <p><?=$_SESSION['error_login'];?></p>
        </div>
        <?php endif;
       Utilidad::destrySession('error_login');
        ?>
        <form action="<?= BASE_URL ?>/login" method="POST" class="formulario-login">
            <input type="email" id="emial" name="email" placeholder="Email">
            <input type="password" id="password" name="password" placeholder="Contraseña">
            <button class="boton-login"><i class="fa-solid fa-arrow-right-to-bracket"></i> Iniciar sesion</button>
        </form>
    </div>
</div>

<?php require_once './src/views/layout/footer.php'; ?>