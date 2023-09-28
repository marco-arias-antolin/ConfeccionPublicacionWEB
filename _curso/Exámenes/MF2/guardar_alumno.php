<?php
// Establecer la conexión a la base de datos
$host = 'localhost';
$db = 'BDGRUPO1';
$user = 'root';
$password = '';

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los valores del formulario
$nif = $_POST['nif'];
$apellidos = $_POST['apellidos'];
$nombre = $_POST['nombre'];
$fechaAlta = $_POST['fecha_alta'];

// Insertar los datos en la tabla "alumnos"
$sql = "INSERT INTO alumnos (NIF, APELLIDOS, NOMBRE, FECHADEALTA) VALUES ('$nif', '$apellidos', '$nombre', '$fechaAlta')";

if ($conn->query($sql) === TRUE) {
    echo "Alumno guardado correctamente";
} else {
    echo "Error al guardar el alumno: " . $conn->error;
}

$conn->close();
?>