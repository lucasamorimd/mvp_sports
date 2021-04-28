<?php

require_once '../model/ClasseMarcas.php';
require_once '../model/DAO/classeMarcasDAO.php';


$idmarca = $_POST['idmarca'];
$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$tipoproduto = $_POST['tipoproduto'];

$novaMarca = new ClasseMarcas();
$marcaDAO = new classeMarcasDAO();



$novaMarca->setNome($nome);
$novaMarca->setCnpj($cnpj);
$novaMarca->setTipoproduto($tipoproduto);
$novaMarca->setIdmarca($idmarca);

$cadastro = $marcaDAO->atualizaMarca($novaMarca);
if($cadastro === true){
        echo "<script>alert('Marca Alterada com Sucesso');
                        window.location.href='../paineldecontrole.php';
                        </script>";
    
}
 else {
             echo "<script>alert('Erro na Alteração da Marca!!');
                        window.location.href='../paineldecontrole.php';
                        </script>";
 }