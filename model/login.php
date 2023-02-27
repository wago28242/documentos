<?php 

class Login {

	private $table = '';
	private $conection;

	public function __construct() {
		
	}

	/* Set conection */
	public function getConection(){
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}

	/* Get all notes */
	public function getLogin($param){
		if(isset($param["usuario"]) && ($param["usuario"]=="pruebas@pruebas.com") && ($param["password"]=="pruebas")){
			$login=true;
			return $login;
		}else{
			$login=false;
			return $login;
		}
		
	}

	

}

?>