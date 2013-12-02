<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Page','url'=>array('index')),
	array('label'=>'Add Page','url'=>array('create')),
);
?>

<h1>Manage Pages</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'page-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'parent',
		'url',
		'kode',
		'modul_target',
		'sort',
		/*
		'date_input',
		'date_modif',
		'active',
		'hidden',
		'modul',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
