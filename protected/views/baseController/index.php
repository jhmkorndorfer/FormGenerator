<?php
/* @var $this BaseControllerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cadastros',
);

$this->menu=array(
	array('label'=>'Create Cadastro', 'url'=>array('create')),
	array('label'=>'Manage Cadastro', 'url'=>array('admin')),
);
?>

<h1>Cadastros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
