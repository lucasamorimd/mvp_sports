<?php

require_once '../model/ClasseMarcas.php';
require_once '../model/DAO/classeMarcasDAO.php';



$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$tipoproduto = $_POST['tipoproduto'];

$novaMarca = new ClasseMarcas();
$marcaDAO = new classeMarcasDAO();



$novaMarca->setNome($nome);
$novaMarca->setCnpj($cnpj);
$novaMarca->setTipoproduto($tipoproduto);


$cadastro = $marcaDAO->cadastrarMarca($novaMarca);
if($cadastro === true){
        echo "<script>alert('Marca Cadastrada com Sucesso');
                        window.location.href='../paineldecontrole.php';
                        </script>";
    
}
 else {
             echo "<script>alert('Erro na Cadastro da Marca!!');
                        window.location.href='../paineldecontrole.php';
                        </script>";
 }


