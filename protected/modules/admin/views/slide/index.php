<?php
$this->breadcrumbs=array(
	'Slides',
);

$this->menu=array(
	array('label'=>'Add Slide', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Slides</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbThumbnails', array(
    'dataProvider'=>$dataProvider,
    //'template'=>"{items}\n{pager}",
    'itemView'=>'_view',
)); ?>
<script type="text/javascript">
$(document).on('click','a.deleteTombol',function() {
	if(!confirm('Are you sure you want to delete this item?')) return false;
	var th=this;
	var afterDelete=function(){};
	$.ajax({
		type:'POST',
		url:$(this).attr('href'),
		success:function(data) {
			document.location.reload(true)
		},
		error:function(XHR) {
			document.location.reload(true)
		}
	});
	return false;
});
</script>

<?php /*$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'slide-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		// 'id',
		'image',
		'url',
		array(
			'name'=>'sort',
			'type'=>'raw',
			'filter'=>false,
			'value'=>'SortOrder::sortButton($data,"'.$this->id.'","Slide")',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/admin/slide/delete", array("id" => $data->id))',
			'updateButtonUrl'=>'Yii::app()->createUrl("/admin/slide/update", array("id" => $data->id))',
		),
	),
)); */ ?>
