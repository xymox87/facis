CREATE OR REPLACE TRIGGER tr_sumar_rendimiento_aportes
BEFORE INSERT ON aporte
FOR EACH ROW

DECLARE

    lc_error NUMBER;
    lm_error VARCHAR(300);
    excepcion EXCEPTION;

BEGIN

    pk_aportes.pr_act_rendimiento_aporte(:new.v_aporte, :new.v_multa,
                                            lc_error, lm_error);
    IF lc_error IS NOT NULL AND lm_error IS NOT NULL THEN
        RAISE excepcion;
    END IF;

EXCEPTION
    WHEN OTHERS THEN
        RAISE_APPLICATION_ERROR(-20000,'No se pudo actualizar el 
                                último aporte del socio');

END tr_sumar_rendimiento_aportes;
/