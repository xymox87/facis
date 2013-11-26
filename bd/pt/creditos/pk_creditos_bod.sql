/*--------------------------------------------------------------------------
    Proyecto: Fondo de ahorros y creditos para ingenieros de sistemas FACIS
    Descripción: Este paquete lista las funciones y los procedimientos
                 correspondientes al manejo de creditos.
    Autor: Nicolás Mauricio García Garzón
    Fecha: 2013/11/24
--------------------------------------------------------------------------*/

CREATE OR REPLACE PACKAGE BODY pk_creditos AS

/*--------------------------------------------------------------------------
    Función que verifica si un socio está al día con los pagos de sus 
    créditos
    
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

CURSOR c_creditos_socio IS 
    SELECT k_id_credito, q_cuota
    FROM credito
    WHERE k_identificacion = pk_identificacion;

f_dia_inicial DATE DEFAULT TO_DATE(TO_CHAR(sysdate,'dd-mm-yyyy'),'dd-mm-yyyy')
     - TO_DATE(TO_CHAR(sysdate,'dd'),'dd') + TO_DATE('01','dd');
f_dia_final DATE DEFAULT TO_DATE(TO_CHAR(sysdate,'dd-mm-yyyy'),'dd-mm-yyyy');
f_cuota_anterior DATE;
b_retorno BOOLEAN DEFAULT FALSE;

BEGIN

    FOR r_c_creditos_socio IN c_creditos_socio LOOP
        FOR r_c_planpago_credito_socio IN 
            (SELECT q_cuota,f_aconsignar
                FROM planpagos
                WHERE k_id_credito = r_c_creditos_socio.k_id_credito) LOOP
            IF r_c_planpago_credito_socio.q_cuota = 
                r_c_creditos_socio.q_cuota THEN
                IF f_cuota_anterior IS NULL THEN
                    b_retorno := r_c_planpago_credito_socio.f_aconsignar BETWEEN 
                             f_dia_inicial AND f_dia_final;
                ELSE
                    b_retorno := r_c_planpago_credito_socio.f_aconsignar BETWEEN 
                             f_cuota_anterior AND f_dia_final;
                END IF;
                EXIT;
            END IF;
            f_cuota_anterior := r_c_planpago_credito_socio.f_aconsignar;
        END LOOP;
        IF NOT b_retorno THEN
            EXIT;
        END IF;
    END LOOP;
    RETURN b_retorno;

EXCEPTION

    WHEN NO_DATA_FOUND THEN
        pc_error := -20000;
        pm_error := 'No existen creditos asociados al socio';
        IF c_creditos_socio%ISOPEN THEN
            CLOSE c_creditos_socio;
        END IF;
        RETURN TRUE;
    WHEN OTHERS THEN
        pc_error := sqlcode;
        pm_error := sqlerrm;

END fu_socio_al_dia;

/*--------------------------------------------------------------------------
    Procedimiento que hace un update a los rendimientos cuando se adiciona
    un nuevo pago a cualquier crédito
       
    Parámetros de salida:
        pc_error            Variable que tendrá el código de error
        pm_error            Variable que tendrá el mensaje de error
--------------------------------------------------------------------------*/

PROCEDURE pr_act_rendimiento_pago(pc_error OUT NUMBER,
                                    pm_error OUT VARCHAR) IS

v_xinteres_pago planpagos.v_xinteres%TYPE;
v_xcapital_pago planpagos.v_xcapital%TYPE;
v_rendimiento_anual rendimiento.v_rendimientos_financieros%TYPE;
v_creditos_anuales rendimiento.v_creditos%TYPE;

BEGIN

    pc_error := 0;
    pm_error := '';

    SELECT v_rendimientos_financieros, v_creditos
    INTO v_rendimiento_anual, v_creditos_anuales
    FROM rendimiento
    WHERE f_rendimiento = TO_DATE(TO_CHAR(sysdate,'yyyy'),'yyyy');

    SELECT v_xcapital, v_xinteres
    INTO v_xcapital_pago, v_xinteres_pago
    FROM planpagos pp,credito c
    WHERE pp.k_id_credito = c.k_id_credito AND c.q_cuota = pp.q_cuota;

    UPDATE rendimiento SET v_rendimientos_financieros = v_rendimiento_anual 
                            + v_xinteres_pago,
                           v_creditos = 
                            v_creditos_anuales - v_xcapital_pago
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

END pr_act_rendimiento_pago;

/*--------------------------------------------------------------------------
    Procedimiento que hace un update a los rendimientos cuando se adiciona
    un nuevo crédito
       
    Parámetros de entrada:
        pv_credito          Valor por el cual se está registrando el crédito

    Parámetros de salida:
        pc_error            Variable que tendrá el código de error
        pm_error            Variable que tendrá el mensaje de error
--------------------------------------------------------------------------*/

PROCEDURE pr_act_rendimiento_credito(pv_credito credito.v_credito%TYPE,
                                    pc_error OUT NUMBER,
                                    pm_error OUT VARCHAR) IS

    v_credito_anual rendimiento.v_creditos%TYPE;

BEGIN

    pc_error := 0;
    pm_error := '';

    SELECT v_creditos
    INTO v_credito_anual
    FROM rendimiento
    WHERE f_rendimiento = TO_DATE(TO_CHAR(sysdate,'yyyy'),'yyyy');

    UPDATE rendimiento SET v_creditos = v_credito_anual + pv_credito
    WHERE f_rendimiento = TO_DATE(TO_CHAR(sysdate,'yyyy'),'yyyy');

EXCEPTION
    WHEN NO_DATA_FOUND THEN
        pk_rendimientos.pr_crear_nuevo_rendimiento(pc_error, pm_error);
        dbms_output.put_line(pm_error);
        IF pc_error IS NOT NULL AND pm_error IS NOT NULL THEN
            pc_error := 1;
            pm_error := 'No se pudo insertar el rendimiento';
        ELSE
            pc_error := 2;
            pm_error := 'No se actualiza rendimiento. Creado nuevo rendimiento';
        END IF;
        dbms_output.put_line(pm_error);
    WHEN OTHERS THEN
        pc_error := sqlcode;
        pm_error := sqlerrm;
        dbms_output.put_line(pm_error);

END pr_act_rendimiento_credito;

END pk_creditos;
/

