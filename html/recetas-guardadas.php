<?php
session_start();
include_once 'obtener_datos.php';
include_once 'conexion.php';
$conexion = Conexion::conectar();

if (isset($_SESSION['usu_id'])) {
    $idUsuario = $_SESSION['usu_id'];

    $consultaRecetasGuardadas = $conexion->prepare("
        SELECT r.*, u.usu_nombre 
        FROM Recetas_Guardadas rg 
        JOIN Recetas r ON rg.id_receta = r.id
        JOIN usuario u ON r.usu_id = u.usu_id
        WHERE rg.id_usuario = :idUsuario
    ");
    $consultaRecetasGuardadas->bindParam(':idUsuario', $idUsuario);
    $consultaRecetasGuardadas->execute();
} else {
    header('Location: iniciar-sesion.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/perfil-usuario.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="icon" type="image/png" href="/imagenes/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Nutricraft Eats</title>
</head>

<body>

    <header class="header">
        <a href="" class="logo">
            <img src="/imagenes/icon.png" alt="icon-logo">
            <label for="">Nutricaft Eats</label>
            <div class="div-menu">
                <button id="btn-menu"><i class="fa fa-sort-desc" aria-hidden="true"></i></button>
            </div>
        </a>
        <nav class="navbar" id="menu-desplegable">
            <a href="inicio.php"><i class="fa fa-fw fa-home"></i>Inicio</a>
            <a href=""><i class="fa fa-fw fa-search"></i>Buscar</a>
            <a href="perfil-usuario.php"><i class="fa fa-fw fa-user-circle"></i>Perfil</a>
            <a href="nueva-receta.php"><i class="fa fa-fw fa-plus-square"></i>Nueva receta</a>
            <a href="recetas-guardadas.php"><i class="fa fa-fw fa-bookmark"></i>Guardadas</a>
        </nav>
    </header>

    <div class="main">

        <div class="perfil">

            <div class="zona-1">

                <img src="/imagenes/user.png" alt="foto-usuario">
                <div class="zona-1-2">

                    <div class="nombre-seguir">
                        <h2><?php echo htmlspecialchars($nombreUsuario); ?></h2>
                    </div>

                    <div class="datos-usuario">

                        <label for="">5 recetas</label>
                        <label for="">100 seguidores</label>
                        <label for="">10 seguidos</label>

                    </div>

                </div>

            </div>

            <h2>Publicaciones guardadas</h2>

            <div class="zona-2">
                <?php
                if ($consultaRecetasGuardadas->rowCount() > 0) {
                    $recetasGuardadas = $consultaRecetasGuardadas->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($recetasGuardadas as $recetaGuardada) {
                        $rutaImagen = str_replace("https://nutricraft-eats.000webhostapp.com", "", $recetaGuardada['ruta1']);
                        $nombreReceta = $recetaGuardada['nombre_receta'];
                        $fechaSubida = new DateTime($recetaGuardada['fecha_subida']);
                        $nombreUsuarioReceta = $recetaGuardada['usu_nombre'];

                        $fechaActual = new DateTime();
                        $diferencia = $fechaActual->diff($fechaSubida);
                        $diasAgo = $diferencia->days;

                        $fechaFormateada = $diasAgo == 1 ? '1 día ago' : $diasAgo . ' días ago';

                        echo '
                        <div class="card">
                    <div class="card-image"><img src="' . htmlspecialchars($rutaImagen) . '" alt="foto-receta"></div>
                    <div class="category">' . htmlspecialchars($nombreReceta) . '</div>
                    <div class="heading"> Receta alta en proteina
                        <div class="author"> By <span class="name">' . htmlspecialchars($nombreUsuarioReceta) . '</span> ' . $fechaFormateada . '</div>
                    </div>
                </div>';
                    }
                } else {
                    echo "No hay recetas guardadas.";
                }
                ?>
            </div>

        </div>

    </div>

    <script src="/js/nav-bar.js"></script>

</body>

</html>