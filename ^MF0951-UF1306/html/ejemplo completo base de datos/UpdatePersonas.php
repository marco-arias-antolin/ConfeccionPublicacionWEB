<?php
    if (!isset($_POST['saveData'])) {
        header("Location:index.php");
    }
    else {
        extract($_POST);
        require_once("conexion.php");
        $param = $cnx->prepare("UPDATE personas SET apellidos = ?, nombre = ?, fechaNacimiento = ? WHERE nif like ?");
        $param->bind_param("ssss",strtoupper($apellidos),strtoupper($nombre),$fechaNacimiento,$nif);
        $param->execute();
        $cnx->close();
        $url = "updatePersona.php?id=$nif";
        header("Location: $url");
    }
?>