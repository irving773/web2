<?php
// eliminar_usuario.php

// Configura tu conexión a la base de datos
$servername = "localhost"; // Cambia esto si es necesario
$username = "tu_usuario";   // Tu usuario de base de datos
$password = "tu_contraseña"; // Tu contraseña de base de datos
$dbname = "tu_base_de_datos"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el nombre de usuario a eliminar
$usuario = $_POST['usuario']; // El nombre de usuario que se envía desde el formulario

// Preparar y ejecutar la consulta
$sql = "DELETE FROM usuarios WHERE nombre_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);

if ($stmt->execute()) {
    echo "Usuario eliminado con éxito.";
} else {
    echo "Error al eliminar el usuario: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
