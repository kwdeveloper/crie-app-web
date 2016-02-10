/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

/* Objeto base */
function VeiculoAutomotor(marca_, modelo_) {
  this.marca = marca_;
  this.modelo = modelo_;
};

VeiculoAutomotor.prototype.getDados = function() {
  return [this.marca, this.modelo];
};

/* Objeto derivado */
function Caminhao(marca_, modelo_, carga_) {
  VeiculoAutomotor.call(this, marca_, modelo_);
  this.carga = carga_;
}

Caminhao.prototype = Object.create(VeiculoAutomotor.prototype);
Caminhao.prototype.constructor = Caminhao;

Caminhao.prototype.prt = function() {
  console.log(this.getDados(), this.carga);
};

/* Instâncias */
var caminhao1 = new Caminhao("FNM", "D-1000", 8100);
var caminhao2 = new Caminhao("Chevrolet", "Brasil", 6500);

if (caminhao1.getDados === caminhao2.getDados)
  console.log("Função getDados() é a mesma em todos os objetos");