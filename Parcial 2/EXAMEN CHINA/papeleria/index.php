<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$rol = $_SESSION['rol'];
?>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
   
    
    <?php if ($rol == 'admin'): ?>
       <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="gestionar_productos.php">Gestionar Productos</a></li>
            <li><a href="gestionar_usuarios.php">Gestionar Usuarios</a></li>
            <li> <a href="logout.php">Cerrar Sesión</a></li>

        </ul>
    </nav>
    <?php else: ?>
        <nav>
        <ul>
        <li><a href="catalogo.php">Catálogo de Productos</a></li>
        <li><a href="logout.php">Cerrar Sesión</a></li>
        
        </ul>
        </nav>
    <?php endif; ?>
    <h1>Bienvenido al sistema de papelería</h1>
</body>
