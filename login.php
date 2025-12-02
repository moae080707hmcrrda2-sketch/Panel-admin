<?php
session_start();

// Datos de conexión
$host = "localhost";
$usuario = "root";
$contrasena = "";
$bd = "pxd";

// Conectar a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $bd);
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Validar que sea POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioForm = $_POST['usuario'];
    $passwordForm = $_POST['password'];

    // Consulta segura
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE usuario=? AND contraseña=?");
    $stmt->bind_param("ss", $usuarioForm, $passwordForm);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        // Usuario válido → crear sesión
        $_SESSION['usuario'] = $usuarioForm;
        header("Location: paginau.php"); // Redirigir al dashboard
        exit();
    } else {
        // Usuario inválido → mensaje de error
        $_SESSION['error'] = "Usuario o contraseña incorrectos";
        header("Location: index.php");
        exit();
    }
} else {
    // Si no es POST, regresar al login
    header("Location: index.php");
    exit();
}
?>