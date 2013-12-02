<?php
$this->breadcrumbs=array(
	'Menu Backends'=>array('index', 'parent'=>$_GET['parent']),
);
$bread = MenuBackend::model()->getBreadcrump($_GET['parent']);
$bread = array_reverse($bread,true);
foreach ($bread as $key => $value) {
	$this->breadcrumbs[$key]=$value;
}
$this->breadcrumbs[]='add';

$this->menu=array(
	array('label'=>'List MenuBackend', 'icon'=>'th-list','url'=>array('index', 'parent'=>$_GET['parent'])),
);
?>

<h1>Add MenuBackend</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>