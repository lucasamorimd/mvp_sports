
<?php

session_start();
if (isset($_SESSION['UsuarioLogado'])) {
    $logado = true;
    $nomeUsuarioLogado = $_SESSION['NomeUsuarioLogado'];
    $perfilUsuarioLogado = $_SESSION['PerfilUsuarioLogado'];
    //echo 'Seja Bem Vindo '.strtoupper($nomeUsuarioLogado)."<br/>";
    //echo 'Seu Perfil vale: '.$perfilUsuarioLogado."<br/>";
} else {
    $logado = false;
    $nomeUsuarioLogado = NULL;
    $perfilUsuarioLogado = NULL;
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

    <title>MVP Sports | produtos</title>
    <style>
  html {font-family: Roboto,GillSans, Calibri, Trebuchet, sans-serif;}	
  hr{ width: 80%;}
  p{ font-family: Roboto;}
  /*nav bar*/
  .brand-logo{margin-left: 10%;}
  .brand-logo1{margin-left: 60%}
  #dropdown1{margin-left: 1.2%;margin-top: 2.6%;}
  /*resto*/
  .promo{ margin-left: 0px; width:60%;}/*produto*/  
  .bnr{width: 100%;}
  .ctr{width: 90%; margin-left: 5%;}
  .size{ width: 45%; margin-left: 2.8%; float:left;}
  .bdireito{margin-top: -3%; font-weight: bold; font-size: 17px; }
  .besquerdo{margin-top: -3%; font-weight: bold; font-size: 17px;}
  /*modal*/
  .input-field label {color: #e65100;}/*laranjinha*/
   .input-field input[type=email]:focus + label, .input-field input[type=password]:focus + label {color: #e65100;}/*laranjinha*/
   .input-field input[type=email]:focus,.input-field input[type=password]:focus {border-bottom: 1px solid #000;box-shadow: 0 1px 0 0 #000;}/*preto*/
   .input-field input[type=email].valid,.input-field input[type=password].valid {border-bottom: 1px solid #33691e;box-shadow: 0 1px 0 0 #33691e;}/*tudo certo*/
   .input-field input[type=email].invalid,.input-field input[type=password].invalid  {border-bottom: 1px solid #d50000;box-shadow: 0 1px 0 0 #d50000;}/*deu ruim*/  
    </style>

    <!-- Custom styles for this template -->

  </head>

  <body >

  <nav>
    <div class="nav-wrapper grey darken-4">
        <a href="index.php" class="brand-logo">MVP SPORTS</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <?php if(!isset($_SESSION['UsuarioLogado'])):?>
      <ul class="brand-logo1">
      <li><a class="waves-effect waves-light btn modal-trigger grey darken-4" href="#modal1">logar</a></li>
      </ul>
      <ul class="brand-logo1">
      <li><a class="waves-effect waves-light btn modal-trigger grey darken-4" href="#modal2">Painel de Controle</a></li>
      </ul>
        <?php else:?>
      <ul class="brand-logo1">
        <li> seja bem vindo:</li>
        <li>
            
            <a class='dropdown-button btn grey darken-4' href='#' data-activates='dropdown1'><?php echo $nomeUsuarioLogado;?></a>            
              <ul id='dropdown1' class='dropdown-content'>
                  <?php if(isset($_SESSION['UsuarioLogado']) && ($_SESSION['PerfilUsuarioLogado']==1)):?>
                  <li><a href="pagecliente.php" class="black-text">meus dados</a></li>
                  <li><a href="clientes/pedidos.php" class="black-text">meus pedidos</a></li>
                  <li><a href="clientes/pedidos.php" class="black-text">carrinho</a></li>
                  <li><a href="control/controladorLogin.php?logout=true" class="black-text">logout</a></li>
                  <?php else:?>
                  <li><a href="view/PesquisarProdutos.php" class="black-text">Produtos</a></li>
                  <li><a href="view/PesquisarMarcas.php" class="black-text">Marcas</a></li>
                  <li><a href="#!" class="black-text">Clientes</a></li>
                  <li><a href="control/controladorLogin.php?logout=true" class="black-text">logout</a></li>
                  <?php endif;?>
              </ul>            
        </li>
        <li><a href="clientes/carrinho.php"><i class="large material-icons">shopping_cart</i></a></li>
      </ul>
      <?php endif;?>
      <ul class="side-nav grey darken-4" id="mobile-demo">
          <li ><a href="pagecliente.php" class="white-text">meus dados</a></li>
          <li ><a href="clientes/pedidos.php" class="white-text">meus pedidos</a></li>
          <li ><a href="clientes/carrinho.php"class="white-text">carrinho</a></li>
          <li ><a href="" class="white-text">logout</a></li>
      </ul>
    </div>
  </nav>  
      
 <!-- Modal Structure -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <h5>Fazer login</h5>
    <div class="divider"></div>
    <div class="row">
        <form class="col s12" action="control/controladorLogin.php" method="post">
        <div class="row">
          <div class="input-field col s12">
            <input id="email" name="emailUsuario" type="email" class="validate">
            <label for="email" data-error="preencha o campo corretamente" data-success="tudo certo">Email</label>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="row">
          <div class="input-field col s12">
              <input id="email" name="senhaUsuario" type="password" class="validate">
            <label for="email" data-error="preencha o campo corretamente" data-success="tudo certo">Senha</label>
          </div>
        </div>
        <div class="carousel-fixed-item center">
         <button id="submit-form" type="submite" class="waves-effect waves-light btn">Logar</button>
        </div>     
      </form>
    </div>
        <p> ainda não tem conta ? <a href="view/formCadastrarCliente.php">Cadastre-se</a></p>     
  </div>
</div>
 <div id="modal2" class="modal">
     <div class="modal-content">
         <h5>Fazer Login</h5>
         <div class="divider"></div>
         <div class="row">
             <form class="col s12" action="control/controladorLoginFunc.php" method="post">
                 <div class="row">
                     <div class="input-field col s12">
                         <input id="email" name="emailUsuario" type="email" class="validate">
                         <label for="email" data-error="preencha o campo corretamente" data-success="tudo certo">Email</label>
                     </div>
                 </div>
                 <div class="row">
                     <div class="input-field col s12">
                         <input id="senha" name="senhaUsuario" type="password" class="validate"> 
                         <label for='senha' data-error="preencha o campo corretamente" data-success="tudo certo">Senha</label>
                     </div>
                 </div>
                 <div class="carousel-fixed-item center">
                     <button id='submit-form' type="submite" class="waves-effect waves-light btn">Logar</button>
                 </div>
             </form>
             </div>
         </div> 
        
     </div>
<!--fim do modal-->          

        <!--<br>-->
        <section>
            <article>
        <!--<br>-->
	<!--<br>-->
            <div class="banner">
                <img src="nba.png" class="bnr" >
                    </div>

		<section>
                    <div clas="container">

                        <article>
                            <div class="ctr">
                                <div class="row">
                                    <!-- adicionar esses "if/else" na index de vcs-->
                  <!-- masculino--><a href="produtos/produtos_masculinos.php"><img src="index-att-1.png" style="width: 45%; margin-left: 2.8%; margin-top:2%; float:left;cursor:pointer"></a>
                   <!-- feminino--><a href="produtos/produtos_feminino.php"><img src="index-att-2.png" style="width: 45%; margin-left: 2.8%; margin-top:2%; float:left;cursor:pointer"></a>
                   <!-- infantis--><a href="produtos/produtos_infantis.php"><img src="index-att-3.png" style="width: 45%; margin-left: 2.8%; margin-top:2%; float:left;cursor:pointer"></a>
                                    <?php if(isset($_SESSION['UsuarioLogado'])&&($_SESSION['PerfilUsuarioLogado']==1)):?>
                  <!--Fazer uma imagem com o nome meus dados ou algo asism e colocar aqui-->
                                   <a href="pagecliente.php"><img src="index-att-4.png" style="width: 45%; margin-left: 2.8%; margin-top:2%; float:left;cursor:pointer"></a>
                                    <?php endif;?>
                                   <?php if(!isset($_SESSION['UsuarioLogado'])):?>
                      <!-- Todos--><a href="produtos/produtos_home.php"><img src="index-att-4.png" style="width: 45%; margin-left: 2.8%; margin-top:2%; float:left;cursor:pointer"></a>
                                    <?php endif;?>
                                <?php if(isset($_SESSION['UsuarioLogado'])&&($_SESSION['PerfilUsuarioLogado']!=1)):?>
                      <!--Fazer uma imagem com o nome Painel de Controle ou algo asism e colocar aqui-->
                                   <a href="paineldecontrole.php"><img src="index-att-1.png" style="width: 45%; margin-left: 2.8%; margin-top:2%; float:left;cursor:pointer"></a>
                                <?php endif;?>
                                </div>
                                <!--só até aqui mesmo, vlw seus lindo-->
                                <hr color='#e8eaf6'> <!--indigo lighten-5-->
                                <div class="carousel-fixed-item center">
                                    <a href="" class="btn waves-effect white orange darken-2 darken-text-2">produtos em destaque</a>
                                </div>                        
                                <div class="center">	
                                    <div class="promo">	
                                        <?php
                                        require_once './model/DAO/classeProdutoDAO.php';
                                        $ProdutoDAO = new classeProdutoDAO();
                                        $p = $ProdutoDAO->pesquisarProdutoMaisBarato();
                                        ?>		    
                                        <div class="row">
                                            <div class="col s12 m4 ">			    
                                                <div class="card ">
                                                    <div class="card-image waves-effect waves-block waves-light">
                                                        <img class="activator" src="<?php $foto =explode('/',$p->foto); echo "fotosProdutos/".$foto[2]; ?>">
                                                    </div>
                                                    <div class="card-content">
                                                        <span class="card-title activator grey-text text-darken-4"><a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a></span>
                                                    </div>
                                                    
                                                    <div class="card-reveal">
                                                        <span class="card-title grey-text text-darken-4"><?php echo $p->nomeproduto; ?><i class="material-icons right">close</i></span>
                                                        <ul>
                                                            <li>disponibilidade: <a href="paineldecontrole.php"><?php if($p->disponibilidade > 0) {     echo "disponível";} else {    echo "indisponível";} ?></a></li>
                                                            <li>restam: <a href="#"><?php echo $p->disponibilidade; ?></a></li>
                                                          <li>preço: <a href="#">R$: <?php echo $p->preco; ?> </a></li> 
                                                          
                                                          <br>
                                                          <li>
                                                              <a class="btn-floating btn-large waves-effect waves-light red" onclick="adicionarProdutoAoCarrinho(<?php echo $p->idproduto; ?>)" href="clientes/carrinho.php"><i class="material-icons">shopping_cart</i></a>
                                                          </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>     
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
    //modal//
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
  //

    var slider = document.getElementById('test5');
  noUiSlider.create(slider, {
   start: [20, 80],
   connect: true,
   step: 1,
   range: {
     'min': 0,
     'max': 100
   },
   format: wNumb({
     decimals: 0
   })
  }); 
  
      $(".button-collapse").sideNav();
      function adicionarProdutoAoCarrinho(idproduto){
      $.post('control/controladorCarrinho.php',{idproduto:idproduto},function(dados){
      });
  }
      </script>    
  </body>
</html>