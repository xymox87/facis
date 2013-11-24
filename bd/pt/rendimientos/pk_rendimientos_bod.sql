/*--------------------------------------------------------------------------
    Proyecto: Fondo de ahorros y creditos para ingenieros de sistemas FACIS
    Descripción: Este paquete lista las funciones y los procedimientos
                 correspondientes al manejo de los rendimientos del fondo.
    Autor: Nicolás Mauricio García Garzón
    Fecha: 2013/11/24
--------------------------------------------------------------------------*/

CREATE OR REPLACE PACKAGE BODY pk_rendimientos_bod AS

/*-------------------------------------------------------------------------
    Calcula y distribuye los rendimientos del fondo a los socios

    Parámetros de salida: 
        pc_error        Código de error
        pm_error        Mensaje de error
--------------------------------------------------------------------------*/

PROCEDURE pr_calcular_rendimientos_socios(pc_error OUT NUMBER, 
                                            pm_error OUT VARCHAR) IS

CURSOR c_socios IS
    SELECT k_identificacion
    FROM socios;

CURSOR c_rendimientos_anuales IS
    SELECT 

BEGIN
    
    FOR r_c_socios IN c_socios LOOP
        IF pk_aportes.fu_socio_al_dia(
            r_c_socios.k_identificacion,
            pc_error,
            pm_error) AND pc_error IS NULL AND pm_erro IS NULL THEN
            
        END IF;
    END LOOP;

EXCEPTION
    WHEN OTHERS THEN
        pc_error := sqlcode;
        pm_error := sqlerrm;

END pr_calcular_rendimientos_socios;

/*-------------------------------------------------------------------------
    
    Calcula los rendimientos del fondo en el ultimo periodo de tiempo

    Parámetros de salida: 
        pc_error        Código de error
        pm_error        Mensaje de error
--------------------------------------------------------------------------*/

PROCEDURE pr_calcular_rendimientos_fondo(pc_error OUT NUMBER,
                                             pm_error OUT VARCHAR
                                          ) IS

CURSOR c_rendimientos_fondo IS
    SELECT v_capital_disponible
    FROM rendimiento
    WHERE f_rendimiento = TO_DATE(TO_CHAR(sysdate,'yyyy'),'yyyy');

BEGIN

EXCEPTION
    WHEN OTHERS THEN
        pc_error := sqlcode;
        pm_error := sqlerrm;

END pr_calcular_rendimientos_fondo;

END pk_rendimientos_hed;
/