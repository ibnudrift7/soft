<?php
$this->breadcrumbs=array(
	'Galleries'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gallery', 'icon'=>'th-list','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Create Gallery', 'icon'=>'plus-sign','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
	// array('label'=>'View Gallery', 'icon'=>'pencil','url'=>array('view','id'=>$model->id, $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Update Gallery <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>