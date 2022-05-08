<?php
namespace Eber\database;
use PDO;
use PDOException;

class Conexion extends PDO{

    
    function __construct()
    {

        try {
            $option = [
                PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => FALSE
            ];
           parent::__construct('mysql:host=localhost;dbname=nombre base de datos', 'su usuario',' su contraceña',$option);
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
            die();
        }
    
    }
}

