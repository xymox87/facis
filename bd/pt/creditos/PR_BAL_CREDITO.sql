create or replace 
PROCEDURE PR_BAL_CREDITO 
(
  PK_IDENTIFICACION OUT SOCIO.K_IDENTIFICACION%TYPE  
, PN_NOMBRE OUT SOCIO.N_NOMBRE%TYPE  
, PK_ID_CREDITO OUT CREDITO.K_ID_CREDITO%TYPE
, PV_CREDITO OUT CREDITO.V_CREDITO%TYPE  
, PQ_CUOTA OUT PLANPAGOS.Q_CUOTA%TYPE
, PV_PAGO OUT PAGO.V_PAGO%TYPE
, PF_PAGO OUT PAGO.F_PAGO%TYPE
) AS 
pc_error number(4);
prn_error varchar2(200);

CURSOR C_PAGO IS 
  SELECT S.K_IDENTIFICACION, S.N_NOMBRE, C.K_ID_CREDITO, C.V_CREDITO, PL.Q_CUOTA, P.V_PAGO, P.F_PAGO
  FROM SOCIO S, CREDITO C, PLANPAGOS PL, PAGO P
  WHERE S.K_IDENTIFICACION= C.K_IDENTIFICACION AND 
        C.K_ID_CREDITO = PL.K_ID_CREDITO AND
        P.K_ID_PLAN = PL.K_ID_PLAN;
        
rc_pago c_pago%ROWTYPE;        
BEGIN
  pc_error:=0;
  prn_error:=NULL;
  OPEN c_pago;
  
    LOOP  
    FETCH C_PAGO INTO rc_pago;
    -- Select SUM (PAGO.V_PAGO) INTO PV_PAGO from PAGO, PLANPAGOS,CREDITO where PAGO.K_ID_CREDITO = PLANPAGOS.K_ID_CREDITO;
    EXIT WHEN c_pago%NOTFOUND;
    DBMS_OUTPUT.PUT_LINE ('45asdf');
    END LOOP;
  CLOSE c_pago;  
END PR_BAL_CREDITO;

/