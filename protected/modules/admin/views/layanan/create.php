<?php
$this->breadcrumbs=array(
	'Services'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Services', 'icon'=>'th-list','url'=>array('index', 'parent'=>$_GET['parent'])),
);
?>

<h1>Add Service</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc,)); ?>