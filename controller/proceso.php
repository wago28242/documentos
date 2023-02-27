<?php

require_once 'model/proceso.php';

class procesoController
{
    public $page_title;
    public $view;

    public function __construct()
    {
        $this->view = 'listar_proceso';
        $this->page_title = '';
        $this->noteObj = new Proceso();
    }

    function list() {
        $this->page_title = 'Listado de procesos';
        return $this->noteObj->getProcesos();
    }

    public function edit($id = null)
    {
        $this->page_title = 'Crear o Editar proceso';
        $this->view = 'edit_proceso';
        /* si el parametro id llega con data */
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        }

        return $this->noteObj->getProcesoById($id);
    }

    public function save()
    {
        $this->view = 'edit_proceso';
        $this->page_title = 'Editar Proceso';
        $id = $this->noteObj->save($_POST);
        $result = $this->noteObj->getProcesoById($id);
        $_GET["response"] = true;
        return $result;
    }

    /* Confirm to delete */
    public function confirmDelete()
    {
        $this->page_title = 'Eliminar proceso';
        $this->view = 'confirm_delete_proceso';
        return $this->noteObj->getProcesoById($_GET["id"]);
    }

    /* Delete */
    public function delete()
    {
        $this->page_title = 'Listado de procesos';
        $this->view = 'delete_proceso';
        return $this->noteObj->deleteProcesoById($_POST["id"]);
    }

}
