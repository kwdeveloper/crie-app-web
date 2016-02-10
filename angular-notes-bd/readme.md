##Notas

Esta pasta contém um aplicativo de cadastro de notas (anotações) composto de uma interface de usuário desenvolvida em [AngularJS](https://angularjs.org/) e um backend codificado em PHP.

O código-fonte do aplicativo é parte integrante do livro [Crie aplicativos web com HTML, CSS, JavaScript, PHP, PostgreSQL, Bootstrap, AngularJS e Laravel](http://lcm.com.br/) de autoria de Wilson Kawano

###Configuração
No arquivo sql.php, função executeSql(), configure o nome do banco de dados, usuário e senha do seu ambiente de desenvolvimento.

    $pdo = new PDO("pgsql: host=localhost; dbname=nome_banco_dados", "usuario", "senha");

Nas declarações de comandos SQL da função main(), configure o nome da tabela de acordo com o nome que você escolheu.

    ...
    $sql = "delete from t_notas_2 where id = :par1";
    ...

###Tabela

    CREATE TABLE t_notas_2
    (
      id serial NOT NULL,
      tstamp timestamp without time zone DEFAULT now(),
      texto character varying(512) NOT NULL,
      CONSTRAINT t_notas_2_pkey PRIMARY KEY (id)
    )