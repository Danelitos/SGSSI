<?php

require 'conexion.php';
session_start();
if (!isset($_SESSION['miSesion']) && $_GET["csrf"] == $_SESSION["token"]){
    header("Location:index.php");
} 


$conn->set_charset("utf8");
$id=$_GET["Id"];

$coche = "SELECT * FROM coches WHERE Id = $id";


session_start();
if (!empty($_POST["botonModificar"])) {
    $nombre = $_POST['nombreCoche'];
    $marca = $_POST['marca'];
    $color = $_POST['color'];
    $caballos = $_POST['caballos'];
    $precio = $_POST['precio'];

    $sql = "UPDATE `coches` SET Nombre='$nombre',Marca='$marca',Color='$color',Caballos='$caballos',Precio='$precio' WHERE Id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo "<script> alert('Datos actualizados correctamente') </script>";
        } else {
            echo "<script> alert('Datos actualizados correctamente') </script>";
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
            <h1>Modificar datos coche </h1>
        </header>
        <?php
                
                $resultado=mysqli_query($conn,$coche);
                while($mostrar=mysqli_fetch_array($resultado)){
        ?>
        <form class="formulario" method="POST">
            <label>Nombre</label>
            <input class="controles" type="text" value="<?php echo $mostrar['Nombre'] ?>" minlength="3" name="nombreCoche" /> <br />
            <label>Marca</label>
            <input class="controles" type="text" value="<?php echo $mostrar['Marca'] ?>" minlength="3" name="marca" /> <br />
            <label>Color</label>
            <input class="controles" type="text" value="<?php echo $mostrar['Color'] ?>" name="color" /> <br />
            <label>Caballos</label>
            <input class="controles" type="text" value=<?php echo $mostrar['Caballos'] ?> pattern="[0-9]{3}" minlength="2" maxlength="3" name="caballos" /> <br />
            <label>Precio</label>
            <input class="controles" type="text" value=<?php echo $mostrar['Precio'] ?> pattern="[0-9]{6}\,[0-9]{2}" minlength="2" maxlength="9" name="precio" /> <br />
            <input type="hidden" name="csrf" value="<?php echo $_SESSION["token"]; ?>">
            <input class="botones" type="submit" value="Actualizar datos" name="botonModificar" />
            <a href="coches.php"><p>Volver</p></a>
        </form>
        <?php
            }
        ?>

    </div>
    <footer>
        &copy; 2022 Copyrigth: Coches.com
    </footer>
</body>

</html>