<?php
/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos
 * web com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e
 * Laravel"
 * Wilson Kawano
 */

  $arq = "index.php";
  echo "<h3>Conte&uacute;do do arquivo $arq</h3>";
  echo "<div style='font-family:" . "Courier; font-size:12'>";

  $fp = fopen($arq, "r");

  while(!feof($fp)) {
    $s = fgets($fp);
    $s = htmlspecialchars($s);
    $s = str_replace(" ", "&nbsp;", $s);
    echo ($s) . "<br>";
  }

  fclose($fp);

  echo "</div>";
?>