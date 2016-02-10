/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

/* */
$(document).ready(function() {
  $("#btn-submit").click(function(event) {
    sendForm();
  });
});

/* */
function jsonToTable(response) {
  var text = "<table class='table table-striped'>";

  for (var lin = 0; lin < response.length; lin++) {
    // Cabeçalho
    if (lin == 0) {
      text += "<tr>";

      for (col in response[lin]) {
        text += "<th>" + col + "</th>";
      }

      text += "</tr>";
    }

    // Cidade corresponde a uma linha da tabela
    text += "<tr>";

    // Cada propriedade da cidade corresponde a uma coluna da tabela
    for (col in response[lin]) {
      text += "<td>" + response[lin][col] + "</td>";
    }

    text += "</tr>";
  }

  text += "</table>";
  $("#resultado").replaceWith('<div id="resultado">' + text + '</div>');
}

/* */
function sendForm() {
  // O campo de entrada de dados da página HTML armazenado num array
  var dados = {cidade: $("#cidade").val()};
 
  // Esta função será executada se o servidor retornar OK 
  var successFunc = function(dados) {
    console.log(dados);
    jsonToTable(dados);
  };
  
  // Esta função será executada se o servidor retornar erro
  var errorFunc = function (jqXHR, textStatus, errorThrown) {
    console.log("NOK: (" + textStatus + ") (" + errorThrown + ")");
  };

  // Solicitação assíncrona
  $.ajax({
    url: "search_cidades.php",
    type: "get",
    dataType: "json",
    data: dados,
    success: successFunc,
    error: errorFunc
  });
}
