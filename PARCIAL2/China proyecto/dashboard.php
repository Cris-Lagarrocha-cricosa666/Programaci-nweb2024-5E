<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Torneo de Artes Marciales</title>
</head>
<body>

<div class="dashboard-container">
    <!-- Ficha de Perfil de Personaje -->
    <div class="card">
        <h3>Perfil de Personajes</h3>
        <p>Gestiona tu personaje, entrena y mejora tus atributos.</p>
        <a href="dashboardCharacters.php">Ver Perfil</a>
    </div>

    <!-- Ficha de Torneos del Dragón -->
    <div class="card">
        <h3>Torneos del Dragón</h3>
        <p>Participa en torneos épicos y enfrenta a otros guerreros.</p>
        <a href="dashboardTournaments.php">Ver Torneos</a>
    </div>

    <!-- Ficha de Tabla de Clasificaciones -->
    <div class="card">
        <h3>Tabla de Clasificaciones</h3>
        <p>Consulta la lista de los guerreros más poderosos.</p>
        <a href="leaderboard.php">Ver Clasificaciones</a>
    </div>
<!-- Ficha de habilidades del personaje -->
<div class="card">
        <h3>Habilidades del personaje</h3>
        <p>Mira las habilidades de tu personaje.</p>
        <a href="dashboardTournaments.php">habilidades</a>
    </div>
    <!-- Ficha de Cerrar Sesión -->
    <div class="card">
        <h3>Cerrar Sesión</h3>
        <p><br>Sal de la aplicación y vuelve más tarde.</p>
        <a href="logout.php">Cerrar Sesión</a>
    </div>

    

    <!-- Checar cuenta -->
    <div class="card">
        <h3>Mi Cuenta</h3>
        <p>Sobre Mi Cuenta</p>
        <a href="checkAccount.php">Cuenta</a>
    </div>
</div>

</body>
</html>
