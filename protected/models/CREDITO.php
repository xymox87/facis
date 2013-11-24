<?php

/**
 * This is the model class for table "CREDITO".
 *
 * The followings are the available columns in table 'CREDITO':
 * @property integer $K_ID_CREDITO
 * @property string $F_APROBACION
 * @property string $F_DESEMBOLSO
 * @property string $F_ULTIMO_PAGO
 * @property double $V_ULTIMO_PAGO
 * @property integer $V_CREDITO
 * @property integer $V_SALDO
 * @property string $I_ESTADO
 * @property integer $Q_CUOTAS
 * @property integer $K_IDENTIFICACION
 * @property integer $Q_CUOTA
 * @property integer $K_ID_DESCRIPCION
 *
 * The followings are the available model relations:
 * @property PLANPAGOS[] $pLANPAGOSes
 * @property DESCRIPCIONTIPOCREDITO $kIDDESCRIPCION
 * @property SOCIO $kIDENTIFICACION
 */
class CREDITO extends CActiveRecord
{
    
        public $K_ID_DESCRIPCION;
                
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CREDITO the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'CREDITO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    /*
			array('F_DESEMBOLSO,F_APROBACION, V_CREDITO, Q_CUOTAS, K_IDENTIFICACION', 'required'),
			array('Q_CUOTAS, K_IDENTIFICACION, Q_CUOTA', 'numerical', 'integerOnly'=>true),
                        array('V_CREDITO, V_SALDO, V_ULTIMO_PAGO','numerical'),
			array('K_ID_CREDITO, F_APROBACION, F_DESEMBOLSO, F_ULTIMO_PAGO, V_ULTIMO_PAGO, V_CREDITO, V_SALDO, I_ESTADO, Q_CUOTAS, K_IDENTIFICACION, Q_CUOTA', 'safe', 'on'=>'search'),
                        array('K_IDENTIFICACION','val.ValidacionAportesAlDia'),
                        array('F_DESEMBOLSO','val.ValidacionFechaDesembolso'),
                        array('K_IDENTIFICACION','val.ValidacionSegunTipoCredito'),
                        array('K_IDENTIFICACION','val.ValidacionNCreditos'),
                        array('V_CREDITO','val.ValidacionCapitalDisponible'),
                        array('Q_CUOTAS','val.ValidacionCantidadCuotas'),
                        array('V_CREDITO','val.ValidacionValorCredito'),
                        array('Q_CUOTAS','val.ValidacionPlazoMaximoCredito'),
                     */
			array('F_DESEMBOLSO, V_CREDITO, V_SALDO, I_ESTADO, Q_CUOTAS, K_IDENTIFICACION, K_ID_DESCRIPCION', 'required'),
			array('V_CREDITO, V_SALDO, Q_CUOTAS, K_IDENTIFICACION, Q_CUOTA, K_ID_DESCRIPCION', 'numerical', 'integerOnly'=>true),
			array('V_ULTIMO_PAGO', 'numerical'),
			array('I_ESTADO', 'length', 'max'=>9),
			array('F_APROBACION, F_ULTIMO_PAGO', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('K_ID_CREDITO, F_APROBACION, F_DESEMBOLSO, F_ULTIMO_PAGO, V_ULTIMO_PAGO, V_CREDITO, V_SALDO, I_ESTADO, Q_CUOTAS, K_IDENTIFICACION, Q_CUOTA, K_ID_DESCRIPCION', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                        /*
                        'kIDDESCRIPCION' => array(self::BELONGS_TO,'DESCRIPCIONTIPOCREDITO','K_ID_DESCRIPCION'),
			'kIDENTIFICACION' => array(self::BELONGS_TO, 'SOCIO', 'K_IDENTIFICACION'),
                       */
			'pLANPAGOSes' => array(self::HAS_MANY, 'PLANPAGOS', 'K_ID_CREDITO'),
			'kIDDESCRIPCION' => array(self::BELONGS_TO, 'DESCRIPCIONTIPOCREDITO', 'K_ID_DESCRIPCION'),
			'kIDENTIFICACION' => array(self::BELONGS_TO, 'SOCIO', 'K_IDENTIFICACION'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
                  
			'K_ID_CREDITO' => 'Numero de credito',
			'F_APROBACION' => 'Aprobacion',
			'F_DESEMBOLSO' => 'Fecha de desembolso',
			'F_ULTIMO_PAGO' => 'Fecha del ultimo pago',
			'V_ULTIMO_PAGO' => 'Valor del ultimo pago',
			'V_CREDITO' => 'Valor del credito',
			'V_SALDO' => 'Saldo',
			'I_ESTADO' => 'Estado',
			'Q_CUOTAS' => 'Cuotas',
			'K_IDENTIFICACION' => 'Identificacion del socio',
			'Q_CUOTA' => 'Cuota actual',
                        'K_ID_DESCRIPCION' => 'Descripcion actual',
                   /*
			'K_ID_CREDITO' => 'K Id Credito',
			'F_APROBACION' => 'F Aprobacion',
			'F_DESEMBOLSO' => 'F Desembolso',
			'F_ULTIMO_PAGO' => 'F Ultimo Pago',
			'V_ULTIMO_PAGO' => 'V Ultimo Pago',
			'V_CREDITO' => 'V Credito',
			'V_SALDO' => 'V Saldo',
			'I_ESTADO' => 'I Estado',
			'Q_CUOTAS' => 'Q Cuotas',
			'K_IDENTIFICACION' => 'K Identificacion',
			'Q_CUOTA' => 'Q Cuota',
			'K_ID_DESCRIPCION' => 'K Id Descripcion',
                    */
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('K_ID_CREDITO',$this->K_ID_CREDITO);
		$criteria->compare('F_APROBACION',$this->F_APROBACION,true);
		$criteria->compare('F_DESEMBOLSO',$this->F_DESEMBOLSO,true);
		$criteria->compare('F_ULTIMO_PAGO',$this->F_ULTIMO_PAGO,true);
		$criteria->compare('V_ULTIMO_PAGO',$this->V_ULTIMO_PAGO);
		$criteria->compare('V_CREDITO',$this->V_CREDITO);
		$criteria->compare('V_SALDO',$this->V_SALDO);
		$criteria->compare('I_ESTADO',$this->I_ESTADO,true);
		$criteria->compare('Q_CUOTAS',$this->Q_CUOTAS);
		$criteria->compare('K_IDENTIFICACION',$this->K_IDENTIFICACION);
		$criteria->compare('Q_CUOTA',$this->Q_CUOTA);
                $criteria->compare('K_ID_DESCRIPCION',$this->K_ID_DESCRIPCION);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function numeroCreditosVigentesSocio($identificacion){
            $resultado = Yii::app()->db->createCommand("SELECT count(*) FROM credito "
                    . "WHERE i_estado LIKE 'vigente'"
                    . "GROUP BY (k_identificacion) HAVING (k_identificacion="
                    . (int)$identificacion.")")->queryColumn();
            if($resultado != NULL){
                return Conversion::conversionInt(current($resultado));
            }else
                return 0;
        }
        
        public function obtenerValorTodosCreditos(){
            $resultado = Yii::app()->db->createCommand(
                    "SELECT SUM(v_credito) FROM credito")->queryColumn();
            if($resultado != NULL){
                return Conversion::conversionDouble(current($resultado));
            }else
                return 0;
        }
        
        public function obtenerFechaDesembolsoCredito($id_credito){
            $resultado = Yii::app()->db->createCommand(
                    "SELECT f_desembolso FROM credito WHERE "
                    ."k_id_credito=$id_credito")->queryColumn();
            if($resultado != NULL){
                return current($resultado);
            }else
                return 0;
        }
}
