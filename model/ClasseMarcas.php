<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClasseFornecedores
 *
 * @author Lucas
 */
require_once 'classeUsuario.php';
class ClasseMarcas extends classeUsuario{
    
    private $idmarca;
    private $cnpj;
    private $tipoproduto;
    private $idfuncionario;

    function getIdmarca() {
        return $this->idmarca;
    }

    function setIdmarca($idmarca) {
        $this->idmarca = $idmarca;
    }
    
    function getIdfuncionario() {
        return $this->idfuncionario;
    }

    function setIdfuncionario($idfuncionario) {
        $this->idfuncionario = $idfuncionario;
    }

    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }
    public function getCnpj(){
        return $this->cnpj;
    }
   
    public function setTipoproduto($tipoproduto){
        $this->tipoproduto = $tipoproduto;
    }
    public function getTipoproduto(){
        return $this->tipoproduto;
    }
    
}
