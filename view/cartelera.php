<?php
session_start();
include '../services/config.php';
include '../services/connection.php';

// Obtener artistas de la base de datos
$artistas = [];
$sql = "SELECT nombre, genero, foto FROM artistas ORDER BY nombre";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $artistas[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartelera | Reggaeton Beach Fest</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/cartelera.css">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="festival-nav">
        <ul>
            <li><a href="../index.php"><i class="fas fa-home"></i> Inicio</a></li>  
            <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario'] === 'admin'): ?>
                <li><a href="../includes/registro_artista.php"><i class="fas fa-microphone-alt"></i> Registrar Artistas</a></li>
                <li><a href="../includes/registro_usuario.php"><i class="fas fa-user-plus"></i> Registrar Usuarios</a></li>
            <?php endif; ?>
            <?php if(isset($_SESSION['usuario'])): ?>
                <li class="welcome">Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</li>
            <?php endif; ?>
        </ul>
    </nav>

    <div class="page-container">
        <main class="split-container">
            <div class="left-section">
                <div class="info-box">
                    <h1><i class="fas fa-music"></i> Musical Fest 2025</h1>
                    <div class="carrusel">
                        <div class="slide active">
                            <img src="../assets/img/1.jpeg" alt="Artista en el escenario">
                        </div>
                        <div class="slide">
                            <img src="../assets/img/2.jpg" alt="Publico disfrutando">
                        </div>
                        <div class="slide">
                            <img src="../assets/img/3.jpg" alt="Myke Towers en el escenario">
                        </div>
                        <button class="prev"><i class="fas fa-chevron-left"></i></button>
                        <button class="next"><i class="fas fa-chevron-right"></i></button>
                    </div>
                    
                    <div class="festival-info">
                        <p>El <strong>Musical Fest</strong> es el evento musical más esperado del verano, donde los mejores artistas del género se reúnen frente al mar para ofrecer shows inolvidables.</p>
                        <p>Este año contaremos con:</p>
                        <ul>
                            <li>3 días de música ininterrumpida</li>
                            <li>Escenarios frente al mar</li>
                            <li>Zonas VIP con servicio exclusivo</li>
                            <li>Food trucks con gastronomía local</li>
                            <li>Actividades acuáticas durante el día</li>
                        </ul>
                    </div>
                </div>
            </div>



    <div class="right-section">
        <div class="artistas-box">
            <h1><i class="fas fa-star"></i> Artistas Confirmados</h1>
            
            <?php if (!empty($artistas)): ?>
                <div class="artistas-grid">
                    <?php foreach ($artistas as $artista): ?>
                        <div class="artista-card">
                        <div class="artista-img">
                            <img src="../<?php echo htmlspecialchars($artista['foto']); ?>" 
                            alt="<?php echo htmlspecialchars($artista['nombre']); ?>"
                            onerror="this.src='../assets/img/artistas/default.jpg'">
                        </div>
                            <h3><?php echo htmlspecialchars($artista['nombre']); ?></h3>
                            <p><?php echo htmlspecialchars($artista['genero']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="no-artistas">Próximamente más artistas confirmados...</p>
            <?php endif; ?>
            
            <?php if(isset($_GET['success']) && $_GET['success'] === 'artista_registrado'): ?>
                <br>
                <div class="success-message">¡Artista registrado correctamente!</div>
            <?php endif; ?>
        </div>
    </div>

    <script src="../assets/js/cartelera.js"></script>
</body>
</html>