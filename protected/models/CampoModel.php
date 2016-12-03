<?php

/**
 * This is the model class for table "campo".
 *
 * The followings are the available columns in table 'campo':
 * @property integer $CodTipoCampo
 * @property string $TabelaDeValidacao
 * @property string $numerico
 * @property integer $CodPessoaUltimaAtualizacao
 *
 * The followings are the available model relations:
 * @property Mascara[] $mascaras
 * @property Resultados[] $resultadoses
 */
class CampoModel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CampoModel the static model class
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
		return 'campo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TabelaDeValidacao, numerico', 'required'),
                        array('NomeCampo', 'required'),
			array('CodPessoaUltimaAtualizacao', 'numerical', 'integerOnly'=>true),
			array('TabelaDeValidacao, numerico', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('CodTipoCampo, TabelaDeValidacao, numerico, CodPessoaUltimaAtualizacao', 'safe', 'on'=>'search'),
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
			'mascaras' => array(self::HAS_MANY, 'Mascara', 'CodTipoCampo'),
			'resultadoses' => array(self::HAS_MANY, 'Resultados', 'CodTipoCampo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CodTipoCampo' => 'Cod Tipo Campo',
			'TabelaDeValidacao' => 'Tabela De Validacao',
                        'NomeCampo' => 'Nome do Campo',
			'numerico' => 'Numerico',
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

		$criteria->compare('CodTipoCampo',$this->CodTipoCampo);
		$criteria->compare('TabelaDeValidacao',$this->TabelaDeValidacao,true);
		$criteria->compare('numerico',$this->numerico,true);
		$criteria->compare('CodPessoaUltimaAtualizacao',$this->CodPessoaUltimaAtualizacao);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}