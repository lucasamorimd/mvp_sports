<?php

require_once '../model/DAO/classeProdutoDAO.php';

$idproduto = $_GET['idproduto'];

$ProdutoDAO = new classeProdutoDAO();
$produto = $ProdutoDAO->pesquisarProdutoPorId($idproduto);
//$foto = $produto->foto;
//if(unlink(''.$foto)){
$ProdutoDAO->excluirProdutoPorIdProduto($idproduto);

        echo "<script>alert('Produto excluido com Sucesso');
                        window.location.href='../paineldecontrole.php';
                        </script>";
//}