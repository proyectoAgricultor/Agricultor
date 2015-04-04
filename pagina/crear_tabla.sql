/* Este escript debe de ser ejecutado en Mysql directamente y sobre una base de datos creada. */


/*Script para modulo de pagina  */
create table pagina(
	id int(15) auto_increment not null,
	titulo varchar(100) not null,
	informacion varchar(8000) not null,
	catalogo int(1) not null,
	fecha date not null,
	estatus int(1) not null,
	primary key(id),
	unique key(titulo)
	
);

insert into modulo values('pagina','1');
/*finaliza script del modulo*/

/* ---------------------------------------------------------------------
-----------------------------------------*/

