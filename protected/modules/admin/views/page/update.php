<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

if (Yii::app()->user->checkAccess('page_editModule')){
$this->menu[] = array('label'=>'List Page', 'icon'=>'th-list','url'=>array('index', 'parent'=>$_GET['parent']), 'visible'=>Yii::app()->user->checkAccess('admin.page.index'));
}else{
$this->menu[] = array('label'=>'Home', 'icon'=>'home','url'=>array('/admin/site/index'));
}
$this->menu[] = array('label'=>'Add Page', 'icon'=>'plus-sign','url'=>array('create', 'parent'=>$_GET['parent']), 'visible'=>Yii::app()->user->checkAccess('admin.page.create'));

?>

<h1>Edit Page <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc,)); ?>