<?php 
    include 'database.php';
    
    if (isset($_POST['salida'])) {
        $cantidad = mysqli_real_escape_string($db, $_POST['cantidad']);
        $especie = mysqli_real_escape_string($db, $_POST['especie']);
        $clasif = mysqli_real_escape_string($db, $_POST['clasif']);
        $ancho = mysqli_real_escape_string($db, $_POST['ancho']);
        $grueso = mysqli_real_escape_string($db, $_POST['grueso']);
        $longitud = mysqli_real_escape_string($db, $_POST['longitud']);
        
        if (empty($cantidad) || empty($especie) || empty($clasif) || empty($ancho) || empty($grueso) || empty($longitud)) {
            header("Location: ../main.php?loc=regSalida?salida=empty");
            exit();
        } else {
            $s = "SELECT id FROM Madera WHERE especie = '$especie' AND longitud = '$longitud';";
            $q = mysqli_query($db, $s);
            if (mysqli_num_rows($q) == 0) {
                header("Location: ../main.php?loc=regSalida?salida=noexiste");
                exit();
            }else {
                $maderaid = mysqli_fetch_assoc($q);
                $maderaid = $maderaid['id'];

                $s = "SELECT id FROM Escuadria WHERE maderaId = '$maderaid' AND clasif = '$clasif' AND ancho = '$ancho' AND grueso = '$grueso';";
                $q = mysqli_query($db, $s);
                if (mysqli_num_rows($q) == 0) {
                    header("Location: ../main.php?loc=regSalida?salida=noexiste");
                    exit();
                } else {
                    $escuadriaid = mysqli_fetch_assoc($q);
                    $escuadriaid = $escuadriaid['id'];

                    $s = "SELECT cantidad FROM ProductoCantidad WHERE escuadriaId = '$escuadriaid';";
                    $q = mysqli_query($db, $s);
                    if (mysqli_num_rows($q) == 0) {
                        header("Location: ../main.php?loc=regSalida?salida=noexiste");
                        exit();
                    } else {
                        $viejaCant = mysqli_fetch_assoc($q);
                        $viejaCant = $viejaCant['cantidad'];
                        $nuevaCantidad = $viejaCant - $cantidad;
                        if ($nuevaCantidad < 0) {
                            header("Location: ../main.php?loc=regSalida?salida=menor");
                            exit();
                        }else {
                            $s = "UPDATE ProductoCantidad SET cantidad = '$nuevaCantidad' WHERE escuadriaId = '$escuadriaid';";
                            mysqli_query($db, $s);
                            header("Location: ../main.php?loc=regSalida?salida=success");
                            exit();
                        }
                    }
                }
            }
        }
    } else {
        header("Location: ../main.php?loc=regSalida?salida=error");
        exit();
    }
?>