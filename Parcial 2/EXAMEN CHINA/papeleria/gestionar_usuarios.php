

<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['rol'] != 'admin') {
    header("Location: login.php"); // Redirigir a la página de inicio de sesión
    exit();
}

include 'db.php';

// Crear nuevo usuario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
    $rol = $_POST['rol'];

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, usuario, contrasena, rol) VALUES (:nombre, :usuario, :contrasena, :rol)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':contrasena', $contrasena);
    $stmt->bindParam(':rol', $rol);
    $stmt->execute();

    echo "Usuario añadido correctamente.";
}


// Obtener usuarios existentes
$usuarios = $conn->query("SELECT * FROM usuarios")->fetchAll();
?>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<!-- Formulario HTML para añadir usuario -->
<nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="gestionar_productos.php">Gestionar Productos</a></li>
            <li><a href="gestionar_usuarios.php">Gestionar Usuarios</a></li>
           
        </ul>
    </nav>
<h2>Añadir Usuario</h2>
<form method="POST" action="gestionar_usuarios.php">
    <input type="text" name="nombre" placeholder="Nombre completo" required>
    <input type="text" name="usuario" placeholder="Nombre de usuario" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>
    <select name="rol">
        <option value="admin">Administrador</option>
        <option value="vendedor">Vendedor</option>
    </select>
    <button type="submit">Añadir Usuario</button>
</form>

<h2>Lista de Usuarios</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Usuario</th>
        <th>Rol</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
    <tr>
        <td><?= $usuario['id'] ?></td>
        <td><?= $usuario['nombre'] ?></td>
        <td><?= $usuario['usuario'] ?></td>
        <td><?= $usuario['rol'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
