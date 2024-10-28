<?php
session_start();
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $sql = "SELECT * FROM usuarios WHERE Usuario='$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($clave, $row['Clave'])) {
            $_SESSION['usuario'] = $row['Usuario'];
            
            $idUsuario = $row['IDUsuario'];
            $fecha = date("Y-m-d");
            $hora = date("H:i:s");
                        
            header("Location: menu.php");
            exit();
        } else {
            echo "Contraseña incorrecta. <a href='login.php'>Intenta de nuevo</a>";
        }
    } else {
        echo "Usuario no encontrado. <a href='register.php'>Regístrate</a>";
    }
}
$conn->close();
?>