 <?php
    echo "<datalist id=ejidos>";
    include 'scripts/database.php';
    $s = "SELECT DISTINCT ejido FROM Compra ORDER BY ejido;";
    $q = mysqli_query($db, $s);
    if (mysqli_num_rows($q) > 0) {
        while ($row = mysqli_fetch_assoc($q)) {
            echo "<option value=".$row['ejido'].">";
        }
    }
    echo "</datalist>";
?>