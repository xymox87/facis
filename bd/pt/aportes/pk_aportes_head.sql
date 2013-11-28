/*--------------------------------------------------------------------------
    Proyecto: Fondo de ahorros y creditos para ingenieros de sistemas FACIS
    Descripción: Este paquete lista las funciones y los procedimientos
                 correspondientes al manejo de los aportes.
    Autor: Nicolás Mauricio García Garzón
    Fecha: 2013/11/24
--------------------------------------------------------------------------*/

CREATE OR REPLACE PACKAGE pk_aportes AS

/*--------------------------------------------------------------------------
    Función que verifica si un socio está al día con sus aportes o no
    
    Parámetros de entrada:
        pk_identificacion   Identificación del socio
        
    Parámetros de salida:
        pc_error            Variable que tendrá el código de error
        pm_error            Variable que tendrá el mensaje de error

    Retorno: VARCHAR que indica si el socio está o no al día con sus 
            aportes así: F - No está al día ; T - Está al día; N - No aplica
--------------------------------------------------------------------------*/

FUNCTION fu_socio_al_dia(pk_identificacion socio.k_identificacion%TYPE)
                         RETURN VARCHAR;

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
                                    pm_error OUT VARCHAR);

END pk_aportes;
/

