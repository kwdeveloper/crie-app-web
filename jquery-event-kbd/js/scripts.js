/*
 * Parte integrante do livro "Crie aplicativos web com HTML, CSS, JavaScript,
 * PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

$().ready(function() {
  var tamanho = 0;

  /* */
  function showCxTextoSize() {
    $("#cx-texto-size").text($("#cx-texto").val().length + " caracteres");
  }

  /* */
  $("#cx-texto").on("keyup", function() {
    showCxTextoSize();
  });

  /* */
  $("#btn-italico").on("click", function() {
    $("#cx-texto").toggleClass("italico");
  });

  /* */
  $("#btn-negrito").on("click", function() {
    $("#cx-texto").toggleClass("negrito");
  });

  /* */
  $("#btn-tamanho").on("click", function() {
    if (tamanho < 2)
      tamanho++;
    else
      tamanho = 0;

    $("#cx-texto").removeClass("fonte_normal");
    $("#cx-texto").removeClass("fonte_medio");
    $("#cx-texto").removeClass("fonte_grande");

    if (tamanho == 0) {
      $("#cx-texto").addClass("fonte_normal");
    }
    else if (tamanho == 1) {
      $("#cx-texto").addClass("fonte_medio");
    }
    else if (tamanho == 2) {
      $("#cx-texto").addClass("fonte_grande");
    }
  });

  //
  showCxTextoSize();
});