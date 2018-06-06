<?php
    include 'scripts/database.php';

    $s = "SELECT * FROM Usuario WHERE 1 ORDER BY nombre, apellido;";
    $q = mysqli_query($db, $s);
    $n = mysqli_num_rows($q);
    if ($n > 0) {
        while ($row = mysqli_fetch_assoc($q)) {
            echo "  <tr>
                        <td>".$row['nombre']." ".$row['apellido']."</td>
                        <td>".$row['usuario']."</td>
                    </tr>";
        }
    }
?>  