<?php
$this->breadcrumbs=array(
	'Gallery Mains',
);

$this->menu=array(
	array('label'=>'Add GalleryMain', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Gallery Mains</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'gallery-main-grid',
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
			'deleteButtonUrl'=>'Yii::app()->createUrl("/admin/galleryMain/delete", array("id" => $data->id))',
			'updateButtonUrl'=>'Yii::app()->createUrl("/admin/galleryMain/update", array("id" => $data->id))',
		),
	),
)); ?>
