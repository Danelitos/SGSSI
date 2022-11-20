<?php
    function anadirLogin($correo,$entrada,$fechaHora){ 
        //añadir linea en el fichero log
        $ip=$_SERVER['REMOTE_ADDR'];
        $logFile = fopen("log/log.txt", 'a+') or die("Error creando archivo");
        fwrite($logFile, "\n".$fechaHora."  ".$ip."  ".$correo."  Inicio de sesion ".$entrada) or die("Error escribiendo en el archivo");
        fclose($logFile);

    }

?>