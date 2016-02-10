/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

var lampOn = false;

/* */
function btnLampClicked() {
	var imagem = document.getElementById('imgLamp');
	lampOn = !lampOn;

	if(lampOn) {
		imagem.src = 'img/lamp_on.png';
	}
	else {
		imagem.src = 'img/lamp_off.png';
	}
}
