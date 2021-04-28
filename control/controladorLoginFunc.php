<?php
require_once '../model/DAO/classeLoginDAO.php';

$loginDAO = new classeLoginDAO();

//var_dump($_POST); die;

if (isset($_GET['logout']) && ($_GET['logout'] == TRUE)) {
    $loginDAO->fazerLogout();
} else {
    $email = $_POST["emailUsuario"];
    $senha = $_POST["senhaUsuario"];
    //$pefil = $_SESSION["perfilUsuarioLogado"];
}


$usuario = $loginDAO->fazerLoginFunc($email, $senha);
if ($usuario == FALSE) {
    echo "<script>alert('Erro no Login! Email e/ou Senha Incorretos!!!');
                        window.location.href='../index.php';
                        </script>";
}else{
       if($usuario['perfil'] ==2){
        echo "<script>alert('Bem-vindo Administrador!!!');
            window.location.href='../paineldecontrole.php';
                        </script>";    
       
       }
    else{
        echo "<script>alert('Bem-vindo Funcionario!!!');
            window.location.href='../paineldecontrole.php';
                        </script>";
      
    }
    
    }
    
?>
