/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

var serie0 = [];
var serie1 = [];
var serie2 = [];
var meses = ["jan", "fev", "mar", "abr", "mai", "jun", "jul", "ago", "set", "out", "nov", "dez"];

var dados = {
  labels : serie0,
  datasets : [
    {
      data : serie1,
      strokeColor : "rgba(0, 220, 0, 1)",
      fillColor : "rgba(155, 255, 155, 0.5)",
      pointColor : "rgba(0, 220, 0, 1)"
    },
    {
      data : serie2,
      strokeColor : "rgba(220, 0, 0, 1)",
      fillColor : "rgba(255, 155, 155, 0.5)",
      pointColor : "rgba(220, 0, 0, 1)"
    }
  ]
};

/* Função principal */
$().ready( function() {
  // Obtém referência ao canvas
  var ctx = $("#grafico").get(0).getContext("2d");

  /* */
  $("#btnGraphRadar").click( function() {
    var i = 0;

    for(i = 0; i < 12; i++) {
      serie0[i] = meses[i];
      serie1[i] = Math.round(Math.random()*100);
      serie2[i] = Math.round(Math.random()*100);
    }

    new Chart(ctx).Radar(dados);
  });
});
