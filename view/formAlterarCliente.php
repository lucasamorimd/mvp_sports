<?php

require_once '../model/DAO/classeClienteDAO.php';

if(isset($_GET['idCliente'])){
    $idCliente = $_GET['idCliente'];
    $modelCliente = new classeClienteDAO();
    $c = $modelCliente->pesquisarClientePorId($idCliente);
}else{
    $idCliente = null;
}

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
<<!DOCTYPE html>
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
      <div class="row"
        <div class="col-md-12">
            <h2>Alterar Cliente</h2>
        <form action="../control/controladorCliente.php" 
              method="POST"
              name="formCadastrarCliente"
              id="formCadastrarCliente"
              >
            <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input class="form-control" name="nomeCliente" value="<?php echo $c->nome ?>">
                </div>
            
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="emailCliente" value="<?php echo $c->email ?>">
                </div>
            
                <div class="form-group">
                    <label for="exampleInputEmail1">Telefone</label>
                    <input class="form-control" name="telefoneCliente" value="<?php echo $c->telefone ?>">
                </div>
            
                <div class="form-group">
                    <label for="exampleInputEmail1">Endereço</label>
                    <input class="form-control" name="enderecoCliente" value="<?php echo $c->endereco ?>">
                </div>
            
                <div class="form-group">
                    <label for="exampleInputEmail1">CPF</label>
                    <input class="form-control" name="cpfCliente" value="<?php echo $c->cpf ?>">
                </div>
            
                <div class="form-group">
                    <label for="exampleInputEmail1">Senha</label>
                    <input class="form-control" name="senhaCliente" placeholder="Senha">
                </div>
            
                <div class="form-group">
                    <input type="hidden" name="idCliente" value="<?php echo $idCliente; ?>" />
                    <input type="submit" class="btn btn-success" value="Alterar" placeholder="">
                </div>
        </form>
			<!--<table style="width: 625px;" border="0">
				<tbody>
					<tr>
						<td width="69">Nome:</td>
						<td width="546"><input id="nomeCliente" maxlength="60" name="nomeCliente" size="70" type="text" value="<?php echo $c->nome ?>"/>
							<span class="style1">*</span></td>
						</td>	
					</tr>
					<tr>
						<td>Email:</td>
                                                <td><input id="emailCliente" maxlength="60" name="emailCliente" size="70" type="email" value="<?php echo $c->email ?>"/>
							<span class="style1">*</span>
						</td>
					</tr>
                                        <tr>
                                            <td>Telefone:</td>
                                            <td><input id="telefoneCliente" maxlength="60" name="telefoneCliente" size="70" type="tel" value="<?php echo $c->telefone ?>">
					<tr>
						<td>Endereço:</td>
						<td><input id="enderecoCliente" maxlength="70" name="enderecoCliente" size="70" type="text" value="<?php echo $c->endereco ?>" />
							<span class="style1">*</span>
						</td>
                                        </tr>
                                        <tr>
                                            
                                            <td>CPF:</td>
                                            <td><input id="cpfCliente" maxlength="80" name="cpfCliente" size="70" type="text" value="<?php echo $c->cpf ?>"/>
                                            </td>
                                        </tr>
					
					<tr>
						<td>Senha:</td>
						<td><input id="senhaCliente" maxlength="12" name="senhaCliente" type="password"/>
							<span class="style1">*</span>
						</td>
					</tr>
                                        <!--<tr>
                                            <td>Data de Cadastro: </td>
                                            <td>
                                                <input disabled id="datacadastroCliente" maxlength="50" name="datacadastroCliente" type="date"/>
                                            </td>
                                        </tr>
					<tr>
						<td colspan="2">
							<input id="cadastrarCliente" name="cadastrarCliente" type="checkbox" value="ativo"/>
							Desejo receber novidades e informações sobre o conteúdo deste site.
							
						</td>
					</tr>
					<tr>
						<td colspan="2"><p>
                                                        <input type="hidden" name="idCliente" value="<?php echo $c->idcliente; ?>" />
							<input id="cadastrarCliente" name="cadastrarCliente" type="submit" value="Alterar"/>
						
						
							<input id="limpar" name="limpar" type="reset" value="limpar"/>
							
							
							<span class="style1"></span>campos com * são obrigatórios!</p>
						</td>
					</tr>	
					</tr>
					
				</tbody>
			</table>-->
		</form>
        <?php
        // put your code here
        ?>
    </body>
</html>
