<div id="darkenBG">
    <div id="TempTitle">
        Registrar creación de escuadría
    </div>
    <form id="RegistrarMateriaPrimaForm" action="scripts/regCreacion-s.php" method="POST">
        
        <?php
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($url, "crear=empty") == true) {
                echo '<p>Hay campos en blanco</p>';
            } elseif (strpos($url, "crear=error") == true) {
                echo '<p>Ocurrió un error, intenta de nuevo</p>';
            } elseif (strpos($url, "crear=succes") == true) {
                echo '<p>Has registrado la creacion exitosamente</p>';
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
        <input type="submit" name="crear" value="Registrar +">
        <div class="Spacer30"></div>
    </form>
    <div class="Spacer50"></div>
</div>