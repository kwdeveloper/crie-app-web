/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

var app = angular.module('main', []);

app.controller('mainController', ['$scope', mainController]);

/* */
function mainController($scope) {
  $scope.notas = [];
  $scope.texto = "";

  $scope.textSize = function() {
    return $scope.texto.length;
  };

  $scope.clear = function() {
    $scope.texto = "";
  };

  $scope.save =  function() {
    $scope.texto.trim();  // = trim($scope.texto);

    if ($scope.texto.length <= 0)
    return;

    var d = new Date();
    $scope.notas.push({data: d.toLocaleString(), msg: $scope.texto});
  };
}
