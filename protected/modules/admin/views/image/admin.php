<?php
$this->breadcrumbs=array(
	'Images'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Image','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Add Image','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Manage Images</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'image-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_kat',
		'image',
		'sort',
		'sort2',
		'tampil_home',
		/*
		'active',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
