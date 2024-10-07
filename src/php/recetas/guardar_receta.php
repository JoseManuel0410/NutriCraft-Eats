<?php
require_once 'conexion.php'; 

$nombreReceta = $_POST['nombre_receta'];
$pasosReceta = $_POST['pasos'];
$caloriasTotales = $_POST['calorias_totales'];
$proteinasTotales = $_POST['proteinas_totales'];
$lipidosTotales = $_POST['lipidos_totales'];
$hidratosDeCarbonoTotales = $_POST['hidratos_de_carbono_totales'];
$ingredientesReceta = $_POST['ingredientes'];
$ruta1 = $_POST['ruta1'];
$ruta2 = $_POST['ruta2'];
$ruta3 = $_POST['ruta3'];
$usu_id = $_POST['usu_id'];

try {
    $conexion = Conexion::conectar();
    $consulta = $conexion->prepare("INSERT INTO recetas (nombre_receta, pasos, calorias_totales, proteinas_totales, lipidos_totales, hidratos_de_carbono_totales, ingredientes, ruta1, ruta2, ruta3, usu_id) VALUES (:nombre_receta, :pasos, :calorias_totales, :proteinas_totales, :lipidos_totales, :hidratos_de_carbono_totales, :ingredientes, :ruta1, :ruta2, :ruta3, :usu_id)");
    $consulta->bindParam(':nombre_receta', $nombreReceta);
    $consulta->bindParam(':pasos', $pasosReceta);
    $consulta->bindParam(':calorias_totales', $caloriasTotales);
    $consulta->bindParam(':proteinas_totales', $proteinasTotales);
    $consulta->bindParam(':lipidos_totales', $lipidosTotales);
    $consulta->bindParam(':hidratos_de_carbono_totales', $hidratosDeCarbonoTotales);
    $consulta->bindParam(':ingredientes', $ingredientesReceta);
    $consulta->bindParam(':ruta1', $ruta1);
    $consulta->bindParam(':ruta2', $ruta2);
    $consulta->bindParam(':ruta3', $ruta3);
    $consulta->bindParam(':usu_id', $usu_id);
    
    $conexion->beginTransaction();

    $consulta->execute();

    $consultaEliminar = $conexion->prepare("DELETE FROM imagenes");
    $consultaEliminar->execute();

    $conexion->commit();

    echo "Receta guardada exitosamente";

} catch (PDOException $e) {
    $conexion->rollBack();
    echo "Error al guardar la receta: " . $e->getMessage();
}
?>