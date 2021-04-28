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
                    <form class="col s12" action="../control/controladorProdutos.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="preço" id="preco" name="preco" type="text" class="validate">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="disponibilidade" id="disponibilidade" name="disponibilidade" type="number" class="validate">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="nome" id="nome" name="nome" type="text" class="validate">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" placeholder="descricao" id="descricao" name="descricao" class="validate">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <select id="categoria" name="categoria">
                                    <option selected>Selecione a categoria</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Infantil">Infantil</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="width:100%;margin-top: -15%;">
                            <div class="input-field col s12">
                                <select class="browser-default" name="idmarca">
                                    <option selected value="">Selecione a marca</option>
                                    <?php
                                    require_once '../model/DAO/classeMarcasDAO.php';
                                    
                                    $marcaDAO = new classeMarcasDAO();
                                    
                                    $marcas = $marcaDAO->listarMarcas();
                                    
                                    foreach ($marcas as $marca){
                                    ?>
                                    <option value="<?php echo $marca->idmarca; ?>"><?php echo $marca->nomemarca; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="file-field input-field col s12">
                                <div class="btn orange darken-1">
                                    <span>selecionar</span>
                                    <input type="file" placeholder="Adcione a foto do produto aqui..." accept="image/*" name="foto">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="waves-effect waves-light btn orange darken-1">Cadastrar</button>
                            </div>
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

    <script src="../js/interacoes.js"></script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  </body>
</html>



