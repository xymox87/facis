
--SCRIPT DE LLENADO

--INSERTANDO EN SOCIO

INSERT INTO socio VALUES
(1018453546,'Nicolas','Garcia','S','Estudiante','TARJETA1',
'M','DOMICILIO1','TRABAJO1','nicolas.2324@gmail.com','TELDO1',
'TELTRA1','CEL1',sysdate,NULL,NULL);

INSERT INTO socio VALUES
(1019499187,'Mauricio','Garzon','C','Gestor de proyectos','TARJETA2',
'M','DOMICILIO2','TRABAJO2','maurogarzon@gmail.com','TELDO2',
'TELTRA2','CEL2',sysdate,NULL,NULL);

INSERT INTO socio VALUES
(1015890997,'Sofia','Buitrago','C','Desarrolladora','TARJETA3',
'F','DOMICILIO3','TRABAJO3','sofidesofos@gmail.com','TELDO3',
'TELTRA3','CEL3',sysdate,NULL,NULL);

--INSERTANDO EN DESCRIPCIONAPORTE

INSERT INTO descripcionaporte VALUES 
(sysdate,5,10000000,100000,0.12,seq_descripcion_aporte.nextval);
INSERT INTO descripcionaporte VALUES 
(sysdate,3,20000000,50000,0.30,seq_descripcion_aporte.nextval);

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
(seq_descripcion_tipo_credito.nextval,sysdate,0.2,1,20,1);
INSERT INTO descripcion_tipo_credito VALUES
(seq_descripcion_tipo_credito.nextval,sysdate,0.3,1000000,20,2);
INSERT INTO descripcion_tipo_credito VALUES
(seq_descripcion_tipo_credito.nextval,sysdate,0.15,1000000,20,3);

--INSERTANDO EN APORTE

INSERT INTO aporte VALUES
(50000,sysdate,1,2,1018453546,89456723,2,NULL);
INSERT INTO aporte VALUES
(50000,sysdate,2,2,1019499187,89456723,2,50000*0.30);

--INSERTANDO EN LA TABLA CREDITO

INSERT INTO CREDITO VALUES
(seq_credito.nextval,sysdate,sysdate,NULL,NULL,2000,-2000,'vigente',2,1018453546,1,1);
INSERT INTO CREDITO VALUES
(seq_credito.nextval,sysdate,sysdate,NULL,NULL,2000,-2000,'vigente',1,1019499187,1,1);
INSERT INTO CREDITO VALUES
(seq_credito.nextval,sysdate,sysdate,NULL,NULL,2000,-2000,'vigente',1,1019499187,1,1);

--HACIENDO COMMIT

COMMIT;