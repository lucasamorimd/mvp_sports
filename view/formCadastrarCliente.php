<?php

if(isset($_GET['idcliente'])){
    $idCliente = $_GET['idcliente'];
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
<!DOCTYPE html>
<html lang="en">
  <head>
              <meta charset="UTF-8">
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>
        .input-field label {color: #e65100;}/*laranjinha*/
        .input-field input[type=email]:focus + label {color: #e65100;}/*laranjinha*/
        .input-field input[type=email]:focus {border-bottom: 1px solid #000;box-shadow: 0 1px 0 0 #000;}/*preto*/
        .input-field input[type=email].valid {border-bottom: 1px solid #33691e;box-shadow: 0 1px 0 0 #33691e;}/*tudo certo*/
        .input-field input[type=email].invalid {border-bottom: 1px solid #d50000;box-shadow: 0 1px 0 0 #d50000;}/*deu ruim*/           
      </style>    
  </head>

  <body>

        <nav>
            <div class="nav-wrapper grey darken-4">
                <a href="#" class > MVP SPORTS</a>
            </div>
        </nav>
      
        <section>
            <article>
                <br>
                <div class="row">
                   <form class="col s12" action="../control/controladorCliente.php" method="post">
                        <div class="row">
                          <div class="input-field col s12">
                              <input id="nome" name="nomeCliente" type="text" placeholder="Nome"  required>
                            
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                              <input id="senha" placeholder="Senha" name="senhaCliente" type="password" class="validate" pattern=".{6,}" title="a senha precisa ter 6 ou mais caracteres" required>
                            
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                              <input id="email" placeholder="Email" name="emailCliente" type="email" class="validate" required>
                            
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                              <input id="endereco" placeholder="Endereço" name="enderecoCliente" type="text" class="validate" required>
                            
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                              <input id="cpf" placeholder="C.P.F" name="cpfCliente" type="text" class="validate" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Digite o CPF no formato nnn.nnn.nnn-nn" required>                            
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                              <input id="email" placeholder="Telefone" name="telefoneCliente" type="tel" class="validate" pattern="^\d{3}-\d{5}-\d{4}$" title="Digite o telefone no formato ddd-9nnnn-nnnn" required>                            
                          </div>
                        </div>
                        <div class="carousel-fixed-item center">
                            <button id="submit-form" type="reset" class="waves-effect waves-light btn orange darken-1">limpar</button> 
                            <button id="submit-form" type="submit" class="waves-effect waves-light btn orange darken-1">cadastrar</button>
                        </div>                       
                    </form>
                </div>               
            </article>    
        </section>
        <footer class="page-footer grey darken-4">
          <div class="container ">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">conteudo</h5>
                <p class="grey-text text-lighten-4">a colocar.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">fale conosco</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">facebook</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">youtube</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">twitter</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">google+</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright center grey darken-3">
            <div class="container">
            © 2016 MVP SPORTS

            </div>
          </div>
        </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  </body>
</html>