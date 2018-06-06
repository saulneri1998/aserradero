<?php 
    include 'database.php';
    
    if (isset($_POST['transf'])) {
        $fecha = mysqli_real_escape_string($db, $_POST['fecha']);
        $especie = mysqli_real_escape_string($db, $_POST['especie']);
        $cantidad = mysqli_real_escape_string($db, $_POST['cantidad']);
        $diametro = mysqli_real_escape_string($db, $_POST['diametro']);
        $longitud = mysqli_real_escape_string($db, $_POST['longitud']);
        
        
        if (empty($fecha) || empty($especie) || empty($cantidad) || empty($diametro) || empty($longitud)) {
            header("Location: ../main.php?loc=regTransf?transf=empty");
            exit();
        } else {
            $s = "SELECT id FROM Madera WHERE especie = '$especie' AND longitud = '$longitud';";
            $q = mysqli_query($db, $s);
            $n = mysqli_num_rows($q);
            
            if ($n == 0) {
                header("Location: ../main.php?loc=regTransf?transf=noexiste");
                exit();
            } else {
                $maderaid = mysqli_fetch_assoc($q);
                $maderaid = $maderaid['id'];

                $s = "SELECT id FROM MaderaEnRollo WHERE maderaId = '$maderaid' AND diametro = '$diametro';";
                $q = mysqli_query($db, $s);
                $n = mysqli_num_rows($q);
                if ($n == 0) {
                    header("Location: ../main.php?loc=regTransf?transf=noexiste");
                    exit();
                } else {
                    $rolloid = mysqli_fetch_assoc($q);
                    $rolloid = $rolloid['id'];

                    $s = "SELECT cantidad FROM RolloCantidad WHERE maderaRolloId = '$rolloid';";
                    $q = mysqli_query($db, $s);
                    $viejaCant = mysqli_fetch_assoc($q);
                    $viejaCant = $viejaCant['cantidad'];
                    
                    if ($cantidad <= $viejaCant) {
                        $fecha = date($fecha);
                        $s = "INSERT INTO RolloTransformado (maderaRolloId, cantidad, fecha) VALUES ('$rolloid', '$cantidad', '$fecha');";
                        mysqli_query($db, $s);
                        
                        $nuevaCantidad = $viejaCant - $cantidad;
                        $s = "UPDATE RolloCantidad SET cantidad = '$nuevaCantidad' WHERE maderaRolloId = '$rolloid';";
                        mysqli_query($db, $s);
                        header("Location: ../main.php?loc=regTransf?transf=success");
                        exit();
                    } else {
                        header("Location: ../main.php?loc=regTransf?transf=cantidad");
                        exit();
                    }
                }
            } 
        }
    } else {
        header("Location: ../main.php?loc=regTransf?transf=error");
        exit();
    }
?>