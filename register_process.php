<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);

    $checkUser = "SELECT * FROM usuarios WHERE Usuario='$usuario'";
    $result = $conn->query($checkUser);

    if ($result->num_rows > 0) {
        echo "Nombre de usuario ya en uso. <a href='register.php'>Intenta con otro</a>";
    } else {
        $sql = "INSERT INTO usuarios (Usuario, Clave) VALUES ('$usuario', '$clave')";
        if ($conn->query($sql) === TRUE) {
            header("Location: login.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
    $conn->close();
}
?>