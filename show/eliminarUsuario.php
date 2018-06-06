<div id="darkenBG">
    <div id="TempTitle">
        Eliminar usuario
    </div>
    <form id="RegistrarMateriaPrimaForm" method="POST" action="scripts/eliminarUsuario-s.php">

        <?php
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($url, "eliminar=empty") == true) {
                echo '<p>Hay campos en blanco</p>';
            } elseif (strpos($url, "eliminar=error") == true) {
                echo '<p>Ocurrió un error, intenta de nuevo</p>';
            } elseif (strpos($url, "eliminar=noexiste") == true) {
                echo '<p>El usuario no existía previamente</p>';
            } elseif (strpos($url, "eliminar=succes") == true) {
                echo '<p>Has eliminado al usuario exitosamente</p>';
            }
        ?>

        <div class="Spacer30"></div>
        <div class="fieldTitle">Nombre de usuario:</div>
        
        <?php include 'show/datalists/username.php'; ?>
        
        <input list="username" placeholder="Usuario" name="user">
        <div class="Spacer30"></div>

        <input type="submit" name="elimUser" value="Eliminar -">
    </form>
    <div class="Spacer50"></div>
</div>