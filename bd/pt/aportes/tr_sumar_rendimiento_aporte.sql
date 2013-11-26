CREATE OR REPLACE TRIGGER tr_sumar_rendimiento_aporte
BEFORE INSERT ON aporte
FOR EACH ROW

DECLARE

    lc_error NUMBER;
    lm_error VARCHAR(300);
    excepcion EXCEPTION;

BEGIN

    pk_aportes.pr_act_rendimiento_aporte(:new.v_aporte, :new.v_multa,
                                            lc_error, lm_error);
    IF lc_error = 2 THEN
       pk_aportes.pr_act_rendimiento_aporte(:new.v_aporte, :new.v_multa,
                                            lc_error, lm_error);
        IF lc_error IS NOT NULL AND lc_error = 1 THEN
            RAISE excepcion;
        END IF;
    ELSIF lc_error != 0 THEN
        RAISE excepcion;
    END IF;

EXCEPTION
    WHEN excepcion THEN
        RAISE_APPLICATION_ERROR(-20000, lm_error);
    WHEN OTHERS THEN
        dbms_output.put_line('puta!!!!!!!');
        RAISE_APPLICATION_ERROR(sqlcode, sqlerrm);

END tr_sumar_rendimiento_aporte;
/