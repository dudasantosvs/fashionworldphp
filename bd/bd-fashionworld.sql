CREATE DATABASE fashionworld0;
use fashionworld0;

CREATE TABLE users(
id int NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE trends(
id int NOT NULL AUTO_INCREMENT,
  category_id int NOT NULL,
  name varchar(255) NOT NULL,
  abstract varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
   FOREIGN KEY (category_id) REFERENCES categories (id)
);

CREATE TABLE faqs (
 id int NOT NULL AUTO_INCREMENT,
  question varchar(255) NOT NULL,
  answer varchar(255) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE categories (
id int NOT NULL AUTO_INCREMENT,
  name varchar(45) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO categories VALUES (1,'Primavera'),(2,'Verão'),(3,'Outono'),(4,'Inverno');

INSERT INTO trends VALUES (1,3,'Saia Metalizada','Domine o desenvolvimento web completo em um único curso.'),(2,1,'Corset','Transforme dados em insights poderosos com ciência de dados.'),(3,2,'Mini saia','Proteja dados e sistemas contra ameaças com segurança da informação.'),(4,4,'Cropped amarração','Crie máquinas inteligentes e revolucione o futuro com IA.');