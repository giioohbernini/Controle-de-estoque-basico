<?php 
include_once("header.php");
include_once("CRUD/connection.php");
$alert="";
if (isset($_POST['nome'])) {
$clienteDAO = new ClienteDAO($PDO);
  $cliente = new Cliente(
    addslashes(trim($_POST['nome'])),
    addslashes(trim($_POST['email'])),
    addslashes(trim($_POST['telefone']))
  );
$alert = $clienteDAO->insertCliente($cliente);
}
?>

<div class="container theme-showcase" role="main">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="page-header">
        <?=$alert?>
        <h1>Cadastrar Clientes</h1>
      </div>
      <form id="clientes_validate" method="POST" action="">
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

        <button type="submit" class="btn btn-primary btn-block">Cadastrar Clientes</button>
      </form>

    </div>
  </div>
</div> <!-- /container -->

<?php 

include("footer.php");

?>