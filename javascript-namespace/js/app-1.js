/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

var namespace_1 = {
  contador : 0,

  print : function() {
    console.log("namespace_1", this.contador++);
  }
};