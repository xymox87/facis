/*--------------------------------------------------------------------------
    Proyecto: Fondo de ahorros y creditos para ingenieros de sistemas FACIS
    Descripción: Este paquete lista las funciones y los procedimientos
                 correspondientes al manejo de los rendimientos del fondo.
    Autor: Nicolás Mauricio García Garzón
    Fecha: 2013/11/24
--------------------------------------------------------------------------*/

CREATE OR REPLACE PACKAGE BODY pk_rendimientos AS

/*-------------------------------------------------------------------------
    Distribuye los rendimientos del fondo a los socios. La dis-
    tribución de los rendimientos se hará con la siguiente dinámica:
    Los intereses por concepto de crédito serán divididos en partes iguales
    para los socios que estén al día con el pago de sus aportes.
    

    Parámetros de salida: 
        pc_error        Código de error
        pm_error        Mensaje de error
--------------------------------------------------------------------------*/

PROCEDURE pr_dividir_rendimientos_socios(pc_error OUT NUMBER, 
                                            pm_error OUT VARCHAR) IS

/*--------------------------------------------------------------------------
    Creando lista dinamica para guardar los socios entre los que ser va a
    repartir el rendimiento del año anterior
--------------------------------------------------------------------------*/

TYPE r_socio_al_dia IS RECORD(k_identificacion socio.k_identificacion%TYPE);
TYPE r_lista_socios_al_dia IS RECORD(r_socio_actual r_socio_al_dia,
                                     r_socio_siguiente r_socio_al_dia);

r_socios_rendimientos r_lista_socios_al_dia;
r_socio_actual r_lista_socios_al_dia;

----------------------------------------------------------------------------

v_rendimiento_anual rendimiento.v_rendimientos_financieros%TYPE;

CURSOR c_socios IS
    SELECT k_identificacion
    FROM socio;

PROCEDURE pr_guardar_socio_lista(pk_identificacion socio.k_identificacion%TYPE,
                                p_r_cabeza_lista r_lista_socios_al_dia) IS

BEGIN

    IF r_lista_socios_al_dia.r_socio_actual.k_identificacion IS NULL THEN
        r_lista_socios_al_dia.r_socio_actual.k_identificacion := 
            pk_identificacion;
    ELSIF 
    END IF;

END pr_guardar_socio_lista;

BEGIN
    
    SELECT v_rendimientos_financieros 
    INTO v_rendimiento_anual
    FROM rendimiento
    WHERE f_rendimiento = TO_DATE(TO_CHAR(ADD_MONTHS(sysdate,-12),'yyyy'),'yyyy');
    
    FOR r_c_socios IN c_socios LOOP
        IF (pk_aportes.fu_socio_al_dia(
            r_c_socios.k_identificacion,
            pc_error,
            pm_error) AND pc_error IS NULL AND pm_error IS NULL) 
            AND (pk_creditos.fu_socio_al_dia(r_c_socios.k_identificacion,
            pc_error,
            pm_error) AND pc_error IS NULL AND pm_error IS NULL) THEN
                IF r_socios_rendimientos IS NULL THEN
                    
                END IF;
        END IF;
    END LOOP;

EXCEPTION
    WHEN OTHERS THEN
        pc_error := sqlcode;
        pm_error := sqlerrm;

END pr_dividir_rendimientos_socios;

/*-------------------------------------------------------------------------
    
    Calcula el capital disponible del fondo

    Parámetros de salida: 
        pc_error        Código de error
        pm_error        Mensaje de error
--------------------------------------------------------------------------*/

PROCEDURE pr_calcular_capital_disponible(pc_error OUT NUMBER,
                                             pm_error OUT VARCHAR
                                          ) IS



BEGIN
    NULL;
EXCEPTION
    WHEN OTHERS THEN
        pc_error := sqlcode;
        pm_error := sqlerrm;

END pr_calcular_capital_disponible;

/*-------------------------------------------------------------------------
    
    Calcula el capital total del fondo

    Parámetros de salida: 
        pc_error        Código de error
        pm_error        Mensaje de error
--------------------------------------------------------------------------*/

PROCEDURE pr_calcular_capital_total(pc_error OUT NUMBER,
                                             pm_error OUT VARCHAR
                                          ) IS

BEGIN
    NULL;
EXCEPTION
    WHEN OTHERS THEN
        pc_error := sqlcode;
        pm_error := sqlerrm;

END pr_calcular_capital_total;

END pk_rendimientos;
/