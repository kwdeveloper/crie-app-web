/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

$().ready(function() {
  var labelX = ["labelX", 1990, 2010, 2025];
  var data1 = ["Belém", 1129, 2191, 2460];  
  var data2 = ["Brasília", 1863, 3905, 4474];
  var data3 = ["Curitiba", 1829, 3462, 3953];  
  var data4 = ["Florianópolis", 503, 1049, 1233];  
  var data5 = ["Natal", 692, 1316, 1545];

  c3.generate({
    bindto: "#graph",
    data: {
      x: "labelX",
      columns: [labelX, data1, data2, data3, data4, data5]
    },
    axis: {
      x: {
        type: "categorized"
      }
    }
  });
});