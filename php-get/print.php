<?php
/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos
 * web com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e
 * Laravel"
 * Wilson Kawano
 */

header('Content-Type: text/html; charset=utf-8');

if (isset($_GET["nome"])) {
  echo "Seu nome é ". $_GET['nome'];
  echo "<br>";
}

if (isset($_GET["idade"])) {
  echo "Sua idade  é ". $_GET['idade'];
  echo "<br>";
}

if (isset($_GET["email"])) {
  echo "Seu email é ". $_GET['email'];
  echo "<br>";
}
?>