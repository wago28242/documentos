<?php 

class Menu {

	private $table = '';
	private $conection;

	public function __construct()
    {
        session_start();
        if($_SESSION["authorized"] != 1){
	    header("Location:index.php?controller=login&action=unauthorized");
        }

    }

	/* Set conection */
	public function getConection(){
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}

}

?>