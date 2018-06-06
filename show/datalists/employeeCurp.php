 <?php
    echo "<datalist id=employeeCurp>";
    include 'scripts/database.php';
    $s = "SELECT DISTINCT curp FROM Empleado WHERE 1 ORDER BY curp;";
    $q = mysqli_query($db, $s);
    if (mysqli_num_rows($q) > 0) {
        while ($row = mysqli_fetch_assoc($q)) {
            echo "<option value=".$row['curp'].">";
        }
    }
    echo "</datalist>";
?>