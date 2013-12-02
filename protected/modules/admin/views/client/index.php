<?php
$this->breadcrumbs=array(
	'Clients',
);

$this->menu=array(
	array('label'=>'Add Client', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Clients</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'client-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		// 'images',
		array(
			'name'=>'images',
			'type'=>'image',
			'value'=>'Client::Model()->getImage($data)',
		),
		'name',
		// 'active',
		// 'sort',
		array(
			'name'=>'sort',
			'type'=>'raw',
			'filter'=>false,
			'value'=>'SortOrder::sortButton($data,"'.$this->id.'","Client")',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>
