<?php

/**
 * This is the model class for table "TIPO_CREDITO".
 *
 * The followings are the available columns in table 'TIPO_CREDITO':
 * @property integer $K_IDENTIFICADOR
 * @property string $I_TIPO
 * @property string $N_DESCRIPCION
 *
 * The followings are the available model relations:
 * @property DESCRIPCIONTIPOCREDITO $dESCRIPCIONTIPOCREDITO
 */
class TIPOCREDITO extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TIPOCREDITO the static model class
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
		return 'TIPO_CREDITO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('I_TIPO, N_DESCRIPCION', 'required'),
			array('I_TIPO', 'length', 'max'=>50),
			array('N_DESCRIPCION', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('K_IDENTIFICADOR, I_TIPO, N_DESCRIPCION', 'safe', 'on'=>'search'),
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
			'dESCRIPCIONTIPOCREDITO' => array(self::HAS_ONE, 'DESCRIPCIONTIPOCREDITO', 'K_ID_DESCRIPCION'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'K_IDENTIFICADOR' => 'K Identificador',
			'I_TIPO' => 'I Tipo',
			'N_DESCRIPCION' => 'N Descripcion',
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

		$criteria->compare('K_IDENTIFICADOR',$this->K_IDENTIFICADOR);
		$criteria->compare('I_TIPO',$this->I_TIPO,true);
		$criteria->compare('N_DESCRIPCION',$this->N_DESCRIPCION,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}