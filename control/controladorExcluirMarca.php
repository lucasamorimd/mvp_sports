<?php

require_once '../model/DAO/classeMarcasDAO.php';

$idmarca = $_GET['idmarca'];

$marcaDAO = new classeMarcasDAO();

echo $marcaDAO->excluirMarcapeloIdMarca($idmarca);