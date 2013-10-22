<?php

/**
 * This is the model class for table "GANANCIA".
 *
 * The followings are the available columns in table 'GANANCIA':
 * @property integer $K_ID_GANANCIA
 * @property double $V_GANANCIA
 * @property string $F_CORTE
 * @property string $O_PROCESO
 * @property integer $K_IDENTIFICACION
 *
 * The followings are the available model relations:
 * @property SOCIO $kIDENTIFICACION
 * @property RENDIMIENTO[] $rENDIMIENTOs
 */
class GANANCIA extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GANANCIA the static model class
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
		return 'GANANCIA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('V_GANANCIA, F_CORTE, O_PROCESO, K_IDENTIFICACION', 'required'),
			array('K_IDENTIFICACION', 'numerical', 'integerOnly'=>true),
			array('V_GANANCIA', 'numerical'),
			array('O_PROCESO', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('K_ID_GANANCIA, V_GANANCIA, F_CORTE, O_PROCESO, K_IDENTIFICACION', 'safe', 'on'=>'search'),
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
			'kIDENTIFICACION' => array(self::BELONGS_TO, 'SOCIO', 'K_IDENTIFICACION'),
			'rENDIMIENTOs' => array(self::MANY_MANY, 'RENDIMIENTO', 'GANANCIARENDIMIENTO(K_ID_GANANCIA, K_FECHA_RENDIMIENTO)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'K_ID_GANANCIA' => 'K Id Ganancia',
			'V_GANANCIA' => 'V Ganancia',
			'F_CORTE' => 'F Corte',
			'O_PROCESO' => 'O Proceso',
			'K_IDENTIFICACION' => 'K Identificacion',
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

		$criteria->compare('K_ID_GANANCIA',$this->K_ID_GANANCIA);
		$criteria->compare('V_GANANCIA',$this->V_GANANCIA);
		$criteria->compare('F_CORTE',$this->F_CORTE,true);
		$criteria->compare('O_PROCESO',$this->O_PROCESO,true);
		$criteria->compare('K_IDENTIFICACION',$this->K_IDENTIFICACION);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}