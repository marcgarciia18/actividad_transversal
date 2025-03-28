<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Artistas | Musical Fest</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/registro.css">
</head>
<body>
    <nav class="festival-nav">
        <ul>
            <li><a href="../index.php"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="../view/cartelera.php"><i class="fas fa-calendar-alt"></i> Cartelera</a></li>
            <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario'] === 'admin'): ?>
                <li><a href="registro_usuarios.php"><i class="fas fa-user-plus"></i> Registrar Usuarios</a></li>
            <?php endif; ?>
            <li class="welcome">Bienvenido Admin!</li>
        </ul>
    </nav>

    <div class="page-container">
        <div class="form-container">
            <h1><i class="fas fa-microphone-alt"></i> Registrar Nuevo Artista</h1>
            
            <form action="registro_artistas.proc.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre">Nombre del Artista:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                
                <div class="form-group">
                    <label for="genero">Género Musical:</label>
                    <select id="genero" name="genero" required>
                        <option value="">Seleccione un género</option>
                        <option value="Reggaeton">Reggaeton</option>
                        <option value="Trap">Trap</option>
                        <option value="Dembow">Dembow</option>
                        <option value="Pop Urbano">Pop Urbano</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="pais">País de origen:</label>
                    <input type="text" id="pais" name="pais" required>
                </div>
             
                <button type="submit" class="submit-btn">Registrar Artista</button>
            </form>
        </div>
    </div>
</body>
</html>