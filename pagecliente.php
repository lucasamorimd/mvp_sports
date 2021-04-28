<?php
session_start();
if (isset($_SESSION['UsuarioLogado']) && ($_SESSION['PerfilUsuarioLogado']==1)) {
    $logado = true;
    $nomeUsuarioLogado = $_SESSION['NomeUsuarioLogado'];
    $perfilUsuarioLogado = $_SESSION['PerfilUsuarioLogado'];
    $enderecoUsuarioLogado = $_SESSION['EnderecoUsuario'];
    $emailUsuarioLogado = $_SESSION['EmailUsuario'];
    $cpfUsuarioLogado = $_SESSION['cpfUsuario'];
    $senhaUsusarioLogado = $_SESSION['SenhaUsuario'];
    $telefoneUsuarioLogado = $_SESSION['TelefoneUsuario'];
    $idCliente = $_SESSION['IdUsuarioLogado'];
    //echo 'Seja Bem Vindo '.strtoupper($nomeUsuarioLogado)."<br/>";
    //echo 'Seu Perfil vale: '.$perfilUsuarioLogado."<br/>";
} else {
    Header("Location: index.php");
    $logado = false;
    $nomeUsuarioLogado = NULL;
    $perfilUsuarioLogado = NULL;
    
}

if(isset($_GET['mensagem'])){
    $mensagemCliente =  "Materialize.toast('".$_GET['mensagem']."', 5000)";
}else{
    $mensagemCliente = null;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/custom.css"  media="screen"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>MVP Sports | cliente</title>
    <style>
  html {font-family: Roboto,GillSans, Calibri, Trebuchet, sans-serif;}	
  hr{ width: 80%;}
  .toast{
      background-color: green !important;
  }
  p{ font-family: Roboto;}
  /*nav bar*/
  .brand-logo{margin-left: 10%;}
  .brand-logo1{margin-left: 50%}
  /*resto*/
  .promo{ margin-left: 0px; width:60%;}/*produto*/ 
  .painel{width: 20%; float: left;}  
  .bnr{width: 100%;}
  .ctr{width: 90%; margin-left: 5%;}
  .conteudo{width:80%; margin-left: 15%;}
  .titulo{font-weight: bold; font-size: 190%; margin-left: 15%; }
  .dados{ width: 100%; margin-left: 12%;}
  /*modal*/
  .input-field label {color: #e65100;}/*laranjinha*/
  .input-field input[type=email]:focus + label {color: #e65100;}/*laranjinha*/
  .input-field input[type=email]:focus {border-bottom: 1px solid #000;box-shadow: 0 1px 0 0 #000;}/*preto*/
  .input-field input[type=email].valid {border-bottom: 1px solid #33691e;box-shadow: 0 1px 0 0 #33691e;}/*tudo certo*/
  .input-field input[type=email].invalid {border-bottom: 1px solid #d50000;box-shadow: 0 1px 0 0 #d50000;}/*deu ruim*/  
    </style>

    <!-- Custom styles for this template -->

  </head>

  <body >

  <nav>
    <div class="nav-wrapper grey darken-4">
      <a href="index.php" class="brand-logo">MVP SPORTS</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="brand-logo1">
          <li class="orange"><a href="">meus dados</a></li>
          <li><a href="clientes/pedidos.php">meus pedidos</a></li>
          <li><a href="clientes/carrinho.php">carrinho</a></li>
          <li><a href=""><?php echo $nomeUsuarioLogado; ?></a></li>
          <li><a href="control/controladorLogin.php?logout=true">logout</a></li>
        <li><a href="index.php"><i class="large material-icons">store</i></a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
      </ul>
    </div>
  </nav>  
      
 <!-- Modal Structure -->

<!--fim do modal-->          

        <!--<br>-->
        <section>
            <article>
        <!--<br>-->
	<!--<br>-->
                    <div class="banner">
                        <a href="index.php"><img src="bnr.png" style="width: 100%; heightcursor:pointer"></a>
                    </div>
		<section>
                    <div clas="container">

                        <article>
                            <div class="ctr">
                                <div class="painel">
                                    <div class="collection  ">
                                        <a href="#!" class="collection-item active grey darken-4"> Menu</a>
                                        <a href="" class="collection-item active orange accent-3"> Meus dados</a>
                                        <a href="clientes/pedidos.php" class="collection-item black-text"> Meus pedidos</a>
                                        <a href="clientes/carrinho.php" class="collection-item black-text"> Carrinho</a>
                                        <a href="control/controladorLogin.php?logout=true;" class="collection-item black-text"> Logout</a>                                        
                                    </div>                                    
                                </div>
                                <div class="conteudo">
                                    <p class="titulo">Meus Dados</p>
                                    <hr color='#e8eaf6'>
                                    <div class="dados">
                                        <form action="control/ControladorAlterarCliente.php" method="post">
                                    <div class="row">
                                      <div class="input-field col s5">
                                          <input  value="<?php echo $nomeUsuarioLogado;?>" id="first_name2" name="nome" type="text" class="validate">
                                        <label class="active" for="first_name2">Nome</label>
                                      </div>
                                      <div class="input-field col s5">
                                          <input value="<?php echo $senhaUsusarioLogado;?>" id="first_name2" name="senha" type="password" class="validate">
                                        <label class="active" for="first_name2">Senha</label>
                                      </div>
                                      <div class="input-field col s10">
                                          <input value="<?php echo $emailUsuarioLogado;?>" id="first_name2" name="email" type="text" class="validate">
                                        <label class="active" for="first_name2">Email</label>
                                      </div> 
                                      <div class="input-field col s4">
                                          <input value="<?php echo $enderecoUsuarioLogado; ?>" id="first_name2" name="endereco" type="text" class="validate">
                                        <label class="active" for="first_name2">Endereço</label>
                                      </div>
                                      <div class="input-field col s3">
                                          <input value="<?php echo $cpfUsuarioLogado;?>" id="first_name2" name="cpf" type="text" class="validate">
                                        <label class="active" for="first_name2">C.P.F</label>
                                      </div>
                                      <div class="input-field col s3">
                                          <input value="<?php echo $telefoneUsuarioLogado;?>" id="first_name2" name="telefone" type="text" class="validate">
                                        <label class="active" for="first_name2">Telefone</label>
                                      </div>
                                      <div class="input-field col s3">
                                          <input type="hidden" name="idCliente" value="<?php echo $idCliente ?>">
                                          <button type="submite" class="waves-effect waves-light btn orange darken-2"> Salvar</button>    
                                      </div>
                                    </div>
                                        </form>
                                    </div>    
                                </div>    
                            </div>
                        </article> 
                    </div>
		</section>
                
            </article>    
        </section>
        <br>
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
            � 2016 MVP SPORTS

            </div>
          </div>
        </footer>
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script><!-- baixar vers�o do jquery a mais -->
      <script type="text/javascript" src="js/materialize.min.js"></script>	
      <script type="text/javascript" src="js/interacoes.js"></script>
      <script>

    $('.carousel.carousel-slider').carousel({full_width: true}); 
    
    //modal//
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
    <?php echo $mensagemCliente; ?>
  });
  //


      </script>    
  </body>
</html>
