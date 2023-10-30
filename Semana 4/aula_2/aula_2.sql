/*DDL*/

/*Criar tipos para impedir que outro tipo de plano seja selecionado*/
CREATE TYPE options_plan AS enum('BRONZE','PRATA','OURO')

/*Criar tabela*/
CREATE TABLE users (
    id serial PRIMARY KEY,
    name varchar(200) NOT NULL,
    email varchar(200)NOT NULL unique,
    type_plan options_plan NOT NULL,
    is_verify boolean DEFAULT FALSE NOT NULL,
    date_birth date,
    bio text,
    followers integer DEFAULT 0 NOT NULL,
    created_at timestamp WITH time zone DEFAULT now()
)

/* Adicionar uma coluna na tabela*/
ALTER TABLE users ADD COLUMN points integer DEFAULT 0

/* Adicionar várias colunas na tabela*/
ALTER TABLE users 
ADD COLUMN points2 integer DEFAULT 0, 
ADD COLUMN points3 integer DEFAULT 0;

/* Deletar tabela*/
DROP TABLE users;