<?php
require_once 'conexion.php';
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['uploaded-file']) && $_FILES['uploaded-file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'imagenes/'; 
        $uploadFile = $uploadDir . basename($_FILES['uploaded-file']['name']);

        if (move_uploaded_file($_FILES['uploaded-file']['tmp_name'], $uploadFile)) {
            $rutaImagen = $uploadFile;
            $conn = Conexion::conectar();
            $stmt = $conn->prepare("INSERT INTO imagenes (ruta) VALUES (?)");
            $stmt->bindParam(1, $rutaImagen);
            $stmt->execute();
            $conn = null; 

            echo "La imagen se ha subido correctamente.";
        } else {
            echo "Hubo un error al subir la imagen.";
        }
    } else {
        echo "No se ha seleccionado ninguna imagen o hubo un error al cargarla.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>