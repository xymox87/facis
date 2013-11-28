/*--------------------------------------------------------------------------
    Proyecto: Fondo de ahorros y creditos para ingenieros de sistemas FACIS
    Descripción: Este paquete lista las funciones y los procedimientos
                 correspondientes al manejo de los rendimientos del fondo.
    Autor: Nicolás Mauricio García Garzón
    Fecha: 2013/11/24
--------------------------------------------------------------------------*/

CREATE OR REPLACE PACKAGE pk_rendimientos AS

/*-------------------------------------------------------------------------
    
    Distribuye los rendimientos del fondo a los socios

    Parámetros de salida: 
        pc_error        Código de error
        pm_error        Mensaje de error
--------------------------------------------------------------------------*/

PROCEDURE pr_dividir_rendimientos_socios(pc_error OUT NUMBER,
                                             pm_error OUT VARCHAR
                                          );

/*-------------------------------------------------------------------------
    
    Calcula el capital disponible del fondo en un periodo de tiempo
    
    Parámetros de entrada:
        pf_inicial      Fecha inicial
        pf_final        Fecha final

    Parámetros de salida: 
        pc_error        Código de error
        pm_error        Mensaje de error

    Retorno:
        Retorna un NUMBER con el capital disponible del fondo en el periodo de
        tiempo dado
--------------------------------------------------------------------------*/

FUNCTION fu_calcular_capital_disponible(pf_inicial DATE,
                                         pf_final DATE, 
                                         pc_error OUT NUMBER,
                                         pm_error OUT VARCHAR
                                         ) RETURN NUMBER;

/*-------------------------------------------------------------------------
    
    Calcula el capital total del fondo  en un periodo de tiempo
    
    Parámetros de entrada:
        pf_inicial      Fecha inicial
        pf_final        Fecha final

    Parámetros de salida: 
        pc_error        Código de error
        pm_error        Mensaje de error

    Retorno:
        Retorna un NUMBER con el capital total del fondo en el periodo de
        tiempo dado
--------------------------------------------------------------------------*/

FUNCTION fu_calcular_capital_total(pf_inicial DATE,
                                   pf_final DATE, 
                                   pc_error OUT NUMBER,
                                   pm_error OUT VARCHAR
                                   ) RETURN NUMBER;

/*-------------------------------------------------------------------------
    
    Crea registro en la base de datos de un nuevo rendimiento anual

    Parámetros de salida: 
        pc_error        Código de error
        pm_error        Mensaje de error
--------------------------------------------------------------------------*/

PROCEDURE pr_crear_nuevo_rendimiento(pc_error OUT NUMBER,
                                     pm_error OUT VARCHAR
                                     );

/*-------------------------------------------------------------------------
    
    Genera los estados de cuenta de cada socio

    Parámetros de salida: 
        pc_error        Código de error
        pm_error        Mensaje de error
--------------------------------------------------------------------------*/

PROCEDURE pr_generar_estados_cuenta(pc_error OUT NUMBER,
                                    pm_error OUT VARCHAR
                                    );


END pk_rendimientos;
/

/*
SELECT c.k_id_credito AS k_id_credito,
           c.v_saldo AS v_saldo,
           pp.f_aconsignar AS f_siguiente_pago,
           (pp.v_xinteres + pp.v_xcapital - (SELECT SUM(v_pago)
                                            FROM pago p
                                            WHERE (pp.k_id_plan - 1 = p.k_id_plan OR 
                                            (pp.k_id_plan = p.k_id_plan AND pp.q_cuota = 1))
                                            AND  p.f_pago < pp.f_aconsignar))
           AS v_siguiente_pago,
           c.f_ultimo_pago AS f_ultimo_pago,
           c.v_ultimo_pago AS v_ultimo_pago
    FROM credito c, planpagos pp
    WHERE c.k_identificacion = 1018453546
    AND c.k_id_credito = pp.k_id_credito
    AND c.q_cuota = pp.q_cuota;

*/