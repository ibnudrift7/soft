<?php
$this->breadcrumbs=array(
	'User Groups'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List User', 'icon'=>'th-list', 'url'=>array('index')),
);
?>

<h1>Update User Group <?php echo $group ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'userGroup-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>

<table class="table table-striped">
	<tr>
		<th width="20%">Controller</th>
		<th width="20%">Action</th>
		<th>Sub Action</th>
	</tr>
<?php foreach ($model as $key => $value): ?>
	<tr>
		<td><?php echo $value['name'] ?></td>
		<td>
			<?php foreach ($value['action'] as $k => $v): ?>
				<?php echo CHtml::checkBox('action['.$k.']', $v['value']) ?>
				<?php echo CHtml::label($v['name'], 'action_'.$k,array('style'=>'display: inline; line-height: 25px;')) ?><br>
				
			<?php endforeach ?>
		</td>
		<td>
			<?php foreach ($value['subAction'] as $k => $v): ?>
				<?php echo CHtml::checkBox('action['.$k.']', $v['value']) ?>
				<?php echo CHtml::label($v['name'],'action_'.$k,array('style'=>'display: inline; line-height: 25px;')) ?><br>
				
			<?php endforeach ?>
		</td>
	</tr>
<?php endforeach ?>
</table>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Create',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
