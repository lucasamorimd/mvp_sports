<?php

require_once 'Crud.php';
class classePedidoDAO extends Crud {
    public function cadastrarPedido(classePedido $novoPedido){
        try{
        $tabela = "pedido";
        $colunas = array('idusuario','data');
        $pdo = conexao::getinstance();
        $sql = "INSERT INTO $tabela ($colunas[0],$colunas[1])VALUES(?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $novoPedido->getIdusuario());
        $stmt->bindValue(2, $novoPedido->getData());
        
        $stmt->execute();
        return $pdo->lastInsertId();
        } catch (PDOException $ex){
            echo "".$ex;
        }
        
    }
    public function listarPedido(){
        $tabelas = array('pedido p','cliente c');
        $joinsA = array('p.idusuario');
        $joinsB = array('c.idcliente');
        return parent::gerarList($tabelas, $joinsA, $joinsB);
    }

    public function pesquisarPedidoPorIdUsuario($idusuario){
        $tabelas = array('pedido p','cliente c');
        $joinsA = array('p.idusuario');
        $joinsB = array('c.idcliente');
        $identificadores  = array('p.idusuario');
        $valorId = array($idusuario);
        return parent::gerarFindEquals($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }
    public function excluirPedidoPorIdPedido($idpedido){
        $tabela = "pedido";
        $identificadores = array('idpedido');
        $valorId = array($idpedido);
        return parent::gerarDelete($tabela, $identificadores, $valorId);
    }
}
