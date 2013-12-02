<?php
$this->breadcrumbs=array(
	'Page Illustrasis'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PageIllustrasi','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Add PageIllustrasi','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Manage Page Illustrasis</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'page-illustrasi-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'page_id',
		'images',
		'active',
		'sort',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
