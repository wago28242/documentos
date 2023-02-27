<?php

require_once 'model/login.php';

class loginController
{
    public $page_title;
    public $view;

    public function __construct()
    {   
        
        $this->view = 'login_usuario';
        $this->page_title = '';
        $this->noteObj = new Login();

    }

    public function index($id = null)
    {
        $this->view = 'login_usuario';

    }

    public function login()
    {

        $credenciales = $this->noteObj->getLogin($_POST);

        if ($credenciales == 1) {
            session_start();
            $_SESSION["authorized"] = $credenciales;
            $this->view = 'menu';
            $this->page_title = '';

        }else{

            $this->view = 'login_usuario';
            $this->page_title = '';
            $_GET["response"] = false;
        }

        

        return $credenciales;

    }

    public function unauthorized(){
        $_GET["response"] = "unauthorized";

    }

    public function logout(){
    session_start();
    session_unset();
    session_destroy();
   
    
        $this->view = 'login_usuario';
    }

}
