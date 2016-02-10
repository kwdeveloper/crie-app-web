<?php
/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos
 * web com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e
 * Laravel"
 * Wilson Kawano
 */

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

/* */
class Ator extends Artista {
  public function __construct($nome_, $origem_, $genero_)
  {
    parent::__construct($nome_, $origem_);
    $this->genero = $genero_;
  }

  public function getInfo() {
    $info = parent::getInfo();
    return [$info[0], $info[1], $this->genero];
  }

  private $genero;
}

$artista = new Artista("Leonardo da Vinci", "Itália");
var_dump($artista);

$ator = new Ator("Charles S. Chaplin", "Inglaterra", "comediante");
var_dump($ator->getInfo());

?>