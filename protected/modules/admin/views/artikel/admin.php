<?php
$this->breadcrumbs=array(
	'Artikels'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Artikel','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Add Artikel','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Manage Artikels</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'artikel-grid',
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
