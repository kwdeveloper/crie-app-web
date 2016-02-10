/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

/* Objeto base */
var VeiculoAutomotor = new Class({
  initialize: function(marca_, modelo_) {
    this.marca = marca_;
    this.modelo = modelo_;
  },

  getDados: function() {
    return [this.marca, this.modelo];
  }
});

/* Objeto derivado */
var Caminhao = new Class({
  Extends: VeiculoAutomotor,

  initialize: function(marca_, modelo_, carga_) {
    this.parent(marca_, modelo_);
    this.carga = carga_;
  }
});

// Instâncias do objeto derivado
var caminhao1 = new Caminhao("Mercedes", "1113", 6000);
console.log(caminhao1.getDados(), caminhao1.carga);

var caminhao2 = new Caminhao("Scania", "76", 15000);

if (caminhao1.getDados === caminhao2.getDados)
  console.log("Função getDados() é a mesma em todos os objetos");