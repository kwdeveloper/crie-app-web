##Cadastro de cidades

O script PHP contido neste projeto usa dados do IBGE para preencher uma tabela com todas as cidades do Brasil. O script preenche também uma tabela associada contendo os estados da federação.

###Configuração

No arquivo index.php, função main(), configure os parâmetros do banco de dados

    // Opção PostgreSQL
    $db = new PDO("pgsql: host=localhost; dbname=nome_banco_dados", "usuario", "senha");

    // Opção MySQL
    $db = new PDO("mysql: host=localhost; dbname=nome_banco_dados", "usuario", "senha");

####Estrutura das tabelas

    CREATE TABLE t_estados
    (
      sigla character(2) NOT NULL,
      nome character varying(30) NOT NULL,
      CONSTRAINT t_estados_pkey PRIMARY KEY (sigla)
    );

    CREATE TABLE t_cidades
    (
      codigo integer NOT NULL,
      nome character varying(80) NOT NULL,
      sigla_estado character(2) NOT NULL,
      CONSTRAINT t_cidades_pkey PRIMARY KEY (codigo),
      CONSTRAINT t_cidades_sigla_estado_fkey FOREIGN KEY (sigla_estado)
          REFERENCES t_estados (sigla) MATCH SIMPLE
          ON UPDATE NO ACTION ON DELETE NO ACTION
    )