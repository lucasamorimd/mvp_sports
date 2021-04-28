<!DOCTYPE html>
  <html>
    <head>
        <meta charset="utf-8">
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <div class="row">
            <form action="" method="post">
            <div class="input-field col s9" style="width:40%; margin-left: 25%;">
                <input type="text" placeholder="Pesquisar" name="pesquisa">
            </div>
            <div class="input-field col s1">
                <button type="submit" class="btn waves-effect waves-light orange darken-1"><i class="material-icons">search</i></button>
            </div>
               
            </form>
            <div class="col s2" style="margin-left:8%;margin-top: 1.1%;">
                    <a href="formCadastrarMarcas.php"  class="waves-effect waves-light btn orange darken-1">Inserir Marca</a>
                </div> 
        </div>
        <div class="row">
            <div class="col s12">
                <table>
            <thead>
                <tr>
                    <th data-field="">Id marca</th>
                    <th data-field="">Nome</th>
                    <th data-field="">Cnpj</th>
                    <th data-field="">Tipo de produto</th>
                    <th data-field="">Alterar</th>
                    <th data-field="">Excluir</th>
                </tr>
            </thead>

            <tbody>
                <?php
                require_once '../model/DAO/classeMarcasDAO.php';
                
                if(isset($_POST['pesquisa'])){
                    $nomemarca = $_POST['pesquisa'];
                } else {
                    $nomemarca = null;
                }
                
                $marcaDAO = new classeMarcasDAO();
                $marcas = $marcaDAO->pesquisarMarcaPorNome($nomemarca);
                        
                foreach ($marcas as $marca){
                ?>
                <tr>
                    <td><?php echo $marca->idmarca; ?></td>
                    <td><?php echo $marca->nomemarca; ?></td>
                    <td><?php echo $marca->cnpj; ?></td>
                    <td><?php echo $marca->tipoproduto; ?></td>
                    <td><a href="formAlterarMarca.php?idmarca=<?php echo $marca->idmarca; ?>" class="btn waves-effect waves-light blue darken-1"><i class="material-icons">edit</i></a></td>
                    <td><a href="../control/controladorExcluirMarca.php?idmarca=<?php echo $marca->idmarca; ?>" class="btn waves-effect waves-light red darken-4"><i class="material-icons">delete</i></a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>  
            </div>
        </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
    </body>
  </html>
        


