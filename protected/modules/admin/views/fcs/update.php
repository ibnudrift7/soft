<?php
$this->breadcrumbs=array(
	'Foto Slide'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->menu=array(
	array('label'=>'List Foto Slide', 'icon'=>'th-list', 'url'=>array('index')),
	array('label'=>'Add Foto Slide', 'icon'=>'plus-sign', 'url'=>array('create')),
	// array('label'=>'View Foto Slide', 'icon'=>'eye-open', 'url'=>array('view','id'=>$model->id)),
);
?>

<h1>Edit Foto Slide <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>