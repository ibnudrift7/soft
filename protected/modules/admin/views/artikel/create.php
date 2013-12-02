<?php
$this->breadcrumbs=array(
	'Artikels'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Artikel', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Add Artikel</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>