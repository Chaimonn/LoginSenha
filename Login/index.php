<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login e Senha [SAIMON]</title>

    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
      $arquivo = fopen('arquivo.txt','a+');
      $senha="fdda147ec466641a184b22bd1e0eb95c";
      $usuario= "candidofarias@gmail.com";
      $arq=$usuario."|".$senha."\n";
      fwrite($arquivo, $arq);
      fclose($arquivo);
      session_start();
  		date_default_timezone_set("America/Sao_Paulo");
  		if(!isset($_SESSION['usuario'])){
    ?>
    <a href="https://www.twitch.tv/superchaimon/" target="_blank">
        <img id="marreco"src="./img/marreco.png" alt="MarrecoStore">
    </a>
    <form class="loginSenha" action="" method="post">
        <input type="email" name="usuario" id="" required placeholder="  Usuário">
        <input type="password" name="senha" id="" required placeholder="  Senha">
        <button type="submit" name="entrar">Entrar</button>
    </form>

    <?php
        if(isset($_POST['entrar'])){
          $usuario=$_POST['usuario'];
          $senha=$_POST['senha'];
          $arquivo = fopen('arquivo.txt','r');
          $validacao=fgets($arquivo);
          $validacao=explode('|',$validacao);
          $usuarioFinal=$validacao[0];
          $senhaFinal=$validacao[1];
          fclose($arquivo);
          $senha=md5($senha);
          $senhaFinal=str_replace("\n", "", $senhaFinal);
          echo "<p>USUÁRIO OU SENHA NÃO RECONHECIDOS</p>";
          if ($usuarioFinal==$usuario&&$senhaFinal==$senha) {
            $_SESSION["usuario"]=$usuario;
            header("location:entrou.php");
          }
        }
      }
      else{
  			 $usuario=$_SESSION['usuario'];
  		   if(isset($_GET['acao'])){
            if($_GET['acao']=="logout"){
  				        unset($_SESSION["usuario"]);
  			          header("location:index.php");
  				    }
  			   }
  		}
    ?>
</body>
</html>
