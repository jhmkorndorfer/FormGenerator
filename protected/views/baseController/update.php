<?php
/* @var $this BaseControllerController */
/* @var $model Cadastro */

$this->breadcrumbs=array(
	'Cadastros'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cadastro', 'url'=>array('index')),
	array('label'=>'Create Cadastro', 'url'=>array('create')),
	array('label'=>'View Cadastro', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Cadastro', 'url'=>array('admin')),
);
?>

<h1>Update Cadastro <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>