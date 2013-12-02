<?php
$this->breadcrumbs=array(
	'Room'=>array('/admin/page/update', 'id'=>2),
	// $model->name=>array('view','id'=>$model->id),
	'General Fasilities',
);


$this->menu=array(
	array('label'=>'Back', 'icon'=>'th-list', 'url'=>array('/admin/page/update', 'id'=>2)),
	// array('label'=>'Add Setting', 'icon'=>'plus-sign', 'url'=>array('create')),
	// array('label'=>'View Setting', 'icon'=>'eye-open', 'url'=>array('view','id'=>$model->id)),
);
?>
<h1><?php 
if ($model->id == '10') {
echo 'General Room Features'; 
} else {
echo 'Edit Setting '.$model->id; 
}
?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>