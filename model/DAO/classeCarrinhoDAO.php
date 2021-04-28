<?php

require_once 'Crud.php';
class classeCarrinhoDAO extends Crud{
    public function cadastrarCarrinho(ClasseCarrinho $novoCarrinho){
        $tabela = "carrinho";
        $colunas = array('idpedido','produto','quantidade');
        $valores = array($novoCarrinho->getIdpedido(),$novoCarrinho->getProduto(),$novoCarrinho->getQuantidade());
        return parent::gerarInsert($tabela, $colunas, $valores);
    }
    public function pesquisarCarrinhoPorIdPedido($idpedido){
        $tabelas = array('carrinho c','produto p');
        $joinsA = array('c.produto');
        $joinsB = array('p.idproduto');
        $identificadores = array('idpedido');
        $valorId = array($idpedido);
        return parent::gerarFindEquals($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }
}
