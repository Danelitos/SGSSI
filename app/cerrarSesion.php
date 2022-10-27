<?php
    ob_start();
    // Inicializar la sesión.
    session_start();
    // Destruir todas las variables de sesión.
    session_unset();
    // Finalmente, destruir la sesión.
    session_destroy();
    // Redirigir a la pagina de login.
    header("Location:index.php");
    ob_end_flush();
?>