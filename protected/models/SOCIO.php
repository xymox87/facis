<?php

/**
 * This is the model class for table "SOCIO".
 *
 * The followings are the available columns in table 'SOCIO':
 * @property integer $K_IDENTIFICACION
 * @property string $N_NOMBRE
 * @property string $N_APELLIDO
 * @property string $I_ESTADO_CIVIL
 * @property string $N_OCUPACION
 * @property string $O_TARJETA_PROFESIONAL
 * @property string $I_GENERO
 * @property string $O_DIRECCION_DOMICILIO
 * @property string $O_DIRECCION_TRABAJO
 * @property string $O_CORREO_ELECTRONICO
 * @property string $O_TELEFONO_DOMICILIO
 * @property string $O_TELEFONO_TRABAJO
 * @property string $O_TELEFONO_CELULAR
 * @property string $F_INGRESO
 * @property string $F_RETIRO
 * @property string $O_CAUSAL_RETIRO
 *
 * The followings are the available model relations:
 * @property APORTE[] $aPORTEs
 * @property CREDITO[] $cREDITOs
 * @property GANANCIA[] $gANANCIAs
 */
class SOCIO extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SOCIO the static model class
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
		return 'SOCIO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('N_NOMBRE, N_APELLIDO, I_ESTADO_CIVIL, N_OCUPACION, O_TARJETA_PROFESIONAL, I_GENERO, O_DIRECCION_DOMICILIO, O_DIRECCION_TRABAJO, O_CORREO_ELECTRONICO, O_TELEFONO_DOMICILIO, O_TELEFONO_TRABAJO, O_TELEFONO_CELULAR, F_INGRESO', 'required'),
			array('N_NOMBRE, N_APELLIDO, N_OCUPACION, O_DIRECCION_DOMICILIO, O_DIRECCION_TRABAJO, O_CORREO_ELECTRONICO', 'length', 'max'=>50),
			array('I_ESTADO_CIVIL, I_GENERO', 'length', 'max'=>1),
			array('O_TARJETA_PROFESIONAL', 'length', 'max'=>20),
			array('O_TELEFONO_DOMICILIO, O_TELEFONO_TRABAJO, O_TELEFONO_CELULAR', 'length', 'max'=>15),
			array('O_CAUSAL_RETIRO', 'length', 'max'=>256),
			array('F_RETIRO', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('K_IDENTIFICACION, N_NOMBRE, N_APELLIDO, I_ESTADO_CIVIL, N_OCUPACION, O_TARJETA_PROFESIONAL, I_GENERO, O_DIRECCION_DOMICILIO, O_DIRECCION_TRABAJO, O_CORREO_ELECTRONICO, O_TELEFONO_DOMICILIO, O_TELEFONO_TRABAJO, O_TELEFONO_CELULAR, F_INGRESO, F_RETIRO, O_CAUSAL_RETIRO', 'safe', 'on'=>'search'),
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
			'aPORTEs' => array(self::HAS_MANY, 'APORTE', 'K_IDENTIFICACION'),
			'cREDITOs' => array(self::HAS_MANY, 'CREDITO', 'K_IDENTIFICACION'),
			'gANANCIAs' => array(self::HAS_MANY, 'GANANCIA', 'K_IDENTIFICACION'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'K_IDENTIFICACION' => 'Nuemro de identificacion',
			'N_NOMBRE' => 'Nombre',
			'N_APELLIDO' => 'Apellido',
			'I_ESTADO_CIVIL' => 'Estado Civil',
			'N_OCUPACION' => 'Ocupacion',
			'O_TARJETA_PROFESIONAL' => 'Numero de Tarjeta Profesional',
			'I_GENERO' => 'Genero',
			'O_DIRECCION_DOMICILIO' => 'Direccion Domicilio',
			'O_DIRECCION_TRABAJO' => 'Direccion Trabajo',
			'O_CORREO_ELECTRONICO' => 'Correo Electronico',
			'O_TELEFONO_DOMICILIO' => 'Telefono Domicilio',
			'O_TELEFONO_TRABAJO' => 'Telefono Trabajo',
			'O_TELEFONO_CELULAR' => 'Telefono Celular',
			'F_INGRESO' => 'Fecha Ingreso',
			'F_RETIRO' => 'Fecha Retiro',
			'O_CAUSAL_RETIRO' => 'Causal Retiro',
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

		$criteria->compare('K_IDENTIFICACION',$this->K_IDENTIFICACION);
		$criteria->compare('N_NOMBRE',$this->N_NOMBRE,true);
		$criteria->compare('N_APELLIDO',$this->N_APELLIDO,true);
		$criteria->compare('I_ESTADO_CIVIL',$this->I_ESTADO_CIVIL,true);
		$criteria->compare('N_OCUPACION',$this->N_OCUPACION,true);
		$criteria->compare('O_TARJETA_PROFESIONAL',$this->O_TARJETA_PROFESIONAL,true);
		$criteria->compare('I_GENERO',$this->I_GENERO,true);
		$criteria->compare('O_DIRECCION_DOMICILIO',$this->O_DIRECCION_DOMICILIO,true);
		$criteria->compare('O_DIRECCION_TRABAJO',$this->O_DIRECCION_TRABAJO,true);
		$criteria->compare('O_CORREO_ELECTRONICO',$this->O_CORREO_ELECTRONICO,true);
		$criteria->compare('O_TELEFONO_DOMICILIO',$this->O_TELEFONO_DOMICILIO,true);
		$criteria->compare('O_TELEFONO_TRABAJO',$this->O_TELEFONO_TRABAJO,true);
		$criteria->compare('O_TELEFONO_CELULAR',$this->O_TELEFONO_CELULAR,true);
		$criteria->compare('F_INGRESO',$this->F_INGRESO,true);
		$criteria->compare('F_RETIRO',$this->F_RETIRO,true);
		$criteria->compare('O_CAUSAL_RETIRO',$this->O_CAUSAL_RETIRO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}