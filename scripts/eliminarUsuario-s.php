<?php 
    include 'database.php';
    
    if (isset($_POST['elimUser'])) {
        $user = mysqli_real_escape_string($db, $_POST['user']);
        
        if (empty($user)) {
            header("Location: ../main.php?loc=eliminarUsuario?eliminar=empty");
            exit();
        } else {
            $s = "SELECT * FROM Usuario WHERE usuario = '$user';";
            $q = mysqli_query($db, $s);
            if (mysqli_num_rows($q) > 0) {
                $s = "DELETE FROM Usuario WHERE usuario = '$user';";
                mysqli_query($db, $s);
                header("Location: ../main.php?loc=eliminarUsuario?eliminar=success");
                exit();
            } else {
                header("Location: ../main.php?loc=eliminarUsuario?eliminar=noexiste");
                exit();
            }
        }
    } else {
        header("Location: ../main.php?loc=eliminarUsuario?eliminar=error");
        exit();
    }
?>