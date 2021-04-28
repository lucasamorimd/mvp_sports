<?php
require_once 'conexao.php';
require_once 'Crud.php';
class classeMarcasDAO extends Crud{
    public function cadastrarMarca(ClasseMarcas $novaMarca){
        $tabela = "marca";
        $colunas = array("nomemarca","tipoproduto","cnpj");
        $valores = array($novaMarca->getNome(),
                         $novaMarca->getTipoproduto(),
                         $novaMarca->getCnpj());
        return parent::gerarInsert($tabela, $colunas, $valores);
    }
    public function listarMarcas(){
        $tabelas = array("marca");
        $joinsA  = array();
        $joinsB  = array();
        $Marcas = parent::gerarList($tabelas, $joinsA, $joinsB);
        return $Marcas;
    }
    public function pesquisarMarcaPorId($idmarca){
        $tabelas = array("marca");
        $joinsA  = array();
        $joinsB  = array();
        $identificadores = array("idmarca");
        $valorId = array($idmarca);
        return parent::gerarFindById($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
        
    }
    public function pesquisarMarcaPorNome($nomeMarca){
        $tabelas = array("marca");
        $joinsA  = array();
        $joinsB  = array();
        $identificadores = array("nomeMarca");
        $valorId = array($nomeMarca."%");
        $Marcas = parent::gerarFind($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
        return $Marcas;
    }

    public function atualizaMarca(ClasseMarcas $novaMarca){
        $tabela = "marca";
        $colunas = array("nomemarca","tipoproduto","cnpj");
        $valores = array($novaMarca->getNome(),
                         $novaMarca->getTipoproduto(),
                         $novaMarca->getCnpj());
        $identificadores = array("idmarca");
        $valorId = array($novaMarca->getIdmarca());
        return parent::gerarUpdate($tabela, $colunas, $valores, $identificadores, $valorId);
    }

    public function excluirMarcapeloIdMarca($idmarca){
        $tabela = "marca";
        $identificadores = array("idmarca");
        $valorId = array($idmarca);
        return parent::gerarDelete($tabela, $identificadores, $valorId);
    }
}
