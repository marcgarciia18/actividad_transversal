<?php
session_start();
include '../services/config.php';
include '../services/connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener y sanitizar datos
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5(mysqli_real_escape_string($conn, $_POST['password'])); // MD5
    
    // Validación básica
    if (empty($username) || empty($email) || empty($_POST['password'])) {
        header("Location: registro_usuario.php?error=campos_vacios");
        exit();
    }

    // Verificar si el usuario/email ya existen
    $check_query = "SELECT id FROM usuarios WHERE username = ? OR email = ?";
    $stmt = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    
    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_close($stmt);
        header("Location: registro_usuario.php?error=usuario_existente");
        exit();
    }
    mysqli_stmt_close($stmt);

    // Insertar nuevo usuario
    $insert_query = "INSERT INTO usuarios (username, email, password, fecha_registro) VALUES (?, ?, MD5(?), CURRENT_TIMESTAMP)";
    $stmt = mysqli_prepare($conn, $insert_query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../view/cartelera.php?success=usuario_registrado");
        } else {
            header("Location: registro_usuario.php?error=db_error");
        }
        mysqli_stmt_close($stmt);
    } else {
        header("Location: registro_usuario.php?error=db_error");
    }
} else {
    header("Location: registro_usuario.php");
}

mysqli_close($conn);
?>