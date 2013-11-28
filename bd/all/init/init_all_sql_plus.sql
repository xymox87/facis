set serveroutput on

connect system/oracle2013
start C:\xampp\htdocs\facis\bd\all\init\init_facis_user.sql
connect system/oracle2013
--start C:\xampp\htdocs\facis\bd\all\init\init_facis_user.sql
>>>>>>> Temporary merge branch 2
connect facis/facis
start C:\xampp\htdocs\facis\bd\all\init\init_objects_facis.sql
connect system/oracle2013
start C:\xampp\htdocs\facis\bd\all\init\init_objects_dba_system.sql
start C:\xampp\htdocs\facis\bd\all\init\init_security.sql
--start C:\xampp\htdocs\facis\bd\all\init\init_security.sql
connect facis/facis

--INICIALIZANDO HEADERS PAQUETES

start C:\xampp\htdocs\facis\bd\pt\aportes\pk_aportes_head.sql
start C:\xampp\htdocs\facis\bd\pt\creditos\pk_creditos_head.sql
start C:\xampp\htdocs\facis\bd\pt\rendimientos\pk_rendimientos_head.sql

--INICIALIZANDO OBJETOS APORTES

start C:\xampp\htdocs\facis\bd\pt\aportes\pk_aportes_bod.sql
start C:\xampp\htdocs\facis\bd\pt\aportes\tr_sumar_rendimiento_aporte.sql

--INICIALIZANDO OBJETOS CREDITOS

--TEMPORAL CREDITOS

start C:\xampp\htdocs\facis\bd\pt\creditos\PR_UPDATE_SALDO_CREDITO.sql
start C:\xampp\htdocs\facis\bd\pt\creditos\PR_CREAR_PLANPAGOS.sql
start C:\xampp\htdocs\facis\bd\pt\creditos\PR_BAL_CREDITO.sql
start C:\xampp\htdocs\facis\bd\pt\creditos\FN_VALIDAR_VALOR_PAGO.sql

----------------------------------------------------------------------------

start C:\xampp\htdocs\facis\bd\pt\creditos\pk_creditos_bod.sql
start C:\xampp\htdocs\facis\bd\pt\creditos\tr_sumar_rendimiento_credito.sql
start C:\xampp\htdocs\facis\bd\pt\creditos\tr_sumar_rendimiento_pago.sql
start C:\xampp\htdocs\facis\bd\pt\creditos\tr_update_saldo_credito.sql
--start C:\xampp\htdocs\facis\bd\pt\creditos\tr_crear_planpagos.sql

--INICIALIZANDO OBJETOS RENDIMIENTOS

start C:\xampp\htdocs\facis\bd\pt\rendimientos\pk_rendimientos_bod.sql

--HACIENDO INSERTS

start C:\xampp\htdocs\facis\bd\all\init\init_insert_on_tables.sql