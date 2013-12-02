<?php
$this->breadcrumbs=array(
	'Sstatics'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Sstatic', 'icon'=>'th-list', 'url'=>array('index')),
	array('label'=>'Add Sstatic', 'icon'=>'plus-sign', 'url'=>array('create')),
	array('label'=>'Edit Sstatic', 'icon'=>'pencil', 'url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Sstatic', 'icon'=>'trash', 'url'=>'#','htmlOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sstatic','url'=>array('admin')),
);
?>

<h1>View Sstatic #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'page',
		'metatitle',
		'metadesc',
		'metakey',
		'url',
		'desc',
		'img',
		'type',
		'sort',
	),
)); ?>
