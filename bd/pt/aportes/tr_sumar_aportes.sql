CREATE OR REPLACE TRIGGER tr_sumar_rendimiento_aportes
BEFORE INSERT ON aporte
FOR EACH ROW

DECLARE

    v_rendimiento_anual rendimiento.v_rendimientos_financieros%TYPE;
    v_aportes_anuales rendimiento.v_aportes%TYPE;

BEGIN

    SELECT v_rendimientos_financieros, v_aportes
    INTO v_rendimiento_anual, v_aportes_anuales
    FROM rendimiento
    WHERE f_rendimiento = TO_DATE(TO_CHAR(ADD_MONTHS(sysdate,-12),'yyyy'),'yyyy');
    
    UPDATE rendimiento SET v_rendimientos_financieros = v_rendimiento_anual + 
                            :new.v_multa, 
                           v_aportes = v_aportes_anuales + :new.v_aporte
    WHERE f_rendimiento = TO_DATE(TO_CHAR(ADD_MONTHS(sysdate,-12),'yyyy'),'yyyy');

EXCEPTION
    WHEN OTHERS THEN
        RAISE_APPLICATION_ERROR(-20000,'No se pudo actualizar el 
                                último aporte del socio');

END tr_sumar_rendimiento_aportes;
/