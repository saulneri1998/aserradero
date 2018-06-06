<?php
    include 'scripts/database.php';

    $s = "SELECT t1.diametro, t2.longitud, t2.especie, t3.cantidad FROM MaderaEnRollo AS t1 INNER JOIN Madera AS t2 ON t1.maderaId = t2.id INNER JOIN RolloCantidad AS t3 ON t3.maderaRolloId = t1.id ORDER BY especie, longitud, diametro";
    $q = mysqli_query($db, $s);
    $n = mysqli_num_rows($q);
    if ($n > 0) {
        while ($row = mysqli_fetch_assoc($q)) {
            echo "  <tr>
                        <td>".$row['especie']."</td>
                        <td>".$row['diametro']."</td>  
                        <td>".$row['longitud']."</td>
                        <td>".$row['cantidad']."</td>
                    </tr>";
        }
    }
?>  