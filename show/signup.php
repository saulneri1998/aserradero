<div id="darkenBG">
    <div id="TempTitle">
        Registrar nuevo usuario del sistema
    </div>

    <form id="RegisterForm" method="POST" action="scripts/signup-s.php">
        <div class="RegisterContainer">
            
            <?php
                $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if (strpos($url, "signup=empty") == true) {
                    echo '<p>Hay campos en blanco</p>';
                } elseif (strpos($url, "signup=username") == true) {
                    echo '<p>Nombre de usuario ya existe</p>';
                } elseif (strpos($url, "signup=success") == true) {
                    echo '<p>Usuario registrado exitosamente</p>';
                } elseif (strpos($url, "signup=error") == true) {
                    echo '<p>Ocurrió un error, intenta de nuevo</p>';
                }
            ?>
            
            <div class="Spacer30"></div>
            <input id="register_name" type="text" placeholder="Nombre..." name="r_name">
            <div class="Spacer30"></div>
            <input id="register_lastname" type="text" placeholder="Apellidos..." name="r_lastname">
            <div class="Spacer30"></div>
            <input id="register_username" type="text" placeholder="Usuario..." name="r_username">
            <div class="Spacer30"></div>
            <input id="register_password" type="password" placeholder="Contraseña..." name="r_password">
            <div class="Spacer30"></div>
            <button type="submit" name="signup" id="registrar">Registrar</button>
        </div>
    </form>
    <div class="Spacer50"></div>
</div>