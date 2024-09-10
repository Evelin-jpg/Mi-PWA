<?php
$host = 'localhost';
$user = 'root'; // Cambia esto si tu usuario es diferente
$password = ''; // Cambia esto si tu contraseña es diferente
$dbname = 'mi_pwa';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
