<?php

require_once 'model/tipo.php';

class tipoController
{
    public $page_title;
    public $view;

    public function __construct()
    {
        $this->view = 'listar_tipo';
        $this->page_title = '';
        $this->noteObj = new Tipo();
    }

    function list() {
        $this->page_title = 'Listado de tipos';
        return $this->noteObj->getTipos();
    }

    public function edit($id = null)
    {
        $this->page_title = 'Crear o Editar tipo';
        $this->view = 'edit_tipo';
        /* si el parametro id llega con data */
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        }

        return $this->noteObj->getTipoById($id);
    }

    public function save()
    {
        $this->view = 'edit_tipo';
        $this->page_title = 'Editar Tipo';
        $id = $this->noteObj->save($_POST);
        $result = $this->noteObj->getTipoById($id);
        $_GET["response"] = true;
        return $result;
    }

    /* Confirm to delete */
    public function confirmDelete()
    {
        $this->page_title = 'Eliminar tipo';
        $this->view = 'confirm_delete_tipo';
        return $this->noteObj->getTipoById($_GET["id"]);
    }

    /* Delete */
    public function delete()
    {
        $this->page_title = 'Listado de tipos';
        $this->view = 'delete_tipo';
        return $this->noteObj->deleteTipoById($_POST["id"]);
    }

}
