<?php
session_start();
if(isset($_POST['idproduto'])){
    
    $existe = false;
    if(count($_SESSION['carrinho']) != 0){
    for ($i=0;$i< count($_SESSION['carrinho']);$i++){
        
        if($_SESSION['carrinho'][$i]['idproduto']==$_POST['idproduto']){
            
        $_SESSION['carrinho'][$i]['quantidade']=$_SESSION['carrinho'][$i]['quantidade']+1;
        
        
        $existe = true;
        if(isset($_POST['retirar'])){
            unset($_SESSION['carrinho'][$i]);
        }
        break;
        }
        
        
    }
    }
    if(!$existe){
        $produto = array("idproduto"=>$_POST['idproduto'],"quantidade"=>1);
    array_push($_SESSION['carrinho'], $produto);}
    echo count($_SESSION['carrinho']);

} else {
    echo "Erro ao adicionar produto ao carrinho.";
}
