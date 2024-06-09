<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Continuous Fit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 2.5em;
        }
        p {
            color: #666;
            margin-bottom: 30px;
            font-size: 1.2em;
        }
        .features {
            margin-top: 20px;
            text-align: left;
            display: inline-block;
        }
        .features ul {
            padding: 0;
            list-style: none;
        }
        .features li {
            margin-bottom: 10px;
            font-size: 1em;
            padding-left: 1.2em;
            text-indent: -1.2em;
        }
        .features li::before {
            content: "•";
            color: #3273dc;
            padding-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Bienvenido a Continuous Fit</h1>
        <p>Descubre una forma eficiente de gestionar tus entrenamientos. Nuestra plataforma te permite:</p>
        <div class="features">
            <ul>
                <li>Crear rutinas personalizadas para tus entrenamientos.</li>
                <li>Registrar cada sesión de entrenamiento de manera detallada.</li>
                <li>Acceder a un historial completo de tus entrenamientos.</li>
            </ul>
        </div>
        <p>¡Empieza hoy mismo y lleva tu entrenamiento al siguiente nivel!</p>
        <a href="{{ route('login') }}" class="button is-primary">Iniciar Sesión</a>
        <a href="{{ route('register') }}" class="button is-primary">Registrarte</a>
        <a href="{{ route('about') }}" class="button is-link">Conócenos</a>
    </div>
</body>
</html>
