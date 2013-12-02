<?php
$this->breadcrumbs=array(
	'Images '.$this->kategory=>array('index', $this->varGet=>$_GET[$this->varGet]),
	'Create',
);

$this->menu=array(
	array('label'=>'List Image', 'icon'=>'th-list','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Add Image <?php echo $this->kategory ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>