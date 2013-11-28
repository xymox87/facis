/*--------------------------------------------------------------------------
    Proyecto: Fondo de ahorros y creditos para ingenieros de sistemas FACIS
    Descripción: Este paquete lista las funciones y los procedimientos
                 correspondientes al manejo de creditos.
    Autor: Nicolás Mauricio García Garzón, John David Carvajal Rivera
    Fecha: 2013/11/24
--------------------------------------------------------------------------*/

CREATE OR REPLACE PACKAGE pk_informes AS
/*--------------------------------------------------------------------------
    Procedimiento genera un informe de los creditos que han sifdo aprobados , 
    por los socios 
       
    Parámetros de entrada:
    Parámetros de salida:
      K_IDENTIFICACION OUT SOCIO 		Identificador del socio
	  N_NOMBRE OUT SOCIO                Nombre del Socio   
      K_ID_CREDITO OUT CREDITO          Identificador dfel Credito
      V_CREDITO OUT CREDITO             Valor del Credito
      Q_CUOTA OUT PLANPAGOS              Cuotas de Plan de Pagos
      V_PAGO OUT PAGO                    Valor pagado en los recibos de caja
       F_PAGO OUT PAGO                   Fecha de Pagos
    
  
 ------------------------------------------------------------------*/
 PROCEDURE PR_BAL_CREDITO
(
  PK_IDENTIFICACION OUT SOCIO.K_IDENTIFICACION%TYPE
, PN_NOMBRE OUT SOCIO.N_NOMBRE%TYPE
, PK_ID_CREDITO OUT CREDITO.K_ID_CREDITO%TYPE
, PV_CREDITO OUT CREDITO.V_CREDITO%TYPE
, PQ_CUOTA OUT PLANPAGOS.Q_CUOTA%TYPE
, PV_PAGO OUT PAGO.V_PAGO%TYPE
, PF_PAGO OUT PAGO.F_PAGO%TYPE
);



END pk_informes;
/