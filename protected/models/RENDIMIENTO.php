<?php

/**
 * This is the model class for table "RENDIMIENTO".
 *
 * The followings are the available columns in table 'RENDIMIENTO':
 * @property double $V_RENDIMIENTO
 * @property string $K_FECHA_RENDIMIENTO
 *
 * The followings are the available model relations:
 * @property GANANCIA[] $gANANCIAs
 */
class RENDIMIENTO extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RENDIMIENTO the static model class
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
		return 'RENDIMIENTO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('V_RENDIMIENTO', 'required'),
			array('V_RENDIMIENTO', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('V_RENDIMIENTO, K_FECHA_RENDIMIENTO', 'safe', 'on'=>'search'),
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
			'gANANCIAs' => array(self::MANY_MANY, 'GANANCIA', 'GANANCIARENDIMIENTO(K_FECHA_RENDIMIENTO, K_ID_GANANCIA)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'V_RENDIMIENTO' => 'V Rendimiento',
			'K_FECHA_RENDIMIENTO' => 'K Fecha Rendimiento',
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

		$criteria->compare('V_RENDIMIENTO',$this->V_RENDIMIENTO);
		$criteria->compare('K_FECHA_RENDIMIENTO',$this->K_FECHA_RENDIMIENTO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}