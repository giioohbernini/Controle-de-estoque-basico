<?php 

include("header.php");
include_once("CRUD/connection.php");
$produtoDAO = new ProdutoDAO($PDO);
$clienteDAO = new ClienteDAO($PDO);
$pedidoDAO = new PedidoDAO($PDO);
$alert="";
if (isset($_POST['produto'])) {
  $pedido = new Pedido(
    addslashes(trim($_POST['produto'])),
    addslashes(trim($_POST['cliente']))
);
  $alert= $pedidoDAO->insertPedido($pedido);
}
$linhaProd = $produtoDAO->selectProduto();
$linhaCliente = $clienteDAO->selectCliente();
$aux = 0;
?>

<div class="container theme-showcase" role="main">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="page-header">
        <?=$alert?>
        <h1>Realizar Pedidos</h1>
      </div>
      <form id="pedidos_validate" action="" method="post">
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

        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
      </form>

    </div>
  </div>
</div> <!-- /container -->

<?php 

include("footer.php");

?>