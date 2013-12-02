<?php
$this->breadcrumbs=array(
	'Settings'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);


$this->menu=array(
	array('label'=>'List Setting', 'icon'=>'th-list', 'url'=>array('index')),
	// array('label'=>'Add Setting', 'icon'=>'plus-sign', 'url'=>array('create')),
	// array('label'=>'View Setting', 'icon'=>'eye-open', 'url'=>array('view','id'=>$model->id)),
);
?>
<h1>Edit Setting <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>