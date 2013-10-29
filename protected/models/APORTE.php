<?php

/**
 * This is the model class for table "APORTE".
 *
 * The followings are the available columns in table 'APORTE':
 * @property double $V_APORTE
 * @property string $F_CONSIGNACION
 * @property integer $K_NUMCONSIGNACION
 * @property integer $K_DESCAPORTE
 * @property integer $K_IDENTIFICACION
 * @property integer $K_CUENTA
 * @property integer $K_FPAGO
 *
 * The followings are the available model relations:
 * @property CUENTA $kCUENTA
 * @property DESCRIPCIONAPORTE $kDESCAPORTE
 * @property FORMAPAGO $kFPAGO
 * @property SOCIO $kIDENTIFICACION
 */
class APORTE extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return APORTE the static model class
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
		return 'APORTE';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('V_APORTE,K_NUMCONSIGNACION, F_CONSIGNACION, K_IDENTIFICACION, K_CUENTA, K_FPAGO', 'required'),
			array('K_DESCAPORTE, K_IDENTIFICACION, K_CUENTA, K_FPAGO', 'numerical', 'integerOnly'=>true),
			array('V_APORTE', 'numerical'),
			array('V_APORTE, F_CONSIGNACION, K_NUMCONSIGNACION, K_DESCAPORTE, K_IDENTIFICACION, K_CUENTA, K_FPAGO', 'safe', 'on'=>'search'),
			
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
			'kDESCAPORTE' => array(self::BELONGS_TO, 'DESCRIPCIONAPORTE', 'K_DESCAPORTE'),
			'kFPAGO' => array(self::BELONGS_TO, 'FORMAPAGO', 'K_FPAGO'),
			'kIDENTIFICACION' => array(self::BELONGS_TO, 'SOCIO', 'K_IDENTIFICACION'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'V_APORTE' => 'Valor del aporte',
			'F_CONSIGNACION' => 'Fecha de consignacion',
			'K_NUMCONSIGNACION' => 'Numero de la consignacion',
			'K_DESCAPORTE' => 'descripcion aporte',
			'K_IDENTIFICACION' => 'Numero de identificacion del socio',
			'K_CUENTA' => 'Numero de cuenta',
			'K_FPAGO' => 'Forma de pago',
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

		$criteria->compare('V_APORTE',$this->V_APORTE);
		$criteria->compare('F_CONSIGNACION',$this->F_CONSIGNACION,true);
		$criteria->compare('K_NUMCONSIGNACION',$this->K_NUMCONSIGNACION);
		$criteria->compare('K_DESCAPORTE',$this->K_DESCAPORTE);
		$criteria->compare('K_IDENTIFICACION',$this->K_IDENTIFICACION);
		$criteria->compare('K_CUENTA',$this->K_CUENTA);
		$criteria->compare('K_FPAGO',$this->K_FPAGO);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}