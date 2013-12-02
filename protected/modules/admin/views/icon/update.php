<?php
$this->breadcrumbs=array(
	'Icons'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->menu=array(
	array('label'=>'List Icon', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Icon', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Icon', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<h1>Edit Icon <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>