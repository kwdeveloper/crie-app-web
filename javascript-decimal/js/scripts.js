/*
 * O conteúdo deste arquivo é parte integrante do livro "Crie aplicativos web 
 * com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel"
 * Wilson Kawano
 */

function printTeste() {
    var f = 0.1;
    document.write("Float: ", f.toPrecision(21));

    document.write("<br>");

    var d1 = new Decimal(0.1);
    document.write("Decimal: ", d1.toFormat(" ", 21));
}
