<?php 
    include 'database.php';
    
    if (isset($_POST['crear'])) {
        $fecha = mysqli_real_escape_string($db, $_POST['fecha']);
        $cantidad = mysqli_real_escape_string($db, $_POST['cantidad']);
        $especie = mysqli_real_escape_string($db, $_POST['especie']);
        $clasif = mysqli_real_escape_string($db, $_POST['clasif']);
        $ancho = mysqli_real_escape_string($db, $_POST['ancho']);
        $grueso = mysqli_real_escape_string($db, $_POST['grueso']);
        $longitud = mysqli_real_escape_string($db, $_POST['longitud']);
        
        if (empty($fecha) || empty($cantidad) || empty($especie) || empty($clasif) || empty($ancho) || empty($grueso) || empty($longitud)) {
            header("Location: ../main.php?loc=regCreacion?crear=empty");
            exit();
        } else {
            $s = "SELECT id FROM Madera WHERE especie = '$especie' AND longitud = '$longitud';";
            $q = mysqli_query($db, $s);
            if (mysqli_num_rows($q) == 0) {
                $s = "INSERT INTO MADERA (especie, longitud) VALUES ('$especie', '$longitud');";
                mysqli_query($db, $s);
                $s = "SELECT id FROM Madera WHERE especie = '$especie' AND longitud = '$longitud';";
                $q = mysqli_query($db, $s);
            }
            
            $maderaid = mysqli_fetch_assoc($q);
            $maderaid = $maderaid['id'];
            
            $s = "SELECT id FROM Escuadria WHERE maderaId = '$maderaid' AND clasif = '$clasif' AND ancho = '$ancho' AND grueso = '$grueso';";
            $q = mysqli_query($db, $s);
            if (mysqli_num_rows($q) == 0) {
                $s = "INSERT INTO Escuadria (maderaId, clasif, ancho, grueso) VALUES ('$maderaid', '$clasif', '$ancho', '$grueso');";
                mysqli_query($db, $s);
                $s = "SELECT id FROM Escuadria WHERE maderaId = '$maderaid' AND clasif = '$clasif' AND ancho = '$ancho' AND grueso = '$grueso';";
                $q = mysqli_query($db, $s);
            }
            
            $escuadriaid = mysqli_fetch_assoc($q);
            $escuadriaid = $escuadriaid['id'];
            
            $fecha = date($fecha);
            $s = "INSERT INTO ProductoTransformado (escuadriaID, fecha, cantidad) VALUES ('$escuadriaid', '$fecha', '$cantidad');";
            mysqli_query($db, $s);
            
            $s = "SELECT cantidad FROM ProductoCantidad WHERE escuadriaId = '$escuadriaid';";
            $q = mysqli_query($db, $s);
            if (mysqli_num_rows($q) == 0) {
                $s = "INSERT INTO ProductoCantidad (escuadriaId, cantidad) VALUES ('$escuadriaid', '$cantidad');";
                mysqli_query($db, $s);
            } else {
                $viejaCant = mysqli_fetch_assoc($q);
                $viejaCant = $viejaCant['cantidad'];
                $nuevaCantidad = $viejaCant + $cantidad;
                $s = "UPDATE ProductoCantidad SET cantidad = '$nuevaCantidad' WHERE escuadriaId = '$escuadriaid';";
                mysqli_query($db, $s);
            }
            
            header("Location: ../main.php?loc=regCreacion?crear=success");
            exit();
        }
    } else {
        header("Location: ../main.php?loc=regCreacion?crear=error");
        exit();
    }
?>