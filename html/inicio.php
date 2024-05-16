<?php
include_once 'obtener_datos.php';
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
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
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

            <div class="card">
                <div class="perfil-card">
                    <div class="usuario">
                        <img src="/imagenes/user.png" alt="foto-usuario">
                        <label for="">Cesar vega</label>
                    </div>
                    <label for="" class="tiempo">1h</label>
                </div>
                <div class="etiquetas">
                    <label for="">Alto en proteina</label>
                    <label for="">Saludable</label>
                    <label for="">Dieta</label>
                </div>
                <img src="/imagenes/receta-ejemplo.jpg" alt="foto-receta">
                <label for="">Pollo a la plancha</label>
                <div class="botones">
                    <div>
                        <button class="interacciones"><i class="fa fa-fw fa-heart-o"></i></button>
                        <button class="interacciones"><i class="fa fa-fw fa-commenting-o"></i></button>
                        <button class="interacciones"><i class="fa fa-fw fa-paper-plane-o"></i></button>
                    </div>
                    <button class="interacciones"><i class="fa fa-fw fa-bookmark-o"></i></button>
                </div>
            </div>

            <div class="card">
                <div class="perfil-card">
                    <div class="usuario">
                        <img src="/imagenes/user.png" alt="foto-usuario">
                        <label for="">Cesar vega</label>
                    </div>
                    <label for="" class="tiempo">1h</label>
                </div>
                <div class="etiquetas">
                    <label for="">Alto en proteina</label>
                    <label for="">Saludable</label>
                    <label for="">Dieta</label>
                </div>
                <img src="/imagenes/receta-ejemplo.jpg" alt="foto-receta">
                <label for="">Pollo a la plancha</label>
                <div class="botones">
                    <div>
                        <button class="interacciones"><i class="fa fa-fw fa-heart-o"></i></button>
                        <button class="interacciones"><i class="fa fa-fw fa-commenting-o"></i></button>
                        <button class="interacciones"><i class="fa fa-fw fa-paper-plane-o"></i></button>
                    </div>
                    <button class="interacciones"><i class="fa fa-fw fa-bookmark-o"></i></button>
                </div>
            </div>

            <div class="card">
                <div class="perfil-card">
                    <div class="usuario">
                        <img src="/imagenes/user.png" alt="foto-usuario">
                        <label for="">Cesar vega</label>
                    </div>
                    <label for="" class="tiempo">1h</label>
                </div>
                <div class="etiquetas">
                    <label for="">Alto en proteina</label>
                    <label for="">Saludable</label>
                    <label for="">Dieta</label>
                </div>
                <img src="/imagenes/receta-ejemplo.jpg" alt="foto-receta">
                <label for="">Pollo a la plancha</label>
                <div class="botones">
                    <div>
                        <button class="interacciones"><i class="fa fa-fw fa-heart-o"></i></button>
                        <button class="interacciones"><i class="fa fa-fw fa-commenting-o"></i></button>
                        <button class="interacciones"><i class="fa fa-fw fa-paper-plane-o"></i></button>
                    </div>
                    <button class="interacciones"><i class="fa fa-fw fa-bookmark-o"></i></button>
                </div>
            </div>

            <div class="card">
                <div class="perfil-card">
                    <div class="usuario">
                        <img src="/imagenes/user.png" alt="foto-usuario">
                        <label for="">Cesar vega</label>
                    </div>
                    <label for="" class="tiempo">1h</label>
                </div>
                <div class="etiquetas">
                    <label for="">Alto en proteina</label>
                    <label for="">Saludable</label>
                    <label for="">Dieta</label>
                </div>
                <img src="/imagenes/receta-ejemplo.jpg" alt="foto-receta">
                <label for="">Pollo a la plancha</label>
                <div class="botones">
                    <div>
                        <button class="interacciones"><i class="fa fa-fw fa-heart-o"></i></button>
                        <button class="interacciones"><i class="fa fa-fw fa-commenting-o"></i></button>
                        <button class="interacciones"><i class="fa fa-fw fa-paper-plane-o"></i></button>
                    </div>
                    <button class="interacciones"><i class="fa fa-fw fa-bookmark-o"></i></button>
                </div>
            </div>

            <div class="card">
                <div class="perfil-card">
                    <div class="usuario">
                        <img src="/imagenes/user.png" alt="foto-usuario">
                        <label for="">Cesar vega</label>
                    </div>
                    <label for="" class="tiempo">1h</label>
                </div>
                <div class="etiquetas">
                    <label for="">Alto en proteina</label>
                    <label for="">Saludable</label>
                    <label for="">Dieta</label>
                </div>
                <img src="/imagenes/receta-ejemplo.jpg" alt="foto-receta">
                <label for="">Pollo a la plancha</label>
                <div class="botones">
                    <div>
                        <button class="interacciones"><i class="fa fa-fw fa-heart-o"></i></button>
                        <button class="interacciones"><i class="fa fa-fw fa-commenting-o"></i></button>
                        <button class="interacciones"><i class="fa fa-fw fa-paper-plane-o"></i></button>
                    </div>
                    <button class="interacciones"><i class="fa fa-fw fa-bookmark-o"></i></button>
                </div>
            </div>

            <div class="card">
                <div class="perfil-card">
                    <div class="usuario">
                        <img src="/imagenes/user.png" alt="foto-usuario">
                        <label for="">Cesar vega</label>
                    </div>
                    <label for="" class="tiempo">1h</label>
                </div>
                <div class="etiquetas">
                    <label for="">Alto en proteina</label>
                    <label for="">Saludable</label>
                    <label for="">Dieta</label>
                </div>
                <img src="/imagenes/receta-ejemplo.jpg" alt="foto-receta">
                <label for="">Pollo a la plancha</label>
                <div class="botones">
                    <div>
                        <button class="interacciones"><i class="fa fa-fw fa-heart-o"></i></button>
                        <button class="interacciones"><i class="fa fa-fw fa-commenting-o"></i></button>
                        <button class="interacciones"><i class="fa fa-fw fa-paper-plane-o"></i></button>
                    </div>
                    <button class="interacciones"><i class="fa fa-fw fa-bookmark-o"></i></button>
                </div>
            </div>

        </div>
        <div class="zona-2">

            <div class="zona-usuario">
                <div class="zona-usuario-2">
                    <img src="/imagenes/user.png" alt="">
                    <label for=""><?php echo $nombreUsuario; ?></label>
                </div>
                <button>Salir</button>
            </div>

            <div class="sugeridos">
                <label for="">Perfiles sugeridos</label>
                <div class="zona-usuario">
                    <div class="zona-usuario-2">
                        <img src="/imagenes/user.png" alt="">
                        <div class="zona-usuario-3">
                            <label for="">Omar Pineda</label>
                            <label for="">47 Publicaciones</label>
                        </div>
                    </div>
                    <button>Seguir</button>
                </div>
                <div class="zona-usuario">
                    <div class="zona-usuario-2">
                        <img src="/imagenes/user.png" alt="">
                        <div class="zona-usuario-3">
                            <label for="">Armando Tejeda</label>
                            <label for="">102 Publicaciones</label>
                        </div>
                    </div>
                    <button>Seguir</button>
                </div>
                <div class="zona-usuario">
                    <div class="zona-usuario-2">
                        <img src="/imagenes/user.png" alt="">
                        <div class="zona-usuario-3">
                            <label for="">José Manuel Ornelas</label>
                            <label for="">62 Publicaciones</label>
                        </div>
                    </div>
                    <button>Seguir</button>
                </div>
            </div>

        </div>

    </div>

    <script src="/js/nav-bar.js"></script>

</body>

</html>