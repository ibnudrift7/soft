<?php
$this->breadcrumbs=array(
	'Artikels',
);

$this->menu=array(
	array('label'=>'Add Artikel', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Artikels</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'artikel-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'header'=>'Title',
			'value'=>'$data->desc->title',
		),
		'date_input',
		'date_modif',
		array(
			'name'=>'active',
			'filter'=>array(
				'0'=>'No',
				'1'=>'Yes',
			),
			'value'=>'($data->active=="1")? "Yes" : "No" ',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/admin/artikel/delete", array("id" => $data->id))',
			'updateButtonUrl'=>'Yii::app()->createUrl("/admin/artikel/update", array("id" => $data->id))',
		),
	),
)); ?>
