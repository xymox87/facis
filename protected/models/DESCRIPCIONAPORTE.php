<?php

/**
 * This is the model class for table "DESCRIPCIONAPORTE".
 *
 * The followings are the available columns in table 'DESCRIPCIONAPORTE':
 * @property string $F_MODIFICACION
 * @property integer $Q_DIAS
 * @property double $V_MAXAPORTE
 * @property double $V_MINAPORTE
 * @property double $V_INTERES_MULTA
 * @property integer $K_DESCAPORTE
 *
 * The followings are the available model relations:
 * @property APORTE[] $aPORTEs
 */
class DESCRIPCIONAPORTE extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DESCRIPCIONAPORTE the static model class
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
		return 'DESCRIPCIONAPORTE';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('F_MODIFICACION, Q_DIAS, V_MAXAPORTE, V_MINAPORTE, V_INTERES_MULTA', 'required'),
			array('Q_DIAS', 'numerical', 'integerOnly'=>true),
			array('V_MAXAPORTE, V_MINAPORTE, V_INTERES_MULTA', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('F_MODIFICACION, Q_DIAS, V_MAXAPORTE, V_MINAPORTE, V_INTERES_MULTA, K_DESCAPORTE', 'safe', 'on'=>'search'),
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
			'aPORTEs' => array(self::HAS_MANY, 'APORTE', 'K_DESCAPORTE'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'F_MODIFICACION' => 'F Modificacion',
			'Q_DIAS' => 'Q Dias',
			'V_MAXAPORTE' => 'V Maxaporte',
			'V_MINAPORTE' => 'V Minaporte',
			'V_INTERES_MULTA' => 'V Interes Multa',
			'K_DESCAPORTE' => 'K Descaporte',
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

		$criteria->compare('F_MODIFICACION',$this->F_MODIFICACION,true);
		$criteria->compare('Q_DIAS',$this->Q_DIAS);
		$criteria->compare('V_MAXAPORTE',$this->V_MAXAPORTE);
		$criteria->compare('V_MINAPORTE',$this->V_MINAPORTE);
		$criteria->compare('V_INTERES_MULTA',$this->V_INTERES_MULTA);
		$criteria->compare('K_DESCAPORTE',$this->K_DESCAPORTE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}