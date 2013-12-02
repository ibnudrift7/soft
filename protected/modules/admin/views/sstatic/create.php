<?php
$this->breadcrumbs=array(
	'Sstatics'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Sstatic', 'icon'=>'th-list', 'url'=>array('index')),
	array('label'=>'Manage Sstatic','url'=>array('admin')),
);
?>

<h1>Add Sstatic</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>