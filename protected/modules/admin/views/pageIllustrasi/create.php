<?php
$this->breadcrumbs=array(
	'Page Illustrasis'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	'Add',
);

$this->menu=array(
	array('label'=>'List PageIllustrasi', 'icon'=>'th-list','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Add PageIllustrasi</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>