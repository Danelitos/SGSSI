<?php
require 'conexion.php';
$conn->set_charset("utf8");

if (!empty($_POST["botonIniciar"])){
    if (!empty($_POST["email"]) and !empty($_POST["password"])){
        $correo=$_POST["email"];
        $contraseña=$_POST["password"];
        var_dump($correo);
        var_dump($contraseña);
        $sql=$conn->query("SELECT * FROM `usuarios` WHERE Email='$correo' AND Contraseña='$contraseña'");
        var_dump($sql);
        if ($datos=$sql->fetch_object()){
            header("Location: coches.php");
        }
        else{
            echo '<div class="alert alert-danger">ACCESO DENEGADO</div>';
        }
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Coches.eus</title>
        <link rel="stylesheet" href="CSS/estilo.css" />
        <link rel="icon" href="img/coche1.ico">
    </head>
    <body>
        <div id="containerLogin">
            <header>
                <h1>Inicia sesión para comprar un coche</h1>
            </header>

            <form class="formulario" method="POST">
                <label>Correo electrónico</label>
                <input class="controles" placeholder="ejemplo@servidor.extension" type="email" minlength="3" name="email"/> <br />
                <label>Contraseña</label>
                <input class="controles" placeholder="Ingerese su contraseña (8 caracteres mínimo)" type="password" minlength="8" required name="password"/> <br />
                <input class="botones" type="submit" value="Iniciar sesión" name="botonIniciar"/> <br />
                <a href="cambioContraseña.php"><p>¿Olvidaste la contraseña?</p></a> <br />
                <a href="registro.php"><p>Crear una cuenta</p></a> <br />
                <a href="coches.php"><p>Página COCHES</p></a>
            </section>
        </div>
        <marquee class="animacion" scrollamount="90" direction="right" width="100%">
            <img src="img/formula.gif" width="150px" height="150px" />
        </marquee>
        <footer>
            &copy; 2022 Copyrigth: Coches.com
        </footer>
    </body>
</html>