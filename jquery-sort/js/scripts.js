/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

$(document).ready(function() {
  $("#btnSort").click( function() {
    var arr = [];    
    
    $("#lista-1 > li").each( function(index, elem) {
      arr.push(elem.innerHTML);
    });
    
    arr.sort();

    $("#lista-1 > li").each( function(index, elem) {
      elem.innerHTML = arr[index];
    });
  });
});
