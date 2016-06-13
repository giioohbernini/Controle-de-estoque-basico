<?php 
include("header.php");
include_once("CRUD/connection.php");
$clienteDAO = new ClienteDAO($PDO);
$alert="";
if (isset($_GET['delete'])) {
  // deleta o cliente
  $alert = $clienteDAO->deleteCliente(addslashes(trim($_POST['idcliente'])));
} else if (isset($_GET['update'])) {
  $cliente = new Cliente(
    addslashes(trim($_POST['nome'])),
    addslashes(trim($_POST['email'])),
    addslashes(trim($_POST['telefone']))
    );
  $alert = $clienteDAO->updateCliente($cliente, addslashes(trim($_POST['idcliente'])));
}

$linha = $clienteDAO->selectCliente();
$aux = 0;
?>

<div class="container theme-showcase" role="main">
  <div class="page-header">
    <?=$alert?>
    <h1>Listar Clientes</h1>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
         <?php  foreach ($linha as $listar) {  ?>
         <tr>
          <td><?=$aux++?></td>
          <td><?=$listar->nome?></td>
          <td><?=$listar->email?></td>
          <td><?=$listar->telefone?></td>
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
      <form action="?delete=true" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control pegaid" id="idcliente" name="idcliente">
            <p>Caso clique em "excluir" o cliente será excluido permanentemente junto com seus respectivos pedidos e no caso de engano, precisará ser adicionado novamente!</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Excluir</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="modal fade" id="modalAlterar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="" id="exampleModalLabel">Preencha os campos abaixo!</h4>
      </div>
      <form id="clientes_validate" method="POST" action="?update=true">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control pegaid" id="idcliente" name="idcliente">
          </div>
          <div class="form-group">
            <label for="nome">Nome do Cliente</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o Nome aqui">
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite o Email aqui">
          </div>
          <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="number" class="form-control" id="telefone" name="telefone" placeholder="Digite o Telefone aqui">
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