 <?php
    echo "<datalist id=clasif>";
    include 'scripts/database.php';
    $s = "SELECT DISTINCT clasif FROM Escuadria WHERE 1 ORDER BY clasif;";
    $q = mysqli_query($db, $s);
    if (mysqli_num_rows($q) > 0) {
        while ($row = mysqli_fetch_assoc($q)) {
            echo "<option value=".$row['clasif'].">";
        }
    }
    echo "</datalist>";
?>