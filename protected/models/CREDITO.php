<?php


class CREDITO extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CREDITO the static model class
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
		return 'CREDITO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('F_APROBACION, F_DESEMBOLSO, V_CREDITO, V_SALDO, I_ESTADO, Q_CUOTAS, K_IDENTIFICACION, Q_CUOTA', 'required'),
			array('V_CREDITO, V_SALDO, Q_CUOTAS, K_IDENTIFICACION, Q_CUOTA', 'numerical', 'integerOnly'=>true),
			array('I_ESTADO', 'length', 'max'=>1),
			array('K_ID_CREDITO, F_APROBACION, F_DESEMBOLSO, F_ULTIMO_PAGO, V_ULTIMO_PAGO, V_CREDITO, V_SALDO, I_ESTADO, Q_CUOTAS, K_IDENTIFICACION, Q_CUOTA', 'safe', 'on'=>'search'),
			//array ('F_APROBACION, F_DESEMBOLSO, F_ULTIMO_PAGO',  )
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
			'dESCRIPCIONs' => array(self::HAS_MANY, 'DESCRIPCION', 'K_ID_CREDITO'),
			'pLANPAGOSes' => array(self::HAS_MANY, 'PLANPAGOS', 'K_ID_CREDITO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'K_ID_CREDITO' => 'Credito',
			'F_APROBACION' => 'Aprobacion',
			'F_DESEMBOLSO' => 'Desembolso',
			'F_ULTIMO_PAGO' => 'Fecha Ultimo Pago',
			'V_ULTIMO_PAGO' => 'Valor Ultimo Pago',
			'V_CREDITO' => 'V Credito',
			'V_SALDO' => 'Saldo',
			'I_ESTADO' => 'Estado',
			'Q_CUOTAS' => 'Cuotas',
			'K_IDENTIFICACION' => 'Identificacion',
			'Q_CUOTA' => 'Cuota',
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

		$criteria->compare('K_ID_CREDITO',$this->K_ID_CREDITO);
		$criteria->compare('F_APROBACION',$this->F_APROBACION,true);
		$criteria->compare('F_DESEMBOLSO',$this->F_DESEMBOLSO,true);
		$criteria->compare('F_ULTIMO_PAGO',$this->F_ULTIMO_PAGO,true);
		$criteria->compare('V_ULTIMO_PAGO',$this->V_ULTIMO_PAGO,true);
		$criteria->compare('V_CREDITO',$this->V_CREDITO);
		$criteria->compare('V_SALDO',$this->V_SALDO);
		$criteria->compare('I_ESTADO',$this->I_ESTADO,true);
		$criteria->compare('Q_CUOTAS',$this->Q_CUOTAS);
		$criteria->compare('K_IDENTIFICACION',$this->K_IDENTIFICACION);
		$criteria->compare('Q_CUOTA',$this->Q_CUOTA);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}