<?php
    
    function timeOut(){
        if(isset($_SESSION['tiempo']) ) {

            //Tiempo en segundos para dar vida a la sesión.
            $inactivo = 118;//2min en este caso.
        
            //Calculamos tiempo de vida inactivo.
            $vida_session = time() - $_SESSION['tiempo'];
        
                //Compraración para redirigir página
                if($vida_session > $inactivo)
                {
                    //Removemos sesión.
                    session_unset();
                    //Destruimos sesión.
                    session_destroy();              
                    //Redirigimos pagina.
                    header("Location: login.php");
        
                    exit();
                } 
        
        
        } else {
            //Activamos sesion tiempo.
            $_SESSION['tiempo'] = time();
        }
    }

    

?>