<?php
$nomeFuncionario = $_POST['nomeFuncionario'];

require_once '../model/DAO/classeFuncionarioDAO.php';
$novoFuncionarioDAO = new classeFuncionarioDAO;

$funcionario = $novoFuncionarioDAO->pesquisarfuncionarioPorNome($nomeFuncionario);


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
 <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

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

<div class="container">
    <h2>Pesquisa de funcionario</h2>
<table class="responsive-table">
    <thead>    
    <th>Nome</th>
    <th>Email</th>
    <th>Telefone</th>
    <th>Endereço</th>
    <th>CPF</th>
    <th>Data de Contrato</th>
    <th>Data de pagamento </th>
    <th>Salario</th>
    <th>&nbsp;</th> <!-- isso é um caractere em branco -->
    <th>&nbsp;</th>
    </thead>
    <tbody>
    <?php foreach($funcionario as $c){ ?>

    <tr>
        <td><?php echo $c->nome ?></td>
        <td><?php echo $c->email ?></td>
        <td><?php echo $c->telefone ?></td>
        <td><?php echo $c->endereco ?></td>
        <td><?php echo $c->cpf ?></td>
        <td><?php echo $c->datacontrato?></td>
        <td><?php echo $c->datapagamento?></td>
        <td><?php echo $c->salario?></td>
        <td><?php echo "<a class='btn btn-info' href='../view/formAlterarFuncionario.php?idfuncionario=".$c->idfuncionario 
                . "' onclick='return checkDelete()'><span class='glyphicon glyphicon-pencil'></span> Alterar";?></td>
        <td><?php echo "<a class='btn btn-danger' href='controladorExcluiFuncionario.php?idfuncionario="
        . $c->idfuncionario . "' onclick='return checkDelete()'><span class='glyphicon glyphicon-trash'></span> Excluir</a>";?></td>
        
    </tr>
    <?php } ?>
    </tbody>
</table>
</div>
      
</body>
 </html>