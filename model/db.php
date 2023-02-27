<?php

require_once 'config/config.php';

class Db
{

    private $host;
    private $db;
    private $user;
    private $pass;
    public $conection;

    public function __construct()
    {

        $this->host = constant('DB_HOST');
        $this->db = constant('DB');
        $this->user = constant('DB_USER');
        $this->pass = constant('DB_PASS');

        try {
            date_default_timezone_set('America/Caracas');
            setlocale(LC_ALL, "es_VE.UTF-8", "es_VE", "esp");
            $this->conection = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->db, $this->user, $this->pass,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

    }

}
