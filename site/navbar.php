<?php 
  include_once("functions.php");
 ?>
<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Projeto Abril</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php if (pegaurl("index") === true || pegaurl("") === true) {echo "class='active'" ;} ?>><a href="index.php">Home</a></li>
            <li class="dropdown <?php if (pegaurl("listar-produtos") === true || pegaurl("adicionar-produtos") === true) {echo "active" ;} ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produtos<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="listar-produtos.php">Listar produtos</a></li>
                <li><a href="adicionar-produtos.php">Adicionar produtos</a></li>
              </ul>
            </li>
            <li class="dropdown <?php if (pegaurl("listar-clientes") === true || pegaurl("cadastrar-clientes") === true) {echo "active" ;} ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="listar-clientes.php">Listar clientes</a></li>
                <li><a href="cadastrar-clientes.php">Cadastrar Clientes</a></li>
              </ul>
            </li>
            <li class="dropdown <?php if (pegaurl("listar-pedidos") === true || pegaurl("realizar-pedidos") === true) {echo "active" ;} ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pedidos<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="listar-pedidos.php">Listar pedidos</a></li>
                <li><a href="realizar-pedidos.php">Realizar pedidos</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>