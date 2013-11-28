CREATE OR REPLACE TRIGGER tr_min_max_v_aporte
BEFORE INSERT ON aporte
FOR EACH ROW

DECLARE

excepcion EXCEPTION;
v_min descripcionaporte.v_minaporte%TYPE;
v_max descripcionaporte.v_maxaporte%TYPE;

BEGIN

    SELECT v_minaporte, v_maxaporte INTO v_min, v_max
    FROM descripcionaporte
    WHERE f_modificacion IN (SELECT MAX(f_modificacion) 
                             FROM descripcionaporte);

    IF NOT :new.v_aporte BETWEEN v_min AND v_max THEN
        RAISE excepcion;
    END IF;

EXCEPTION
    WHEN excepcion THEN
        RAISE_APPLICATION_ERROR(-20000,'El valor de la multa no respeta '||
                'los valores minimos y maximos de ella');

END;
/