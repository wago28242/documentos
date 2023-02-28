<?php

class Documento
{

    private $table = 'doc_documento';
    private $table_proceso = 'pro_proceso';
    private $table_tipos = 'tip_tipo_doc';
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
    public function getDocumentos()
    {
        $this->getConection();
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /* Get note by id */
    public function getDocumentoById($id)
    {
       
        if (is_null($id)) {
            return false;
        }

        $this->getConection();
        $sql = "SELECT * FROM " . $this->table . " WHERE DOC_ID = ?";
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
            $actualDocumento = $this->getDocumentoById($param["id"]);
           
            if (isset($actualDocumento["DOC_ID"])) {
                $exists = true;
                /* Actual values */
                $id = $param["id"];
                $nombre = $actualDocumento["DOC_NOMBRE"];
                $codigo = $actualDocumento["DOC_CODIGO"];
                $contenido = $actualDocumento["DOC_CONTENIDO"];
                $tipo = $actualDocumento["DOC_ID_TIPO"];
                $proceso = $actualDocumento["DOC_ID_PROCESO"];
               
            }
        }

        /* Received values */
        if (isset($param["nombre"])) {
             $nombre = $param["nombre"];
        }

        if (isset($param["codigo"])) {
             $codigo = $param["codigo"];
        }
        /* Received values */
        if (isset($param["contenido"])) {
             $contenido = $param["contenido"];
        }

        if (isset($param["tipo"])) {
             $tipo = $param["tipo"];
        }

        if (isset($param["proceso"])) {
             $proceso = $param["proceso"];
        }

        

        /* Database operations */
        if ($exists) {
            
            $sql = "UPDATE " . $this->table . " SET DOC_NOMBRE=?, DOC_CODIGO=?, DOC_CONTENIDO=?, DOC_ID_TIPO=?, DOC_ID_PROCESO=? WHERE DOC_ID=?";
            $stmt = $this->conection->prepare($sql);
            $res = $stmt->execute([$nombre, $codigo, $contenido, $tipo, $proceso, $id]);
        } else {
            $sql = "INSERT INTO " . $this->table . " (DOC_NOMBRE, DOC_CODIGO, DOC_CONTENIDO, DOC_ID_TIPO, DOC_ID_PROCESO) values(?, ?, ?, ?, ?)";
            $stmt = $this->conection->prepare($sql);
            $stmt->execute([$nombre, $codigo, $contenido, $tipo, $proceso]);
            $id = $this->conection->lastInsertId();
        }

        return $id;

    }

    /* Delete note by id */
    public function deleteDocumentoById($id)
    {
        $this->getConection();
        $sql = "DELETE FROM " . $this->table . " WHERE DOC_ID = ?";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function getProcesos()
    {
        $this->getConection();
        $sql = "SELECT * FROM " . $this->table_proceso;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getTipos()
    {
        $this->getConection();
        $sql = "SELECT * FROM " . $this->table_tipos;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }


}
