-- SCRIPT DE CREACION

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
	v_rendimientos_financieros  NUMBER(30,2) NOT NULL,
	v_gastos_financieros        NUMBER(30,2) NOT NULL,
	v_aportes                   NUMBER(30,2) NOT NULL,
	v_creditos                  NUMBER(30,2) NOT NULL,
	f_rendimiento               DATE NOT NULL,
	k_id_rendimiento            NUMBER(10) NOT NULL
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
	k_id_plan          NUMBER(15) NOT NULL
)
;


CREATE TABLE GananciaRendimiento
(
	k_id_rendimiento  NUMBER(10) NOT NULL,
	k_id_ganancia     NUMBER(11) NOT NULL
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
	f_aprobacion      DATE NOT NULL,
	f_desembolso      DATE NOT NULL,
	f_ultimo_pago     DATE,
	v_ultimo_pago     NUMBER(12,2),
	v_credito         NUMBER(12) NOT NULL,
	v_saldo           NUMBER(12,2) NOT NULL,
	i_estado          VARCHAR(9) NOT NULL,
	q_cuotas          NUMBER(3) NOT NULL,
	k_identificacion  NUMBER(11) NOT NULL,
	q_cuota           NUMBER(3) NOT NULL,
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



ALTER TABLE Tipo_Credito
	ADD CONSTRAINT UQ_tipo UNIQUE (i_tipo)
 USING INDEX 
;

ALTER TABLE Tipo_Credito
ADD CONSTRAINT CHK_k_identificador CHECK (k_identificador > 0)
;

ALTER TABLE Socio
	ADD CONSTRAINT UQ_Socio_o_telefono_celular UNIQUE (o_telefono_celular)
 USING INDEX 
;

ALTER TABLE Socio
	ADD CONSTRAINT UQ_socio_o_correo_electronico UNIQUE (o_correo_electronico)
 USING INDEX 
;

ALTER TABLE Socio
	ADD CONSTRAINT UQ_socio_o_tarjeta_profesiona UNIQUE (o_tarjeta_profesional)
 USING INDEX 
;

ALTER TABLE Socio
ADD CONSTRAINT CHK_k_identificacion CHECK (k_identificacion > 0)
;

ALTER TABLE Socio
ADD CONSTRAINT CHK_i_estado_civil CHECK (i_estado_civil IN ('S','C'))
;

ALTER TABLE Socio
ADD CONSTRAINT CHK_i_genero CHECK (i_genero IN ('F','M'))
;

ALTER TABLE Socio
ADD CONSTRAINT CHK_correo_electronico CHECK (REG_EXP(o_correo_electronico,'+@+.+'))
;

ALTER TABLE Rendimiento
ADD CONSTRAINT CHK_v_rendimientos_financieros CHECK (v_rendimientos_financieros >= 0)
;

ALTER TABLE Rendimiento
ADD CONSTRAINT CHK_v_gastos_financieros CHECK (v_gastos_financieros >= 0)
;

ALTER TABLE Rendimiento
ADD CONSTRAINT CHK_v_aportes CHECK (v_aportes >= 0)
;

ALTER TABLE Rendimiento
ADD CONSTRAINT CHK_v_creditos CHECK (v_creditos >= 0)
;

ALTER TABLE Rendimiento
ADD CONSTRAINT k_id_rendimiento CHECK (k_id_rendimiento > 0)
;

ALTER TABLE PlanPagos
ADD CONSTRAINT CHK_q_cuota CHECK (q_cuota > 0)
;

ALTER TABLE PlanPagos
ADD CONSTRAINT CHK_v_xinteres CHECK (v_xinteres > 0)
;

ALTER TABLE PlanPagos
ADD CONSTRAINT CHK_v_xcapital CHECK (v_xcapital > 0)
;

ALTER TABLE PlanPagos
ADD CONSTRAINT CHK_k_id_plan CHECK (k_id_plan > 0)
;

ALTER TABLE PlanPagos ADD CONSTRAINT UQ_PlanPagos 
	UNIQUE (q_cuota, k_id_credito) 
 USING INDEX 
;

ALTER TABLE Pago
	ADD CONSTRAINT UQ_Pago_k_id_plan UNIQUE (k_id_plan)
 USING INDEX 
;

ALTER TABLE Pago
ADD CONSTRAINT CHK_k_numconsignacion CHECK (k_numconsignacion > 0)
;

ALTER TABLE Pago
ADD CONSTRAINT CHK_v_pago CHECK (v_pago > 0)
;

ALTER TABLE Ganancia
ADD CONSTRAINT CHK_k_id_ganancia CHECK (k_id_ganancia > 0)
;

ALTER TABLE Ganancia
ADD CONSTRAINT CHK_v_ganancia CHECK (v_ganancia > 0)
;

ALTER TABLE FormaPago
	ADD CONSTRAINT UQ_FormaPago_n_fpago UNIQUE (n_fpago)
 USING INDEX 
;

ALTER TABLE FormaPago
ADD CONSTRAINT CHK_k_fpago CHECK (k_fpago > 0)
;

ALTER TABLE Descripcion_Tipo_Credito
ADD CONSTRAINT CHK_v_tasa_interes CHECK (v_tasa_interes >= 0 AND v_tasa_interes <= 1)
;

ALTER TABLE Descripcion_Tipo_Credito
ADD CONSTRAINT CHK_v_aporte_minimo CHECK (v_aporte_minimo > 0)
;

ALTER TABLE Descripcion_Tipo_Credito
ADD CONSTRAINT CHK_q_plazo_maximo CHECK (q_plazo_maximo > 0)
;

ALTER TABLE Descripcion_Tipo_Credito
ADD CONSTRAINT CHK_k_id_descripcion CHECK (k_id_descripcion > 0)
;

ALTER TABLE DescripcionAporte
ADD CONSTRAINT CHK_q_dias CHECK (q_dias > 0 AND q_dias <=31)
;

ALTER TABLE DescripcionAporte
ADD CONSTRAINT CHK_v_maxaporte CHECK (v_maxaporte > 0)
;

ALTER TABLE DescripcionAporte
ADD CONSTRAINT CHK_v_minaporte CHECK (v_minaporte>0)
;

ALTER TABLE DescripcionAporte
ADD CONSTRAINT CHK_v_interes_multa CHECK (v_interes_multa > 0)
;

ALTER TABLE DescripcionAporte
ADD CONSTRAINT CHK_k_descaporte CHECK (k_descaporte > 0)
;

ALTER TABLE DescripcionAporte
ADD CONSTRAINT CHK_MAX_MIN CHECK (v_maxaporte>=v_minaporte)
;

ALTER TABLE Cuenta
ADD CONSTRAINT CHK_k_cuenta CHECK (k_cuenta > 0)
;

ALTER TABLE Credito
ADD CONSTRAINT CHK_k_id_credito CHECK (k_id_credito > 0)
;

ALTER TABLE Credito
ADD CONSTRAINT CHK_v_ultimo_pago CHECK (v_ultimo_pago > 0)
;

ALTER TABLE Credito
ADD CONSTRAINT CHK_v_credito CHECK (v_credito > 0)
;

ALTER TABLE Credito
ADD CONSTRAINT CHK_q_cuotas CHECK (q_cuotas  > 0)
;

ALTER TABLE Credito
ADD CONSTRAINT CHK_i_estado CHECK (i_estado LIKE 'A' or i_estado LIKE 'V' or i_estado LIKE 'C')
;

ALTER TABLE Credito
ADD CONSTRAINT CHK_cuota CHECK (q_cuota > 0)
;

ALTER TABLE Aporte
ADD CONSTRAINT CHK_v_aporte CHECK (v_aporte>0)
;

ALTER TABLE Aporte
ADD CONSTRAINT CHK_numconsignacion CHECK (k_numconsignacion > 0)
;

ALTER TABLE Aporte
ADD CONSTRAINT CHK_v_multa CHECK (v_multa > 0)
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

--CREANDO SECUENCIAS

DROP SEQUENCE seq_credito;
DROP SEQUENCE seq_ganancia;
DROP SEQUENCE seq_formapago;
DROP SEQUENCE seq_tipo_credito;
DROP SEQUENCE seq_descripcion_tipo_credito;
DROP SEQUENCE seq_descripcion_aporte;
DROP SEQUENCE seq_rendimiento;
DROP SEQUENCE seq_planpagos;

CREATE SEQUENCE seq_credito minvalue 0 INCREMENT BY 1;
CREATE SEQUENCE seq_ganancia minvalue 0 INCREMENT BY 1;
CREATE SEQUENCE seq_formapago minvalue 0 INCREMENT BY 1;
CREATE SEQUENCE seq_tipo_credito minvalue 0 INCREMENT BY 1;
CREATE SEQUENCE seq_descripcion_tipo_credito minvalue 0 INCREMENT BY 1;
CREATE SEQUENCE seq_descripcion_aporte minvalue 0 INCREMENT BY 1;
CREATE SEQUENCE seq_rendimiento minvalue 0 INCREMENT BY 1;
CREATE SEQUENCE seq_planpagos minvalue 0 INCREMENT BY 1;