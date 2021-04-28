<?php
require_once '../model/DAO/classeFuncionarioDAO.php';

if (isset($_GET['idfuncionario'])) {
    $idfuncionario = $_GET['idfuncionario'];
}

$funcionarioDAO = new classeFuncionarioDAO();
$excluir = $funcionarioDAO->excluirfuncionariopeloIdfuncionario($idfuncionario);
if ($excluir) {
    echo "<script>alert('Excluido com Sucesso');
                        window.location.href='../paineldecontrole.php';
                        </script>";

}


