<?php
    include 'scripts/database.php';

    $s = "SELECT t1.ancho, t1.grueso, t2.longitud, t2.especie, t1.clasif, t3.cantidad FROM escuadria AS t1 INNER JOIN Madera AS t2 ON t1.maderaId = t2.id INNER JOIN productocantidad AS t3 ON t3.escuadriaId = t1.id ORDER BY especie, clasif, longitud, ancho, grueso";
    $q = mysqli_query($db, $s);
    $n = mysqli_num_rows($q);
    if ($n > 0) {
        while ($row = mysqli_fetch_assoc($q)) {
            echo "  <tr>
                        <td>".$row['ancho']."</td>
                        <td>".$row['grueso']."</td>  
                        <td>".$row['longitud']."</td>
                        <td>".$row['clasif']."</td>
                        <td>".$row['especie']."</td>
                        <td>".$row['cantidad']."</td>
                    </tr>";
        }
    }
?>  