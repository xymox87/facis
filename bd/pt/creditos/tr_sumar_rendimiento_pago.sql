CREATE OR REPLACE TRIGGER tr_sumar_rendimiento_pago
BEFORE INSERT ON pago
FOR EACH ROW

DECLARE

v_xinteres_pago planpagos.v_xinteres%TYPE;
v_xcapital_pago planpagos.v_xcapital%TYPE;
v_rendimiento_anual rendimiento.v_rendimientos_financieros%TYPE;
v_creditos_anuales rendimiento.v_creditos%TYPE;

BEGIN

    SELECT v_rendimientos_financieros, v_creditos
    INTO v_rendimiento_anual, v_creditos_anuales
    FROM rendimiento
    WHERE f_rendimiento = TO_DATE(TO_CHAR(ADD_MONTHS(sysdate,-12),'yyyy'),'yyyy');

    SELECT v_xcapital, v_xinteres
    INTO v_xcapital_pago, v_xinteres_pago
    FROM planpagos pp,credito c
    WHERE pp.k_id_credito = c.k_id_credito AND c.q_cuota = pp.q_cuota;

    UPDATE rendimiento SET v_rendimientos_financieros = v_rendimiento_anual 
                            + v_xinteres_pago,
                           v_creditos = 
                            v_creditos_anuales - v_xcapital_pago
    WHERE f_rendimiento = TO_DATE(TO_CHAR(ADD_MONTHS(sysdate,-12),'yyyy'),'yyyy'); 

EXCEPTION
    WHEN OTHERS THEN
        RAISE_APPLICATION_ERROR(-20000,'No se ha podido hacer actualizacion del 
                                pago');
END tr_sumar_rendimiento_pago;
/