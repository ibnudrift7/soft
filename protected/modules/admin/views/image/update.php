<?php
$this->breadcrumbs=array(
	'Images '.$this->kategory=>array('index', $this->varGet=>$_GET[$this->varGet]),
	// $model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Image', 'icon'=>'th-list','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Create Image', 'icon'=>'plus-sign','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
	// array('label'=>'View Image', 'icon'=>'pencil','url'=>array('view','id'=>$model->id, $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Update Image <?php echo $this->kategory ?> &gt; <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>