<?php

class Conexion{
    static public function conectar(){
        try {
            $conn = new PDO("mysql:host=localhost;dbname=id22046670_nutriweb","id22046670_root","CesarVega@20",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            return $conn;
        }
        catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    }
}
?>