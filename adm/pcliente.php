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
                                
                                <div class="col s9">    
                                    <div class="treb">
                                     
                                        <table class="responsive-table">
                                          <thead>
                                            <tr>
                                                <th data-field="id">Nome</th>
                                                <th data-field="name">email</th>
                                                <th data-field="price">cpf</th>
                                                <th>data de cadastro</th>
                                                <th>endereço</th>
                                                <th>telefone</th>
                                                <th class="center">&nbsp</th>
                                                <th class="center">&nbsp</th>
                                            </tr>
                                          </thead>

                                          <tbody>
                                              <?php foreach ($cliente as $c) { ?>


                                              
                                            <tr>
                                              <td><?php echo $c->nome;?></td>
                                              <td><?php echo $c->email;?></td>
                                              <td><?php echo $c->cpf;?></td>
                                              <td><?php echo $c->datacadastro;?></td>
                                              <td><?php echo $c->endereco;?></td>
                                              <td><?php echo $c->telefone;?></td>
                                            
                                            </tr>
                                          </tbody>
                                              <?php } ?>
                                        </table>
                                    </div>
                                </div>    
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
    </body>
  </html>
        

