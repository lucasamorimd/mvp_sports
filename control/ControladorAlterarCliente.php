<?php
session_start();
require_once '../model/ClasseCliente.php';
require_once '../model/DAO/classeClienteDAO.php';

// Essa função pega tudo que tiver no $_POST e coloca num array
// $params recebe o array com todos os valores
$params = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Verifica
if($params['idCliente'] != $_SESSION['IdUsuarioLogado']){
    Header("Location: ../pagecliente.php");
}

$cliente = new ClasseCliente();
$clienteDAO = new ClasseClienteDAO();

$cliente->setIdcliente($params['idCliente']);
$cliente->setNome($params['nome']);
$cliente->setSenha($params['senha']);
$cliente->setEmail($params['email']);
$cliente->setEndereco($params['endereco']);
$cliente->setCpf($params['cpf']);
$cliente->setTelefone($params['telefone']);

$resultado = $clienteDAO->atualizaCliente($cliente);

// Verifica se conseguiu salvar no banco e monta a mensagem
// Atualiza os valores na sessão do usuário
if($resultado === true){
    $resultado = "Seus dados foram atualizados!";
    $_SESSION['NomeUsuarioLogado'] = $params['nome'];
    $_SESSION['SenhaUsuario'] = $params['senha'];
    $_SESSION['EmailUsuario'] = $params['email'];
    $_SESSION['EnderecoUsuario'] = $params['endereco'];
    $_SESSION['TelefoneUsuario'] = $params['telefone'];
    $_SESSION['CPFUsuario'] = $params['cpf'];
}else{
    $resultado = "Erro ao salvar seus dados.";
}

Header("Location: ../pagecliente.php?mensagem={$resultado}"); // Redireciona passando a mensagem