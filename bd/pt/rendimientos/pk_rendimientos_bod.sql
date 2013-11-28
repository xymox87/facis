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
    
    Genera los estados de cuenta de cada socio

    Parámetros de salida: 
        pc_error        Código de error
        pm_error        Mensaje de error
--------------------------------------------------------------------------*/

PROCEDURE pr_generar_estados_cuenta(pc_error OUT NUMBER,
                                    pm_error OUT VARCHAR
                                    ) IS

n_cadena_a_grabar VARCHAR(32000);

CURSOR c_estado_cuenta_socio IS
    SELECT k_identificacion, n_nombre, n_apellido, i_estado_civil, n_ocupacion,
           o_tarjeta_profesional, i_genero, o_direccion_domicilio,
           o_direccion_trabajo, o_correo_electronico, o_telefono_domicilio,
           o_telefono_trabajo, o_telefono_celular, f_ingreso
    FROM socio
    WHERE f_retiro IS NULL 
    AND o_causal_retiro IS NULL;

CURSOR c_estado_cuenta_aporte(pc_identificacion socio.k_identificacion%TYPE) IS
    SELECT v_aporte AS v_ultimo_aporte,
           f_consignacion AS f_ultimo_aporte,
           (SELECT SUM(v_aporte) 
             FROM aporte a 
             WHERE a.k_identificacion = pc_identificacion
            ) AS v_total_aportes
    FROM aporte
    WHERE k_identificacion = pc_identificacion
    AND f_consignacion IN (SELECT MAX(f_consignacion) 
                              FROM aporte ap
                              WHERE ap.k_identificacion = pc_identificacion);

CURSOR c_estado_cuenta_credito(pc_identificacion socio.k_identificacion%TYPE) IS
    SELECT c.k_id_credito AS k_id_credito,
           c.v_saldo AS v_saldo,
           pp.f_aconsignar AS f_siguiente_pago,
           (pp.v_xinteres + pp.v_xcapital - (SELECT SUM(v_pago)
                                            FROM pago p
                                            WHERE (pp.k_id_plan - 1 = p.k_id_plan OR 
                                            (pp.k_id_plan = p.k_id_plan AND pp.q_cuota = 1))
                                            AND  p.f_pago < pp.f_aconsignar))
           AS v_siguiente_pago,
           c.f_ultimo_pago AS f_ultimo_pago,
           c.v_ultimo_pago AS v_ultimo_pago
    FROM credito c, planpagos pp
    WHERE c.k_identificacion = pc_identificacion
    AND c.k_id_credito = pp.k_id_credito
    AND c.q_cuota = pp.q_cuota
    AND c.i_estado = 'V';

PROCEDURE pr_escribir_en_archivo(n_directorio VARCHAR,
                                 n_archivo VARCHAR,
                                 n_cadena_a_grabar VARCHAR) IS

fl_archivo UTL_FILE.file_type;

BEGIN
    
    fl_archivo := UTL_FILE.fopen(UPPER(n_directorio),n_archivo,'w');
    UTL_FILE.put_line(fl_archivo,n_cadena_a_grabar);
    UTL_FILE.fclose(fl_archivo);

EXCEPTION
    WHEN OTHERS THEN
        DBMS_OUTPUT.PUT_LINE(sqlerrm);
        UTL_FILE.fclose(fl_archivo);
        RAISE_APPLICATION_ERROR(sqlcode,sqlerrm);

END pr_escribir_en_archivo;


BEGIN
    FOR r_c_estado_cuenta_socio IN c_estado_cuenta_socio LOOP
        n_cadena_a_grabar := 'Datos basicos del socio;'||CHR(10);
        n_cadena_a_grabar := n_cadena_a_grabar || 'Identificacion;'||
                                r_c_estado_cuenta_socio.k_identificacion||
                                ';'||CHR(10);
        n_cadena_a_grabar := n_cadena_a_grabar || 'Nombre;'||
                                r_c_estado_cuenta_socio.n_nombre||' '||
                                r_c_estado_cuenta_socio.n_apellido||';'||CHR(10);
        n_cadena_a_grabar := n_cadena_a_grabar || 'Estado civil;';
        CASE r_c_estado_cuenta_socio.i_estado_civil
            WHEN 'S' THEN n_cadena_a_grabar := n_cadena_a_grabar || 'Soltero;'||CHR(10);
            WHEN 'C' THEN n_cadena_a_grabar := n_cadena_a_grabar || 'Casado;' ||CHR(10);
            WHEN 'D' THEN n_cadena_a_grabar := n_cadena_a_grabar || 'Divorciado;' ||CHR(10);
            WHEN 'V' THEN n_cadena_a_grabar := n_cadena_a_grabar || 'Viudo;' ||CHR(10);
            ELSE n_cadena_a_grabar := n_cadena_a_grabar || 'No definido;' ||CHR(10);
        END CASE;
        n_cadena_a_grabar := n_cadena_a_grabar || 'Ocupacion;'||
                                r_c_estado_cuenta_socio.n_ocupacion||
                                ';'||CHR(10);
        n_cadena_a_grabar := n_cadena_a_grabar || 'Tarjeta profesional;'||
                                r_c_estado_cuenta_socio.o_tarjeta_profesional||
                                ';'||CHR(10);
        n_cadena_a_grabar := n_cadena_a_grabar || 'Genero;';
        CASE r_c_estado_cuenta_socio.i_genero
            WHEN 'F' THEN n_cadena_a_grabar := n_cadena_a_grabar || 'Femenino;'||CHR(10);
            WHEN 'M' THEN n_cadena_a_grabar := n_cadena_a_grabar || 'Masculino;' ||CHR(10);
            ELSE n_cadena_a_grabar := n_cadena_a_grabar || 'No definido;' ||CHR(10);
        END CASE;
        n_cadena_a_grabar := n_cadena_a_grabar || 'Direccion de domicilio;'||
                                r_c_estado_cuenta_socio.o_direccion_domicilio||
                                ';'||CHR(10);
        n_cadena_a_grabar := n_cadena_a_grabar || 'Direccion de trabajo;'||
                                r_c_estado_cuenta_socio.o_direccion_trabajo||
                                ';'||CHR(10);
        n_cadena_a_grabar := n_cadena_a_grabar || 'Correo electronico;'||
                                r_c_estado_cuenta_socio.o_correo_electronico||
                                ';'||CHR(10);
        n_cadena_a_grabar := n_cadena_a_grabar || 'Telefono de domicilio;'||
                                r_c_estado_cuenta_socio.o_telefono_domicilio||
                                ';'||CHR(10);
        n_cadena_a_grabar := n_cadena_a_grabar || 'Telefono de trabajo;'||
                                r_c_estado_cuenta_socio.o_telefono_trabajo||
                                ';'||CHR(10);
        n_cadena_a_grabar := n_cadena_a_grabar || 'Telefono celular;'||
                                r_c_estado_cuenta_socio.o_telefono_celular||
                                ';'||CHR(10);
        n_cadena_a_grabar := n_cadena_a_grabar || 'Fecha de ingreso;'||
                                r_c_estado_cuenta_socio.f_ingreso||
                                ';'||CHR(10);
        n_cadena_a_grabar := n_cadena_a_grabar || ';;'||CHR(10)||
                                'Estado de aportes;'||CHR(10);
        FOR r_c_estado_cuenta_aporte IN c_estado_cuenta_aporte(r_c_estado_cuenta_socio.k_identificacion) LOOP
            n_cadena_a_grabar := n_cadena_a_grabar || 'Valor del ultimo aporte;'||
                                    r_c_estado_cuenta_aporte.v_ultimo_aporte||
                                    ';'||CHR(10);
            n_cadena_a_grabar := n_cadena_a_grabar || 'Fecha del ultimo aporte;'||
                                    r_c_estado_cuenta_aporte.f_ultimo_aporte||
                                    ';'||CHR(10);
            n_cadena_a_grabar := n_cadena_a_grabar || 'Suma total de aportes;'||
                                    r_c_estado_cuenta_aporte.v_total_aportes||
                                    ';'||CHR(10);
        END LOOP;
        n_cadena_a_grabar := n_cadena_a_grabar || ';;'||CHR(10);
        n_cadena_a_grabar := n_cadena_a_grabar || 'Estado de creditos;' ||CHR(10);
        n_cadena_a_grabar := n_cadena_a_grabar || 'Numero de credito;' ||
                                'Saldo del credito;' || 'Fecha del ultimo pago;' ||
                                'Valor del ultimo pago;' || 'Fecha del siguiente pago;' ||
                                'Valor del siguiente pago;' ||CHR(10);
        FOR r_c_estado_cuenta_credito IN c_estado_cuenta_credito(r_c_estado_cuenta_socio.k_identificacion) LOOP
            n_cadena_a_grabar := n_cadena_a_grabar || 
                                    r_c_estado_cuenta_credito.k_id_credito ||
                                    ';'||
                                    r_c_estado_cuenta_credito.v_saldo ||
                                    ';'||
                                    r_c_estado_cuenta_credito.f_ultimo_pago ||
                                    ';'||
                                    r_c_estado_cuenta_credito.v_ultimo_pago ||
                                    ';'||
                                    r_c_estado_cuenta_credito.f_siguiente_pago ||
                                    ';'||
                                    r_c_estado_cuenta_credito.v_siguiente_pago ||
                                    ';'||CHR(10);
        END LOOP;
        pr_escribir_en_archivo('dir_estados_cuenta','ec-'||
                                r_c_estado_cuenta_socio.k_identificacion||'-'||
                                TO_CHAR(sysdate,'mm-yyyy')||'.csv',n_cadena_a_grabar);
    END LOOP;
    
EXCEPTION
    WHEN OTHERS THEN
        pc_error := sqlcode;
        pm_error := sqlerrm;

END pr_generar_estados_cuenta;

END pk_rendimientos;
/