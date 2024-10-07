<?php
include_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idReceta = $_POST['idReceta'];

    $conexion = Conexion::conectar();
    $updateLikes = $conexion->prepare("UPDATE recetas SET likes = likes + 1 WHERE id = :idReceta");
    $updateLikes->bindParam(':idReceta', $idReceta, PDO::PARAM_INT);
    if ($updateLikes->execute()) {
        echo "Like añadido";
    } else {
        echo "Error al añadir like";
    }
}
