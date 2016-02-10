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
  $arr = ["PR" => "Paraná", "AC" => "Acre",
          "TO" => "Tocantins"];
  asort($arr);
  var_dump($arr);

  $arr = [-10, 20, 3.14, -20];
  asort($arr);
  var_dump($arr);
?>
</body>
</html>