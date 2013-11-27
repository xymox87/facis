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

    Retorno: VARCHAR que indica si el socio está o no al día con sus 
            aportes así: F - No está al día ; T - Está al día; N - No aplica
--------------------------------------------------------------------------*/

FUNCTION fu_socio_al_dia(pk_identificacion socio.k_identificacion%TYPE)
                         RETURN VARCHAR IS

CURSOR c_ultimo_aporte_socio(pc_identificacion socio.k_identificacion%TYPE) IS 
    SELECT MAX(f_consignacion) AS f_consignacion
    FROM aporte
    GROUP BY (k_identificacion)
    HAVING (k_identificacion = pc_identificacion);

b_al_dia VARCHAR(1) DEFAULT 'F';
f_dia_inicial DATE;
f_dia_final DATE DEFAULT TO_DATE(TO_CHAR(sysdate,'dd-mm-yyyy'),'dd-mm-yyyy');

BEGIN

    FOR r_c_ultimo_aporte_socio IN c_ultimo_aporte_socio(pk_identificacion) LOOP
        IF TO_DATE(TO_CHAR(sysdate,'dd-mm-yyyy'),'dd-mm-yyyy') > 
            TO_DATE(TO_CHAR(sysdate,'dd-mm-yyyy'),'dd-mm-yyyy') -
            TO_DATE(TO_CHAR(sysdate,'dd'),'dd') + TO_DATE('05','dd') THEN
            f_dia_inicial := TO_DATE(TO_CHAR(sysdate,'dd-mm-yyyy'),'dd-mm-yyyy')
                - TO_DATE(TO_CHAR(sysdate,'dd'),'dd') + TO_DATE('01','dd');
        ELSE
            f_dia_inicial := TO_DATE(TO_CHAR(ADD_MONTHS(sysdate,-1),'dd-mm-yyyy'),'dd-mm-yyyy')
                - TO_DATE(TO_CHAR(sysdate,'dd'),'dd') + TO_DATE('01','dd'); 
        END IF;
        IF TO_DATE(TO_CHAR(r_c_ultimo_aporte_socio.f_consignacion,'dd-mm-yyyy'),
            'dd-mm-yyyy') BETWEEN f_dia_inicial AND f_dia_final THEN
            b_al_dia := 'T';
        END IF;
    END LOOP;

    RETURN b_al_dia;

EXCEPTION
    WHEN NO_DATA_FOUND THEN
        RETURN b_al_dia;
    WHEN OTHERS THEN
        RAISE_APPLICATION_ERROR(sqlcode,sqlerrm);

END fu_socio_al_dia;

/*--------------------------------------------------------------------------
    Procedimiento que actualiza los rendimientos cuando un nuevo aporte es
    registrado
    
    Parámetros de entrada:
        pv_aporte           Valor por el cual se está registrando el aporte
        pv_multa            Valor por el cual se está registrando la multa
        
    Parámetros de salida:
        pc_error            Variable que tendrá el código de error
        pm_error            Variable que tendrá el mensaje de error

    Retorno: BOOLEAN que indica si el socio está o no al día con sus 
            aportes
--------------------------------------------------------------------------*/

PROCEDURE pr_act_rendimiento_aporte(pv_aporte aporte.v_aporte%TYPE,
                                    pv_multa aporte.v_multa%TYPE,
                                    pc_error OUT NUMBER,
                                    pm_error OUT VARCHAR) IS

    v_rendimiento_anual rendimiento.v_rendimientos_financieros%TYPE;
    v_aportes_anuales rendimiento.v_aportes%TYPE;
    v_multa_nueva aporte.v_multa%TYPE;

BEGIN

    pc_error := 0;
    pm_error := '';

    SELECT v_rendimientos_financieros, v_aportes
    INTO v_rendimiento_anual, v_aportes_anuales
    FROM rendimiento
    WHERE f_rendimiento = TO_DATE(TO_CHAR(sysdate,'yyyy'),'yyyy');
    
    IF pv_multa IS NULL THEN
        v_multa_nueva := 0;
    ELSE
        v_multa_nueva := pv_multa;
    END IF; 

    UPDATE rendimiento SET v_rendimientos_financieros = v_rendimiento_anual + 
                            v_multa_nueva, 
                           v_aportes = v_aportes_anuales + pv_aporte
    WHERE f_rendimiento = TO_DATE(TO_CHAR(sysdate,'yyyy'),'yyyy');

EXCEPTION
    WHEN NO_DATA_FOUND THEN
        pk_rendimientos.pr_crear_nuevo_rendimiento(pc_error, pm_error);
        IF pc_error IS NOT NULL AND pm_error IS NOT NULL THEN
            pc_error := 1;
            pm_error := 'No se pudo insertar el rendimiento';
        ELSE
            pc_error := 2;
            pm_error := 'No se actualiza rendimiento. Creado nuevo rendimiento';
        END IF;
    WHEN OTHERS THEN
        pc_error := sqlcode;
        pm_error := sqlerrm;

END pr_act_rendimiento_aporte;

END pk_aportes;
/