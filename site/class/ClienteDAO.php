<?php

/**
*  classe responsável pelo CRUD dos Clientes
*/

class ClienteDAO {

	private $PDO;

	function __construct(PDO $PDO)	{
		$this->PDO = $PDO;
	}

	function insertCliente (Cliente $cliente) {
		//Prepara o insert
		$insert=$this->PDO->prepare("INSERT INTO cliente(nome, email, telefone)VALUES(:nome, :email, :telefone)");
		$insert->bindValue(":nome",$cliente->nome);
		$insert->bindValue(":email",$cliente->email);
		$insert->bindValue(":telefone",$cliente->telefone);
		//Valida o insert
		$validar=$this->PDO->prepare("SELECT * FROM cliente WHERE email=:email");
		$validar->bindValue(":email",$cliente->email);
		$validar->execute();
		if ($validar->rowCount() == 0) {
			if ($insert->execute()) {
				return "<div class='alert alert-success alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>cliente inserido com sucesso!</strong> <a href='listar-clientes.php'>Clique aqui</a> para visualizar o Cliente inserido.</div>";
			} else {
				return "<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Ocorreu um erro</strong></div>";
			}
		} else {
			return "<div class='alert alert-warning alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Já existe um cliente com este endereço de e-mail!</strong></div>";
		}
	}

	function deleteCliente ($id) {
		$cliente = $this->PDO->prepare("DELETE FROM cliente WHERE id=:id");
		$cliente->bindValue(":id",$id);
		$clientePedidos = $this->PDO->prepare("DELETE FROM pedido WHERE id_cliente=:id");
		$clientePedidos->bindValue(":id",$id);
		if ($cliente->execute() && $clientePedidos->execute()) {
			return "<div class='alert alert-success alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Cliente deletado com sucesso!</strong> Seus respectivos pedidos também foram deletados!</div>";
		} else {
			return "<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Ocorreu um erro, o cliente não foi deletado</strong></div>";
		}
	}

	function selectCliente () {
		$cliente = $this->PDO->prepare("SELECT * FROM cliente");
		$cliente->execute();
		$linha= $cliente->fetchAll(PDO::FETCH_OBJ);
		return $linha;
	}

	function selectNameClienteById ($id) {
		$cliente = $this->PDO->prepare("SELECT * FROM cliente WHERE id=:id");
		$cliente->bindValue(":id",$id);
		$cliente->execute();
		$linha= $cliente->fetchAll(PDO::FETCH_OBJ);
		foreach ($linha as $listar) { 
		return $listar->nome;
		}
	}

	function updateCliente (Cliente $cliente, $id) {
		//Prepara o update
		$update=$this->PDO->prepare("UPDATE cliente SET nome=:nome, email=:email, telefone=:telefone WHERE id=:id");
		$update->bindValue(":nome",$cliente->nome);
		$update->bindValue(":email",$cliente->email);
		$update->bindValue(":telefone",$cliente->telefone);
		$update->bindValue(":id",$id);
		//Valida o update
		$validar=$this->PDO->prepare("SELECT * FROM cliente WHERE email=:email");
		$validar->bindValue(":email",$cliente->email);
		$validar->execute();
		if ($validar->rowCount() == 0) {
			if ($update->execute()) {
				return "<div class='alert alert-success alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>O cliente $cliente->nome foi atualizado com sucesso!</strong></div>";
			} else {
				return "<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Ocorreu um erro</strong></div>";
			}
		} else {
			return "<div class='alert alert-warning alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Já existe um produto com este nome!</strong></div>";
		}
	}

}
?>







