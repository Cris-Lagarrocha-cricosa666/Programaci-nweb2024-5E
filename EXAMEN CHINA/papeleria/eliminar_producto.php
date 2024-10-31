<?php
session_start();
if ($_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

include 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM productos WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: gestionar_productos.php");
exit();
?>
