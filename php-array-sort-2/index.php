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
  $arr = [12, 15, -1, 2.71, -2.5, 2];
  sort($arr);
  var_dump($arr);
?>
</body>
</html>