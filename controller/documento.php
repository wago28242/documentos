<?php

require_once 'model/documento.php';


class documentoController
{
    public $page_title;
    public $view;

    public function __construct()
    {
        $this->view = 'listar_documento';
        $this->page_title = '';
        $this->noteObj = new Documento();
        
    }

    function list() {
        $this->page_title = 'Listado de documentos';
        return $this->noteObj->getDocumentos();
    }

    public function edit($id = null)
    {
        $this->page_title = 'Crear o Editar documento';
        $this->view = 'edit_documento';
        
        /* si el parametro id llega con data */
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        }
        //Poder imprimir en la vista $this->view;
        $id_proceso=$this->noteObj->getProcesos();
        $id_tipo=$this->noteObj->getTipos();
        return [$this->noteObj->getDocumentoById($id),$id_proceso,$id_tipo];
    }

    public function save()
    {   
        
        $this->view = 'edit_documento';
        $this->page_title = 'Guardar Documento';
        $id = $this->noteObj->save($_POST);
        $result = $this->noteObj->getDocumentoById($id);
        $_GET["response"] = true;
        return $result;
    }

    /* Confirm to delete */
    public function confirmDelete()
    {
        $this->page_title = 'Eliminar documento';
        $this->view = 'confirm_delete_documento';
        return $this->noteObj->getDocumentoById($_GET["id"]);
    }

    /* Delete */
    public function delete()
    {

        $this->page_title = 'Listado de documentos';
        $this->view = 'delete_documento';
        return $this->noteObj->deleteDocumentoById($_POST["id"]);
    }

}
