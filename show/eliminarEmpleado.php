<div id="darkenBG">
    <div id="TempTitle">
        Eliminar empleado
    </div>
    <form id="RegistrarMateriaPrimaForm" method="POST" action="scripts/eliminarEmpleado-s.php">

        <?php
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($url, "eliminar=empty") == true) {
                echo '<p>Hay campos en blanco</p>';
            } elseif (strpos($url, "eliminar=error") == true) {
                echo '<p>Ocurrió un error, intenta de nuevo</p>';
            } elseif (strpos($url, "eliminar=noexiste") == true) {
                echo '<p>El empleado no existía previamente</p>';
            } elseif (strpos($url, "eliminar=succes") == true) {
                echo '<p>Has eliminado al empleado exitosamente</p>';
            }
        ?>
        
        <div class="Spacer30"></div>
        <div class="fieldTitle">CURP:</div>
        
        <?php include 'show/datalists/employeeCurp.php'; ?>
        
        <input list="employeeCurp" placeholder="CURP" name="curp">
        <div class="Spacer30"></div>

        <input type="submit" name="elimEmp" value="Eliminar -">
        <div class="Spacer30"></div>
    </form>
    <div class="Spacer50"></div>
</div>