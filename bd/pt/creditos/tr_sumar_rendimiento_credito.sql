CREATE OR REPLACE TRIGGER tr_sumar_rendimiento_credito
BEFORE INSERT ON credito
FOR EACH ROW

DECLARE

    v_credito_anual rendimiento.v_creditos%TYPE;

BEGIN

    SELECT v_creditos
    INTO v_credito_anual
    FROM rendimiento
    WHERE f_rendimiento = TO_DATE(TO_CHAR(ADD_MONTHS(sysdate,-12),'yyyy'),'yyyy');

    UPDATE rendimiento SET v_creditos = v_credito_anual + :new.v_credito;

EXCEPTION
    WHEN OTHERS THEN
        RAISE_APPLICATION_ERROR(-20000,'No se pudo crear el credito');

END tr_sumar_rendimiento_credito;
/