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
    <title>Registro de Usuario | Musical Fest</title>
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
                <li><a href="registro_usuario.php" class="active"><i class="fas fa-user-plus"></i> Registrar Usuarios</a></li>
            <?php endif; ?>
            <li><a href="registro_artista.php"><i class="fas fa-microphone-alt"></i> Registrar Artistas</a></li>
            <li class="welcome">Bienvenido Admin!</li>
        </ul>
    </nav>

    <div class="page-container">
        <div class="form-container">
            <h1><i class="fas fa-user-plus"></i> Registrar Nuevo Usuario</h1>
            
            <?php if(isset($_GET['error'])): ?>
                <div class="alert error">
                    <?php 
                        switch($_GET['error']) {
                            case 'campos_vacios': echo "Todos los campos son obligatorios"; break;
                            case 'usuario_existente': echo "El usuario o email ya existen"; break;
                            case 'db_error': echo "Error en la base de datos"; break;
                            default: echo "Error desconocido";
                        }
                    ?>
                </div>
            <?php endif; ?>
            
            <?php if(isset($_GET['success']) && $_GET['success'] == 'usuario_registrado'): ?>
                <div class="alert success">Usuario registrado exitosamente!</div>
            <?php endif; ?>
            
            <form action="registro_usuario.proc.php" method="POST">
                <div class="form-group">
                    <label for="username">Nombre de Usuario:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
             
                <button type="submit" class="submit-btn">Registrar Usuario</button>
            </form>
        </div>
    </div>
</body>
</html>