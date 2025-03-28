<?php
include "config.php";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//Verificar la conexion

if (!$conn) {
    echo "<script>alert('Conexion fallida)</script>";
    die("Conexion fallida: " . mysqli_connect_error());
}
?>