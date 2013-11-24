--CREANDO TABLESPACE PARA FACIS
/*
CREATE TABLESPACE facis DATAFILE 'C:\oraclexe\app\oracle\oradata\XE\FACIS.DBF' SIZE 1M AUTOEXTEND ON;
CREATE TEMPORARY TABLESPACE tempfacis TEMPFILE 'C:\oraclexe\app\oracle\oradata\XE\TEMFACIS.DBF' SIZE 5M AUTOEXTEND ON;

--CREACION DE USUARIO FACIS

DROP USER facis CASCADE; 
CREATE USER facis IDENTIFIED BY facis 
DEFAULT TABLESPACE facis
TEMPORARY TABLESPACE tempfacis
QUOTA UNLIMITED ON facis;
GRANT CONNECT,RESOURCE,DBA TO FACIS;
*/
--SCRIPT DE CREACION

DROP TABLE Tipo_Credito CASCADE CONSTRAINTS
;
DROP TABLE Socio CASCADE CONSTRAINTS
;
DROP TABLE Rendimiento CASCADE CONSTRAINTS
;
DROP TABLE PlanPagos CASCADE CONSTRAINTS
;
DROP TABLE Pago CASCADE CONSTRAINTS
;
DROP TABLE GananciaRendimiento CASCADE CONSTRAINTS
;
DROP TABLE Ganancia CASCADE CONSTRAINTS
;
DROP TABLE FormaPago CASCADE CONSTRAINTS
;
DROP TABLE Descripcion_Tipo_Credito CASCADE CONSTRAINTS
;
DROP TABLE DescripcionAporte CASCADE CONSTRAINTS
;
DROP TABLE Cuenta CASCADE CONSTRAINTS
;
DROP TABLE Credito CASCADE CONSTRAINTS
;
DROP TABLE Aporte CASCADE CONSTRAINTS
;

CREATE TABLE Tipo_Credito
(
	k_identificador  NUMBER(2) NOT NULL,
	i_tipo           VARCHAR(50) NOT NULL,
	n_descripcion    VARCHAR(256) NOT NULL
)
;


CREATE TABLE Socio
(
	k_identificacion       NUMBER(11) NOT NULL,
	n_nombre               VARCHAR(50) NOT NULL,
	n_apellido             VARCHAR(50) NOT NULL,
	i_estado_civil         VARCHAR(10) NOT NULL,
	n_ocupacion            VARCHAR(50) NOT NULL,
	o_tarjeta_profesional  VARCHAR(20) NOT NULL,
	i_genero               VARCHAR(1) NOT NULL,
	o_direccion_domicilio  VARCHAR(50) NOT NULL,
	o_direccion_trabajo    VARCHAR(50) NOT NULL,
	o_correo_electronico   VARCHAR(50) NOT NULL,
	o_telefono_domicilio   VARCHAR(15) NOT NULL,
	o_telefono_trabajo     VARCHAR(15) NOT NULL,
	o_telefono_celular     VARCHAR(15) NOT NULL,
	f_ingreso              DATE NOT NULL,
	f_retiro               DATE,
	o_causal_retiro        VARCHAR(256)
)
;


CREATE TABLE Rendimiento
(
	v_rendimiento        NUMBER(30,2) NOT NULL,
	o_rendimiento  DATE NOT NULL,
	k_id_rendimiento  NUMERIC NOT NULL
)
;


CREATE TABLE PlanPagos
(
	k_id_plan     NUMBER(15) NOT NULL,
	q_cuota       NUMBER(3) NOT NULL,
	v_xinteres    NUMBER(10,2) NOT NULL,
	v_xcapital    NUMBER(15,2) NOT NULL,
	f_aconsignar  DATE NOT NULL,
	k_id_credito  NUMBER(11) NOT NULL
)
;


CREATE TABLE Pago
(
	f_pago             DATE NOT NULL,
	k_numconsignacion  NUMBER(8) NOT NULL,
	v_pago             NUMBER(9,2) NOT NULL,
	k_cuenta           NUMBER(8) NOT NULL,
	k_fpago            NUMBER(2) NOT NULL,
	k_id_plan         NUMBER(15) NOT NULL
)
;


CREATE TABLE GananciaRendimiento
(
	k_id_rendimiento  numeric NOT NULL,
	k_id_ganancia        NUMBER(11) NOT NULL
)
;


CREATE TABLE Ganancia
(
	k_id_ganancia     NUMBER(11) NOT NULL,
	v_ganancia        NUMBER(15,2) NOT NULL,
	f_corte           DATE NOT NULL,
	o_proceso         VARCHAR(50) NOT NULL,
	k_identificacion  NUMBER(11) NOT NULL
)
;


CREATE TABLE FormaPago
(
	k_fpago  NUMBER(2) NOT NULL,
	n_fpago  VARCHAR(30) NOT NULL
)
;


CREATE TABLE Descripcion_Tipo_Credito
(
	k_id_descripcion   NUMBER(10) NOT NULL,
	f_establecimiento  DATE NOT NULL,
	v_tasa_interes     NUMBER(2,2) NOT NULL,
	v_aporte_minimo    NUMBER(10) NOT NULL,
	q_plazo_maximo     NUMBER(3) NOT NULL,
	k_identificador    NUMBER(2) NOT NULL
)
;


CREATE TABLE DescripcionAporte
(
	f_modificacion   DATE NOT NULL,
	q_dias           NUMBER(2) NOT NULL,
	v_maxaporte      NUMBER(10,2) NOT NULL,
	v_minaporte      NUMBER(10,2) NOT NULL,
	v_interes_multa  NUMBER(2,2) NOT NULL,
	k_descaporte     NUMBER(5) NOT NULL
)
;


CREATE TABLE Cuenta
(
	n_banco      VARCHAR(70) NOT NULL,
	k_cuenta     NUMBER(8) NOT NULL,
	o_descuenta  VARCHAR(300)
)
;


CREATE TABLE Credito
(
	k_id_credito      NUMBER(11) NOT NULL,
	f_aprobacion      DATE NULL,
	f_desembolso      DATE NOT NULL,
	f_ultimo_pago     DATE NULL,
	v_ultimo_pago     NUMBER(12,2) NULL,
	v_credito         NUMBER(12) NOT NULL,
	v_saldo           NUMBER(12) NOT NULL,
	i_estado          VARCHAR(9) NOT NULL,
	q_cuotas          NUMBER(3) NOT NULL,
	k_identificacion  NUMBER(11) NOT NULL,
	q_cuota           NUMBER(3) NULL,
	k_id_descripcion  NUMBER(10) NOT NULL
)
;


CREATE TABLE Aporte
(
	v_aporte           NUMBER(10,2) NOT NULL,
	f_consignacion     DATE NOT NULL,
	k_numconsignacion  NUMBER(8) NOT NULL,
	k_descaporte       NUMBER(5) NOT NULL,
	k_identificacion   NUMBER(11) NOT NULL,
	k_cuenta           NUMBER(8) NOT NULL,
	k_fpago            NUMBER(2) NOT NULL,
	v_multa            NUMBER(10,2)
)
;



ALTER TABLE Tipo_Credito ADD CONSTRAINT PK_Tipo_Credito 
	PRIMARY KEY (k_identificador) 
 USING INDEX 
;

ALTER TABLE Socio ADD CONSTRAINT PK_Socio 
	PRIMARY KEY (k_identificacion) 
 USING INDEX 
;

ALTER TABLE Rendimiento ADD CONSTRAINT PK_Rendimiento 
	PRIMARY KEY (k_id_rendimiento) 
 USING INDEX 
;

ALTER TABLE PlanPagos ADD CONSTRAINT PK_PlanPagos 
	PRIMARY KEY (k_id_plan) 
 USING INDEX 
;

ALTER TABLE PlanPagos ADD CONSTRAINT UQ_PlanPagos 
	UNIQUE (q_cuota, k_id_credito) 
;

ALTER TABLE Pago ADD CONSTRAINT PK_Pagos 
	PRIMARY KEY (k_numconsignacion) 
 USING INDEX 
;

ALTER TABLE GananciaRendimiento ADD CONSTRAINT PK_obtenido 
	PRIMARY KEY (k_id_rendimiento, k_id_ganancia) 
 USING INDEX 
;

ALTER TABLE Ganancia ADD CONSTRAINT PK_Ganancia 
	PRIMARY KEY (k_id_ganancia) 
 USING INDEX 
;

ALTER TABLE FormaPago ADD CONSTRAINT PK_FormaPago 
	PRIMARY KEY (k_fpago) 
 USING INDEX 
;

ALTER TABLE Descripcion_Tipo_Credito ADD CONSTRAINT PK_Descripcion_Tipo_Credito 
	PRIMARY KEY (k_id_descripcion) 
 USING INDEX 
;

ALTER TABLE DescripcionAporte ADD CONSTRAINT PK_DescripcionAporte 
	PRIMARY KEY (k_descaporte) 
 USING INDEX 
;

ALTER TABLE Cuenta ADD CONSTRAINT PK_Cuenta 
	PRIMARY KEY (k_cuenta) 
 USING INDEX 
;

ALTER TABLE Credito ADD CONSTRAINT PK_Credito 
	PRIMARY KEY (k_id_credito) 
 USING INDEX 
;

ALTER TABLE Aporte ADD CONSTRAINT PK_Aporte 
	PRIMARY KEY (k_numconsignacion) 
 USING INDEX 
;



ALTER TABLE PlanPagos ADD CONSTRAINT FK_PlanPagos_credito 
	FOREIGN KEY (k_id_credito) REFERENCES Credito (k_id_credito)
;

ALTER TABLE Pago ADD CONSTRAINT FK_Pago_PlanPagos 
	FOREIGN KEY (k_id_plan) REFERENCES PlanPagos (k_id_plan)
;

ALTER TABLE Pago ADD CONSTRAINT FK_Pago_Cuenta 
	FOREIGN KEY (k_cuenta) REFERENCES Cuenta (k_cuenta)
;

ALTER TABLE Pago ADD CONSTRAINT FK_Pago_FormaPago 
	FOREIGN KEY (k_fpago) REFERENCES FormaPago (k_fpago)
;

ALTER TABLE GananciaRendimiento ADD CONSTRAINT FK_GR_Ganancia 
	FOREIGN KEY (k_id_rendimiento) REFERENCES Rendimiento (k_id_rendimiento)
;

ALTER TABLE GananciaRendimiento ADD CONSTRAINT FK_GR_Rendimiento 
	FOREIGN KEY (k_id_ganancia) REFERENCES Ganancia (k_id_ganancia)
;

ALTER TABLE Ganancia ADD CONSTRAINT FK_Ganancia_Socio 
	FOREIGN KEY (k_identificacion) REFERENCES Socio (k_identificacion)
;

ALTER TABLE Descripcion_Tipo_Credito ADD CONSTRAINT FK_Descripcion_Tipo_Credito_Ti 
	FOREIGN KEY (k_identificador) REFERENCES Tipo_Credito (k_identificador)
;

ALTER TABLE Credito ADD CONSTRAINT FK_Credito_Descripcion_Tipo_Cr 
	FOREIGN KEY (k_id_descripcion) REFERENCES Descripcion_Tipo_Credito (k_id_descripcion)
;

ALTER TABLE Credito ADD CONSTRAINT FK_Credito_Socio 
	FOREIGN KEY (k_identificacion) REFERENCES Socio (k_identificacion)
;

ALTER TABLE Aporte ADD CONSTRAINT FK_Aporte_DescripcionAporte 
	FOREIGN KEY (k_descaporte) REFERENCES DescripcionAporte (k_descaporte)
;

ALTER TABLE Aporte ADD CONSTRAINT FK_Aporte_Socio 
	FOREIGN KEY (k_identificacion) REFERENCES Socio (k_identificacion)
;

ALTER TABLE Aporte ADD CONSTRAINT FK_Aporte_Cuenta 
	FOREIGN KEY (k_cuenta) REFERENCES Cuenta (k_cuenta)
;

ALTER TABLE Aporte ADD CONSTRAINT FK_Aporte_FormaPago 
	FOREIGN KEY (k_fpago) REFERENCES FormaPago (k_fpago)
;

--SCRIPT DE LLENADO

--INSERTANDO EN SOCIO

INSERT INTO socio VALUES
(1018453546,'Nicolas','Garcia','S','Estudiante','TARJETA1',
'M','DOMICILIO1','TRABAJO1','nicolas.2324@gmail.com','TELDO1',
'TELTRA1','CEL1',current_date,NULL,NULL);

INSERT INTO socio VALUES
(1019499187,'Mauricio','Garzon','C','Gestor de proyectos','TARJETA2',
'M','DOMICILIO2','TRABAJO2','maurogarzon@gmail.com','TELDO2',
'TELTRA2','CEL2',current_date,NULL,NULL);

INSERT INTO socio VALUES
(1015890997,'Sofia','Buitrago','C','Desarrolladora','TARJETA3',
'F','DOMICILIO3','TRABAJO3','sofidesofos@gmail.com','TELDO3',
'TELTRA3','CEL3',current_date,NULL,NULL);

--INSERTANDO EN DESCRIPCIONAPORTE

INSERT INTO descripcionaporte VALUES 
(current_date,5,10000000,100000,0.12,1);
INSERT INTO descripcionaporte VALUES 
(current_date,3,20000000,50000,0.30,2);

--INSERTANDO EN LA TABLA CUENTA

INSERT INTO cuenta VALUES 
('Bancolombia',89456723,'Cuenta general');
INSERT INTO cuenta VALUES 
('BBVA',56230944,'Cuenta general');

--INSERTANDO EN LA TABLA FORMAPAGO

INSERT INTO formapago VALUES
(1,'Cheque');
INSERT INTO formapago VALUES
(2,'Efectivo');

--INSERTANDO EN LA TABLA TIPO_CREDITO

INSERT INTO tipo_credito VALUES
(1,'Estudio','Credito por concepto de estudio');
INSERT INTO tipo_credito VALUES
(2,'Capital de trabajo','Credito por concepto de capital de trabajo');
INSERT INTO tipo_credito VALUES
(3,'Libre inversion','Credito por concepto de libre inversion');

--INSERTANDO EN LA TABLA DESCRIPCION_TIPO_CREDITO

INSERT INTO descripcion_tipo_credito VALUES
(1,current_date,0.2,1000000,20,1);
INSERT INTO descripcion_tipo_credito VALUES
(2,current_date,0.3,1000000,20,2);
INSERT INTO descripcion_tipo_credito VALUES
(3,current_date,0.15,1000000,20,3);

--HACIENDO COMMIT

commit;

--CREANDO SECUENCIAS

CREATE SEQUENCE sequence_credito minvalue 0 START WITH 0 INCREMENT BY 1;
--CREATE SEQUENCE sequence_aporte minvalue 0 START WITH 0 INCREMENT BY 1;
CREATE SEQUENCE sequence_ganancia minvalue 0 START WITH 0 INCREMENT BY 1;
CREATE SEQUENCE sequence_fpago minvalue 0 START WITH 0 INCREMENT BY 1;
CREATE SEQUENCE sequence_des_tipo_credito minvalue 0 START WITH 0 INCREMENT BY 1;
CREATE SEQUENCE sequence_des_aporte minvalue 0 START WITH 0 INCREMENT BY 1;
CREATE SEQUENCE sequence_descripcion minvalue 0 START WITH 0 INCREMENT BY 1;
CREATE SEQUENCE sequence_rendimiento minvalue 0 START WITH 0 INCREMENT BY 1;
CREATE SEQUENCE sequence_planpagos minvalue 0 START WITH 0 INCREMENT BY 1;

--CREANDO SINONIMOS

DROP PUBLIC SYNONYM SOCIO;
DROP PUBLIC SYNONYM TIPO_CREDITO;
DROP PUBLIC SYNONYM RENDIMIENTO;
DROP PUBLIC SYNONYM PLANPAGOS;
DROP PUBLIC SYNONYM PAGO;
DROP PUBLIC SYNONYM GANANCIARENDIMIENTO;
DROP PUBLIC SYNONYM GANANCIA;
DROP PUBLIC SYNONYM FORMAPAGO;
DROP PUBLIC SYNONYM DESCRIPCIONAPORTE;
DROP PUBLIC SYNONYM DESCRIPCION_TIPO_CREDITO;
DROP PUBLIC SYNONYM CUENTA;
DROP PUBLIC SYNONYM CREDITO;
DROP PUBLIC SYNONYM APORTE;

CREATE PUBLIC SYNONYM SOCIO FOR FACIS.SOCIO;
CREATE PUBLIC SYNONYM TIPO_CREDITO FOR FACIS.TIPO_CREDITO;
CREATE PUBLIC SYNONYM RENDIMIENTO FOR FACIS.RENDIMIENTO;
CREATE PUBLIC SYNONYM PLANPAGOS FOR FACIS.PLANPAGOS;
CREATE PUBLIC SYNONYM PAGO FOR FACIS.PAGO;
CREATE PUBLIC SYNONYM GANANCIARENDIMIENTO FOR FACIS.GANANCIARENDIMIENTO;
CREATE PUBLIC SYNONYM GANANCIA FOR FACIS.GANANCIA;
CREATE PUBLIC SYNONYM FORMAPAGO FOR FACIS.FORMAPAGO;
CREATE PUBLIC SYNONYM DESCRIPCIONAPORTE FOR FACIS.DESCRIPCIONAPORTE;
CREATE PUBLIC SYNONYM DESCRIPCION_TIPO_CREDITO FOR FACIS.DESCRIPCION_TIPO_CREDITO;
CREATE PUBLIC SYNONYM CUENTA FOR FACIS.CUENTA;
CREATE PUBLIC SYNONYM CREDITO FOR FACIS.CREDITO;
CREATE PUBLIC SYNONYM APORTE FOR FACIS.APORTE;

--CREANDO ROLES

DROP ROLE administrador;
DROP ROLE socio;
DROP ROLE cajero;

CREATE ROLE administrador;
CREATE ROLE socio;
CREATE ROLE cajero;

--ANIADIENDO PRIVILEGIOS A LOS ROLES

GRANT CONNECT TO administrador;
GRANT SELECT ON TIPO_CREDITO TO administrador;
GRANT SELECT,UPDATE,INSERT ON SOCIO TO administrador;
GRANT SELECT,UPDATE,INSERT ON CREDITO TO administrador;
GRANT SELECT ON RENDIMIENTO TO administrador;
GRANT SELECT ON PLANPAGOS TO administrador;
GRANT SELECT,INSERT ON PAGO TO administrador;
GRANT SELECT ON GANANCIA TO administrador;
GRANT SELECT ON GANANCIARENDIMIENTO TO administrador;
GRANT SELECT,INSERT ON FORMAPAGO TO administrador;
GRANT SELECT,INSERT ON DESCRIPCIONAPORTE TO administrador;
GRANT SELECT,INSERT ON DESCRIPCION_TIPO_CREDITO TO administrador;
GRANT SELECT,INSERT,UPDATE ON CUENTA TO administrador;
GRANT SELECT,INSERT ON APORTE TO administrador;

GRANT CONNECT TO socio;
GRANT SELECT ON TIPO_CREDITO TO socio;
GRANT SELECT,UPDATE ON SOCIO TO socio;
GRANT SELECT ON CREDITO TO socio;
GRANT SELECT ON PLANPAGOS TO socio;
GRANT SELECT ON PAGO TO socio;
GRANT SELECT ON GANANCIA TO socio;
GRANT SELECT ON GANANCIARENDIMIENTO TO socio;
GRANT SELECT ON FORMAPAGO TO socio;
GRANT SELECT ON DESCRIPCIONAPORTE TO socio;
GRANT SELECT ON DESCRIPCION_TIPO_CREDITO TO socio;
GRANT SELECT ON APORTE TO socio;

GRANT CONNECT TO cajero;
GRANT SELECT ON TIPO_CREDITO TO cajero;
GRANT SELECT ON SOCIO TO cajero;
GRANT SELECT,UPDATE,INSERT ON CREDITO TO cajero;
GRANT SELECT ON PLANPAGOS TO cajero;
GRANT SELECT,INSERT ON PAGO TO cajero;
GRANT SELECT ON GANANCIA TO cajero;
GRANT SELECT ON GANANCIARENDIMIENTO TO cajero;
GRANT SELECT ON FORMAPAGO TO cajero;
GRANT SELECT,INSERT ON DESCRIPCIONAPORTE TO cajero;
GRANT SELECT,INSERT ON DESCRIPCION_TIPO_CREDITO TO cajero;
GRANT SELECT ON CUENTA TO cajero;
GRANT SELECT,INSERT ON APORTE TO cajero;

--CREANDO USUARIOS

DROP USER admin1;
DROP USER admin2;
DROP USER caj1;

CREATE USER admin1 IDENTIFIED BY admin1 
DEFAULT TABLESPACE facis
TEMPORARY TABLESPACE tempfacis
QUOTA UNLIMITED ON facis;

CREATE USER admin2 IDENTIFIED BY admin2
DEFAULT TABLESPACE facis
TEMPORARY TABLESPACE tempfacis
QUOTA UNLIMITED ON facis;

CREATE USER caj1 IDENTIFIED BY caj1
DEFAULT TABLESPACE facis
TEMPORARY TABLESPACE tempfacis
QUOTA UNLIMITED ON facis;

--ADICIONANDO ROLES A USUARIOS

GRANT administrador to admin1;
GRANT administrador to admin2;
GRANT cajero to caj1; 

--ADICION DEL QUERY DE PRIVILEGIOS
/*
CREATE MATERIALIZED VIEW usuario AS SELECT &usuario FROM dual;

CREATE VIEW roles_usuario AS
SELECT granted_role FROM dba_role_privs WHERE grantee IN (SELECT * FROM usuario);

CREATE VIEW roles_roles AS
SELECT granted_role AS role FROM role_role_privs WHERE
role IN (SELECT * FROM roles_usuario);

CREATE VIEW permisos_roles AS
SELECT privilege FROM role_sys_privs WHERE role IN (SELECT * FROM roles_usuario)
OR role IN (SELECT * FROM roles_roles) UNION
SELECT privilege FROM role_tab_privs WHERE role IN (SELECT * FROM roles_usuario)
OR role IN (SELECT * FROM roles_roles);

CREATE VIEW permisos_usuario AS
SELECT privilege FROM dba_sys_privs WHERE grantee IN (SELECT * FROM usuario) UNION
SELECT privilege FROM dba_tab_privs WHERE grantee IN (SELECT * FROM usuario) UNION
SELECT privilege FROM dba_col_privs WHERE grantee IN (SELECT * FROM usuario);

CREATE VIEW privilegios_totales_usuario AS 
SELECT privilege FROM permisos_usuario UNION
SELECT privilege FROM permisos_roles;*/