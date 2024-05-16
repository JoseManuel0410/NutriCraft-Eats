<?php
require_once 'conexion.php';
include_once 'obtener_datos.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/nueva-recetacss.css">
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

        <div class="nueva-receta">

            <div class="zona-1">
                <form class="dropzone-box" enctype="multipart/form-data">
                    <h2>Sube tus fotos aquí</h2>
                    <p>Arrastra las fotos aquí</p>
                    <div class="dropzone-area">
                        <div class="file-upload-icon">
                            <img src="/imagenes/file.svg" alt="file-icon">
                        </div>
                        <p>Haz clic para cargar o arrastra y suéltalo</p>
                        <input type="file" required id="upload-file" name="uploaded-file">
                        <p class="message">No hay archivos seleccionados</p>
                    </div>
                    <div class="dropzone-actions">
                        <button type="reset">
                            Cancelar
                        </button>
                        <button id="submit-button" type="button">
                            Guardar
                        </button>
                    </div>
                </form>
        
                <div class="contenedor-imagenes">
                    <?php
                    require_once 'conexion.php'; // Incluye el archivo de conexión a la base de datos
        
                    // Consulta las rutas de las imágenes desde la base de datos
                    $conn = Conexion::conectar();
                    $stmt = $conn->query("SELECT ruta FROM imagenes");
                    $rutasImagenes = $stmt->fetchAll(PDO::FETCH_COLUMN);
                    $conn = null; // Cierra la conexión
        
                    // Genera las etiquetas <img> para cada ruta de imagen
                    foreach ($rutasImagenes as $ruta) {
                        echo "<img src='$ruta'>";
                    }
                    ?>
                </div>
            </div>

            <div class="zona-2">
                <form>
                    <input type="text" id="nombre-receta" name="nombre-receta"
                        placeholder="Escribe el nombre de tu receta">
                    <label for="ingredientes">Ingredientes:</label>
                    <textarea id="ingredientes" name="ingredientes" rows="4" class="lista-ing"></textarea>
                    <ul id="lista-ingredientes">
                        <!-- La lista de ingredientes aparecerá aquí -->
                    </ul>
                    <div class="contenedor-botones">
                        <button type="button" id="agregar-ingrediente">+</button>
                        <button type="button" id="eliminar-ingrediente" class="less">-</button>
                        
                    </div>
                    <div class="guardar">
                        <button type="button" id="openModalBtn" class="mandar-receta">Modal</button>
                        <button type="button" class="mandar-receta">
                            Subir receta
                        </button>
                    </div>
                </form>

                <div class="zona-2-2">
                    <textarea id="pasos-receta" class="pasos-receta"
                        placeholder="Escriba aqui todos los pasos de su receta en orden"></textarea>
                    <ul id="nutrimentos-ing" class="nutrimentos-ingredientes">
                        <i>Nutrimentos registrados:</i>
                    </ul>
                </div>

            </div>

        </div>

    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Agrega tus ingredientes</h1>
            <div class="ingredientes-form">
                <div class="zona1">
                    <input type="text" placeholder="Busca los ingredientes aqui...">
                    <button><i class="fa fa-fw fa-search"></i></button>
                </div>
                <div class="zona2">
                    <select name="ingredientes" id="ingredientes">
                        <option value="lechuga">Lechuga</option>
                        <option value="lechuga">Lechuga</option>
                        <option value="lechuga">Lechuga</option>
                        <option value="lechuga">Lechuga</option>
                    </select>
                    <button><i class="fa fa-fw fa-plus-square"></i></button>
                </div>
                <div class="zona3">
                    <label for="">Ingredientes agregados</label>
                    <ul>
                        <li>Lechuga</li>
                        <li>Tomate</li>
                        <li>Cebolla</li>
                        <li>Zanahoria</li>
                        <li>Pepino</li>
                        <li>Chile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/modal.js"></script>
    <script src="/js/nueva-receta.js"></script>
    <script src="/js/nav-bar.js"></script>

</body>

</html>