<?php
include_once 'obtener_datos.php';
session_start();

if (isset($_POST['idReceta'])) {
    $idReceta = $_POST['idReceta'];

    if (isset($_SESSION['usu_id'])) {
        $idUsuario = $_SESSION['usu_id'];

        try {
            include_once 'conexion.php';
            $conexion = Conexion::conectar();

            $consulta = $conexion->prepare("INSERT INTO Recetas_Guardadas (id_usuario, id_receta) VALUES (:idUsuario, :idReceta)");
            $consulta->bindParam(':idUsuario', $idUsuario);
            $consulta->bindParam(':idReceta', $idReceta);
            $consulta->execute();

            echo "Receta guardada exitosamente.";
        } catch (PDOException $e) {
            echo "Error de base de datos: " . $e->getMessage();
        }
    } else {
        echo "Usuario no autenticado.";
    }
} else {
    echo "No se recibió el ID de la receta.";
}
?>