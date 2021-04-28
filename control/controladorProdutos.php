<?php

require_once '../model/ClasseProdutos.php';
require_once '../model/DAO/classeProdutoDAO.php';

$nome = $_POST['nome'];
$disponibilidade = $_POST['disponibilidade'];
$categoria = $_POST['categoria'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$idmarca = $_POST['idmarca'];

$tipoarquivo = explode("/", $_FILES['foto']['type']);

$foto = $nome.'.'.$tipoarquivo[1];
$destino = '../fotosProdutos/'.$foto;
if(move_uploaded_file($_FILES['foto']['tmp_name'], $destino)){
$novoProduto = new ClasseProdutos();
$novoProduto->setFoto($destino);
$novoProduto->setIdmarca($idmarca);
$novoProduto->setNome($nome);
$novoProduto->setDescricao($descricao);
$novoProduto->setPreco($preco);
$novoProduto->setDisponibilidade($disponibilidade);
$novoProduto->setCategoria($categoria);

$ProdutoDAO = new classeProdutoDAO();


$cadastro = $ProdutoDAO->cadastrarProduto($novoProduto);
if($cadastro === true){
        echo "<script>alert('Produto cadastrado com Sucesso');
                        window.location.href='../paineldecontrole.php';
                        </script>";
    
}
 else {
             echo "<script>alert('Erro no cadastro do Produto!!');
                        window.location.href='../paineldecontrole.php';
                        </script>";
    
}
}