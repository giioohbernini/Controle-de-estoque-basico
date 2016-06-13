<?php 

class Produto {

	public $id;
	public $nome;
	public $descricao;
	public $preco;
	
	function __construct($nome,$descricao,$preco)	{
		$this->nome = $nome;
		$this->descricao = $descricao;
		$this->preco = $preco;
	}
}
 ?>