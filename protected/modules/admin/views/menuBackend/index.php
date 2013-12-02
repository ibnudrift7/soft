<?php
$this->breadcrumbs=array(
	'Menu Backends'=>array('index'),
);
$bread = MenuBackend::model()->getBreadcrump($_GET['parent']);
$bread = array_reverse($bread,true);
foreach ($bread as $key => $value) {
	$this->breadcrumbs[$key]=$value;
}
$this->menu=array(
	array('label'=>'Add MenuBackend', 'icon'=>'th-list','url'=>array('create', 'parent'=>$_GET['parent'])),
	array('label'=>'Build Auth Item', 'icon'=>'user','url'=>array('build', 'parent'=>$_GET['parent'])),
);
?>

<h1>Menu Backends</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'menu-backend-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'enableSorting' => false,
	'columns'=>array(
		// 'id',
		// 'parent',
		array(
			'name'=>'name',
			'type'=>'raw',
			'value'=>'CHtml::link($data->name,array("index","parent"=>$data->id))',
		),
		'desc',
		'url',
		'action',
		/*
		'icon',
		'sort',
		'shortcut',
		'hidden',
		*/
		array(
			'name'=>'active',
			'filter'=>array('0'=>'Deactive', '1'=>'Active'),
			'value'=>'($data->active==1)?"Active":"Deactive"',
		),
		array(
			'name'=>'position',
			'filter'=>array('0'=>'Left', '1'=>'Right'),
			'value'=>'($data->position==1)?"Right":"Left"',
		),
		array(
			'name'=>'sort',
			'type'=>'raw',
			'value'=>'SortOrder::sortButton($data,"'.$this->id.'","MenuBackend",$data->parent,"parent")',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}',
			'deleteButtonUrl'=>'Yii::app()->createUrl("admin/'.$this->id.'/delete", array("id" => $data->id, "parent" => $data->parent))',
			'updateButtonUrl'=>'Yii::app()->createUrl("admin/'.$this->id.'/update", array("id" => $data->id, "parent" => $data->parent))',
		),
	),
)); ?>
