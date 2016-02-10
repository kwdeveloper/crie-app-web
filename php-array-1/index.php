<!doctype html>
<!--
  O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web com
  HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
  Wilson Kawano
-->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP - Teste com array</title>
</head>
<body>
<?php
  $arr = [0, 10, 20, 30, 40];

  // altera valor da chave (posição) 0
  $arr[0] = 999;

  // inclui na posição 10
  $arr[10] = -1;

  $arr[] = -2;
  var_dump($arr);
?>
</body>
</html>