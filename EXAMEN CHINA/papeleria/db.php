<?php
$host = "localhost";
$dbname = "cetis84_papeleria";
$username = "root";  // Cambia esto si tienes otro usuario de MySQL
$password = "";       // Cambia esto si tienes contraseña

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>
