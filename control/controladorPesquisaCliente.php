<?php
$nomeCliente = $_POST['nomeCliente'];

require_once '../model/DAO/classeClienteDAO.php';
$novoClienteDAO = new classeClienteDAO;

$cliente = $novoClienteDAO->pesquisarClientePorNome($nomeCliente);


?>
<?php
session_start();
if (isset($_SESSION['UsuarioLogado'])) {
    $nomeUsuarioLogado = $_SESSION['NomeUsuarioLogado'];
    $perfilUsuarioLogado = $_SESSION['PerfilUsuarioLogado'];
    //echo 'Seja Bem Vindo '.strtoupper($nomeUsuarioLogado)."<br/>";
    //echo 'Seu Perfil vale: '.$perfilUsuarioLogado."<br/>";
} else {
    $nomeUsuarioLogado = NULL;
    $perfilUsuarioLogado = NULL;
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">


    <title>MVP sports</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="../jumbotron.css" rel="stylesheet">
    <style> .tabla tr,td {
            border:radius;
            padding: 15px;
            text-align: left;
}
.table tr:nth-child(even) {background-color: #f2f2f2}
        
   </style>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="../index.php">MVP Sports</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="../view/formCadastrarCliente.php">Cadastrar Cliente</a></li>
                <li><a href="../view/formPesquisaCliente.php"> Pesquisar Cliente</a></li>
                <!--<li><a href="#"><a href="view/formLogin.php"> Fazer Login</a></li>-->
                <li><a href="../control/controladorLogin.php?logout=true">Fazer Logout</a></li>
            </ul>
          <?php if(!isset($_SESSION['UsuarioLogado'])): ?>
          <form class="navbar-form navbar-right" name="formLogin" method="post" action="../control/controladorLogin.php">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control" name="emailUsuario">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="senhaUsuario">
            </div>
            <button type="submit" class="btn btn-success">Fazer Login</button>
          </form>
          <?php else: ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Seja bem-vindo(a): <?php echo $nomeUsuarioLogado ?></a></li>
            </ul>
          <?php endif; ?>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
<div class="container">
    <h2>Pesquisa de cliente</h2>
<table class="table">
    <thead>
    <th>Nome</th>
    <th>Email</th>
    <th>Telefone</th>
    <th>Endereço</th>
    <th>CPF</th>
    <th>&nbsp;</th> <!-- isso é um caractere em branco -->
    <th>&nbsp;</th>
    </thead>
    <tbody>
    <?php foreach($cliente as $c){ ?>
    <tr>
        <td><?php echo $c->nome ?></td>
        <td><?php echo $c->email ?></td>
        <td><?php echo $c->telefone ?></td>
        <td><?php echo $c->endereco ?></td>
        <td><?php echo $c->cpf ?></td>
        <td><?php echo "<a class='btn btn-info' href='../view/formAlterarCliente.php?idCliente=".$c->idcliente 
                . "' onclick='return checkDelete()'><span class='glyphicon glyphicon-pencil'></span> Alterar";?></td>
        <td><?php echo "<a class='btn btn-danger' href='controladorExcluiCliente.php?idcliente="
        . $c->idcliente . "' onclick='return checkDelete()'><span class='glyphicon glyphicon-trash'></span> Excluir</a>";?></td>
        
    </tr>
    <?php } ?>
    </tbody>
</table>
</div>
      
</body>