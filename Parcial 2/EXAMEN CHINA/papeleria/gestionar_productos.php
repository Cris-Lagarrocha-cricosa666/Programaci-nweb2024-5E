<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['rol'] != 'admin') {
    header("Location: login.php"); // Redirigir a la página de inicio de sesión
    exit();
}

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $stmt = $conn->prepare("INSERT INTO productos (nombre, descripcion, precio, stock) VALUES (:nombre, :descripcion, :precio, :stock)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':stock', $stock);
    $stmt->execute();

    echo "<p>Producto añadido correctamente.</p>";
}
?>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="gestionar_productos.php">Gestionar Productos</a></li>
            <li><a href="gestionar_usuarios.php">Gestionar Usuarios</a></li>
           
        </ul>
    </nav>

    <!-- Formulario HTML para añadir producto -->
    <h1>Añadir Producto</h1>
    <form method="POST" action="gestionar_productos.php">
        <input type="text" name="nombre" placeholder="Nombre del producto" required>
        <textarea name="descripcion" placeholder="Descripción del producto"></textarea>
        <input type="number" step="0.01" name="precio" placeholder="Precio" required>
        <input type="number" name="stock" placeholder="Stock" required>
        <button type="submit">Añadir Producto</button>
    </form>

    <h2>Lista de Productos</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        <?php
        $productos = $conn->query("SELECT * FROM productos")->fetchAll();
        foreach ($productos as $producto):
        ?>
        <tr>
            <td><?= $producto['id'] ?></td>
            <td><?= htmlspecialchars($producto['nombre']) ?></td>
            <td><?= htmlspecialchars($producto['descripcion']) ?></td>
            <td><?= htmlspecialchars($producto['precio']) ?></td>
            <td><?= htmlspecialchars($producto['stock']) ?></td>
            <td>
                <a href="editar_producto.php?id=<?= $producto['id'] ?>">Editar</a>
                <a href="eliminar_producto.php?id=<?= $producto['id'] ?>" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
