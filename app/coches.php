<?php
require 'conexion.php';
$conn->set_charset("utf8");
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Coches.eus</title>
    <link rel="icon" href="img/coche1.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/estiloPaginaCoches.css" />
    <link rel="stylesheet" href="CSS/estiloListaCoches.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
    <div id="container">
        <nav class="navbar navbar-dark bg-dark">
            <label class="logo">
                <a href="#"><img src="img/coche1.png" alt=""></a>
            </label>
            <a class="nav-link" href="añadirCoche.php">Añadir coche</a>
            <a class="nav-link" href="modificarDatos.php">Modificar datos</a>
            <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown button
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </div>
        </nav>

        <table>
            <tr><th colspan="7"><h1>Catalogo Coches</h1></th></tr>
            <tr>
                <td>Id</td>
                <td>Nombre</td>
                <td>Marca</td>
                <td>Color</td>
                <td>Caballos</td>
                <td>Precio</td>
                <td>Acción</td>
            </tr>
            <?php
                $sql="SELECT * FROM `coches`";
                $resultado=mysqli_query($conn,$sql);
                while($mostrar=mysqli_fetch_array($resultado)){
            ?>
            <tr>
                <td><?php echo $mostrar['Id'] ?></td>
                <td><?php echo $mostrar['Nombre'] ?></td>
                <td><?php echo $mostrar['Marca'] ?></td>
                <td><?php echo $mostrar['Color'] ?></td>
                <td><?php echo $mostrar['Caballos'] ?></td>
                <td><?php echo $mostrar['Precio'] ?></td>
                <td>
                    <?php echo "<a href='modificarDatosCoche.php'><button class='botonModificar'>Modificar Datos</button></a>" ?>
                    <?php echo "<a href='index.php'><button class='botonEliminar'>Eliminar Coche</button></a>" ?>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
    <footer>
        &copy; 2022 Copyrigth: Coches.com
</body>

</html>