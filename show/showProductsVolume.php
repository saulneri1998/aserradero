<?php
    include 'scripts/database.php';
    $s = "SELECT t1.ancho, t1.grueso, t2.longitud, t2.especie, t1.clasif, t3.cantidad FROM escuadria AS t1 INNER JOIN Madera AS t2 ON t1.maderaId = t2.id INNER JOIN productocantidad AS t3 ON t3.escuadriaId = t1.id ";
    $q = mysqli_query($db, $s);
    $pinom3 = 0;
    $cedrom3 = 0;
    $encinom3 = 0;
    $melinam3 = 0;
    $otrosm3 = 0;
    if (mysqli_num_rows($q) > 0) {
        while ($row = mysqli_fetch_assoc($q)) {
            $a = $row['ancho'];
            $g = $row['grueso'];
            $l = $row['longitud'];
            $n = $row['cantidad'];
            $m3 = (($a*0.01) * ($g*0.001) * ($l*0.01)) * $n;
            if ($row['especie'] == 'Pino') {
                $pinom3 = $pinom3 + $m3;
            } elseif ($row['especie'] == 'Cedro') {
                $cedrom3 = $cedrom3 + $m3;
            } elseif ($row['especie'] == 'Encino') {
                $encinom3 = $encinom3 + $m3;
            } elseif ($row['especie'] == 'Melina') {
                $melinam3 = $melinam3 + $m3;
            } else {
                $otrosm3 = $otrosm3 + $m3;
            }
        }
    }
$totalm3 = $pinom3 + $cedrom3 + $encinom3 + $melinam3 + $otrosm3;
    echo "  <tr>
                <td>Pino</td>
                <td>".$pinom3."</td>  
            </tr>
            <tr>
                <td>Cedro</td>
                <td>".$cedrom3."</td>  
            </tr>
            <tr>
                <td>Encino</td>
                <td>".$encinom3."</td>  
            </tr>
            <tr>
                <td>Melina</td>
                <td>".$melinam3."</td>  
            </tr>
            <tr>
                <td>Otros</td>
                <td>".$otrosm3."</td>  
            </tr>
            <tr>
                <td>TOTAL</td>
                <td>".$totalm3."</td>  
            </tr>";
?>