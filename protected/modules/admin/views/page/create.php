<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	'Add',
);

$this->menu[] = array('label'=>'List Page', 'icon'=>'th-list','url'=>array('index', 'parent'=>$_GET['parent']), 'visible'=>Yii::app()->user->checkAccess('admin.page.index'));
?>

<h1>Add Page</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc,)); ?>