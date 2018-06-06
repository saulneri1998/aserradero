<?php 
    include 'database.php';
    
    if (isset($_POST['agEmp'])) {
        $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
        $apellidos = mysqli_real_escape_string($db, $_POST['apellidos']);
        $tel = mysqli_real_escape_string($db, $_POST['tel']);
        $curp = mysqli_real_escape_string($db, $_POST['curp']);
        $fecha = mysqli_real_escape_string($db, $_POST['fecha']);
        $salario = mysqli_real_escape_string($db, $_POST['salario']);
        
        
        if (empty($nombre) || empty($apellidos) || empty($tel) || empty($curp) || empty($fecha) || empty($salario)) {
            header("Location: ../main.php?loc=agregarEmpleado?agregar=empty");
            exit();
        } else {
            $s = "SELECT * FROM Empleado WHERE curp = '$curp';";
            $q = mysqli_query($db, $s);
            if (mysqli_num_rows($q) > 0) {
                header("Location: ../main.php?loc=agregarEmpleado?agregar=existe");
                exit();
            } else {
                $date = date($fecha);
                $s = "INSERT INTO Empleado (nombre, apellido, curp, salario, telefono, fechaIngreso) VALUES ('$nombre', '$apellidos', '$curp', '$salario', '$tel', '$date');";
                mysqli_query($db, $s);
                header("Location: ../main.php?loc=agregarEmpleado?agregar=success");
                exit();
            }
        }
    } else {
        header("Location: ../main.php?loc=agregarEmpleado?agregar=error");
        exit();
    }
?>