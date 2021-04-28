<?php

require_once '../model/ClasseProdutos.php';
require_once '../model/DAO/classeProdutoDAO.php';

$idproduto = $_POST['idproduto'];
$nome = $_POST['nome'];
$disponibilidade = $_POST['disponibilidade'];
$categoria = $_POST['categoria'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$idmarca = $_POST['idmarca'];

$novoProduto = new ClasseProdutos();

$novoProduto->setIdproduto($idproduto);
$novoProduto->setIdmarca($idmarca);
$novoProduto->setNome($nome);
$novoProduto->setDescricao($descricao);
$novoProduto->setPreco($preco);
$novoProduto->setDisponibilidade($disponibilidade);
$novoProduto->setCategoria($categoria);

$ProdutoDAO = new classeProdutoDAO();

$cadastro = $ProdutoDAO->atualizaProduto($novoProduto);
 
if($cadastro === true){
        echo "<script>alert('Produto Alterado com Sucesso');
                        window.location.href='../paineldecontrole.php';
                        </script>";
    
}
 else {
             echo "<script>alert('Erro na Alteração do Produto!!');
                        window.location.href='../paineldecontrole.php';
                        </script>";
 }