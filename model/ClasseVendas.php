<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClasseVendas
 *
 * @author Lucas
 */
class ClasseVendas {
    
    private $idvenda;
    private $qtdprodutos;
    private $precototal;
    private $vendedor;
    
    function setIdvenda($idvenda) {
        $this->idvenda = $idvenda;
    }
    
    function getIdvenda() {
        return $this->idvenda;
    }
    
    function setQtdprodutos($qtdprodutos) {
        $this->qtdprodutos = $qtdprodutos;
    }
    
    function getQtdprodutos() {
        return $this->qtdprodutos;
    }
    
    function setPrecototal($precototal) {
        $this->precototal = $precototal;
    }
    
    function getPrecototal() {
        return $this->precototal;
    }
    
    function setVendedor($vendedor) {
        $this->vendedor = $vendedor;
    }

    function getVendedor() {
        return $this->vendedor;
    }

    
}
