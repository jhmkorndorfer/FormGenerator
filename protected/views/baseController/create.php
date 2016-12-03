<?php
/* @var $this BaseControllerController */
/* @var $model Cadastro */

$this->breadcrumbs=array(
	'Cadastros'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cadastro', 'url'=>array('index')),
	array('label'=>'Manage Cadastro', 'url'=>array('admin')),
);
?>

<h1>Create Cadastro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>