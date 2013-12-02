<?php
$this->breadcrumbs=array(
	'About List'=>array('index'),
);
$bread = Page::model()->getBreadcrump($_GET['parent']);
$bread = array_reverse($bread,true);
foreach ($bread as $key => $value) {
	$this->breadcrumbs[$key]=$value;
}

$this->menu=array(
	array('label'=>'Add About List', 'icon'=>'th-list','url'=>array('create', 'parent'=>$_GET['parent'])),
);
?>

<h1>About Lists</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'page-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		// 'id',
		// 'parent',
		// 'url',
		// 'modul_target',
		/*
		'date_input',
		'date_modif',
		*/
		array(
			'header'=>'name',
			'type'=>'raw',
			'value'=>'$data->aboutDesc->name',
		),
		array(
			'name'=>'active',
			'filter'=>array('0'=>'Deactive', '1'=>'Active'),
			'value'=>'($data->active==1)?"Active":"Deactive"',
		),
		// 'hidden',
		// 'modul',
		array(
			'name'=>'sort',
			'type'=>'raw',
			'filter'=>false,
			'value'=>'SortOrder::sortButton($data,"'.$this->id.'","About")',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}',
			// 'deleteButtonUrl'=>'Yii::app()->createUrl("admin/'.$this->id.'/delete", array("id" => $data->id, "parent" => $data->parent))',
			// 'updateButtonUrl'=>'Yii::app()->createUrl("admin/'.$this->id.'/update", array("id" => $data->id, "parent" => $data->parent))',
		),
	),
)); ?>
