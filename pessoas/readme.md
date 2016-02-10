##Pessoas

Esta pasta contém um aplicativo de cadastro de pessoas desenvolvido em Laravel. Além dos recursos básicos para adicionar, alterar, apresentar e excluir dados, o aplicativo inclui também um esquema de autenticação de usuário baseado numa funcionalidade de Laravel.

###Pre-requisitos para instalação do aplicativo

Se o seu ambiente de desenvolvimento ainda não tem o composer instalado, instale este utilitário PHP antes de prosseguir com a instalação do aplicativo. Link para o composer na versão Windows: https://getcomposer.org/Composer-Setup.exe.

A pasta contendo o aplicativo deve ser instalada dentro da pasta do servidor web (pasta www do Apache). O interpretador da linguagem PHP versão 5.5.9, ou superior, deve estar instalado no servidor web. É necessário também que as seguintes extensões de PHP estejam presentes na instalação: Mcrypt, OpenSSL, Mbstring, Tokenizer e JSON.


###Configuração

Prepare o ambiente para o aplicativo Laravel executando os seguintes comandos a partir da pasta raiz do projeto.

    composer clear-cache
    composer update
    composer dump-autoload -o

Durante a execução do comando "composer update" pode ser solicitado um token de autenticação. Se isto ocorrer, crie um a conta no [GitHub](https://github.com/) e gere o token na opção "Personal access tokens". Forneça o valor do token gerado no prompt apresentado pelo composer. Nota: não se esqueça de guardar o valor do token para seu controle.

Na pasta raiz do projeto, altere o nome do arquivo ".env.example" para ".env". Edite o arquivo informando o nome do banco de dados, usuário e senha da sua instalação.

    ...
    DB_HOST=localhost
    DB_DATABASE=nome_banco_dados
    DB_USERNAME=usuario
    DB_PASSWORD=senha
    ...

O código-fonte está configurado para ser usado com o MySQL. Se você usar o PostgreSQL, edite o arquivo config/database.php alterando o tipo de banco de dados.

    default => 'pgsql'

Execute o script para criar as tabelas do banco de dados.

    php artisan migrate

Execute o script para criar um usuário.

    php artisan db:seed

###Lançamento do aplicativo

Teste o aplicativo lançando o servidor de desenvolvimento PHP a partir da pasta raiz do projeto.
    
    php artisan serve

Acesse o aplicativo. Na tela de login informe o usuário "jsilva" e a senha "12345".
    
    localhost:8000/pessoas
    
Para acessar o aplicativo lançado via Apache use o link.

    localhost/cidades/public/pessoas
    
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
