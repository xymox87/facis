CREATE OR REPLACE TRIGGER tr_sumar_rendimiento_credito
BEFORE INSERT ON credito
FOR EACH ROW

DECLARE

    lc_error NUMBER;
    lm_error VARCHAR(300);
    excepcion EXCEPTION;
    
BEGIN

    pk_creditos.pr_act_rendimiento_credito(:new.v_credito, lc_error, lm_error);
    IF lc_error IS NOT NULL AND lm_error IS NOT NULL THEN
        RAISE excepcion;
    END IF;

EXCEPTION
    WHEN OTHERS THEN
        RAISE_APPLICATION_ERROR(-20000,'No se pudo crear el credito');

END tr_sumar_rendimiento_credito;
/