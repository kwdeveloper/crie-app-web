/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

/* */
$().ready( function() {
  var ctx = [ $("#grafico-1").get(0).getContext("2d"),
              $("#grafico-2").get(0).getContext("2d"),
              $("#grafico-3").get(0).getContext("2d") ];

  var dados = [];
  var options = {};

  var index = 0;

  /* */
  $("#btnGraph").click( function() {
      dados = [
          {value: Math.random()*10, color: "#a00000"},
          {value: Math.random()*10, color: "#009000"},
          {value: Math.random()*10, color: "#000090"}
      ];

      options = {
        onAnimationComplete: function() {
          callPlotGraph();
        }
      };

      index = 0;
      plotGraph(index, ctx[index]);
  });

  /* */
  function callPlotGraph() {
    index++;

    if(index > 0 && index < 3) {
      plotGraph(index, ctx[index]);
    }
  }

  /* */
  function plotGraph(index, ctx) {
    if(index === 0)
      new Chart(ctx).Pie(dados, options);
    else if(index === 1)
      new Chart(ctx).Doughnut(dados, options);
    else if(index === 2)
      new Chart(ctx).PolarArea(dados, options);
  }
});
