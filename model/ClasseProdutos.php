<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClasseProdutos
 *
 * @author Lucas
 */
class ClasseProdutos {
    
    private $idproduto;
    private $preco;
    private $foto;
    private $disponibilidade;
    private $nome;
    private $descricao;
    private $categoria;
    private $idmarca;
    
    public function getIdmarca() {
        return $this->idmarca;
    }

    public function setIdmarca($idmarca) {
        $this->idmarca = $idmarca;
    }
    
    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    function setIdproduto($idproduto) {
        $this->idproduto = $idproduto;
    }    
    function getIdproduto() {
        return $this->idproduto;
    }
    function getDescricao() {
        return $this->descricao;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }
    function getPreco() {
        return $this->preco;
    }
    function setDisponibilidade($disponibilidade) {
        $this->disponibilidade = $disponibilidade;
    }
    function getDisponibilidade() {
        return $this->disponibilidade;
    }
    function setNome($nome) {
        $this->nome = $nome;
    }
    function getNome() {
        return $this->nome;
    }

}
