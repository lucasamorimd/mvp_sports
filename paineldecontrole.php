<?php
require_once './model/DAO/classeClienteDAO.php';
$novoClienteDAO = new classeClienteDAO;

$cliente = $novoClienteDAO->listarClientes();
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
  <html>
    <head>
        <meta charset="utf-8">
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>
          .vis{
              margin-left: 0px;
          }
        .t1{font-weight: regular; font-size: 190%;text-transform: uppercase;}
        .t2{font-weight: bold; font-size: 75%;text-transform: uppercase;}
        .t3{font-weight: regular; font-size: 95%;text-transform: uppercase;}
        .t4{font-weight: bold; font-size: 125%;text-transform: uppercase;;}
        .notificacoes{}
      </style>
    </head>
    
    <body>
         <nav>
            <div class="nav-wrapper grey darken-4">
                <a href="index.php" class="brand-logo center">MVP SPORTS</a>
            </div>
          </nav>      
            <section>
                <article>

                    <section class="vis">
                        <article>
                            <div class="row">
                                <div class="painel col s3">
                                    <div class="collection">
                                        <ul class="colection">
                                            <li class="collection-item avatar">
                                              <img src="images/apolo1.jpg" alt="" class="circle">
                                              <span class="title">  administrador</span>
                                              <p>nome: <?php echo $nomeUsuarioLogado;?> <br>                                                 
                                              </p>
                                            </li>                                            
                                        </ul>
                                        <ul class="collapsible popout" data-collapsible="accordion">
                                          <li>
                                            <div class="collapsible-header"><i class="material-icons">perm_identity</i>cliente</div>
                                            <div class="collapsible-body">
                                                <p><a href="">pesquisar</a></p>
                                            </div>
                                          </li>
                                          <?php if($_SESSION['PerfilUsuarioLogado']==2):?>
                                          <li>
                                            <div class="collapsible-header"><i class="material-icons">assignment_ind</i>funcionario</div>
                                            <div class="collapsible-body">         
                                                <p><a href="view/formCadastrarFuncionario.php">Cadastrar</a></p>
                                                <p><a href="view/formPesquisaFuncionario.php">Pesquisar</a></p>          
                                                <p><a href="control/controladorListarFuncionario.php">Listar Todos</a></p>          
                                            </div>
                                          </li>
                                          <?php else:?>
                                          <li>
                                            <div class="collapsible-header"><i class="material-icons">assignment_ind</i>funcionario</div>
                                            <div class="collapsible-body">         
                                                <p><a href="#!">Cadastrar</a></p>
                                                <p><a href="#!">Pesquisar</a></p>          
                                                <p><a href="#!">Listar Todos</a></p>          
                                            </div>
                                          </li>
                                          <?php endif;?>
                                          <li>
                                            <div class="collapsible-header"><i class="material-icons">shopping_cart</i>produtos</div>
                                            <div class="collapsible-body">         
                                                <p><a href="view/formCadastrarProduto.php">cadastrar</a></p>
                                                <p><a href="view/PesquisarProdutos.php">pesquisar</a></p>          
                                            </div>
                                          </li>
                                          <?php if($_SESSION['PerfilUsuarioLogado']==2):?>
                                          <li>
                                            <div class="collapsible-header"><i class="material-icons">store</i>marcas</div>
                                            <div class="collapsible-body">         
                                                <p><a href="view/formCadastrarMarcas.php">cadastrar</a></p>
                                                <p><a href="view/PesquisarMarcas.php">pesquisar</a></p>          
                                            </div>
                                          </li>
                                          <?php else:?>
                                          <li>
                                            <div class="collapsible-header"><i class="material-icons">store</i>marcas</div>
                                            <div class="collapsible-body">         
                                                <p><a href="#!">cadastrar</a></p>
                                                <p><a href="#!">pesquisar</a></p>          
                                            </div>
                                          </li>
                                          <?php endif;?>
                                        </ul>                                        
                                    </div>
                                </div>                                
                                    <div class="painel"><?php include './adm/pcliente.php';?></div>                                
                                </div>    
                            
                            </div>    
                        </article>    
                    </section>   
                </article>    
            </section>    
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>