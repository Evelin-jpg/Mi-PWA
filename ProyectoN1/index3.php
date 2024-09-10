<?php
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
    <title>Listado de Ítems</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom right, #FFCDD2, #FF4081);
            color: white;
            text-align: center;
            padding: 20px;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        table {
            margin: 0 auto;
            width: 60%;
            background-color: white;
            color: #FF4081;
            border-radius: 10px;
            overflow: hidden;
        }

        table, th, td {
            border: 1px solid #FF4081;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #FF4081;
            color: white;
        }

        button {
            background-color: #FF4081;
            border: none;
            border-radius: 5px;
            color: white;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        button:hover {
            background-color: #E91E63;
        }
    </style>
</head>
<body>
    <h1>Listado de Ítems</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Botón para regresar al inicio -->
    <button onclick="window.location.href='index.php';">← Volver al Inicio</button>
    
</body>
</html>
