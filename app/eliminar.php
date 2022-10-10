<?php

require 'conexion.php';
$conn->set_charset("utf8");
$id = $_GET['Id'];
$sql = "DELETE FROM coches WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header("Location: coches.php");
} else {
    echo '<div class="alert alert-danger">Error al eliminar el coche</div>';
}
?>