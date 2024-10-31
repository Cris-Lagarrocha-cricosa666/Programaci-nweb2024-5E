<?php
session_start();
if ($_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit();
}

include 'db.php';

$id = $_GET['id'];
$producto = $conn->prepare("SELECT * FROM productos WHERE id = :id");
$producto->bindParam(':id', $id);
$producto->execute();
$producto = $producto->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $stmt = $conn->prepare("UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, stock = :stock WHERE id = :id");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: gestionar_productos.php");
}
?>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<h2>Editar Producto</h2>
<form method="POST">
    <input type="text" name="nombre" value="<?= $producto['nombre'] ?>" required>
    <textarea name="descripcion"><?= $producto['descripcion'] ?></textarea>
    <input type="number" step="0.01" name="precio" value="<?= $producto['precio'] ?>" required>
    <input type="number" name="stock" value="<?= $producto['stock'] ?>" required>
    <button type="submit">Guardar Cambios</button>
</form>
