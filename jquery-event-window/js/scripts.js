/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

$().ready(function() {
  function showWindowSize() {
    $("#paragrafo").text("L: " + $(window).width() + " A: " + $(window).height());
  }

  $(window).resize(function() {
    showWindowSize();
  });

  showWindowSize();
});