<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
</head>
<body>
    <h1>Crear Cuenta</h1>
    <form action="registro.php" method="post">
        <p>Usuario: <input type="text" name="usuario" required></p>
        <p>Email: <input type="email" name="email" required></p>
        <p>Contraseña: <input type="password" name="contraseña" required></p>
        <input type="submit" value="Registrar">
    </form>

    <?php
    if (isset($_SESSION['error'])) {
        echo "<p style='color:red;'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        echo "<p style='color:green;'>" . $_SESSION['success'] . "</p>";
        unset($_SESSION['success']);
    }
    ?>
</body>
</html>
