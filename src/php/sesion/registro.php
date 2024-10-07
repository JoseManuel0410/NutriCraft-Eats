<?php
include_once 'conexion.php';

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['username'];
    $contrasena = $_POST['password'];
    $confirmar_contrasena = $_POST['confirm_password'];

    // Verificar si las contraseñas coinciden
    if ($contrasena !== $confirmar_contrasena) {
        echo "<p>Las contraseñas no coinciden.</p>";
        exit(); // Detener el script si las contraseñas no coinciden
    }

    // Verificar si el usuario ya existe en la base de datos
    $conexion = Conexion::conectar();
    $consulta = $conexion->prepare("SELECT * FROM usuario WHERE usu_correo = :correo");
    $consulta->bindParam(':correo', $correo);
    $consulta->execute();

    if ($consulta->rowCount() > 0) {
        echo "<p>El usuario ya existe.</p>";
        exit(); // Detener el script si el usuario ya existe
    }

    // Insertar el nuevo usuario en la base de datos
    $consulta_insertar = $conexion->prepare("INSERT INTO usuario (usu_nombre, usu_correo, usu_password) VALUES (:nombre, :correo, :contrasena)");
    $consulta_insertar->bindParam(':nombre', $nombre);
    $consulta_insertar->bindParam(':correo', $correo);
    $consulta_insertar->bindParam(':contrasena', $contrasena);
    $consulta_insertar->execute();
// Redirigir al usuario a la página de inicio después del registro exitoso
    header("Location: inicio.php");
    exit();
}
?>