<?php
require_once 'conexao.php';
class classeClienteDAO {
    
    public function cadastrarCliente(classeCliente $novoCliente){
        try{
        $pdo=  conexao::getinstance();
        $sql= "INSERT INTO cliente(nome,senha,endereco,cpf,email,telefone,datacadastro,perfil) values(?,?,?,?,?,?,now(),?);";
        $stmt=$pdo->prepare($sql);
        $stmt->bindValue(1, $novoCliente->getnome());
        $stmt->bindValue(2, $novoCliente->getSenha());
        $stmt->bindValue(3, $novoCliente->getEndereco());
        $stmt->bindValue(4, $novoCliente->getCpf());
        $stmt->bindValue(5, $novoCliente->getEmail());
        $stmt->bindValue(6, $novoCliente->getTelefone());
        $stmt->bindValue(7,1);
        return $stmt->execute(); 
        
        }catch(PDOException $exc){
            echo $exc->getMessage();
    }
  }  
  public function pesquisarClientePorNome($nomeCliente){
      try{
          $pdo= conexao::getinstance();
          $sql="SELECT * FROM cliente WHERE nome LIKE :nomeCliente";
          $nomeCliente = "%".$nomeCliente."%";
          $stmt=$pdo->prepare($sql);
          $stmt->bindValue(':nomeCliente',$nomeCliente, PDO::PARAM_STR);
          $stmt->execute();
          $Clientes = array();
          while($Cliente = $stmt->fetchObject(__CLASS__)){
              $Clientes[] = $Cliente;
          }
          return $Clientes;
          
      } catch (Exception $exc) {
           echo $exc->getTraceAsString();
      }
  }
  
  public function atualizaCliente(classeCliente $novoCliente){
      try{
          $pdo = conexao::getinstance();
          $sql = "UPDATE cliente SET nome = ?, endereco = ?, email = ?, cpf = ?, telefone = ?, senha = ? WHERE idCliente = ?";
          $stmt = $pdo->prepare($sql);
          $stmt->bindValue(1, $novoCliente->getnome());
          $stmt->bindValue(2, $novoCliente->getEndereco());
          $stmt->bindValue(3, $novoCliente->getEmail());
          $stmt->bindValue(4, $novoCliente->getCpf());
          $stmt->bindValue(5, $novoCliente->getTelefone());
          $stmt->bindValue(6, $novoCliente->getSenha());
          $stmt->bindValue(7, $novoCliente->getIdcliente()); 
          return $stmt->execute();
          
      } catch (Exception $exc) {
          echo $exc->getMessage();
      }
  }
  
  public function pesquisarClientePorId($idcliente){
      try{
          $pdo = conexao::getinstance();
          $sql = "SELECT * FROM cliente WHERE idCliente = ?";
          $stmt = $pdo->prepare($sql);
          $stmt->bindValue(1, $idcliente); 
          $stmt->execute();
          return $cliente;
          
      } catch (Exception $exc) {
          echo $exc->getMessage();
      }      
  }
  
  public function listarClientes(){
      try{
          $pdo= conexao::getinstance();
          $sql= "SELECT * FROM cliente";
          $stmt= $pdo->prepare($sql);
          $stmt->execute();
          $Clientes = array();
          while ($Cliente = $stmt->fetchObject(__CLASS__)){
              $Clientes[] = $Cliente;
          }
          return $Clientes;
      } catch (Exception $exc) {
          echo $exc->getTraceAsString();

      }
  }
  
  public function excluirClientepeloIdCliente($idCliente){
      try{
          $pdo=  conexao::getinstance();
          $sql="DELETE FROM cliente WHERE idcliente=?";
          $stmt= $pdo->prepare($sql);
          $stmt->bindValue(1,$idCliente);
          $result=$stmt->execute();
          return $result;
      } catch (Exception $ex) {

      }
  }
}
