create schema if not exists ESunBoPP;

drop table TB_USUARIO,
           TB_PROMOTOR,
           TB_GERENTE,
           TB_CATEGORIA,
           TB_AREA,
           TB_EVENTO,
           TB_EVENTO_USUARIO,
           TB_EVENTO_PROMOTOR,
           TB_CHAVE;	

-- sem trato de repetiçao de login
create table if not exists TB_USUARIO (
login varchar( 30 ) ,
senha varchar( 15 ) not null ,
nome varchar( 100 ) not null ,
endereco varchar( 100 ) not null ,
telefone integer not null,
area varchar( 30 ),
primary key(login)
);

create table if not exists TB_PROMOTOR (
login varchar( 30 ) ,
senha varchar( 15 ) not null ,
nome varchar( 100 ) not null ,
endereco varchar( 100 ) not null ,
telefone integer not null,
area varchar( 30 ) not null,
primary key(login)
);

create table if not exists TB_GERENTE (
login varchar( 30 ) ,
senha varchar( 15 ) not null ,
nome varchar( 100 ) not null ,
endereco varchar( 100 ) not null ,
telefone integer not null ,
area varchar( 30 ) not null ,
primary key(login)
);

create table if not exists TB_AREA (
id integer ,
nome varchar( 25 ) not null ,
primary key(id)
);

create table if not exists TB_CATEGORIA (
id integer ,
nome varchar( 25 ) not null ,
primary key(id)
);

create table if not exists TB_EVENTO (
id integer ,
nome varchar( 100 ) not null ,
endereco varchar( 100 ) not null ,
preco double not null,
imagem longblob not null,
idArea integer references TB_AREA(id),
idCategoria integer references TB_CATEGORIA(id),
loginPromotor varchar( 10 ) references TB_PROMOTOR(login),
primary key(id, idCategoria, loginPromotor)
);

create table if not exists TB_EVENTO_PROMOTOR (
idEvento integer references TB_EVENTO(id) ,
loginPromotor varchar( 10 ) references TB_PROMOTOR(login) ,
data integer not null ,
primary key(idEvento, loginPromotor)
);

create table if not exists TB_EVENTO_USUARIO (
idEvento integer references TB_EVENTO(id),
loginUsuario varchar( 10 ) references TB_USUARIO(login),
primary key(idEvento, loginUsuario)
);

create table if not exists TB_CHAVE (
num integer  ,
loginGerente varchar( 10 ) references TB_GERENTE(login) ,
primary key(num)
);

-- p/ adicionar no database chamado mysql do meu pc :.> mysql -u root -p ESunBoPP < ddl_tables_creation.sql
-- p/ rodar server php local :.> php -S localhost:8080
-- p/ ver no browser :.> http://localhost:8080/

--  create a PDO connection to database, and use 
--  a general "SELECT" statement to retrieve data. 
--  Lastly, we loop through each row to print content.