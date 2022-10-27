<?php
    session_start();
    if (isset($_SESSION['miSesion'])){
        //echo "hay sesion";
        header("Location:coches.php");
    }
    else{
        //echo "no hay sesion, hay que logearse";
        header("Location:login.php");
    }
?>