// A tenir en compte que tots els noms és web: usuari, contrasenya i bbdd. 

// Entrar com a root a la base de dades mysql
mysql -u root -p

// creem la base de dades
CREATE DATABASE llcomp;


// Creem usuari per administrar la bbdd
CREATE USER 'compra'@'localhost' IDENTIFIED BY 'Compra01.';


// Donem permisos a l´usuari sobre la bbdd
GRANT ALL PRIVILEGES ON llcomp.* TO 'compra'@'localhost';


// Carreguem els permisos
FLUSH PRIVILEGES;


// Sortim de Mysql
EXIT


// Entrem com a usuari web i contrasenya web (per comprovar que tot està correcte)
mysql -u web -p


// Entrem a la base de dades 
USE WEB;


// Creem la taula ARTICLE amb els camps
CREATE TABLE article (nom varchar(20) not null,id int auto_increment primary key,  actiu bit default 0);

// Carreguem dades del fitxer csv
 load data infile "/var/www/llcompra/html/articles.csv" into table article columns terminated by ',' lines terminated by '\n';


// Canviar valors per posar les taules d inici

DELETE FROM usuaris where ninot < 49;

UPDATE article SET id=46 where nom = "Col";


INSERT INTO usuaris (nom, passw, ninot, grup) VALUES ("NOM", "PASSW", 00, "PRO");

//Copia de seguretat i restauració  de bbdd 

mysqldump -u web -p --opt web > bkp-db-web.sql
mysql -u web -p web < bkp-db-web.sql

