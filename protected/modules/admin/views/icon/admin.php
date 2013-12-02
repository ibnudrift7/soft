<?php
$this->breadcrumbs=array(
	'Icons'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Icon','url'=>array('index')),
	array('label'=>'Add Icon','url'=>array('create')),
);
?>

<h1>Manage Icons</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'icon-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'img',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
