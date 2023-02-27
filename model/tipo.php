<?php

class Tipo
{

    private $table = 'tip_tipo_doc';
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
    public function getTipos()
    {
        $this->getConection();
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /* Get note by id */
    public function getTipoById($id)
    {

        if (is_null($id)) {
            return false;
        }

        $this->getConection();
        $sql = "SELECT * FROM " . $this->table . " WHERE TIP_ID = ?";
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
            $actualTipo = $this->getTipoById($param["id"]);
            print_r($actualTipo);
           
            if (isset($actualTipo["TIP_ID"])) {
                $exists = true;
                /* Actual values */
                $id = $param["id"];
                $prefijo = $actualTipo["TIP_PREFIJO"];
                $nombre = $actualTipo["TIP_NOMBRE"];
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
            echo "update";
            $sql = "UPDATE " . $this->table . " SET TIP_PREFIJO=?, TIP_NOMBRE=? WHERE TIP_ID=?";
            $stmt = $this->conection->prepare($sql);
            $res = $stmt->execute([$prefijo, $nombre, $id]);
        } else {
            $sql = "INSERT INTO " . $this->table . " (TIP_PREFIJO, TIP_NOMBRE) values(?, ?)";
            $stmt = $this->conection->prepare($sql);
            $stmt->execute([$prefijo, $nombre]);
            $id = $this->conection->lastInsertId();
        }

        return $id;

    }

    /* Delete note by id */
    public function deleteTipoById($id)
    {
        $this->getConection();
        $sql = "DELETE FROM " . $this->table . " WHERE TIP_ID = ?";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$id]);
    }

}
