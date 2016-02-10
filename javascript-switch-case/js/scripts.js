/*
 * Parte integrante do livro "Crie aplicativos web com HTML, CSS, JavaScript,
 * PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

/* */
function printDef() {
  var sig = document.getElementById("sigla").value.toUpperCase();
  var def = document.getElementById("significado");  //.innerHTML;

  switch (sig) {
    case "HTML":
      def.innerHTML = "Hypertext Markup Language";
      break;

    case "CSS":
      def.innerHTML = "Cascading Style Sheet";
      break;

    default:
      def.innerHTML = "Não definido";
  }
}