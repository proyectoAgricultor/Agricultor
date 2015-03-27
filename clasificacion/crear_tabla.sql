/* Este escript debe de ser ejecutado en Mysql directamente y sobre una base de datos creada. */


/*creacion de la tabla para crear accesos  */
create table clasificacion(
	id int(15) auto_increment not null,
	titulo varchar(100) not null,
	estatus int(1) not null,
	primary key(id)
);

/*finaliza script si hay modulo de seguridad de solucionclic*/

/* ---------------------------------------------------------------------
-----------------------------------------*/

