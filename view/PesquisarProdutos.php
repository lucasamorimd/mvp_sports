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
            <form action="" method="post" >
            <div class="input-field col s0" style="width:40%; margin-left: 25%;">
                <input type="text" placeholder="Pesquisar"name="pesquisa">               
            </div>
            <div class="input-field col s1">
                <button type="submit" class="btn waves-effect waves-light orange darken-1"><i class="material-icons ">search</i></button>
            </div>
                
            </form>
            <div class="col s2" style="margin-left:8%;margin-top: 1.1%;" >
                <a href="formCadastrarProduto.php" class="waves-effect waves-light btn orange darken-1">Inserir Produto</a>
            </div>
            
        </div>
        <div class="row">
            <div class="col s12">
                <table class="responsive-table bordered hoverable highlight">
            <thead>
                <tr>
                    <th data-field="">Foto</th>
                    <th data-field="">id produto</th>
                    <th data-field="">nome</th>
                    <th data-field="">preço</th>
                    <th data-field="">disponibilidade</th>
                    <th data-field="">descriçao</th>
                    <th data-field="">categoria</th>
                    <th data-field="">Marca</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../model/DAO/classeProdutoDAO.php';
                
                $ProdutoDAO = new classeProdutoDAO();
                if(isset($_POST['pesquisa'])){
                    $nomeproduto = $_POST['pesquisa'];
                    $produtos = $ProdutoDAO->pesquisarProdutoPeloNome($nomeproduto);
                } else {
                    $produtos = $ProdutoDAO->listarProduto();
                }
                
                foreach ($produtos as $produto){
                ?>
                <tr>
                    <td width="10%"><img class="responsive-img" src="<?php echo $produto->foto;  ?>"></td>
                    <td><?php echo $produto->idproduto; ?></td>
                    <td><?php echo $produto->nomeproduto; ?></td>
                    <td><?php echo $produto->preco; ?></td>
                    <td><?php echo $produto->disponibilidade; ?></td>
                    <td><?php echo $produto->descricao; ?></td>
                    <td><?php echo $produto->categoria; ?></td>
                    <td><?php echo $produto->nomemarca; ?></td>
                    <td><a class="waves-effect waves-light btn blue darken-1" href="formAlterarProduto.php?idproduto=<?php echo $produto->idproduto; ?>"><i class="material-icons">edit</i></a></td>
                    <td><a class="waves-effect waves-light btn red darken-4" href="../control/controladorExcluirProduto.php?idproduto=<?php echo $produto->idproduto; ?>"><i class="material-icons">delete</i></a></td>
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
        


