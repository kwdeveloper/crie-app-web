/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

$(document).ready(function(){
  var serie1 = [100, 112, 210, 75];
  var serie2 = [50, 155, 250, 113];
  var serie3 = [70, 125, 215, 110];
  var seriesLabels = ["José", "Maria", "João"];
  var eixoX = [[1, "jan-mar"], [2, "abr-jun"], [3, "jul-set"], [4, "out-dez"]];

  var options = {
    title: "Vendas trimestrais",
    
    legend: {
      labels: seriesLabels,
      placement: "outsideGrid",
      rowSpacing: "0px",
      show: true
    },

    axes: {
      xaxis: {
        label: "Trimestre",
        pad: 0,
        ticks: eixoX
      },
      yaxis: {
        label: "Vendas"
      }
    },

    seriesDefaults: {
      rendererOptions: {
        smooth: true
      }
    },

    axesDefaults: {
      labelRenderer: $.jqplot.CanvasAxisLabelRenderer
    },
  };

  $.jqplot ("grafico", [serie1, serie2, serie3], options);
});
