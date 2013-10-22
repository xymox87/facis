<?php

/**
 * This is the model class for table "CUENTA".
 *
 * The followings are the available columns in table 'CUENTA':
 * @property string $N_BANCO
 * @property integer $K_CUENTA
 * @property string $N_DESCUENTA
 *
 * The followings are the available model relations:
 * @property APORTE[] $aPORTEs
 * @property PAGO[] $pAGOs
 */
class CUENTA extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CUENTA the static model class
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
		return 'CUENTA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('N_BANCO', 'required'),
			array('N_BANCO', 'length', 'max'=>70),
			array('N_DESCUENTA', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('N_BANCO, K_CUENTA, N_DESCUENTA', 'safe', 'on'=>'search'),
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
			'aPORTEs' => array(self::HAS_MANY, 'APORTE', 'K_CUENTA'),
			'pAGOs' => array(self::HAS_MANY, 'PAGO', 'K_CUENTA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'N_BANCO' => 'N Banco',
			'K_CUENTA' => 'K Cuenta',
			'N_DESCUENTA' => 'N Descuenta',
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

		$criteria->compare('N_BANCO',$this->N_BANCO,true);
		$criteria->compare('K_CUENTA',$this->K_CUENTA);
		$criteria->compare('N_DESCUENTA',$this->N_DESCUENTA,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}