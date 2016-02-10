/*
 * NOTA
 *
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos
 * web com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e
 * Laravel"
 * Wilson Kawano
 *
 * O código-fonte pode ser livremente usado desde que o conteúdo da presente
 * NOTA não seja suprimido
 */

/* Application */
var app = angular.module("notes", ["ui.bootstrap"]);

/* Serviço - factory */
app.factory("NotesFactory", ['$http', NotesFactory]);

/*** ***/
function NotesFactory($http) {
  var factory = {};

  /* */
  factory.delete = function(idNota) {
    return $http({method: "DELETE", url: "sql.php", data: {"id": idNota}});
  }

  /* */
  factory.get = function(parametros) {
    return $http.get("sql.php", {params: parametros});
  }

  /*  */
  factory.save = function(texto) {
    return $http.post("sql.php", {"texto": texto});
  };

  /*  */
  factory.update = function(idNota, texto) {
    return $http.put("sql.php", {"id": idNota, "texto": texto});
  }

  return factory;
};


/* Controlador */
app.controller("notesController", ["$scope", "NotesFactory", notesController]);

/*** ***/
function notesController($scope, NotesFactory) {
  $scope.ELEMENTOS_POR_PAGINA = 6;
  $scope.notas = [];
  $scope.numeroItens = 0;
  $scope.pagina = 1;
  $scope.showBtnDelUpd = false;
  $scope.texto = "Digite seu texto ...";

  /* */
  $scope.clear = function() {
    $scope.texto = "";
    $scope.mensagem = "";
    $scope.showBtnDelUpd = false;
  };

  /* */
  $scope.delete = function() {
    $scope.showBtnDelUpd = false;

    if (idNota < 0) {
      $scope.mensagem = "Nota inexistente";
      return;
    }

    var onSuccess = function() {
      $scope.mensagem = "Excluiu nota com sucesso ...";
      $scope.texto = "";
      $scope.get();
    };

    if (confirm("Quer mesmo excluir a nota?")) {
      $scope.tratarSql(NotesFactory.delete(idNota), onSuccess, "Erro ao tentar excluir nota ...");
    }
  };

  /* */
  $scope.get = function() {
    // Função executada se consulta for bem sucedida
    var onSuccess = function(dados) {
      // ATENCAO: nesta posição mantém conteúdo anterior se ocorrer erro
      $scope.notas = [];

      // ATENCAO: testar se data[1], atribui-lo a nova var e usar
      for (var i=0; i<dados.dados.length; i++) {
        var dd = new Date(dados.dados[i].tstamp.replace(" ", "T"));
        $scope.notas.push({id: dados.dados[i].id, tstamp: dd.toLocaleString(), texto: dados.dados[i].texto});
      }

      $scope.numeroItens = dados["num_elementos"];
    };

    var parametros = {};
    parametros["pagina"] = $scope.pagina;
    parametros["elementosPorPagina"] = $scope.ELEMENTOS_POR_PAGINA;

    $scope.tratarSql(NotesFactory.get(parametros), onSuccess, "Erro ao tentar recuperar notas do banco de dados");
  };

  /* */
  $scope.save =  function() {
    $scope.mensagem = "";
    $scope.texto.trim();

    if ($scope.texto.length <= 0) {
      return;
    }

    var onSuccess = function() {
      $scope.mensagem = "Incluiu nota com sucesso ...";
      $scope.get();
    };

    $scope.tratarSql(NotesFactory.save($scope.texto), onSuccess, "Erro na inclusão de nota ...");
  };

  /* */
  $scope.select = function(id, texto) {
    $scope.mensagem = "";
    $scope.showBtnDelUpd = true;
    $scope.texto = texto;
    idNota = id;
  };

  /* */
  $scope.textSize = function() {
    return $scope.texto.length;
  };

  /* */
  $scope.tratarSql = function(promise, onSuccess, errorMsg) {
    promise.success( function(data, status, headers, config) {
      if (data.ok == false) {
        $scope.mensagem = errorMsg;
        return false;
      }

      onSuccess(data);
      return true;
    });

    promise.error( function(data, status, headers, config) {
      $scope.mensagem = errorMsg;
      return false;
    });
  };

  /* */
  $scope.update = function() {
    $scope.mensagem = "";
    $scope.showBtnDelUpd = false;

    if (idNota < 0) {
      $scope.mensagem = "ERRO: nota inexistente";
      return;
    }

    var onSuccess = function() {
      $scope.mensagem = "Atualizou nota com sucesso ...";
      $scope.get();
    };

    $scope.tratarSql(NotesFactory.update(idNota, $scope.texto), onSuccess, "Erro ao tentar atualizar nota ...");
  };

  /* */
  $scope.$watch("numeroItens + pagina", function() {
    $scope.get();
  });
}