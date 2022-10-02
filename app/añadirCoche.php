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
            <input class="controles" type="color" name="color" /> <br />
            <label>Caballos</label>
            <input class="controles" placeholder="Ingerese los caballos" type="text" pattern="[0-9]{3}" minlength="2" maxlength="3" name="caballos" /> <br />
            <label>Precio</label>
            <input class="controles" placeholder="Ingerese el precio" type="text" pattern="[0-9]{6}\,[0-9]{2}" minlength="2" maxlength="3" name="precio" /> <br />
            <input class="botones" type="submit" value="Añadir Coche" name="botonAñadir" />
            <a href="coches.php"><p>Volver</p></a>
        </form>


    </div>
    <footer>
        &copy; 2022 Copyrigth: Coches.com
    </footer>
</body>

</html>