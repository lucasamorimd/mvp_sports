
<?php
session_start();
if (isset($_SESSION['UsuarioLogado'])&& ($_SESSION['PerfilUsuarioLogado']==1)) {
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
if(isset($_GET['mensagem'])){ // pega a mensagem passada no link
    $mensagemPedido =  "Materialize.toast('".$_GET['mensagem']."', 5000)"; // coloca os parametros do toast com a mensagem dentro da variavel $mensagemPedidos
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
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="../css/custom.css"  media="screen"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>MVP Sports | cliente</title>
        <style>
            html {font-family: Roboto,GillSans, Calibri, Trebuchet, sans-serif;}	
            hr{ width: 80%;}
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
            .pedidos{width: 80%; margin-left: 13%;}
            .it1{margin-top: 6%;}
            .it2{margin-left: 70%;}
            .t1{font-weight: bold; font-size: 190%; margin-left: 15%;}
            .t2{font-weight: bold; font-size: 145%; margin-left: 15%;}
            .t3{font-weight: regular; font-size: 115%; margin-left: 15%;}

            /*modal*/
            .input-field label {color: #e65100;}/*laranjinha*/
            .input-field input[type=text]:focus + label {color: #e65100;}/*laranjinha*/
            .input-field input[type=text]:focus {border-bottom: 1px solid #000;box-shadow: 0 1px 0 0 #000;}/*preto*/
            .input-field input[type=text].valid {border-bottom: 1px solid #33691e;box-shadow: 0 1px 0 0 #33691e;}/*tudo certo*/
            .input-field input[type=text].invalid {border-bottom: 1px solid #d50000;box-shadow: 0 1px 0 0 #d50000;}/*deu ruim*/  
            .input-field .prefix.active {color: #000;}
        </style>

        <!-- Custom styles for this template -->

    </head>

    <body >

        <nav>
            <div class="nav-wrapper grey darken-4">
                <a href="../index.php" class="brand-logo">MVP SPORTS</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="brand-logo1">
                    <li><a href="../pagecliente.php">meus dados</a></li>
                    <li class="orange"><a href="pedidos.php">meus pedidos</a></li>
                    <li><a href="carrinho.php">carrinho</a></li>
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

                        <article>
                            <div class="ctr">
                                <div class="painel">
                                    <div class="collection  ">
                                        <a href="#!" class="collection-item active grey darken-4"> Menu</a>
                                        <a href="../pagecliente.php" class="collection-item black-text "> Meus dados</a>
                                        <a href="" class="collection-item active orange accent-3"> Meus pedidos</a>
                                        <a href="carrinho.php" class="collection-item black-text"> Carrinho</a>
                                        <a href="../control/controladorLogin.php?logout=true" class="collection-item black-text"> Logout</a>                                        
                                    </div>                                    
                                </div>
                                <div class="conteudo ">

                                    <p class="t1">Meus Pedidos</p>
                                    <hr color='#e8eaf6'>
                                        <?php
                                        require_once '../model/DAO/classePedidoDAO.php';
                                        $pedidoDAO = new classePedidoDAO();
                                        $idusuario = $_SESSION['IdUsuarioLogado'];
                                        $pedidos = $pedidoDAO->pesquisarPedidoPorIdUsuario($idusuario);
                                        $i = 0;
                                        foreach ($pedidos as $pedido) {
                                            $dataF = explode('-', $pedido->data);
                                            $data = $dataF[0] . '/' . $dataF[1] . '/' . $dataF[2];
                                            ?>
                                    <div class="col pedidos">
                                        
                                            <div class="card horizontal ">
                                                <div class="card-image it1">
                                                    <i class="large material-icons">today</i> 
                                                </div>
                                                <div class="card-stacked">
                                                    <div class="card-content">
                                                        <p class="t2">pedido #<?php $i++;echo $i; ?></p>
                                        
                                                        <div class="card-action"></div>
                                                        <p class="t3"> data:<time><?php echo $data; ?></time><a class="waves-effect waves-light btn btn tooltipped modal-trigger it2  orange lighten-1" href="#modal_<?php echo $pedido->idpedido; ?>" data-position="top" data-delay="50" data-tooltip="visualizar pedido"><i class=" material-icons">search</i></a></p>
                                                    </div>
                                                </div>
                                                <div id="modal_<?php echo $pedido->idpedido; ?>" class="modal">
                                                    <div class="modal-content ">
                                                        <p class="t2">Detalhes do pedinte</p>
                                                        <div class="divider"></div>
                                                        <div class="info">                                                
                                                            <form class="col s12">
                                                                <div class="row">
                                                                    <div class="input-field col s12 ">
                                                                        <i class="material-icons prefix">account_circle</i>
                                                                        <input value="<?php echo $pedido->nome; ?>" id="icon_prefix" type="text" class="validate">
                                                                        <label for="icon_prefix">Nome do cliente</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <i class="material-icons prefix">info</i>
                                                                        <input value="#<?php echo $pedido->idpedido; ?>" id="icon_prefix" type="text" class="validate">
                                                                        <label for="icon_prefix">Numero do pedido</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <i class="material-icons prefix">turned_in_not</i>
                                                                        <input value="enviado" id="icon_prefix" type="text" class="validate">
                                                                        <label for="icon_prefix">Status</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <i class="mate<?php echo $data; ?>" id="icon_prefix" type="text" class="validate">
                                                                            <label for="icon_prefix">Data</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <i class="material-icons prefix">loyalty</i>
                                                                        <input value="<?php echo $pedido->idpedido; ?>" id="icon_prefix" type="text" class="validate">
                                                                        <label for="icon_prefix">Codigo de rastreamento</label>
                                                                    </div>
                                                                </div>              
                                                            </form>
                                                        </div>                                               
                                                    </div>
                                                    <div class="modal-footer">
                                                        <p class="t2">produtos neste pedido</p>
                                                        <div class="divider"></div>
                                                        <table class="responsive-table">
                                                            <thead>
                                                                <tr>
                                                                    <th data-field="id">Nome produto</th>
                                                                    <th data-field="name">quantidade</th>
                                                                    <th data-field="price">valor unitario</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <?php
                                                                require_once '../model/DAO/classeCarrinhoDAO.php';
                                                                $idpedido = $pedido->idpedido;
                                                                $carrinhoDAO = new classeCarrinhoDAO();
                                                                $produtos = $carrinhoDAO->pesquisarCarrinhoPorIdPedido($idpedido);
                                                                $valorTotal = 0;
                                                                foreach ($produtos as $produto) {
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $produto->nomeproduto; ?></td>
                                                                        <td><?php echo $produto->quantidade; ?></td>
                                                                        <td>R$<?php echo $produto->preco; ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $valorProduto = $produto->quantidade * $produto->preco;
                                                                    $valorTotal += $valorProduto;
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                        <div class="divider"></div>
                                                        <p class="t3 right">valor total da compra :R$ <a href=""><?php echo $valorTotal; ?></a></p>
                                                    </div>
                                                </div>                                          
                                            </div>          
                                        
                                    </div>
                                    <?php } ?> 
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
        <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script><!-- baixar vers�o do jquery a mais -->
        <script type="text/javascript" src="../js/materialize.min.js"></script>	
        <script type="text/javascript" src="../js/interacoes.js"></script>
        <script>

            $('.carousel.carousel-slider').carousel({full_width: true});

            //modal//
            $(document).ready(function () {
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modal-trigger').leanModal();
                <?php echo $mensagemPedido; ?> // mostra no toast tudinho bonitinho *-*
            });
            //
            $(document).ready(function () {
                $('.tooltipped').tooltip({delay: 50});
            });


        </script>    
    </body>
</html>

