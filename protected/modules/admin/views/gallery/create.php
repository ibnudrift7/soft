<?php
$this->breadcrumbs=array(
	'Galleries'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	'Add',
);

$this->menu=array(
	array('label'=>'List Gallery', 'icon'=>'th-list','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Add Gallery</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>