<?php
require_once '../model/DAO/classeClienteDAO.php';

if (isset($_GET['idcliente'])) {
    $idCliente = $_GET['idcliente'];
}

$clienteDAO = new classeClienteDAO();
$excluir = $clienteDAO->excluirClientepeloIdCliente($idCliente);
if ($excluir) {
    echo "<script>alert('Excluido com Sucesso');
                        window.location.href='../paineldecontrole.php';
                        </script>";

}


