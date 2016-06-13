<?php 
include("header.php");
include_once("CRUD/connection.php");
$produtoDAO = new ProdutoDAO($PDO);
$clienteDAO = new ClienteDAO($PDO);
$pedidoDAO = new PedidoDAO($PDO);
$alert= "";
if (isset($_GET['delete'])) {
  // deleta o idproduto
  $alert = $pedidoDAO->deletePedido(addslashes(trim($_POST['idpedido'])));
} else if (isset($_GET['update'])) {
  $pedido = new Pedido(
    addslashes(trim($_POST['produto'])),
    addslashes(trim($_POST['cliente']))
    );
  $alert = $pedidoDAO->updatePedido($pedido, addslashes(trim($_POST['idpedido'])));
}

$linhaProd = $produtoDAO->selectProduto();
$linhaCliente = $clienteDAO->selectCliente();
$linha = $pedidoDAO->selectPedido();
$aux = 0;
?>
<div class="container theme-showcase" role="main">
  <div class="page-header">
    <?=$alert?>
    <h1>Pedidos Realizados</h1>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome do Produto</th>
            <th>Nome do Cliente</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php  foreach ($linha as $listar) {  ?>
          <tr>
            <td><?=$aux++?></td>
            <td><?php echo $produtoDAO->selectNameProdutoById($listar->id_produto) ?></td>
            <td><?php echo $clienteDAO->selectNameClienteById($listar->id_cliente) ?></td>
            <td>
              <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modalAlterar" data-whatever="<?=$listar->id_pedido?>">Editar</button>
            </td>
            <td>
              <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalExcluir" data-whatever="<?=$listar->id_pedido?>">Excluir</button>
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
        <form action="?delete=true" method="post">
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" class="form-control pegaid" id="idpedido" name="idpedido">
              <p>Caso clique em "excluir" o pedido será excluido permanentemente e no caso de engano, precisará ser adicionado novamente!</p>
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
        <form id="pedidos_validate" action="?update=true" method="post">
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" class="form-control pegaid" id="idpedido" name="idpedido">
            </div>
            <div class="form-group">
              <label for="produto">Selecione o Produto</label>
              <select class="form-control" id="produto" name="produto">
                <option value="" selected>Escolha um Produto</option>
                <?php  foreach ($linhaProd as $listarProd) {  ?>
                <option value="<?=$listarProd->id?>"><?=$listarProd->nome?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="produto">Selecione o Cliente</label>
              <select class="form-control" id="cliente" name="cliente">
                <option value="" selected>Escolha um Cliente</option>
                <?php  foreach ($linhaCliente as $listarCliente) {  ?>
                <option value="<?=$listarCliente->id?>"><?=$listarCliente->nome?></option>
                <?php } ?>
              </select>
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