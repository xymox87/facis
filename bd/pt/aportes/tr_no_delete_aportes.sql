CREATE OR REPLACE TRIGGER tr_no_delete_aportes
BEFORE DELETE ON aporte

DECLARE

excepcion EXCEPTION;

BEGIN

    RAISE excepcion;

EXCEPTION
    WHEN excepcion THEN
        RAISE_APPLICATION_ERROR(-20000,'No se puede borrar');

END;
/
