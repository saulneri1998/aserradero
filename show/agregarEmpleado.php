<div id="darkenBG">
    <div id="TempTitle">
        Agregar empleado
    </div>
    <form id="RegistrarMateriaPrimaForm" method="POST" action="scripts/agregarEmpleado-s.php">

        <?php
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($url, "agregar=empty") == true) {
                echo '<p>Hay campos en blanco</p>';
            } elseif (strpos($url, "agregar=error") == true) {
                echo '<p>Ocurrió un error, intenta de nuevo</p>';
            } elseif (strpos($url, "agregar=existe") == true) {
                echo '<p>El empleado ya existía previamente</p>';
            } elseif (strpos($url, "agregar=succes") == true) {
                echo '<p>Has agregado al empleado exitosamente</p>';
            }
        ?>
        
        <div class="Spacer30"></div>
        <div class="fieldTitle">Nombre:</div>
        <input type="text" placeholder="Nombre" name="nombre">
        <div class="Spacer30"></div>
        <div class="fieldTitle">Apellidos:</div>
        <input type="text" placeholder="Apellidos" name="apellidos">
        <div class="Spacer30"></div>
        <div class="fieldTitle">CURP:</div>
        <input type="text" placeholder="CURP" name="curp">
        <div class="Spacer30"></div>
        <div class="fieldTitle">Teléfono:</div>
        <input type="number" placeholder="Teléfono" name="tel">
        <div class="Spacer30"></div>
        <div class="fieldTitle">Fecha de ingreso:</div>
        <input type="date" name="fecha">
        <div class="Spacer30"></div>
        <div class="fieldTitle">Salario:</div>
        <input type="number" placeholder="Salario" name="salario">
        <div class="Spacer30"></div>

        <input type="submit" name="agEmp" value="Agregar +">
        <div class="Spacer30"></div>
    </form>
    <div class="Spacer50"></div>

</div>