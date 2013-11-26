
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
(current_date,5,10000000,100000,0.12,seq_descripcion_aporte.nextval);
INSERT INTO descripcionaporte VALUES 
(current_date,3,20000000,50000,0.30,seq_descripcion_aporte.nextval);

--INSERTANDO EN LA TABLA CUENTA

INSERT INTO cuenta VALUES 
('Bancolombia',89456723,'Cuenta general');
INSERT INTO cuenta VALUES 
('BBVA',56230944,'Cuenta general');

--INSERTANDO EN LA TABLA FORMAPAGO

INSERT INTO formapago VALUES
(seq_formapago.nextval,'Cheque');
INSERT INTO formapago VALUES
(seq_formapago.nextval,'Efectivo');

--INSERTANDO EN LA TABLA TIPO_CREDITO

INSERT INTO tipo_credito VALUES
(seq_tipo_credito.nextval,'Estudio','Credito por concepto de estudio');
INSERT INTO tipo_credito VALUES
(seq_tipo_credito.nextval,'Capital de trabajo','Credito por concepto de capital de trabajo');
INSERT INTO tipo_credito VALUES
(seq_tipo_credito.nextval,'Libre inversion','Credito por concepto de libre inversion');

--INSERTANDO EN LA TABLA DESCRIPCION_TIPO_CREDITO

INSERT INTO descripcion_tipo_credito VALUES
(seq_descripcion_tipo_credito.nextval,current_date,0.2,1000000,20,1);
INSERT INTO descripcion_tipo_credito VALUES
(seq_descripcion_tipo_credito.nextval,current_date,0.3,1000000,20,2);
INSERT INTO descripcion_tipo_credito VALUES
(seq_descripcion_tipo_credito.nextval,current_date,0.15,1000000,20,3);

--INSERTANDO EN LA TABLA RENDIMIENTO

INSERT INTO rendimiento VALUES
(10000,0,10,1000,TO_DATE(TO_CHAR(ADD_MONTHS(sysdate,-12),'yyyy'),'yyyy'),seq_rendimiento.nextval);
INSERT INTO rendimiento VALUES
(10000,0,10,1000,TO_DATE(TO_CHAR(sysdate,'yyyy'),'yyyy'),seq_rendimiento.nextval);
--HACIENDO COMMIT

commit;
