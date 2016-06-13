<?php 
include("header.php");
include_once("CRUD/connection.php");
$alert="";
if (isset($_POST['nome'])) {
$produtoDAO = new ProdutoDAO($PDO);
  $produto = new Produto(
    addslashes(trim($_POST['nome'])),
    addslashes(trim($_POST['descricao'])),
    addslashes(trim($_POST['preco']))
  );
$alert= $produtoDAO->insertProduto($produto);
}
?>

<div class="container theme-showcase" role="main">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <div class="page-header">
        <?=$alert?>
        <h1>Adicionar Produtos</h1>
      </div>
      <form id="produto_validate" action="" method="POST" >
        <div class="form-group">
          <label for="nome">Nome do Produto</label>
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome aqui">
        </div>
        <div class="form-group">
          <label for="descricao">Descrição</label>
          <textarea class="form-control" rows="5" id="descricao" name="descricao" placeholder="Digite a Descrição aqui"></textarea>
        </div>
        <div class="form-group">
          <label for="preco">Preço</label>
          <input type="number" class="form-control" id="preco" name="preco" placeholder="Digite o Preço aqui">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
      </form>

    </div>
  </div>
</div> <!-- /container -->

<?php 

include("footer.php");

?>