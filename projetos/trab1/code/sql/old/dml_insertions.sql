-- describe para confirmar criaçao da tabela
-- describe <NOME DA TABELA>

-- DML - manipulaçao
-- INSERT
-- UPDATE
-- DELETE

insert into TB_USUARIO
values ('gabrielmirandat', 'root', 'Gabriel Miranda', 'SHCES Q 1105', 82574744, 'Computacao');

insert into TB_PROMOTOR
values ('promote1', 'promote1', 'Promotor Promote1', 'SHCES Q 1106', 82574745, 'Engenheria');

insert into TB_GERENTE
values ('gerente1', 'gerente1', 'Gerente Gerente1', 'SHCES Q 1107', 82574746, 'Computacao');

insert into TB_AREA
values (1, 'Computacao'),
	   (2, 'Engenharia'),
	   (3, 'Entretenimento');

insert into TB_CATEGORIA
values (1, 'Seminario'),
       (2, 'Palestra'),
       (3, 'Festa');

insert into TB_EVENTO
values (656, 'Computacao Movel', 'Aguas Longes', 10.0, 'image', 1, 1, 'promote1'),
       (657, 'Computacao na Nuvem', 'Aguas Lindas', 0.0, 'image', 1, 2, 'promote1'),
 	   (658, 'Internet das Coisas', 'Aguas Claras', 20.0, 'image', 2, 2, 'promote1'),
	   (659, 'Festas no Bosque', 'Brasilia', 30.0, 'image', 3, 3, 'promote1');

insert into TB_EVENTO_PROMOTOR
values (656, 'promote1', 16-06-10),
	   (657, 'promote1', 16-07-11),
	   (658, 'promote1', 16-08-12),
	   (659, 'promote1', 16-09-13);

insert into TB_EVENTO_USUARIO
values (656, 'gabrielmirandat');

insert into TB_CHAVE
values (575567, 'gerente1');
