<?php
session_start();

if(isset($_SESSION['username'])) {
    $correo = $_SESSION['username'];

    include_once 'conexion.php'; 
    $conexion = Conexion::conectar(); 
    $consulta = $conexion->prepare("SELECT usu_id, usu_nombre FROM usuario WHERE usu_correo = :correo");
    $consulta->bindParam(':correo', $correo);
    $consulta->execute();

    if ($consulta->rowCount() > 0) {

        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
        $nombreUsuario = $usuario['usu_nombre'];
        $idUsuario = $usuario['usu_id'];
        
        echo '<h2>' . $nombreUsuario . '</h2>';
    } else {

        echo "Usuario no encontrado";
    }
} else {

    echo "Usuario no autenticado";
}
?>