<?php

namespace Eber\models;

use Eber\database\Conexion;
use PDO;
use PDOException;

class UsuarioModelo
{

    private  $id_usuario;
    private $nombre;
    private $contrasenia;
    private $correo;
    private $db;

    function __construct()
    {
        $this->db = new Conexion();
    }

    public function setIdUsuario(int $id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setContrasenia(string $contrasenia)
    {
        //$this->contrasenia = password_hash($contrasenia, PASSWORD_BCRYPT, ['cost' => 4]);
        $this->contrasenia = sha1($contrasenia);
    }

    public function getContrasenia()
    {
        return $this->contrasenia;
    }

    public function setCorreo(string $correo)
    {
        $this->correo = $correo;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function login()
    {
        $resultado = false;
        try {
            $sql = "SELECT * FROM usuarios WHERE correo = :correo";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':correo', $this->getCorreo(), PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() == 1) {
                $usuario = $stmt->fetch(PDO::FETCH_OBJ);
                $verificar = $this->getContrasenia() == $usuario->contrasenia;
                if ($verificar) {
                   $resultado = $usuario;
                }
            }
            return $resultado;
        } catch (PDOException $e) {
            return "Error " . $e->getMessage();
        }
    }

    public function register()
    {
        try {
            $sql = "INSERT INTO usuarios(nombre,sontrasenia,correo) VALUES(':nombre',':contrasenia',':correo')";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':nombre', $this->getNombre(), PDO::PARAM_STR);
            $stmt->bindValue(':contrasenia', $this->getContrasenia(), PDO::PARAM_STR);
            $stmt->bindValue(':correo', $this->getCorreo(), PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return 'ok';
            }
        } catch (PDOException $e) {
            return "Error " . $e->getMessage();
        }
    }
}
