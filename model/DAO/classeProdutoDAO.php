<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of classeProdutoDAO
 *
 * @author pc
 */
require_once 'conexao.php';
require_once 'Crud.php';
class classeProdutoDAO extends Crud{
    public function cadastrarProduto(ClasseProdutos $novoProduto){
        $tabela = "produto";
        $colunas = array('nomeproduto', 'descricao','foto', 'preco', 'categoria', 'disponibilidade','marca');
        $valores = array($novoProduto->getNome(),
                         $novoProduto->getDescricao(),
                         $novoProduto->getFoto(),
                         $novoProduto->getPreco(),
                         $novoProduto->getCategoria(),
                         $novoProduto->getDisponibilidade(),
                         $novoProduto->getIdmarca());
        return parent::gerarInsert($tabela, $colunas, $valores);
    }
    public function listarProduto(){
        $tabelas = array("produto p","marca m");
        $joinsA = array("p.marca");
        $joinsB = array("m.idmarca");
        return parent::gerarList($tabelas, $joinsA, $joinsB);
    }
    public function pesquisarProdutoPorId($idproduto){
        $tabelas = array("produto p","marca m");
        $joinsA = array("p.marca");
        $joinsB = array("m.idmarca");
        $identificadores = array("idproduto");
        $valorId = array($idproduto);
        return parent::gerarFindById($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }
    public function pesquisarProdutoMaisBarato(){
        try {
            $pdo = conexao::getinstance();
            $sql = "SELECT * FROM produto WHERE preco = (select MIN(preco) from produto)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            
            $produto = $stmt->fetchObject(__CLASS__);
            return $produto;
        } catch (PDOException $ex) {
            echo "".$ex;
        }
    }

    public function pesquisarProdutoPeloNome($nomeproduto){
        $tabelas = array("produto p","marca m");
        $joinsA = array("p.marca");
        $joinsB = array("m.idmarca");
        $identificadores = array("p.nome");
        $valorId = array($nomeproduto."%");
        return parent::gerarFind($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }
    public function pesquisarProdutoPorCategoria($categoria){
        $tabelas = array("produto p","marca m");
        $joinsA = array("p.marca");
        $joinsB = array("m.idmarca");
        $identificadores = array("p.categoria");
        $valorId = array($categoria);
        return parent::gerarFindEquals($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }
    public function atualizaProduto(ClasseProdutos $novoProduto){
        $tabela = "produto";
        $colunas = array('nomeproduto', 'descricao', 'preco', 'categoria', 'disponibilidade','marca');
        $valores = array($novoProduto->getNome(),
                         $novoProduto->getDescricao(),
                         $novoProduto->getPreco(),
                         $novoProduto->getCategoria(),
                         $novoProduto->getDisponibilidade(),
                         $novoProduto->getIdmarca());
        $identificadores = array("idproduto");
        $valorId = array($novoProduto->getIdproduto());
        return parent::gerarUpdate($tabela, $colunas, $valores, $identificadores, $valorId);
    }
    public function aumentaDisponibilidade(ClasseProdutos $novoProduto){
        $tabela = "produto";
        $colunas = array("disponibilidade");
        $valores = array("disponibilidade + ".$novoProduto->getDisponibilidade());
        $identificadores = array("idproduto");
        $valorId = array($novoProduto->getIdproduto());
        return parent::gerarUpdate($tabela, $colunas, $valores, $identificadores, $valorId);
    }
    public function diminuiDisponibilidade(ClasseProdutos $novoProduto){
        try {
            $pdo = conexao::getinstance();
            $sql = "UPDATE produto SET disponibilidade = disponibilidade - ? WHERE idproduto = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $novoProduto->getDisponibilidade());
            $stmt->bindValue(2, $novoProduto->getIdproduto());
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo "".$ex;
        }
    }

    public function excluirProdutoPorIdProduto($idproduto){
        $tabela = "produto";
        $identificadores = array("idproduto");
        $valorId = array($idproduto);
        return parent::gerarDelete($tabela, $identificadores, $valorId);
    }
    
}
