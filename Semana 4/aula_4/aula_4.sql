CREATE TYPE options_plan AS enum('BRONZE','PRATA','OURO')

CREATE TABLE users (
  id serial primary KEY,
  name varchar(150) NOT NULL,
  email varchar(100)UNIQUE NOT NULL,
  password varchar(32) NOT NULL,
  type_plan options_plan NOT NULL,
  created_at timestamp WITH time zone DEFAULT  NOW()
)

CREATE TABLE exercises(
id serial primary KEY,
  name varchar(100),
  created_at timestamp WITH time zone DEFAULT  NOW()
)	

CREATE TABLE students(
  id serial PRIMARY KEY,
  user_id integer NOT NULL,
  name varchar(150) NOT NULL,
  email varchar(100) NOT NULL,
  contact varchar(20) NOT NULL,
  date_birth date,
  created_at timestamp WITH time zone DEFAULT  NOW(),
  FOREIGN KEY (user_id) REFERENCES users(id)
  )
  
CREATE TABLE student_adress(
	  id serial PRIMARY KEY,
	  student_id integer NOT NULL,
	  cep varchar(10) NOT NULL,
	  street varchar(100) NOT NULL,
	  number_house varchar(10) NOT NULL,
	  complement varchar(50),
	  neighborhood varchar(30) NOT NULL,
	  city varchar(30)NOT NULL,
	  created_at timestamp WITH time zone DEFAULT  NOW(),
	  FOREIGN KEY (student_id) REFERENCES students(id)
 )
  
 SELECT * FROM student_adress WHERE student_id = 4
  
 SELECT * FROM exercises
	ORDER BY name DESC

SELECT * FROM exercises
WHERE EXTRACT (MONTH FROM created_at)= 8
ORDER BY created_at ASC