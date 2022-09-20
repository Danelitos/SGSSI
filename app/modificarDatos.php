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
                <h1>Modificar datos de tu cuenta </h1>
            </header>
        
        <form class="formulario">
            <label>Nombre</label>
            <input class="controles" placeholder="Ingerese su nombre" type="text" minlength="3"/> <br />
            <label>Apellidos</label>
            <input class="controles" placeholder="Ingerese sus apellidos" type="text" minlength="3" /> <br />
            <label>DNI</label>
            <input class="controles" placeholder="Ejemplo: 11111111-Z" type="text" pattern="[0-9]{8}\-[A-Z]" minlength="10" maxlength="10"/> <br />
            <label>Teléfono</label>
            <input class="controles" placeholder="Ingerese su telefono" type="tel" pattern="[0-9]{9}" minlength="9" maxlength="9"/> <br />
            <label>Fecha de nacimiento</label>
            <input class="controles"  type="date" min="1900-01-01"/> <br />
            <label>Correo electrónico</label>
            <input class="controles" placeholder="ejemplo@servidor.extension" type="email" minlength="3" /> <br />
            <label>Contraseña</label>
            <input class="controles" placeholder="Ingerese su contraseña (8 caracteres mínimo)" type="password" minlength="8" required/> <br />
            <input class="botones" type="submit" value="Guardar cambios" />
        </form>


        </div>
        <footer>
            &copy; 2022 Copyrigth: Coches.com
        </footer>       
    </body>
</html>