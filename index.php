<html>
    <head>
        <meta charset="UTF-8">
        <title>AHUACUITL Login</title>
        <link rel="stylesheet" href="/aserradero/css/loginStyles.css">
        <link href="/aserradero/css/cssreset.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,900" rel="stylesheet">
    </head>

    <body>
        <div class="Spacer30"></div>
        <div id="TempTitle">
            AHUACUITL <span id="TM"></span>
        </div>
        <div class="Spacer100"></div>
        <form id="loginForm" method="POST" action="/aserradero/scripts/login-s.php">
            <div class="loginContainer">
                <div class="Spacer30"></div>
                <input type="text" placeholder="Usuario" name="l_username">
                <div class="Spacer30"></div>
                <input type="password" placeholder="Contraseña" name="l_password">
                <div class="Spacer30"></div>
                <button type="submit" name="login">Login</button>
                <?php
                    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    if (strpos($url, "login=empty") == true) {
                        echo '<p>Hay campos en blanco</p>';
                    } elseif (strpos($url, "login=error") == true) {
                        echo '<p>Ocurrió un error, intenta de nuevo</p>';
                    } elseif (strpos($url, "status=error") == true) {
                        echo '<p>Es necesario que inicies sesión para acceder al sistemas</p>';
                    }
                ?>
            </div>
        </form>
        <div class="Spacer30"></div>
    </body>
</html>