<?php

class Proceso
{

    private $table = 'pro_proceso';
    private $conection;

    public function __construct()
    {
        session_start();
        if($_SESSION["authorized"] != 1){
	    header("Location:index.php?controller=login&action=unauthorized");
        }

    }

    /* Set conection */
    public function getConection()
    {
        $dbObj = new Db();
        $this->conection = $dbObj->conection;
    }

    /* Get all notes */
    public function getProcesos()
    {
        $this->getConection();
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /* Get note by id */
    public function getProcesoById($id)
    {

        if (is_null($id)) {
            return false;
        }

        $this->getConection();
        $sql = "SELECT * FROM " . $this->table . " WHERE PRO_ID = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /* Save note */
    public function save($param)
    {
        $this->getConection();

        /* Set default values */
        $title = $content = "";

        /* Check if exists */
        $exists = false;
        if (isset($param["id"]) and $param["id"] != '') {
            $actualProceso = $this->getProcesoById($param["id"]);
            if (isset($actualProceso["PRO_ID"])) {
                $exists = true;
                /* Actual values */
                $id = $param["id"];
                $prefijo = $actualProceso["PRO_PREFIJO"];
                $nombre = $actualProceso["PRO_NOMBRE"];
            }
        }

        /* Received values */
        if (isset($param["prefijo"])) {
            $prefijo = $param["prefijo"];
        }

        if (isset($param["nombre"])) {
            $nombre = $param["nombre"];
        }

        /* Database operations */
        if ($exists) {
            $sql = "UPDATE " . $this->table . " SET PRO_PREFIJO=?, PRO_NOMBRE=? WHERE PRO_ID=?";
            $stmt = $this->conection->prepare($sql);
            $res = $stmt->execute([$prefijo, $nombre, $id]);
        } else {
            $sql = "INSERT INTO " . $this->table . " (PRO_PREFIJO, PRO_NOMBRE) values(?, ?)";
            $stmt = $this->conection->prepare($sql);
            $stmt->execute([$prefijo, $nombre]);
            $id = $this->conection->lastInsertId();
        }

        return $id;

    }

    /* Delete note by id */
    public function deleteProcesoById($id)
    {
        $this->getConection();
        $sql = "DELETE FROM " . $this->table . " WHERE PRO_ID = ?";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$id]);
    }

}
