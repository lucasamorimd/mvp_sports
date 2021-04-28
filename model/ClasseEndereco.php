<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClasseEndereco
 *
 * @author Lucas
 */
class ClasseEndereco {
   private $cidade;
   private $logradouro;
   private $UF;
   private $CEP;
   private $bairro;
   private $complemento;
   
   function getCidade() {
       return $this->cidade;
   }

   function getUF() {
       return $this->UF;
   }
   function getLogradouro() {
       return $this->logradouro;
   }

   function getComplemento() {
       return $this->complemento;
   }

   function setLogradouro($logradouro) {
       $this->logradouro = $logradouro;
   }

   function setComplemento($complemento) {
       $this->complemento = $complemento;
   }

      function getCEP() {
       return $this->CEP;
   }

   function getBairro() {
       return $this->bairro;
   }

   function setCidade($cidade) {
       $this->cidade = $cidade;
   }

   function setUF($UF) {
       $this->UF = $UF;
   }

   function setCEP($CEP) {
       $this->CEP = $CEP;
   }

   function setBairro($bairro) {
       $this->bairro = $bairro;
   }


}
