/*--------------------------------------------------------------------------
    Proyecto: Fondo de ahorros y creditos para ingenieros de sistemas FACIS
    Descripción: Este paquete lista las funciones y los procedimientos
                 correspondientes al manejo de creditos.
    Autor: Nicolás Mauricio García Garzón, John David Cravajal
    Fecha: 2013/11/24
--------------------------------------------------------------------------*/

CREATE OR REPLACE PACKAGE pk_creditos AS

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
                         RETURN VARCHAR;

/*--------------------------------------------------------------------------
    Procedimiento que hace un update a los rendimientos cuando se adiciona
    un nuevo pago a cualquier crédito
       
    Parámetros de salida:
        pc_error            Variable que tendrá el código de error
        pm_error            Variable que tendrá el mensaje de error
--------------------------------------------------------------------------*/

PROCEDURE pr_act_rendimiento_pago(pc_error OUT NUMBER,
                                    pm_error OUT VARCHAR);

/*--------------------------------------------------------------------------
    Procedimiento que hace un update a los rendimientos cuando se adiciona
    un nuevo crédito
       
    Parámetros de entrada:
        pv_credito          Valor por el cuál se está registrando el crédito

    Parámetros de salida:
        pc_error            Variable que tendrá el código de error
        pm_error            Variable que tendrá el mensaje de error
--------------------------------------------------------------------------*/

PROCEDURE pr_act_rendimiento_credito(pv_credito credito.v_credito%TYPE,
                                    pc_error OUT NUMBER,
                                    pm_error OUT VARCHAR);
/*--------------------------------------------------------------------------
    Procedimiento que crea los registros correspondientes al plan de pagos 
    Se llama despues de que un credito cambia su estado en plan de pagos 
       
    Parámetros de entrada:
        pk_credito          Identificador del Credito

    Parámetros de salida:
        
 ------------------------------------------------------------------*/
 PROCEDURE PR_CREAR_PLANPAGOS(P_K_ID_CREDITO IN CREDITO.K_ID_CREDITO%TYPE);

/*--------------------------------------------------------------------------
    Función que valida que el valor del pago ingresado
  coincida con el valor del plan de pagos. 
  si es correcto devuelve verdadero caso contrario devuelve falso.

  Se ejecuta al realizar el pago.
    Parámetros de entrada:
        v_pago    Valor total del Pago
        k_id_plan  Pan de pagos al que pertenece el PAgo
    Retorno: BOOLEAN que indica si el pago cubre el valor del plan pago o no
             
--------------------------------------------------------------------------*/
FUNCTION   FU_VALIDAR_VALOR_PAGO(  P_V_PAGO IN PAGO.V_PAGO%TYPE
                                , P_K_ID_PLAN IN PLANPAGOS.K_ID_PLAN%TYPE
                                ) RETURN BOOLEAN;
/*--------------------------------------------------------------------------
    Procedimiento que actualiza el sado de un credito 
    Este procedimiento  se llama cada vez que se realiza el pago a un credito
       
    Parámetros de entrada:
        pk_numconsignación         Identificador del recibo de pago o numero de consignacion

    Parámetros de salida:
        
 ------------------------------------------------------------------*/
 PROCEDURE   PR_UPDATE_SALDO_CREDITO ( P_K_NUMCONSIGNACION IN PAGO.K_NUMCONSIGNACION%TYPE);


END pk_creditos;

/
/*
declare

retorno number := 0;

begin

select 1 into retorno from dual where pk_creditos.fu_socio_al_dia(1018453546) in ('T','N');

dbms_output.put_line(retorno);

exception

when others then
    NULL;

end; 

*/

