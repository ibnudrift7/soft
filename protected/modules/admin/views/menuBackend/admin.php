<?php
$this->breadcrumbs=array(
	'Menu Backends'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MenuBackend','url'=>array('index')),
	array('label'=>'Add MenuBackend','url'=>array('create')),
);
?>

<h1>Manage Menu Backends</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'menu-backend-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'parent',
		'name',
		'desc',
		'url',
		'action',
		/*
		'icon',
		'sort',
		'shortcut',
		'hidden',
		'active',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
