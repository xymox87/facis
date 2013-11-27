/*--------------------------------------------------------------------------
    Proyecto: Fondo de ahorros y creditos para ingenieros de sistemas FACIS
    Descripción: Este paquete lista las funciones y los procedimientos
                 correspondientes al manejo de los rendimientos del fondo.
    Autor: Nicolás Mauricio García Garzón
    Fecha: 2013/11/24
--------------------------------------------------------------------------*/

CREATE OR REPLACE PACKAGE BODY pk_rendimientos AS

/*-------------------------------------------------------------------------
    Distribuye los rendimientos del fondo a los socios. La dis-
    tribución de los rendimientos se hará con la siguiente dinámica:
    Los intereses por concepto de crédito serán divididos en partes iguales
    para los socios que estén al día con el pago de sus aportes.
    

    Parámetros de salida: 
        pc_error        Código de error
        pm_error        Mensaje de error
--------------------------------------------------------------------------*/

PROCEDURE pr_dividir_rendimientos_socios(pc_error OUT NUMBER, 
                                            pm_error OUT VARCHAR) IS

v_rendimiento_anual rendimiento.v_rendimientos_financieros%TYPE;
v_aportes_totales rendimiento.v_aportes%TYPE;
k_id_rendimiento rendimiento.k_id_rendimiento%TYPE;
c_n_socios_al_dia NUMBER;
v_aporte_socio_actual NUMBER;

CURSOR c_socios IS
    SELECT k_identificacion
    FROM socio 
    WHERE pk_creditos.fu_socio_al_dia(k_identificacion) IN ('T','N') 
    AND pk_aportes.fu_socio_al_dia(k_identificacion) IN ('T','N');

CURSOR c_cuenta_socios IS
    SELECT COUNT(*) AS cuenta
    FROM socio 
    WHERE pk_creditos.fu_socio_al_dia(k_identificacion) IN ('T','N') 
    AND pk_aportes.fu_socio_al_dia(k_identificacion) IN ('T','N');

CURSOR c_aportes_socio(pc_identificacion socio.k_identificacion%TYPE) IS
    SELECT SUM(v_aporte) AS v_aporte
    FROM aporte
    WHERE f_consignacion BETWEEN 
       TO_DATE(TO_CHAR(ADD_MONTHS(sysdate,-12),'dd-mm-yyyy'),'dd-mm-yyyy') 
        AND sysdate--TO_DATE(TO_CHAR(sysdate,'dd-mm-yyyy'),'dd-mm-yyyy') - 1
    GROUP BY k_identificacion
    HAVING k_identificacion = pc_identificacion;

BEGIN
    
    SELECT v_rendimientos_financieros, v_aportes, k_id_rendimiento
    INTO v_rendimiento_anual, v_aportes_totales, k_id_rendimiento
    FROM rendimiento
    WHERE f_rendimiento = TO_DATE(TO_CHAR(ADD_MONTHS(sysdate,0/*-12*/),'yyyy'),'yyyy');
    
    FOR r_c_cuenta_socios IN c_cuenta_socios LOOP
        c_n_socios_al_dia := r_c_cuenta_socios.cuenta;
    END LOOP;

    FOR r_c_socios IN c_socios LOOP
        FOR r_c_aportes_socio IN c_aportes_socio(r_c_socios.k_identificacion) LOOP
            v_aporte_socio_actual := r_c_aportes_socio.v_aporte;
        END LOOP;
        v_aporte_socio_actual := v_aporte_socio_actual / v_aportes_totales;
        INSERT INTO ganancia VALUES
            (seq_ganancia.nextval, v_rendimiento_anual * v_aporte_socio_actual,
             sysdate,v_rendimiento_anual||'*'||v_aporte_socio_actual,
             r_c_socios.k_identificacion);
        INSERT INTO gananciarendimiento VALUES (k_id_rendimiento,
                                                seq_ganancia.currval);
    END LOOP;

    COMMIT;

EXCEPTION
    WHEN OTHERS THEN
        pc_error := sqlcode;
        pm_error := sqlerrm;

END pr_dividir_rendimientos_socios;

/*-------------------------------------------------------------------------
    
    Calcula el capital disponible del fondo en un periodo de tiempo
    
    Parámetros de entrada:
        pf_inicial      Fecha inicial
        pf_final        Fecha final

    Parámetros de salida: 
        pc_error        Código de error
        pm_error        Mensaje de error

    Retorno:
        Retorna un NUMBER con el capital disponible del fondo en el periodo de
        tiempo dado
--------------------------------------------------------------------------*/

FUNCTION fu_calcular_capital_disponible(pf_inicial DATE,
                                         pf_final DATE, 
                                         pc_error OUT NUMBER,
                                         pm_error OUT VARCHAR
                                         ) RETURN NUMBER IS

v_aportes_periodo rendimiento.v_aportes%TYPE;
v_creditos_periodo rendimiento.v_creditos%TYPE;

BEGIN

    SELECT SUM(v_aportes), SUM(v_creditos)
    INTO v_aportes_periodo, v_creditos_periodo
    FROM rendimiento
    WHERE f_rendimiento BETWEEN pf_inicial AND pf_final
    GROUP BY (v_aportes, v_creditos);
    
    IF v_aportes_periodo IS NULL THEN
        v_aportes_periodo := 0;
    END IF;
    
    IF v_creditos_periodo IS NULL THEN
        v_creditos_periodo := 0;
    END IF;

    RETURN v_aportes_periodo - v_creditos_periodo;

EXCEPTION
    WHEN OTHERS THEN
        RETURN NULL;
        pc_error := sqlcode;
        pm_error := sqlerrm;

END fu_calcular_capital_disponible;

/*-------------------------------------------------------------------------
    
    Calcula el capital total del fondo  en un periodo de tiempo
    
    Parámetros de entrada:
        pf_inicial      Fecha inicial
        pf_final        Fecha final

    Parámetros de salida: 
        pc_error        Código de error
        pm_error        Mensaje de error

    Retorno:
        Retorna un NUMBER con el capital total del fondo en el periodo de
        tiempo dado
--------------------------------------------------------------------------*/

FUNCTION fu_calcular_capital_total(pf_inicial DATE,
                                   pf_final DATE, 
                                   pc_error OUT NUMBER,
                                   pm_error OUT VARCHAR
                                   ) RETURN NUMBER IS

v_aportes_periodo rendimiento.v_aportes%TYPE;
v_creditos_periodo rendimiento.v_creditos%TYPE;
v_rendimientos_finan_periodo rendimiento.v_rendimientos_financieros%TYPE;
v_gastos_finan_periodo rendimiento.v_gastos_financieros%TYPE;

BEGIN

    SELECT SUM(v_aportes), SUM(v_creditos), 
           SUM(v_gastos_financieros), SUM(v_rendimientos_financieros)
    INTO v_aportes_periodo, v_creditos_periodo, 
         v_gastos_finan_periodo, v_rendimientos_finan_periodo
    FROM rendimiento
    WHERE f_rendimiento BETWEEN pf_inicial AND pf_final
    GROUP BY (v_aportes, v_creditos, 
              v_gastos_financieros, v_rendimientos_financieros);
    
    IF v_aportes_periodo IS NULL THEN
        v_aportes_periodo := 0;
    END IF;
    
    IF v_creditos_periodo IS NULL THEN
        v_creditos_periodo := 0;
    END IF;

    IF v_rendimientos_finan_periodo IS NULL THEN
        v_rendimientos_finan_periodo := 0;
    END IF;

    IF v_gastos_finan_periodo IS NULL THEN
        v_gastos_finan_periodo := 0;
    END IF;

    RETURN v_aportes_periodo + v_rendimientos_finan_periodo
             - (v_creditos_periodo + v_gastos_finan_periodo);

EXCEPTION
    WHEN OTHERS THEN
        RETURN NULL;
        pc_error := sqlcode;
        pm_error := sqlerrm;

END fu_calcular_capital_total;

/*-------------------------------------------------------------------------
    
    Crea registro en la base de datos de un nuevo rendimiento anual

    Parámetros de salida: 
        pc_error        Código de error
        pm_error        Mensaje de error
--------------------------------------------------------------------------*/

PROCEDURE pr_crear_nuevo_rendimiento(pc_error OUT NUMBER,
                                             pm_error OUT VARCHAR
                                          ) IS

BEGIN

    INSERT INTO rendimiento VALUES
        (0,0,0,0,TO_DATE(TO_CHAR(sysdate,'yyyy'),'yyyy'),seq_rendimiento.nextval);

EXCEPTION
    WHEN OTHERS THEN
        pc_error := sqlcode;
        pm_error := sqlerrm;

END pr_crear_nuevo_rendimiento;

/*-------------------------------------------------------------------------
    
    Genera los estados de cuenta de cada socio para un periodo de tiempo

     Parámetros de entrada:
        pf_inicial      Fecha inicial
        pf_final        Fecha final

    Parámetros de salida: 
        pc_error        Código de error
        pm_error        Mensaje de error
--------------------------------------------------------------------------*/

PROCEDURE pr_generar_estados_cuenta(pf_inicial DATE,
                                    pf_final DATE, 
                                    pc_error OUT NUMBER,
                                    pm_error OUT VARCHAR
                                    ) IS

BEGIN

    NULL;

EXCEPTION
    WHEN OTHERS THEN
        pc_error := sqlcode;
        pm_error := sqlerrm;

END pr_generar_estados_cuenta;

END pk_rendimientos;
/*

declare

l_cuenta number;
lm_error VARCHAR2(300);
lc_error NUMBER;

begin

    l_cuenta := pk_rendimientos.fu_calcular_capital_disponible(to_date('01-11-2013'),to_date('01-11-2013'),lc_error,lm_error);
    dbms_output.put_line(lc_error||' '||lm_error||' '||l_cuenta);

end;

*/