/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

/* */
$().ready(function() {
  $("img").hover(function() {
    $("#legenda").text($(this).data().descImg);
  });
});