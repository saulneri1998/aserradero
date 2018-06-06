<?php
    include_once 'database.php';

    if (isset($_POST['signup'])) {
        $first = mysqli_real_escape_string($db, $_POST['r_name']);
        $last = mysqli_real_escape_string($db, $_POST['r_lastname']);
        $user = mysqli_real_escape_string($db, $_POST['r_username']);
        $pwd = mysqli_real_escape_string($db, $_POST['r_password']);
        
        
        if (empty($first) || empty($last) || empty($user) || empty($pwd)) {
            header("Location: ../main.php?loc=signup?signup=empty");
            exit();
        } else {
            $pwdmd5 = md5($pwd);  
            
            $val = mysqli_query($db, "SELECT DISTINCT usuario FROM Usuario WHERE usuario = '$user'");
            if (mysqli_num_rows($val) < 1) {
                $s = "INSERT INTO Usuario (nombre, apellido, usuario, acceso) VALUES ('$first', '$last', '$user', '$pwdmd5');";
                mysqli_query($db, $s);
                header('Location: ../main.php?loc=signup?signup=success');
                exit();
            } else {
                header('Location: ../main.php?loc=signup?signup=username');
                exit();
            }
            
        }
    } else {
        header("Location: ../main.php?loc=signup?signup=error");
        exit();
    }

?>