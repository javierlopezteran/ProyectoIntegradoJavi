<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Continuous Fit</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            /* Establecer imagen de fondo */
            /*No consigo poner esta foto de fondo */
            /* background-image: url('ruta/a/la/imagen.jpg'); */
            background-size: cover; /* Ajustar imagen al tamaño del contenedor */
            background-position: center; /* Centrar la imagen */
        }
        .container {
            background: rgba(255, 255, 255, 0.8); /* Fondo semitransparente */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #3273dc;
            margin-bottom: 20px;
            font-size: 2.5em;
        }
        p {
            color: #4a4a4a;
            margin-bottom: 30px;
            font-size: 1.2em;
        }
        .button.is-primary {
            background-color: #3273dc;
            border-color: transparent;
        }
        .button.is-primary:hover {
            background-color: #276cda;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">¿Qué es Continuous Fit?</h1>
        <p>
            <strong>Continuous Fit</strong> es una herramienta excepcional para organizar tus sesiones de entrenamiento en rutinas personalizadas según tus preferencias. Además, te permite registrar los resultados de tus sesiones de forma cómoda y ordenada. Podrás acceder a los resultados de todas tus sesiones anteriores para comparar tu progreso y evaluar cómo están yendo tus resultados.
        </p>
        <p>
            Esta aplicación web fue diseñada con el objetivo de facilitar las rutinas semanales y registrar tus resultados de forma fácil para poder tener acceso a un historial completo sobre tu progreso, ya sea de un cambio físico o de cualquier objetivo. Está creada con mucho amor y cariño por un estudiante de programación apasionado por el deporte y el gimnasio, para el proyecto de fin de grado.
        </p>
        <a href="{{ route('home') }}" class="button is-primary">Inicio</a>
    </div>
</body>
</html>
