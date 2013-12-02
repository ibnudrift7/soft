<?php
$this->breadcrumbs=array(
	'Slides'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Slide', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Add Slide</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>