create schema sc;

CREATE TABLE sc.estado
(
  idesta serial NOT NULL,
  nombest character varying(30),
  CONSTRAINT idesta PRIMARY KEY (idesta)
);

CREATE TABLE sc.municipio
(
  idmunc serial NOT NULL,
  municipio character varying(255),
  idesta integer,
  CONSTRAINT idmunc PRIMARY KEY (idmunc),
  CONSTRAINT idesta FOREIGN KEY (idesta)
      REFERENCES sc.estado (idesta) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.parroquia
(
  idpar serial NOT NULL,
  parroquia character varying(255),
  idmunc integer,
  CONSTRAINT idpar PRIMARY KEY (idpar),
  CONSTRAINT idmunc FOREIGN KEY (idmunc)
      REFERENCES sc.municipio (idmunc) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.insteduc
(
  idinst serial NOT NULL,
  nombinst character varying(255),
  CONSTRAINT idinst PRIMARY KEY (idinst)
);

CREATE TABLE sc.sedeciat
(
  idciat serial NOT NULL,
  sede character varying(255),
  CONSTRAINT idciat PRIMARY KEY (idciat)
);

CREATE TABLE sc.representante
(
  idrep serial NOT NULL,
  cedula character varying(8),
  nombre character varying(50),
  telf character varying(12),
  docente boolean DEFAULT false,
  fkciat integer,
  fkinst integer,
  fkuser integer,
  CONSTRAINT idrep PRIMARY KEY (idrep),
  CONSTRAINT fkuser FOREIGN KEY (fkuser)
      REFERENCES public.users (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fkciat FOREIGN KEY (fkciat)
      REFERENCES sc.sedeciat (idciat) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fkinst FOREIGN KEY (fkinst)
      REFERENCES sc.insteduc (idinst) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.estudiante
(
  idestu serial NOT NULL,
  nombestu character varying(255),
  fkrep integer,
  fkinst integer,
  CONSTRAINT idestu PRIMARY KEY (idestu),
  CONSTRAINT fkinst FOREIGN KEY (fkinst)
      REFERENCES sc.insteduc (idinst) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fkrep FOREIGN KEY (fkrep)
      REFERENCES sc.representante (idrep) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.niveleduc
(
  idniv serial NOT NULL,
  nivel character varying(20),
  graduado boolean DEFAULT false,
  fkestu integer,
  CONSTRAINT idniv PRIMARY KEY (idniv),
  CONSTRAINT fkestu FOREIGN KEY (fkestu)
      REFERENCES sc.estudiante (idestu) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.direcuser
(
  iddiruser serial NOT NULL,
  fkesta integer,
  fkmunc integer,
  fkpar integer,
  fkciat integer,
  fkinst integer,
  fkrep integer,
  CONSTRAINT iddiruser PRIMARY KEY (iddiruser),
  CONSTRAINT fkesta FOREIGN KEY (fkesta)
      REFERENCES sc.estado (idesta) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fkmunc FOREIGN KEY (fkmunc)
      REFERENCES sc.municipio (idmunc) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fkpar FOREIGN KEY (fkpar)
      REFERENCES sc.parroquia (idpar) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fkciat FOREIGN KEY (fkciat)
      REFERENCES sc.sedeciat (idciat) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fkinst FOREIGN KEY (fkinst)
      REFERENCES sc.insteduc (idinst) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fkrep FOREIGN KEY (fkrep)
      REFERENCES sc.representante (idrep) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.equipo
(
  ideq serial NOT NULL,
  eqserial character varying(125),
  frecepcion timestamp without time zone,
  fentrega timestamp without time zone,
  eqversion character varying(6),
  eqstatus character varying(11),
  fkrep integer,
  diagnostico character varying(500) DEFAULT 'sin diagnostico'::character varying,
  observacion character varying(500) DEFAULT 'sin observacion'::character varying,
  status boolean DEFAULT false,
  CONSTRAINT ideq PRIMARY KEY (ideq),
  CONSTRAINT fkrep FOREIGN KEY (fkrep)
      REFERENCES sc.representante (idrep) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.fcarga
(
  idcarg serial NOT NULL,
  fcarg character varying(255),
  fkeq integer,
  CONSTRAINT idcarg PRIMARY KEY (idcarg),
  CONSTRAINT fkeq FOREIGN KEY (fkeq)
      REFERENCES sc.equipo (ideq) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.fgeneral
(
  idgen serial NOT NULL,
  fgen character varying(255),
  fkeq integer,
  CONSTRAINT idgen PRIMARY KEY (idgen),
  CONSTRAINT fkeq FOREIGN KEY (fkeq)
      REFERENCES sc.equipo (ideq) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.fpantalla
(
  idpant serial NOT NULL,
  fpant character varying(255),
  fkeq integer,
  CONSTRAINT idpant PRIMARY KEY (idpant),
  CONSTRAINT fkeq FOREIGN KEY (fkeq)
      REFERENCES sc.equipo (ideq) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.fsoftware
(
  idsoft serial NOT NULL,
  fsoft character varying(255),
  fkeq integer,
  CONSTRAINT idsoft PRIMARY KEY (idsoft),
  CONSTRAINT fkeq FOREIGN KEY (fkeq)
      REFERENCES sc.equipo (ideq) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.ftarjetamadre
(
  idtarj serial NOT NULL,
  ftarj character varying(255),
  fkeq integer,
  CONSTRAINT idtarj PRIMARY KEY (idtarj),
  CONSTRAINT fkeq FOREIGN KEY (fkeq)
      REFERENCES sc.equipo (ideq) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.fteclado
(
  idtec serial NOT NULL,
  ftec character varying(255),
  fkeq integer,
  CONSTRAINT idtec PRIMARY KEY (idtec),
  CONSTRAINT fkeq FOREIGN KEY (fkeq)
      REFERENCES sc.equipo (ideq) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.imagen
(
  idimag serial NOT NULL,
  nombimg character varying(50) DEFAULT 'vacio'::character varying,
  tipoimg character varying(7),
  fkuser integer,
  CONSTRAINT idimag PRIMARY KEY (idimag),
  CONSTRAINT fkuser FOREIGN KEY (fkuser)
      REFERENCES public.users (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.libros
(
  idlib serial NOT NULL,
  nomblib character varying(255),
  coleccion character varying(255),
  nivel character varying(11),
  anio character varying(11),
  fkimag integer,
  CONSTRAINT idlib PRIMARY KEY (idlib),
  CONSTRAINT fkimag FOREIGN KEY (fkimag)
      REFERENCES sc.imagen (idimag) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.formato
(
  idf serial NOT NULL,
  opcion character varying(255),
  nombf character varying(255),
  status boolean DEFAULT false,
  create_at timestamp without time zone,
  statusacta boolean DEFAULT false,
  fkuser integer,
  CONSTRAINT idf PRIMARY KEY (idf),
  CONSTRAINT fkuser FOREIGN KEY (fkuser)
      REFERENCES public.users (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.proyecto
(
  idpro serial NOT NULL,
  nombpro character varying(255),
  creador character varying(50),
  colaboracion character varying(255),
  descripcion character varying(500),
  create_at timestamp without time zone,
  update_at timestamp without time zone,
  fkuser integer,
  CONSTRAINT idpro PRIMARY KEY (idpro),
  CONSTRAINT fkuser FOREIGN KEY (fkuser)
      REFERENCES public.users (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.multimedia
(
  idmult serial NOT NULL,
  nombmult character varying(255),
  tipomult character varying(5),
  fkpro integer,
  fkimag integer,
  CONSTRAINT idmult PRIMARY KEY (idmult),
  CONSTRAINT fkpro FOREIGN KEY (fkpro)
      REFERENCES sc.proyecto (idpro) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fkimag FOREIGN KEY (fkimag)
      REFERENCES sc.imagen (idimag) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.asistencia
(
  idasis serial NOT NULL,
  fkuser integer,
  fecha date,
  horain time without time zone,
  horaout time without time zone,
  observacion text,
  CONSTRAINT idasis PRIMARY KEY (idasis),
  CONSTRAINT fkuser FOREIGN KEY (fkuser)
      REFERENCES public.users (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE sc.catalogo
(
  idcata serial NOT NULL,
  idpadre integer,
  nombcata character varying(40),
  CONSTRAINT idcata PRIMARY KEY (idcata)
);
