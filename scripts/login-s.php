<?php
    session_start();

    include_once 'database.php';

    if (isset($_POST['login'])) {
        $user = mysqli_real_escape_string($db, $_POST['l_username']);
        $pswd = mysqli_real_escape_string($db, $_POST['l_password']);
        
        if (empty($user) || empty($pswd)) {
            header('Location: ../index.php?login=empty');
            exit();
        } else {
            $pwdmd5 = md5($pswd);
            $s = "SELECT * FROM Usuario WHERE '$user' = usuario AND '$pwdmd5' = acceso;";
            $q = mysqli_query($db, $s);
            if (mysqli_num_rows($q) > 0) {
                $result = mysqli_fetch_assoc($q);
                $_SESSION['nombre'] = $result['nombre'];
                $_SESSION['apellido'] = $result['apellido'];
                $_SESSION['usuario'] = $result['usuario'];
                
                header('Location: ../main.php?loc=homepage');
                exit();
            } else {
                header('Location: ../index.php?login=error');
                exit();
            }
        }
    } else  {
        header('Location: ../index.php?login=error');
        exit();
    }
?>