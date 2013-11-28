CREATE OR REPLACE TRIGGER tr_fecha_retiro
BEFORE INSERT OR UPDATE ON socio
FOR EACH ROW

DECLARE

excepcion_insert EXCEPTION;
excepcion_update EXCEPTION;

BEGIN

    IF INSERTING AND :new.f_retiro IS NOT NULL THEN
        RAISE excepcion_insert;
    END IF;
        
    IF UPDATING AND :new.f_retiro < sysdate THEN
        RAISE excepcion_update;
    END IF;

EXCEPTION
    WHEN excepcion_insert THEN
        RAISE_APPLICATION_ERROR(-20000,'No se puede insertar valor en fecha'||
                    ' de retiro para un socio recien ingresado');
    WHEN excepcion_update THEN
        RAISE_APPLICATION_ERROR(-20000,'Fecha de retiro ingresada menor a la fecha actual');

END;
/