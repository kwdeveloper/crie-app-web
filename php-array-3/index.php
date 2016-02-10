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
  $arr = [0];

  // inclui três elementos no array
  array_push($arr, 123, "aeiou", true);

  $arr = [123, "xyzw", true, -10];
  var_dump($arr);

  // exclui o elemento posição 1
  unset($arr[1]);

  // inclui um elemento
  $arr[] = 987;
  var_dump($arr);
?>
</body>
</html>