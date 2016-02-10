/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

/* */
function printConceito() {
  var nota = document.getElementById('conceito');
  var x = parseInt(document.getElementById('notas').value);

  if(x > 8) {
    nota.innerHTML = "Ótimo";
    nota.style.color = "#0000ff";
  }
  else if(x > 5) {
    nota.innerHTML = "Bom";
    nota.style.color = "#00ff00";
  }
  else if(x > 2) {
    nota.innerHTML = "Regular";
    nota.style.color = "#ff8800";
  }
  else {
    nota.innerHTML = "Fraco";
    nota.style.color = "#ff0000";
  }
}