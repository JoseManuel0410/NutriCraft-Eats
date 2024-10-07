<?php
include_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idReceta = $_POST['idReceta'];

    $conexion = Conexion::conectar();
    $updateComments = $conexion->prepare("UPDATE recetas SET comentarios = comentarios + 1 WHERE id = :idReceta");
    $updateComments->bindParam(':idReceta', $idReceta, PDO::PARAM_INT);
    if ($updateComments->execute()) {
        echo "Comentario añadido";
    } else {
        echo "Error al añadir comentario";
    }
}
