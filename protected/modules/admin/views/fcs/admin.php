<?php
$this->breadcrumbs=array(
	'Fcs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Fcs', 'icon'=>'th-list', 'url'=>array('index')),
	array('label'=>'Add Fcs', 'icon'=>'plus-sign', 'url'=>array('create')),
);
?>

<h1>Manage Fcs</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'fcs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		'images',
		'url',
		'sort',
		// 'target_blank',
		'active',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
