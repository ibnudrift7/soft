<?php
$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Add User Group', 'icon'=>'plus-sign', 'url'=>array('create')),
);
?>

<h1>User Groups</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<br><br>
<table class="table table-striped">
	<tr>
		<th>Group</th>
		<th>&nbsp;</th>
	</tr>
<?php foreach ($model as $key => $value): ?>
	<tr>
		<td><?php echo $value->name ?></td>
		<td>
			<a href="<?php echo CHtml::normalizeUrl(array('update', 'group'=>$value->name)); ?>"><i class="icon-user"></i></a>
			<a href="<?php echo CHtml::normalizeUrl(array('delete', 'group'=>$value->name)); ?>"><i class="icon-trash"></i></a>
		</td>
	</tr>
<?php endforeach ?>
</table>
