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
			array('F_PAGO, V_PAGO, K_CUENTA, K_FPAGO, Q_NUMCUOTA, K_ID_CREDITO', 'required'),
			array('K_CUENTA, K_FPAGO, Q_NUMCUOTA, K_ID_CREDITO', 'numerical', 'integerOnly'=>true),
			array('V_PAGO', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('F_PAGO, K_NUMCONSIGNACION, V_PAGO, K_CUENTA, K_FPAGO, Q_NUMCUOTA, K_ID_CREDITO', 'safe', 'on'=>'search'),
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
			'F_PAGO' => 'F Pago',
			'K_NUMCONSIGNACION' => 'K Numconsignacion',
			'V_PAGO' => 'V Pago',
			'K_CUENTA' => 'K Cuenta',
			'K_FPAGO' => 'K Fpago',
			'Q_NUMCUOTA' => 'Q Numcuota',
			'K_ID_CREDITO' => 'K Id Credito',
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
}