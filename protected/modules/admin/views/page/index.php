<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
);
$bread = Page::model()->getBreadcrump($_GET['parent']);
$bread = array_reverse($bread,true);
foreach ($bread as $key => $value) {
	$this->breadcrumbs[$key]=$value;
}
$this->menu[] = array('label'=>'Add Page', 'icon'=>'plus-sign','url'=>array('create', 'parent'=>$_GET['parent']), 'visible'=>Yii::app()->user->checkAccess('admin.page.create'));
?>

<h1>Pages</h1>
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
		array(
			'name'=>'kode',
			'type'=>'raw',
			'value'=>'CHtml::link($data->kode,array("index","parent"=>$data->id))',
		),
		// 'modul_target',
		/*
		'date_input',
		'date_modif',
		*/
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
			'value'=>'SortOrder::sortButton($data,"'.$this->id.'","Page",$data->parent,"parent")',
			'visible'=>Yii::app()->user->checkAccess('admin.page.sort'),
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'
			'.((Yii::app()->user->checkAccess('admin.page.update'))?'{update}':'').'
			'.((Yii::app()->user->checkAccess('admin.page.delete'))?'{delete}':'').'
			',
			'deleteButtonUrl'=>'Yii::app()->createUrl("admin/'.$this->id.'/delete", array("id" => $data->id, "parent" => $data->parent))',
			'updateButtonUrl'=>'Yii::app()->createUrl("admin/'.$this->id.'/update", array("id" => $data->id, "parent" => $data->parent))',
		),
	),
)); ?>
