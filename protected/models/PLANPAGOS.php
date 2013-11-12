<?php

/**
 * This is the model class for table "PLANPAGOS".
 *
 * The followings are the available columns in table 'PLANPAGOS':
 * @property integer $Q_CUOTA
 * @property double $V_XINTERES
 * @property double $V_XCAPITAL
 * @property string $F_ACONSIGNAR
 * @property integer $K_ID_CREDITO
 * @property double $V_PAGO
 * 
 * The followings are the available model relations:
 * @property PAGO[] $pAGOs
 * @property PAGO[] $pAGOs1
 * @property CREDITO $kIDCREDITO
 */
class PLANPAGOS extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PLANPAGOS the static model class
	 */
    
         public $V_PAGO;
    
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'PLANPAGOS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('V_XINTERES, V_XCAPITAL, F_ACONSIGNAR', 'required'),
			array('V_XINTERES, V_XCAPITAL', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Q_CUOTA, V_XINTERES, V_XCAPITAL, F_ACONSIGNAR, K_ID_CREDITO', 'safe', 'on'=>'search'),
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
			'pAGOs' => array(self::HAS_MANY, 'PAGO', 'Q_NUMCUOTA'),
			'pAGOs1' => array(self::HAS_MANY, 'PAGO', 'K_ID_CREDITO'),
			'kIDCREDITO' => array(self::BELONGS_TO, 'CREDITO', 'K_ID_CREDITO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Q_CUOTA' => 'Q Cuota',
			'V_XINTERES' => 'V Xinteres',
			'V_XCAPITAL' => 'V Xcapital',
			'F_ACONSIGNAR' => 'F Aconsignar',
			'K_ID_CREDITO' => 'K Id Credito',
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

		$criteria->compare('Q_CUOTA',$this->Q_CUOTA);
		$criteria->compare('V_XINTERES',$this->V_XINTERES);
		$criteria->compare('V_XCAPITAL',$this->V_XCAPITAL);
		$criteria->compare('F_ACONSIGNAR',$this->F_ACONSIGNAR,true);
		$criteria->compare('K_ID_CREDITO',$this->K_ID_CREDITO);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function generar($id_credito, $cuotas, $fechaDesembolso,$interes,$capitalInicial){
            $objetoFecha = new Fecha;
            $objetoFecha->setZonaHoraria("America/Bogota");
            $this->K_ID_CREDITO = $id_credito;
            $this->V_XINTERES = 0;
            $this->V_XCAPITAL = 0;
            $fecha = $objetoFecha->arrayFecha($fechaDesembolso);
            $fecha['d']=5;
            for($i=1; $i <= (int)$cuotas; $i++){
                if($fecha['m'] + 1 == 13)
                    $fecha['a'] = ($fecha['a'])%99+1;
                $fecha['m'] = ($fecha['m'])%12+1;
                $this->Q_CUOTA=$i;
                $this->F_ACONSIGNAR = $objetoFecha->arrayFechaToString($fecha);
                $this->V_XINTERES = $this->V_XINTERES + (double)$capitalInicial*(double)$interes*(double)$cuotas/12;
                $this->V_XCAPITAL = $this->V_XCAPITAL + (double)$capitalInicial/(double)$cuotas;
                $this->V_PAGO = (double)$capitalInicial*(double)$interes*(double)$cuotas/12 + (double)$capitalInicial/(double)$cuotas;
                Yii::app()->db->createCommand()->insert($this->tableName(),
                        array('Q_CUOTA'=> $this->Q_CUOTA,
                              'V_XINTERES'=> 2000,//$this->V_XINTERES,
                              'V_XCAPITAL' => 2000,//$this->V_XCAPITAL,
                              'F_ACONSIGNAR' => $this->F_ACONSIGNAR,
                              'K_ID_CREDITO' => $this->K_ID_CREDITO,
                              'V_PAGO' => 10)//$this->V_PAGO)
                              );
            }
        }
        
        public function obtenerEspecificacionPlanPagos($id_credito,$cuota){
            return Yii::app()->db->createCommand(
                    "SELECT * FROM planpagos WHERE k_id_credito="
                    ."$id_credito AND q_cuota=$cuota")->queryRow();
        }
}