<!doctype html>
<!--
  O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web com
  HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
  Wilson Kawano
-->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP - Teste função __autoload()</title>
</head>
<body>
  <?php

  function __autoload($classe) {
    require_once($classe . ".php");
  }

  function main() {
    $t1 = new Teste1();
    $t2 = new Teste2();
  }

  main();
  ?>
</body>
</html>