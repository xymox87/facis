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

END pk_rendimientos;
/