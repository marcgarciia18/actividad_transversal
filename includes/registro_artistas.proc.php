<?php
session_start();
include '../services/config.php';
include '../services/connection.php';

if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $genero = mysqli_real_escape_string($conn, $_POST['genero']);
    $pais = mysqli_real_escape_string($conn, $_POST['pais']);
    
    // Validar campos obligatorios
    if (empty($nombre) || empty($genero) || empty($pais)) {
        header("Location: registro_artistas.php?error=campos_vacios");
        exit();
    }

    // Obtener el ID del usuario de la sesión (asegúrate de guardarlo al hacer login)
    $usuario_id = $_SESSION['id_usuario']; // Cambia esto según cómo guardes el ID en tu login
    
    // Generar ruta de foto con el nombre exacto del artista
    $foto = 'assets/img/artistas/' . $nombre . '.jpg';
    
    // Insertar en la base de datos (ahora con usuario_id)
    $sql = "INSERT INTO artistas (nombre, genero, foto, pais, usuario_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssi", $nombre, $genero, $foto, $pais, $usuario_id);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../view/cartelera.php?success=artista_registrado");
        } else {
            header("Location: registro_artistas.php?error=db_error");
        }
        mysqli_stmt_close($stmt);
    } else {
        header("Location: registro_artistas.php?error=db_error");
    }
} else {
    header("Location: registro_artistas.php");
}

mysqli_close($conn);
?>