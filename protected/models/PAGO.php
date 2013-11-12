<?php

/**
 * This is the model class for table "PAGO".
 *
 * The followings are the available columns in table 'PAGO':
 * @property string $F_PAGO
 * @property integer $K_NUMCONSIGNACION
 * @property double $V_PAGO
 * @property integer $K_CUENTA
 * @property integer $K_FPAGO
 * @property integer $Q_NUMCUOTA
 * @property integer $K_ID_CREDITO
 *
 * The followings are the available model relations:
 * @property CUENTA $kCUENTA
 * @property FORMAPAGO $kFPAGO
 * @property PLANPAGOS $qNUMCUOTA
 * @property PLANPAGOS $kIDCREDITO
 */
class PAGO extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PAGO the static model class
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
		return 'PAGO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('K_NUMCONSIGNACION, V_PAGO, K_CUENTA, K_FPAGO, K_ID_CREDITO', 'required'),
			array('K_CUENTA, K_FPAGO, Q_NUMCUOTA, K_ID_CREDITO', 'numerical', 'integerOnly'=>true),
			array('V_PAGO', 'numerical'),
			array('F_PAGO, K_NUMCONSIGNACION, V_PAGO, K_CUENTA, K_FPAGO, Q_NUMCUOTA, K_ID_CREDITO', 'safe', 'on'=>'search'),
                        array('V_PAGO','val.ValidacionPagoContraPlanPagos'),
                        array('F_PAGO','val.ValidacionFechaPago'),
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
			'kCUENTA' => array(self::BELONGS_TO, 'CUENTA', 'K_CUENTA'),
			'kFPAGO' => array(self::BELONGS_TO, 'FORMAPAGO', 'K_FPAGO'),
			'qNUMCUOTA' => array(self::BELONGS_TO, 'PLANPAGOS', 'Q_NUMCUOTA'),
			'kIDCREDITO' => array(self::BELONGS_TO, 'PLANPAGOS', 'K_ID_CREDITO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'F_PAGO' => 'Fecha de pago',
			'K_NUMCONSIGNACION' => 'Numero de consignacion',
			'V_PAGO' => 'Valor del pago',
			'K_CUENTA' => 'Numero de cuenta del banco',
			'K_FPAGO' => 'Forma de pago',
			'Q_NUMCUOTA' => 'Numero de cuota',
			'K_ID_CREDITO' => 'Numero de credito',
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

		$criteria->compare('F_PAGO',$this->F_PAGO,true);
		$criteria->compare('K_NUMCONSIGNACION',$this->K_NUMCONSIGNACION);
		$criteria->compare('V_PAGO',$this->V_PAGO);
		$criteria->compare('K_CUENTA',$this->K_CUENTA);
		$criteria->compare('K_FPAGO',$this->K_FPAGO);
		$criteria->compare('Q_NUMCUOTA',$this->Q_NUMCUOTA);
		$criteria->compare('K_ID_CREDITO',$this->K_ID_CREDITO);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function obtenerValorTodosPagos(){
            $resultado = Yii::app()->db->createCommand(
                    "SELECT SUM(v_pago) AS SUMA FROM pago")->queryColumn();
            if($resultado != NULL)
                return Conversion::conversionDouble(current($resultado));
            else
                return 0;
        }
        
        public function obtenerUltimoPagoCredito($id_credito){
            $resultado = Yii::app()->db->createCommand(
                    "SELECT max(q_numcuota) FROM pago "
                    ."GROUP BY k_id_credito HAVING "
                    ."(k_id_credito=$id_credito)")->queryColumn();
            if($resultado != NULL)
                return Conversion::conversionInt(current($resultado));
            else
                return 0;
        }
}