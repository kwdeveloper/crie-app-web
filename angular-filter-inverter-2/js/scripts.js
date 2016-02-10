/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */
 
/* */
var app = angular.module("main", []);

/* */
app.filter("inverter", function() {
  return function(s, delimitador1, delimitador2) {
    if (s == null || s == "")
      return;

    var ret = "";  
      
    // return s.split('').reverse().join('');

    for (var i = 0; i < s.length; i++)
      ret = s[i] + ret;
    
    return delimitador1 + ret + delimitador2;
  }
});
