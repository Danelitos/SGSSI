<?php

  require 'conexion.php';

  $message = '';

  if (!empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['dni']) && !empty($_POST['telefono']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $dni=$_POST['dni'];
    $telefono=$_POST['telefono'];
    $fechanacimiento=$_POST['fechanacimiento'];
    $email=$_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    
    $sql = "INSERT INTO `usuarios` (Nombre,Apellidos,Dni,Telefono,Email,Fecha_Ncto,Contraseña) VALUES (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssss', $nombre,$apellidos,$dni,$telefono,$fechanacimiento,$email,$password);


    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
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
        <?php if(!empty($message)): ?>
        <p> <?= $message ?></p>
        <?php endif; ?>
        <div id="containerRegistro">
            <header>
                <h1>Crear cuenta personal </h1>
            </header>
        
        <form class="formulario" method="POST">
            <label>Nombre</label>
            <input class="controles" placeholder="Ingerese su nombre" type="text" minlength="3" name="nombre"/> <br />
            <label>Apellidos</label>
            <input class="controles" placeholder="Ingerese sus apellidos" type="text" minlength="3" name="apellidos"/> <br />
            <label>DNI</label>
            <input class="controles" placeholder="Ejemplo: 11111111-Z" type="text" pattern="[0-9]{8}\-[A-Z]" minlength="10" maxlength="10" name="dni"/> <br />
            <label>Teléfono</label>
            <input class="controles" placeholder="Ingerese su telefono" type="tel" pattern="[0-9]{9}" minlength="9" maxlength="9" name="telefono"/> <br />
            <label>Fecha de nacimiento</label>
            <input class="controles"  type="date" min="1900-01-01" name="fechanacimiento"/> <br />
            <label>Correo electrónico</label>
            <input class="controles" placeholder="ejemplo@servidor.extension" type="email" minlength="3" name="email"/> <br />
            <label>Contraseña</label>
            <input class="controles" placeholder="Ingerese su contraseña (8 caracteres mínimo)" type="password" minlength="8" required name="password"/> <br />
            <input class="botones" type="submit" value="Crear Cuenta" name="botonCrear"/>

            <a href="index.php"><p>¿Ya tienes una cuenta personal?</p></a>
        </form>


        </div>
        <footer>
            &copy; 2022 Copyrigth: Coches.com
        </footer>       
    </body>
</html>