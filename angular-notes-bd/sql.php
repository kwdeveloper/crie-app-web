<?php
/*
 * NOTA
 *
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos
 * web com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e
 * Laravel"
 * Wilson Kawano
 *
 * O código-fonte pode ser livremente usado desde que o conteúdo da presente
 * NOTA não seja suprimido
 */

/* */
function encode($ok = false, $dados, $msg = "", $num_elementos = 0) {
  return json_encode(
      array("ok" => $ok, "dados" => $dados, "num_elementos" => $num_elementos, "msg" => $msg));
}

/* */
function executeSql($sql, $tipo, $val1 = "", $val2 = "") {
  try {
    $pdo = new PDO("pgsql:host=localhost;dbname=teste", "wilsonk", "wilsonk");
    $db_sql = $pdo->prepare($sql);

    if ($val1 !== "")
      $db_sql->bindValue(":par1", $val1);

    if ($val2 !== "")
      $db_sql->bindValue(":par2", $val2);

    $db_sql->execute() or die(print_r($db_sql->errorInfo()));  // ATENCAO: die() so para debug

    $rows = array();

    if ($db_sql != false && $tipo == "GET") {
      $rows = $db_sql->fetchAll(PDO::FETCH_ASSOC);
    }

    if ($db_sql == false)
      return array(false, $rows, "Erro na query: " . $sql);

    return array(true, $rows, $sql);
  }
  catch(PDOException $e) {
    return array(false, array(), "Erro na conexão com BD");
  }
}

/* */
function main() {
  $requisicao = json_decode(file_get_contents("php://input"));
  $sql = "";
  $resposta = "";
  $num_elementos = 0;

  switch ($_SERVER["REQUEST_METHOD"]) {
    case "DELETE":
      $sql = "delete from t_notas_2 where id = :par1";
      $resposta = executeSql($sql, $_SERVER["REQUEST_METHOD"], $requisicao->id);
      break;

    case "GET":
      $pagina = 1;
      $elementosPorPagina = 1;

      if (isset($_GET["pagina"]))
        $pagina = $_GET["pagina"];

      if (isset($_GET["elementosPorPagina"]))
        $elementosPorPagina = $_GET["elementosPorPagina"];

      $inicio = $elementosPorPagina * ($pagina - 1);
      $sql = "select * from t_notas_2 order by tstamp desc
          offset :par1 limit :par2";
      $dados = executeSql($sql, $_SERVER["REQUEST_METHOD"], $inicio, $elementosPorPagina);

      if ($dados[0]) {
        $rows = $dados[1];
        $msg = $dados[2];
        $sql = "select count(id) from t_notas_2";
        $dados = executeSql($sql, $_SERVER["REQUEST_METHOD"]);

        if ($dados[0]) {
          $resposta = array(true, $rows, $msg);
          $num_elementos = $dados[1][0]["count"];
          break;
        }
      }

      $resposta = array(false, array(), $dados[2], 0);
      break;

    case "POST":
      $sql = "insert into t_notas_2(texto) values(:par1)";
      $resposta = executeSql($sql, $_SERVER["REQUEST_METHOD"], $requisicao->texto);
      break;

    case "PUT":
      $sql = "update t_notas_2 set texto = :par1 where id = :par2";
      $resposta = executeSql($sql, $_SERVER["REQUEST_METHOD"], $requisicao->texto, $requisicao->id);
      break;

    default:
      print encode(false, "Requisição inválida: " . $_SERVER["REQUEST_METHOD"]);
      return;
  }

  print encode($resposta[0], $resposta[1], $resposta[2], $num_elementos);
}

/*** ***/
main();
