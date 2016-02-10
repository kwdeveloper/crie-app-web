<?php
/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos
 * web com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e
 * Laravel"
 * Wilson Kawano
 */

  /* */
  abstract class Arquivo {
    public function __construct($nome_) {
      $this->nome = $nome_;
    }

    public function setNome($nome_) {
      $this->nome = $nome_;
    }

    public function verificar() {
      echo "Verifica se o arquivo $this->nome existe<br>";
    }

    abstract public function ler();

    private $nome = "";
  }

  /* */
  class ArquivoXML extends Arquivo {
    public function __construct($nome_) {
      parent::__construct($nome_);
    }

    public function ler() {
      echo "Esta função lê um arquivo XML<br>";
    }
  }

  /* */
  $arquivoXml = new ArquivoXML("teste.xml");
  $arquivoXml->ler();
?>