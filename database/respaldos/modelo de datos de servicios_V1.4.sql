ojo falta:
usuarios_servicios le hace falta los horarios y lugares donde puede trabajar el usuario-proveedor, creo que tenemos que crear tablas para eso.

definir con oscar

CREATE TABLE estatus
(
  id serial,
  descripcion character varying(255),
  CONSTRAINT unique_estatus_id UNIQUE (id)
)
WITH (
  OIDS=TRUE
);


CREATE TABLE categoria
(
  id serial,
  descripcion character varying(255),
  CONSTRAINT unique_categoria_id UNIQUE (id)
)
WITH (
  OIDS=TRUE
);

CREATE TABLE tipo_autenticacion
(
  id serial NOT NULL,
  descripcion character varying(255),
  url character varying(255),
  updated_at timestamp without time zone,
  created_at timestamp without time zone,
  CONSTRAINT unique_tipo_autenticacion_id UNIQUE (id)
)
WITH (
  OIDS=TRUE
);
ALTER TABLE tipo_autenticacion
  OWNER TO servicios;



  CREATE TABLE tipo_servicios
(
  id serial,
  descripcion character varying(255),
  id_categoria integer NOT NULL,
  id_padre integer ,
  CONSTRAINT unique_tipo_servicios_id UNIQUE (id),
  CONSTRAINT "Tipo_servicio-Categoria-FK-1" FOREIGN KEY (id_categoria)
      REFERENCES categoria (id) MATCH SIMPLE
      ON UPDATE CASCADE  ON DELETE CASCADE 
)
WITH (
  OIDS=TRUE
);



CREATE TABLE tipo_usuario
(
  id serial,
  descripcion character varying(255),
  CONSTRAINT unique_tipo_usuario_id UNIQUE (id)
)
WITH (
  OIDS=TRUE
);
   

CREATE TABLE users
(
  id serial NOT NULL,
  name character varying(255) NOT NULL,
  email character varying(255) NOT NULL,
  password character varying(60) NOT NULL,
  remember_token character varying(100),
  id_tipo_usuario integer NOT NULL,
  created_at timestamp(0) without time zone NOT NULL,
  updated_at timestamp(0) without time zone NOT NULL,
  CONSTRAINT users_pkey PRIMARY KEY (id),
  CONSTRAINT users_email_unique UNIQUE (email),
  CONSTRAINT "Usuarios-Tipo_usuario-FK-4" FOREIGN KEY (id_tipo_usuario)
      REFERENCES tipo_usuario (id) MATCH SIMPLE
      ON UPDATE CASCADE  ON DELETE CASCADE 
)
WITH (
  OIDS=FALSE
);


CREATE TABLE autenticacion
(
  id serial NOT NULL,
  id_cliente integer NOT NULL,
  id_tipo_autenticacion integer NOT NULL,
  token character varying(255),
  pass character varying(255),
  updated_at timestamp without time zone,
  created_at timestamp without time zone,
  CONSTRAINT "Autenticacion-Tipo_autenticacion-FK-2" FOREIGN KEY (id_tipo_autenticacion)
      REFERENCES tipo_autenticacion (id) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT unique_autenticacion_id UNIQUE (id),
  CONSTRAINT "Autenticacion-Usuarios-FK-32" FOREIGN KEY (id_cliente)
      REFERENCES users (id) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=TRUE
);
ALTER TABLE autenticacion
  OWNER TO servicios;
  
CREATE TABLE servicios
(
  id serial NOT NULL,
  nombre  character varying(255) NOT NULL,
  descripcion text,
  id_tipo_servicio integer NOT NULL,
  id_estatus integer,
  ponderacion integer, -- Es la ponderacion que le da el cliente al servicio va de 0 a 10
  updated_at timestamp without time zone,
  created_at timestamp without time zone DEFAULT now(),
  CONSTRAINT "Servicios-Estatus-FK-8" FOREIGN KEY (id_estatus)
      REFERENCES estatus (id) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT "Servicios-Tipo_servicios-FK-9" FOREIGN KEY (id_tipo_servicio)
      REFERENCES tipo_servicios (id) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT unique_servicios_id UNIQUE (id)
)
WITH (
  OIDS=TRUE
);

COMMENT ON TABLE  servicios.ponderacion IS 'Es la ponderacion que le da el cliente al servicio va de 0 a 10';

CREATE TABLE solicitudes
(
  id serial NOT NULL,
  id_cliente integer NOT NULL,
  id_estatus integer,
  id_servicio integer,
  descripcion text,
  fecha date NOT NULL,
  hora time without time zone NOT NULL,
  direccion text,
  cod_estado integer,
  cod_municipio integer,
  cod_parroquia integer,
  telefono character varying(10) NOT NULL,
  updated_at timestamp without time zone,
  created_at timestamp without time zone DEFAULT now(),
  CONSTRAINT "Solicitudes-Estatus-FK-6" FOREIGN KEY (id_estatus)
      REFERENCES estatus (id) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT "Solicitudes-Usuarios-FK-5" FOREIGN KEY (id_cliente)
      REFERENCES users (id) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT unique_solicitudes_id UNIQUE (id),
  CONSTRAINT "Solicitud-Servicios-FK-5-1" FOREIGN KEY (id_servicio)
      REFERENCES servicios (id) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=TRUE
);
  


CREATE TABLE insumos
(
  id serial,
  nombre character varying(255),
  descripcion character varying(255),
  referencia character varying(50),
  CONSTRAINT unique_insumos_id UNIQUE (id)
)
WITH (
  OIDS=TRUE
);


  CREATE TABLE insumos_fotos
(
  id serial,
  id_insumos integer not null,
  nombre character varying(150),
  ruta character varying(255),
  CONSTRAINT unique_insumos_fotos_id UNIQUE (id),
  CONSTRAINT "Insumos_fotos-Insumos-FK-10" FOREIGN KEY (id_insumos)
      REFERENCES insumos (id) MATCH SIMPLE
      ON UPDATE CASCADE  ON DELETE CASCADE  
)
WITH (
  OIDS=TRUE
);

    
CREATE TABLE catalogos
(
  id serial,
  descripcion character varying(255),
  id_solicitud integer not null,
  id_estatus integer,
  fecha_reg timestamp without time zone default now(),
  CONSTRAINT unique_catalogos_id UNIQUE (id),
  CONSTRAINT "Catalogos-Solicitud-FK-11" FOREIGN KEY (id_solicitud)
      REFERENCES solicitudes (id) MATCH SIMPLE
      ON UPDATE CASCADE  ON DELETE CASCADE ,
  CONSTRAINT "Catalogos-Estatus-FK-12" FOREIGN KEY (id_estatus)
      REFERENCES estatus (id) MATCH SIMPLE
      ON UPDATE CASCADE  ON DELETE CASCADE  
)
WITH (
  OIDS=TRUE
);


  CREATE TABLE catalogos_insumos
(
  id serial,
  id_insumos integer not null,
  id_catalogos integer not null,
  precio numeric(10,2) not null,
  id_proveedor integer,
  id_estatus integer,
  CONSTRAINT unique_catalogos_insumos_id UNIQUE (id),
  CONSTRAINT "Catalogos_insumos-Insumos-FK-13" FOREIGN KEY (id_insumos)
      REFERENCES insumos (id) MATCH SIMPLE
      ON UPDATE CASCADE  ON DELETE CASCADE ,
  CONSTRAINT "Catalogos_insumos-Catalogos-FK-14" FOREIGN KEY (id_catalogos)
      REFERENCES catalogos (id) MATCH SIMPLE
      ON UPDATE CASCADE  ON DELETE CASCADE ,      
 CONSTRAINT "Catalogos_insumos-Estatus-FK-15" FOREIGN KEY (id_estatus)
      REFERENCES estatus (id) MATCH SIMPLE
      ON UPDATE CASCADE  ON DELETE CASCADE        
)
WITH (
  OIDS=TRUE
);




  CREATE TABLE seguimiento
(
  id serial,
  id_solicitud integer not null,
  id_usuario integer,
  fecha_reg timestamp without time zone default now(),
  descripcion text,
  CONSTRAINT unique_seguimiento_id UNIQUE (id),
  CONSTRAINT "Seguimiento-Solicitud-FK-16" FOREIGN KEY (id_solicitud)
      REFERENCES solicitudes (id) MATCH SIMPLE
      ON UPDATE CASCADE  ON DELETE CASCADE,      
  CONSTRAINT "Seguimiento-Usuarios-FK-17" FOREIGN KEY (id_usuario)
      REFERENCES users (id) MATCH SIMPLE
      ON UPDATE CASCADE  ON DELETE CASCADE      
)
WITH (
  OIDS=TRUE
);

  
CREATE TABLE auditoria
(
  id serial NOT NULL,
  id_usuario integer,
  ip character varying(15),
  operacion character varying(255),
  datos_operacion character varying(255),
  respuesta character varying(255),
  updated_at timestamp without time zone,
  created_at timestamp without time zone,
  CONSTRAINT unique_auditoria_id UNIQUE (id),
  CONSTRAINT "Auditoria-Usuarios-FK-21" FOREIGN KEY (id_usuario)
      REFERENCES users (id) MATCH SIMPLE
)
WITH (
  OIDS=TRUE
);


CREATE TABLE usuarios_servicios
(
  id serial NOT NULL,
  id_usuario integer  NOT NULL,
  id_servicio integer NOT NULL,
  updated_at timestamp without time zone,
  created_at timestamp without time zone,
  CONSTRAINT unique_usuarios_servicio_id UNIQUE (id),
  CONSTRAINT "Usuarios_Servicios-Usuarios-FK-22" FOREIGN KEY (id_usuario)
      REFERENCES users (id) MATCH SIMPLE,
  CONSTRAINT "Usuarios_Servicios-Servicios-FK-23" FOREIGN KEY (id_servicio)
      REFERENCES servicios (id) MATCH SIMPLE
)
WITH (
  OIDS=TRUE
);


COMMENT ON TABLE usuarios_servicios IS 'Los  servicios que ofrece cada usuario';

CREATE TABLE tarjetas_credito
(
  id serial NOT NULL,
  id_usuario integer NOT NULL,
  numero_tarjeta numeric (4)  NOT NULL,
  cedula  numeric (10) NOT NULL,
  cvv integer NOT NULL,
  nombre character varying(255),
  mes character varying(2),
  year character varying(4),
  updated_at timestamp without time zone,
  created_at timestamp without time zone,
  CONSTRAINT unique_tarjetas_credito_id UNIQUE (id),
  CONSTRAINT "Usuarios_Servicios-Usuarios-FK-23" FOREIGN KEY (id_usuario)
      REFERENCES users (id) MATCH SIMPLE
)
WITH (
  OIDS=TRUE
);

COMMENT ON TABLE tarjetas_credito IS 'instapago';

CREATE TABLE pagos_recibidos
(
  id serial NOT NULL, 
  id_solicitud integer NOT NULL, 
  monto numeric (12,2),
  id_estatus integer,
  descripcion character varying(255),
  referencia character varying(55),
  nro_cuenta character varying(18),
  id_tarjeta_credito integer,
  updated_at timestamp without time zone,
  created_at timestamp without time zone,
  CONSTRAINT unique_pagos_recibidos_id UNIQUE (id),
  CONSTRAINT "Pagos-Recibidos-Solicitud-FK-24" FOREIGN KEY (id_solicitud)
      REFERENCES solicitudes(id) MATCH SIMPLE,
 CONSTRAINT "Pagos-Recibidos-tarjeta_credito-FK-25" FOREIGN KEY (id_tarjeta_credito)
      REFERENCES tarjetas_credito (id) MATCH SIMPLE
)
WITH (
  OIDS=TRUE
);

COMMENT ON TABLE  pagos_recibidos IS 'para los pagos que se reciben por una solicitud de parte del usuarios cliente';

CREATE TABLE pagos_realizados
(
  id serial NOT NULL, 
  id_solicitud integer NOT NULL, 
  monto numeric (12,2),
  id_estatus integer,
  descripcion character varying(255),
  referencia character varying(55),
  nro_cuenta character varying(18),
  id_tarjeta_credito integer,
  updated_at timestamp without time zone,
  created_at timestamp without time zone,
  CONSTRAINT unique_pagos_realizados_id UNIQUE (id),
  CONSTRAINT "Pagos-Realizados-Solicitud-FK-26" FOREIGN KEY (id_solicitud)
      REFERENCES solicitudes (id) MATCH SIMPLE,
 CONSTRAINT "Pagos-Realizados-tarjeta_credito-FK-27" FOREIGN KEY (id_tarjeta_credito)
      REFERENCES tarjetas_credito (id) MATCH SIMPLE
)
WITH (
  OIDS=TRUE
);

COMMENT ON TABLE  pagos_realizados IS 'para los pagos realizados por una solicitud al usuario proveedor';

CREATE TABLE proveedores
(
  id serial NOT NULL,  
  rif character varying(10),
  nombre character varying(55),
  telefono character varying(18),
  direccion character varying(255),
  rnc character varying(10),
  correo character varying(255),
  updated_at timestamp without time zone,
  created_at timestamp without time zone,
  CONSTRAINT unique_proveedores_servicio_id UNIQUE (id),
  CONSTRAINT unique_usuarios_servicio_correo UNIQUE (correo)
)
WITH (
  OIDS=TRUE
);

COMMENT ON TABLE  proveedores IS 'aunque no se contemplo inicialmente, es necesario una tabla de proveedores de insumos, que ellos no son usuarios del sistema';

  
  CREATE TABLE postulados
(
  id serial,
  id_solicitud integer not null,
  id_usuario integer,
  fecha_reg timestamp without time zone default now(),
  id_estatus integer,
  id_proveedor integer,
  CONSTRAINT unique_postulados_id UNIQUE (id),
  CONSTRAINT "Postulados-Solicitud-FK-18" FOREIGN KEY (id_solicitud)
      REFERENCES solicitudes (id) MATCH SIMPLE
      ON UPDATE CASCADE  ON DELETE CASCADE,      
  CONSTRAINT "Postulados-Usuarios-FK-19" FOREIGN KEY (id_usuario)
      REFERENCES users (id) MATCH SIMPLE
      ON UPDATE CASCADE  ON DELETE CASCADE,
 CONSTRAINT "Postulados-Estatus-FK-20" FOREIGN KEY (id_estatus)
      REFERENCES estatus (id) MATCH SIMPLE
      ON UPDATE CASCADE  ON DELETE CASCADE,
 CONSTRAINT "Postulados-Proveedores-FK-28" FOREIGN KEY (id_proveedor)
      REFERENCES proveedores (id) MATCH SIMPLE
      ON UPDATE CASCADE  ON DELETE CASCADE           
)
WITH (
  OIDS=TRUE
);


CREATE TABLE proveedores_insumos
(
  id serial NOT NULL,
  id_proveedor integer  NOT NULL,
  id_insumo integer NOT NULL,
  updated_at timestamp without time zone,
  created_at timestamp without time zone,
  CONSTRAINT unique_usuarios_proveedores_insumos_id UNIQUE (id),
  CONSTRAINT "Proveedores-Insumos-Proveedor-FK-29" FOREIGN KEY (id_proveedor)
      REFERENCES proveedores (id) MATCH SIMPLE,
  CONSTRAINT "Proveedores-Insumos-Insumos-FK-30" FOREIGN KEY (id_insumo)
      REFERENCES insumos (id) MATCH SIMPLE
)
WITH (
  OIDS=TRUE
);

COMMENT ON TABLE proveedores_insumos
  IS 'una tabla relación para para saber que insumos surte un proveedor externo';


CREATE TABLE password_resets
(
  email character varying(255) NOT NULL,
  token character varying(255) NOT NULL,
  created_at timestamp(0) without time zone NOT NULL,
  CONSTRAINT "User-Password_Resets-FK-31" FOREIGN KEY (email)
      REFERENCES users (email) MATCH SIMPLE
      ON UPDATE CASCADE  ON DELETE CASCADE 
)
WITH (
  OIDS=FALSE
);
ALTER TABLE password_resets
  OWNER TO servicios;

-- Index: password_resets_email_index

-- DROP INDEX password_resets_email_index;

CREATE INDEX password_resets_email_index
  ON password_resets
  USING btree
  (email COLLATE pg_catalog."default");

-- Index: password_resets_token_index

-- DROP INDEX password_resets_token_index;

CREATE INDEX password_resets_token_index
  ON password_resets
  USING btree
  (token COLLATE pg_catalog."default");



