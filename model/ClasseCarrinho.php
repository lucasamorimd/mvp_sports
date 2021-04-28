<?php

class ClasseCarrinho {
    
    private $produto;
    private $idpedido;
    private $quantidade;
    
    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }
    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getProduto() {
        return $this->produto;
    }

    public function getIdpedido() {
        return $this->idpedido;
    }

    public function setProduto($produto) {
        $this->produto = $produto;
    }

    public function setIdpedido($idpedido) {
        $this->idpedido = $idpedido;
    }


}
