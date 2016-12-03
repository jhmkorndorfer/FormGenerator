<?php
/* @var $this FormularioModelController */
/* @var $model FormularioModel */
/* @var $form CActiveForm */
  $session=new CHttpSession;
  $session->open();
  $session->add('CodPessoa',1);
  
        
        //$cs->registerScript("backstretch", '$.backstretch("http://farm3.static.flickr.com/2443/3843020508_5325eaf761.jpg");');
//  echo Yii::app()->request->baseUrl.'/js/CriaMascara.js';
?>
        

<div class="form">
<h2>Cadastro de Formulário</h2>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'formulario-model-CadastrarFormulario-form',
	'enableAjaxValidation'=>false,
)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NomeFormulario'); ?>
		<?php echo $form->textField($model,'NomeFormulario'); ?>
		<?php echo $form->error($model,'NomeFormulario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DescricaoFormulario'); ?>
		<?php echo $form->textArea($model,'DescricaoFormulario'); ?>
		<?php echo $form->error($model,'DescricaoFormulario'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->