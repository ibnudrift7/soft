<?php
$this->breadcrumbs=array(
	'Gallery Mains'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List GalleryMain', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Add GalleryMain</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>