<?php 
    include 'database.php';
    
    if (isset($_POST['entrada'])) {
        $fecha = mysqli_real_escape_string($db, $_POST['fecha']);
        $especie = mysqli_real_escape_string($db, $_POST['especie']);
        $ejido = mysqli_real_escape_string($db, $_POST['ejido']);
        $cantidad = mysqli_real_escape_string($db, $_POST['cantidad']);
        $diametro = mysqli_real_escape_string($db, $_POST['diametro']);
        $longitud = mysqli_real_escape_string($db, $_POST['longitud']);
        
        
        if (empty($fecha) || empty($especie) || empty($ejido) || empty($cantidad) || empty($diametro) || empty($longitud)) {
            header("Location: ../main.php?loc=regEntrada?entrada=empty");
            exit();
        } else {
            $s = "SELECT id FROM Madera WHERE especie = '$especie' AND longitud = '$longitud';";
            $q = mysqli_query($db, $s);
            $n = mysqli_num_rows($q);
            
            if ($n == 0) {
                $s = "INSERT INTO Madera (especie, longitud) VALUES ('$especie', '$longitud');";
                mysqli_query($db, $s);
                $s = "SELECT id FROM Madera WHERE especie = '$especie' AND longitud = '$longitud';";
                $q = mysqli_query($db, $s);
            } 
            $maderaid = mysqli_fetch_assoc($q);
            $maderaid = $maderaid['id'];

            $s = "SELECT id FROM MaderaEnRollo WHERE maderaId = '$maderaid' AND diametro = '$diametro';";
            $q = mysqli_query($db, $s);
            $n = mysqli_num_rows($q);
            if ($n == 0) {
                $s = "INSERT INTO MaderaEnRollo (maderaId, diametro) VALUES ('$maderaid', '$diametro');";                       mysqli_query($db, $s);
                $s = "SELECT id FROM MaderaEnRollo WHERE maderaId = '$maderaid' AND diametro = '$diametro';";
                $q = mysqli_query($db, $s);
            } 
            
            $rolloid = mysqli_fetch_assoc($q);
            $rolloid = $rolloid['id'];
            
            $fecha = date($fecha);
            $s = "INSERT INTO Compra (maderaRolloId, cantidad, fecha, ejido) VALUES ('$rolloid', '$cantidad', '$fecha', '$ejido');";
            mysqli_query($db, $s);
            
            $s = "SELECT cantidad FROM RolloCantidad WHERE maderaRolloId = '$rolloid';";
            $q = mysqli_query($db, $s);
            $n = mysqli_num_rows($q);
            if ($n == 0) {
                $s = "INSERT INTO RolloCantidad (maderaRolloId, cantidad) VALUES ('$rolloid', '$cantidad');";
                mysqli_query($db, $s);
            } else {
                $viejaCant = mysqli_fetch_assoc($q);
                $viejaCant = $viejaCant['cantidad'];
                $nuevaCantidad = $viejaCant + $cantidad;
                $s = "UPDATE RolloCantidad SET cantidad = '$nuevaCantidad' WHERE maderaRolloId = '$rolloid';";
                mysqli_query($db, $s);
            }
            header("Location: ../main.php?loc=regEntrada?entrada=succes");
            exit();
        }
    } else {
        header("Location: ../main.php?loc=regEntrada?entrada=error");
        exit();
    }
?>