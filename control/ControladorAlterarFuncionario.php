<?php
session_start();
require_once '../model/ClasseFuncionario.php';
require_once '../model/DAO/classeFuncionarioDAO.php';

// Essa função pega tudo que tiver no $_POST e coloca num array
// $paramsFunc recebe o array com todos os valores
$paramsFunc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Verifica


$novofuncionario = new ClasseFuncionario();
$funcionarioDAO = new ClasseFuncionarioDAO();

$novofuncionario->setIdfuncionario($paramsFunc['idfuncionario']);
$novofuncionario->setNome($paramsFunc['nome']);
$novofuncionario->setEndereco($paramsFunc['endereco']);
$novofuncionario->setSenha($paramsFunc['senha']);
$novofuncionario->setEmail($paramsFunc['email']);
$novofuncionario->setCpf($paramsFunc['cpf']);
$novofuncionario->setDatapagamento($paramsFunc['datapagamento']);
$novofuncionario->setPerfil($paramsFunc['perfil']);
$novofuncionario->setSalario($paramsFunc['salario']);
$novofuncionario->setTelefone($paramsFunc['telefone']);

$resultado = $funcionarioDAO->atualizafuncionario($novofuncionario);


if($resultado === true){ 
    echo "<script>alert('Alterado com Sucesso');
                        window.location.href='../paineldecontrole.php';
                        </script>";
     
} else {
    echo "<script>alert('Erro na Alteraçao');
                        window.location.href='../paineldecontrole.php';
                        </script>";
   
} // Redireciona passando a mensagem