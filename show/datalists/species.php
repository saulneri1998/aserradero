 <?php
    echo "<datalist id=species>";
    include 'scripts/database.php';
    $s = "SELECT DISTINCT especie FROM Madera WHERE 1 ORDER BY especie;";
    $q = mysqli_query($db, $s);
    if (mysqli_num_rows($q) > 0) {
        while ($row = mysqli_fetch_assoc($q)) {
            echo "<option value=".$row['especie'].">";
        }
    }
    echo "</datalist>";
?>