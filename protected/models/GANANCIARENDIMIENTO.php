<?php

/**
 * This is the model class for table "GANANCIARENDIMIENTO".
 *
 * The followings are the available columns in table 'GANANCIARENDIMIENTO':
 * @property string $K_FECHA_RENDIMIENTO
 * @property integer $K_ID_GANANCIA
 */
class GANANCIARENDIMIENTO extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GANANCIARENDIMIENTO the static model class
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
		return 'GANANCIARENDIMIENTO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('K_FECHA_RENDIMIENTO, K_ID_GANANCIA', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'K_FECHA_RENDIMIENTO' => 'K Fecha Rendimiento',
			'K_ID_GANANCIA' => 'K Id Ganancia',
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

		$criteria->compare('K_FECHA_RENDIMIENTO',$this->K_FECHA_RENDIMIENTO,true);
		$criteria->compare('K_ID_GANANCIA',$this->K_ID_GANANCIA);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}