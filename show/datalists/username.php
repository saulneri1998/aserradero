 <?php
    echo "<datalist id=username>";
    include 'scripts/database.php';
    $s = "SELECT DISTINCT usuario FROM Usuario WHERE 1 ORDER BY usuario;";
    $q = mysqli_query($db, $s);
    if (mysqli_num_rows($q) > 0) {
        while ($row = mysqli_fetch_assoc($q)) {
            echo "<option value=".$row['usuario'].">";
        }
    }
    echo "</datalist>";
?>