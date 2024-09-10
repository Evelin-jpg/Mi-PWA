<?php
// Este archivo será index2.php

include 'db.php';




// Manejo de la adición de un nuevo ítem
if (isset($_POST['add'])) {
    $nombre = $_POST['nombre'];
    $sql = "INSERT INTO lista (nombre) VALUES ('$nombre')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index2.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Manejo de la eliminación de un ítem
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM lista WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index2.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Manejo de la edición de un ítem
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $sql = "UPDATE lista SET nombre='$nombre' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index2.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Obtener los ítems para mostrarlos
$sql = "SELECT * FROM lista";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD en Mi PWA</title>
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

    button, input[type="submit"] {
        background-color: #FF4081;
        border: none;
        border-radius: 5px;
        color: white;
        padding: 10px 15px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover, input[type="submit"]:hover {
        background-color: #E91E63;
    }

    .form-container {
        margin-bottom: 30px;
    }

    input[type="text"] {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #FF4081;
        margin-right: 10px;
    }

     /* Estilo del botón "Volver al Inicio" */
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
    <h1>CRUD en Mi PWA</h1>

    <div class="form-container">
        <form action="index2.php" method="POST">
            <input type="text" name="nombre" placeholder="Nuevo ítem" required>
            <input type="submit" name="add" value="Agregar">
        </form>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td>
                    <a href="index2.php?edit=<?php echo $row['id']; ?>">Editar</a>
                    <a href="index2.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este ítem?');">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php if (isset($_GET['edit'])): ?>
        <?php
        $id = $_GET['edit'];
        $result = $conn->query("SELECT * FROM lista WHERE id=$id");
        $row = $result->fetch_assoc();
        ?>
        <div class="form-container">
            <form action="index2.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required>
                <input type="submit" name="update" value="Actualizar">
            </form>
        </div>
    <?php endif; ?>

    <button onclick="window.location.href='index.php';">← Volver al Inicio</button>


</body>
</html>
