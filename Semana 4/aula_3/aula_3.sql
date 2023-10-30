/*DML*/

/* Inserir dados na tabela */
INSERT INTO users 
(
	name,
	email,
	type_plan,
	date_birth,
	bio
)
VALUES 
(
	'Maria', 'maria@gmail.com', 'PRATA','1999-02-21', '....a'
)

/* Atualizar dados na tabela - de acordo com o id*/
UPDATE users 
	SET 
	type_plan = 'OURO',
	is_verify =  true
WHERE id = 3

/* Atualizar dados na tabela - de acordo com o plano e se também for verificado*/
UPDATE users 
	SET type_plan = 'OURO'
WHERE type_plan = 'PRATA' AND is_verify = true

/*Deletar linha da tabela*/
DELETE FROM users WHERE id=1

/*Exemplo 'soft delete'*/
ALTER TABLE users
ADD COLUMN deleted_at timestamp

UPDATE users
SET deleted_at = now()
WHERE id = 3



/*DQL*/

/* Listar todos os dados */
SELECT * FROM users

/* Listar informações específicas */
SELECT id, name, email FROM users

/* Listar informações com condição */
SELECT name FROM users WHERE is_verify = true

/* Listar informações usando operador OR */
SELECT id, name, email, is_verify, type_plan FROM users 
	WHERE is_verify = TRUE OR type_plan = 'OURO' 
	