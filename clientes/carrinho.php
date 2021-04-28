
<?php
session_start();
if (isset($_SESSION['UsuarioLogado']) && ($_SESSION['PerfilUsuarioLogado'] == 1)) {
    $logado = true;
    $nomeUsuarioLogado = $_SESSION['NomeUsuarioLogado'];
    $perfilUsuarioLogado = $_SESSION['PerfilUsuarioLogado'];
    //echo 'Seja Bem Vindo '.strtoupper($nomeUsuarioLogado)."<br/>";
    //echo 'Seu Perfil vale: '.$perfilUsuarioLogado."<br/>";
} else {
    $logado = false;
    $nomeUsuarioLogado = NULL;
    $perfilUsuarioLogado = NULL;
    echo "<script>";
    echo "window.location='../index.php'";
    echo "</script>";
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
        <link type="text/css" rel="stylesheet" href="cliente.css" media="screen"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>MVP Sports | cliente</title>


        <!-- Custom styles for this template -->

    </head>

    <body >

        <nav>
            <div class="nav-wrapper grey darken-4">
                <a href="../index.php" class="brand-logo">MVP SPORTS</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="brand-logo1">
                    <li><a href="../pagecliente.php">meus dados</a></li>
                    <li><a href="pedidos.php">meus pedidos</a></li>
                    <li class="orange"><a href="carrinho.php">carrinho</a></li>
                    <li><a href=""><?php echo $nomeUsuarioLogado; ?></a></li>
                    <li><a href="../control/controladorLogin.php?logout=true">logout</a></li>
                    <li><a href="../index.php"><i class="large material-icons">store</i></a></li>
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
                    <a href="../index.php"><img src="../bnr.png" style="width: 100%; heightcursor:pointer"></a>
                </div>
                <section>
                    <div clas="container">

                        <div class="row">
                            <div class="ctr">
                                <div class="painel">
                                    <div class="collection  ">
                                        <a href="#!" class="collection-item active grey darken-4"> Menu</a>
                                        <a href="../pagecliente.php" class="collection-item black-text "> Meus dados</a>
                                        <a href="pedidos.php" class="collection-item black-text "> Meus pedidos</a>
                                        <a href="" class="collection-item active orange accent-3"> Carrinho</a>
                                        <a href="../control/controladorLogin.php?logout=true" class="collection-item black-text"> Logout</a>                                        
                                    </div>                                    
                                </div>
                                <div class="conteudo" >

                                    <p class=" t2">Carrinho | total: <span id="qtd"><?php echo count($_SESSION['carrinho']) ?></span><a class="btn waves-effect waves-light right green" href="../control/controladorPedido.php">Efetuar Pedido</a></p>
                                    <hr color='#e8eaf6'>
                                    <div class="row" style="width:80%; position: relative;margin-bottom:  1%;">
                                        <table class="bordered highlight responsive-table">
                                            <thead>
                                                <th>Nome</th>
                                                <th>Carrinho</th>
                                                <th>Preço</th>
                                                <th colspan="2" class="center">Ações</th>
                                            </thead>
                                            <tbody >
                                                <?php
                                                require_once '../model/DAO/classeProdutoDAO.php';

                                                $ProdutoDAO = new classeProdutoDAO();

                                                $produtos = $ProdutoDAO->listarProduto();

                                                foreach ($produtos as $produto) {
                                                    $noCarrinho = FALSE;
                                                    $quantidade = 0;

                                                    for ($i = 0; $i < count($_SESSION['carrinho']); $i++) {
                                                        $noCarrinho = $_SESSION['carrinho'][$i]['idproduto'] == $produto->idproduto ? true : false;
                                                        if ($noCarrinho) {
                                                            $quantidade = $_SESSION['carrinho'][$i]['quantidade'];
                                                        }
                                                    }
                                                    if ($quantidade > 0) {
                                                        ?>

                                                        <tr id="produto_<?php echo $produto->idproduto; ?>">

                                                            <td> <?php echo $produto->nomeproduto; ?></td>
                                                            <td><span id="qtdP_<?php echo $produto->idproduto; ?>"><?php echo $quantidade; ?></span></td>
                                                            <td>
                                                                R$ <?php echo $produto->preco; ?>
                                                            <td>
                                                            <td>
                                                                <?php if ($produto->disponibilidade > 0) {
                                                                    ?>

                                                                <button class="btn waves-effect waves-light blue darken-4 btn-floating" type="button" id="carrinho_<?php echo $produto->idproduto; ?>" onclick="adicionarProdutoAoCarrinho(<?php echo $produto->idproduto; ?>)"name="action">
                                                                        <i class="material-icons right">add_shopping_cart</i>
                                                                    </button>
                                                            </td>
                                                            <td>
                                                                    <button style="<?php if ($quantidade > 0) {
                                                            echo 'display:block';
                                                        } else {
                                                            echo 'display:none';
                                                        } ?>"class="btn waves-effect waves-light black btn-floating" type="button" id="retirar_<?php echo $produto->idproduto; ?>" onclick="retirarProdutoDoCarrinho(<?php echo $produto->idproduto; ?>)"name="action">
                                                                        <i class="material-icons right">delete</i>
                                                                    </button>   
        <?php } else { ?>
                                                                    <button class="btn detproduto red darken-4 btnss" type="button">Indisponível</button>
                                                        <?php } ?>
                                                            </td>
                                                        </tr>

    <?php }
} ?>
                                            </tbody>
                                        </table>
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
                                                          //modal//
                                                          $(document).ready(function () {
                                                              // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                                                              $('.modal-trigger').leanModal();
                                                          });
                                                          //
                                                          function adicionarProdutoAoCarrinho(idproduto) {
                                                              $.post('../control/controladorCarrinho.php', {idproduto: idproduto}, function (dados) {
                                                                  var qtd = dados;
                                                                  $("#qtd").text(qtd);
                                                                  var qtdP = Number($("#qtdP_" + idproduto).html());
                                                                  qtdP++;
                                                                  $("#qtdP_" + idproduto).text(qtdP.toString());
                                                                  console.log(qtdP)
                                                                  document.getElementById("retirar_" + idproduto).style = "display:block";
                                                              });
                                                          }
                                                          function retirarProdutoDoCarrinho(idproduto) {
                                                              $.post('../control/controladorCarrinho.php', {retirar: true, idproduto: idproduto}, function (dados) {
                                                                  var qtd = dados;
                                                                  $("#qtd").text(qtd);
                                                                  $("#qtdP_" + idproduto).text('0');
                                                                  document.getElementById("produto_" + idproduto).style = "display:none";
                                                              })

                                                          }


        </script>    
    </body>
</html>

