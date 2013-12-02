<?php
$this->breadcrumbs=array(
	'Foto Slide',
);

$this->menu=array(
	array('label'=>'Add Foto Slide', 'icon'=>'plus-sign', 'url'=>array('create')),
);
?>

<h1>Foto Slide</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'fcs-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		// 'id',
		array(
			'name'=>'images',
			'filter'=>false,
			'type'=>'image',
			'value'=>'Yii::app()->baseUrl.ImageHelper::thumb(100,100, \'/images/fcs/\'.$data->images , array(\'method\' => \'resize\', \'quality\' => \'90\'))',
		),
		'url',
		array(
			'header'=>'sort',
			'type'=>'raw',
			'value'=>'Fcs::model()->sortButton($data,"'.$this->id.'")',
		),
		// array(
			// 'name'=>'target_blank',
			// 'filter'=>array(
				// 'n'=>'No',
				// 'y'=>'Yes',
			// ),
			// 'value'=>'($data->target_blank=="y")? "Yes" : "No" ',
		// ),
		array(
			'name'=>'active',
			'filter'=>array(
				'n'=>'No',
				'y'=>'Yes',
			),
			'value'=>'($data->active=="y")? "Yes" : "No" ',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{delete} {update}'
		),
	),
)); ?>
