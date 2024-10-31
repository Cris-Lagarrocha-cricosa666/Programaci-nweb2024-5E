<?php
session_start();
include 'db.php'; // Archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Verificar si el nombre de usuario ya existe
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
    $stmt->bindParam(":usuario", $usuario);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "El nombre de usuario ya existe. Por favor, elige otro.";
    } else {
        // Encriptar la contraseña
        $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);

        // Insertar el nuevo usuario en la base de datos
        $stmt = $conn->prepare("INSERT INTO usuarios (usuario, contrasena) VALUES (:usuario, :contrasena)");
        $stmt->bindParam(":usuario", $usuario);
        $stmt->bindParam(":contrasena", $contrasenaHash);

        if ($stmt->execute()) {
            echo "Registro exitoso. Ahora puedes iniciar sesión.";
            header("Location: login.php"); // Redirige al usuario al login
            exit;
        } else {
            echo "Error al registrar el usuario. Inténtalo de nuevo.";
        }
    }
}
?>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<form method="POST" action="registrar_usuario.php">
    <input type="text" name="usuario" placeholder="Usuario" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>
    <button type="submit">Registrar</button>
</form>
