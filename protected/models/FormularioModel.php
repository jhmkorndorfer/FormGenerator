<?php

/**
 * This is the model class for table "formulario".
 *
 * The followings are the available columns in table 'formulario':
 * @property integer $CodFormulario
 * @property string $NomeFormulario
 * @property string $DescricaoFormulario
 * @property integer $CodCriadorFormulario
 * @property integer $CodPessoaUltimaAtualizacao
 *
 * The followings are the available model relations:
 * @property Mascara[] $mascaras
 * @property Resultados[] $resultadoses
 */
class FormularioModel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FormularioModel the static model class
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
		return 'Formulario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NomeFormulario', 'required'),
			array('CodCriadorFormulario, CodPessoaUltimaAtualizacao', 'numerical', 'integerOnly'=>true),
			array('NomeFormulario', 'length', 'max'=>30),
			array('DescricaoFormulario', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CodFormulario, NomeFormulario, DescricaoFormulario, CodCriadorFormulario, CodPessoaUltimaAtualizacao', 'safe', 'on'=>'search'),
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
			'mascaras' => array(self::HAS_MANY, 'Mascara', 'CodFormulario'),
			'resultadoses' => array(self::HAS_MANY, 'Resultados', 'CodFormulario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CodFormulario' => 'Cod Formulario',
			'NomeFormulario' => 'Nome Formulario',
			'DescricaoFormulario' => 'Descricao Formulario',
			'CodCriadorFormulario' => 'Cod Criador Formulario',
			'CodPessoaUltimaAtualizacao' => 'Cod Pessoa Ultima Atualizacao',
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

		$criteria->compare('CodFormulario',$this->CodFormulario);
		$criteria->compare('NomeFormulario',$this->NomeFormulario,true);
		$criteria->compare('DescricaoFormulario',$this->DescricaoFormulario,true);
		$criteria->compare('CodCriadorFormulario',$this->CodCriadorFormulario);
		$criteria->compare('CodPessoaUltimaAtualizacao',$this->CodPessoaUltimaAtualizacao);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}