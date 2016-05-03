##Notas

Esta pasta contém um aplicativo de cadastro de notas composto de uma interface de usuário desenvolvida em [AngularJS](https://angularjs.org/) e um backend codificado em PHP. Além dos recursos básicos para adicionar, alterar, apresentar e excluir anotações, o aplicativo inclui também um esquema de autenticação de usuário baseado numa API do Facebook.

O código-fonte do aplicativo é parte integrante do livro [Crie aplicativos web com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel](http://www.lcm.com.br/site/#livros/detalhesLivro/crie-aplicativos-web-com-html--css--javascript--php--postgresql--bootstrap--angularjs-e-laravel.html) de autoria de Wilson Kawano. O aplicativo pode ser livremente usado desde que os conteúdos das NOTAS presentes nos códigos-fonte não sejam suprimidos.

###Configuração
No arquivo sql.php, função executeSql(), configure o nome do banco de dados, usuário e senha do seu ambiente de desenvolvimento.

    $pdo = new PDO("pgsql: host=localhost; dbname=nome_banco_dados", "usuario", "senha");

Nas declarações de comandos SQL da função main(), configure o nome da tabela de acordo com o seu ambiente de desenvolvimento.

    $sql = "delete from t_notas_2 where id = :par1";
    ...

Acesse a sua conta no Facebook e crie um aplicativo: selecione a sequência de opções "Developer – Manage Apps – My Apps – Add a New App – Website".

Clique no botão “Create App ID”. Preencha o link do site: por exemplo, localhost/angular-notes-auth.

Volte à opção "My Apps", selecione o aplicativo criado, e anote o identificador, a versão da API e a chave secreta do aplicativo, mostrados nos campos "App ID", "API Version" e "App Secret", respectivamente.

Edite o arquivo auth.php alterando o o identificador e a chave secreta de acordo com os valores obtidos no Facebook.

    function isLogged() {
      // Inicializações para autenticação
      // Crie um aplicativo no Facebook e configure aqui o ID e a chave secreta obtidos no site
      $id = '987654321012345';
      $secret = 'aeiou12345qwert98765asdfg1234567';
    ...

Edite o arquivo js/scripts.js alterando o o identificador de acordo com o valor obtido no Facebook.

    app.run(["$window", function($window) {
      // Parâmetros para configurar a autenticação //
      $window.fbAsyncInit = function() {
        // Inicialização do aplicativo
        FB.init({
          appId      : '987654321012345',  // configure aqui o ID do aplicativo cadastrado no Facebook
    ...

###Estrutura da tabela do banco de dados

    CREATE TABLE t_notas_2
    (
      id serial NOT NULL,
      tstamp timestamp without time zone DEFAULT now(),
      texto character varying(512) NOT NULL,
      CONSTRAINT t_notas_2_pkey PRIMARY KEY (id)
    )