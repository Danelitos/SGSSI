<?php
require 'conexion.php';
include("funciones.php");
$conn->set_charset("utf8");
session_start();


if (!empty($_POST["botonIniciar"])){
    if (!empty($_POST["email"]) and !empty($_POST["password"])){
        $correo=$_POST["email"];
        $password=$_POST["password"];
        $sql=$conn->query("SELECT * FROM `usuarios` WHERE Email='$correo'");
        if ($datos=$sql->fetch_assoc()){
            $salt=$datos['Salt'];
            $contraseña=$datos['Contraseña'];
            $hash = hash('sha512', $salt.$password);

            //cogemos la fecha y hora actual
            date_default_timezone_set('Europe/Madrid');
            $fechaHora= date('Y-m-d H:i:s');


            if ($contraseña==$hash){
                //comprobar estado de la cuenta
                $estado = $datos['Estado'];
                if ($estado=="inactivo"){ //cuenta inactiva
                    $message='<div class="alert alert-danger">CUENTA DESACTIVADA POR MOTIVOS DE SEGURIDAD</div>';
                }
                else{
                    //cuenta activa
                    $_SESSION["miSesion"]=array();
                    $_SESSION["miSesion"]=$correo; //cuando el inicio es correcto, se mete en la variable de session
                
                    //añadimos log del intento de la entrada correcta
                    anadirLog($correo,"correcta",$fechaHora);
                    header('location:coches.php');
                }
            }
            else{
                //añadimos el log fallido
                $message='<div class="alert alert-danger">ACCESO DENEGADO</div>';
                anadirLog($correo,"fallida",$fechaHora);
                
            }
        }
        else{
            $message = 'NO EXISTE EL USUARIO';
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
        <script type="text/javascript" src="/JS/evitarReenvio.js"></script>
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
                <?php if(!empty($message)): ?>
                <p> <?= $message ?></p>
                <?php endif; ?>
                <input class="botones" type="submit" value="Iniciar sesión" name="botonIniciar"/> <br />
                <a href="cambioContraseña.php"><p>¿Olvidaste la contraseña?</p></a> <br />
                <a href="registro.php"><p>Crear una cuenta</p></a> <br />
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