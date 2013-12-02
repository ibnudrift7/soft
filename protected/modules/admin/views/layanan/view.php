<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Page', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Page', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Page', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Page', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Page #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'parent',
		'url',
		'kode',
		'modul_target',
		'sort',
		'date_input',
		'date_modif',
		'active',
		'hidden',
		'modul',
	),
)); ?>
