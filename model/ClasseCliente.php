<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClasseCliente
 *
 * @author Lucas
 */
require_once'classeUsuario.php';
class ClasseCliente extends classeUsuario{
   
    private $idcliente;
    private $datacadastro;
    

    public function setIdcliente($idcliente){
        $this->idcliente = $idcliente;
    }
    public function getIdcliente(){
        return $this->idcliente;
    }
    public function setDatacadastro($datacadastro) {
        $this->datacadastro = $datacadastro;
    }    
    public function getDatacadastro() {
        return $this->datacadastro;
    }
    
   
}
