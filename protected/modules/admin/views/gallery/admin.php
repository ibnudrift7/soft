<?php
$this->breadcrumbs=array(
	'Galleries'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Gallery','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Add Gallery','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Manage Galleries</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'gallery-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_page',
		'title',
		'image',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
