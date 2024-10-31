<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['rol'] != 'vendedor') {
    header("Location: login.php"); // Redirigir a la página de inicio de sesión
    exit();
}


// Conectar a la base de datos
include 'db.php';

// Obtener productos de la base de datos
$stmt = $conn->prepare("SELECT * FROM productos");
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<nav>
        <ul>
          
            <li> <a href="index.php">Inicio</a></li>
            <li> <a href="logout.php">Cerrar Sesión</a></li>
           
        </ul>
    </nav>
    <h1>Catálogo de Productos</h1>

    <?php if (empty($productos)): ?>
        <p>No hay productos disponibles.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($producto['precio']); ?> MXN</td>
                    <td><?php echo htmlspecialchars($producto['stock']); ?></td>
                    <td>
                        <form method="POST" action="comprar.php">
                            <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                            <button type="submit">Comprar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

  
</body>
