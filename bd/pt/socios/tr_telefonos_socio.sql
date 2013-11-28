CREATE OR REPLACE TRIGGER tr_telefonos
BEFORE INSERT OR UPDATE ON socio
FOR EACH ROW

DECLARE

excepcion_telefono EXCEPTION;

BEGIN

    IF (:new.o_telefono_trabajo IS NULL OR 
        REGEXP_LIKE(:new.o_telefono_trabajo,'*[a-Z]*')) OR
        :new.o_telefono_domicilio IS NULL OR 
        REGEXP_LIKE(:new.o_telefono_domicilio,'*[a-Z]*')) OR
        :new.o_telefono_celular IS NULL OR 
        REGEXP_LIKE(:new.o_telefono_celular,'*[a-Z]*')) THEN
        RAISE excepcion_telefono;
    END IF;

EXCEPTION
    WHEN excepcion_telefono THEN
        RAISE_APPLICATION_ERROR(-20000,'Un telefono no fue valido');

END;
/