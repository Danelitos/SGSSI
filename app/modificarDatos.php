<?php

require 'conexion.php';
$conn->set_charset("utf8");
session_start();
$correoLogin = $_SESSION["miSesion"][0];
if (!empty($_POST["botonModificar"])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $fechanacimiento = $_POST['fechanacimiento'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //$password = password_hash($_POST['password'], PASSWORD_BCRYPT);


    $sql = $conn->query("SELECT Id FROM `usuarios` WHERE Email='$correoLogin'");
    if (mysqli_num_rows($sql) > 0) {
        $result = $sql->fetch_assoc();
        $id = $result['Id'];
        $sql = "UPDATE `usuarios` SET Nombre='$nombre',Apellidos='$apellidos',Dni='$dni',Telefono='$telefono',Email='$email',Fecha_Ncto='$fechanacimiento',Contraseña='$password' WHERE Id='$id'";
        if (mysqli_query($conn, $sql)) {
            $message='<div class="alert alert-danger">Datos modificados con éxito</div>';
        } else {
            $message='<div class="alert alert-danger">Error al modificar los datos</div>';
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
    <div id="containerRegistro">
        <header>
            <h1>Modificar datos de tu cuenta </h1>
        </header>

        <form class="formulario" method="POST" onsubmit="return validarFormulario()" id="formulario">
            <label>Nombre</label>
            <input class="controles" placeholder="Ingerese su nombre" type="text" id="nombre" name="nombre"/> <br />
            <label>Apellidos</label>
            <input class="controles" placeholder="Ingerese sus apellidos" type="text" id="apellidos" name="apellidos"/> <br />
            <label>DNI</label>
            <input class="controles" placeholder="Ejemplo: 11111111-Z" type="text" id="dni" name="dni"/> <br />
            <label>Teléfono</label>
            <input class="controles" placeholder="Ingerese su telefono" type="tel" id="telefono" name="telefono"/> <br />
            <label>Fecha de nacimiento</label>
            <input class="controles"  type="date" min="1900-01-01" id="fechanacimiento" name="fechanacimiento"/> <br />
            <label>Correo electrónico</label>
            <input class="controles" placeholder="ejemplo@servidor.extension" type="email" id="email" name="email"/> <br />
            <label>Contraseña</label>
            <input class="controles" placeholder="Ingerese su contraseña (8 caracteres mínimo)" type="password" id="password" name="password"/> <br />
            <?php if(!empty($message)): ?>
            <p> <?= $message ?></p>
            <?php endif; ?>
            <input class="botones" type="submit" value="Guardar Cambios" name="botonModificar"/>
            <a href="coches.php"><p>Volver</p></a>
        </form>


    </div>
    <footer>
        &copy; 2022 Copyrigth: Coches.com
    </footer>
</body>

</html>