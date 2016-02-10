<!doctype html>
<!--
  O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web com
  HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
  Wilson Kawano
-->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP - Tipos</title>
</head>
<body>
  <?php
    class Teste {
      function prt() {
        print($this->x . " " . $this->y);
      }

      private $x = 1;
      private $y = -3;
    }

    var_dump("PHP");
    var_dump(123);
    var_dump(3.1415);
    var_dump(true);
    var_dump([1, "PHP", 3.14]);
    var_dump(new Teste());
  ?>
</body>
</html>
