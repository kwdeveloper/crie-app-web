<?php
/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos
 * web com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e
 * Laravel"
 * Wilson Kawano
 */

/* */
function incluir_dados_tabela($fname, $separador, $delimitador, $sql, $ind_colunas, $colunas) {
  // Abrir arquivo para leitura
  $fp = fopen($fname, 'r');

  if (!$fp) {
    echo "Erro ao abrir arquivo $fname<br />";
    return;
  }

  echo "Abriu $fname<br />";
  $incluiu = 0;
  $erro = 0;

  // Ler cabecalho do arquivo
  $cabecalho = fgetcsv($fp, 0, $separador, $delimitador);

  // Varre o arquivo CSV
  while (!feof($fp)) {
    // Ler uma linha do arquivo
    $linha = fgetcsv($fp, 0, $separador, $delimitador);
    if (!$linha) {
      continue;
    }

    for ($i = 0; $i < count($linha); $i++) {
      for ($j = 0; $j < count($ind_colunas); $j++) {
        if ($i == $ind_colunas[$j]) {
          $colunas[$i] = utf8_encode($linha[$i]);
          break;
        }
      }
    }

    if ($sql->execute($colunas))
      $incluiu++;
    else
      $erro++;
  }

  fclose($fp);
  echo "Incluiu $incluiu registros com sucesso e $erro falhas</br>";
}

/* */
function main() {
  $banco_dados = "teste";  //"db_cidades";  // PostgreSQL

  try {
    // PostgreSQL
    $db = new PDO("pgsql: host=localhost; dbname=$banco_dados", "wilsonk", "wilsonk");

    /*
    // MySQL
    $db = new PDO("mysql: host=localhost; dbname=$fname", "wilson", "wilson");
    $db->query("SET CHARACTER SET utf8");
    $db->query("SET NAMES utf8");
    */
  }
  catch(PDOException $e) {
    echo "ERRO: " . $e->getMessage() . "<br />";
    exit;
  }

  echo "<html><body>";

  $tbl_name = "T_ESTADOS";
  $sql = $db->prepare("INSERT INTO $tbl_name(SIGLA, NOME) VALUES(?,?)");
  incluir_dados_tabela("ibge_estados_nome.csv", "|", '"', $sql, array(0, 1), array("",""));

  $tbl_name = "T_CIDADES";
  $sql = $db->prepare("INSERT INTO $tbl_name(SIGLA_ESTADO, CODIGO, NOME) VALUES(?,?,?)");
  incluir_dados_tabela("ibge_cidades.csv", ",", '"', $sql, array(0, 1, 2), array("",0,""));

  echo "</body></html>";
}

main();
?>
