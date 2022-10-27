<?php

  require 'conexion.php';
  session_start();
  if (!isset($_SESSION['miSesion'])){
        header("Location:index.php");
  } 
  $conn->set_charset("utf8");

  if (!empty($_POST['nombreCoche']) && !empty($_POST['marca']) && !empty($_POST['color']) && !empty($_POST['caballos']) && !empty($_POST['precio'])) {
    $nombreCoche=$_POST['nombreCoche'];
    $marca=$_POST['marca'];
    $color=$_POST['color'];
    $caballos=$_POST['caballos'];
    $precio=$_POST['precio'];
    
    
    $sql = "INSERT INTO `coches` (Nombre,Marca,Color,Caballos,Precio) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssid', $nombreCoche,$marca,$color,$caballos,$precio);
    if ($stmt->execute()) {
      $message='<div class="alert alert-danger">Se ha añadido con éxito el coche</div>';
    } else {
      $message='<div class="alert alert-danger">No se ha podido añadir el coche</div>';

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
    <div id="containerRegistro">
        <header>
            <h1>Añadir coche </h1>
        </header>

        <form class="formulario" method="POST">
            <label>Nombre</label>
            <input class="controles" placeholder="Ingerese el nombre" type="text" minlength="3" name="nombreCoche" /> <br />
            <label>Marca</label>
            <input class="controles" placeholder="Ingerese la marca" type="text" minlength="3" name="marca" /> <br />
            <label>Color</label>
            <input class="controles" placeholder="Ingrese el color" type="text" name="color" /> <br />
            <label>Caballos</label>
            <input class="controles" placeholder="Ingerese los caballos" type="text" pattern="[0-9]{3}" minlength="2" maxlength="3" name="caballos" /> <br />
            <label>Precio</label>
            <input class="controles" placeholder="Ingerese el precio" type="text" pattern="[0-9]{6}\,[0-9]{2}" minlength="2" name="precio" /> <br />
            <?php if(!empty($message)): ?>
            <p> <?= $message ?></p>
            <?php endif; ?>
            <input class="botones" type="submit" value="Añadir Coche" name="botonAñadir" />
            <a href="coches.php"><p>Volver</p></a>
        </form>


    </div>
    <footer>
        &copy; 2022 Copyrigth: Coches.com
    </footer>
</body>

</html>