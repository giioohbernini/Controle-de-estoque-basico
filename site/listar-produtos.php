<?php 
include("header.php");
include_once("CRUD/connection.php");
$produtoDAO = new ProdutoDAO($PDO);
$alert="";
if (isset($_GET['delete'])) {
  // deleta o produto
  $alert = $produtoDAO->deleteProduto(addslashes(trim($_POST['idproduto'])));
} else if (isset($_GET['update'])) {
  $produto = new Produto(
    addslashes(trim($_POST['nome'])),
    addslashes(trim($_POST['descricao'])),
    addslashes(trim($_POST['preco']))
  ); 
  $alert = $produtoDAO->updateProduto($produto, addslashes(trim($_POST['idproduto'])));
}

$linha = $produtoDAO->selectProduto();
$aux = 0;
?>

<div class="container theme-showcase" role="main">
  <div class="page-header">
    <?=$alert?>
    <h1>Listar Produtos</h1>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php  foreach ($linha as $listar) {  ?>
          <tr>
            <td><?=$aux++?></td>
            <td><?=$listar->nome?></td>
            <td><?=$listar->descricao?></td>
            <td><?=$listar->preco?></td>
            <td>
              <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modalAlterar" data-whatever="<?=$listar->id?>">Editar</button>
            </td>
            <td>
              <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalExcluir" data-whatever="<?=$listar->id?>">Excluir</button>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="" id="exampleModalLabel">Deseja realmente excluir?</h4>
        </div>
        <div class="modal-body">
        <form action="?delete=true" method="post">
            <div class="form-group">
              <input type="hidden" class="form-control pegaid" id="idproduto" name="idproduto">
              <p>Caso clique em "excluir" o produto será excluido permanentemente junto com seus respectivos pedidos e no caso de engano, precisará ser adicionado novamente!</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Excluir</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalAlterar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="" id="exampleModalLabel">Preencha os campos abaixo!</h4>
        </div>
        <form id="produto_validate" action="?update=true" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" class="form-control pegaid" id="idproduto" name="idproduto">
            </div>
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
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-warning">Alterar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> <!-- /container -->

<?php 

include("footer.php");

?>