<?php
    $cnx = new mysqli("localhost","root","root","BDEJEMPLO");
    if ($cnx->error) {
        die("Error de conexión");
    }
    else {
        $cnx->query("SET NAMES utf8mb4");
    }
?>