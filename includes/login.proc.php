<?php
include '../services/config.php';
include '../services/connection.php';

if (isset($_POST['usuario']) && isset($_POST['pass'])) {
    session_start();
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    
    $sql = "SELECT * FROM usuarios WHERE username = '$usuario' AND password = MD5('{$pass}')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['usuario'] = $usuario;
        header("Location: ../view/cartelera.php");
        exit();
    } else {
        // Redirigir con mensaje de error
        header("Location: ../view/login.html?error=1");
        exit();
    }
}
mysqli_close($conn);
?>