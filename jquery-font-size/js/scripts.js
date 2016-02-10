/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

$().ready( function() {
  function clear() {
    $("#paragrafo").removeClass("small")
      .removeClass("medium")
      .removeClass("big");
  }

  $("#btnSmall").click(function() {
    clear();
    $("#paragrafo").addClass("small");
  });

  $("#btnMedium").click(function() {
    clear();
    $("#paragrafo").addClass("medium");
  });


  $("#btnBig").click(function() {
    clear();
    $("#paragrafo").addClass("big");
  });

  // inicia com tamanho medio
  $("#paragrafo").addClass("medium");
});

