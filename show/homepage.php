<div id="darkenBG">
    <div id="TempTitle">
        <?php 
            if (isset($_SESSION['nombre'])) {
                echo "Bienvenido " . $_SESSION["nombre"];
            }
        ?>
    </div>
</div>
