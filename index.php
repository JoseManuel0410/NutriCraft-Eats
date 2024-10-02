<?php
session_start();
include_once 'conexion.php';

$conexion = Conexion::conectar();

$consultaTopRecetas = $conexion->prepare("
    SELECT id, nombre_receta, ruta1, likes 
    FROM Recetas 
    ORDER BY likes DESC 
    LIMIT 4
");
$consultaTopRecetas->execute();
$topRecetas = $consultaTopRecetas->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/indexcss.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Nutricaft Eats</title>
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
            <a href="login.html"><i class="fa fa-fw fa-sign-in"></i>Iniciar sesión</a>
            <a href="registro.html"><i class="fa fa-fw fa-address-card-o"></i>Registro</a>
        </nav>
    </header>

    <div class="main">
        <div class="zona-1">
            <h1>Bienvenido a <span style="color: rgb(228, 149, 2); font-weight: 900; font-size: 35px;">Nutricaft Eats</span></h1>
            <h2>Tu página de recetas favorita</h2>
            <h3>Descubre todo lo necesario para tu dieta, con sus valiosos valores nutricionales. Explora una amplia selección de opciones saludables y deliciosas para alcanzar tus metas de bienestar.</h3>
        </div>

        <div class="zona-2">
            <div class="barra-bus">
                <img src="/imagenes/search-icon.png" alt="search" style="width:35px;height:35px;padding-right: 20px; align-self: center;">
                <input type="text" id="fname" name="fname" placeholder="Busca aqui..." class="txtbus">
            </div>
        </div>

        <div class="zona-3">
            <div class="top-recetas">
                <h2>TOP RECETAS</h2>
                <?php
                if ($consultaTopRecetas->rowCount() > 0) {
                    foreach ($topRecetas as $receta) {
                        $rutaImagen = str_replace("https://nutricraft-eats.000webhostapp.com", "", $receta['ruta1']);
                        $nombreReceta = htmlspecialchars($receta['nombre_receta']);
                        $likes = $receta['likes'];

                        echo '
                        <div class="receta">
                            <img src="' . htmlspecialchars($rutaImagen) . '" alt="Receta ' . htmlspecialchars($nombreReceta) . '">
                            <h3>' . $nombreReceta . '</h3>
                            <p><span class="like-icon">&#10084;</span> ' . $likes . ' likes</p>
                        </div>';
                    }
                } else {
                    echo '<p>No hay recetas disponibles.</p>';
                }
                ?>
            </div>
        </div>
    </div>

    <script src="/js/nav-bar.js"></script>

</body>

</html>