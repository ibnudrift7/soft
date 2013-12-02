<?php
$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Add User', 'icon'=>'plus-sign', 'url'=>array('create')),
);
?>

<h1>Users</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		'user',
		'email',
		// 'id_hotel',
		array(
			'header'=>'',
			'type'=>'raw',
			'value'=>'CHtml::link("<i class=\'icon-user\'></i>", array("/admin/user/access", "id"=>$data->id))',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
