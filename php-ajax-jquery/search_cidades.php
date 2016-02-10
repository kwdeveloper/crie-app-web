<?php

/* */
function echoTblJson($tbl) {
  $tbl->setFetchMode(PDO::FETCH_ASSOC);
  header("Content-Type: application/json", true);
  echo json_encode($tbl->fetchAll());
}

/* */
function searchTable() {
  // Postgresql
  //  $db = new PDO("pgsql:host=localhost;dbname=teste", "wilsonk", "wilsonk");
  //  $tbl_name = "T_CIDADES";

  // Mysql
  $db = new PDO("mysql: host=localhost; dbname=db_laravel", "wilson", "wilson");
  $db->query("SET CHARACTER SET utf8");
  $db->query("SET NAMES utf8");     

  $parametro = "%" . $_GET["cidade"] . "%";
  $tbl = $db->query("select * from cidades where nome like '$parametro';");
  echoTblJson($tbl);
}

/* */
function main() {
  if(isset($_GET["cidade"])) {
    searchTable();
  }
  else {
    echo "Cidade não definida no pedido";
  }
}

main();

?>