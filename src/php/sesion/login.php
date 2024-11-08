<?php
//include_once 'src/db/conexion/conexion.php';
include ($_SERVER['DOCUMENT_ROOT'] . "/src/db/conexion/conexion.php");
// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $correo = $_POST['username'];
    $contrasena = $_POST['password'];

    // Realizar la consulta para buscar el usuario en la base de datos
    $conexion = Conexion::conectar();
    $consulta = $conexion->prepare("SELECT * FROM usuario WHERE usu_correo = :correo AND usu_password = :contrasena");
    $consulta->bindParam(':correo', $correo);
    $consulta->bindParam(':contrasena', $contrasena);
    $consulta->execute();

    // Verificar si se encontró el usuario
    if ($consulta->rowCount() > 0) {
        // Iniciar sesión y redirigir al usuario a la página de inicio
        session_start();
        $_SESSION['username'] = $correo;
        header("location: ../../../public/html/inicio.php");
        exit();
    } else {
        // Si no se encontró el usuario, mostrar un mensaje de error
        echo "<p>Correo electrónico o contraseña incorrectos.</p>";
    }
}
?>
