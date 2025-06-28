<?php

namespace APP\Models;

use PDO;
use PDOException;

// Aqui se crea la clase de conexion 
class Conexion{

    //creo atributos de la clase de la conexion
    private static $host = 'localhost';
    private static $pass = 'Samuel888.';
    private static $db = "banco_sangre";
    private static $user = 'root';

    public static function conectar(){ // Aqui se crea la funcion o el metodo de conectar

        try {

            $conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db, self::$user, self::$pass);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;

        } catch (PDOException $e) {

            echo "Error de conexion " . $e->getMessage();
            
        }
    }
}
