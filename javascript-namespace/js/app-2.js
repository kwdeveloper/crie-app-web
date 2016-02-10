/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

var namespace_2 = {
  contador : 0,
  teste : "aeiou",

  print : function() {
    console.log("namespace_2", this.contador);
    this.contador += 10;
  }
};