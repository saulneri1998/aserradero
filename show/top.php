<html>
    <head>
        <meta charset="UTF-8">
        <title>AHUACUITL</title>
        
        <link rel="stylesheet" href="/aserradero/css/loginStyles.css">
        <link href="/aserradero/css/cssreset.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    </head>
    <body>
        <div class="Spacer30"></div>
        <div id="ToolbarComplete">
            <ul id="ToolbarMenu">
                <li><a>Empleados</a>
                    <ul id="SubMenu">
                        <li><a href="main.php?loc=visualizarEmpleados">Visualizar</a></li>
                        <li><a href="main.php?loc=agregarEmpleado">Agregar</a></li>
                        <li><a href="main.php?loc=eliminarEmpleado">Eliminar</a></li>
                    </ul>
                </li>
                <li><a>Usuarios</a>
                    <ul id="SubMenu">
                        <li><a href="main.php?loc=visualizarUsuarios">Visualizar</a></li>
                        <li><a href="main.php?loc=signup">Agregar</a></li>
                        <li><a href="main.php?loc=eliminarUsuario">Eliminar</a></li>
                    </ul>
                </li>
                <li><a>Escuadrías</a>
                    <ul id="SubMenu">
                        <li><a href="main.php?loc=inventEscuadrias">Ver inventario</a></li>
                        <li><a href="main.php?loc=regCreacion">Creación</a></li>
                        <li><a href="main.php?loc=regSalida">Salida</a></li>
                    </ul>
                </li>
                <li><a>Trozos</a>
                    <ul id="SubMenu">
                        <li><a href="main.php?loc=inventRollo">Ver inventario</a></li>
                        <li><a href="main.php?loc=regEntrada">Entradas</a></li>
                        <li><a href="main.php?loc=regTransf">Transformación</a></li>
                        <li><a href="main.php?loc=historialCompras">Ver historial</a></li>
                    </ul>
                </li>
                <li><a>Estadísticas</a>
                    <ul id="SubMenu">
                        <li><a href="main.php?loc=estadTrozos">Trozos</a></li>
                        <li><a href="main.php?loc=estadEscuad">Escuadrías</a></li>
                    </ul>
                </li>
                <form method="POST" action="scripts/logout-s.php" style="float: right">
                    <button name="logout" type="submit"><img src="/aserradero/img/exit_icon.png" style="margin-top: -22px"></button>
                </form>
                <?php
                    if (isset($_SESSION['nombre'])) {
                        echo "<p style='float:right; font-size:22px; vertical-align:middle; line-height:48px; margin-right:10px'>Bienvenido " . $_SESSION["nombre"] . "</p>";
                    }
                ?>
            </ul>
        </div>