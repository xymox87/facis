CREATE OR REPLACE TRIGGER tr_multas_en_aporte
BEFORE INSERT ON aporte
FOR EACH ROW

DECLARE

q_dias_da descripcionaporte.q_dias%TYPE;
v_interes_multa_da descripcionaporte.v_interes_multa%TYPE;
v_minaporte_da descripcionaporte.v_minaporte%TYPE;
f_inicio_mes DATE := TO_DATE(TO_CHAR(sysdate,'dd-mm-yyyy'),'dd-mm-yyyy') -
            TO_DATE(TO_CHAR(sysdate,'dd'),'dd') + TO_DATE('01','dd');
excepcion_multa_nula EXCEPTION;
excepcion_multa_insuficiente EXCEPTION;
f_final DATE;

BEGIN

    SELECT q_dias, v_interes_multa, v_minaporte INTO q_dias_da, v_interes_multa_da, v_minaporte_da
    FROM descripcionaporte
    WHERE f_modificacion IN (SELECT MAX(f_modificacion) 
                             FROM descripcionaporte);

    f_final := TO_DATE(q_dias_da,'dd');
    
IF :new.f_consignacion BETWEEN f_inicio_mes AND f_final THEN
            IF :new.v_multa IS NULL THEN
                RAISE excepcion_multa_nula;
            ELSIF :new.v_multa < v_minaporte_da*v_interes_multa_da THEN
                RAISE excepcion_multa_insuficiente;
            END IF;
    END IF;

EXCEPTION
    WHEN excepcion_multa_nula THEN
        RAISE_APPLICATION_ERROR(-20000,'Fecha de pago rebasada. Se debe ingresar valor de multa');
    WHEN excepcion_multa_insuficiente THEN
        RAISE_APPLICATION_ERROR(-20000,'El valor de la multa es insuficiente');

END;
/
