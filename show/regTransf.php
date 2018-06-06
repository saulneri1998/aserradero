<div id="darkenBG">
    <div id="TempTitle">
        Registrar Transformación de Materia Prima<span id="TM"></span>
    </div>
    <form id="RegistrarMateriaPrimaForm" method="POST" action="scripts/regTransf-s.php">
        
        <?php
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($url, "transf=empty") == true) {
                echo '<p>Hay campos en blanco</p>';
            } elseif (strpos($url, "transf=error") == true) {
                echo '<p>Ocurrió un error, intenta de nuevo</p>';
            } elseif (strpos($url, "transf=noexiste") == true) {
                echo '<p>No existe un registro de ese tipo de madera en rollo</p>';
            } elseif (strpos($url, "transf=cantidad") == true) {
                echo '<p>No puede registrar una transformación mas grande que el numero de existencias</p>';
            } elseif (strpos($url, "transf=success") == true) {
                echo '<p>Has registrado la transformación exitosamente</p>';
            }
        ?>
        
        <div class="Spacer30"></div>
        <div class="fieldTitle">Fecha:</div>
        <input type="date" name="fecha">
        <div class="Spacer30"></div>
        <div class="fieldTitle">Especie de madera: (una palabra)</div>
        <?php include 'show/datalists/species.php'; ?>
        <input list="species" placeholder="Especie" name="especie">
        <div class="Spacer30"></div>
        <div class="fieldTitle">Cantidad:</div>
        <input type="number" placeholder="cantidad (piezas)" min="0" step="1" name="cantidad">
        <div class="Spacer30"></div>
        <div class="fieldTitle">Diámetro:</div>
        <input type="number" placeholder="diámetro (cm)" min="0" step="1" name="diametro">
        <div class="Spacer30"></div>
        <div class="fieldTitle">Longitud:</div>
        <input type="number" placeholder="Longitud (cm)" min="0" step="1" name="longitud">
        <div class="Spacer30"></div>
        <input type="submit" value="Registrar +" name="transf">
        <div class="Spacer30"></div>
    </form>
    <div class="Spacer50"></div>
</div>