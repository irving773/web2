<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
            overflow: hidden;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #00ff00;
        }

        form {
            background: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 255, 0, 0.5);
            position: relative;
            z-index: 10; /* Asegura que el formulario esté por encima de la lluvia */
        }

        p {
            margin: 15px 0;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            border: 2px solid #00ff00;
            border-radius: 5px;
            background-color: #1a1a1a;
            color: #ffffff;
            width: 200px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #ff007f;
            outline: none;
        }

        input[type="submit"],
        .button {
            background-color: #00ff00;
            color: #000;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 1em;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        .button:hover {
            background-color: #ff007f;
        }

        .button {
            display: block;
            width: 100%;
            text-align: center;
        }

        .raindrop {
            position: absolute;
            top: -50px;
            font-size: 2em;
            animation: fall linear infinite;
        }

        @keyframes fall {
            0% {
                transform: translateY(0);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <form action="validar.php" method="post">
        <h1>Inicio de sesión</h1>
        <p>Usuario: <input type="text" placeholder="Ingrese su nombre" name="usuario"></p>
        <p>Contraseña: <input type="password" placeholder="Ingrese su contraseña" name="contraseña"></p>
        <input type="submit" value="Ingresar">
        <button class="button" onclick="location.href='crear_cuenta.html'; return false;">Crear cuenta</button>
        <button class="button" onclick="location.href='eliminar_usuario.php'; return false;">Eliminar usuario</button>
    </form>

    <script>
        function createRaindrop() {
            const raindrop = document.createElement('div');
            raindrop.className = 'raindrop';
            raindrop.innerText = '🎮';

            // Random position
            const randomX = Math.random() * window.innerWidth;
            raindrop.style.left = randomX + 'px';

            // Random animation duration
            const randomDuration = Math.random() * 2 + 3; // 3s to 5s
            raindrop.style.animationDuration = randomDuration + 's';

            document.body.appendChild(raindrop);

            // Remove the raindrop after falling
            raindrop.addEventListener('animationend', () => {
                raindrop.remove();
            });
        }

        // Create raindrops at intervals
        setInterval(createRaindrop, 300); // Create a new raindrop every 300ms
    </script>
</body>
</html>
