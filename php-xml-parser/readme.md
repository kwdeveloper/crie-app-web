##XML Parser

O script contido nesta pasta é similar ao do projeto php-cadastrar-cidades: preenchimento de uma tabela de banco de dados com todas as cidades do Brasil a partir de dados do IBGE. A diferença é que a origem dos dados é um arquivo XML que, além dos dados básicos, contém também informações sobre a localização geográfica das cidades.

O script depende da tabela com os estados da federação, criada no projeto php-cadastrar-cidades.

###Configuração

No arquivo main.php, função insert_dados_cidades_into_db(), configure o nome do banco de dados, usuário e senha do seu ambiente de desenvolvimento. Selecione uma das funções, insert_data_pg() ou insert_data_mysql(), de acordo com o tipo de banco de dados.

Na função insert_data_pg() ou insert_data_mysql(), edite o código informando o nome da tabela que será usada para cadastrar as cidades.

###Tabela

    CREATE TABLE t_cidades_2
    (
      codigo integer NOT NULL,
      nome character varying(80) NOT NULL,
      sigla_estado character(2) NOT NULL,
      longitude double precision NOT NULL,
      latitude double precision NOT NULL,
      altitude real NOT NULL,
      CONSTRAINT t_cidades_2_pkey PRIMARY KEY (codigo),
      CONSTRAINT t_cidades_2_sigla_estado_fkey FOREIGN KEY (sigla_estado)
          REFERENCES t_estados (sigla) MATCH SIMPLE
          ON UPDATE NO ACTION ON DELETE NO ACTION
    );
