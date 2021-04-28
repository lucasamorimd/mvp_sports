<?php
require_once '../model/DAO/classeLoginDAO.php';

$loginDAO = new classeLoginDAO();

//var_dump($_POST); die;

if (isset($_GET['logout']) && ($_GET['logout'] == TRUE)) {
    $loginDAO->fazerLogout();
} else {
    $email = $_POST["emailUsuario"];
    $senha = $_POST["senhaUsuario"];
    //$pefil = $_POST["perfilUsuarioLogado"];
}


$usuario = $loginDAO->fazerLogin($email, $senha);
if (!isset($usuario)) {
    echo "<script>alert('Erro no Login! Email e/ou Senha Incorretos!!!');
                        window.location.href='../index.php';
                        </script>";
} else {
        echo "<script>alert('Bem-vindo a MVP Sports!!!');
                        </script>";
       Header("Location: ../index.php");
    
}  

?>
