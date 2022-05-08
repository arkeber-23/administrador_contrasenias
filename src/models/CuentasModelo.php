<?php

namespace Eber\models;

use Eber\database\Conexion;
use PDO;
use PDOException;

class CuentasModelo
{

    private $idCuenta;
    private $idUsuario;
    private $nombreRedsocial;
    private $correo;
    private $contrasenia;
    private $db;

    function __construct()
    {
        $this->db = new Conexion();
    }

    public function setIdCuenta(int $idCuenta)
    {
        $this->idCuenta = $idCuenta;
    }

    public function getCuenta()
    {
        return $this->idCuenta;
    }
    public function setIdUsuario(int $idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setNombreRedSocial(string $nombreRedsocial)
    {
        $this->nombreRedsocial = $nombreRedsocial;
    }

    public function getNombreRedSocial()
    {
        return $this->nombreRedsocial;
    }

    public function setContrasenia(string $contrasenia)
    {
        $this->contrasenia = $contrasenia;
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

    public function all()
    {
        try {
            $sql = "SELECT * FROM cuentas WHERE id_usuario = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':id',$this->getIdUsuario(),PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return "Error " . $e->getMessage();
        }
    }
}
