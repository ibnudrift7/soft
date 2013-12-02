<?php
$this->breadcrumbs=array(
	'Foto Slide'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Foto Slide', 'icon'=>'th-list', 'url'=>array('index')),
	array('label'=>'Add Foto Slide', 'icon'=>'plus-sign', 'url'=>array('create')),
	array('label'=>'Edit Foto Slide', 'icon'=>'pencil', 'url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Foto Slide', 'icon'=>'trash', 'url'=>'#','htmlOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Foto Slide &gt; <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		array(               // related city displayed as a link
            'name'=>'images',
            'type'=>'raw',
            'value'=>'<img src="'.Yii::app()->baseUrl.ImageHelper::thumb(300,300, '/images/fcs/'.$model->images , array('method' => 'resize', 'quality' => '90')).'"/>',
        ),
        array(               // related city displayed as a link
            'name'=>'url',
            'type'=>'raw',
            'value'=>CHtml::link(CHtml::encode($model->url), $model->url)
        ),
		'sort',
		// array(               // related city displayed as a link
            // 'name'=>'target_blank',
            // 'value'=>($model->target_blank=='m')?'No':'Yes',
        // ),
		array(               // related city displayed as a link
            'name'=>'active',
            'value'=>($model->active=='m')?'No':'Yes',
        ),
	),
)); ?>
