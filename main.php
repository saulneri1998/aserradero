<?php 
    session_start();

    if (isset($_SESSION['nombre'])) {
        include 'show/top.php';
        
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        
        if (strpos($url, "loc=homepage")) {
            include 'show/homepage.php';
        } elseif (strpos($url, "loc=visualizarEmpleados")) {
            include 'show/visualizarEmpleados.php';
        } elseif (strpos($url, "loc=agregarEmpleado")) {
            include 'show/agregarEmpleado.php';
        } elseif (strpos($url, "loc=eliminarEmpleado")) {
            include 'show/eliminarEmpleado.php';
        } elseif (strpos($url, "loc=visualizarUsuarios")) {
            include 'show/visualizarUsuarios.php';
        } elseif (strpos($url, "loc=signup")) {
            include 'show/signup.php';
        } elseif (strpos($url, "loc=eliminarUsuario")) {
            include 'show/eliminarUsuario.php';
        } elseif (strpos($url, "loc=inventEscuadrias")) {
            include 'show/inventEscuadrias.php';
        } elseif (strpos($url, "loc=regCreacion")) {
            include 'show/regCreacion.php';
        } elseif (strpos($url, "loc=regSalida")) {
            include 'show/regSalida.php';
        } elseif (strpos($url, "loc=inventRollo")) {
            include 'show/inventRollo.php';
        } elseif (strpos($url, "loc=regEntrada")) {
            include 'show/regEntrada.php';
        } elseif (strpos($url, "loc=regTransf")) {
            include 'show/regTransf.php';
        } elseif (strpos($url, "loc=historialCompras")) {
            include 'show/historialCompras.php';
        } elseif (strpos($url, "loc=estadTrozos")) {
            include 'show/estadTrozos.php';
        } elseif (strpos($url, "loc=estadEscuad")) {
            include 'show/estadProd.php';
        } else {
            include 'show/homepage.php';
        } 
        
        include 'show/bottom.php';
        
    } else {
        header('Location: index.php?status=error');
        exit();
    }
?>