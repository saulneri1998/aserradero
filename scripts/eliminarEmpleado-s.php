<?php 
    include 'database.php';
    
    if (isset($_POST['elimEmp'])) {
        $curp = mysqli_real_escape_string($db, $_POST['curp']);
        
        if (empty($curp)) {
            header("Location: ../main.php?loc=eliminarEmpleado?eliminar=empty");
            exit();
        } else {
            $s = "SELECT * FROM Empleado WHERE curp = '$curp';";
            $q = mysqli_query($db, $s);
            if (mysqli_num_rows($q) > 0) {
                $s = "DELETE FROM Empleado WHERE curp = '$curp';";
                mysqli_query($db, $s);
                header("Location: ../main.php?loc=eliminarEmpleado?eliminar=success");
                exit();
            } else {
                header("Location: ../main.php?loc=eliminarEmpleado?eliminar=noexiste");
                exit();
            }
        }
    } else {
        header("Location: ../main.php?loc=eliminarEmpleado?eliminar=error");
        exit();
    }
?>