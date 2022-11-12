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
    $salt = md5(uniqid(rand(), true)); // O incluso mejor si tuviese mayúsculas, minúsculas, caracteres especiales...
    $contraseña = hash('sha512', $salt.$password); // Puede ponerse delante o detrás, es igual  
  
    $sql = $conn->query("SELECT Id FROM `usuarios` WHERE Email='$email'");
    if (mysqli_num_rows($sql) > 0) {
      $message = 'El gmail introducido ya se encuentra registrado en la base de datos';}
    else{

      $sql = "INSERT INTO `usuarios` (Nombre,Apellidos,Dni,Telefono,Email,Fecha_Ncto,Salt,Contraseña,intentosFallidos,Estado) VALUES (?,?,?,?,?,?,?,?,?,?)";
      $stmt = $conn->prepare($sql);
      $intentos=0;
      $estado="activo";
      $stmt->bind_param('ssssssssis', $nombre,$apellidos,$dni,$telefono,$email,$fechanacimiento,$salt,$contraseña,$intentos,$estado);
      if ($stmt->execute()) {
        $message = 'La cuenta se ha creado correctamente.';
      } else {
          $message = 'Lo sentimos, no se ha podido crear la cuenta por algun error.';
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
        <script type="text/javascript" src="/JS/evitarReenvio.js"></script>
    </head>
    <body>

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
            <input class="controles" type="text" placeholder="Ejemplo: 11111111-Z" id="dni" name="dni"/> <br />
            <label>Teléfono</label>
            <input class="controles" type="tel" placeholder="Ingerese su telefono" id="telefono" name="telefono"/> <br />
            <label>Fecha de nacimiento</label>
            <input class="controles"  type="text" placeholder="Ejemplo: 2008-12-12" id="fechanacimiento" name="fechanacimiento"/> <br />
            <label>Correo electrónico</label>
            <input class="controles" type="email" placeholder="ejemplo@servidor.extension" id="email" name="email"/> <br />
            <label>Contraseña</label>
            <input class="controles" placeholder="Ingerese su contraseña (8 caracteres mínimo)" type="password" id="password" name="password"/> <br />
            <?php if(!empty($message)): ?>
            <p> <?= $message ?></p>
            <?php endif; ?>
            <input class="botones" type="submit" value="Crear Cuenta" id="botonCrear"/>
            
            <!––antes de enviar a la base de datos, se comprueban que los datos son correctos -->
    
            <a href="index.php"><p>¿Ya tienes una cuenta personal?</p></a>
        </form>


        </div>
        <footer>
            &copy; 2022 Copyrigth: Coches.com
        </footer>       
    </body>
</html>