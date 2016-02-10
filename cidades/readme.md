## Cidades

Esta pasta contém um aplicativo desenvolvido em Laravel para mostrar a localização geográfica de todas as cidades do Brasil. As informações referentes às cidades são dados do IBGE. A apresentação da localização geográfica de uma cidade baseia-se numa API do Google Maps.

O código-fonte do aplicativo é parte integrante do livro [Crie aplicativos web com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel](http://lcm.com.br) de autoria de Wilson Kawano. O aplicativo pode ser livremente usado desde que o conteúdos das NOTAS presentes nos códigos-fonte não sejam suprimidos.

###Pre-requisitos para instalação do aplicativo

Se o seu ambiente de desenvolvimento ainda não tem o composer instalado, instale este utilitário PHP antes de prosseguir com a instalação do aplicativo. Link para o composer na versão Windows: https://getcomposer.org/Composer-Setup.exe.

A pasta contendo o aplicativo deve ser instalada dentro da pasta do servidor web (pasta www do Apache). O interpretador da linguagem PHP versão 5.5.9, ou superior, deve estar instalado no servidor web. É necessário também que as seguintes extensões de PHP estejam presentes na instalação: Mcrypt, OpenSSL, Mbstring, Tokenizer e JSON.

###Configuração

Prepare o ambiente para o aplicativo Laravel executando os seguintes comandos a partir da pasta raiz do projeto.

    composer clear-cache
    composer update
    composer dump-autoload -o

Durante a execução do comando "composer update" pode ser solicitado um token de autenticação. Se isto ocorrer, crie uma conta no [GitHub](https://github.com/) e gere o token na opção "Personal access tokens". Forneça o valor do token gerado no prompt apresentado pelo composer. Nota: não se esqueça de guardar o valor do token para seu controle.
    
Na pasta raiz do projeto, altere o nome do arquivo ".env.example" para ".env". Edite o arquivo informando o nome do banco de dados, usuário e senha da sua instalação.

    ...
    DB_HOST=localhost
    DB_DATABASE=nome_banco_dados
    DB_USERNAME=usuario
    DB_PASSWORD=senha   
    ...

O código-fonte está configurado para ser usado com o MySQL. Se você usar o PostgreSQL, edite o arquivo config/database.php alterando o tipo de banco de dados.

    default => 'pgsql'

Altere o arquivo CidadeTableSeeder.php, selecionando a opção para PostgreSQL.

    // MySQL
    // $arr_estados[mb_strtoupper(iconv("ISO-8859-1", "UTF-8", $row->nome), "UTF-8")] = $row->sigla;

    // PostgreSQL
    $arr_estados[mb_strtoupper($row->nome, "UTF-8")] = $row->sigla;
    
Para preencher as tabelas de estados e de cidades, edite os arquivos EstadoTableSeeder.php e CidadeTableSeeder.php localizados na pasta database/seeds. Informe o tipo de banco de dados (mysql ou pgsql), nome do banco de dados, nome do usuário e senha do seu ambiente de desenvolvimento. Escolha uma das opções abaixo (MySQL ou PostgreSQL).

    $db = new PDO("mysql: host=localhost; dbname=nome_banco_dados", "usuario", "senha");
    $db = new PDO("pgsql: host=localhost; dbname=nome_banco_dados", "usuario", "senha");

Execute o script para criar as tabelas do banco de dados.

    php artisan migrate
    
Execute o script para preencher as tabelas.

    php artisan db:seed
    
###Lançamento do aplicativo

Teste o aplicativo lançando o servidor de desenvolvimento PHP a partir da pasta raiz do projeto.
    
    php artisan serve

Acesse o aplicativo.
    
    localhost:8000/cidades
    
Para acessar o aplicativo lançado via Apache use o link.

    localhost/cidades/public/cidades

Note que a declaração contida no arquivo resources/views/main.blade.php faz referência a um link válido somente quando o aplicativo é lançado no servidor de desenvolvimento PHP. Altere o código de acordo com a forma de lançamento do aplicativo.

    window.location.replace("http://localhost:8000/cidades/" + ...)

## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
