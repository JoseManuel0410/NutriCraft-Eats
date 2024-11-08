<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/src/db/conexion/conexion.php');
include_once ($_SERVER['DOCUMENT_ROOT'] . '/src/sesion/obtener_datos.php');
$conn = Conexion::conectar();

$sql = "SELECT Nombre, Calorias, Proteinas, Lipidos, Hidratos_de_Carbono FROM ingredientes";
$result = $conn->query($sql);

$ingredientes = [];
if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $ingredientes[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/nueva-recetacss.css">
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

        <div class="nueva-receta">

            <div class="zona-1">
                <form class="dropzone-box" enctype="multipart/form-data">
                    <h2>Sube tus fotos aquí</h2>
                    <p>Arrastra las fotos aquí</p>
                    <div class="dropzone-area">
                        <div class="file-upload-icon">
                            <img src="/public/images/file.svg" alt="file-icon">
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
                    require_once '../src/db/conexion.php';

                    try {
                        $conn = Conexion::conectar();

                        $stmt = $conn->prepare("SELECT ruta FROM imagenes ORDER BY fecha_subida DESC LIMIT 3");
                        $stmt->execute();
                        $rutasImagenes = $stmt->fetchAll(PDO::FETCH_COLUMN);

                        foreach ($rutasImagenes as $ruta) {
                            echo "<img src='$ruta'>";
                        }

                        $conn = null; 
                    } catch (PDOException $e) {
                        echo "Error al obtener las imágenes: " . $e->getMessage();
                    }
                    ?>
                </div>
            </div>
            <style>
                #lista-ingredientes {
                    display: none;
                }
            </style>
            <div class="zona-2">
                <form>
                    <input type="text" id="nombre-receta" name="nombre-receta" placeholder="Escribe el nombre de tu receta">
                    <label for="ingredientes">Ingredientes:</label>
                    <textarea id="ingredientes" name="ingredientes" rows="4" class="lista-ing"></textarea>
                    <ul id="lista-ingredientes">
                        
                    </ul>
                    <div class="contenedor-botones">
                        <button type="button" id="agregar-ingrediente">+</button>
                        <button type="button" id="eliminar-ingrediente" class="less">-</button>
                    </div>
                    <div class="guardar">
                        <button type="button" id="openModalBtn" class="mandar-receta">Modal</button>
                        <button type="button" id="subir-receta" class="mandar-receta">Subir receta</button>
                    </div>
                </form>

                <div class="zona-2-2">
                    <textarea id="pasos-receta" class="pasos-receta" placeholder="Escriba aqui todos los pasos de su receta en orden"></textarea>
                    <ul id="nutrimentos-ing" class="nutrimentos-ingredientes">
                        <i>Nutrimentos registrados:</i>
                    </ul>
                </div>
            </div>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1>Agrega tus ingredientes</h1>
                    <div class="ingredientes-form">
                        <div class="zona1">
                            <input type="text" id="modal-buscar-ingredientes" placeholder="Busca los ingredientes aquí...">
                            <button id="modal-buscar-btn"><i class="fa fa-fw fa-search"></i></button>
                        </div>
                        <div class="zona2">
                            <select name="ingredientes" id="modal-ingredientes">
                                <?php
                                foreach ($ingredientes as $ingrediente) {
                                    echo "<option value='" . htmlspecialchars(json_encode($ingrediente)) . "'>" . htmlspecialchars($ingrediente['Nombre']) . "</option>";
                                }
                                ?>
                            </select>
                            <button id="modal-agregar-ingrediente"><i class="fa fa-fw fa-plus-square"></i></button>
                        </div>
                        <div class="zona3">
                            <label for="">Ingredientes agregados</label>
                            <ul id="modal-lista-ingredientes">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" id="calorias-totales" name="calorias_totales" value="">
            <input type="hidden" id="proteinas-totales" name="proteinas_totales" value="">
            <input type="hidden" id="lipidos-totales" name="lipidos_totales" value="">
            <input type="hidden" id="hidratos-carbono-totales" name="hidratos_de_carbono_totales" value="">

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var listaIngredientes = document.getElementById('lista-ingredientes');
                    var ingredientesTextarea = document.getElementById('ingredientes');
                    var selectIngredientes = document.getElementById('select-ingredientes');
                    var agregarIngredienteBtn = document.getElementById('agregar-ingrediente');
                    var nutrimentosUl = document.getElementById('nutrimentos-ing');
                    var subirRecetaBtn = document.getElementById('subir-receta');
                    var modal = document.getElementById('myModal');
                    var modalAgregarBtn = document.getElementById('modal-agregar-ingrediente');
                    var modalListaIngredientes = document.getElementById('modal-lista-ingredientes');
                    var modalIngredientesSelect = document.getElementById('modal-ingredientes');
                    var openModalBtn = document.getElementById('openModalBtn');
                    var closeModalBtn = document.querySelector('.modal .close');
                    var modalBuscarInput = document.getElementById('modal-buscar-ingredientes');
                    var modalBuscarBtn = document.getElementById('modal-buscar-btn');

                    var valoresNutricionalesTotales = {
                        Calorias: 0,
                        Proteinas: 0,
                        Lipidos: 0,
                        Hidratos_de_Carbono: 0
                    };

                    function agregarIngrediente(ingrediente) {
                        var nuevoIngrediente = ingrediente.Nombre;

                        var li = document.createElement('li');
                        li.textContent = nuevoIngrediente;
                        listaIngredientes.appendChild(li);
                        ingredientesTextarea.value += (ingredientesTextarea.value ? '\n' : '') + nuevoIngrediente;

                        valoresNutricionalesTotales.Calorias += ingrediente.Calorias;
                        valoresNutricionalesTotales.Proteinas += ingrediente.Proteinas;
                        valoresNutricionalesTotales.Lipidos += ingrediente.Lipidos;
                        valoresNutricionalesTotales.Hidratos_de_Carbono += ingrediente.Hidratos_de_Carbono;

                        mostrarValoresNutricionales();
                    }

                    function mostrarValoresNutricionales() {
                        nutrimentosUl.innerHTML = "<i>Nutrimentos registrados:</i><br>";
                        for (var nutrimento in valoresNutricionalesTotales) {
                            nutrimentosUl.innerHTML += "<li>" + nutrimento + ": " + valoresNutricionalesTotales[nutrimento] + "</li>";
                        }
                    }

                    function buscarIngredientes() {
                        var filtro = modalBuscarInput.value.toLowerCase();
                        var found = false;
                        for (var i = 0; i < modalIngredientesSelect.options.length; i++) {
                            var option = modalIngredientesSelect.options[i];
                            var texto = option.text.toLowerCase();
                            if (texto.includes(filtro)) {
                                option.style.display = "";
                                if (!found) {
                                    modalIngredientesSelect.selectedIndex = i;
                                    found = true;
                                }
                            } else {
                                option.style.display = "none";
                            }
                        }
                        if (!found) {
                            modalIngredientesSelect.selectedIndex = -1;
                        }
                    }

                    agregarIngredienteBtn.addEventListener('click', function() {
                        var selectedOption = selectIngredientes.options[selectIngredientes.selectedIndex];
                        if (selectedOption) {
                            var ingrediente = JSON.parse(selectedOption.value);
                            agregarIngrediente(ingrediente);
                        }
                    });

                     modalAgregarBtn.addEventListener('click', function() {
                        var selectedOption = modalIngredientesSelect.options[modalIngredientesSelect.selectedIndex];
                        if (selectedOption) {
                            var ingrediente = JSON.parse(selectedOption.value);

                            var li = document.createElement('li');
                            li.textContent = ingrediente.Nombre;
                            modalListaIngredientes.appendChild(li);

                            agregarIngrediente(ingrediente);
                        }
                    });

                    modalBuscarBtn.addEventListener('click', buscarIngredientes);

                    openModalBtn.addEventListener('click', function() {
                        modal.style.display = 'block';
                    });

                    closeModalBtn.addEventListener('click', function() {
                        modal.style.display = 'none';
                    });

                    subirRecetaBtn.addEventListener('click', function() {
                        var nombreReceta = document.getElementById('nombre-receta').value.trim();
                        var pasosReceta = document.getElementById('pasos-receta').value.trim();
                        var ingredientesReceta = ingredientesTextarea.value.trim();
                        var caloriasTotales = valoresNutricionalesTotales.Calorias;
                        var proteinasTotales = valoresNutricionalesTotales.Proteinas;
                        var lipidosTotales = valoresNutricionalesTotales.Lipidos;
                        var hidratosDeCarbonoTotales = valoresNutricionalesTotales.Hidratos_de_Carbono;

                        var rutasImagenes = [];
                        document.querySelectorAll('.contenedor-imagenes img').forEach(function(img, index) {
                            if (index < 3) { // Tomamos hasta tres imágenes
                                rutasImagenes.push(img.src);
                            }
                        });

                         while (rutasImagenes.length < 3) {
                            rutasImagenes.push('');
                        }

                        $.ajax({
                            type: "POST",
                            url: "../src/php/recetas/guardar_receta.php",
                            data: {
                                nombre_receta: nombreReceta,
                                pasos: pasosReceta,
                                ingredientes: ingredientesReceta,
                                calorias_totales: caloriasTotales,
                                proteinas_totales: proteinasTotales,
                                lipidos_totales: lipidosTotales,
                                hidratos_de_carbono_totales: hidratosDeCarbonoTotales,
                                ruta1: rutasImagenes[0],
                                ruta2: rutasImagenes[1],
                                ruta3: rutasImagenes[2],
                                usu_id: <?php echo $_SESSION['usu_id']; ?>
                            },
                            success: function(response) {
                                alert(response);
                                window.location.href = "nueva-receta.php";
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                alert("Error al subir la receta: " + errorThrown);
                            }
                        });
                    });
                });
            </script>
            <script src="/js/modal.js"></script>
            <script src="/js/nueva-receta.js"></script>
            <script src="/js/nav-bar.js"></script>

</body>

</html>
