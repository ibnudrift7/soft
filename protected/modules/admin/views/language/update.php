<?php
$this->breadcrumbs=array(
	'Languages'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->menu=array(
	array('label'=>'List Language', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Language', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Language', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<h1>Edit Language <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>