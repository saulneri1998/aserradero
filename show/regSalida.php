<div id="darkenBG">
    <div id="TempTitle">
        Registrar salida de escuadría
    </div>
    <form id="RegistrarMateriaPrimaForm" method="POST" action="scripts/regSalida-s.php">
        
        <?php
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($url, "salida=empty") == true) {
                echo '<p>Hay campos en blanco</p>';
            } elseif (strpos($url, "salida=error") == true) {
                echo '<p>Ocurrió un error, intenta de nuevo</p>';
            } elseif (strpos($url, "salida=succes") == true) {
                echo '<p>Has registrado la salida exitosamente</p>';
            } elseif (strpos($url, "salida=noexiste") == true) {
                echo '<p>No existe el producro que trata de modificar</p>';
            } elseif (strpos($url, "salida=menor") == true) {
                echo '<p>No puede registrar una salida mas grande que las existencias</p>';
            }
        ?>
        
        <div class="Spacer30"></div>
        <div class="fieldTitle">Especie de madera: (una palabra)</div>
        <?php include 'show/datalists/species.php'; ?>
        <input list="species" placeholder="Especie" name="especie">
        <div class="Spacer30"></div> 
        <div class="fieldTitle">Clasificación:</div>
        <?php include 'show/datalists/clasif.php'; ?>
        <input list="clasif" placeholder="Clasificación" name="clasif">
        <div class="Spacer30"></div>
        <div class="fieldTitle">Ancho:</div>
        <input type="number" placeholder="Ancho (cm)" min="0" step="1" name="ancho">
        <div class="Spacer30"></div>
        <div class="fieldTitle">Grueso:</div>
        <input type="number" placeholder="Grueso (mm)" min="0" step="1" name="grueso">
        <div class="Spacer30"></div>
        <div class="fieldTitle">Longitud:</div>
        <input type="number" placeholder="Longitud (cm)" min="0" step="1" name="longitud">
        <div class="Spacer30"></div>
        <div class="fieldTitle">Cantidad:</div>
        <input type="number" placeholder="Cantidad (piezas)" min="0" step="1" name="cantidad">
        <div class="Spacer30"></div>
        <input type="submit" name='salida' value="Registrar +">
        <div class="Spacer30"></div>
    </form>
    <div class="Spacer50"></div>
</div>