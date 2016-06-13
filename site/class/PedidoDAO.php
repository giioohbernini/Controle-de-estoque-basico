<?php

/**
*  classe responsável pelo CRUD dos Pedidos
*/

class PedidoDAO {

	private $PDO;

	function __construct(PDO $PDO) {
		$this->PDO = $PDO;
	}

	function insertPedido (Pedido $pedido) {
		//Prepara o insert
		$insert=$this->PDO->prepare("INSERT INTO pedido(id_produto, id_cliente)VALUES(:id_produto, :id_cliente)");
		$insert->bindValue(":id_produto",$pedido->id_produto);
		$insert->bindValue(":id_cliente",$pedido->id_cliente);
		if ($insert->execute()) {
			return "<div class='alert alert-success alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Pedido inserido com sucesso!</strong> <a href='listar-pedidos.php'>Clique aqui</a> para visualizar o Pedido inserido.</div>";
		} else {
			return "<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Ocorreu um erro</strong></div>";
		}
	}

	function deletePedido ($id) {
		$pedido = $this->PDO->prepare("DELETE FROM pedido WHERE id_pedido=:id");
		$pedido->bindValue(":id",$id);
		if ($pedido->execute()) {
			return "<div class='alert alert-success alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Pedido deletado com sucesso!</strong></div>";
		} else {
			return "<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Ocorreu um erro, o pedido não foi deletado</strong></div>";
		}
	}

	function selectPedido () {
		$pedido = $this->PDO->prepare("SELECT * FROM pedido");
		$pedido->execute();
		$linha= $pedido->fetchAll(PDO::FETCH_OBJ);
		return $linha;
	}

	function updatePedido (Pedido $pedido, $id) {
		//Prepara o update
		$update=$this->PDO->prepare("UPDATE pedido SET id_produto=:id_produto, id_cliente=:id_cliente WHERE id_pedido=:id");
		$update->bindValue(":id_cliente",$pedido->id_cliente);
		$update->bindValue(":id_produto",$pedido->id_produto);
		$update->bindValue(":id",$id);
		if ($update->execute()) {
			return "<div class='alert alert-success alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>O pedido foi atualizado com sucesso!</strong></div>";
		} else {
			return "<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Ocorreu um erro</strong></div>";
		}
	}

}
?>







