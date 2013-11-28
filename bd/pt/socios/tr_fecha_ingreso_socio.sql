CREATE OR REPLACE TRIGGER tr_fecha_ingreso
BEFORE INSERT OR UPDATE ON socio
FOR EACH ROW

DECLARE

excepcion_insert EXCEPTION;
excepcion_update EXCEPTION;

BEGIN

    IF INSERTING AND :new.f_ingreso < sysdate THEN
        RAISE excepcion_insert;
    END IF;
        
    IF UPDATING AND :new.f_ingreso != :old.f_ingreso THEN
        RAISE excepcion_update;
    END IF;

EXCEPTION
    WHEN excepcion_insert THEN
        RAISE_APPLICATION_ERROR(-20000,'Fecha ingresada menor a la fecha actual');
    WHEN excepcion_update THEN
        RAISE_APPLICATION_ERROR(-20000,'No se puede actualizar la fecha de ingreso');

END;
/    