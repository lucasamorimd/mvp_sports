<?php

session_start();

require_once '../model/classePedido.php';
require_once '../model/DAO/classePedidoDAO.php';
require_once '../model/ClasseCarrinho.php';
require_once '../model/DAO/classeCarrinhoDAO.php';
require_once '../model/ClasseProdutos.php';
require_once '../model/DAO/classeProdutoDAO.php';
date_default_timezone_set('America/Sao_Paulo');

$idusuario = $_SESSION['IdUsuarioLogado'];
$data = date('Y-m-d');

$novoPedido = new classePedido();

$novoPedido->setIdusuario($idusuario);
$novoPedido->setData($data);

$pedidoDAO = new classePedidoDAO();

$idpedido = $pedidoDAO->cadastrarPedido($novoPedido);

$novoCarrinho = new ClasseCarrinho();

$produto = $_SESSION['carrinho'];

$carrinhoDAO = new classeCarrinhoDAO();

$novoProduto = new classeProdutos();

$ProdutoDAO = new classeProdutoDAO();
$novoCarrinho->setIdpedido($idpedido);
$sucesso = false;
foreach ($_SESSION['carrinho'] as $produto){
    $novoCarrinho->setProduto($produto['idproduto']);
    $novoCarrinho->setQuantidade($produto['quantidade']);
    if($carrinhoDAO->cadastrarCarrinho($novoCarrinho)){
        $novoProduto->setIdproduto($produto['idproduto']);
        $novoProduto->setDisponibilidade($produto['quantidade']);
        $ProdutoDAO->diminuiDisponibilidade($novoProduto);
        $sucesso = true;
    } else {
        $sucesso = false;
    }
}
$_SESSION['carrinho'] = array();



if($sucesso===true){
$sucesso = "Pedido Efetuado"; // seta a mensagem "pedido efetuado" na variavel $sucesso
} else {
    $pedidoDAO->excluirPedidoPorIdPedido($idpedido);
    echo "alert('Erro ao efetuar pedido!');";
}
Header("Location: ../clientes/pedidos.php?mensagem={$sucesso}"); //envia a mensagem setada na variavel $sucesso via URL

