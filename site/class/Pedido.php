<?php 

class Pedido {

	public $id_produto;
	public $id_cliente;
	public $id_pedido;

	
	function __construct($id_produto, $id_cliente)	{
		$this->id_cliente = $id_cliente;
		$this->id_produto = $id_produto;
	}
}

 ?>