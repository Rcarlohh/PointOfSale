<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Aplicación</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
            font-size: 17px;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .navbar a.active {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a class="active" href="{{ url('/') }}">Home</a>
        <a href="{{ url('/usuario') }}">Usuario</a>
        <a href="{{ url('/contactanos') }}">Contáctanos</a>
    </div>

    <!-- Aquí irá el contenido de tu aplicación -->

</body>
</html>
