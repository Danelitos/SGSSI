<?php
require 'conexion.php';
$conn->set_charset("utf8");
session_start();
session_start();
if (!isset($_SESSION['miSesion']) && !isset($_SESSION['token'])){
    header("Location:index.php");
} 


$id= $_GET["Id"];
$coche = "SELECT * FROM coches WHERE Id = $id";


?>

<!DOCTYPE html>
<html>

<head>
        <meta charset="utf-8">
        <link rel="icon" href="img/coche1.ico">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <title>Coches.eus</title>
        <meta name="description" content="">
        <meta name="viewport" content="widht=device-width, initial-sacle=1">
        <link rel="stylesheet" href="CSS/stylePaginaCoches.css" />
        <link rel="stylesheet" href="CSS/estiloListaCoches.css" />
        <script src="JS/confirmacion.js"></script>
    
</head>

<body>
    <header>
            <img class="logo" src="img/coche1.png" alt="">
            <nav>
                <ul class="nav_links">
                    <li><a href="coches.php">Inicio</a></li>
                    <li><a href="añadirCoche.php">Añadir Coche</a></li>
                </ul>
            </nav>
            <div class="dropdown">
                <a class="dropbtn" href="#"><button>Perfil</button></a>
                <div class="dropdown-content">
                    <a href="modificarDatos.php">Modificar Datos</a>
                    <a href="index.php">Cerrar sesión</a>
                </div>
            </div>
        </header>

        <table>
            <tr><th colspan="7"><h1>Catalogo Coches</h1></th></tr>
            <tr>
                
                <td>Nombre</td>
                <td>Marca</td>
                <td>Color</td>
                <td>Caballos</td>
                <td>Precio</td>
                <td>Acción</td>
            </tr>
            <?php
                
                $resultado=mysqli_query($conn,$coche);
                while($mostrar=mysqli_fetch_array($resultado)){
            ?>
            <tr>
                
                <td class="texto"><?php echo $mostrar['Nombre'] ?></td>
                <td class="texto"><?php echo $mostrar['Marca'] ?></td>
                <td class="texto"><?php echo $mostrar['Color'] ?></td>
                <td class="texto"><?php echo $mostrar['Caballos'] ?></td>
                <td class="texto"><?php echo $mostrar['Precio'] ?></td>
                <td class="botones"><a class="botonModificar" href="modificarDatosCoche.php?Id=<?php echo $mostrar['Id']; ?>">Modificar

                <a onclick="confirmacion(event)" class ="botonEliminar" href="eliminar.php?Id=<?php echo $mostrar['Id']; ?>"> <img class="logoPapelera" src="img/papelera.png" alt=""></td>

            </tr>
            <?php
                }
            ?>
        </table>
    <footer>
        &copy; 2022 Copyrigth: Coches.com
    </footer>
</body>

</html>