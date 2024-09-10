<?php
// Este archivo será index.php

include 'db.php';

// Obtener los ítems para mostrarlos
$sql = "SELECT * FROM lista";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi PWA</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom right, #FFCDD2, #FF4081);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
            text-align: center;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        button {
            background-color: #FF4081;
            border: none;
            border-radius: 25px;
            color: white;
            padding: 15px 30px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            margin: 10px;
        }

        button:hover {
            background-color: #E91E63;
            transform: scale(1.05);
        }

        .hidden {
            display: none;
        }

        #listado ul {
            list-style-type: none;
            padding: 0;
        }

        #listado li {
            background-color: white;
            color: #FF4081;
            margin: 10px 0;
            padding: 15px;
            border-radius: 10px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <!-- SECCIÓN DE PAGINA DE INICIO -->
    <div id="home">
        <h1>¡Hola! Bienvenido a Mi PWA!</h1>
        <h4>(Progressive Web Application)</h4>
        <button id="verListado">Ver Listado</button>
        <button onclick="window.location.href='index2.php'">Gestionar CRUD</button>
    </div>

    <!-- Página de Listado -->
    <div id="listado" class="hidden">
        <button id="volver">← Volver</button>
        <h1>Listado de Ítems</h1>
        <ul id="itemList">
            <!-- Aquí se insertarán los ítems dinámicamente -->
            <?php while ($row = $result->fetch_assoc()): ?>
                <li><?php echo $row['nombre']; ?></li>
            <?php endwhile; ?>
        </ul>
    </div>

    <script>
        document.getElementById('verListado').addEventListener('click', function() {
            document.getElementById('home').classList.add('hidden');
            document.getElementById('listado').classList.remove('hidden');
        });

        document.getElementById('volver').addEventListener('click', function() {
            document.getElementById('listado').classList.add('hidden');
            document.getElementById('home').classList.remove('hidden');
        });
    </script>
</body>
</html>
