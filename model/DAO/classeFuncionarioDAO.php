<?php
require_once 'conexao.php';
class classeFuncionarioDAO {
    
    public function cadastrarFuncionario(ClasseFuncionario $novofuncionario){
        try{
        $pdo=  conexao::getinstance();
        $sql= "INSERT INTO funcionario(nome,endereco,senha,email,cpf,datacontrato,datapagamento,perfil,salario,telefone) values(?,?,?,?,?,now(),?,?,?,?);";
        $stmt=$pdo->prepare($sql);
        $stmt->bindValue(1, $novofuncionario->getNome());
        $stmt->bindValue(2, $novofuncionario->getEndereco());
        $stmt->bindValue(3, $novofuncionario->getSenha());
        $stmt->bindValue(4, $novofuncionario->getEmail());
        $stmt->bindValue(5, $novofuncionario->getCpf());
        $stmt->bindValue(6, $novofuncionario->getDatapagamento());
        $stmt->bindValue(7, $novofuncionario->getPerfil());
        $stmt->bindValue(8, $novofuncionario->getSalario());
        $stmt->bindValue(9, $novofuncionario->getTelefone());
        return $stmt->execute(); 
        
        }catch(PDOException $exc){
            echo $exc->getMessage();
    }
  }  
  public function pesquisarfuncionarioPorNome($nomefuncionario){
      try{
          $pdo= conexao::getinstance();
          $sql="SELECT * FROM funcionario WHERE nome LIKE :nomefuncionario";
          $nomefuncionario = "%".$nomefuncionario."%";
          $stmt=$pdo->prepare($sql);
          $stmt->bindValue(':nomefuncionario',$nomefuncionario, PDO::PARAM_STR);
          $stmt->execute();
          $funcionarios = array();
          while($funcionario = $stmt->fetchObject(__CLASS__)){
              $funcionarios[] = $funcionario;
          }
          return $funcionarios;
          
      } catch (Exception $exc) {
           echo $exc->getTraceAsString();
      }
  }
  
  public function atualizafuncionario(ClasseFuncionario $novofuncionario){
      try{
          $pdo = conexao::getinstance();
        $sql= "UPDATE funcionario SET nome = ?, endereco = ?, senha = ?, email = ?, cpf = ?, datapagamento = ?, perfil = ?, salario = ?, telefone = ? WHERE idfuncionario = ?;";
        $stmt=$pdo->prepare($sql);
        $stmt->bindValue(1, $novofuncionario->getNome());
        $stmt->bindValue(2, $novofuncionario->getEndereco());
        $stmt->bindValue(3, $novofuncionario->getSenha());
        $stmt->bindValue(4, $novofuncionario->getEmail());
        $stmt->bindValue(5, $novofuncionario->getCpf());
        $stmt->bindValue(6, $novofuncionario->getDatapagamento());
        $stmt->bindValue(7, $novofuncionario->getPerfil());
        $stmt->bindValue(8, $novofuncionario->getSalario());
        $stmt->bindValue(9, $novofuncionario->getTelefone());
        $stmt->bindValue(10, $novofuncionario->getIdfuncionario());
        return $stmt->execute();
          
      } catch (Exception $exc) {
          echo $exc->getMessage();
      }
  }
  
  public function pesquisarfuncionarioPorId($idfuncionario){
      try{
          $pdo = conexao::getinstance();
          $sql = "SELECT * FROM funcionario WHERE idfuncionario = ?";
          $stmt = $pdo->prepare($sql);
          $stmt->bindValue(1, $idfuncionario); 
          $stmt->execute();
          $funcionarios = array();
          while ($funcionario = $stmt->fetchObject(__CLASS__)){
              $funcionarios[] = $funcionario;
          }
          return $funcionarios[0];
          //return $idfuncionario;
          
      } catch (Exception $exc) {
          echo $exc->getMessage();
      }      
  }
  
  public function listarfuncionarios(){
      try{
          $pdo= conexao::getinstance();
          $sql= "SELECT * FROM funcionario";
          $stmt= $pdo->prepare($sql);
          $stmt->execute();
          $funcionarios = array();
          while ($funcionario = $stmt->fetchObject(__CLASS__)){
              $funcionarios[] = $funcionario;
          }
          return $funcionarios;
      } catch (Exception $exc) {
          echo $exc->getTraceAsString();

      }
  }
  
  public function excluirfuncionariopeloIdfuncionario($idfuncionario){
      try{
          $pdo=  conexao::getinstance();
          $sql="DELETE FROM funcionario WHERE idfuncionario=?";
          $stmt= $pdo->prepare($sql);
          $stmt->bindValue(1,$idfuncionario);
          $result=$stmt->execute();
          return $result;
      } catch (Exception $ex) {

      }
  }
}
