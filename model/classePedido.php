<?php

class classePedido {
    private $idpedido;
    private $idusuario;
    private $data;
    
    public function getIdpedido() {
        return $this->idpedido;
    }

    public function getIdusuario() {
        return $this->idusuario;
    }

    public function getData() {
        return $this->data;
    }

    public function setIdpedido($idpedido) {
        $this->idpedido = $idpedido;
    }

    public function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    public function setData($data) {
        $this->data = $data;
    }


}
