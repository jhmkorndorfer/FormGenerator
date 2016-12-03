<?php

/**
 * This is the model class for table "mascara".
 *
 * The followings are the available columns in table 'mascara':
 * @property integer $CodMascara
 * @@property string $NomeMascara
 * @property integer $CodTipoCampo
 * @property integer $CodFormulario
 * @property string $InicioValidade
 * @property string $FimValidade
 * @property string $htmlMascara
 *
 * The followings are the available model relations:
 * @property Campo $codTipoCampo
 * @property Formulario $codFormulario
 * @property Resultados[] $resultadoses
 */
class MascaraModel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MascaraModel the static model class
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
		return 'mascara';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NomeMascara, htmlMascara, CodTipoCampo, CodFormulario', 'required'),
			array('CodMascara, CodTipoCampo, CodFormulario', 'numerical', 'integerOnly'=>true),
			array('htmlMascara', 'length', 'max'=>2000),
                        array('NomeMascara', 'length', 'max'=>200),
			array('InicioValidade, FimValidade', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CodMascara, NomeMascara, CodTipoCampo, CodFormulario, InicioValidade, FimValidade, htmlMascara', 'safe', 'on'=>'search'),
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
			'codTipoCampo' => array(self::BELONGS_TO, 'Campo', 'CodTipoCampo'),
			'codFormulario' => array(self::BELONGS_TO, 'Formulario', 'CodFormulario'),
			'resultadoses' => array(self::HAS_MANY, 'Resultados', 'CodMascara'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CodMascara' => 'Cod Mascara',
			'CodTipoCampo' => 'Cod Tipo Campo',
			'CodFormulario' => 'Cod Formulario',
			'InicioValidade' => 'Inicio Validade',
			'FimValidade' => 'Fim Validade',
			'Comentario' => 'Comentario',
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

		$criteria->compare('CodMascara',$this->CodMascara);
                $criteria->compare('NomeMascara',$this->NomeMascara,true);
		$criteria->compare('CodTipoCampo',$this->CodTipoCampo);
		$criteria->compare('CodFormulario',$this->CodFormulario);
		$criteria->compare('InicioValidade',$this->InicioValidade,true);
		$criteria->compare('FimValidade',$this->FimValidade,true);
		$criteria->compare('htmlMascara',$this->htmlMascara,true);
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}