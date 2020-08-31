<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrou</title>

    <link rel="stylesheet" href="./css/entrou.css">
</head>
<body>
    <h1>Bem-vindo!</h1>
    <img id="marreco" src="https://thumbs.gfycat.com/DescriptiveWelcomeGarpike-size_restricted.gif">
    <?php
      echo "<div id='div'><a href='index.php?acao=logout'>SAIR</a></div>";
      if(isset($_GET['acao'])){
        if($_GET['acao']=="logout"){
           unset($_SESSION["usuario"]);
           header("location:index.php");
        }
     }
    ?>
</body>
</html>
