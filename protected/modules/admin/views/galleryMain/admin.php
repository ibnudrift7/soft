<?php
$this->breadcrumbs=array(
	'Gallery Mains'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	'Manage',
);

$this->menu=array(
	array('label'=>'List GalleryMain','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Add GalleryMain','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Manage Gallery Mains</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'gallery-main-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'date_input',
		'date_modif',
		'active',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
