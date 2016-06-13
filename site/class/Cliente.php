<?php 

class Cliente {

	public $id;
	public $nome;
	public $email;
	public $telefone;
	
	function __construct($nome,$email,$telefone) {
		$this->nome = $nome;
		$this->email = $email;
		$this->telefone = $telefone;
	}
}

 ?>