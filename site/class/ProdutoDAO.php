<?php

/**
*  classe responsável pelo CRUD dos produtos
*/

class ProdutoDAO {

	private $PDO;

	function __construct(PDO $PDO)	{
		$this->PDO = $PDO;
	}

	function insertProduto (Produto $Produto) {
		//Prepara o insert
		$insert=$this->PDO->prepare("INSERT INTO produto(nome, descricao, preco)VALUES(:nome, :descricao, :preco)");
		$insert->bindValue(":nome",$Produto->nome);
		$insert->bindValue(":descricao",$Produto->descricao);
		$insert->bindValue(":preco",$Produto->preco);
		//Valida o insert
		$validar=$this->PDO->prepare("SELECT * FROM produto WHERE nome=:nome");
		$validar->bindValue(":nome",$Produto->nome);
		$validar->execute();
		if ($validar->rowCount() == 0) {
			if ($insert->execute()) {
				return "<div class='alert alert-success alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Produto inserido com sucesso!</strong> <a href='listar-produtos.php'>Clique aqui</a> para visualizar o produto inserido.</div>";
			} else {
				return "<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Ocorreu um erro</strong></div>";
			}
		} else {
			return "<div class='alert alert-warning alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Já existe um produto com este nome!</strong></div>";
		}
	}

	function deleteProduto ($id) {
		$produto = $this->PDO->prepare("DELETE FROM produto WHERE id=:id");
		$produto->bindValue(":id",$id);
		$produtoPedidos = $this->PDO->prepare("DELETE FROM pedido WHERE id_produto=:id");
		$produtoPedidos->bindValue(":id",$id);
		if ($produto->execute() && $produtoPedidos->execute()) {
			return "<div class='alert alert-success alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Produto deletado com sucesso!</strong> Seus respectivos pedidos também foram deletados!</div>";
		} else {
			return "<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Ocorreu um erro, o produto não foi deletado</strong></div>";
		}
	}

	function selectProduto () {
		$produto = $this->PDO->prepare("SELECT * FROM produto");
		$produto->execute();
		$linha= $produto->fetchAll(PDO::FETCH_OBJ);
		return $linha;
	}
	function selectNameProdutoById ($id) {
		$produto = $this->PDO->prepare("SELECT * FROM produto WHERE id=:id");
		$produto->bindValue(":id",$id);
		$produto->execute();
		$linha= $produto->fetchAll(PDO::FETCH_OBJ);
		foreach ($linha as $listar) { 
		return $listar->nome;
	}
	}


	function updateProduto (Produto $Produto, $id) {
		//Prepara o update
		$update=$this->PDO->prepare("UPDATE produto SET nome=:nome, descricao=:descricao, preco=:preco WHERE id=:id");
		$update->bindValue(":nome",$Produto->nome);
		$update->bindValue(":descricao",$Produto->descricao);
		$update->bindValue(":preco",$Produto->preco);
		$update->bindValue(":id",$id);
		//Valida o update
		$validar=$this->PDO->prepare("SELECT * FROM produto WHERE nome=:nome");
		$validar->bindValue(":nome",$Produto->nome);
		$validar->execute();
		if ($validar->rowCount() == 0) {
			if ($update->execute()) {
				return "<div class='alert alert-success alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>O produto $Produto->nome foi atualizado com sucesso!</strong></div>";
			} else {
				return "<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Ocorreu um erro</strong></div>";
			}
		} else {
			return "<div class='alert alert-warning alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Já existe um produto com este nome!</strong></div>";
		}
	}

}
?>







