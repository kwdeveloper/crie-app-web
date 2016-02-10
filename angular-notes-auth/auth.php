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

require 'vendor/autoload.php';

use Facebook\Facebook;
use Facebook\FacebookSession;
use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

/*** ***/
function isLogged() {
  // Inicializações para autenticação
  // Crie um aplicativo no Facebook e configure aqui o ID e a chave secreta obtidos no site
  $id = '987654321012345';
  $secret = 'aeiou12345qwert98765asdfg1234567';
  FacebookSession::setDefaultApplication($id, $secret);

  // Inicializa sessão PHP
  session_start();

  // Se o cookie foi recebido numa requisição anterior, e o
  // token FB já foi recuperado, necessita apenas autenticar
  // o usuário no FB usando o token
  if (isset($_SESSION['token'])) {
    $session = new FacebookSession($_SESSION['token']);

    try {
      if (!$session->validate($id, $secret)) {
        unset($session);
      }
    } catch (FacebookRequestException $ex) {
      // Facebook retornou um erro
      // return [false, $ex->getMessage()];
      unset($session);
    } catch (\Exception $ex) {
      // return [false, $ex->getMessage()];
      unset($session);
    }
  }

  // Se o cookie ainda não foi recebido (primeira requisição
  // do cliente), recupera e grava na variável de sessão PHP.
  // Executa autenticação no FB
  if (!isset($session)) {
    try {
      $helper = new FacebookJavaScriptLoginHelper();
      $session = $helper->getSession();

      if ($session)
        $_SESSION['token'] = $session->getToken();
    } catch (FacebookRequestException $ex) {
      // Facebook retornou um erro
      unset($session);
      return [false, $ex->getMessage()];
    } catch (\Exception $ex) {
      // Falha na validação ou outro erro
      unset($session);
      return [false, $ex->getMessage()];
    }
  }

  // Facebook aceitou usuário/senha
  if (isset($session) && $session) {
    return [true, $_SESSION['token']];
  }

  // Facebook rejeitou usuário/senha
  return [false, "Usuário/senha inválida"];
}
?>