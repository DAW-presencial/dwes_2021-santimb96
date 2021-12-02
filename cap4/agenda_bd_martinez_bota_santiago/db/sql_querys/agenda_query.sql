create
database agendabd;

create table contacto
(
    `nombre` varchar(20) not null,
    `primer_apellido` varchar(20) not null,
    `segundo_apellido` varchar(20) not null,
    `tlf`    varchar(9) primary key
);

insert into contacto(nombre, primer_apellido, segundo_apellido, tlf)
values ('admin', 'adminer', 'admination', '722786465');

/**
  SI SE QUIERE BORRAR LA BASE DE DATOS CREADA:
 */
drop database agendabd;
