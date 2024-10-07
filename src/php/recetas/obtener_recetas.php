<?php
session_start();
include_once 'obtener_datos.php';
include_once 'conexion.php';
$conexion = Conexion::conectar();

if (isset($_SESSION['usu_id']) && isset($_SESSION['usu_nombre'])) {
    $idUsuario = $_SESSION['usu_id'];
    $nombreUsuario = $_SESSION['usu_nombre'];

    $consultaRecetas = $conexion->prepare("SELECT * FROM recetas WHERE usu_id = :idUsuario");
    $consultaRecetas->bindParam(':idUsuario', $idUsuario);
    $consultaRecetas->execute();

?>

    <h2>Publicaciones</h2>

    <div class="zona-2">
        <?php
        if ($consultaRecetas->rowCount() > 0) {
            $recetasUsuario = $consultaRecetas->fetchAll(PDO::FETCH_ASSOC);

            foreach ($recetasUsuario as $receta) {
                $rutaImagen = str_replace("https://nutricraft-eats.000webhostapp.com", "", $receta['ruta1']);
                $nombreReceta = $receta['nombre_receta'];
                $fechaSubida = new DateTime($receta['fecha_subida']);

                $fechaActual = new DateTime();
                $diferencia = $fechaActual->diff($fechaSubida);

                $diasAgo = $diferencia->days;
                $horasAgo = $diferencia->h;
                $minutosAgo = $diferencia->i;
                $segundosAgo = $diferencia->s;

                if ($diasAgo >= 1) {
                    $fechaFormateada = $diasAgo == 1 ? '1 día ago' : $diasAgo . ' días ago';
                } elseif ($horasAgo >= 1) {
                    $fechaFormateada = $horasAgo == 1 ? '1 hora ago' : $horasAgo . ' horas ago';
                } elseif ($minutosAgo >= 1) {
                    $fechaFormateada = $minutosAgo == 1 ? '1 minuto ago' : $minutosAgo . ' minutos ago';
                } else {
                    $fechaFormateada = $segundosAgo == 1 ? '1 segundo ago' : $segundosAgo . ' segundos ago';
                }

                echo '
                <div class="card">
                    <div class="card-image"><img src="' . htmlspecialchars($rutaImagen) . '" alt="foto-receta"></div>
                    <div class="category">' . htmlspecialchars($nombreReceta) . '</div>
                    <div class="heading"> Receta alta en proteina
                        <div class="author"> By <span class="name">' . htmlspecialchars($nombreUsuario) . '</span> ' . $fechaFormateada . '</div>
                    </div>
                </div>';
            }
        } else {
            echo "El usuario no ha subido ninguna receta.";
        }
        ?>
    </div>

<?php
} else {
    echo "ID de usuario no encontrado en la sesión.";
}
?>