<?php
require 'conexion.php';
$conn->set_charset("utf8");

if (!empty($_POST["botonCambiar"])){
    if (!empty($_POST["email"]) and !empty($_POST["password"]) and !empty($_POST["Rpassword"])){
        $correo=$_POST["email"];
        $contraseña=$_POST["password"];
        $Rcontraseña=$_POST["Rpassword"];
        $sql=$conn->query("SELECT Id FROM `usuarios` WHERE Email='$correo'");
        if (mysqli_num_rows($sql) > 0){
            $result=$sql->fetch_assoc();
            $id=$result['Id'];
            if ($contraseña==$Rcontraseña){
                $salt = md5(uniqid(rand(), true)); // O incluso mejor si tuviese mayúsculas, minúsculas, caracteres especiales...
                $hash = hash('sha512', $salt.$contraseña); // Puede ponerse delante o detrás, es igual 
                $sql = "UPDATE `usuarios` SET Contraseña='$hash',Salt='$salt' WHERE Id='$id'";
                if (mysqli_query($conn,$sql)){
                    $message = "La contraseña se cambio con éxito";
                }
            }
            else{
                $message = 'Contraseñas diferentes';
            }
        }
        else{
            $message = 'EL CORREO NO EXISTE';
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
        <script src="JS/formulario.js"></script>
    </head>
    <body>
        <div id="containerLogin">
            <header>
                <h1>Cambio de contraseña</h1>
            </header>
            <form class="formulario" method="POST" id="formulario">
                <label>Correo electrónico</label>
                <input class="controles" placeholder="ejemplo@servidor.extension" type="email" id="email" minlength="3" name="email"/> <br />
                <label>Contraseña nueva</label>
                <input class="controles" placeholder="Ingerese su contraseña nueva (8 caracteres mínimo)" type="password" id="password2" minlength="8" required name="password"/> <br />
                <label>Repetir contraseña nueva</label>
                <input class="controles" placeholder="Ingerese de nuevo su contraseña nueva (8 caracteres mínimo)" type="password" id="Rpassword" minlength="8" required name="Rpassword"/> <br />
                <?php if(!empty($message)): ?>
                <p> <?= $message ?></p>
                <?php endif; ?>
                <input class="botones" type="submit" value="Guardar Cambios" name="botonCambiar" id="botonCambiar"/> <br />
                <a href="index.php"><p>Iniciar sesión</p></a> <br />
                <a href="registro.php"><p>Crear una cuenta</p></a> <br />
            </form>
        </div>
        <footer>
            &copy; 2022 Copyrigth: Coches.com
        </footer>
    </body>
</html>