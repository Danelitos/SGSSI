<?php

  require 'conexion.php';
  $conn->set_charset("utf8");

  if (!empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['dni']) && !empty($_POST['telefono']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $dni=$_POST['dni'];
    $telefono=$_POST['telefono'];
    $fechanacimiento=$_POST['fechanacimiento'];
    $email=$_POST['email'];
    $password = $_POST['password'];
    //$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    
    
    $sql = "INSERT INTO `usuarios` (Nombre,Apellidos,Dni,Telefono,Email,Fecha_Ncto,Contraseña) VALUES (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssss', $nombre,$apellidos,$dni,$telefono,$email,$fechanacimiento,$password);
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
        
        <form class="formulario" method="POST" onsubmit="return validarFormulario()" id="formulario">
            <label>Nombre</label>
            <input class="controles" placeholder="Ingerese su nombre" type="text" id="nombre" name="nombre"/> <br />
            <label>Apellidos</label>
            <input class="controles" placeholder="Ingerese sus apellidos" type="text" id="apellidos" name="apellidos"/> <br />
            <label>DNI</label>
            <input class="controles" placeholder="Ejemplo: 11111111-Z" id="dni" name="dni"/> <br />
            <label>Teléfono</label>
            <input class="controles" placeholder="Ingerese su telefono" id="telefono" name="telefono"/> <br />
            <label>Fecha de nacimiento</label>
            <input class="controles"  type="date" min="1900-01-01" id="fechanacimiento" name="fechanacimiento"/> <br />
            <label>Correo electrónico</label>
            <input class="controles" placeholder="ejemplo@servidor.extension" id="email" name="email"/> <br />
            <label>Contraseña</label>
            <input class="controles" placeholder="Ingerese su contraseña (8 caracteres mínimo)" type="password" id="password" name="password"/> <br />
            <input class="botones" type="submit" value="Crear Cuenta" id="botonCrear"/>
            
            <!––antes de enviar a la base de datos, se comprueban que los datos son correctos -->

            <a href="index.php"><p>¿Ya tienes una cuenta personal?</p></a>
            <script src="JS/formulario.js"></script>
        </form>


        </div>
        <footer>
            &copy; 2022 Copyrigth: Coches.com
        </footer>       
    </body>
</html>