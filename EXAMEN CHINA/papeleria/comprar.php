<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['rol'] != 'vendedor') {
    header("Location: login.php"); // Redirigir a la página de inicio de sesión
    exit();
}


// Conectar a la base de datos
include 'db.php';

$user_id = $_SESSION['user_id'];
$producto_id = $_POST['producto_id'];

// Iniciar una transacción
$conn->beginTransaction();

try {
    // Obtener el producto y su stock actual
    $stmt = $conn->prepare("SELECT * FROM productos WHERE id = :producto_id");
    $stmt->bindParam(':producto_id', $producto_id);
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($producto) {
        // Verificar si hay suficiente stock
        if ($producto['stock'] > 0) {
            // Registrar la compra
            $stmt = $conn->prepare("INSERT INTO compras (user_id, producto_id, cantidad) VALUES (:user_id, :producto_id, 1)");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':producto_id', $producto_id);
            $stmt->execute();

            // Reducir el stock
            $nuevo_stock = $producto['stock'] - 1;
            $stmt = $conn->prepare("UPDATE productos SET stock = :nuevo_stock WHERE id = :producto_id");
            $stmt->bindParam(':nuevo_stock', $nuevo_stock);
            $stmt->bindParam(':producto_id', $producto_id);
            $stmt->execute();

            // Confirmar la transacción
            $conn->commit();
            echo '<p>Compra registrada con éxito. ¡Gracias por su compra!</p>';
        } else {
            echo '<p>No hay suficiente stock para realizar la compra.</p>';
        }
    } else {
        echo '<p>Producto no encontrado.</p>';
    }
} catch (Exception $e) {
    // Revertir en caso de error
    $conn->rollBack();
    echo '<p>Error al registrar la compra: ' . $e->getMessage() . '</p>';
}

// Volver al catálogo
echo '<a href="catalogo.php">Volver al Catálogo</a>';
?>
