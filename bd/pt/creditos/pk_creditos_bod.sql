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

    Retorno: VARCHAR que indica si el socio está o no al día con el pago de
             sus créditos así: F - No está al día ; T - Está al día;
                               N - No aplica
--------------------------------------------------------------------------*/

FUNCTION fu_socio_al_dia(pk_identificacion socio.k_identificacion%TYPE)
                         RETURN VARCHAR IS

CURSOR c_creditos_socio(pc_identificacion socio.k_identificacion%TYPE) IS 
    SELECT f_aconsignar, f_ultimo_pago
    FROM credito c,planpagos pp
    WHERE k_identificacion = pc_identificacion
    AND c.k_id_credito = pp.k_id_credito
    AND c.q_cuota = pp.q_cuota
    AND c.i_estado = 'V';

b_retorno VARCHAR(1) DEFAULT 'F';
b_entra_loop BOOLEAN DEFAULT FALSE;

BEGIN

    FOR r_c_creditos_socio IN c_creditos_socio(pk_identificacion) LOOP
        b_entra_loop := TRUE;
        IF r_c_creditos_socio.f_ultimo_pago IS NOT NULL THEN
            IF sysdate BETWEEN r_c_creditos_socio.f_ultimo_pago AND 
                r_c_creditos_socio.f_aconsignar THEN
                b_retorno := 'T';
            END IF;
        ELSIF sysdate < r_c_creditos_socio.f_aconsignar THEN
                b_retorno := 'T';
        END IF;
    END LOOP;

    IF NOT b_entra_loop THEN
        b_retorno := 'N';
    END IF;

    RETURN b_retorno;

EXCEPTION

    WHEN NO_DATA_FOUND THEN
        dbms_output.put_line(SQLCODE||' '||SQLERRM);
        RETURN 'N';
    WHEN OTHERS THEN
        RAISE_APPLICATION_ERROR(sqlcode,sqlerrm);

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

END pr_act_rendimiento_credito;

END pk_creditos;
/

