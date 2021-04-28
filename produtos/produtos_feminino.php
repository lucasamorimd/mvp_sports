
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
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../css/custom.css"  media="screen"/>
      <link type="text/css" rel="stylesheet" href="../css/estiloCarrinho.css" media="screen"/>
      <link type="text/css" rel="stylesheet" href="produtos.css" media="screen"/>
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
  .promo{ float: left;width:80%; position: relative;margin-bottom:  1%;}/*produto*/  
  .bnr{width: 100%;}
  .ctr{width: 90%; margin-left: 5%;}
  .size{ width: 45%; margin-left: 2.8%; float:left;}
  .bdireito{margin-top: -3%; font-weight: bold; font-size: 17px;}
  .besquerdo{margin-top: -3%; font-weight: bold; font-size: 17px;}
  .painel{width: 20%; float: left;}
  .waves-effect.waves-brown .waves-ripple {background-color: rgba(121, 85, 72, 0.65);}
  .botoo{margin-top: 2%;margin-bottom: 2%;}    
  .descricao{margin-bottom: 15%;}
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
        <a href="../index.php" class="brand-logo">MVP SPORTS</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <?php if(!isset($_SESSION['UsuarioLogado'])):?>
      <ul class="brand-logo1">
      <li><a class="waves-effect waves-light btn modal-trigger grey darken-4" href="#modal1">logar</a></li>
      </ul>
        <?php else:?>
      <ul class="brand-logo1">
        <li> seja bem vindo:</li>
        <li>
            
            <a class='dropdown-button btn grey darken-4' href='#' data-activates='dropdown1'><?php echo $nomeUsuarioLogado;?></a>            
              <ul id='dropdown1' class='dropdown-content'>
                  <li><a href="pagecliente.php" class="black-text">meus dados</a></li>
                  <li><a href="clientes/pedidos.php" class="black-text">meus pedidos</a></li>
                  <li><a href="clientes/pedidos.php" class="black-text">carrinho</a></li>
                  <li><a href="../control/controladorLogin.php?logout=true" class="black-text">logout</a></li>
              </ul>            
        </li>
        <li><a href="../clientes/carrinho.php"><i class="large material-icons">shopping_cart</i></a></li>
        <li><a href="../index.php"><i class="large material-icons">store</i></a></li>        
      </ul>
      <?php endif;?>
      <ul class="side-nav grey darken-4" id="mobile-demo">
          <li ><a href="../pagecliente.php" class="white-text">meus dados</a></li>
          <li ><a href="../clientes/pedidos.php" class="white-text">meus pedidos</a></li>
          <li ><a href="../clientes/carrinho.php"class="white-text">carrinho</a></li>
          <li ><a href="" class="white-text">logout</a></li>
      </ul>
    </div>
  </nav>  
      
 <!-- Modal Structure -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <h5>Fazer login</h5>
<hr color='#e8eaf6'> <!--indigo lighten-5-->    
    <div class="row">
        <form class="col s12" action="../control/controladorLogin.php" method="post">
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
         <button id="submit-form" type="submite" class="waves-effect waves-light btn">logar</button>
        </div>     
      </form>        
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
                        <a href="../index.php"><img src="../bnr_F.png" style="width: 100%;height:20%; heightcursor:pointer"></a>
                    </div>
		<section>
                    <div clas="container">

                        <div class="row">
                            <div class="ctr">
                                <hr color='#e8eaf6'> <!--indigo lighten-5-->
                                <div class="painel">
                                    <?php
                                    require_once '../model/DAO/classeProdutoDAO.php';
                                    $ProdutoDAO = new classeProdutoDAO();
                                    $categoria = array('Infantil','Feminino','Masculino');
                                         $_SESSION['infantil'] = count($ProdutoDAO->pesquisarProdutoPorCategoria($categoria[0]));
                                         $_SESSION['feminino'] = count($ProdutoDAO->pesquisarProdutoPorCategoria($categoria[1]));
                                         $_SESSION['masculino'] = count($ProdutoDAO->pesquisarProdutoPorCategoria($categoria[2]));
                                         $_SESSION['todos'] = count($ProdutoDAO->listarProduto());
                                    $categoria = "Feminino";
                                    
                                    $produtos = $ProdutoDAO->pesquisarProdutoPorCategoria($categoria);
                                    
                                    $_SESSION['feminino'] = count($produtos);
                                    ?>
                                    <div class="collection ">
                                        <a href="produtos_masculinos.php" class="collection-item black-text"><span class="white-text badge red"><?php echo $_SESSION['masculino']; ?></span> Masculino</a>
                                        <a href="produtos_feminino.php" class="collection-item grey darken-4 active "><span class="white-text badge orange"><?php echo $_SESSION['feminino']; ?></span> Feminino</a>
                                        <a href="produtos_infantis.php" class=" collection-item black-text"><span class="white-text badge red"><?php echo $_SESSION['infantil']; ?></span> Infantil</a>
                                        <a href="produtos_home.php" class="collection-item black-text"><span class="white-text badge red"><?php echo $_SESSION['todos']; ?></span> todos</a>
                                        
                                    </div>                                   
                                </div>                       
                                <div class="center">	
                                    <div class="promo">			    
                                        <div class="row">
                                         <?php
                                         foreach ($produtos as $produto){
                                         ?>
                                            <div class="col s12 m4 ">			    
                                                <div class="card produto">
                                                    <?php
                                                    $noCarrinho = FALSE;
                                                    $quantidade = 0;
                                                        
                                                    for($i = 0;$i < count($_SESSION['carrinho']);$i++){
                                                    $noCarrinho = $_SESSION['carrinho'][$i]['idproduto'] == $produto->idproduto?true:false;
                                                    if($noCarrinho){
                                                        $quantidade = $_SESSION['carrinho'][$i]['quantidade'];
                                                    }
                                                    
                                                    }
                                                    ?>
                                                    <div class="card-image waves-effect waves-block waves-light">
                                                      <img class="activator" src="<?php echo $produto->foto; ?>">
                                                    </div>
                                                    <p class="t4 prod"> <?php echo $produto->nomeproduto; ?></p>
                                                    <p class="t4 prod">Carrinho: <span id="qtdP_<?php echo $produto->idproduto; ?>"><?php echo $quantidade; ?></span></p>
                                                    <button class="btn detproduto1 orange accent-4 btnss" type="button" name="action">R$ <?php echo $produto->preco; ?>
                                                        <i class="material-icons right">loyalty</i>
                                                    </button>                                                    
                                                    <?php if($produto->disponibilidade > 0){
                                                    ?>
                                                    
                                                    <button class="btn detproduto waves-effect waves-light blue darken-4 btnss" type="button" id="carrinho_<?php echo $produto->idproduto; ?>" onclick="adicionarProdutoAoCarrinho(<?php echo $produto->idproduto; ?>)"name="action">carrinho
                                                        <i class="material-icons right">shopping_cart</i>
                                                    </button>
                                                    
                                                      
                                                    <?php } else { ?>
                                                    <button class="btn detproduto red darken-4 btnss" type="button">Indisponível</button>
                                                    <?php } ?>  
                                                    
                                                    <div class="card-action">
                                                        <p class="right grey-text info"><?php echo $produto->descricao; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                         <?php } ?>
                                     </div>     
                                    </div>
                                </div>
                            </div>
                        </div>    
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
        <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script><!-- baixar vers�o do jquery a mais -->
      <script type="text/javascript" src="../js/materialize.min.js"></script>	
      <script type="text/javascript" src="../js/interacoes.js"></script>
      <script>

    $('.carousel.carousel-slider').carousel({full_width: true}); 
    
    //modal//
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
  //
function adicionarProdutoAoCarrinho(idproduto,preco){
      $.post('../control/controladorCarrinho.php',{idproduto:idproduto},function(dados){
            var qtdP = Number($("#qtdP_"+idproduto).html());
             qtdP++;
             $("#qtdP_"+idproduto).text(qtdP.toString());
             console.log(qtdP)
             document.getElementById("retirar_"+idproduto).removeAttribute("style");
      });
  

      </script>    
  </body>
</html>