/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

var ELEMENTOS_POR_PAGINA = 7;
var app = angular.module("main", ["ui.bootstrap"]);

/* */
app.controller("control_1", function($scope, Lista) {
  // Inicializações
  $scope.elementosPorPagina = ELEMENTOS_POR_PAGINA;
  $scope.pagina = 1;
  $scope.lista = Lista.elementos();
  $scope.numeroItens = Lista.tamanho();

  //
  $scope.incluir = function() {
    $scope.numeroItens = Lista.incluir();
  }

  //
  $scope.excluir = function() {
    $scope.numeroItens = Lista.excluir();
  }
});

/* */
app.factory("Lista", function() {
  var lista = [];

  // criar um "construtor"
  for(var i = 1; i <= 100; i++) {
    lista.push(i);
  }

  //
  var funcoes = {
    elementos: function() {
      return lista;
    },

    tamanho: function() {
      return lista.length;
    },

    incluir: function() {
      lista.push(lista.length + 1);
      return lista.length;
    },

    excluir: function() {
      lista.pop();
      return lista.length;
    }
  }

  return funcoes;
});

/* */
app.filter("filtro", function() {
  return function(lista, pagina) {
    var inicio = (pagina - 1)*ELEMENTOS_POR_PAGINA;
    return lista.slice(inicio, inicio + ELEMENTOS_POR_PAGINA);
  }
});