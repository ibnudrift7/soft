<?php
$this->breadcrumbs=array(
	'Menu Backends'=>array('index', 'parent'=>$_GET['parent']),
	// $model->name=>array('view','id'=>$model->id),
	// 'Edit',
);
$bread = MenuBackend::model()->getBreadcrump($_GET['parent']);
$bread = array_reverse($bread,true);
foreach ($bread as $key => $value) {
	$this->breadcrumbs[$key]=$value;
}
$this->breadcrumbs[]='Edit';

$this->menu=array(
	array('label'=>'List MenuBackend', 'icon'=>'th-list','url'=>array('index', 'parent'=>$_GET['parent'])),
	array('label'=>'Add MenuBackend', 'icon'=>'plus-sign','url'=>array('create', 'parent'=>$_GET['parent'])),
	// array('label'=>'View MenuBackend', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<h1>Edit MenuBackend <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>