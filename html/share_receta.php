<?php
include_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idReceta = $_POST['idReceta'];

    $conexion = Conexion::conectar();
    $updateShares = $conexion->prepare("UPDATE Recetas SET compartidas = compartidas + 1 WHERE id = :idReceta");
    $updateShares->bindParam(':idReceta', $idReceta, PDO::PARAM_INT);
    if ($updateShares->execute()) {
        echo "Receta compartida";
    } else {
        echo "Error al compartir receta";
    }
}
