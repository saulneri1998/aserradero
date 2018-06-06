<div id="darkenBG">
    <div id="TempTitle">
        Registrar entrada de materia prima<span id="TM"></span>
    </div>
    <form id="RegistrarMateriaPrimaForm" method="POST" action="scripts/regEntrada-s.php">
        
        <?php
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($url, "entrada=empty") == true) {
                echo '<p>Hay campos en blanco</p>';
            } elseif (strpos($url, "entrada=error") == true) {
                echo '<p>Ocurrió un error, intenta de nuevo</p>';
            } elseif (strpos($url, "agregar=succes") == true) {
                echo '<p>Has registrado la entrada exitosamente</p>';
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
        <div class="fieldTitle">Ejido de procedencia: (una palabra)</div>
        <?php include 'show/datalists/ejidos.php'; ?>
        <input list="ejidos" placeholder="Ejido" name="ejido">
        <div class="Spacer30"></div>
        <div class="fieldTitle">Diámetro:</div>
        <input type="number" placeholder="Diámetro (cm)" min="0" step="1" name="diametro">
        <div class="Spacer30"></div>
        <div class="fieldTitle">Longitud:</div>
        <input type="number" placeholder="Longitud (cm)" min="0" step="1" name="longitud">
        <div class="Spacer30"></div>
        <div class="fieldTitle">Cantidad:</div>
        <input type="number" placeholder="Cantidad (piezas)" min="0" step="1" name="cantidad">
        <div class="Spacer30"></div>
        <input type="submit" name="entrada" value="Registrar +">
        <div class="Spacer30"></div>
    </form>
    <div class="Spacer50"></div>
</div>