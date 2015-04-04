/* Este escript debe de ser ejecutado en Mysql directamente y sobre una base de datos creada. */


/*creacion de la tabla para crear accesos  */
create table acceso(
	id int(15) auto_increment not null,
	titulo varchar(100) not null,
	palabra varchar(50) not null,
	descripcion varchar(250),
	estatus int(1) not null,
	primary key(id),
	unique key(palabra)
);
create table rol(
	id int(15) auto_increment not null,
	titulo varchar(100) not null,
	descripcion varchar(250) not null,
	estatus int(1) not null,
	primary key(id),
	unique key(titulo)
);
create table rol_acceso(
	id_rol int(15) not null,
	id_acceso int(15) not null,
	estatus int(1) not null,
	primary key(id_rol, id_acceso),
	FOREIGN KEY (id_rol) REFERENCES rol(id) ON DELETE CASCADE,
	FOREIGN KEY (id_acceso) REFERENCES acceso(id) ON DELETE CASCADE
);
/*finaliza script si hay modulo de seguridad de solucionclic*/

/* ---------------------------------------------------------------------
-----------------------------------------*/

/*si no se posee modulo de seguridad de solucionclic ejecutar este script*/
create table rol(
	id int(15) auto_increment not null,
	titulo varchar(100) not null,
	url varchar(250) not null,
	menu_padre int(15),
	posicion int(2) not null,
	publico int(1) not null,
	acceso int(15) not null,
	estatus int(1) not null,
	primary key(id),
	FOREIGN KEY (menu_padre) REFERENCES menu(id) ON DELETE CASCADE
);
/*finaliza script si no se tiene modulo de seguridad de solucionclic */