/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

$().ready(function() {
  var data1 = ["PC",         50, 45, 44, 40, 30, 28, 25];
  var data2 = ["Notebook",   15, 20, 25, 30, 25, 20, 20];
  var data3 = ["Tablet",      2,  5,  5, 10, 12, 15, 20];
  var data4 = ["Smartphone",  1,  3,  5,  7, 10, 10, 13];

  c3.generate({
    bindto: "#graph",
    data: {
      columns: [data1, data2, data3, data4]
    },
  });
});