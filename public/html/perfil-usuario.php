<?php
include_once '../src/sesion/obtener_datos.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/perfil-usuario.css">
    <link rel="stylesheet" href="/public/css/navbar.css">
    <link rel="icon" type="image/png" href="/public/images/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Nutricraft Eats</title>
</head>

<body>

    <header class="header">
        <a href="" class="logo">
            <img src="/public/images/icon.png" alt="icon-logo">
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

                <img src="/public/images/user.png" alt="foto-usuario">
                <div class="zona-1-2">

                    <div class="nombre-seguir">
                        <h2><?php echo $nombreUsuario; ?></h2>
                        <button>
                            <span class="shadow"></span>
                            <span class="edge"></span>
                            <span class="front text">Seguir</span>
                        </button>
                    </div>

                    <div class="datos-usuario">

                        <label for="">5 recetas</label>
                        <label for="">100 seguidores</label>
                        <label for="">10 seguidos</label>

                    </div>

                </div>

            </div>

            <?php
            include_once '../src/php/recetas/obtener_recetas.php';
            ?>


        </div>

    </div>

    <script src="/js/nav-bar.js"></script>

</body>

</html>