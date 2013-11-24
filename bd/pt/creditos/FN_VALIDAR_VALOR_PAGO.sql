--------------------------------------------------------
-- Archivo creado  - lunes-noviembre-11-2013   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Function FN_VALIDAR_VALOR_PAGO
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "FACIS"."FN_VALIDAR_VALOR_PAGO" 
(
  P_V_PAGO IN PAGO.V_PAGO%TYPE 
, P_K_ID_PLAN IN PLANPAGOS.K_ID_PLAN%TYPE
) RETURN BOOLEAN AS 

  L_V_TOTAL_CUOTA NUMBER(15,2);
 
 /*
 
  Esta funcion valida que el valor del pago ingresado
  coincida con el valor del plan de pagos. si es correcto devuelve verdadero caso contrario devuelve falso.
  
  Se deberia ejecutar al realizar el pago.
 
 */
 
BEGIN
  
  SELECT V_XINTERES + V_XCAPITAL
  INTO   L_V_TOTAL_CUOTA 
  FROM PLANPAGOS
  WHERE K_ID_PLAN = P_K_ID_PLAN;
  
  IF P_V_PAGO = L_V_TOTAL_CUOTA THEN
    RETURN TRUE;
  ELSE
    RETURN FALSE;
  END IF;
  
EXCEPTION
WHEN NO_DATA_FOUND THEN
  RETURN FALSE;
END FN_VALIDAR_VALOR_PAGO;

/
