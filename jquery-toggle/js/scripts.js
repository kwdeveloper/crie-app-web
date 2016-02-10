/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

$(document).ready(function() {
  $("#btnToggle").click( function() {
    toggleH2();
  });

  $("#btnHide").click( function() {
    $("h2").hide(1000);
  });
});

/* */
function toggleH2(arrH2) {
  if(arrH2 === undefined) {
    arrH2 = [];

    $("h2").each(function(index, h2) {
      arrH2.push(h2);
    });
  }

  if(arrH2.length > 1) {
    $(arrH2[0]).toggle(1000, function() {
      toggleH2(arrH2.slice(1, arrH2.length));
    });
  }
  else if(arrH2.length > 0) {
    $(arrH2[0]).toggle(1000);
  }
}
