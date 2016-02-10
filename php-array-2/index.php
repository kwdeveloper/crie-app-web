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
  $arr = [
    "HTML" => "Hypertext Markup Language",
    "CSS" => "Cascading Style Sheets",
    "PHP" => "Hypertext Preprocessor"
  ];

  $arr[] = "Extensible Markup Language";
  var_dump($arr);
?>
</body>
</html>