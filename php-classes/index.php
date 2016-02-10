<?php
/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos
 * web com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e
 * Laravel"
 * Wilson Kawano
 */

header('Content-Type: text/html; charset=utf-8');

/* */
class Artista {
  public function __construct($nome_, $origem_) {
    $this->nome = $nome_;
    $this->origem = $origem_;
  }

  public function getInfo() {
    return [$this->nome, $this->origem];
  }

  private $nome;
  private $origem;
}

$artista = new Artista("Leonardo da Vinci", "Itália");
var_dump($artista);

?>