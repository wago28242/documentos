<?php

require_once 'model/menu.php';

class menuController
{
    public $page_title;
    public $view;

    public function __construct()
    {   
        
        $this->view = 'menu';
        $this->page_title = '';
        $this->noteObj = new Menu();

    }

    public function index()
    {
        $this->view = 'menu';

    }

    

}
