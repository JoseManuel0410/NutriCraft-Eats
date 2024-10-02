<?php
include 'conexion.php';

$conn = Conexion::conectar();

$id_receta = isset($_GET['id']) ? $_GET['id'] : 0;


$stmt = $conn->prepare("
    SELECT r.nombre_receta, r.fecha_subida, r.calorias_totales, r.proteinas_totales, r.lipidos_totales, 
           r.hidratos_de_carbono_totales, r.ingredientes, r.pasos, r.ruta1, r.ruta2, r.ruta3, 
           r.likes, r.comentarios, r.compartidas, u.nombre as usuario, u.foto 
    FROM Recetas r 
    JOIN usuarios u ON r.usu_id = u.id 
    WHERE r.id = :id
");
$stmt->bindParam(':id', $id_receta, PDO::PARAM_INT);
$stmt->execute();
$receta = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$receta) {
    echo "Receta no encontrada";
    exit;
}

$comentarios_stmt = $conn->prepare("
    SELECT c.comentario, c.fecha, u.nombre, u.foto 
    FROM comentarios c 
    JOIN usuarios u ON c.id_usuario = u.id 
    WHERE c.id_receta = :id_receta
");
$comentarios_stmt->bindParam(':id_receta', $id_receta, PDO::PARAM_INT);
$comentarios_stmt->execute();
$comentarios = $comentarios_stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/imagenes/icon.png">
    <link rel="stylesheet" href="/css/recetacss.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <title><?php echo htmlspecialchars($receta['nombre_receta']); ?></title>
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
            <a href="inicio.html"><i class="fa fa-fw fa-home"></i>Inicio</a>
            <a href=""><i class="fa fa-fw fa-search"></i>Buscar</a>
            <a href="perfil-usuario.html"><i class="fa fa-fw fa-user-circle"></i>Perfil</a>
            <a href="nueva-receta.html"><i class="fa fa-fw fa-plus-square"></i>Nueva receta</a>
            <a href="recetas-guardadas.html"><i class="fa fa-fw fa-bookmark"></i>Guardadas</a>
        </nav>
    </header>
    <div class="main">
        <div class="card">
            <div class="usuario-info">
                <div>
                    <img src="<?php echo htmlspecialchars($receta['foto']); ?>" alt="foto-usuario">
                    <h2><?php echo htmlspecialchars($receta['usuario']); ?></h2>
                </div>
                <label for=""><?php echo htmlspecialchars($receta['fecha_subida']); ?></label>
            </div>
            <div class="imagenes">
                <img src="<?php echo htmlspecialchars($receta['ruta1']); ?>" alt="foto-receta">
                <?php if ($receta['ruta2']) {
                    echo '<img src="' . htmlspecialchars($receta['ruta2']) . '" alt="foto-receta">';
                } ?>
                <?php if ($receta['ruta3']) {
                    echo '<img src="' . htmlspecialchars($receta['ruta3']) . '" alt="foto-receta">';
                } ?>
            </div>
            <h2><?php echo htmlspecialchars($receta['nombre_receta']); ?></h2>
            <div class="interacciones">
                <div>
                    <button class="botones-int"><i class="fa fa-fw fa-heart-o"></i></button>
                    <button class="botones-int"><i class="fa fa-fw fa-commenting-o"></i></button>
                    <button class="botones-int"><i class="fa fa-fw fa-paper-plane-o"></i></button>
                </div>
                <button class="botones-int"><i class="fa fa-fw fa-bookmark-o"></i></button>
            </div>
            <label for=""><?php echo htmlspecialchars($receta['likes']); ?> likes...</label>
            <label for=""><?php echo htmlspecialchars($receta['comentarios']); ?> comentarios...</label>
            <label for=""><?php echo htmlspecialchars($receta['compartidas']); ?> compartidas...</label>
            <div class="com-propio">
                <input type="text" placeholder="Escribe aqui tu comentario...">
                <button>send</button>
            </div>
            <div class="comentarios">
                <?php foreach ($comentarios as $comentario) : ?>
                    <div class="comentario">
                        <div class="com-usuario-info">
                            <div>
                                <img src="<?php echo htmlspecialchars($comentario['foto']); ?>" alt="foto-usuario">
                                <label><?php echo htmlspecialchars($comentario['nombre']); ?></label>
                            </div>
                            <label for=""><?php echo htmlspecialchars($comentario['fecha']); ?></label>
                        </div>
                        <p><?php echo htmlspecialchars($comentario['comentario']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="valores-nut">
                <h2>VALORES NUTRIMENTALES</h2>
                <ul>
                    <li>Proteina: <?php echo htmlspecialchars($receta['proteinas_totales']); ?>g</li>
                    <li>Grasas: <?php echo htmlspecialchars($receta['lipidos_totales']); ?>g</li>
                    <li>Calorías: <?php echo htmlspecialchars($receta['calorias_totales']); ?>kcal</li>
                    <li>Hidratos de Carbono: <?php echo htmlspecialchars($receta['hidratos_de_carbono_totales']); ?>g</li>
                </ul>
            </div>
            <div class="ingredientes">
                <h2>Ingredientes</h2>
                <ul>
                    <?php
                    $ingredientes = explode(",", $receta['ingredientes']);
                    foreach ($ingredientes as $ingrediente) : ?>
                        <li><?php echo htmlspecialchars($ingrediente); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="pasos-receta">
                <h2>Pasos para elaborar esta receta</h2>
                <p><?php echo nl2br(htmlspecialchars($receta['pasos'])); ?></p>
            </div>
        </div>
    </div>
    <script src="/js/nav-bar.js"></script>
</body>

</html>