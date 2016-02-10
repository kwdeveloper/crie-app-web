##Pesquisa de cidades

Este aplicativo permite executar uma pesquisa numa tabela contendo todas as cidades do Brasil. A tabela de banco de dados é gerada com o script do projeto php-cadastrar-cidades ou php-xml-parser.

###Configuração

Ajuste a configuração para o seu ambiente, editando o arquivo search_cidades.php: informe o tipo de banco de dados (MySQL ou PostgreSQL), o nome do banco de dados, usuário e senha.

    // Opção MySQL
    $db = new PDO("mysql: host=localhost; dbname=nome_banco_dados", "usuario", "senha");

    // Opção PostgreSQL
    $db = new PDO("pgsql: host=localhost; dbname=nome_banco_dados", "usuario", "senha");

No mesmo arquivo informe o nome da tabela do banco de dados (EX: cidades).
    
    $tbl = $db->query("select * from cidades where nome like '$parametro';");