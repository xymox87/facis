CREATE OR REPLACE TRIGGER tr_correo_electronico
BEFORE INSERT OR UPDATE ON socio
FOR EACH ROW

DECLARE

excepcion EXCEPTION;

BEGIN

    IF NOT REGEXP_LIKE(:new.o_correo_electronico,'+@+.+') THEN
        RAISE excepcion;
    END IF;

EXCEPTION
    WHEN excepcion THEN
        RAISE_APPLICATION_ERROR(-20000,'Correo electronico no valido');

END;
/