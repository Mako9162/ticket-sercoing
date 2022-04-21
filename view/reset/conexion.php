<?php
    $conexion = new mysqli("localhost", "root", "", "ticket");
    if($conexion->connect_errno){
        die('No se pudo conectar con el servidor');
    }
?>