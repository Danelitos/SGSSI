<?php
    
    function anadirLog($correo,$entrada){ 
        require 'conexion.php';
        $conn->set_charset("utf8");  
        $sql = "INSERT INTO `log` (correoUsuario,entrada) VALUES (?,?)";
        $stmt = $conn->prepare($sql);
        $intentos=0;
        $estado="activo";
        $stmt->bind_param('ss', $correo,$entrada);
        $stmt->execute();

        if ($entrada=="fallida"){ //añadir intento fallido al usuario
            $sql="UPDATE usuarios SET IntentosFallidos=IntentosFallidos+1 WHERE Email='$correo'";

            if (mysqli_query($conn, $sql)) {
                echo "<script> alert('Intento fallido añadido') </script>";
            } else {
                echo "<script> alert('Error al meter el log') </script>";
            }

            //verificar si se ha llegado a 3 intentos fallidos
            $sql = $conn->query("SELECT IntentosFallidos FROM usuarios WHERE Email='$correo'");
            if (mysqli_num_rows($sql) > 0) {
                $result = $sql->fetch_assoc();
                $intentos = $result['IntentosFallidos'];
            }

            if ($intentos>=3){ //si es mayor a 3, se desactiva la cuenta y se reinicia a 0

                $sql="UPDATE usuarios SET IntentosFallidos=0,Estado='inactivo' WHERE Email='$correo'";

                if (mysqli_query($conn, $sql)) {
                    echo "<script> alert('Cuenta en estado inactivo') </script>";
                } else {
                    echo "<script> alert('Error al desactivar cuenta') </script>";
                }
            }

        }

        return true;
    }

    

?>