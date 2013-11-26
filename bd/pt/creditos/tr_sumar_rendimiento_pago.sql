CREATE OR REPLACE TRIGGER tr_sumar_rendimiento_pago
BEFORE INSERT ON pago
FOR EACH ROW

DECLARE

    lc_error NUMBER;
    lm_error VARCHAR(300);
    excepcion EXCEPTION;

BEGIN

    pk_creditos.pr_act_rendimiento_pago(lc_error, lm_error);
    IF lc_error IS NOT NULL AND lm_error IS NOT NULL THEN
        RAISE excepcion;
    END IF;

EXCEPTION
    WHEN OTHERS THEN
        RAISE_APPLICATION_ERROR(-20000,'No se ha podido hacer actualizacion del 
                                pago');
END tr_sumar_rendimiento_pago;
/