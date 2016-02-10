/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

$().ready(function() {
  var serie1 = [];
  var serie2 = [];
  var i = 0;

  for(i = 0; i < 10; i++) {
    serie1.push(Math.random()*100);
    serie2.push(Math.random()*100);
  }

  $.jqplot('grafico',  [serie1, serie2]);
});
