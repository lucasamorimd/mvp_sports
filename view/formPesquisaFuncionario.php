<?php

if(isset($_GET['idfuncionario'])){
    $idfuncionario = $_GET['idfuncionario'];
}else{
    $idfuncionario = null;
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

      
        <section>
            <article>
                <br>
                <div class="row">
                    <form class="col s12" action="../control/controladorPesquisaFuncionario.php" method="post">
                        <div class="row">
                          <div class="input-field col s12">
                              <input id="nome" name="nomeFuncionario" type="text" placeholder="Nome"  required>
                            
                          </div>
                            
                        <div class="carousel-fixed-item center">
                            <button id="submit-form" type="submit" class="waves-effect waves-light btn">Pesquisar</button>
                          
                        </div>                       
                    </form>
                </div>               
            </article>    
        </section>
       

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  </body>
</html>