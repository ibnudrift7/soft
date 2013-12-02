<?php
$this->breadcrumbs=array(
	$model->page.' Edit',
	// $model->id=>array('view','id'=>$model->id),
	// 'Edit',
);

$this->menu=array(
	// array('label'=>'List Sstatic', 'icon'=>'th-list', 'url'=>array('index')),
	// array('label'=>'Add Sstatic', 'icon'=>'plus-sign', 'url'=>array('create')),
	// array('label'=>'View Sstatic', 'icon'=>'eye-open', 'url'=>array('view','id'=>$model->id)),
	// array('label'=>'Manage Sstatic','url'=>array('admin')),
);
?>

<h1>Edit Static <?php echo $model->page; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>