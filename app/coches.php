<?php
require 'conexion.php';
$conn->set_charset("utf8");
session_start();
?>

<!DOCTYPE html>
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
            <tr><th colspan="3"><h1>Catalogo Coches</h1></th></tr>
            <tr>
                <td>Nombre</td>
                <td>Marca</td>
                <td>Visualizar</td>
                
            </tr>
            <?php
                $sql="SELECT * FROM `coches`";
                $resultado=mysqli_query($conn,$sql);
                while($mostrar=mysqli_fetch_array($resultado)){
            ?>
            <tr>
                
                <td class="texto"><?php echo $mostrar['Nombre'] ?></td>
                <td class="texto"><?php echo $mostrar['Marca'] ?></td>
                

                <td><a class="botonVer" href="verCoche.php?Id=<?php echo $mostrar['Id']; ?>"><img class="logoLupa" src="img/lupa.png" alt=""></td>
                
            </tr>
            <?php
                }
            ?>
        </table>
        <footer>
            &copy; 2022 Copyrigth: Coches.com
        </footer>
    </body>