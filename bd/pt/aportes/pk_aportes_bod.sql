/*--------------------------------------------------------------------------
    Proyecto: Fondo de ahorros y creditos para ingenieros de sistemas FACIS
    Descripción: Este paquete lista las funciones y los procedimientos
                 correspondientes al manejo de los aportes.
    Autor: Nicolás Mauricio García Garzón
    Fecha: 2013/11/24
--------------------------------------------------------------------------*/

CREATE OR REPLACE PACKAGE BODY pk_aportes AS

/*--------------------------------------------------------------------------
    Función que verifica si un socio está al día con sus aportes o no
    
    Parámetros de entrada:
        pk_identificacion   Identificación del socio
        
    Parámetros de salida:
        pc_error            Variable que tendrá el código de error
        pm_error            Variable que tendrá el mensaje de error

    Retorno: BOOLEAN que indica si el socio está o no al día con sus 
            aportes
--------------------------------------------------------------------------*/

FUNCTION fu_socio_al_dia(pk_identificacion socio.k_identificacion%TYPE,
                            pc_error OUT NUMBER,
                            pm_error OUT VARCHAR) RETURN BOOLEAN IS

CURSOR c_ultimo_aporte_socio IS 
    SELECT MAX(f_consignacion) AS f_consignacion
    FROM aporte
    GROUP BY (k_identificacion)
    HAVING (k_identificacion = pk_identificacion);

b_al_dia BOOLEAN DEFAULT FALSE;
f_dia_inicial DATE DEFAULT TO_DATE(TO_CHAR(sysdate,'dd-mm-yyyy'),'dd-mm-yyyy')
     - TO_DATE(TO_CHAR(sysdate,'dd'),'dd') + TO_DATE('01','dd');
f_dia_final DATE DEFAULT TO_DATE(TO_CHAR(sysdate,'dd-mm-yyyy'),'dd-mm-yyyy')
     - TO_DATE(TO_CHAR(sysdate,'dd'),'dd') + TO_DATE('06','dd');

BEGIN

    FOR r_c_ultimo_aporte_socio IN c_ultimo_aporte_socio LOOP
        b_al_dia := TO_DATE(TO_CHAR(r_c_ultimo_aporte_socio.f_consignacion,'dd-mm-yyyy'),
            'dd-mm-yyyy') BETWEEN f_dia_inicial AND f_dia_final;
    END LOOP;
    
    RETURN b_al_dia;

EXCEPTION
    WHEN NO_DATA_FOUND THEN
        pc_error := -20000;
        pm_error := 'No existe socio con esa identificación';
        RETURN b_al_dia;
    WHEN OTHERS THEN
        pc_error := sqlcode;
        pm_error := sqlerrm;

END fu_socio_al_dia;

END pk_aportes;
/

/*
DECLARE
    codigo number;
    mensaje varchar(300);
    resultado BOOLEAN;
BEGIN
    resultado := pk_aportes.fu_socio_al_dia(1018453546,codigo,mensaje);
    dbms_output.put_line(codigo || ' ' || mensaje);
END;
/*/

