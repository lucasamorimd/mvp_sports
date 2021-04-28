<?php

session_start();
require_once 'conexao.php';

class classeLoginDAO {

    public function fazerLogin($email, $senha) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM cliente c WHERE c.email = ? AND c.senha = ?; ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $senha);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario != NULL) {
                $_SESSION['carrinho'] = array();
                $_SESSION['UsuarioLogado'] = 1;
                $_SESSION['NomeUsuarioLogado'] = $usuario['nome'];
                $_SESSION['PerfilUsuarioLogado'] = $usuario['perfil'];
                $_SESSION['IdUsuarioLogado'] = $usuario['idcliente'];
                $_SESSION['EnderecoUsuario'] = $usuario['endereco'];
                $_SESSION['EmailUsuario'] = $usuario['email'];
                $_SESSION['SenhaUsuario'] = $usuario['senha'];
                $_SESSION['cpfUsuario'] = $usuario['cpf'];
                $_SESSION['TelefoneUsuario'] = $usuario['telefone'];
                return $usuario;
            }
        } catch (Exception $exc) {
            echo "erro" . $exc->getMessage();
        }
    }
    public function fazerLoginFunc($email, $senha) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM funcionario c WHERE c.email = ? AND c.senha = ?; ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $senha);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario != NULL) {
                $_SESSION['UsuarioLogado'] = 1;
                $_SESSION['NomeUsuarioLogado'] = $usuario['nome'];
                $_SESSION['PerfilUsuarioLogado'] = $usuario['perfil'];
                $_SESSION['IdUsuarioLogado'] = $usuario['idfuncionario'];
                $_SESSION['EnderecoUsuario'] = $usuario['endereco'];
                $_SESSION['EmailUsuario'] = $usuario['email'];
                $_SESSION['SenhaUsuario'] = $usuario['senha'];
                $_SESSION['cpfUsuario'] = $usuario['cpf'];
                $_SESSION['TelefoneUsuario'] = $usuario['telefone'];
                return $usuario;
            }
        } catch (Exception $exc) {
            echo "erro" . $exc->getMessage();
        }
    }

    public function fazerLogout() {
        try {
            unset($_SESSION['UsuarioLogado']);
            header("location:../index.php");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}