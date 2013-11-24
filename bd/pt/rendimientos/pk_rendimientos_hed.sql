/*--------------------------------------------------------------------------
    Proyecto: Fondo de ahorros y creditos para ingenieros de sistemas FACIS
    Descripción: Este paquete lista las funciones y los procedimientos
                 correspondientes al manejo de los rendimientos del fondo.
    Autor: Nicolás Mauricio García Garzón
    Fecha: 2013/11/24
--------------------------------------------------------------------------*/

CREATE OR REPLACE PACKAGE pk_rendimientos_hed AS

/*-------------------------------------------------------------------------
    
    Calcula y distribuye los rendimientos del fondo a los socios

    Parámetros de salida: 
        pc_error        Código de error
        pm_error        Mensaje de error
--------------------------------------------------------------------------*/

PROCEDURE pr_calcular_rendimientos_socios(
    pc_error OUT NUMBER, pm_error OUT VARCHAR
);

END pk_rendimientos_hed;
/