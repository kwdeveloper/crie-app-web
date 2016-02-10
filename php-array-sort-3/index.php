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
  /* Função de comparação */
  function comparar($x, $y) {
    $s1 = array_sum($x);
    $s2 = array_sum($y);

    if ($s1 < $s2)
      return -1;
    else if ($s1 == $s2)
      return 0;

    return 1;
  }

  /* Ordenação customizada */
  $arr = [[-1, 2, 5], [10, 20, 30], [-1, -2, -3]];
  uasort($arr, "comparar");
  var_dump($arr);
?>
</body>
</html>