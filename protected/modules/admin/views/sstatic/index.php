<?php
$this->breadcrumbs=array(
	'Sstatics',
);

$this->menu=array(
	array('label'=>'Add Sstatic', 'icon'=>'plus-sign', 'url'=>array('create')),
	array('label'=>'Manage Sstatic','url'=>array('admin')),
);
?>

<h1>Sstatics</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'sstatic-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		'id',
		'page',
		'metatitle',
		'metadesc',
		'metakey',
		'url',
		/*
		'desc',
		'img',
		'type',
		'sort',
		*/
	),
)); ?>
