<?php 
session_start();

if(isset($_SESSION['UsuarioLogado'])){
    echo "<script>alert('Você já está logado!!!');
                        window.location.href='../index.php';
                        </script>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
      <form id="formLogin" 
              name="formLogin" 
              method="POST" 
              action="../control/controladorLogin.php">
           
            <label for="emailCliente">Email</label>
            <input id="emailUsuario" name="emailUsuario" type="text" size="30" 
                   value="">
            <br/>
            <label for="senhaCliente">Senha</label>
            <input id="senhaUsuario" name="senhaUsuario" type="password" size="30"accept="
                   "value="">
            <br/>
            <input type="hidden" id="pefilUsuario" name="perfilUsuario" value="<?php $_SESSION['PerfilUsuarioLogado']; ?>">
            <input type="submit" value="Fazer Login"> 
        </form>
    </body>
</html>

