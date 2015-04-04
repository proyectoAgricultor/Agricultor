/* Este escript debe de ser ejecutado en Mysql directamente y sobre una base de datos creada. */


/*si hay modulo de seguridad de solucionclic ejecutar este script */
create table menu(
	id int(15) auto_increment not null,
	titulo varchar(100) not null,
	url varchar(250) not null,
	menu_padre int(15),
	posicion int(2) not null,
	publico int(1) not null,
	acceso int(15),
	estatus int(1) not null,
	primary key(id),
	FOREIGN KEY (menu_padre) REFERENCES menu(id) ON DELETE CASCADE,
	FOREIGN KEY (acceso) REFERENCES acceso(id) ON DELETE CASCADE
);
/*finaliza script si hay modulo de seguridad de solucionclic*/

/* ---------------------------------------------------------------------
-----------------------------------------*/

/*si no se posee modulo de seguridad de solucionclic ejecutar este script*/
create table menu(
	id int(15) auto_increment not null,
	titulo varchar(100) not null,
	url varchar(250) not null,
	menu_padre int(15),
	posicion int(2) not null,
	publico int(1) not null,
	acceso int(15),
	estatus int(1) not null,
	primary key(id),
	FOREIGN KEY (menu_padre) REFERENCES menu(id) ON DELETE CASCADE
);
/*finaliza script si no se tiene modulo de seguridad de solucionclic */