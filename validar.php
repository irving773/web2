<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = new mysqli("localhost", "root", "", "login");

    // Verificar conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Obtener datos del formulario
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Usar consultas preparadas
    $stmt = $conexion->prepare("SELECT * FROM usuario WHERE Usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        if (password_verify($contraseña, $row['Contraseña'])) {
            $_SESSION['usuario'] = $usuario;
            header("Location: home.php");
            exit();
        } else {
            $_SESSION['error'] = "ERROR EN LA AUTENTIFICACION";
        }
    } else {
        $_SESSION['error'] = "ERROR EN LA AUTENTIFICACION";
    }

    header("Location: index.php");
    exit();

    $stmt->close();
    $conexion->close();
}
?>
