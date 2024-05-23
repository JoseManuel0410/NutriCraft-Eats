<?php
session_start();
include_once 'obtener_datos.php';
include_once 'conexion.php';

$conexion = Conexion::conectar();
$idUsuarioActual = $_SESSION['usu_id'];

$consultaRecetas = $conexion->prepare("
    SELECT r.*, u.usu_nombre 
    FROM Recetas r 
    JOIN usuario u ON r.usu_id = u.usu_id
");
$consultaUsuarios = $conexion->prepare("
    SELECT u.usu_id, u.usu_nombre, COUNT(r.id) as total_recetas 
    FROM usuario u 
    LEFT JOIN Recetas r ON u.usu_id = r.usu_id 
    WHERE u.usu_id <> :idUsuarioActual 
    GROUP BY u.usu_id, u.usu_nombre
");
$consultaRecetas->execute();
$consultaUsuarios->bindParam(':idUsuarioActual', $idUsuarioActual, PDO::PARAM_INT);
$consultaUsuarios->execute();
$usuarios = $consultaUsuarios->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/iniciocss.css">
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
        <div class="zona-1">
            <?php
            if ($consultaRecetas->rowCount() > 0) {
                $recetas = $consultaRecetas->fetchAll(PDO::FETCH_ASSOC);

                foreach ($recetas as $receta) {
                    $idReceta = $receta['id'];
                    $rutaImagen = str_replace("https://nutricraft-eats.000webhostapp.com", "", $receta['ruta1']);
                    $nombreReceta = $receta['nombre_receta'];
                    $fechaSubida = new DateTime($receta['fecha_subida']);
                    $nombreUsuarios = $receta['usu_nombre'];

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
                    <div class="perfil-card">
                        <div class="usuario">
                            <img src="/imagenes/user.png" alt="foto-usuario">
                            <label for="">' . htmlspecialchars($nombreUsuarios) . '</label>
                        </div>
                        <label for="" class="tiempo">' . $fechaFormateada . '</label>
                    </div>
                    <div class="etiquetas">
                        <label for="">Alto en proteina</label>
                        <label for="">Saludable</label>
                        <label for="">Dieta</label>
                    </div>
                    <img src="' . htmlspecialchars($rutaImagen) . '" alt="foto-receta">
                    <label for="">' . htmlspecialchars($nombreReceta) . '</label>
                    <div class="botones">
                        <div>
                            <button class="interacciones" onclick="actualizarLikes(' . $idReceta . ')"><i class="fa fa-fw fa-heart-o"></i></button>
                            <button class="interacciones" onclick="actualizarComentarios(' . $idReceta . ')"><i class="fa fa-fw fa-commenting-o"></i></button>
                            <button class="interacciones" onclick="actualizarCompartidos(' . $idReceta . ')"><i class="fa fa-fw fa-paper-plane-o"></i></button>
                        </div>
                        <button class="interacciones" onclick="guardarRecetas(' . $idReceta . ')"><i class="fa fa-fw fa-bookmark-o"></i></button>
                    </div>
                </div>';
                }
            } else {
                echo "No hay recetas disponibles.";
            }
            ?>
        </div>

        <script>
            function actualizarLikes(idReceta) {
                enviarSolicitud('like_receta.php', idReceta);
            }

            function actualizarComentarios(idReceta) {
                enviarSolicitud('comentario_receta.php', idReceta);
            }

            function actualizarCompartidos(idReceta) {
                enviarSolicitud('share_receta.php', idReceta);
            }

            function enviarSolicitud(url, idReceta) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", url, true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        alert(xhr.responseText);
                    } else {
                        alert('Hubo un error.');
                    }
                };
                xhr.onerror = function() {
                    alert('Error de red.');
                };
                xhr.send("idReceta=" + idReceta);
            }

            function guardarRecetas(idReceta) {
                enviarSolicitud('guardar_recetas.php', idReceta);
            }
        </script>

        <div class="zona-2">
            <div class="zona-usuario">
                <div class="zona-usuario-2">
                    <img src="/imagenes/user.png" alt="">
                    <label for=""><?php echo htmlspecialchars($nombreUsuario); ?></label>
                </div>
                <button onclick="cerrarSesion()">Salir</button>

                <script>
                    function cerrarSesion() {
                        window.location.href = "cerrar_sesion.php";
                    }
                </script>
            </div>

            <div class="sugeridos">
                <label for="">Perfiles sugeridos</label>
                <?php
                foreach ($usuarios as $usuario) {
                    $plural = $usuario['total_recetas'] > 1 ? 's' : '';
                    $textoRecetas = $usuario['total_recetas'] == 1 ? 'Publicación' : 'Publicaciones';
                    if ($usuario['total_recetas'] > 0) {
                        echo '
                    <div class="zona-usuario">
                        <div class="zona-usuario-2">
                            <img src="/imagenes/user.png" alt="">
                            <div class="zona-usuario-3">
                                <label for="">' . htmlspecialchars($usuario['usu_nombre']) . '</label>
                                <label for="">' . htmlspecialchars($usuario['total_recetas']) . ' ' . $textoRecetas . '</label>
                            </div>
                        </div>
                        <button>Seguir</button>
                    </div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <script src="/js/nav-bar.js"></script>
</body>

</html>