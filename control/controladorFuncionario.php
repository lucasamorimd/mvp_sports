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

if(isset($_POST['idfuncionario'])){
    $idCliente = $_POST['idfucnionario'];
}

$nomeFuncionario = $_POST['nomeFuncionario'];
$senhaFuncionario = $_POST['senhaFuncionario'];
$emailFuncionario = $_POST['emailFuncionario'];
$enderecoFuncionario = $_POST['enderecoFuncionario'];
$cpfFuncionario = $_POST['cpfFuncionario'];
$telefoneFuncionario = $_POST['telefoneFuncionario'];
$datapagamentoFuncionario = $_POST['datapagamentoFuncionario'];
$pagamentoFuncionario = $_POST['pagamentoFuncionario'];
$perfilFuncionario = $_POST['perfilFuncionario'];
//$datacadastroCliente = $_POST['datacadastroCliente'];

require_once '../model/ClasseFuncionario.php';
require_once '../model/DAO/classeFuncionarioDAO.php';

$novoFuncionario = new ClasseFuncionario();
$modelFuncionarioDAO = new classeFuncionarioDAO();



$novoFuncionario->setNome($nomeFuncionario);
$novoFuncionario->setSenha($senhaFuncionario);
$novoFuncionario->setEmail($emailFuncionario);
$novoFuncionario->setEndereco($enderecoFuncionario);
$novoFuncionario->setCpf($cpfFuncionario);
$novoFuncionario->setTelefone($telefoneFuncionario);
$novoFuncionario->setDatapagamento($datapagamentoFuncionario);
$novoFuncionario->setSalario($pagamentoFuncionario);
$novoFuncionario->setPerfil($perfilFuncionario);


$cadastro = $modelFuncionarioDAO->cadastrarFuncionario($novoFuncionario);

if($cadastro === true){
    echo "<script>alert('Cadastrado com Sucesso');
                        window.location.href='../paineldecontrole.php';
                        </script>";
}else{
    echo "<script>alert('Erro no Cadastro');
                        window.location.href='../index.php';
                        </script>";
    
}


/*$novoClienteDAO = new classeClienteDAO;

if($idCliente){
    $atualizar = $novoClienteDAO->atualizaCliente($novoCliente);
    
    if(!$atualizar){
        echo "<script>alert('Erro na Atualização');
                        window.location.href='../paineldecontrole.php';
                        </script>";
    } else {
        echo "<script>alert('Atualizado com Sucesso');
                        window.location.href='../paineldecontrole.php';
                        </script>";
    }
}else{
    $cadastrar = $novoClienteDAO->cadastrarCliente($novoCliente);
   if(isset($_SESSION['UsuarioLogado'])) {
    if(!$cadastrar){
        echo "<script>alert('Erro no Cadastro');
                        window.location.href='../paineldecontrole.php';
                        </script>";
    } else {
        echo "<script>alert('Cadastrado com Sucesso');
                        window.location.href='../paineldecontrole.php';
                        </script>";
    }  
   }
  else{

if(!$cadastrar){
     echo "<script>alert('Erro no Cadastro');
                        window.location.href='../index.php';
                        </script>";
} else {
    echo "<script>alert('Cadastrado com Sucesso');
                        window.location.href='../index.php';
                        </script>";
}
}}
*/
