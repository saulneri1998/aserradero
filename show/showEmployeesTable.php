<?php
    include 'scripts/database.php';

    $s = "SELECT * FROM Empleado WHERE 1 ORDER BY curp;";
    $q = mysqli_query($db, $s);
    $n = mysqli_num_rows($q);
    if ($n > 0) {
        while ($row = mysqli_fetch_assoc($q)) {
            echo "  <tr>
                        <td>".$row['nombre']." ".$row['apellido']."</td>
                        <td>".$row['curp']."</td>  
                        <td>".$row['telefono']."</td>
                        <td>".$row['salario']."</td>
                        <td>".$row['fechaIngreso']."</td>
                    </tr>";
        }
    }
?>  