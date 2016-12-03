<?php
/* @var $this ResultadosModelController */
/* @var $model ResultadosModel */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'resultados-model-sss-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CodMascara'); ?>
		<?php echo $form->textField($model,'CodMascara'); ?>
		<?php echo $form->error($model,'CodMascara'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CodTipoCampo'); ?>
		<?php echo $form->textField($model,'CodTipoCampo'); ?>
		<?php echo $form->error($model,'CodTipoCampo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CodFormulario'); ?>
		<?php echo $form->textField($model,'CodFormulario'); ?>
		<?php echo $form->error($model,'CodFormulario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CodPessoaResultado'); ?>
		<?php echo $form->textField($model,'CodPessoaResultado'); ?>
		<?php echo $form->error($model,'CodPessoaResultado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Valor'); ?>
		<?php echo $form->textField($model,'Valor'); ?>
		<?php echo $form->error($model,'Valor'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->