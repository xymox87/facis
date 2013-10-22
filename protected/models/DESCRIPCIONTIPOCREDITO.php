<?php

/**
 * This is the model class for table "DESCRIPCION_TIPO_CREDITO".
 *
 * The followings are the available columns in table 'DESCRIPCION_TIPO_CREDITO':
 * @property integer $K_ID_DESCRIPCION
 * @property string $F_ESTABLECIMIENTO
 * @property double $V_TASA_INTERES
 * @property integer $V_APORTE_MINIMO
 * @property integer $Q_PLAZO_MAXIMO
 *
 * The followings are the available model relations:
 * @property DESCRIPCION[] $dESCRIPCIONs
 * @property TIPOCREDITO $kIDDESCRIPCION
 */
class DESCRIPCIONTIPOCREDITO extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DESCRIPCIONTIPOCREDITO the static model class
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
		return 'DESCRIPCION_TIPO_CREDITO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('F_ESTABLECIMIENTO, V_TASA_INTERES, V_APORTE_MINIMO, Q_PLAZO_MAXIMO', 'required'),
			array('V_APORTE_MINIMO, Q_PLAZO_MAXIMO', 'numerical', 'integerOnly'=>true),
			array('V_TASA_INTERES', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('K_ID_DESCRIPCION, F_ESTABLECIMIENTO, V_TASA_INTERES, V_APORTE_MINIMO, Q_PLAZO_MAXIMO', 'safe', 'on'=>'search'),
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
			'dESCRIPCIONs' => array(self::HAS_MANY, 'DESCRIPCION', 'K_ID_DESCRIPCION'),
			'kIDDESCRIPCION' => array(self::BELONGS_TO, 'TIPOCREDITO', 'K_ID_DESCRIPCION'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'K_ID_DESCRIPCION' => 'K Id Descripcion',
			'F_ESTABLECIMIENTO' => 'F Establecimiento',
			'V_TASA_INTERES' => 'V Tasa Interes',
			'V_APORTE_MINIMO' => 'V Aporte Minimo',
			'Q_PLAZO_MAXIMO' => 'Q Plazo Maximo',
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

		$criteria->compare('K_ID_DESCRIPCION',$this->K_ID_DESCRIPCION);
		$criteria->compare('F_ESTABLECIMIENTO',$this->F_ESTABLECIMIENTO,true);
		$criteria->compare('V_TASA_INTERES',$this->V_TASA_INTERES);
		$criteria->compare('V_APORTE_MINIMO',$this->V_APORTE_MINIMO);
		$criteria->compare('Q_PLAZO_MAXIMO',$this->Q_PLAZO_MAXIMO);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}