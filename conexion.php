<?php

class Conexion{
    static public function conectar(){
        #PDO("nombre del servidor; nombre de la base de datos", "usuario", "contraseña"))

        $conn = new PDO("mysql:host=localhost;dbname=proyecto",
                        "root",
                        "");

        $conn->exec("SET NAMES utf8");

        return $conn;
    }
}


?>