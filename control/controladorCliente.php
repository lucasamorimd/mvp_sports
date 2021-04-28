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

if($_POST['idCliente']){
    $idCliente = $_POST['idCliente'];
}

$nomeCliente = $_POST['nomeCliente'];
$senhaCliente = $_POST['senhaCliente'];
$emailCliente = $_POST['emailCliente'];
$enderecoCliente = $_POST['enderecoCliente'];
$cpfCliente = $_POST['cpfCliente'];
$telefoneCliente = $_POST['telefoneCliente'];
//$datacadastroCliente = $_POST['datacadastroCliente'];

require_once '../model/ClasseCliente.php';
require_once '../model/DAO/classeClienteDAO.php';

$novoCliente = new classeCliente();

$novoCliente->setIdcliente($idCliente);
$novoCliente->setNome($nomeCliente);
$novoCliente->setSenha($senhaCliente);
$novoCliente->setEmail($emailCliente);
$novoCliente->setEndereco($enderecoCliente);
$novoCliente->setCpf($cpfCliente);
$novoCliente->setTelefone($telefoneCliente);
$novoCliente->setDatacadastro($datacadastroCliente);

$novoClienteDAO = new classeClienteDAO;

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

