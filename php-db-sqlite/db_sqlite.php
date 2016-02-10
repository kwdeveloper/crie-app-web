<?php
/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos
 * web com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e
 * Laravel"
 * Wilson Kawano
 */

/* */
function executeSql($db, $sql) {
  try {
    if ($db->exec($sql) === false)
      echo "Não executou " . $sql . "<br>";
    else
      echo "Executou " . $sql . "<br>";
  }
  catch(PDOException $e) {
    echo "ERRO: " . $e->getMessage();
  }
}

/* */
function imprimir($db) {
  echo "Imprimindo tabela ...<br>";

  // Executa a consulta e lê os dados
  try {
    $rows = $db->query("select * from cadastro");
    $rows->setFetchMode(PDO::FETCH_ASSOC);
  }
  catch (PDOException $e) {
    echo "ERRO: " . $e->getMessage();
  }

  // Loop nas linhas da tabela
  while ($row = $rows->fetch()) {

    // Loop nas colunas da linha
    foreach ($row as $col) {
      echo $col . ", ";
    }

    echo "<br />";
  }
}

/* */
function main() {
  // Cria BD e tabela
  $db = new PDO("sqlite:teste.db");
  executeSql($db, "create table cadastro(nome varchar(80) not null primary key, nascimento text not null)");

  // Limpa a tabela eliminando registros existentes
  executeSql($db, "delete from cadastro");

  // Inclui linhas na tabela
  executeSql($db, "insert into cadastro values('Maria', '2010-01-21')");
  executeSql($db, "insert into cadastro values('José', '1995-10-09')");
  executeSql($db, "insert into cadastro values('Ada', '2011-07-15')");

  // Tentativa de incluir chave primária duplicada
  executeSql($db, "insert into cadastro values('Ada', '2011-11-12')");

  // Inclusão de valor de tipo diferente do configurado para a coluna
  executeSql($db, "insert into cadastro values('Eliseu', 3.1415)");

  // Atualiza dado de uma linha
  executeSql($db, "update cadastro set nome='Maria José' where nome='Maria'");

  // Mostra conteúdo da tabela
  imprimir($db);
}

/*** ***/
main();
?>