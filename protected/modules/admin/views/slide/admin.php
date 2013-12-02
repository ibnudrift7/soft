<?php
$this->breadcrumbs=array(
	'Slides'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Slide','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Add Slide','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Manage Slides</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'slide-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'image',
		'url',
		'sort',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
