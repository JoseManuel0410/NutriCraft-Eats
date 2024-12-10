<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/src/db/conexion/conexion.php');
$conexion = Conexion::conectar();

// Obtener los IDs de las recetas seleccionadas
$datos = json_decode(file_get_contents('php://input'), true);
$recetas = $datos['recetas'];

if (empty($recetas)) {
    echo "No se seleccionaron recetas.";
    exit();
}

// Preparar la consulta para obtener ingredientes de las recetas seleccionadas
$in  = str_repeat('?,', count($recetas) - 1) . '?';
$query = "
    SELECT i.Nombre, i.Calorias, c.NombreCategoria
    FROM ingredientes i
    JOIN categorias c ON i.CategoriaID = c.CategoriaID
    WHERE i.ingrediente_id IN (
        SELECT ingrediente_id FROM recetas_ingredientes WHERE receta_id IN ($in)
    )
";

$stmt = $conexion->prepare($query);
$stmt->execute($recetas);

// Generar la lista de compras
$ingredientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($ingredientes) {
    $categoriaActual = '';
    foreach ($ingredientes as $ingrediente) {
        if ($ingrediente['NombreCategoria'] !== $categoriaActual) {
            if ($categoriaActual !== '') {
                echo "</ul>";
            }
            $categoriaActual = $ingrediente['NombreCategoria'];
            echo "<h3>" . htmlspecialchars($categoriaActual) . "</h3><ul>";
        }
        echo "<li>" . htmlspecialchars($ingrediente['Nombre']) . " (" . $ingrediente['Calorias'] . " cal)</li>";
    }
    echo "</ul>";
} else {
    echo "No se encontraron ingredientes para las recetas seleccionadas.";
}
?>
