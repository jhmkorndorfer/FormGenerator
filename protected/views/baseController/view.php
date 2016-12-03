<?php
/* @var $this BaseControllerController */
/* @var $model Cadastro */

$this->breadcrumbs=array(
	'Cadastros'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Cadastro', 'url'=>array('index')),
	array('label'=>'Create Cadastro', 'url'=>array('create')),
	array('label'=>'Update Cadastro', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cadastro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cadastro', 'url'=>array('admin')),
);
?>

<h1>View Cadastro #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'cpf',
		'email',
		'senha',
		'sexo',
	),
)); ?>
