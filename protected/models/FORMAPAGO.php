<?php

/**
 * This is the model class for table "FORMAPAGO".
 *
 * The followings are the available columns in table 'FORMAPAGO':
 * @property integer $K_FPAGO
 * @property string $N_FPAGO
 *
 * The followings are the available model relations:
 * @property APORTE[] $aPORTEs
 * @property PAGO[] $pAGOs
 */
class FORMAPAGO extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FORMAPAGO the static model class
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
		return 'FORMAPAGO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('N_FPAGO', 'required'),
			array('N_FPAGO', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('K_FPAGO, N_FPAGO', 'safe', 'on'=>'search'),
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
			'aPORTEs' => array(self::HAS_MANY, 'APORTE', 'K_FPAGO'),
			'pAGOs' => array(self::HAS_MANY, 'PAGO', 'K_FPAGO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'K_FPAGO' => 'K Fpago',
			'N_FPAGO' => 'N Fpago',
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

		$criteria->compare('K_FPAGO',$this->K_FPAGO);
		$criteria->compare('N_FPAGO',$this->N_FPAGO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}