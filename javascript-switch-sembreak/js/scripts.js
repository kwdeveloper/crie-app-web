/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

function testeSwitchCase() {
  var arr = [100,200,300,400];

  switch (arr.length) {
    default:
      document.writeln("Tamanho inválido de array");
      break;

    case 4:
      document.writeln(arr[3]);

    case 3:
      document.writeln(arr[2]);

    case 2:
      document.writeln(arr[1]);

    case 1:
      document.writeln(arr[0]);
  }
}