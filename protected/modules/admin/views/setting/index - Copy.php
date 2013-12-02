<?php
$this->breadcrumbs=array(
	'Settings',
);

$this->menu=array(
	// array('label'=>'Add Setting', 'icon'=>'plus-sign', 'url'=>array('create')),
);
?>

<h1>Settings</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'setting-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		// 'id',
		'name',
		'value',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}'
		),
	),
)); ?>
