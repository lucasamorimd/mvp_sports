<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClasseFuncionario
 *
 * @author Lucas
 */
require_once 'classeUsuario.php';
class ClasseFuncionario extends classeUsuario{
    
    private $idfuncionario;
    private $datacontrato;
    private $datapagamento;
    private $salario;
    
    public function setIdfuncionario($idfuncionario){
        $this->idfuncionario = $idfuncionario;
    }
    public function getIdfuncionario(){
        return $this->idfuncionario;
    }
    public function setDatacontrato($datacontrato){
        $this->datacontrato = $datacontrato;
    }
    public function getDatacontrato(){
        return $this->datacontrato;
    }
    public function setDatapagamento($datapagamento){
        $this->datapagamento = $datapagamento;
    }
    public function getDatapagamento(){
        return $this->datapagamento;
    }
    function getSalario() {
        return $this->salario;
    }

    function setSalario($salario) {
        $this->salario = $salario;
    }

}
