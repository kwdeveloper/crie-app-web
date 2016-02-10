<!DOCTYPE html>
<!--
  O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web com
  HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
  Wilson Kawano
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PHP - Namespace</title>
  </head>

  <body>
  <?php
    require_once("arquivo.php");
    require_once("conexao.php");

    $arquivo = new Classes\Arquivo();
    $arquivo->abrir();

    $conexao = new Classes\Conexao();
    $conexao->abrir();
  ?>
  </body>
</html>