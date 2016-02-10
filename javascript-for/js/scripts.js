/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

var maiusc = true;

/* */
function inverter() {
  var elements = document.getElementsByTagName('input');
  var btn = document.getElementById('btn-inv');
  var i = 0;

  for (i = 0; i < elements.length; i++) {
    if (maiusc) {
      elements[i].value = elements[i].value.toUpperCase();
      btn.innerHTML = 'Minúsculas';
    }
    else {
      elements[i].value = elements[i].value.toLowerCase();
      btn.innerHTML = 'Maiúsculas';
    }
  }

  maiusc = !maiusc;
}
