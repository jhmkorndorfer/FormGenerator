<?php

/**
 * This is the model class for table "resultados".
 *
 * The followings are the available columns in table 'resultados':
 * @property integer $CodResultado
 * @property integer $CodMascara
 * @property integer $CodTipoCampo
 * @property integer $CodFormulario
 * @property integer $CodPessoaResultado
 * @property string $Valor
 *
 * The followings are the available model relations:
 * @property Mascara $codMascara
 * @property Campo $codTipoCampo
 * @property Formulario $codFormulario
 */
class ResultadosModel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ResultadosModel the static model class
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
		return 'resultados';
	}
        public function primaryKey() 
        { 	
                return 'CodResultado'; 
        }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CodMascara, CodTipoCampo, CodFormulario, CodPessoaResultado', 'required'),
			array('CodMascara, CodTipoCampo, CodFormulario, CodPessoaResultado', 'numerical', 'integerOnly'=>true),
			array('Valor', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CodResultado, CodMascara, CodTipoCampo, CodFormulario, CodPessoaResultado, Valor', 'safe', 'on'=>'search'),
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
			'codMascara' => array(self::BELONGS_TO, 'Mascara', 'CodMascara'),
			'codTipoCampo' => array(self::BELONGS_TO, 'Campo', 'CodTipoCampo'),
			'codFormulario' => array(self::BELONGS_TO, 'Formulario', 'CodFormulario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CodResultado' => 'Cod Resultado',
			'CodMascara' => 'Cod Mascara',
			'CodTipoCampo' => 'Cod Tipo Campo',
			'CodFormulario' => 'Cod Formulario',
			'CodPessoaResultado' => 'Cod Pessoa Resultado',
			'Valor' => 'Valor',
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

		$criteria->compare('CodResultado',$this->CodResultado);
		$criteria->compare('CodMascara',$this->CodMascara);
		$criteria->compare('CodTipoCampo',$this->CodTipoCampo);
		$criteria->compare('CodFormulario',$this->CodFormulario);
		$criteria->compare('CodPessoaResultado',$this->CodPessoaResultado);
		$criteria->compare('Valor',$this->Valor,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}